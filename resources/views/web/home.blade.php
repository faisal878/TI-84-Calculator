@extends('app')
@section('content')
@include('web.inc.navbar')


<div class="max-w-4xl m-auto space-y-10 p-6 ">
    <div class="content">{!! html_entity_decode(@$homeSetting->data )!!}</div>
    <div class="md:grid grid-cols-2 gap-4 justify-center my-6">
        {{-- @if ($tools->isNotEmpty())
            @foreach ($tools as $item)
                <a href="{{ url($item->slug) }}" class="p-6 md:mb-0 mb-4 rounded-lg border border-gray-300 hover:shadow-lg shadow-md cursor-pointer transition-shadow duration-300 block max-w-md">
                    <h2 class="font-bold text-xl mb-3 capitalize">{{ $item->title }}</h2>
                    <p class="text-[14px] text-[#696981] line-clamp-3">{{ $item->meta_description }}</p>
                </a>
            @endforeach
        @endif --}}
    </div>
</div>

  
</div>

@include('web.inc.footer')
@endsection

@push('script')

@endpush  