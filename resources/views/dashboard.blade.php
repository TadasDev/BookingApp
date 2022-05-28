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
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-6 ">
                        @foreach($doctorTypes as $doctorType)
                        <div class="text-xl border-2 border-gray-300 rounded-xl p-6  bg-gray-100 text-center">
                            <div class="">
                                {{$doctorType->name}}
                            </div>
                            <div class="text-black">
                                Next available date:
                                2022-05-27
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
