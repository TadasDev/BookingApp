<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Doctor types') }}
        </h2>
    </x-slot>
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8  ">

            <x-validation-errors/>

            <x-success-message/>

            <div class="shadow-sm sm:rounded-lg max-w-7xl">
                <div class="min-h-screen bg-white">
                    <div class="overflow-hidden">
                        <div class="mt-4 px-4 text-lg">
                            Create type
                        </div>
                        <div class="sm:block sm:flex sm:justify-center">
                            <div class="w-full">
                                <form method="POST" action="{{route('doctor.type.store')}}">
                                    @csrf
                                    <div class="mt-4 px-4">
                                        <x-label for="name" :value="__('Name')"/>

                                        <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                                 value="{{old('name')}}" required autofocus/>
                                    </div>
                                    <div class="mt-4 flex justify-end px-4">
                                        <x-button>Submit</x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- component -->

                        <div class="mt-4 px-4 text-lg">List of types</div>
                        <div class="mt-2 p-6">
                            <table class="mx-auto table-auto w-full text-center ">
                                <thead>
                                <tr class="bg-gradient-to-r from-indigo-600 to-purple-600">
                                    <th class="px-16 py-2">
                                        <span class="text-gray-100 font-semibold">ID</span>
                                    </th>
                                    <th class="px-16 py-2">
                                        <span class="text-gray-100 font-semibold">Type</span>
                                    </th>

                                    <th class="px-16 py-2">
                                        <span class="text-gray-100 font-semibold">Actions</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-gray-200">
                                @foreach($doctorTypes as $doctorType)
                                    <tr class="bg-white border-b-2 border-gray-200">
                                        <td>
                                            <span class="text-center ml-2 font-semibold">{{$doctorType->id}}</span>
                                        </td>
                                        <td class="px-16 py-2">
                                            <form method="POST" action="{{route('doctor.type.update',$doctorType)}}">
                                                @csrf
                                                @method('PUT')
                                                <input
                                                    name="name"
                                                    class="font-semi-bold p-2 border border-blue-500 rounded"
                                                    value="{{$doctorType->name}}">
                                                <button
                                                    class="
                                                            bg-transparent hover:bg-green-600 text-blue-700
                                                            font-semibold hover:text-white
                                                            p-2 border border-blue-500
                                                            hover:border-transparent rounded">
                                                    Save
                                                </button>
                                            </form>
                                        </td>
                                        <td class="px-8 py-2">
                                            <form method="POST" action="{{route('doctor.type.destroy',$doctorType)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="
                                                            bg-transparent hover:bg-red-500
                                                            font-semibold hover:text-white
                                                            p-2 border border-blue-500
                                                            hover:border-transparent rounded">
                                                    Remove
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
