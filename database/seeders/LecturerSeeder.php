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
        $lecturer = [
            0, 1, 1, 1, 0, 1, 0, 1
        ];
        $j = 0;
        for ($i = 26; $i <= 33; $i++) {
            if ($lecturer[$j]) {
                $profile = 'profile/man1.jpg';
            } else {
                $profile = 'profile/woman1.jpg';
            }
            Lecturer::insert([
                [
                    'user_id' => $i,
                    'profile' => $profile,
                ],
            ]);
            $j++;
        }
    }
}
