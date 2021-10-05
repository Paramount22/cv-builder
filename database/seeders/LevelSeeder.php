<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create(['name' => 'Začiatočník']);
        Level::create(['name' => 'Mierne pokročilý']);
        Level::create(['name' => 'Pokročilý']);
        Level::create(['name' => 'Expert']);
    }
}
