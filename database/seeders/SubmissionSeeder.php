<?php

namespace Database\Seeders;

use App\Models\Submission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Submission::insert([
            [
                'name' => "Modul 1",
                'slug' => "modul1",
                'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, amet unde eos perferendis molestias, modi similique omnis, minima mollitia quis a cupiditate dolor cumque fugiat. Natus suscipit quibusdam pariatur ratione.",
                'deadline' => "2023-01-10",
                "lecturer_id" => 1,
                "course_id" => 1,
                "classroom_id" => 1,
            ],
            [
                'name' => "Modul 2",
                'slug' => "modul2",
                'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, amet unde eos perferendis molestias, modi similique omnis, minima mollitia quis a cupiditate dolor cumque fugiat. Natus suscipit quibusdam pariatur ratione.",
                'deadline' => "2023-01-10",
                "lecturer_id" => 1,
                "course_id" => 1,
                "classroom_id" => 1,
            ],
            [
                'name' => "Modul 3",
                'slug' => "modul3",
                'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, amet unde eos perferendis molestias, modi similique omnis, minima mollitia quis a cupiditate dolor cumque fugiat. Natus suscipit quibusdam pariatur ratione.",
                'deadline' => "2023-01-10",
                "lecturer_id" => 1,
                "course_id" => 1,
                "classroom_id" => 1,
            ],
        ]);
    }
}
