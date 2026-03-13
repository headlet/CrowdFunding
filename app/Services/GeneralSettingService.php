<?php
namespace App\Services;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GeneralSettingService extends Services
{
    public function __construct(GeneralSetting $model)
    {
        parent::__construct($model);
    }

    public function getAll($perPage = 10)
    {
        return $this->model->first();
    }


    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('header_logo')) {
            $data['header_logo'] = $request->file('header_logo')
                ->store('general-settings', 'public');
        }

        if ($request->hasFile('footer_logo')) {
            $data['footer_logo'] = $request->file('footer_logo')
                ->store('general-settings', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        $this->model->create($data);
    }

    public function update(string $id, Request $request)
    {
        $setting = $this->model->findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('header_logo')) {

            if ($setting->header_logo) {
                Storage::disk('public')->delete($setting->header_logo);
            }

            $data['header_logo'] = $request->file('header_logo')
                ->store('general-settings', 'public');
        }

        if ($request->hasFile('footer_logo')) {

            if ($setting->footer_logo) {
                Storage::disk('public')->delete($setting->footer_logo);
            }

            $data['footer_logo'] = $request->file('footer_logo')
                ->store('general-settings', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        $setting->update($data);
    }
}