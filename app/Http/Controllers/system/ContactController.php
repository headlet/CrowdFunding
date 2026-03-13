<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\ResourceController;
use App\Http\Requests\ContactRequest;
use App\Services\ContactService;

class ContactController extends ResourceController
{
   function __construct(ContactService $services)
    {
        return parent::__construct($services);
    }

     public function viewsFolder()
    {
        return 'backend.system.contact';
    }

    public function getResourceNames()
    {
        return 'admin.contact';
    }

    public function storeValidationRequest()
    {
        return ContactRequest::class;
    }
}
