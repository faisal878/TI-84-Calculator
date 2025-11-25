@extends('app')
@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
@endpush
@section('content')
@include('web.inc.navbar')


<section class="py-24 relative overflow-hidden lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto">
        <div class="grid lg:grid-cols-3 gap-10">
            {{-- <div class="lg:col-span-2 grid md:grid-cols-2 gap-6"> --}}
                @if ($posts->isNotEmpty())
                    @foreach ($posts as $post)
                        <div class="rounded-xl">
                            <div class="relative rounded-xl overflow-hidden mb-4">
                                <a href="{{ url('/blog/'.$post->slug) }}" class="h-[225px] block bg-gray-200 w-full">
                                    @if ($post->featured_image)
                                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-full h-[225px] object-cover" alt="{{ $post->title }}">
                                    @else
                                        <img src="{{ asset('assets/img/demo-image-0042-400x225.webp') }}" class="w-full" alt="Placeholder Image">
                                    @endif
                                </a>
                            </div>
                            <a href="{{ url('/blog/'.$post->slug) }}" class="text-black font-bold text-[20px] line-clamp-2 mb-1">{{ $post->title }}</a>
                            <p class="text-[#696981] line-clamp-3">{{ $post->excerpt }}</p>
                        </div>
                    @endforeach
                @endif
            {{-- </div> --}}
        </div>
    </div>
</section>

{{-- @include('web.inc.subscribe') --}}

@include('web.inc.footer')
@endsection

@push('script')

@endpush  