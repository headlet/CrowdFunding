<?php
namespace App\Http\Controllers\system;

use App\Http\Controllers\ResourceController;
use App\Services\SuccessStoryService;
use App\Http\Requests\SuccessStoryRequest;

class SuccessStoryController extends ResourceController
{
    public function __construct(SuccessStoryService $service)
    {
        parent::__construct($service);
    }

    public function viewsFolder()
    {
        return 'backend.system.success_story';
    }

    public function getResourceNames()
    {
        return 'admin.success-story';
    }

    public function storeValidationRequest()
    {
        return SuccessStoryRequest::class;
    }
}