<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class WebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('web_settings')->insert([
            'id' => '1',
            // GENERAL INFO ACCOUNT
            'name' => 'StarterKit',
            'image' => 'logo.png',
            'head_title' => 'Abadikan Semua Momen Anda',
            'head_desc' => 'Kami membantu anda dalam mengabadikan setiap momen yang tak terlupakan.',
            'site_phone' => '+62812-8069-6486',
            'site_mail' => 'ariapratama850@gmail.com',
            'site_link' => 'http://www.facebook.com/kyouma052',
        ]);
        DB::table('pakets')->insert([
            'id' => '1',
            // GENERAL INFO ACCOUNT
            'name' => 'Paket A',
            'image' => 'paket-a.jpg',
            'slug' => 'paket-a',
            'price' => '80000',
            'description' => 'Gratis 3 Foto',
        ]);
        DB::table('pakets')->insert([
            'id' => '2',
            // GENERAL INFO ACCOUNT
            'name' => 'Paket B',
            'image' => 'paket-b.jpg',
            'slug' => 'paket-b',
            'price' => '100000',
            'description' => 'Gratis 5 Foto',
        ]);
        DB::table('pakets')->insert([
            'id' => '3',
            // GENERAL INFO ACCOUNT
            'name' => 'Paket C',
            'image' => 'paket-c.jpg',
            'slug' => 'paket-c',
            'price' => '150000',
            'description' => 'Gratis 15 Foto',
        ]);
        DB::table('pakets')->insert([
            'id' => '4',
            // GENERAL INFO ACCOUNT
            'name' => 'Paket D',
            'image' => 'paket-d.jpg',
            'slug' => 'paket-d',
            'price' => '200000',
            'description' => 'Gratis 20 Foto',
        ]);
    }
}
