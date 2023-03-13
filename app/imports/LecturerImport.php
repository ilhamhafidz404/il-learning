<?php

namespace App\Imports;

use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LecturerImport implements ToCollection, WithHeadingRow
{

    public function collection(Collection $rows)
    {
        Validator::make($rows->toArray(), [
            '*.0' => 'required',
            '*.1' => 'required',
            '*.2' => 'required|unique:lecturers,nip',
            '*.3' => 'required',
        ])->validate();

        foreach ($rows as $row) {
            $user = User::create([
                'name' => $row[0],
                'username' => Str::slug($row[0]),
                'password' => bcrypt('password'),
                'email' => $row[1],
            ]);

            if ($row[3] == 'man') {
                $profile = 'profile/man' . rand(1, 3) . '.jpg';
            } else {
                $profile = 'profile/woman' . rand(1, 3) . '.jpg';
            }

            Lecturer::create([
                'user_id' => $user->id,
                'profile' => $profile,
                'nip' => $row[2],
                'gender' => $row[3],
            ]);
        }
    }
}
