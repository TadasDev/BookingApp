<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit details') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  ">
            <div class="shadow-sm sm:rounded-lg max-w-7xl">

                <x-validation-errors/>

                <div class="min-h-screen bg-white ">
                    <div class="sm:block sm:flex sm:justify-center">
                        <div class="p-6 w-full">
                            @if($doctor->image()->count())
                                <img src="{{ asset('storage/' . $doctor->image()->first()->file_path) }}"
                                     class=" w-full object-cover h-40 w-96 rounded ">
                            @else
                                <img src="https://upload.wikimedia.org/wikipedia/en/e/ee/Unknown-person.gif"
                                     class="w-full object-cover h-40 w-96  rounded">
                            @endif
                        </div>
                        <div class="w-full p-6">
                            <form method="POST" action="{{route('doctor.update',$doctor)}}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mt-4 px-4">
                                    <x-label for="name" :value="__('Name')"/>

                                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                             value="{{old('name',$doctor->name)}}" required autofocus/>
                                </div>
                                <div class="mt-4 px-4 ">
                                    <x-label for="bio" :value="__('Bio')"/>
                                    <textarea id="bio" rows="5" name="bio"
                                              class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ">{{$doctor->bio}}</textarea>
                                </div>
                                <div class="mt-4 px-4 ">
                                    <x-label for="field_of_expertise" :value="__('Field of Expertise')"/>
                                    <div class="mb-3 xl:w-96">
                                        <select id="field_of_expertise" name="field_of_expertise"
                                                class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ">
                                            @if($doctorTypes->count()>0)
                                                @foreach($doctorTypes as $doctorType)
                                                    <option value="{{$doctorType->name}}">{{$doctorType->name}}</option>
                                                @endforeach
                                            @else
                                                <option selected> No types added</option>
                                            @endif
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
