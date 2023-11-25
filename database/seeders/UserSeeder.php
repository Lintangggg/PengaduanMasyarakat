<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('petugas')->insert([
            'nama_petugas' => 'Lintang',
            'username' => 'LTG',
            'password' => Hash::make(12345),
            'telp' => '0853294532',
            'level' => 'admin',
        ]
        );

        DB::table('petugas')->insert([
        'nama_petugas' => 'Raihan',
        'username' => 'EAN',
        'password' => Hash::make(12345),
        'telp' => '0853294532',
        'level' => 'admin',
        ]
        );

        DB::table('petugas')->insert([
            'nama_petugas' => 'Azhar',
            'username' => 'Sirip',
            'password' => Hash::make(12345),
            'telp' => '0853294532',
            'level' => 'admin',
            ]
            );
    }
}
