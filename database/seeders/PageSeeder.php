<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pages')->insert([
            'page_id' => null,
            'page_type' => '0',
            'page_name' => 'Menu Utama',
            'page_desc' => 'Halaman Fungsional',
            'page_link' => '#',
        ]);
        // HALAMAN HOME
        DB::table('pages')->insert([
            'page_id' => '1',
            'page_type' => '1',
            'page_name' => 'Beranda',
            'page_desc' => 'Layanan Penyedia Jasa Fotografi',
            'page_link' => '/',
        ]);
        // HALAMAN ABOUT US
        DB::table('pages')->insert([
            'page_id' => '1',
            'page_type' => '1',
            'page_name' => 'Tentang Kami',
            'page_desc' => 'Halaman Informasi Mengenai Kami',
            'page_link' => 'about-us',
        ]);
        // HALAMAN SERVICES
        DB::table('pages')->insert([
            'page_id' => '1',
            'page_type' => '1',
            'page_name' => 'Layanan Kami',
            'page_desc' => 'Halaman Informasi Berisi Mengenai Layanan Kami',
            'page_link' => 'services',
        ]);
        // HALAMAN PROJECTS
        DB::table('pages')->insert([
            'page_id' => '1',
            'page_type' => '1',
            'page_name' => 'Portfolio Paket',
            'page_desc' => 'Halaman Informasi Berisi Mengenai Hasil Portofolio Kami',
            'page_link' => 'projects',
        ]);
        // HALAMAN BLOG
        DB::table('pages')->insert([
            'page_id' => '1',
            'page_type' => '1',
            'page_name' => 'Berita',
            'page_desc' => 'Halaman Informasi Berisi Berita Yang Menyangkut Kami',
            'page_link' => 'blog',
        ]);
        // HALAMAN CONTACT
        DB::table('pages')->insert([
            'page_id' => '1',
            'page_type' => '1',
            'page_name' => 'Kontak Kami',
            'page_desc' => 'Halaman Informasi Berisi Mengenai Kontak Kami',
            'page_link' => 'contact-us',
        ]);
    }
}
