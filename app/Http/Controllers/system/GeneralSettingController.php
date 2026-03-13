<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\GeneralSettingRequest;
use App\Services\GeneralSettingService;
use Illuminate\Http\Request;

class GeneralSettingController extends ResourceController
{
    public function __construct(GeneralSettingService $services)
    {
        parent::__construct($services);
    }

    public function viewsFolder()
    {
        return 'backend.system.general-setting';
    }

    public function getResourceNames()
    {
        return 'admin.general-setting';
    }

    public function storeValidationRequest()
    {
        return GeneralSettingRequest::class;
    }
}
