@extends('app')
@push('style')
@endpush
@section('content')
@include('web.inc.navbar')
<section class="lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto text-center relative pt-16 overflow-hidden">
        <h1 class="font-bold mb-6 max-w-[940px] m-auto leading-tight lg:text-[52px] md:text-[42px] text-[33px] text-[#22281E] relative">Privacy <span class="text-[#034737]"> Policy</span></h1>
    </div>
</section>
<section class="pb-24 relative overflow-hidden lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto">
        {!! $settings->data ?? 'No privacy policy available at the moment.' !!}  
    </div>
</section>

@include('web.inc.footer')
@endsection

@push('script')

@endpush  