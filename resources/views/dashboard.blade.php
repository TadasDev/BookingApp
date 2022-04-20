<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-6">
        <div class=" ">

            <x-validation-errors/>

            <x-success-message/>

            <div class="shadow-sm sm:rounded-lg ">
                <div class="min-h-screen bg-white ">
                    Tadas
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
