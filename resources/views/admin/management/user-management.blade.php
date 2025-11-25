@extends('admin')
@php
    $metaTtitle = 'User Management';
@endphp

@section('content')
    <div class="bg-white p-6 rounded-2xl">
        <h2 class="text-md mb-2 font-bold text-gray-900 uppercase">User Management</h2>
        <div class="grid md:grid-cols-12 md:gap-6 gap-4 mb-6">
            <div class="lg:col-span-10 md:col-span-8 relative">
                <input type="text" class="px-3 py-2 text-sm bg-[#F4F4F4] w-full rounded-md border-gray-300 focus:bg-white focus:border-blue-50 focus:text-black uppercase" placeholder="Search Voucher">
                <img src="{{ asset('assets/img/icons/search.svg') }}" class="absolute top-[10px] right-3 w-[18px] h-[18px] block" alt="">
            </div>
            <div class="lg:col-span-2 md:col-span-4">
                <a href="{{ route('create-new-user') }}" class="bg-blue-600 text-white w-full px-6 py-2 text-sm flex items-center justify-center h-full rounded-md model uppercase">+ Add User</a>
            </div>
        </div>
        <div class="bg-[#f9f9f9] rounded-2xl p-3 border border-gray-300">

            <div class="overflow-x-auto">
                <table class="w-full text-xs">
                    <thead class="text-gray-700 uppercase bg-[#F7F9FD]">
                        <tr>
                            <th scope="col" class="px-2 py-2 text-left whitespace-nowrap">USER ID</th>
                            <th scope="col" class="text-left px-2 py-2 whitespace-nowrap">FIRST NAME</th>
                            <th scope="col" class="text-left px-2 py-2 whitespace-nowrap">LAST NAME</th>
                            <th scope="col" class="text-left px-2 py-2 whitespace-nowrap">Username</th>
                            <th scope="col" class="text-left px-2 py-2">EMAIL</th>
                            <th scope="col" class="text-left px-2 py-2">PHONE</th>
                            <th scope="col" class="text-left px-2 py-2">ROLE</th>
                            <th scope="col" class="text-left px-2 py-2 w-[10%]">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="table-body text-gray-600" class="">
                        @if ($user->isNotEmpty())
                            @foreach ($user as $item)
                                @if (!$item->hasRole('Super Admin'))
                                    @php
                                        $id = Crypt::encrypt($item->id);
                                    @endphp
                                    <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-white' : 'bg-[#F7F9FD]' }}  group edit-attachment hover:bg-[#F4F4F4]" id="delson{{ $loop->iteration.$item->id }}">
                                        <td class="px-2 py-2 text-left">{{  $item->id }}</td>
                    
                                        <td class="px-2 py-2 text-left">{{  $item->first_name }}</td>
                    
                                        <td class="px-2 py-2 text-left">{{  $item->last_name }}</td>
                                        <td class="px-2 py-2 text-left">{{  $item->username }}</td>
                    
                                        <td class="px-2 py-2 text-left">{{  $item->email }}</td>
                    
                                        <td class="px-2 py-2 text-left">{{  $item->phone }}</td>
                    
                                        <td class="px-2 py-2 text-left">{{ $item->getRoleNames()->first() ?? 'No Role Assigned' }}</td>
                    
                                        <td class="px-2 py-2 text-left flex gap-1">
    
                                            <a href="{{ route('activity.logs', ['id' => $id]) }}"  class="text-xs text-white bg-green-700 px-2 py-[2px] whitespace-nowrap rounded model">Activity Logs</a>
                                            <button type="button"  data-modal-toggle="{{ $id }}" class="text-xs text-white bg-blue-500 px-2 py-[2px] rounded model uppercase">View</button>
                                            
                                            <div class="hidden relative" id="{{ $id }}"> 
                                                <div class="flex jsutify-between">
                                                    <div class=""><h2 class="font-bold text-base"></h2></div>
                                                    <div class=""></div>
                                                </div>
                                                <div class="fixed flex top-0 left-0 right-0 bottom-0 z-[2] backdrop-blur-sm bg-black/30 items-center justify-center">
                                                    
                                                    <div class="border p-6 bg-white rounded-2xl lg:w-[40%] w-[90%] relative">
                                                        <div class="flex justify-between mb-4 text-end">
                                                            <div class=""><h2 class="font-bold text-base">User Details</h2></div>
                                                            <div class="">
                                                                <div class="mb-1"><p class=""><span class="text-sm">User ID: </span><span class="font-bold text-sm"># {{ $item->id }}</span></p></div>
                                                            </div>
                                                        </div>
                                                        <div class="md:flex items-center justify-between bg-[#F0F7FF] p-4 rounded-xl mb-6">
                                                            <div class="flex items-center gap-3">
                                                                
                                                                @if ($item->image)
                                                                    <div class="">
                                                                        <img src="{{ asset('storage/' . $item->image) }}" class="w-[110px] h-[110px] rounded-full border border-gray-300 object-cover" alt="Profile photo of {{ $item->first_name }} {{ $item->last_name }}">
                                                                    </div>
                                                                @else
                                                                    <div class="">
                                                                        <img src="{{ asset('assets/img/userprofile.png') }}" class="w-[110px] h-[110px] rounded-full border border-gray-300 object-cover" alt="Default profile photo for user {{ $item->first_name }} {{ $item->last_name }}">
                                                                    </div>
                                                                @endif
                                                                <div class="text-start">
                                                                    <h4 class="text-base font-semibold">{{ $item->first_name }} {{ $item->last_name }}</h4>
                                                                    <p class="md:text-sm text-xs text-gray-700 mb-3">{{ $item->email }}</p>
                                                                    <p class="text-sm text-gray-700">{{ $item->phone }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="md:text-end text-start md:mt-0 mt-4">
                                                                <h4 class="text-sm text-gray-700">Assigned Role</h4>
                                                                <h2 class="text-sm text-[#1DC9A0] font-semibold">{{ $item->getRoleNames()->first() ?? 'No Role Assigned' }}</h2>
                                                            </div>
                                                        </div>
                                                        <div class="flex justify-between mb-4">
                                                            <div class="text-left">
                                                                <h4 class="text-sm mb-1 text-gray-700">ID card</h4>
                                                                <h2 class="text-base font-semibold">{{ $item->cnic }}</h2>
                                                                <br>
                                                                <h4 class="text-sm mb-1 text-gray-700">Designation</h4>
                                                                <h2 class="text-base font-semibold">{{ $item->designation }}</h2>
                                                            </div>
                                                            {{-- <div class="text-start">
                                                                <h4 class="text-sm mb-1 text-gray-700">Credentials</h4>
                                                                <div class="flex items-center gap-1">
                                                                    <input id="maskedInput" type="text" value="**************" readonly class="max-w-[151px] border-0 p-0 font-semibold text-base tracking-widest" />
                                                                    <button id="togglePassword" class="mb-[5px]"><img src="{{ asset('assets/img/icons/eye.svg') }}" class="w-[25px]" alt=""></button>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                        <div class="text-right">
                                                            <button type="button" target-mode-id="addCustomer" class="border close-modal-btn inline-block px-8 text-[#808191] text-sm rounded-lg py-2 close-modal uppercase" data-modal-toggle="{{ $id }}">Close</button>
                                                            <a href="{{ route('edit.user', ['id' => $id]) }}" id="" class="border inline-block px-6 rounded-lg bg-blue-600 text-white text-sm py-2 uppercase">Edit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <button type="button"  data-modal-toggle="editToggle" class="text-xs text-white bg-blue-500 px-2 py-1 rounded model">Edit</button> --}}
                                            {{-- <div class="hidden relative" id="editToggle">
                                                <form method="POST" action="" enctype="" class="fixed flex top-0 left-0 right-0 bottom-0 z-[2] backdrop-blur-sm bg-black/30 items-center justify-center">
                                                    @csrf
                                                    <input type="hidden" name="id" value="">
                                                    <div class="border p-6 bg-white rounded-2xl lg:w-[40%] w-[40%] text-end relative">
                                                        <button type="button" data-modal-toggle="editToggle" class="close-modal absolute top-2 right-2"><img src="{{ asset('assets/img/icons/close.svg') }}" class="object-cover w-[20px] h-[20px]" alt=""></button>
                                                        <div class="flex justify-center items-center">
                                                            <div class="w-[100%] text-center">
                                                                <h2 class="font-bold text-md text-center mb-3">Edit Role</h2>
                                                                <input type="text" class="border border-gray-300 p-2 mb-3 w-full" name="name" id="" value="" placeholder="Edit Role">
                                                                <input type="submit" class="border w-full block rounded-lg cursor-pointer bg-blue-600 text-white text-sm py-3" value="Update Role">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div> --}}
                                            <button type="button" class="text-xs text-white bg-red-700 px-2 py-[2px] rounded model uppercase"  data-modal-toggle="modalDestoryCustomer{{ $loop->iteration.$item->id }}">Delete</button>
                                            <x-deleted-data destroyLink="./delete/user/" customer="{{ Crypt::encrypt($item->id) }}" dataTitle="Are you sure to delete this user?" dataRow="delson{{ $loop->iteration.$item->id }}" customId="modalDestoryCustomer{{ $loop->iteration.$item->id }}" />
    
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
   
    
@endsection


@push('script')
<script>
    // const maskedInput = document.getElementById('maskedInput');
    // const actualPassword = '1234567891011';
    // let isVisible = false;

    // document.getElementById('togglePassword').addEventListener('click', () => {
    //     isVisible = !isVisible;
    //     maskedInput.value = isVisible ? actualPassword : '*'.repeat(actualPassword.length);
    // });
</script>
@endpush
