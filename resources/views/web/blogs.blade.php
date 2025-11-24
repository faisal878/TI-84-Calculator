@extends('app')

@section('content')

@include('web.inc.navbar')

<div class="max-w-[1240px] m-auto text-center relative py-16 overflow-hidden border-b border-[#e1e1e8]">
    <h1 class="font-bold mb-6 max-w-[940px] m-auto leading-tight lg:text-[52px] md:text-[42px] text-[33px] text-[#22281E] relative">
        Exploring the world of code. from logic to creativity,one post at a time.
    </h1>
    <p class="text-[18px] max-w-[600px] m-auto text-[#696981]">
        Dive into curated stories and tutorials that enlighten,
        entertain, and empower developers across the globe.
    </p>
</div>
<div class="max-w-[1240px] m-auto py-16 px-4">
    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
        <div class="rounded-xl">
            <div class="relative rounded-xl overflow-hidden mb-4">
               <a href="{{ route('card.detail') }}"  class="h-[225px] block bg-gray-200 w-full"><img src="{{ asset('assets/img/img.1.png') }}"class="w-full h-[225px] object-cover"></a>
            </div>
            <p class="text-[14px] font-semibold text-[#696981]">November 24 2025</p>
            <a href="#"class="text-black font-bold text-[20px] line-clamp-2 mb-1">12 Python Scripts to Automate Tasks & Save Hours Daily</a>
            <p class="text-[#696981] line-clamp-3">Lorem ipsum description here…</p>
        </div>
        <div class="rounded-xl">
            <div class="relative rounded-xl overflow-hidden mb-4">
                <a href="#" class="h-[225px] block bg-gray-200 w-full"><img src="{{ asset('assets/img/img.2.png') }}"class="w-full h-[225px] object-cover"></a>
            </div>
            <p class="text-[14px] font-semibold text-[#696981]">November 24 2025</p>
            <a href="#" class="text-black font-bold text-[20px] line-clamp-2 mb-1">Laravel 12 – Fixing storage:link Asset Error</a>
            <p class="text-[#696981] line-clamp-3">Facing the “storage:link” asset error in Laravel 12? This guide walks you through the exact fixes for missing symlinks, incorrect file paths, and</p>
        </div>
        <div class="rounded-xl">
            <div class="relative rounded-xl overflow-hidden mb-4">
                <a href="#" class="h-[225px] block bg-gray-200 w-full"><img src="{{ asset('assets/img/img.2.png') }}"class="w-full h-[225px] object-cover"></a>
            </div>
            <p class="text-[14px] font-semibold text-[#696981]">November 24 2025</p>
            <a href="#" class="text-black font-bold text-[20px] line-clamp-2 mb-1">Laravel 12 – Fixing storage:link Asset Error</a>
            <p class="text-[#696981] line-clamp-3">Facing the “storage:link” asset error in Laravel 12? This guide walks you through the exact fixes for missing symlinks, incorrect file paths, and</p>
        </div>
    </div>
</div>

@include('web.inc.footer')

@endsection
