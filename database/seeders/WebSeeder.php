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
        $now = \Carbon\Carbon::now();
        DB::table('web_settings')->insert([
            'id' => '1',
            'name' => 'ARShoot',
            'image' => 'logo.png',
            'head_title' => 'Abadikan Semua Momen Anda',
            'head_desc' => 'Kami membantu anda dalam mengabadikan setiap momen yang tak terlupakan.',
            'site_phone' => '+62812-8069-6486',
            'site_mail' => 'ariapratama850@gmail.com',
            'site_link' => 'http://www.facebook.com/kyouma052',
            'created_at' => $now,

        ]);
        // DAFTAR PAKET
        DB::table('pakets')->insert([
            'id' => '1',
            'cpaket_id' => '3',
            'user_id' => '4',
            'image' => 'paket-a.jpg',
            'name' => 'Engagement File',
            'slug' => 'engagement-file',
            'price' => '350000',
            'description' => '<ul><li>All Soft File DVD + Google Drive</li></ul>',
            'created_at' => $now,
        ]);
        DB::table('pakets')->insert([
            'id' => '2',
            'cpaket_id' => '3',
            'user_id' => '4',
            'image' => 'paket-d.jpg',
            'name' => 'Engagement 1 Roll',
            'slug' => 'engagement-1-roll',
            'price' => '550000',
            'description' => '<ul><li>1 Album Magnetic</li><li>Cetak 36 4R + Cover 10R</li><li>Soft Copy File DVD</li></ul>',
            'created_at' => $now,
        ]);
        DB::table('pakets')->insert([
            'id' => '3',
            'cpaket_id' => '3',
            'user_id' => '4',
            'image' => 'paket-c.jpg',
            'name' => 'Engagement 2 Role',
            'slug' => 'engagement-2-role',
            'price' => '1000000',
            'description' => '<ul><li>1 Album Magnetic</li><li>Cetak 76 4R + Cover 30x30</li><li>Soft Copy File DVD</li></ul>',
            'created_at' => $now,
        ]);
        // WEDDING
        DB::table('pakets')->insert([
            'id' => '4',
            'cpaket_id' => '12',
            'user_id' => '4',
            'image' => 'paket-a.jpg',
            'name' => 'Package A',
            'slug' => 'package-a',
            'price' => '5000000',
            'description' => '<ul><li>1 Album Magazine 20x30, 1 Album Magnetic</li><li>Video Cinematic, Free Cetak 16RP + Frame</li><li>All Soft file Flashdisk, Kerja Sampai Jam 7</li></ul>',
            'created_at' => $now,
        ]);
        DB::table('pakets')->insert([
            'id' => '5',
            'cpaket_id' => '12',
            'user_id' => '4',
            'image' => 'paket-b.jpg',
            'name' => 'Package B',
            'slug' => 'package-b',
            'price' => '3500000',
            'description' => '<ul><li>1 Album Magazine 20x30, Video Cinematic</li><li>Free Cetak 12RP + Frame</li><li>All Soft file Flashdisk, Kerja Sampai Jam 6</li></ul>',
            'created_at' => $now,
        ]);
        DB::table('pakets')->insert([
            'id' => '6',
            'cpaket_id' => '12',
            'user_id' => '4',
            'image' => 'paket-c.jpg',
            'name' => 'Package C',
            'slug' => 'package-c',
            'price' => '3000000',
            'description' => '<ul><li>1 Album Magazine Mini, 1 Album Magnetic</li><li>Video Liputan</li><li>All Soft file Flashdisk, Kerja Sampai Jam 6</li></ul>',
            'created_at' => $now,
        ]);
        DB::table('pakets')->insert([
            'id' => '7',
            'cpaket_id' => '12',
            'user_id' => '4',
            'image' => 'paket-d.jpg',
            'name' => 'Package D',
            'slug' => 'package-d',
            'price' => '1500000',
            'description' => '<ul><li>1 Album Magnetic</li><li>Cetak 114 4R & Cover 30x30</li><li>All Soft file Flashdisk, Kerja Sampai Jam 5</li></ul>',
            'created_at' => $now,
        ]);
        DB::table('pakets')->insert([
            'id' => '8',
            'cpaket_id' => '12',
            'user_id' => '4',
            'image' => 'paket-a.jpg',
            'name' => 'Standard Package A',
            'slug' => 'standard-package-a',
            'price' => '1000000',
            'description' => '<ul><li>1 Album Magnetic</li><li>Cetak 76 4R & Cover 30x30</li><li>Soft file DVD</li></ul>',
            'created_at' => $now,
        ]);
        DB::table('pakets')->insert([
            'id' => '9',
            'cpaket_id' => '12',
            'user_id' => '4',
            'image' => 'paket-b.jpg',
            'name' => 'Standard Package B',
            'slug' => 'standard-package-b',
            'price' => '500000',
            'description' => '<ul><li>1 Album Magnetic</li><li>Cetak 36 4R & Cover 8R</li><li>Soft file DVD</li></ul>',
            'created_at' => $now,
        ]);

        // KATEGORI PAKET
        DB::table('paket_kategoris')->insert([
            'id' => '1',
            'name' => 'Beautyshoot',
            'slug' => 'beautyshoot',
            'created_at' => $now,
        ]);
        DB::table('paket_kategoris')->insert([
            'id' => '2',
            'name' => 'Couple & Prewedding',
            'slug' => 'couple-and-prewedding',
            'created_at' => $now,

        ]);
        DB::table('paket_kategoris')->insert([
            'id' => '3',
            'name' => 'Engagement',
            'slug' => 'engagement',
            'created_at' => $now,

        ]);
        DB::table('paket_kategoris')->insert([
            'id' => '4',
            'name' => 'Family',
            'slug' => 'family',
            'created_at' => $now,

        ]);
        DB::table('paket_kategoris')->insert([
            'id' => '5',
            'name' => 'Food & Product',
            'slug' => 'food-and-product',
            'created_at' => $now,

        ]);
        DB::table('paket_kategoris')->insert([
            'id' => '6',
            'name' => 'Friend & Group',
            'slug' => 'friend-and-group',
            'created_at' => $now,

        ]);
        DB::table('paket_kategoris')->insert([
            'id' => '7',
            'name' => 'Graduation',
            'slug' => 'graduation',
            'created_at' => $now,

        ]);
        DB::table('paket_kategoris')->insert([
            'id' => '8',
            'name' => 'Hunting & Concept',
            'slug' => 'hunting-and-concept',
            'created_at' => $now,

        ]);
        DB::table('paket_kategoris')->insert([
            'id' => '9',
            'name' => 'Kids & Birthday',
            'slug' => 'kids-and-birthday',
            'created_at' => $now,

        ]);
        DB::table('paket_kategoris')->insert([
            'id' => '10',
            'name' => 'Maternity & Siraman',
            'slug' => 'maternity-and-siraman',
            'created_at' => $now,

        ]);
        DB::table('paket_kategoris')->insert([
            'id' => '11',
            'name' => 'Walimatul Khitan & Rasul',
            'slug' => 'walimatul-khitan-and-rasul',
            'created_at' => $now,

        ]);
        DB::table('paket_kategoris')->insert([
            'id' => '12',
            'name' => 'Wedding',
            'slug' => 'wedding',
            'created_at' => $now,

        ]);
    }
}
