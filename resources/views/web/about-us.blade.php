@extends('app')
@php
    $metaTtitle = '';
@endphp

@section('content')
@include('web.inc.navbar')

<section class="lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto text-center relative py-16 overflow-hidden">
        <h1 class="font-bold mb-6 max-w-[940px] m-auto leading-tight lg:text-[52px] md:text-[42px] text-[33px] text-[#22281E] relative">About Us</h1>
        <p class="text-[18px] max-w-[600px] m-auto text-[#696981]"></p>
    </div>
</section>

@include('web.inc.footer')
@endsection

@push('script')

@endpush  
