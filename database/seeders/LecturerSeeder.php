<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lecturer::insert([
            [
                'user_id' => 3,
                'profile' => 'profile/woman3.jpg',
                'nip' => '2022080876',
                'gender' => 'woman'
            ],
            [
                'user_id' => 4,
                'profile' => 'profile/man2.jpg',
                'nip' => '2022088896',
                'gender' => 'man'
            ],
        ]);
    }
}
