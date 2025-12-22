<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'name' => 'admin',
                'description' => 'Administrator with full access',
            ],
            [
                'name' => 'volunteer',
                'description' => 'Volunteer user',
            ],
            [
                'name' => 'donor',
                'description' => 'Regular donor user',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
