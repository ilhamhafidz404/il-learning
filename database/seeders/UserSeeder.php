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
            'username' => 'xxhamz_',
            'email' => 'xxspanzie@gmail.com',
            'password' => bcrypt('password'),
            'mode' => 'dark',
        ]);
        $user->assignRole('student');

        $user = User::create([
            'name' => 'Hamdan Alfarizi',
            'username' => 'ham&',
            'email' => 'hamdan@gmail.com',
            'password' => bcrypt('password'),
            'mode' => 'light',
        ]);
        $user->assignRole('student');
    }
}
