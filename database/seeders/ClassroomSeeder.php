<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classroom::insert([
            [
                'name' => "TINFC-2022-01",
                'slug' => "tinfc-2022-01",
                'program_id' => 1,
                'mentor' => 'Rio Andriyat'
            ],
            [
                'name' => "TINFC-2022-02",
                'slug' => "tinfc-2022-02",
                'program_id' => 1,
                'mentor' => 'Sherly Gina'
            ],
            [
                'name' => "SINFC-2022-01",
                'slug' => "sinfc-2022-01",
                'program_id' => 3,
                'mentor' => 'Mamat'
            ],
        ]);
    }
}
