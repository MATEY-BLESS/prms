<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Matey Bless',
            'slug' => 'Bless-Matey',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
            'department_id' => 1,
            'status' => 'active',
        ]);
    }
}
