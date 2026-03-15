<?php

namespace App\Services;

use App\Models\Permission;
use App\Models\Role;

class RolePermissionService extends Services
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function getAll($pagination = 10)
    {
        return $this->model::where('id', '!=', 1)->get();
    }

    public function getById(string $id)
    {
        return [
            'role' => $this->model->with('permissions')->findOrFail($id),
            'roles' => $this->model->where('id', '!=', 1)->get(),
            'permissions' => Permission::all()->groupBy('group'),
            'assignedPermissions' => $this->model->findOrFail($id)->permissions->pluck('id')->toArray(),
        ];
    }

    public function getCreateData()
    {
        return [
            'roles' => Role::where('id', '!=', 1)->get(), // exclude super-admin
            'permissions' => Permission::all()->groupBy('group')
        ];
    }

    public function update(string $id, $request)
    {
        $role = $this->model->findOrFail($id);

        $role->permissions()->sync($request->input('permissions', []));

        return $role;
    }
}
