<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            // Admin
            [
                'name' => 'Destin Kendenan',
                'email' => 'destin@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            // Employers
            [
                'name' => 'Ahmad Zulkifli',
                'email' => 'ahmad.zulkifli@perusahaandigital.com',
                'password' => Hash::make('password123'),
                'role' => 'employer',
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi.lestari@karyamakmur.co.id',
                'password' => Hash::make('password123'),
                'role' => 'employer',
            ],
            [
                'name' => 'Bayu Aditya',
                'email' => 'bayu.aditya@teknologitangguh.com',
                'password' => Hash::make('password123'),
                'role' => 'employer',
            ],
            [
                'name' => 'Siti Rahma',
                'email' => 'siti.rahma@mediasahabat.co.id',
                'password' => Hash::make('password123'),
                'role' => 'employer',
            ],
            [
                'name' => 'Faisal Akbar',
                'email' => 'faisal.akbar@innovatech.com',
                'password' => Hash::make('password123'),
                'role' => 'employer',
            ],
            // Job Seekers
            [
                'name' => 'Nur Hidayah',
                'email' => 'nur.hidayah@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'job_seeker',
            ],
            [
                'name' => 'Rendy Pratama',
                'email' => 'rendy.pratama@yahoo.com',
                'password' => Hash::make('password123'),
                'role' => 'job_seeker',
            ],
            [
                'name' => 'Lina Maharani',
                'email' => 'lina.maharani@outlook.com',
                'password' => Hash::make('password123'),
                'role' => 'job_seeker',
            ],
            [
                'name' => 'Andi Saputra',
                'email' => 'andi.saputra@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'job_seeker',
            ],
            [
                'name' => 'Rosa Amelia',
                'email' => 'rosa.amelia@gmail.com',
                'password' => Hash::make('password123'),
                'role' => 'job_seeker',
            ],
        ];

        DB::table('users')->insert($users);
    }
}
