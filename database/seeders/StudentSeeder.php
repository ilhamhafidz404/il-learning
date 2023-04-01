<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $students = [
        //     'man', "man",
        //     "man", "woman",
        //     "man", "woman",
        //     "man", "man",
        //     "man", "man",
        //     "woman", "man",
        //     "man", "woman",
        //     "man", "woman",
        //     "man", "man",
        //     "man", "man",
        //     "woman", "man",
        //     "man", "man",
        // ];

        // foreach ($students as $index => $student) {
        //     if ($student == 'man') {
        //         if ($index % 2 == 0) {
        //             $profile = 'profile/man1.jpg';
        //         } elseif ($index % 3 == 0) {
        //             $profile = 'profile/man2.jpg';
        //         } else {
        //             $profile = 'profile/man3.jpg';
        //         }
        //     } else {
        //         if ($index % 2 == 0) {
        //             $profile = 'profile/man1.jpg';
        //         } elseif ($index % 3 == 0) {
        //             $profile = 'profile/man2.jpg';
        //         } else {
        //             $profile = 'profile/man3.jpg';
        //         }
        //     }
        //     if ($index < 10) {
        //         $nim = '2022081000' . $index + 1;
        //     } else {
        //         $nim = '202208100' . $index + 1;
        //     }
        //     Student::insert([
        //         [
        //             'nim' => $nim,
        //             'user_id' => $index + 1,
        //             'classroom_id' => 1,
        //             'profile' => $profile,
        //         ],
        //     ]);
        // }

        Student::insert([
            [
                'nim' => '20220810052',
                'user_id' => 1,
                'classroom_id' => 1,
                'profile' => 'profile/man1.jpg'
            ],
            [
                'nim' => '20220810053',
                'user_id' => 2,
                'classroom_id' => 2,
                'profile' => 'profile/man3.jpg'
            ],
        ]);
    }
}
