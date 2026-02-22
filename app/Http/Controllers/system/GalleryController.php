<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\ResourceController;
use App\Http\Requests\GalleryRequest;
use App\Services\GalleryService;
use Illuminate\Http\Request;

class GalleryController extends ResourceController
{
    public function __construct(GalleryService $services)
    {
        parent::__construct($services);
    }

    public function viewsFolder()
    {
        return 'backend.system.gallery';
    }

    public function getResourceNames()
    {
        return 'admin.gallery';
    }

    public function storeValidationRequest()
    {
        return GalleryRequest::class;
    }
}
