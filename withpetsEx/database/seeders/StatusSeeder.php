<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //ステータステーブルにデータを挿入
        Status::create([
            'name' => '準備中',
        ]);
        Status::create([
            'name' => '里親募集中',
        ]);
        Status::create([
            'name' => '譲渡済',
        ]);
    }
}
