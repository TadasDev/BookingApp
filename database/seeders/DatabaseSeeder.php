<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\TimeSlot;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
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

        // \App\Models\User::factory(10)->create();
         \App\Models\Doctor::factory(10)->create();
         \App\Models\DoctorType::factory(10)->create();
//         \App\Models\Patient::factory(10)->create();

    }
}
