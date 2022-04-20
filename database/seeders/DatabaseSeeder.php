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
        $period = CarbonPeriod::create(Carbon::now(), 10);

        // Iterate over the period
        foreach ($period as $date) {
            echo $date->format('Y-m-d');
        }
        // Convert the period to an array of dates
        $dates = $period->toArray();
        $timeSlots =TimeSlot::all()->where('active',1);
        // \App\Models\User::factory(10)->create();
//         \App\Models\Doctor::factory(10)->create();
//         \App\Models\DoctorType::factory(10)->create();
//         \App\Models\Patient::factory(10)->create();
        $doctors = Doctor::all();
        foreach ($doctors as $doctor) {
            foreach ($dates as $date) {
                foreach ($timeSlots as $timeSlot){
                    Appointment::create([
                        'doctor_id' => $doctor->id,
                        'approved' => true,
                        'date' => $date,
                        'time_slot_id' => $timeSlot->id,
                        'patient_name'=> 'John Legend'
                    ]);
                }
            };
        }


    }
}
