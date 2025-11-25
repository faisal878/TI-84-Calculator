@extends('admin')
@php
    $metaTtitle = 'Posts - Admin Panel';
@endphp

@section('content')
    <div class="bg-white p-6 rounded-2xl">
        <h2 class="text-lg mb-2 font-bold text-gray-900 uppercase">Posts</h2>
        <div class="grid md:grid-cols-12 md:gap-6 gap-4 mb-6">
            <div class="lg:col-span-10 md:col-span-8 relative">
                <input type="text" class="px-3 py-2 bg-[#F4F4F4] w-full rounded-md border-gray-300 focus:bg-white focus:border-blue-50 focus:text-black text-sm uppercase" placeholder="Search Category">
                <img src="{{ asset('assets/img/icons/search.svg') }}" class="absolute top-[10px] right-3 w-[18px] h-[18px] block" alt="">
            </div>
            <div class="lg:col-span-2 md:col-span-4">
                <a href="{{ route('admin.blog.create') }}"  data-modal-toggle="addRole" class="border w-full flex items-center justify-center h-full px-6 py-2 text-sm rounded-md bg-blue-600 text-white model uppercase">+ Add New POSt</a>
            </div>
        </div>
        <div class="bg-[#f9f9f9] rounded-2xl p-3 border border-gray-300">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-xs text-gray-700 uppercase bg-[#F7F9FD]">
                        <tr>
                            <th scope="col" class="px-2 py-2 text-left w-[5%] whitespace-nowrap"> POST ID </th>
                            <th scope="col" class="text-left px-2 py-2 w-[60%]"> Title </th>
                            <th scope="col" class="text-left px-2 py-2 w-[20%]"> CATEGORY </th>
                            <th scope="col" class="text-left px-2 py-2"> PUBLISH </th>
                            <th scope="col" class="text-left px-2 py-2"> ACTION </th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="">
                        @if ($posts->isNotEmpty())
                            @foreach ($posts as $post)
                                @php $id = Crypt::encrypt($post->id); @endphp
                                <tr class="{{ $loop->even ? 'bg-[#F7F9FD]' : 'bg-white' }}">
                                    <td class="px-2 py-2 text-xs text-left">{{ $post->id }}</td>
                                    <td class="px-2 py-2 text-xs text-left">{{ $post->title }}</td>
                                    <td class="px-2 py-2 text-xs text-left">{{ $post->category->name }}</td>
                                    <td class="px-2 py-2 text-xs text-left">
                                        @if ($post->is_published)
                                            <span class="text-green-600 font-semibold">Published</span>
                                        @else
                                            <span class="text-red-600 font-semibold">Un-Published</span>
                                        @endif
                                    </td>
                                    <td class="px-2 py-2 text-sm text-left">
                                        <a href="{{ route('admin.blog.edit', ['id' => $id]) }}" id="" class="inline-block px-2 text-xs rounded-sm text-blue-700 py-1 uppercase">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        
                    </tbody> 
                </table>
                <div class="border-t border-gray-300 pt-3 flex items-center justify-between">
                    <div> <span class="text-sm text-gray-400"> Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} Posts </span> </div> 
                    {{ $posts->links() }} 
                </div>
            </div>
        </div>
    </div>
   
    
@endsection


@push('script')

@endpush
