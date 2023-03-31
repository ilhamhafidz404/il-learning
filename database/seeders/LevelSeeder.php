<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::insert([
            [
                'name' => "S1",
                'slug' => "s1",
                'description' => '-'
            ],
            [
                'name' => "S2",
                'slug' => "s2",
                'description' => '-'
            ],
            [
                'name' => "S3",
                'slug' => "s3",
                'description' => '-'
            ],
            [
                'name' => "D3",
                'slug' => "d3",
                'description' => '-'
            ],
        ]);
    }
}
