@extends('admin')
@php
    $metaTtitle = 'Terms and Conditions'; 
@endphp

@section('content')
    <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" class="pr-3">
        @csrf
        <input type="hidden" name="type" value="terms-and-conditions">
        <div class="bg-white rounded-2xl grid grid-cols-1 gap-4 p-4 mb-4">
            <h2 class="text-lg ps-1 font-bold text-gray-900">Terms and Conditions</h2>
        </div>
        <div class="grid grid-cols-12 gap-4">
            <div class="bg-white rounded-2xl col-span-12 p-4">
                <div class="mb-4">
                    <label for="title" class="text-[#808191] mb-1 text-sm block">Title <span class="text-red-600">*</span></label>
                    <input type="text" name="title" id="title" value="{{ $settings->title }}" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" required>
                </div>
                <div class="mb-4">
                    <label for="meta_title" class="text-[#808191] mb-1 text-sm block">Meta Title <span class="text-red-600">*</span></label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ $settings->meta_title }}" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" required>
                </div>
                <div class="mb-4">
                    <label for="meta_description" class="text-[#808191] mb-1 text-sm block">Meta Description <span class="text-red-600">*</span></label>
                    <textarea name="meta_description" id="meta_description" rows="2" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" required>{{ $settings->meta_description }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="post_content" class="text-[#808191] mb-1 text-sm block">Content <span class="text-red-600">*</span></label>
                    <textarea name="content" id="post_content" rows="4" class="bg-gray-200 text-sm py-1 border-gray-300 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">{{ $settings->data }}</textarea>
                </div>
                <div class="text-right">
                    <input type="submit" value="Save Post" class="text-sm bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 cursor-pointer">
                </div>
            </div>
        </div>
        
    </form>
   
    
@endsection


@push('script')

<!-- Place the first <script> tag in your HTML's <head> -->
<script src="https://cdn.tiny.cloud/1/v0h9k9gp515ty6n8fywi8a1squ5ba8e06fl4pmqjhbtapmd2/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    height: 700,
    selector: '#post_content',
    plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    content_style: "body { background-color: #e5e7eb; color: #000000; font-family: 'Inter', sans-serif; font-size:14px; }"
  });

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
