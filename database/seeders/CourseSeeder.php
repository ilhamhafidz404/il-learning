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
                'name' => "Algoritma dan Permrogramman",
                'slug' => "algoritma-dan-permrogramman",
                'sks' => 3
            ],
            [
                'name' => "Pancasila",
                'slug' => "pancasila",
                'sks' => 2
            ],
            [
                'name' => "Manajemen Umum",
                'slug' => "manajemen-umum",
                'sks' => 2
            ],
            [
                'name' => "Desain Grafis",
                'slug' => "desain-grafis",
                'sks' => 2
            ],
            [
                'name' => "Komputer Masyarakat",
                'slug' => "komputer-masyarakat",
                'sks' => 2
            ],
            [
                'name' => "Pengantar Teknologi Informasi",
                'slug' => "pengantar-teknologi-informasi",
                'sks' => 2
            ],
            [
                'name' => "Kalkulus",
                'slug' => "kalkulus",
                'sks' => 3
            ],
            [
                'name' => "Bahasa Inggris",
                'slug' => "bahasa-inggris",
                'sks' => 2
            ],
            [
                'name' => "Logika Informatika",
                'slug' => "logika-informatika",
                'sks' => 2
            ],
        ]);
    }
}
