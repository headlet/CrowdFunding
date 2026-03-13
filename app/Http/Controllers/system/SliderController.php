<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\ResourceController;
use App\Http\Requests\SliderRequest;
use App\Services\SliderService;

class SliderController extends ResourceController
{
    function __construct(SliderService $services)
    {
        return parent::__construct($services);
    }

    public function viewsFolder()
    {
        return 'backend.system.slider';
    }

    public function getResourceNames()
    {
        return 'admin.slider';
    }

    public function storeValidationRequest()
    {
        return SliderRequest::class;
    }
}
