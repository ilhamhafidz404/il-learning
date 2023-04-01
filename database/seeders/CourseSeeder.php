<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::insert([
            [
                'name' => "Algoritma dan Permrogramman",
                'slug' => "algoritma-dan-permrogramman",
                'background' => 'course/bg' . rand(1, 15) . '.svg',
                'description' => 'Alogaritma pemograman merupakan urutan logis pengambilan suatu keputusan untuk memecahkan suatu masalah.kata-kata yang harus logis dalam memecahkan masalah yaitu langkah-langkah yang tidak benar akan membarikan hasil yang salah',
                'sks' => 3,
                'program_id' => 1
            ],
            [
                'name' => "Pancasila",
                'slug' => "pancasila",
                'background' => 'course/bg' . rand(1, 15) . '.svg',
                'description' => 'Pancasila adalah pilar ideologis negara Indonesia. Nama ini terdiri dari dua kata dari bahasa Sanskerta: पञ्च "pañca" berarti lima dan शीला "śīla" berarti prinsip atau asas. Pancasila merupakan rumusan dan pedoman kehidupan berbangsa dan bernegara bagi seluruh rakyat Indonesia',
                'sks' => 2,
                'program_id' => 1
            ],
            [
                'name' => "Manajemen Umum",
                'slug' => "manajemen-umum",
                'background' => 'course/bg' . rand(1, 15) . '.svg',
                'description' => 'manajemen adalah sebuah proses saat seseorang dapat mengelola semua hal yang dikerjakan oleh individu atau dalam sebuah kelompok demi mencapai tujuan bersama dengan sumber daya yang tersedia.',
                'sks' => 2,
                'program_id' => 1
            ],
            [
                'name' => "Desain Grafis",
                'slug' => "desain-grafis",
                'background' => 'course/bg' . rand(1, 15) . '.svg',
                'description' => 'Desain grafis atau rancang grafis adalah proses komunikasi menggunakan elemen visual, seperti tipografi, fotografi, serta ilustrasi yang dimaksudkan untuk menciptakan persepsi akan suatu pesan yang disampaikan. Bidang ini melibatkan proses komunikasi visual dan desain komunikasi.',
                'sks' => 2,
                'program_id' => 1
            ],
            [
                'name' => "Komputer Masyarakat",
                'slug' => "komputer-masyarakat",
                'background' => 'course/bg' . rand(1, 15) . '.svg',
                'description' => 'Sederhananya, Komputer dan Masyarakat adalah pemanfaatan komputer dari, oleh, dan untuk masyarakat/pengguna itu sendiri. Dalam pengertian lain, Komputer dan Masyarakat adalah interaksi antara teknologi (komputer) dan pengguna (masyarakat) untuk memudahkan menyelesaikan pekerjaan.',
                'sks' => 2,
                'program_id' => 1
            ],
            [
                'name' => "Pengantar Teknologi Informasi",
                'slug' => "pengantar-teknologi-informasi",
                'background' => 'course/bg' . rand(1, 15) . '.svg',
                'description' => 'no description',
                'sks' => 2,
                'program_id' => 1
            ],
            [
                'name' => "Kalkulus",
                'slug' => "kalkulus",
                'background' => 'course/bg' . rand(1, 15) . '.svg',
                'description' => 'Kalkulus adalah cabang ilmu matematika yang mencakup limit, turunan, integral, dan deret takterhingga. Kalkulus adalah ilmu yang mempelajari perubahan, sebagaimana geometri yang mempelajari bentuk dan aljabar yang mempelajari operasi dan penerapannya untuk memecahkan persamaan.',
                'sks' => 3,
                'program_id' => 1
            ],
            [
                'name' => "Bahasa Inggris",
                'slug' => "bahasa-inggris",
                'background' => 'course/bg' . rand(1, 15) . '.svg',
                'description' => 'no description',
                'sks' => 2,
                'program_id' => 1
            ],
            [
                'name' => "Logika Informatika",
                'slug' => "logika-informatika",
                'background' => 'course/bg' . rand(1, 15) . '.svg',
                'description' => 'Logika Informatika merupakan disiplin ilmu yang mempelajari transformasi data maupun informasi pada mesin berbasis komputasi dengan menggunakan penalaran sehingga didaptlah suatu kesimpulan (konklusi). Logika berasal dari bahasa Yunani, yaitu logos yang artinya kata, ucapan atau alasan.',
                'sks' => 2,
                'program_id' => 1
            ],
        ]);
    }
}
