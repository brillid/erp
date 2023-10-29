<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Modules\MasterData\Users\Roles\Role;
use App\Models\Modules\MasterData\Users\User\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Find users and roles by ID
        $user = User::find(1); // Replace with the user you want to assign roles to
        $role = Role::find(1); // Replace with the role you want to assign

        // Attach the role to the user
        $user->roles()->attach($role);
    }
}
