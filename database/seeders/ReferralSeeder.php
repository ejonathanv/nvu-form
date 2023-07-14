<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Referral;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReferralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Referral::factory()->create([
            'user_id' => User::factory()->create([
                'name' => 'Moises Bustamante',
                'email' => 'moises@bustamante.com',
                'password' => bcrypt('password'),
            ]),
            'code' => 'moises-bustamante',
        ]);

        Referral::factory()->create([
            'user_id' => User::factory()->create([
                'name' => 'Jonathan Velazquez',
                'email' => 'jonathan@velazquez.com',
                'password' => bcrypt('password'),
            ]),
            'code' => 'jonathan-velazquez',
            'default' => true,
        ]);
    }
}
