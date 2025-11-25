@extends('app')
@push('style')

@endpush
@section('content')
@include('web.inc.navbar')
<section class="lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto text-center relative pt-8 pb-8 overflow-hidden">
        <div class="flex items-center justify-center gap-2 text-xs mb-8">
            <a href="{{ route('articles') }}" class="">Home</a> > 
            <a href="{{ route('tools') }}">Tools</a>
        </div>
        <h1 class="font-bold mb-6 max-w-[800px] m-auto leading-tight lg:text-[52px] md:text-[42px] text-[33px] text-[#22281E] relative">Empowering 50+ Free <span class="text-[#034737]">Developer & Website Tools</span></h1>
        <p class="text-[18px] max-w-[800px] m-auto text-[#696981]">
            Over 50 powerful online tools, our platform helps Web Developers, Webmasters, Students, Programmers & SEO Experts work smarter every day.
            From coding utilities to website optimization tools — everything you need in one place.
        </p>
    </div>
</section>
<section class="lg:px-0 px-[15px]">
    <div class="">
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-4 max-w-[1240px] m-auto pb-8">
            @foreach ($tools as $tool)
                <a href="{{ url('tools/'.$tool->slug) }}" class="p-6 rounded-lg border border-gray-200 hover:shadow-lg cursor-pointer transition-shadow duration-300">
                    {{-- <div class="w-[60px] h-[60px] rounded-full bg-gray-200 flex items-center justify-center mb-4">
                        <img src="{{ asset('assets/img/icons/json.svg') }}" class="h-[35px] object-cover" alt="{{ $tool->title }} Icon">
                    </div> --}}
                    <h2 class="font-bold text-xl mb-3">{{ $tool->title }}</h2>
                    <p class="text-[14px] text-[#696981] line-clamp-2"> {!! $tool->meta_description !!}</p>
                </a>
            @endforeach
            
        </div>
    </div>
</section>
@include('web.inc.footer')
@endsection

@push('script')

@endpush('script')