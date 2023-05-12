<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::insert([
            'name' => 'Team',
            'color' => '#248c40'
        ]);
        Tag::insert([
            'name' => 'Low',
            'color' => '#821a6c'
        ]);
        Tag::insert([
            'name' => 'Hard',
            'color' => '#570930'
        ]);
        Tag::insert([
            'name' => 'High',
            'color' => '#94122a'
        ]);
    }
}
