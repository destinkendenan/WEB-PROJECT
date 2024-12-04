<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeekerProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobSeekers = [
            [
                'user_id' => 7, // User ID untuk Job Seeker pertama
                'full_name' => 'Rizky Pratama',
                'date_of_birth' => '1998-04-15',
                'gender' => 'Male',
                'phone' => '0812-3456-7891',
                'address' => 'Jl. Merdeka No. 45, Jakarta Pusat',
                'bio' => 'Saya adalah seorang lulusan Teknik Informatika yang memiliki pengalaman dalam pengembangan web frontend.',
                'cv' => 'cvs/rizky_pratama_cv.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 8, // User ID untuk Job Seeker kedua
                'full_name' => 'Siti Nurhaliza',
                'date_of_birth' => '1997-06-21',
                'gender' => 'Female',
                'phone' => '0813-5678-1234',
                'address' => 'Jl. Sudirman No. 88, Bandung',
                'bio' => 'Lulusan Manajemen Bisnis dengan pengalaman dalam administrasi dan manajemen proyek.',
                'cv' => 'cvs/siti_nurhaliza_cv.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 9, // User ID untuk Job Seeker ketiga
                'full_name' => 'Andi Setiawan',
                'date_of_birth' => '1995-09-30',
                'gender' => 'Male',
                'phone' => '0814-7890-5678',
                'address' => 'Jl. Diponegoro No. 12, Surabaya',
                'bio' => 'Saya adalah seorang Desainer Grafis yang berfokus pada desain UI/UX dan branding.',
                'cv' => 'cvs/andi_setiawan_cv.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 10, // User ID untuk Job Seeker keempat
                'full_name' => 'Dewi Lestari',
                'date_of_birth' => '2000-01-05',
                'gender' => 'Female',
                'phone' => '0815-1234-5678',
                'address' => 'Jl. Ahmad Yani No. 23, Yogyakarta',
                'bio' => 'Fresh graduate dari Teknik Sipil dengan minat dalam pengelolaan proyek konstruksi.',
                'cv' => 'cvs/dewi_lestari_cv.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 11, // User ID untuk Job Seeker kelima
                'full_name' => 'Budi Santoso',
                'date_of_birth' => '1996-11-12',
                'gender' => 'Male',
                'phone' => '0816-7890-1234',
                'address' => 'Jl. Hasanuddin No. 55, Makassar',
                'bio' => 'Saya memiliki pengalaman sebagai Data Analyst dengan kemampuan dalam pengolahan data menggunakan Python dan SQL.',
                'cv' => 'cvs/budi_santoso_cv.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('job_seeker_profiles')->insert($jobSeekers);
    }
}
