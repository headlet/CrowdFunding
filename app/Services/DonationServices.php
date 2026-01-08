<?php

namespace App\Services;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class DonationServices extends Services
{
    public function __construct(Donation $model)
    {
        parent::__construct($model);
    }

    public function getAll($perPage = 10)
    {
        return $this->model
            ->with(['user', 'campaign'])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function store(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $donation = $this->model->create([
            'user_id'       => Auth::id(),
            'campaign_id'   => $request->campaign_id,
            'donor_name'    => $request->donor_name,
            'donor_email'   => $request->donor_email,
            'phone_number' => $request->phone_number,
            'amount'        => $request->amount,
            'currency'      => 'USD',
            'payment_id'    => null,
            'status'        => 'pending',
            'is_anonymous'  => $request->boolean('is_anonymous'),
        ]);

        $session = Session::create([
            'mode' => 'payment',
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Donation – ' . $donation->campaign->title,
                    ],
                    'unit_amount' => (int) ($donation->amount * 100),
                ],
                'quantity' => 1,
            ]],
            'metadata' => [
                'donation_id' => $donation->id,
            ],
            'success_url' => route('donation.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => route('donation.cancel'),
        ]);

        return redirect()->away($session->url);
    }

    public function handleSuccess(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::retrieve($request->session_id);

        $donationId = $session->metadata->donation_id;

        $donation = $this->model->findOrFail($donationId);

        $donation->update([
            'payment_id' => $session->payment_intent,
            'status'     => 'completed',
        ]);

        return view('frontend.donation.donation-success', compact('donation'));
    }
}
