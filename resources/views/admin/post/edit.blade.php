@extends('admin')
@php
    $metaTtitle = 'Category Update'; 
@endphp

@section('content')
    <form action="{{ route('admin.blog.update') }}" method="POST" enctype="multipart/form-data" class="pr-3">
        @csrf
        <input type="hidden" name="id" value="{{ $post->id }}">
        <div class="bg-white rounded-2xl grid grid-cols-1 gap-4 p-4 mb-4">
            <h2 class="text-lg ps-1 font-bold text-gray-900">Edit Category</h2>
        </div>
        <div class="grid grid-cols-12 gap-4">
            <div class="bg-white rounded-2xl col-span-9 p-4">
                <div class="mb-4">
                    <label for="name" class="text-[#808191] mb-1 text-sm block">Title <span class="text-red-600">*</span></label>
                    <input type="text" name="name" value="{{ $post->title }}" id="name" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" required>
                </div>
                {{-- <div class="mb-4">
                    <label for="slug" class="text-[#808191] mb-1 text-sm block">Slug</label>
                    <input type="text" name="slug" id="slug" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" readonly>
                </div> --}}
                <div class="mb-4">
                    <label for="post_content" class="text-[#808191] mb-1 text-sm block">Content <span class="text-red-600">*</span></label>
                    <textarea name="content" id="post_content" rows="4" class="tool_textarea bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">{{ $post->content }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="meta_title" class="text-[#808191] mb-1 text-sm block">Meta Title <span class="text-red-600">*</span></label>
                    <input type="text" name="meta_title" value="{{ $post->meta_title }}" id="meta_title" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" required>
                </div>
                <div class="mb-4">
                    <label for="meta_keywords" class="text-[#808191] mb-1 text-sm block">Keywords</label>
                    <input type="text" name="meta_keywords" value="{{ $post->meta_keywords }}" id="meta_keywords" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                </div>
                <div class="mb-4">
                    <label for="slug" class="text-[#808191] mb-1 text-sm block">Excerpt</label>
                    <textarea name="excerpt" id="description" rows="2" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">{{ $post->excerpt }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="meta_description" class="text-[#808191] mb-1 text-sm block">Meta Description <span class="text-red-600">*</span></label>
                    <textarea name="meta_description" id="meta_description" rows="2" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" required>{{ $post->meta_description }}</textarea>
                </div>
            </div>
            <div class="col-span-3">
                <div class="bg-white rounded-2xl p-4 mb-3">
                    <h2 class="text-lg ps-1 font-bold text-gray-900 mb-3">Category</h2>
                    <select name="category_id" id="category_id" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                        <option value="">-- Select Category --</option>
                        @if ($categories->isNotEmpty())
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id === $post->category_id ? 'selected' : '' }} >{{ $category->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="bg-white rounded-2xl p-4 mb-3">
                    <h2 class="text-lg ps-1 font-bold text-gray-900 mb-3">Featured Image</h2>
                    <div class="border border-gray-200 h-[250px] bg-gray-200 rounded-md mb-3">
                        @if ($post->featured_image)
                            <img src="{{ asset('storage/' . $post->featured_image) }}" width="100%" id="preview" class="object-cover h-[250px]" alt="">
                        @else
                            <img src="{{ asset('assets/img/landscape-placeholder.svg') }}" width="100%" id="preview" class="object-cover h-[250px]" alt="">
                        @endif
                    </div>
                    <input type="file" name="featured_image" id="featured_image" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                </div>
                <div class="bg-white rounded-2xl p-4 mb-4">
                    <h2 class="text-lg ps-1 font-bold text-gray-900 mb-4">Publish</h2>
                    <label for="published" class="border border-gray-300 p-3 block bg-gray-200 rounded-md text-sm mb-4 cursor-pointer">
                        <input type="checkbox" name="is_published" id="published" {{ $post->is_published == '1' ? 'checked' : '' }} value="1" class="me-2"> Publish Now
                    </label>
                    <div class="text-right">
                        <input type="submit" value="Save Post" class="text-sm bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 cursor-pointer">
                    </div>
                </div>
            </div>
        </div>
        
    </form>
   
    
@endsection


@push('script')

<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" integrity="sha512-6JR4bbn8rCKvrkdoTJd/VFyXAN4CE9XMtgykPWgKiHjou56YDJxWsi90hAeMTYxNwUnKSQu9JPc3SQUg+aGCHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('tinymce-script-2.js') }}"></script>
<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
init_tinymce(`.tool_textarea`, '700');

document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    if (nameInput && slugInput) {
        nameInput.addEventListener('input', function() {
            let slug = this.value
                .toLowerCase()                    
                .trim()                           
                .replace(/[^a-z0-9\s-]/g, '')     
                .replace(/\s+/g, '-')             
                .replace(/-+/g, '-');             

            slugInput.value = slug;
        });
    }
});

// featured_image
document.getElementById('featured_image').addEventListener('change', function(event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
        }
        reader.readAsDataURL(file);
    } else {
        // agar koi image remove kare to placeholder wapas show kar do
        preview.src = "{{ asset('assets/img/landscape-placeholder.svg') }}";
    }
});
</script>
@endpush
