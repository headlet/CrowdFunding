<?php

namespace App\Services;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamServices extends Services
{
    public function __construct(Team $model)
    {
        parent::__construct($model);
    }

    public function getAll($pagination = 10)
    {
        return $this->model->orderBy('name', 'asc')->paginate($pagination);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        if (isset($data['image']) && $data['image']->isValid()) {
            $filename = time() . '_' . $data['image']->getClientOriginalName();
            $data['image']->move(public_path('uploads/teams'), $filename);
            $data['image'] = $filename;
        }
        return $this->model->create($data);
    }

    public function getById(string $id)
    {
        return ['team' => $this->model->findorFail($id)];
    }

    public function update(String $id, Request $request)
    {
        $team = $this->model->findorFail($id);

        $data = $request->except('_token');

        if (isset($data['image']) && $data['image']->isValid()) {
            if ($team->image && file_exists(public_path('uploads/teams/' . $team->image))) {
                unlink(public_path('uploads/teams/' . $team->image));
            }

            $filename = time() . '_' . $data['image']->getClientOriginalName();
            $data['image']->move(public_path('uploads/teams'), $filename);
            $data['image'] = $filename;
        }

        $team->update($data);

        return $team;
    }
}
