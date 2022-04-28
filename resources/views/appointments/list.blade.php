<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointments')  }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen mx-auto sm:px-6 lg:px-8 ">
            <div class="shadow-sm sm:rounded-lg ">
                <div class="min-h-screen bg-white ">

                    <x-validation-errors/>

                    <x-success-message/>

                    <div class=" p-6 h-screen ">
                        <div class="max-h-screen flex flex-wrap ">
                            <div class="w-full flex flex-wrap justify-center ">
                                @foreach($appointmentsDates as $appointmentsDate)

                                    <x-time-slots/>

                                    <div class="border border-gray-200 text-center text-xl bg-gray-100 w-2/12 pb-10">
                                        {{Carbon\Carbon::parse($appointmentsDate->date)->dayName}}
                                        {{$appointmentsDate->date}}
                                        <div class="w-full">
                                            @foreach($appointments->where('date',$appointmentsDate->date) as $appointment )
                                                <form method="POST"
                                                      action="{{route('appointment.update',$appointment)}}"
                                                      class="flex flex-row">
                                                    @method('PUT')
                                                    @csrf
                                                    <input
                                                        name="patient_name"
                                                        value="{{$appointment->patient_name}}"
                                                        @if( is_null($appointment->patient_name) )
                                                            class=" w-full bg-green-100 text-black-700 font-semi-bold p-2 border rounded"
                                                        @else
                                                            class=" w-full bg-red-50 text-black-700 font-semi-bold p-2 border rounded"
                                                        @endif>
                                                    <button
                                                        style="background-color: #e2c7af"
                                                        class=" bg-amber-50 text-white font-semi-bold p-2 border  rounded">
                                                        Save
                                                    </button>
                                                </form>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="p-6 w-full">
                            {{$appointmentsDates->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
