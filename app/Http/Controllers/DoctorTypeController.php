<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\DocotorTypeRequest;
use App\Models\DoctorType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class DoctorTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $doctorTypes = DoctorType::all();

        return view('doctors.types.create', compact('doctorTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DocotorTypeRequest $request
     * @return RedirectResponse
     */
    public function store(DocotorTypeRequest $request): RedirectResponse
    {
        DoctorType::create($request->validated());

        return redirect()->back()->with('message', ' Type created  successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DocotorTypeRequest $request
     * @param DoctorType $doctorType
     * @return RedirectResponse
     */
    public function update(DocotorTypeRequest $request, DoctorType $doctorType): RedirectResponse
    {

        $doctorType->update($request->only(['name']));

        return redirect()->back()->with('message', 'Type has been updated !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(DoctorType $doctorType)
    {
        $doctorType->delete();

        return redirect()->back()->with('message', 'Type has been deleted!');
    }
}
