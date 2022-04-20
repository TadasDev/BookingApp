<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\TimeSlot;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
       //doesn't work
        return [
                    'doctor_id' =>Doctor::all()->random()->id,
                    'approved' => $this->faker->boolean(true),
                    'date' => Carbon::now(),
                    'time_slot_id' => TimeSlot::all()->where('active', 1)->unique()->random()->id,
                    'patient_name'=>$this->faker->name,
                ];

    }
}
