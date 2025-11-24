@extends('app')

@section('content')

@include('web.inc.navbar')
<div class="max-w-[1240px] m-auto text-center relative pt-10 overflow-hidden lg:px-0 px-[15px]">
    <div class="flex items-center justify-center gap-2 text-xs mb-8">
        <a href="{{ route('home') }}">Home</a> &gt; 
        <a href="#">Python</a> &gt; 
        <span class="text-[#696981]">12 Python Scripts to Automate Tasks &amp; Save Hours Daily</span>
    </div>
    <h1 class="font-bold mb-6 max-w-[940px] m-auto leading-tight lg:text-[52px] text-[33px] text-[#22281E] relative">
        12 Python Scripts to Automate Tasks &amp; Save Hours Daily
    </h1>
    <div class="w-full rounded-2xl h-[400px] overflow-hidden mb-8">
        <img src="{{ asset('assets/img/img.1.png') }}" class="w-full h-[400px] object-cover" alt="12 Python Scripts to Automate Tasks & Save Hours Daily">
    </div>
</div>
<section class="md:pt-16 pt-[30px] pb-16 relative overflow-hidden lg:px-0 px-6">
    <div class="max-w-[1240px] m-auto flex gap-8">
        <div class="flex flex-col gap-6">
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text=12+Python+Scripts+to+Automate+Tasks+%26+Save+Hours+Daily" target="_blank">
                <img src="{{ asset('assets/img/x_black.svg') }}" class="w-6 h-6" alt="Share on X">
            </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank">
                <img src="{{ asset('assets/img/fb_black.svg') }}" class="w-6 h-6" alt="Share on Facebook">
            </a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::fullUrl()) }}&title=12+Python+Scripts+to+Automate+Tasks+%26+Save+Hours+Daily" target="_blank">
                <img src="{{ asset('assets/img/linkedin_black.svg') }}" class="w-6 h-6" alt="Share on LinkedIn">
            </a>
            <button type="button" onclick="copyPostLink('{{ Request::fullUrl() }}', this)">
                <img src="{{ asset('assets/img/link.svg') }}" class="w-6 h-6" alt="Copy Link">
            </button>
        </div>
        <div class="flex-1">
            <div class="content-area text-left">
                <h1 class="text-4xl lg:text-5xl font-bold mb-6 leading-tight text-[#22281E]">
                    12 Python Scripts to Automate Tasks &amp; Save Hours Daily
                </h1>
                <p class="mb-6 text-[#444]">
                    Hey everyone! As a developer, I spend my life seeking efficiency. We all know Python is the Swiss Army knife of scripting, but sometimes the "12 scripts to rename your downloads" lists just don't cut it. We need <em>real</em> power. We need automations that tackle the tedious, the complex, and the truly time-consuming tasks that crop up daily, especially in a professional setting.
                </p>
                <p class="mb-6 text-[#444]">
                    I've put together a list of 12 highly practical, copy-paste-ready Python scripts that I actually use to shave <strong>hours</strong> off my workflow every single week. These aren't just file organizers; these are scripts that dive into system resources, handle asynchronous data, and manipulate files at a deep level.
                </p>
                <p class="text-[#444]">
                    Ready to level up your productivity? Let's dive in. 🚀
                </p>
            </div>
        </div>
    </div>
    <div class="max-w-[1240px] m-auto mt-10">
        <h2 class="font-[600] mb-6 m-auto leading-tight text-[33px] text-black">Read Next</h2>
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
</section>

@include('web.inc.footer')

@endsection
