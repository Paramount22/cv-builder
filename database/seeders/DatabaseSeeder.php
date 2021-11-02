<?php

namespace Database\Seeders;


use App\Models\LanguageLevel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(3)->create();
        $this->call(LevelSeeder::class);
        $this->call(DrivingLicenseSeeder::class);
        $this->call(LanguageLevelSeeder::class);

    }
}
