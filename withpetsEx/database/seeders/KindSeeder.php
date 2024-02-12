<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kind;

class KindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kind::create([
            'name' => 'ミックス',
        ]);
        Kind::create([
            'name' => 'アメリカンショートヘア',
        ]);
        Kind::create([
            'name' => 'スコティッシュフォールド',
        ]);
        Kind::create([
            'name' => 'ノルウェージャンフォレストキャット',
        ]);
        Kind::create([
            'name' => 'マンチカン',
        ]);
    }
}
