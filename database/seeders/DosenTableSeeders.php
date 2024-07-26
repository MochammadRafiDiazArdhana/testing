<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DosenTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosen')->insert([
            'nip' => '20051214098',
            'nama' => 'Aries Dwi',
            'prodi' => 'Sistem Informasi',
            'password' => Hash::make('123456')
        ]);
    }
}
