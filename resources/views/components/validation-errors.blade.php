@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }} style="background-color: #f19d9d" class="rounded mb-4 mt-4">
        <div class="font-medium text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
