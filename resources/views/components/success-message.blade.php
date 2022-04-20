
@if (session()->has('message'))
    <div style="background-color: #738773" class="rounded p-2 mb-4 mt-4" >
        <ul class="text-lg text-white  ">
            {{ session()->get('message') }}
        </ul>
    </div>
@endif
