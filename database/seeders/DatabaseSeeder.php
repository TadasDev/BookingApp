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
//         \App\Models\Doctor::factory(10)->create();
//         \App\Models\DoctorType::factory(10)->create();
//         \App\Models\Patient::factory(10)->create();

        $startDate = Carbon::createFromFormat('Y-m-d', '2022-05-01');
        $endDate = Carbon::createFromFormat('Y-m-d', '2022-06-01');

        $period = CarbonPeriod::create($startDate, $endDate);

        // Convert the period to an array of dates
        $dates = $period->toArray();
        $timeSlots = TimeSlot::all()->where('active', 1);
        $doctors = Doctor::all();
        foreach ($doctors as $doctor) {
            foreach ($dates as $date) {
                if (!$date->isWeekend()) {
                    foreach ($timeSlots as $timeSlot) {
                        Appointment::create([
                            'doctor_id' => $doctor->id,
                            'approved' => true,
                            'date' => $date,
                            'time_slot_id' => $timeSlot->id,
                            'patient_name' => null
                        ]);
                    }
                }
            };
        }


    }
}
