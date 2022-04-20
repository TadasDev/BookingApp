<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\DoctorStoreRequest;
use App\Http\Requests\Auth\DoctorUpdateRequest;
use App\Models\Doctor;
use App\Models\DoctorType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Symfony\Component\Console\Input\Input;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $doctors = Doctor::paginate(16);

        return view('doctors.list', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create(): view
    {
        $types = DoctorType::all();

        return view('doctors.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Application|RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function store(DoctorStoreRequest $request)
    {
        $doctor = Doctor::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'field_of_expertise' => $request->field_of_expertise,
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->storePublicly('images', 'public');
            $doctor->image()->create([
                'file_path' => $path
            ]);
        }

        return redirect('/doctors-list')->with('message', 'Created doctor successfully');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);

        $doctorTypes = DoctorType::all();

        return view('doctors.edit', compact('doctor', 'doctorTypes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\
     * @return Application|RedirectResponse|Response|\Illuminate\Routing\Redirector
     */
    public function update(DoctorUpdateRequest $request, Doctor $doctor)
    {

        $doctor->update($request->only(['name', 'bio', 'field_of_expertise']));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->storePublicly('images', 'public');
            $doctor->image()->update([
                'file_path' => $path
            ]);
        }

        return redirect('/doctors-list')->with('message', 'Profile has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\
     * @return
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return back()->with('message', 'Profile has been removed!');
    }

}
