@extends('admin')
@php
    $metaTtitle = 'Category Create'; 
@endphp

@section('content')
    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl grid grid-cols-1 gap-4 p-4">
        @csrf
        <input type="hidden" name="id" value="{{ $category->id }}">
        <h2 class="text-lg ps-1 font-bold text-gray-900">Add Category</h2>
        <div class="grid md:grid-cols-2 gap-4">
            <!-- Category Name -->
            <div class="">
                <label for="name" class="text-[#808191] mb-1 text-sm block">Category Name <span class="text-red-600">*</span></label>
                <input type="text" value="{{ $category->name }}" name="name" id="name" required class="bg-white text-sm py-1 border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
            </div>

            <!-- Slug -->
            <div class="">
                <label for="slug" class="text-[#808191] mb-1 text-sm block">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ $category->slug }}" class="bg-white text-sm py-1 border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" readonly>
            </div>

            <!-- Parent Category -->
            <div class="">
                <label for="parent_id" class="text-[#808191] mb-1 text-sm block">Parent Category (Optional)</label>
                <select name="parent_id" id="parent_id" class="bg-white text-sm py-1 border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                    <option value="">-- Select Parent Category --</option>
                    <!-- Example -->
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : null }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Image -->
            <div class="">
                <label for="image" class="text-[#808191] mb-1 text-sm block">Category Image</label>
                <input type="file" name="image" id="image" class="border border-gray-200 bg-white text-sm py-1 w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
            </div>

            <!-- Meta Title -->
            <div class="">
                <label for="meta_title" class="text-[#808191] mb-1 text-sm block">Meta Title</label>
                <input type="text" name="meta_title" value="{{ $category->meta_title }}" id="meta_title" class="bg-white text-sm py-1 border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
            </div>

            <!-- Meta Keywords -->
            <div class="">
                <label for="meta_keywords" class="text-[#808191] mb-1 text-sm block">Meta Keywords (comma separated)</label>
                <input type="text" name="meta_keywords" value="{{ $category->meta_keywords }}" id="meta_keywords" class="bg-white text-sm py-1 border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
            </div>

            <!-- Meta Description -->
            <div class="md:col-span-2">
                <label for="meta_description" class="text-[#808191] mb-1 text-sm block">Meta Description</label>
                <textarea name="meta_description" id="meta_description" rows="3" class="bg-white text-sm py-1 border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">{{ $category->meta_description }}</textarea>
            </div>

            <!-- Description -->
            <div class="md:col-span-2">
                <label for="description" class="text-[#808191] mb-1 text-sm block">Category Description</label>
                <textarea name="description" id="description" rows="3" class="bg-white text-sm py-1 border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">{{ $category->description }}</textarea>
            </div>

            <!-- Active / Inactive -->
            <div class="flex justify-between col-span-2">
                <div class="flex items-center gap-2 md:col-span-2 mt-2">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ $category->is_active ? 'checked' : '' }} class="rounded border-gray-300 text-sky-600 focus:ring-sky-600">
                    <label for="is_active" class="text-sm text-[#808191]">Active</label>
                </div>
                <div class="md:col-span-2 flex justify-end mt-2 text-right">
                    <input type="submit" class="bg-blue-600 text-white px-4 py-2 text-xs rounded-md hover:bg-blue-700" value="Create Category">
                </div>
            </div>
        </div>
    </form>
   
    
@endsection


@push('script')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    if (nameInput && slugInput) {
        nameInput.addEventListener('input', function() {
            let slug = this.value
                .toLowerCase()                     // lowercase me convert
                .trim()                            // spaces remove start/end se
                .replace(/[^a-z0-9\s-]/g, '')      // special chars remove
                .replace(/\s+/g, '-')              // space ko dash me badlo
                .replace(/-+/g, '-');              // multiple dash ko single dash

            slugInput.value = slug;
        });
    }
});
</script>
@endpush
