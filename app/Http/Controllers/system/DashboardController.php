<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceController;
use App\Services\DashboardService;
use Illuminate\Http\Request;

class DashboardController extends ResourceController
{
       protected bool $skipPermission = true;

    function __construct(DashboardService $services)
    {
        return parent::__construct($services);
    }

    public function viewsFolder()
    {
        return 'backend.system.dashboard';
    }

    public function getResourceNames()
    {
        return 'admin.dashboard';
    }

    public function storeValidationRequest()
    {
        return '';
    }
}
