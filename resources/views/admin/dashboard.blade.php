<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin  Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-6">
        <div class=" ">
            <div class="shadow-sm sm:rounded-lg ">


                <x-validation-errors/>

                <x-success-message/>
                <div class="min-h-screen bg-white ">
                   You are Admin
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
