<?php

namespace Database\Seeders\ManyToMany;

use App\Models\ManyToMany\ClassroomLecturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomLecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassroomLecturer::insert([
            [
                'classroom_id' => 1,
                'lecturer_id' => 1,
            ],
            [
                'classroom_id' => 1,
                'lecturer_id' => 2,
            ],
            [
                'classroom_id' => 1,
                'lecturer_id' => 3,
            ],
            [
                'classroom_id' => 1,
                'lecturer_id' => 4,
            ],
            [
                'classroom_id' => 1,
                'lecturer_id' => 5,
            ],
            [
                'classroom_id' => 1,
                'lecturer_id' => 6,
            ],
            [
                'classroom_id' => 1,
                'lecturer_id' => 7,
            ],
            [
                'classroom_id' => 1,
                'lecturer_id' => 8,
            ],
            [
                'classroom_id' => 1,
                'lecturer_id' => 9,
            ],
        ]);
    }
}
