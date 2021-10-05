<?php

namespace Database\Seeders;

use App\Models\DrivingLicense;
use Illuminate\Database\Seeder;

class DrivingLicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DrivingLicense::create(['group' => 'A']);
        DrivingLicense::create(['group' => 'B']);
        DrivingLicense::create(['group' => 'C']);
        DrivingLicense::create(['group' => 'D']);
        DrivingLicense::create(['group' => 'E']);
        DrivingLicense::create(['group' => 'T']);
    }
}
