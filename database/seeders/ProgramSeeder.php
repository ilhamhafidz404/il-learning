<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Program::insert([
            [
                'name' => 'Teknik Informatika',
                'slug' => 'ti',
                'level' => 'S1',
            ],
            [
                'name' => 'Desain Komunikasi Visual',
                'slug' => 'dkv',
                'level' => 'S1',
            ],
            [
                'name' => 'Sistem Informasi',
                'slug' => 'si',
                'level' => 'S1',
            ],
            [
                'name' => 'Manajemen Informatika',
                'slug' => 'mi',
                'level' => 'D3',
            ],
            [
                'name' => 'Pendidikan Bahasa dan Sastra Indonesia',
                'slug' => 'pbsi',
                'level' => 'S1',
            ],
            [
                'name' => 'Pendidikan Bahasa Inggris',
                'slug' => 'pbi',
                'level' => 'S1',
            ],
            [
                'name' => 'Magister Manajemen',
                'slug' => 'mm',
                'level' => 'S2',
            ],
            [
                'name' => 'Pendidikan Biologi',
                'slug' => 'pb',
                'level' => 'S2',
            ],
            [
                'name' => 'Pendidikan Ekonomi',
                'slug' => 'pe',
                'level' => 'S2',
            ],
        ]);
    }
}
