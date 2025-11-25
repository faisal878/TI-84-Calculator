@extends('admin')
@php
    $metaTtitle = 'Role';
@endphp

@section('content')
    <div class="bg-white p-6 rounded-2xl">
        <h2 class="text-lg mb-2 font-bold text-gray-900 uppercase">Role</h2>
        <div class="grid md:grid-cols-12 md:gap-6 gap-4 mb-6">
            <div class="lg:col-span-10 md:col-span-8 relative">
                <input type="text" class="px-3 py-2 bg-[#F4F4F4] w-full rounded-md border-gray-300 focus:bg-white focus:border-blue-50 focus:text-black text-sm uppercase" placeholder="Search Role">
                <img src="{{ asset('assets/img/icons/search.svg') }}" class="absolute top-[10px] right-3 w-[18px] h-[18px] block" alt="">
            </div>
            <div class="lg:col-span-2 md:col-span-4">
                <button type="button"  data-modal-toggle="addRole" class="border w-full flex items-center justify-center h-full px-6 py-2 text-sm rounded-md bg-blue-600 text-white model uppercase">+ Add New Role</button>
                <div class="hidden relative" id="addRole">
                    <form method="POST" action="{{ route('role.store') }}" enctype="" class="fixed flex top-0 left-0 right-0 bottom-0 z-[2] backdrop-blur-sm bg-black/30 items-center justify-center">
                        @csrf
                        <div class="border p-6 bg-white rounded-2xl lg:w-[20%] md:w-[40%] w-[90%] text-end relative">
                            <button type="button" data-modal-toggle="addRole" class="close-modal absolute top-2 right-2"><img src="{{ asset('assets/img/icons/close.svg') }}" class="object-cover w-[20px] h-[20px]" alt=""></button>
                            <div class="flex justify-center items-center">
                                <div class="w-[100%] text-center">
                                    <h2 class="font-bold text-md text-center mb-3">New Role</h2>
                                    <input type="text" class="border border-gray-300 p-2 mb-3 w-full" name="name" id="" value="" placeholder="Type Role Name">
                                    <input type="submit" class="border w-full block rounded-lg cursor-pointer bg-blue-600 text-white text-sm py-3" value="Create Role">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-[#f9f9f9] rounded-2xl p-3 border border-gray-300">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-xs text-gray-700 uppercase bg-[#F7F9FD]">
                        <tr>
                            <th scope="col" class="px-2 py-2 text-left w-[10%] whitespace-nowrap"> ROLE ID </th>
                            <th scope="col" class="text-left px-2 py-2 w-[70%]"> ROLE </th>
                            <th scope="col" class="text-left px-2 py-2 w-[20%]"> ACTION </th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="">
                        @if ($role->isNotEmpty())
                            @foreach ($role as $item)
                                @php
                                    $id = Crypt::encrypt($item->id);
                                @endphp
                                <tr class="{{ $loop->even ? 'bg-[#F7F9FD]' : 'bg-white' }}">
                                    <td class="px-2 py-2 text-left">{{ $item->id }}</td>
    
                                    <td class="px-2 py-2 text-left">{{ $item->name }}</td>
    
                                    <td class="px-2 py-2 text-left flex gap-1">
                                        <button type="button"  data-modal-toggle="{{ $id }}" class="text-xs text-white bg-blue-500 px-2 py-1 rounded model uppercase">Edit</button>
                                        <div class="hidden relative" id="{{ $id }}">
                                            <form method="POST" action="{{ route('role.update') }}" enctype="" class="fixed flex top-0 left-0 right-0 bottom-0 z-[2] backdrop-blur-sm bg-black/30 items-center justify-center">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                <div class="border p-6 bg-white rounded-2xl lg:w-[20%] w-[40%] text-end relative">
                                                    <button type="button" data-modal-toggle="{{ $id }}" class="close-modal absolute top-2 right-2"><img src="{{ asset('assets/img/icons/close.svg') }}" class="object-cover w-[20px] h-[20px]" alt=""></button>
                                                    <div class="flex justify-center items-center">
                                                        <div class="w-[100%] text-center">
                                                            <h2 class="font-bold text-md text-center mb-3 uppercase">Edit Role</h2>
                                                            <input type="text" class="border border-gray-300 p-2 mb-3 w-full" name="name" id="" value="{{ $item->name }}" placeholder="Edit Role">
                                                            <input type="submit" class="border w-full block rounded-lg cursor-pointer bg-blue-600 text-white text-sm py-3" value="Update Role">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <a href="{{ route('assign.permissions', ['id' => $id ]) }}" type="button" class="text-xs text-white bg-green-600 px-2 py-1 rounded model whitespace-nowrap" >Assign Permissions </a>
                                        <a href="{{ route('role.destroy', ['id' => $id ]) }}" type="button" class="text-xs text-white bg-red-700 px-2 py-1 rounded model" >Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
   
    
@endsection


@push('script')

@endpush
