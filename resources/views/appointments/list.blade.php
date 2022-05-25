<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointments')  }}
        </h2>
    </x-slot>

    <div class="p-6">
        <div class="max-w-screen mx-auto sm:px-6 lg:px-2 ">
            <div class="shadow-sm sm:rounded-lg ">
                <div class="min-h-screen bg-white  ">

                    <x-validation-errors/>

                    <x-success-message/>

                    <div class="h-screen ">
                        <div class="max-h-screen flex flex-wrap ">
                            <div class="flex flex-wrap justify-center max-h-screen p-6">
                                @foreach($appointmentsDates as $appointmentsDate)

                                    <x-time-slots/>

                                    <div class="border-t border-l border-gray-200 text-center text-xl w-2/12 border-b ">
                                        <div class="border-1" >
                                            {{$appointmentsDate->date}}
                                            {{Carbon\Carbon::parse($appointmentsDate->date)->dayName}}
                                        </div>
                                        <div class="w-full flex flex-wrap ">
                                            @foreach($appointments->where('date',$appointmentsDate->date) as $appointment )
                                                <form method="POST"
                                                      action="{{route('appointment.update',$appointment)}}"
                                                      class=" w-4/5 flex flex-row ">
                                                    @method('PUT')
                                                    @csrf
                                                    <input
                                                        name="patient_name"
                                                        value="{{$appointment->patient_name}}"
                                                        class="{{is_null($appointment->patient_name) ? 'bg-green-100':'bg-red-100'}}
                                                         hover:border-blue-900 w-4/5  text-black-700 font-semi-bold p-2 border rounded">
                                                    <button
                                                        class="w-1/5
                                                         hover:border-blue-900 hover:text-blue-900
                                                        bg-emerald-600 text-white font-semi-bold  border rounded">
                                                      +
                                                    </button>
                                                </form>
                                                <form action="{{route('appointment.delete',$appointment->id) }}"
                                                      method="POST"
                                                      class="w-1/5">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="
                                                      w-3/5
                                                            font-semi-bold p-2 border border-blue-500
                                                            hover:border-red-600 hover:text-red-500 rounded">
                                                      x
                                                    </button>
                                                </form>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                                    <div class="p-3 w-full flex  ">
                                        {{$appointmentsDates->links()}}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
