@extends('app')

@php
    $title      = '';
    $metatitle  = '';
    $metaDes    = '';
@endphp

@push('style')
@endpush
@section('content')
@include('web.inc.navbar')
<section class="lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto text-center relative pt-16 overflow-hidden">
        <h1 class="font-bold mb-6 max-w-[940px] m-auto leading-tight lg:text-[52px] md:text-[42px] text-[33px] text-[#22281E] relative">Privacy Policy</h1>
    </div>
</section>
<section class="pb-24 relative overflow-hidden lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto">
    <div class="p-7 border border-gray-200 text-[#696981] bg-[#f8fffe]">
        <p class="mb-2 text-[18px]"></p>

        <h2 class="mb-2 font-semibold text-xl text-[#034737]"></h2>
        <p class="mb-2 text-[18px]"></p>
    </div>
</div>

</section>

@include('web.inc.footer')
@endsection

@push('script')
<script>

</script>
@endpush  