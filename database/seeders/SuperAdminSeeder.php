<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Senior Admin',
            'slug' => 'senior-admin',
            'email' => 'superadmin@starter.com',
            'password' => bcrypt('password'),
            'role' => 'senior-admin',
            'status' => 'active',
        ]);
    }
}
