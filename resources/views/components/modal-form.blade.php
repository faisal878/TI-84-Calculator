@if ($modelType == 'form')
    <form method="POST" action="{{ $action }}" enctype="multipart/form-data" class="{{ $mainDivClass }} fixed top-0 left-0 right-0 bottom-0 z-[2] backdrop-blur-sm bg-black/30 flex items-center justify-center" id="{{ $customId }}">
        @csrf
        <div class="border p-6 bg-white rounded-2xl {{ $width }}">
            <h2 class="text-lg mb-4 font-bold text-gray-900">{{ $title }}</h2>
            <div class="grid grid-cols-2 mt-3 gap-x-6">
                {{ $slot }}
            </div>
        </div>
    </form>
@else
    <div class="{{ $mainDivClass }} fixed top-0 left-0 right-0 bottom-0 z-[2] backdrop-blur-sm bg-black/30 flex items-center justify-center" id="{{ $customId }}">
        <div class="border p-6 bg-white rounded-2xl {{ $width }}">
            <h2 class="text-lg mb-4 font-bold text-gray-900">{{ $title }}</h2>
            <div class="w-full">
                {{ $slot }}
            </div>
        </div>
    </div>
@endif


@once

@endonce
