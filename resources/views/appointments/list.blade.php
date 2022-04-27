<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointments') }}
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
                            <div class="p-6 w-full">
                                {{$appointmentsDates->links()}}
                            </div>
                            <div class="w-full flex flex-wrap justify-center ">
                                @foreach($appointmentsDates as $appointmentsDate)

                                    <x-time-slots/>

                                    <div class="border border-gray-200 text-center text-xl bg-gray-100 w-2/12 pb-10">
                                        {{$appointmentsDate->date}}
                                        {{Carbon\Carbon::parse($appointmentsDate->date)->format( 'l' )}}
                                        @foreach($appointments->where('date',$appointmentsDate->date) as $appointment )
                                            <div class="w-full">
                                                <form method="POST"
                                                      action=""
                                                      class="flex flex-row">
                                                    @csrf
                                                    <input
                                                        name="patient_name"
                                                        value="{{$appointment->patient_name}}"
                                                        class=" w-full text-black-700 font-semi-bold p-2 border rounded">
                                                    <button
                                                        style="background-color: #8baedb"
                                                        class=" text-white font-semi-bold p-2 border  rounded">
                                                        Save
                                                    </button>
                                                </form>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
