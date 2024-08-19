<?php

namespace Database\Seeders;

use App\Models\SceduleClasses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SceduleClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SceduleClasses::factory()->count(10)->create();
    }
}