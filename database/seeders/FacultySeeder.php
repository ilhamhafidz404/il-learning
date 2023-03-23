<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faculty::insert([
            [
                'name' => 'Komputer',
                'slug' => 'fkom',
                'code' => '01',
                'description' => '-'
            ],
            [
                'name' => 'Ilmu Kependidikan',
                'slug' => 'fkip',
                'code' => '02',
                'description' => '-'
            ],
        ]);
    }
}
