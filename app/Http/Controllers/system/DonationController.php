<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\ResourceController;
use App\Http\Requests\DonationRequest;
use App\Services\DonationServices;
use Illuminate\Http\Request;

class DonationController extends ResourceController
{
    public function __construct(DonationServices $services)
    {
        parent::__construct($services);
    }

    public function getResourceNames()
    {
        return 'donation';
    }

    public function viewsFolder()
    {
        return 'backend.system.donation';
    }

    public function storeValidationRequest()
    {
        return DonationRequest::class;
    }

    public function store(Request $request)
    {
        $request->validate((new DonationRequest)->rules());

        return $this->services->store($request);
    }

    public function success(Request $request)
    {
        return $this->services->handleSuccess($request);
    }

    public function cancel()
    {
        return view('frontend.donation.donation-cancel');
    }
}
