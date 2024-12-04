<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployerProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employerProfiles = [
            [
                'user_id' => 2, // Employer pertama
                'company_name' => 'PT Digital Inovasi Nusantara',
                'company_description' => 'Perusahaan teknologi yang fokus pada pengembangan aplikasi berbasis cloud.',
                'industry' => 'Teknologi Informasi',
                'website' => 'https://digitalinovasi.co.id',
                'phone' => '123-456-7801',
                'address' => 'Jl. Sudirman No. 45, Jakarta Selatan',
                'logo' => 'logos/digitalinovasi.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // Employer kedua
                'company_name' => 'PT Karya Makmur Sejahtera',
                'company_description' => 'Perusahaan manufaktur yang bergerak di bidang produk konsumen.',
                'industry' => 'Manufaktur',
                'website' => 'https://karyamakmur.co.id',
                'phone' => '123-456-7802',
                'address' => 'Jl. Gatot Subroto No. 88, Bandung',
                'logo' => 'logos/karyamakmur.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4, // Employer ketiga
                'company_name' => 'PT Media Kreatif Nusantara',
                'company_description' => 'Agensi kreatif yang menyediakan layanan desain grafis dan digital marketing.',
                'industry' => 'Media dan Kreatif',
                'website' => 'https://mediakreatif.co.id',
                'phone' => '123-456-7803',
                'address' => 'Jl. Ahmad Yani No. 23, Surabaya',
                'logo' => 'logos/mediakreatif.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5, // Employer keempat
                'company_name' => 'PT Teknologi Jaya Abadi',
                'company_description' => 'Startup yang bergerak di bidang pengembangan perangkat lunak dan konsultasi IT.',
                'industry' => 'Teknologi Informasi',
                'website' => 'https://teknologijaya.com',
                'phone' => '123-456-7804',
                'address' => 'Jl. Pangeran Antasari No. 55, Yogyakarta',
                'logo' => 'logos/teknologijaya.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 6, // Employer kelima
                'company_name' => 'PT Sahabat Solusi Bisnis',
                'company_description' => 'Konsultan bisnis yang membantu UMKM dalam pengelolaan keuangan dan pemasaran.',
                'industry' => 'Konsultasi Bisnis',
                'website' => 'https://sahabatsolusi.co.id',
                'phone' => '123-456-7805',
                'address' => 'Jl. Dr. Sutomo No. 99, Makassar',
                'logo' => 'logos/sahabatsolusi.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('employer_profiles')->insert($employerProfiles);
    }
}
