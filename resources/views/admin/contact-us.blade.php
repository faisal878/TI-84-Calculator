@extends('admin')
@php
    $metaTtitle = 'Contact Us - Admin Panel';
@endphp

@section('content')
    <div class="bg-white p-6 rounded-2xl">
        <h2 class="text-lg mb-2 font-bold text-gray-900 uppercase">Contact Us</h2>
        
        <div class="bg-[#f9f9f9] rounded-2xl p-3 border border-gray-300">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-xs text-gray-700 uppercase bg-[#F7F9FD]">
                        <tr>
                            <th scope="col" class="text-left px-2 py-2 w-[20%]"> Name </th>
                            <th scope="col" class="text-left px-2 py-2 w-[20%]"> Email </th>
                            <th scope="col" class="text-left px-2 py-2 w-[20%]"> Subject </th>
                            <th scope="col" class="text-left px-2 py-2"> Message </th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="">
                        @if ($contactUs->isNotEmpty())
                            @foreach ($contactUs as $contactU)
                                <tr class="{{ $loop->even ? 'bg-[#F7F9FD]' : 'bg-white' }}">
                                    <td class="px-2 py-2 text-xs text-left">{{ $contactU->name }}</td>
                                    <td class="px-2 py-2 text-xs text-left">{{ $contactU->email }}</td>
                                    <td class="px-2 py-2 text-xs text-left">{{ $contactU->subject }}</td>
                                    <td class="px-2 py-2 text-xs text-left">{{ $contactU->message }}</td>
                                </tr>
                            @endforeach
                        @endif
                        
                    </tbody> 
                </table>
                    <div class="border-t border-gray-300 pt-3 flex items-center justify-between">
                        <div> <span class="text-sm text-gray-400"> Showing {{ $contactUs->firstItem() }} to {{ $contactUs->lastItem() }} of {{ $contactUs->total() }} Contacts </span> </div> 
                        {{ $contactUs->links() }} 
                    </div>
            </div>
        </div>
    </div>
   
    
@endsection


@push('script')

@endpush
