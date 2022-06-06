<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 leading-tight flex items-center justify-center ">
            {{ __('Manage Doctors') }}
        </h2>
        <div class=" font-semi-bold text-xl text-gray-800 leading-tight pl-2">
            <a href="{{route('doctor.create')}}">
                <button
                    class="bg-transparent hover:bg-green-600 text-blue-700 font-semi-bold hover:text-white p-1 border border-blue-500 hover:border-transparent rounded">
                    Add doctor
                </button>
            </a>
        </div>

    </x-slot>

    <div class="py-2 ">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8  ">
            <div class="shadow-sm sm:rounded-lg w-full">
                <div class="min-h-full bg-white ">
                    <div class="flex flex-col">

                        <x-validation-errors/>

                        <x-success-message/>

                        <div class="overflow-x-auto sm:mx-6 lg:mx-8">
                            <div class="py-4 inline-block min-w-full ">
                                <div class="overflow-hidden">
                                    <table class="w-full text-center ">
                                        <thead class="border-b p-6 bg-emerald-900 "
                                        >
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-white px-6 py-4 sm:block hidden ">
                                                No.
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                                Name
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-white px-6 py-4 sm:block hidden">
                                                Bio
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-white px-6 py-4 ">
                                                Type of doctor
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-white px-6 py-4">
                                                Actions
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($doctors as $doctor )
                                            <tr class="bg-white border-b ">
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap sm:block hidden ">
                                                    {{$loop->iteration}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{$doctor->name}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-wrap sm:block hidden">
                                                    @if( strlen($doctor->bio) < 40 )
                                                        {{$doctor->bio}}
                                                    @else
                                                        {{Str::limit($doctor->bio, 40)}}
                                                        <a href="{{route('doctor.edit',['id'=>$doctor->id])}}"
                                                           class="underline text-blue-700">
                                                            Read more
                                                        </a>
                                                    @endif

                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap  ">
                                                    {{$doctor->doctorType->name}}
                                                </td>
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex justify-center">
                                                    <a href="{{route('doctor.edit',['id'=>$doctor->id])}}">
                                                        <button
                                                            class="
                                                            bg-transparent hover:bg-green-600 text-blue-700
                                                            font-semi-bold hover:text-white
                                                            p-2 border border-blue-500
                                                            hover:border-transparent rounded">
                                                            Edit
                                                        </button>
                                                    </a>
                                                    <form action="{{route('doctor.destroy',['id'=>$doctor->id]) }}"
                                                          method="POST"
                                                          class="pl-3">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class=" pl-3 bg-transparent hover:bg-red-500 text-blue-700
                                                            font-semi-bold hover:text-white p-2 border border-blue-500
                                                            hover:border-transparent rounded">
                                                            Remove
                                                        </button>
                                                    </form>
                                                    <div class="pl-3">
                                                        <a href="{{route('appointment.show',$doctor)}}">
                                                            <button
                                                                class=" pr-3
                                                            bg-transparent hover:bg-green-600 text-blue-700
                                                            font-semi-bold hover:text-white
                                                            p-2 border border-blue-500
                                                            hover:border-transparent rounded">
                                                                Schedule
                                                            </button>
                                                        </a>

                                                    </div>

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
                {{$doctors->withQueryString()->links()}}
            </div>
        </div>
    </div>
</x-app-layout>
