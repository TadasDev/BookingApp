<div class="border border-gray-200 text-center text-xl bg-gray-100    " >
    Time
    @foreach($timeSlots as $timeSlot)
        <div class="text-black-700 font-semi-bold border p-2  ">
            {{$timeSlot->time}}
        </div>
    @endforeach
</div>
