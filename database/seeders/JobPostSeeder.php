<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobPosts = [
            [
                'employer_id' => 1,
                'title' => 'Frontend Developer',
                'location' => 'Jakarta Selatan',
                'job_type' => 'full-time',
                'contact_email' => 'frontend.hr@techdigital.co.id',
                'contact_phone' => '987-654-3201',
                'description' => 'Kami mencari Frontend Developer berpengalaman untuk bergabung dengan tim pengembangan aplikasi web.',
                'requirements' => 'Pengalaman minimal 2 tahun dalam pengembangan frontend dengan React atau Vue.js.',
                'salary' => 75000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employer_id' => 2,
                'title' => 'Backend Engineer',
                'location' => 'Bandung',
                'job_type' => 'full-time',
                'contact_email' => 'backend.recruitment@cloudtech.com',
                'contact_phone' => '987-654-3202',
                'description' => 'Bergabunglah dengan tim kami sebagai Backend Engineer untuk membangun sistem API yang skalabel.',
                'requirements' => 'Pengalaman minimal 3 tahun dengan Node.js atau Laravel.',
                'salary' => 85000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employer_id' => 3,
                'title' => 'UI/UX Designer',
                'location' => 'Surabaya',
                'job_type' => 'part-time',
                'contact_email' => 'uiux.hiring@designhub.co.id',
                'contact_phone' => '987-654-3203',
                'description' => 'Kami membutuhkan UI/UX Designer kreatif untuk mendesain antarmuka aplikasi mobile dan web.',
                'requirements' => 'Menguasai Figma atau Adobe XD.',
                'salary' => 60000,
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employer_id' => 4,
                'title' => 'Digital Marketing Specialist',
                'location' => 'Yogyakarta',
                'job_type' => 'freelance',
                'contact_email' => 'marketing.talent@adsmax.co.id',
                'contact_phone' => '987-654-3204',
                'description' => 'Kami mencari Digital Marketing Specialist untuk mengelola kampanye media sosial.',
                'requirements' => 'Pengalaman dalam Facebook Ads dan Google Ads.',
                'salary' => 50000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employer_id' => 5,
                'title' => 'Data Analyst',
                'location' => 'Medan',
                'job_type' => 'full-time',
                'contact_email' => 'data.hr@insighttech.co.id',
                'contact_phone' => '987-654-3205',
                'description' => 'Kami sedang mencari Data Analyst untuk menganalisis data pelanggan dan memberikan wawasan bisnis.',
                'requirements' => 'Pengalaman dengan Python dan SQL.',
                'salary' => 90000,
                'status' => 'closed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employer_id' => 1,
                'title' => 'Content Writer',
                'location' => 'Semarang',
                'job_type' => 'part-time',
                'contact_email' => 'content.talent@mediakreatif.com',
                'contact_phone' => '987-654-3206',
                'description' => 'Bergabunglah sebagai Content Writer untuk membuat konten blog dan media sosial.',
                'requirements' => 'Memiliki kemampuan menulis kreatif dan pengetahuan SEO.',
                'salary' => 45000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employer_id' => 2,
                'title' => 'Project Manager',
                'location' => 'Denpasar',
                'job_type' => 'full-time',
                'contact_email' => 'pm.hiring@projectpro.co.id',
                'contact_phone' => '987-654-3207',
                'description' => 'Kami mencari Project Manager yang berpengalaman untuk mengelola proyek IT.',
                'requirements' => 'Pengalaman minimal 5 tahun dalam manajemen proyek.',
                'salary' => 110000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employer_id' => 3,
                'title' => 'Graphic Designer',
                'location' => 'Malang',
                'job_type' => 'freelance',
                'contact_email' => 'design.talent@creatif.com',
                'contact_phone' => '987-654-3208',
                'description' => 'Kami membutuhkan Graphic Designer untuk mendesain materi pemasaran.',
                'requirements' => 'Menguasai Adobe Photoshop dan Illustrator.',
                'salary' => 55000,
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employer_id' => 4,
                'title' => 'Network Engineer',
                'location' => 'Makassar',
                'job_type' => 'full-time',
                'contact_email' => 'network.hr@techlink.com',
                'contact_phone' => '987-654-3209',
                'description' => 'Kami mencari Network Engineer untuk mengelola infrastruktur jaringan perusahaan.',
                'requirements' => 'Pengalaman dengan Cisco atau Mikrotik.',
                'salary' => 95000,
                'status' => 'closed',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'employer_id' => 5,
                'title' => 'Sales Executive',
                'location' => 'Balikpapan',
                'job_type' => 'part-time',
                'contact_email' => 'sales.hiring@bestsales.co.id',
                'contact_phone' => '987-654-3210',
                'description' => 'Bergabunglah sebagai Sales Executive untuk meningkatkan penjualan produk kami.',
                'requirements' => 'Pengalaman minimal 2 tahun di bidang penjualan.',
                'salary' => 70000,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('job_posts')->insert($jobPosts);
    }
}
