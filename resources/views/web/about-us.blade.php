@extends('app')
@push('style')
@endpush
@section('content')
@include('web.inc.navbar')
<section class="lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto text-center relative py-16 overflow-hidden">
        <h1 class="font-bold mb-6 max-w-[940px] m-auto leading-tight lg:text-[52px] md:text-[42px] text-[33px] text-[#22281E] relative">About <span class="text-[#034737]"> Us</span></h1>
        <p class="text-[18px] max-w-[600px] m-auto text-[#696981]">We’re passionate about innovation and technology. At manamil.dev, our goal is to build solutions that inspire and empower.</p>
    </div>
</section>
{{-- 
<section class="pb-24 relative overflow-hidden lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto">
        <div class="grid lg:grid-cols-2 items-center gap-10">
            <div class="">
                <h2 class="text-3xl font-bold mb-2 text-[#034737]">About Manamil Dev</h2>
                <p class="text-[18px] text-[#696981] mb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis, necessitatibus molestias soluta quos ea minus quam reprehenderit voluptatem, nostrum id suscipit assumenda! Temporibus voluptatum veritatis similique. Obcaecati vel atque cum.</p>
                <p class="text-[18px] text-[#696981]">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis, necessitatibus molestias soluta quos ea minus quam reprehenderit voluptatem.</p>
            </div>
            <div class="flex justify-end">
                <img src="{{ asset('assets/img/page-about-2.jpg') }}" class="w-full rounded-lg" alt="">
            </div>
        </div>
    </div>
</section>
<section class="pb-24 relative overflow-hidden lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto">
        <div class="grid lg:grid-cols-3 items-center gap-10">
            <div class="">
                <h3 class="text-xl font-bold mb-2 text-[#034737]">Our Mission</h3>
                <p class="text-[18px] text-[#696981] mb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis, necessitatibus molestias soluta quos ea minus quam reprehenderit voluptatem.</p>
            </div>
            <div class="">
                <h3 class="text-xl font-bold mb-2 text-[#034737]">Our Vision</h3>
                <p class="text-[18px] text-[#696981] mb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis, necessitatibus molestias soluta quos ea minus quam reprehenderit voluptatem.</p>
            </div>
            <div class="">
                <h3 class="text-xl font-bold mb-2 text-[#034737]">Our Core Values</h3>
                <p class="text-[18px] text-[#696981] mb-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis, necessitatibus molestias soluta quos ea minus quam reprehenderit voluptatem.</p>
            </div>
        </div>
    </div>
</section> --}}

@include('web.inc.footer')
@endsection

@push('script')
<script>

</script>
@endpush  