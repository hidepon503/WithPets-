<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gender;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //性別テーブルにデータを挿入
        Gender::create([
            'name' => 'オス',
        ]);
        Gender::create([
            'name' => 'メス',
        ]);
    }
}
