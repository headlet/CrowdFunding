<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\ResourceController;
use App\Http\Requests\AboutRequest;
use App\Models\About_us;
use App\Services\AboutService;
use Illuminate\Http\Request;

class AboutController extends ResourceController
{
    function __construct(AboutService $services)
    {
        return parent::__construct($services);
    }

     public function viewsFolder()
    {
        return 'backend.system.about';
    }

    public function getResourceNames()
    {
        return 'admin.about';
    }

    public function storeValidationRequest()
    {
        return AboutRequest::class;
    }
}
