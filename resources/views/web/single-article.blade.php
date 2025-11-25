@extends('app')

@push('style')
   
@endpush
@section('content')

@include('web.inc.navbar')
<section class="">
    <div class="max-w-[1240px] m-auto text-center relative pt-4 overflow-hidden lg:px-0 px-[15px]">
        <div class="flex items-center justify-center gap-2 text-xs mb-8">
            <a href="{{ route('home') }}" class="">Home</a> > 
            <a href="{{ route('home.blog') }}">Blog</a> > 
            <a href="{{ url('/blog/'.$post->slug) }}" class="text-[#696981]">{{ $post->title }}</a>
        </div>
        <h1 class="font-bold mb-6 max-w-[940px] m-auto leading-tight lg:text-[52px] text-[33px] text-[#22281E] relative">{{ $post->title }}</h1>
        <div class="w-full rounded-2xl h-[400px] overflow-hidden">
            @if ($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-full h-[400px] object-cover" alt="{{ $post->title }}">
            @else
                <img src="{{ asset('assets/img/demo-image-0042-400x225.webp') }}" class="w-full h-[400px] object-cover" alt="Placehoder Image">
            @endif
        </div>
    </div>
</section>

<section class="md:pt-16 pt-[30px] pb-24 relative overflow-hidden lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto">
        <div class="lg:grid lg:grid-cols-3 lg:gap-10">
            <div class="lg:col-span-2">
                <div class="md:flex gap-4 w-full">
                    <div class="lg:w-[10%] md:w-[5%] w-full">
                        <div class="md:grid md:grid-cols-1 flex gap-5 md:mb-0 mb-4">
                            @php
                                $postUrl = urlencode(route('blog.post.content', ['cat_slug' => $post->category->slug, 'slug' => $post->slug]));
                                $postTitle = urlencode($post->title);
                            @endphp
                            <a href="https://twitter.com/intent/tweet?url={{ $postUrl }}&text={{ $postTitle }}" target="_blank" rel="noopener noreferrer" class="hover:opacity-80 transition"> <img src="{{ asset('assets/img/x_black.svg') }}" class="w-[24px] h-[24px]" alt="Share on X"> </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $postUrl }}" target="_blank" rel="noopener noreferrer" class="hover:opacity-80 transition"> <img src="{{ asset('assets/img/fb_black.svg') }}" class="w-[24px] h-[24px]" alt="Share on Facebook"> </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $postUrl }}&title={{ $postTitle }}" target="_blank" rel="noopener noreferrer" class="hover:opacity-80 transition"> <img src="{{ asset('assets/img/linkedin_black.svg') }}" class="w-[24px] h-[24px]" alt="Share on LinkedIn"> </a>
                        </div>
                    </div>
                    <div class="lg:w-[90%] md:w-[95%] w-full">
                        <div class="content-area"> {!! html_entity_decode($post->content) !!} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pb-24 relative overflow-hidden lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto">
        <h2 class="font-[600] mb-6 m-auto leading-tight text-[33px] text-[#034737] ">Read Next</h2>
        <div class="grid md:grid-cols-3 gap-6 mt-3">
            @foreach ($readNext as $postItem)
                <div class="rounded-xl">
                    <div class="relative rounded-xl overflow-hidden mb-4">
                        <a href="{{ url('/blog/'.$postItem->slug) }}" class="h-[225px] block bg-gray-200 w-full">
                            @if ($postItem->featured_image)
                                <img src="{{ asset('storage/' . $postItem->featured_image) }}" class="w-full h-[225px] object-cover" alt="{{ $postItem->title }}">
                            @else
                                <img src="{{ asset('assets/img/demo-image-0042-400x225.webp') }}" class="w-full" alt="Placehoder Image">
                            @endif
                        </a>
                    </div>
                    <a href="{{ url('/blog/'.$postItem->slug) }}" class="text-black font-bold text-[20px] line-clamp-2 mb-1">{{ $postItem->title }}</a>
                    <p class="text-[#696981] line-clamp-3">{{ $postItem->excerpt }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- @include('web.inc.subscribe') --}}

@include('web.inc.footer')
@endsection

@push('script')
    
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
const swiper = new Swiper(".mySwiper", {
  loop: true,
  navigation: {
    nextEl: ".custom-next",
    prevEl: ".custom-prev",
  },
  simulateTouch: true,
  grabCursor: true,
  slidesPerView: 1,
});


document.addEventListener("DOMContentLoaded", function () {
  const blocks = document.querySelectorAll("pre");

  blocks.forEach((block) => {
    // create button
    const button = document.createElement("button");
    button.innerText = "Copy";
    button.classList.add("copy-btn");

    // append button to pre block
    block.appendChild(button);

    // copy event
    button.addEventListener("click", async () => {
      const code = block.querySelector("code")?.innerText || block.innerText;
      try {
        await navigator.clipboard.writeText(code);
        button.innerText = "Copied!";
        setTimeout(() => (button.innerText = "Copy"), 2000);
      } catch (err) {
        console.error("Failed to copy", err);
      }
    });
  });
});

function copyPostLink(url, el) {
    navigator.clipboard.writeText(url).then(() => {
        const tooltip = el.querySelector('.tooltip');
        tooltip.classList.add('opacity-100');
        setTimeout(() => tooltip.classList.remove('opacity-100'), 1500);
    });
}
</script>

@endpush  