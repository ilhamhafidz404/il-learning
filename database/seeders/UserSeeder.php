<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'ilham hafidz',
            'email' => 'xxspanzie@gmail.com',
            'password' => bcrypt('password'),
            'classroom_id' => 1,
            'mode' => 'dark',
        ]);
        // $user->assignRole('student');

        $user = User::create([
            'name' => 'Hamdan Alfarizi',
            'email' => 'hamdan@gmail.com',
            'password' => bcrypt('password'),
            'classroom_id' => 2,
            'mode' => 'light',
        ]);
        // $user->assignRole('student');
    }
}
