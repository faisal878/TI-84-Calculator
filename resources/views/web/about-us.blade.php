@extends('app')
@push('style')
@endpush
@section('content')
@include('web.inc.navbar')
<section class="lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto text-center relative pt-16 overflow-hidden">
        <h1 class="font-bold mb-6 max-w-[940px] m-auto leading-tight lg:text-[52px] md:text-[42px] text-[33px] text-[#22281E] relative">About <span class="text-[#034737]"> Us</span></h1>
    </div>
</section>

<section class="pb-24 relative overflow-hidden lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto">
        <div class="grid lg:grid-cols-1 items-center gap-10">
            <div class="max-w-[800px] m-auto">
                <p class="text-[18px] text-[#696981] mb-2 text-center">
                    Welcome to TI84Calc.com – your go-to online hub for free, reliable, and easy-to-use calculators. Whether you’re a student tackling algebra, calculus, or graphing problems, a teacher preparing lessons, or a professional needing quick calculations, we’ve got you covered.
                    <br> <br>
                    Our platform offers the TI-84 graphing calculator and TI-30XS scientific calculator online—fully functional and accessible from any device, no downloads or installations required. Our goal is to make learning and problem-solving simple, fast, and convenient for everyone.
                    <br> <br>
                    At TI84Calc.com, we are passionate about helping you achieve accuracy, save time, and gain confidence in your math skills. 
                    Explore our calculators, tutorials, and tools, and make complex calculations effortless.
                </p>
            </div>
        </div>
    </div>
</section>


@include('web.inc.footer')
@endsection

@push('script')
<script>

</script>
@endpush  