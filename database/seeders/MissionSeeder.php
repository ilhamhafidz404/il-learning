<?php

namespace Database\Seeders;

use App\Models\Mission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mission::insert([
            [
                'name' => 'Modul 1',
                'slug' => 'modul-1',
                'course_id' => 1,
            ],
            [
                'name' => 'Modul 2',
                'slug' => 'modul-2',
                'course_id' => 1,
            ],
        ]);
    }
}
