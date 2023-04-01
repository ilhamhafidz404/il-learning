<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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
            StudentSeeder::class,
            LecturerSeeder::class,
            ClassroomSeeder::class,
            AdminSeeder::class,
            ProgramSeeder::class,
            FacultySeeder::class,
            LevelSeeder::class,
        ]);

        DB::table('course_lecturer')->insert([
            [
                'course_id' => 1,
                'lecturer_id' => 1
            ],
            [
                'course_id' => 2,
                'lecturer_id' => 2
            ],
            [
                'course_id' => 3,
                'lecturer_id' => 1
            ],
        ]);

        DB::table('classroom_lecturer')->insert([
            [
                'classroom_id' => 1,
                'lecturer_id' => 1
            ],
            [
                'classroom_id' => 2,
                'lecturer_id' => 1
            ],
            [
                'classroom_id' => 1,
                'lecturer_id' => 2
            ],
        ]);

        Setting::create([
            'sks_countdown' => null
        ]);
    }
}
