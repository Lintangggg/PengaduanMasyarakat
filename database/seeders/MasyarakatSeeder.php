<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MasyarakatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('masyarakat')->insert([
            'nik' => '123321',
            'nama' => 'Azhar',
            'username' => 'Sirip',
            'password' => Hash::make(12345),
            'telp' => '0853294532',
        ]
        );

        DB::table('masyarakat')->insert([
        'nik' => '456654',
        'nama' => 'Raihan',
        'username' => 'EAN',
        'password' => Hash::make(12345),
        'telp' => '0853294532',
        ]
        );

        DB::table('masyarakat')->insert([
            'nik' => '4543426654',
            'nama' => 'Rafly',
            'username' => 'Fly',
            'password' => hash('sha512', '12345'),
            'telp' => '0853294532',
            ]
            );
    }
}
