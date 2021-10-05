<?php

namespace Database\Seeders;

use App\Models\LanguageLevel;
use Illuminate\Database\Seeder;

class LanguageLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LanguageLevel::create(['name' => 'Úplný začiatočník (A1)']);
        LanguageLevel::create(['name' => 'Začiatočník (A2)']);
        LanguageLevel::create(['name' => 'Mierne pokročilý (B1)']);
        LanguageLevel::create(['name' => 'Stredne pokročilý (B2)']);
        LanguageLevel::create(['name' => 'Pokročilý (C1)']);
        LanguageLevel::create(['name' => 'Expert (C2)']);
    }
}
