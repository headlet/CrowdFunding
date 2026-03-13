<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resources = [
            'campaigns',
            'campaign-category',
            'donation',
            'team',
            'blog',
            'blog-category',
            'gallery',
            'role-permission'
        ];

        $actions = ['index', 'create', 'store', 'edit', 'update', 'destroy'];

        foreach ($resources as $resource) {
            foreach ($actions as $action) {
                Permission::create([
                    'name' => "admin." . $resource . '.' . $action,
                    'group' => $resource
                ]);
            }
        }
    }
}
