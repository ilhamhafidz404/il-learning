<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lecturer::insert([
            [
                'name' => "Ilham Hafidz",
                'email' => "ilhammhafidzz@gmail.com",
                'password' => bcrypt('password')
            ],
            [
                'name' => "Faizal Yusuf",
                'email' => "faizalyusuf@gmail.com",
                'password' => bcrypt('password')
            ],
        ]);
    }
}
