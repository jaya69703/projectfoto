<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default Member
        DB::table('users')->insert([
            // GENERAL INFO ACCOUNT
            'name' => 'Member Account',
            'email' => 'useraccount@example.com',
            'image' => 'default.png',
            'phone' => '089612345679',
            'password' => Hash::make('useraccount'),
            // SPECIAL IDENTITY
            'code' => '000001',
            'isverify' => '1',
            'type' => '0',
        ]);
        // Default Member Plus
        DB::table('users')->insert([
            // GENERAL INFO ACCOUNT
            'name' => 'Member Plus',
            'email' => 'memberplus@example.com',
            'image' => 'default.png',
            'phone' => '089612345672',
            'password' => Hash::make('memberplus'),
            // SPECIAL IDENTITY
            'code' => '000002',
            'isverify' => '1',
            'type' => '1',
        ]);
        DB::table('members')->insert([
            // IDENTITAS PENGGUNA
            'member_name' => 'Member Plus',

            // PRIVATE IDENTITY
            'member_phone' => '089612345672',
            'member_email' => 'memberplus@example.com',

            // SPECIAL IDENTITY
            'code' => '000002',
        ]);
        // Default Author Account
        DB::table('users')->insert([
            // GENERAL INFO ACCOUNT
            'name' => 'Author',
            'email' => 'author@example.com',
            'image' => 'default.png',
            'phone' => '089612345677',
            'password' => Hash::make('author'),
            // SPECIAL IDENTITY
            'code' => '000003',
            'isverify' => '1',
            'type' => '2',
        ]);
        DB::table('authors')->insert([
            // IDENTITAS PENGGUNA
            'author_name' => 'Author',

            // PRIVATE IDENTITY
            'author_phone' => '089612345677',
            'author_email' => 'author@example.com',

            // SPECIAL IDENTITY
            'code' => '000003',
        ]);
        // Default Admin
        DB::table('users')->insert([
            // GENERAL INFO ACCOUNT
            'name' => 'Admin Account',
            'email' => 'adminaccount@example.com',
            'image' => 'default.png',
            'phone' => '089612345611',
            'password' => Hash::make('adminaccount'),
            // SPECIAL IDENTITY
            'code' => '000000',
            'isverify' => '1',
            'type' => '3',
        ]);
        // Default Super Admin
        DB::table('users')->insert([
            // GENERAL INFO ACCOUNT
            'name' => 'Super Administrator',
            'email' => 'superadmin@example.com',
            'image' => 'default.png',
            'phone' => '089612345678',
            'password' => Hash::make('20022003'),
            // SPECIAL IDENTITY
            'code' => '000004',
            'isverify' => '1',
            'type' => '4',
        ]);

    }
}
