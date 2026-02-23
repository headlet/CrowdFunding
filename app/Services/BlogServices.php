<?php

namespace App\Services;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Testing\Fluent\Concerns\Has;

class BlogServices extends Services
{
    public function __construct(Blog $model)
    {
        parent::__construct($model);
    }

    public function getAll($pagination = 10)
    {
        return [
            'blog' => $this->model::with("user", 'blogCategory')->latest()->paginate($pagination),
            'user' => User::orderBy('full_name', 'asc')->get(),
            'category' => BlogCategory::orderBy('name', 'asc')->get(),
        ];
    }

    public function getById($id)
    {
        return [
            "blog" => $this->model->with('user', 'blogCategory')->findOrFail($id),
            "users" => User::all(),
            "categories" => BlogCategory::all(),
        ];
    }

    public function getCreateData()
    {
        return [
            'users' => User::orderBy('full_name', 'asc')->get(),
            'categories' => BlogCategory::orderBy('name', 'asc')->get(),
        ];
    }

    public function store(Request $request)
    {
        $data = $request->except('token');

        if (isset($data['image']) && $data['image']->isValid()) {
            $filename = time() . '_' . $data['image']->getClientOriginalName();
            $data['image']->move(public_path('uploads/blogs'), $filename);
            $data['image'] = $filename;
        }

        return $this->model->create($data);
    }

    public function update($id, $request){
        
        $blog = $this->model->findorFail($id);

        $data = $request->except('_token');

        if (isset($data['image']) && $data['image']->isValid()) {
            if ($blog->image && file_exists(public_path('uploads/teams/' . $blog->image))) {
                unlink(public_path('uploads/blogs/' . $blog->image));
            }

            $filename = time() . '_' . $data['image']->getClientOriginalName();
            $data['image']->move(public_path('uploads/teams'), $filename);
            $data['image'] = $filename;
        }

        $blog->update($data);

        return $blog;

    }

    public function destroy(string $id)
    {
        $ids = explode(',', $id);
        $this->model::whereIn('id', $ids)->delete();

        return response()->json(['success' => true]);
    }
}
