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
                'description' => 'no description',
                'sks' => 3
            ],
            [
                'name' => "Pancasila",
                'slug' => "pancasila",
                'description' => 'no description',
                'sks' => 2
            ],
            [
                'name' => "Manajemen Umum",
                'slug' => "manajemen-umum",
                'description' => 'no description',
                'sks' => 2
            ],
            [
                'name' => "Desain Grafis",
                'slug' => "desain-grafis",
                'description' => 'no description',
                'sks' => 2
            ],
            [
                'name' => "Komputer Masyarakat",
                'slug' => "komputer-masyarakat",
                'description' => 'no description',
                'sks' => 2
            ],
            [
                'name' => "Pengantar Teknologi Informasi",
                'slug' => "pengantar-teknologi-informasi",
                'description' => 'no description',
                'sks' => 2
            ],
            [
                'name' => "Kalkulus",
                'slug' => "kalkulus",
                'description' => 'no description',
                'sks' => 3
            ],
            [
                'name' => "Bahasa Inggris",
                'slug' => "bahasa-inggris",
                'description' => 'no description',
                'sks' => 2
            ],
            [
                'name' => "Logika Informatika",
                'slug' => "logika-informatika",
                'description' => 'no description',
                'sks' => 2
            ],
        ]);
    }
}
