<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\ResourceController;
use App\Http\Requests\AboutCharityRequest;
use App\Services\AboutCharityService;

class AboutCharityController extends ResourceController
{
    public function __construct(AboutCharityService $services)
    {
        parent::__construct($services);
    }

    public function viewsFolder()
    {
        return 'backend.system.about_charity';
    }

    public function getResourceNames()
    {
        return 'admin.about-charity';
    }

    public function storeValidationRequest()
    {
        return AboutCharityRequest::class;
    }
}