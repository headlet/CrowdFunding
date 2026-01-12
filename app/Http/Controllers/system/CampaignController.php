<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\ResourceController;
use App\Http\Requests\CampaignRequest;
use App\Services\CampaignServices;

class CampaignController extends ResourceController
{

    public function __construct(CampaignServices $services)
    {
        parent::__construct($services);
    }

    public function storeValidationRequest()
    {
        return CampaignRequest::class;
    }

    public function viewsFolder()
    {
        return 'backend.system.campaign';
    }

    public function getResourceNames()
    {
        return 'admin.campaigns';
    }
}
