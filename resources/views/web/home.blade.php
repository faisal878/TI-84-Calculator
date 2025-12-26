@extends('app')
@section('content')
@include('web.inc.navbar')


<div class="max-w-4xl m-auto space-y-10 p-6 ">
    <div class="max-w-4xl mx-auto py-10 px-4 text-gray-800">

    <!-- Title -->
    <h1 class="text-3xl font-bold mb-4 text-center">TI 84 Calculator</h1>

    <!-- Intro -->
    <p class="mb-4 text-center">
        The TI-84 Calculator is an online, full featured emulator of the classic TI-84 Plus graphing calculator.
        You can use it directly in your browser without installing any apps, plugins, or extensions.
    </p>

    <p class="mb-4 text-center">
        This online TI-84 works just like the real calculator. You can graph functions, solve equations, work with
        matrices, run statistics, and use all the advanced math tools you’re used to—now fully in your browser.
    </p>

    <p class="mb-8 text-center">
        This page explains everything you can do with our TI-84 calculator, how to use it, and why this online version is more
        convenient than the physical device.
    </p>
    <div class="text-center">
        <a href="{{ url('/ti-84-calculator') }}" class="bg-blue-700 inline-block py-2 px-4 rounded-md text-white">Start Using the TI-84 Calculator</a>
    </div>
    <div class="md:grid grid-cols-2 gap-4 justify-center my-6">
        @if ($tools->isNotEmpty())
            @foreach ($tools as $item)
                <a href="{{ url($item->slug) }}" class="p-6 md:mb-0 mb-4 rounded-lg border border-gray-300 hover:shadow-lg shadow-md cursor-pointer transition-shadow duration-300 block max-w-md">
                    <h2 class="font-bold text-xl mb-3 capitalize">{{ $item->title }}</h2>
                    <p class="text-[14px] text-[#696981] line-clamp-3">{{ $item->meta_description }}</p>
                </a>
            @endforeach
        @endif
    </div>
   <div class="content">{!! @$homeSetting->data !!}</div>
</div>

@include('web.inc.footer')
@endsection

@push('script')

@endpush  