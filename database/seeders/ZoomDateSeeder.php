<?php

namespace Database\Seeders;

use App\Models\ZoomDate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ZoomDateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ZoomDate::factory()->count(10)->create();
    }
}
