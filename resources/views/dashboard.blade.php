<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-6">
        <div class="max-w-screen mx-auto sm:px-6 lg:px-0 ">
            <div class="shadow-sm bg-white h-screen">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 ">
                        @foreach($doctorTypes as $doctorType)
                            <div
                                class="text-xl border-2 border-gray-300 rounded-xl bg-gray-100 p-3 flex justify-between ">
                                <div class="w-1/4 border-r-2 mr-3 border-gray-300 ">
                                    {{$doctorType->name}}
                                </div>
                                <div class="w-3/4 p-1">
                                    Next available date:
                                    @if($doctorType->doctors)
                                        @foreach( $doctorType->doctors as $doctor)
                                            <a href="{{route('dashboard.show',$doctor->id)}}"
                                               class="underline text-blue-600 hover:text-blue-800 visited:text-purple-600">
                                                <div class="flex justify-start">
                                                    {{$doctor->name}}
                                                    {{$doctor->nextAvailableAppointment()->first()->date}}
                                                    {{\App\Models\TimeSlot::find($doctor->nextAvailableAppointment()->first()->time_slot_id)->time}}
                                                </div>
                                            </a>
                                        @endforeach

                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
