<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::insert([
            [
                'name' => "Algoritma dan Permrogramman"
            ],
            [
                'name' => "Pancasila"
            ],
            [
                'name' => "Komputer Masyarakat"
            ],
            [
                'name' => "Pengantar Teknologi Informasi"
            ],
            [
                'name' => "Manajemen Umum"
            ],
            [
                'name' => "Logika Informatika"
            ],
            [
                'name' => "Kalkulus"
            ],
        ]);
    }
}
