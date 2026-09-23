@extends('app')
@push('style')
@endpush
@section('content')
@include('web.inc.navbar')

<section class="lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto text-center relative pt-16 pb-10 overflow-hidden">
        <div class="w-[110px] h-[110px] rounded-full bg-[#034737] text-white flex items-center justify-center text-[40px] font-bold m-auto mb-5">
            {{ strtoupper(substr($author->name, 0, 1)) }}
        </div>
        <h1 class="font-bold mb-2 max-w-[940px] m-auto leading-tight lg:text-[42px] md:text-[33px] text-[26px] text-[#22281E] relative">{{ $author->name }}</h1>
        <p class="text-[#034737] font-semibold text-[18px] mb-6">Content Writer</p>
        <p class="text-[18px] text-[#696981] max-w-[720px] m-auto">
            {{ $author->name }} is a content writer at TI84Calc.com, specializing in creating clear, easy-to-follow guides on graphing calculators, scientific calculators, and math tools. With a focus on making complex calculator functions simple and accessible, {{ explode(' ', $author->name)[0] }} helps students, teachers, and professionals get the most out of their TI-84 and TI-30XS calculators.
        </p>
    </div>
</section>

<section class="pb-24 relative overflow-hidden lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto">
        <h2 class="font-bold mb-8 text-[26px] text-[#22281E]">Articles by {{ $author->name }}</h2>

        @if($posts->count())
        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6">
            @foreach($posts as $post)
            <a href="{{ route('blog.post.content', ['slug' => $post->slug]) }}" class="block border border-[#E5E7E1] rounded-xl overflow-hidden hover:shadow-lg transition-shadow">
                @if($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-[180px] object-cover">
                @endif
                <div class="p-5">
                    <h3 class="font-semibold text-[18px] text-[#22281E] mb-2">{{ $post->title }}</h3>
                    <p class="text-[15px] text-[#696981]">{{ Str::limit($post->excerpt, 100) }}</p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="mt-10">
            {{ $posts->links() }}
        </div>
        @else
        <p class="text-[#696981]">No articles published yet.</p>
        @endif
    </div>
</section>

@include('web.inc.footer')
@endsection

@push('script')
<script>
</script>
@endpush
