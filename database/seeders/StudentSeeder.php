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
        Student::insert([
            [
                'nim' => '20220810052',
                'user_id' => 1,
                'classroom_id' => 1,
                'profile' => 'profile/man1.jpg',
                'semester' => 1
            ],
            [
                'nim' => '20220810053',
                'user_id' => 2,
                'classroom_id' => 2,
                'profile' => 'profile/man3.jpg',
                'semester' => 2
            ],
        ]);
    }
}
