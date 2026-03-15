<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the admin role
        $adminRole = Role::find(3); // admin role

        if (!$adminRole) {
            $this->command->error("Admin role (id=3) not found!");
            return;
        }

        // Get all permissions
        $permissions = Permission::all()->pluck('id')->toArray();

        // Assign all permissions to admin role
        $adminRole->permissions()->sync($permissions);

        $this->command->info("All permissions assigned to Admin role (id=3)");
    }
}
