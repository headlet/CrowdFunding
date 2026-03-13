<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\ResourceController;
use App\Services\RolePermissionService;
use App\Http\Requests\RolePermissionRequest;

class RolePermissionController extends ResourceController
{
    public function __construct(RolePermissionService $services)
    {
        parent::__construct($services);
    }

    public function storeValidationRequest()
    {
        return RolePermissionRequest::class;
    }

    public function viewsFolder()
    {
        return 'backend.system.role_permission';
    }

    public function getResourceNames()
    {
        return 'admin.role-permission';
    }
}