<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::updateOrCreate(
            ['id' => 3],
            ['name' => 'admin']
        );

        Role::updateOrCreate(
            ['id' => 2],
            ['name' => 'user']
        );
        
        Role::updateOrCreate(
            ['id' => 1],
            ['name' => 'Super admin']
        );
    }
}
