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
        $students = [
            'Afri Prasutyo', "Aji Sundowo",
            "Ananda Sayyidina Rahmat", "Aysyah Noor Shobah",
            "Bagas Cahyawiguna", "Dera Sartika Dwiratna",
            "Exsha Andara Santana", "Fadel Dwi Antoro",
            "Farhan Maulana Basri", "Firdan Fauzan",
            "Fitri Handayani", "Hasan Abdu Rahman",
            "Havrizar Harja Semeru", "Helva Faizya",
            "Ilham Hafidz", "Lilis Apriah",
            "Mochamad Ilham Ariel Fadia", "Muhammad Faizal Yusuf",
            "Muhammad Faizal Nurfauzy", "Muhammad Rizal Mutaqin",
            "Putri Maharani", "Rizal Hamzah",
            "Samuel Herdia Nugraha", "Wahyu",
        ];
        foreach ($students as $user) {
            User::create([
                'name' => $user,
                'username' => Str::slug($user),
                'email' => Str::slug($user) . '@gmail.com',
                'password' => bcrypt('password'),
                'mode' => 'dark',
            ])->assignRole('student');
        }

        User::create([
            'name' => 'Hamdan Alfarizi',
            'email' => 'hamdan@gmail.com',
            'password' => bcrypt('password'),
            'mode' => 'light',
            'username' => 'ham&',
        ])->assignRole('student');

        User::create([
            'name' => "Sherly Gina Supratman, M.Kom.",
            'email' => "sherlyy@gmail.com",
            'password' => bcrypt('password'),
            'mode' => 'light',
            'username' => 'sherly',
        ])->assignRole('lecturer');

        User::create([
            'name' => "S.H., M.H. Iman Jalaludin Rifa'i, S.H.I, M.H",
            'email' => "iman@gmail.com",
            'password' => bcrypt('password'),
            'mode' => 'light',
            'username' => 'iman',
        ])->assignRole('lecturer');

        User::create([
            'name' => "Gentur Proguna Suwarto, S.T., M.T.",
            'email' => "genturboy@gmail.com",
            'password' => bcrypt('password'),
            'mode' => 'light',
            'username' => 'gentur',
        ])->assignRole('lecturer');

        User::create([
            'name' => "Yulyanto, S.Kom., M.TI.",
            'email' => "yul@gmail.com",
            'password' => bcrypt('password'),
            'mode' => 'light',
            'username' => 'yul',
        ])->assignRole('lecturer');

        User::create([
            'name' => "Fauziah, S.Kom., M.Kom.",
            'email' => "fauziah@gmail.com",
            'password' => bcrypt('password'),
            'mode' => 'light',
            'username' => 'fauziah',
        ])->assignRole('lecturer');

        User::create([
            'name' => "Daswa, S.Si., M.Pd.",
            'email' => "kalkulus@gmail.com",
            'password' => bcrypt('password'),
            'mode' => 'light',
            'username' => 'daswa',
        ])->assignRole('lecturer');

        User::create([
            'name' => "Nida Amalia Asikin, S.S., M.Pd.",
            'email' => "nida@gmail.com",
            'password' => bcrypt('password'),
            'mode' => 'light',
            'username' => 'nida',
        ])->assignRole('lecturer');

        User::create([
            'name' => "Ir. Rachmat Ismaya, M.Kom.",
            'email' => "rachmat@gmail.com",
            'password' => bcrypt('password'),
            'mode' => 'light',
            'username' => 'rachmat',
        ])->assignRole('lecturer');
    }
}
