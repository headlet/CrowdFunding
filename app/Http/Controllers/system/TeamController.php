<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\TeamRequest;
use App\Services\TeamServices;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class TeamController extends ResourceController
{
    public function __construct(TeamServices $services)
    {
        parent::__construct($services);
    }

    public function viewsFolder()
    {
        return 'backend.system.team';
    }

    public function getResourceNames()
    {
        return 'admin.team';
    }

    public function storeValidationRequest()
    {
        return TeamRequest::class;
    }
}
