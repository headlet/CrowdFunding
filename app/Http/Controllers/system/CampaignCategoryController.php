<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\ResourceController;
use App\Http\Requests\CampaignCategoryRequest;
use App\Services\CampaignCategoryServices;

class CampaignCategoryController extends ResourceController
{
    public function __construct(CampaignCategoryServices $services)
    {
        parent::__construct($services);
    }

    public function getResourceNames()
    {
        return "admin.campaign-category";
    }

    public function storeValidationRequest()
    {
        return CampaignCategoryRequest::class;
    }

    public function viewsFolder()
    {
        return 'backend.system.campaign-categories';
    }
}
