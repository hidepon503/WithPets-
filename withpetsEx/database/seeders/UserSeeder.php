<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => '保護団体A',
            'email' => 'sampl1@sample.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '保護団体B',
            'email' => 'sample2@sample.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '保護団体C',
            'email' => 'sample3@sample.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '保護団体D',
            'email' => 'sample4@sample.com',
            'password' => Hash::make('password'),
        ]);
        User::create([
            'name' => '保護団体E',
            'email' => 'sample5@sample.com',
            'password' => Hash::make('password'),
        ]);
    }
}
