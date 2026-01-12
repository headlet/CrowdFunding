<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Services\BlogServices;
use Illuminate\Http\Request;

class BlogController extends ResourceController
{
    public function __construct(BlogServices $services)
    {
        parent::__construct($services);
    }

    public function viewsFolder()
    {
        return 'backend.system.blog';
    }

    public function getResourceNames()
    {
        return 'admin.blog';
    }

    public function storeValidationRequest()
    {
        return BlogRequest::class;
    }
}
