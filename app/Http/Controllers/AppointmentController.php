<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppointmentUpdateRequest;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AppointmentController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointments = Doctor::find($id)->appointments;

        $appointmentsDates = Appointment::distinct()->get('date')->paginate(10);

        return view('appointments.list', compact('appointments', 'appointmentsDates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AppointmentUpdateRequest $request, Appointment $appointment)
    {
        $appointment->update($request->validated());

        return redirect()->back()->with('message', 'booked successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->patient_name = null;
        $appointment->save();

        return redirect()->back()->with('message', 'removed successfully');

    }
}
