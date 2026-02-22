<?php

namespace App\Http\Controllers\system;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ResourceController;
use App\Http\Requests\BlogCategoryRequest;
use App\Models\BlogCategory;
use App\Services\BlogCategoryServices;
use Illuminate\Http\Request;

class BlogCategoryController extends ResourceController
{
    public function __construct(BlogCategoryServices $services)
    {
        parent::__construct($services);
    }

    public function viewsFolder()
    {
        return 'backend.system.blog-categories';
    }
    public function getResourceNames()
    {
        return 'admin.blog-category';
    }

    public function storeValidationRequest()
    {
        return BlogCategoryRequest::class;
    }
}
