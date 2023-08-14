<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // student
        User::create([
            'name' => 'Ilham Hafidz',
            'username' => 'ilham-hafidz',
            'email' => 'xxspanzie@gmail.com',
            'password' => bcrypt('password'),
            'mode' => 'dark',
            "classroom_id" => 1
        ])->assignRole('student');

        User::create([
            'name' => 'Faizal Yusuf',
            'username' => 'faizal-yusuf',
            'email' => 'ajacobaan91@gmail.com',
            'password' => bcrypt('password'),
            'mode' => 'light',
            "classroom_id" => 1
        ])->assignRole('student');

        // lecturer
        User::create([
            'name' => "Sherly Gina Supratman, M.Kom.",
            'email' => "sherlyy@gmail.com",
            'password' => bcrypt('password'),
            'mode' => 'light',
            'username' => 'sherly',
            "classroom_id" => 1
        ])->assignRole('lecturer');

        User::create([
            'name' => "S.H., M.H. Iman Jalaludin Rifa'i, S.H.I, M.H",
            'email' => "iman@gmail.com",
            'password' => bcrypt('password'),
            'mode' => 'light',
            'username' => 'iman',
            "classroom_id" => 1
        ])->assignRole('lecturer');
    }
}
