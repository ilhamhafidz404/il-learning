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
                'name' => "TINFC-2022-01"
            ],
            [
                'name' => "TINFC-2022-02"
            ],
            [
                'name' => "TINFC-2022-03"
            ],
            [
                'name' => "TINFC-2022-04"
            ],
        ]);
    }
}
