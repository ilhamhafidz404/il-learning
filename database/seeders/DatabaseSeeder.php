<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ManyToMany\CourseLecturer;
use Database\Seeders\ManyToMany\ClassroomLecturerSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            CourseSeeder::class,
            UserSeeder::class,
            LecturerSeeder::class,
            ClassroomSeeder::class,
            SubmissionSeeder::class,
            // 
            ClassroomLecturerSeeder::class
        ]);

        CourseLecturer::insert([
            [
                'course_id' => 1,
                'lecturer_id' => 1,
            ],
            [
                'course_id' => 2,
                'lecturer_id' => 2,
            ],
            [
                'course_id' => 3,
                'lecturer_id' => 3,
            ],
            [
                'course_id' => 4,
                'lecturer_id' => 4,
            ],
            [
                'course_id' => 5,
                'lecturer_id' => 5,
            ],
            [
                'course_id' => 6,
                'lecturer_id' => 5,
            ],
            [
                'course_id' => 7,
                'lecturer_id' => 6,
            ],
            [
                'course_id' => 8,
                'lecturer_id' => 7,
            ],
            [
                'course_id' => 9,
                'lecturer_id' => 8,
            ],
        ]);
    }
}
