<?php

namespace App\Services;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads/teams', 'public');
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

        if ($request->hasFile('image')) {
            if ($team->image && Storage::disk('public')->exists($team->image)) {
                Storage::disk('public')->delete($team->image);
            }
            $data['image'] = $request->file('image')->store('uploads/team', 'public');
        }

        $team->update($data);

        return $team;
    }
}
