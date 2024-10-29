<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('labs')->insert([
            ['nama_lab' => 'Lab Biologi'],
            ['nama_lab' => 'Lab Komputasi Dasar']
        ]);
    }
}
