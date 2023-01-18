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
            'profile' => 'profile/man1.jpg',
            'email' => 'xxspanzie@gmail.com',
            'password' => bcrypt('password'),
            'classroom_id' => 1,
            'mode' => 'dark',
        ]);
        // $user->assignRole('student');

        $user = User::create([
            'name' => 'Hamdan Alfarizi',
            'username' => 'ham&',
            'profile' => 'profile/man2.jpg',
            'email' => 'hamdan@gmail.com',
            'password' => bcrypt('password'),
            'classroom_id' => 2,
            'mode' => 'light',
        ]);
        // $user->assignRole('student');
    }
}
