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
        User::insert([
            [
                'name' => 'ilham hafidz',
                'email' => 'xxspanzie@gmail.com',
                'password' => bcrypt('password'),
                'classroom_id' => 1,
                'mode' => 'dark',
            ],
            [
                'name' => 'Hamdan Alfarizi',
                'email' => 'hamdan@gmail.com',
                'password' => bcrypt('password'),
                'classroom_id' => 2,
                'mode' => 'light',
            ],
        ]);
    }
}
