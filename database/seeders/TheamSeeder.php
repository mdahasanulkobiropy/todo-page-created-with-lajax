<?php

namespace Database\Seeders;

use App\Models\Theam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TheamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Theam::insert([
            'theam' => '0'
        ]);
    }
}
