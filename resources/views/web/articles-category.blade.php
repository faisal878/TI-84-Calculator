@extends('app')
@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
@endpush
@section('content')
@include('web.inc.navbar')
<div class="max-w-[1240px] m-auto text-center relative pt-4 overflow-hidden lg:px-0 px-[15px]">
    <div class="flex items-center justify-center gap-2 text-xs mb-8">
        <a href="{{ route('articles') }}" class="">Home</a> > 
        <a href="{{ route('blog.post.category', $category->slug) }}" class="text-[#696981]">{{ $category->name }}</a>
    </div>
    <h1 class="font-bold mb-6 max-w-[940px] m-auto leading-tight lg:text-[52px] text-[33px] text-[#22281E] relative">{{ $category->name }}</h1>
    <p class="text-[18px] max-w-[600px] m-auto text-[#696981]">{{ $category->description }}</p>
</div>

<section class="py-24 relative overflow-hidden lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto">
        <div class="grid lg:grid-cols-3 gap-10">
            <div class="lg:col-span-2 grid md:grid-cols-2 gap-6">
                @if ($posts->isNotEmpty())
                    @foreach ($posts as $post)
                        <div class="rounded-xl">
                            <div class="relative rounded-xl overflow-hidden mb-4">
                                <a href="{{ url('/blog/'.$post->category->slug.'/'.$post->slug) }}" class="h-[225px] block bg-gray-200 w-full">
                                    @if ($post->featured_image)
                                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-full h-[225px] object-cover" alt="">
                                    @else
                                        <img src="{{ asset('assets/img/demo-image-0042-400x225.webp') }}" class="w-full" alt="">
                                    @endif
                                </a>
                            </div>
                            <p class="text-[14px] font-semibold text-[#696981]"><span> {{ date('F d Y', strtotime($post->created_at)) }}</span></p>
                            <a href="{{ url('/blog/'.$post->category->slug.'/'.$post->slug) }}" class="text-black font-bold text-[20px] line-clamp-2 mb-1">{{ $post->title }}</a>
                            <p class="text-[#696981] line-clamp-3">{{ $post->excerpt }}</p>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </div>
</section>


@include('web.inc.footer')
@endsection

@push('script')
   
@endpush  