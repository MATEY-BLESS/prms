<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(
            [
                'name' => 'owner',
                'slug' => 'owner',
                'admin_id' => 1,
            ]
        );

        Role::create(
            [
                'name' => 'senior admin',
                'slug' => 'senior-admin',
                'admin_id' => 1,
            ]
        );

        Role::create(
            [
                'name' => 'doctor',
                'slug' => 'doctor',
                'admin_id' => 1,
            ]
        );
    }
}
