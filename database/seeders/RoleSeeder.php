<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Role::insert([
            [
                'name' => 'student',
                'guard_name' => 'api'
            ],
            [
                'name' => 'assistant',
                'guard_name' => 'api'
            ],
            [
                'name' => 'lecturer',
                'guard_name' => 'api'
            ],
        ]);
    }
}
