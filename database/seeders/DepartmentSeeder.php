<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create(
            [
                'name' => 'management',
                'slug' => 'management',
                'admin_id' => 1,
            ]
        );

        Department::create(
            [
                'name' => 'computing',
                'slug' => 'computing',
                'admin_id' => 1,
            ]
        );
    }
}
