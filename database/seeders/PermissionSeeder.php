<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Modules\Admin\Permissions\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'create-product', 'description' => 'Create a product'],
            ['name' => 'edit-product', 'description' => 'Edit a product'],
            ['name' => 'create-user', 'description' => 'Create a user'],
            ['name' => 'edit-user', 'description' => 'Edit a user'],
            ['name' => 'create-role', 'description' => 'Create a role'],
            ['name' => 'edit-role', 'description' => 'Edit a role'],
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission['name']], ['description' => $permission['description']]);
        }
    }
}
