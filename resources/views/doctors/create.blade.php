<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Doctor') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  ">
            <div class="shadow-sm sm:rounded-lg max-w-7xl">
                <div class="min-h-screen bg-white ">

                    <x-validation-errors/>

                    <div class="sm:block sm:flex sm:justify-center">
                        <div class="w-1/2">
                            <form method="POST" action="{{route('doctor.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="mt-4 px-4">
                                    <x-label for="name" :value="__('Name')"/>

                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                             value="{{old('name')}}" required autofocus/>
                                </div>
                                <div class="mt-4 px-4 ">
                                    <x-label for="bio" :value="__('Bio')"/>
                                    <textarea id="bio" rows="5" name="bio"
                                              class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 "></textarea>
                                </div>
                                <div class="mt-4 px-4 ">
                                    <x-label for="doctors_type_id" :value="__('Doctors type')"/>
                                    <div class="mb-3 xl:w-96">
                                        <select id="doctors_type_id" name="doctors_type_id"
                                                class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ">
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-4 px-4 ">
                                    <x-file-upload/>
                                </div>
                                <div class="mt-4 flex justify-end px-4">
                                    <x-button>Submit</x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
