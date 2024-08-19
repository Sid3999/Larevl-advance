<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       User::factory()->create([
        'name' => 'siddique',
        'email' => 'siddique.softech@gmail.com'
       ]);
       User::factory()->create([
        'name' => 'member',
        'email' => 'member@gmail.com'
       ]);
       User::factory()->create([
        'name' => 'instructor',
        'email' => 'instructor@gmail.com',
        'role' => 'instructor'
       ]);
       User::factory()->create([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'role' => 'admin'
       ]);
      User::factory()->count(10)->create();
      User::factory()->count(10)->create([
        'role' => 'instructor'
      ]);

    }
}
