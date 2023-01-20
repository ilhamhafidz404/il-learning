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
                'name' => "Dosen",
                'email' => "dosen@gmail.com",
                'password' => bcrypt('password')
            ],
            [
                'name' => "Sherly Gina Supratman, M.Kom.",
                'email' => "sherlyy@gmail.com",
                'password' => bcrypt('password')
            ],
            [
                'name' => "S.H., M.H. Iman Jalaludin Rifa'i, S.H.I, M.H",
                'email' => "iman@gmail.com",
                'password' => bcrypt('password')
            ],
            [
                'name' => "Gentur Proguna Suwarto, S.T., M.T.",
                'email' => "genturboy@gmail.com",
                'password' => bcrypt('password')
            ],
            [
                'name' => "Yulyanto, S.Kom., M.TI.",
                'email' => "yul@gmail.com",
                'password' => bcrypt('password')
            ],
            [
                'name' => "Fauziah, S.Kom., M.Kom.",
                'email' => "fauziah@gmail.com",
                'password' => bcrypt('password')
            ],
            [
                'name' => "Daswa, S.Si., M.Pd.",
                'email' => "kalkulus@gmail.com",
                'password' => bcrypt('password')
            ],
            [
                'name' => "Nida Amalia Asikin, S.S., M.Pd.",
                'email' => "nida@gmail.com",
                'password' => bcrypt('password')
            ],
            [
                'name' => "Ir. Rachmat Ismaya, M.Kom.",
                'email' => "rachmat@gmail.com",
                'password' => bcrypt('password')
            ],
        ]);
    }
}
