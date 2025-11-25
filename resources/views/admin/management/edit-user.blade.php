@extends('admin')
@php
    $metaTtitle = 'Create New User';
@endphp

@section('content')
    <div class="bg-white p-6 rounded-2xl">
        <h2 class="text-lg mb-6 font-bold text-gray-900">User Management</h2>
        <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="relative w-[148px] h-[148px] p-[2px] border-2 border-gray-300 rounded-full mb-8">
                @if ($user->image)
                    <img id="profilePic" src="{{ asset('storage/' . $user->image) }}" class="w-full h-full object-cover rounded-full" alt="Profile" />
                    <label for="fileUpload" class="absolute bottom-1 right-1 bg-[#F4F4F4] p-2 rounded-full border border-blue-600 shadow cursor-pointer hover:bg-gray-100">
                        <img src="{{ asset('assets/img/icons/addPhoto.svg') }}" class="w-5 h-5" alt="Upload Icon" />
                    </label>
                @else
                    
                    <img id="profilePic" src="{{ asset('assets/img/profilethumbnail.png') }}" class="w-full h-full object-cover rounded-full" alt="Profile" />
                    <label for="fileUpload" class="absolute bottom-1 right-1 bg-[#F4F4F4] p-2 rounded-full border border-blue-600 shadow cursor-pointer hover:bg-gray-100">
                        <img src="{{ asset('assets/img/icons/addPhoto.svg') }}" class="w-5 h-5" alt="Upload Icon" />
                    </label>
                @endif
                <input id="fileUpload" type="file" name="image" accept="image/*" class="hidden" />
            </div>
            <div class="grid md:grid-cols-2 gap-4 border-b border-[#E5E7EB] pb-4 mb-4">
                <div class="lg:col-span-1 md:col-span-2 grid md:grid-cols-2 gap-4">
                    <div class="">
                        <label for="fname" class="text-[#808191] mb-1 text-sm block">First Name</label>
                        <input type="text" name="first_name" value="{{ $user->first_name }}" id="fname" class="bg-white text-sm py-1 border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                    </div>
                    <div class="">
                        <label for="lname" class="text-[#808191] mb-1 text-sm block">Last Name</label>
                        <input type="text" name="last_name" value="{{ $user->last_name }}" id="lname" class="bg-white text-sm py-1 border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                    </div>
                </div>
                <div class="">
                    <label for="phone" class="text-[#808191] mb-1 text-sm block">Phone</label>
                    <input type="number" name="phone" value="{{ $user->phone }}" id="phone" class="bg-white text-sm py-1 border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                </div>
                <div class="">
                    <label for="email" class="text-[#808191] mb-1 text-sm block">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" id="email" class="bg-white text-sm py-1 border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                </div>
                <div class="">
                    <label for="assignRole" class="text-[#808191] mb-1 text-sm block">Assign  Role</label>
                    <select name="role" id="assignRole" class="bg-[#FCFCFC] border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600 category-dropdown text-sm py-1">
                        <option value="">Select Anyone</option>
                        @foreach ($role as $item)
                            <option value="{{ Crypt::encrypt($item->id) }}" {{$user->getRoleNames()->first() == $item->name ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <label for="idCard" class="text-[#808191] mb-1 text-sm block">ID Card</label>
                    <input type="number" name="cnic" value="{{ $user->cnic }}" id="idCard" class="bg-white text-sm py-1 border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                </div>
                <div class="lg:col-span-1 md:col-span-2">
                    <label for="designation" class="text-[#808191] mb-1 text-sm block">Designation</label>
                    <input type="text" name="designation" value="{{ $user->designation }}" id="designation" class="bg-white text-sm py-1 border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                </div>
                <input type="hidden" name="id" value="{{ Crypt::encrypt($user->id) }}">
            </div>
            <h3 class="font-semibold text-base mb-4">Make Credentials >></h3>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-4 mb-8">
                <div class="lg:col-span-1 md:col-span-2">
                    <label for="lname" class="text-[#808191] mb-1 text-sm block">Username</label>
                    <input type="text" name="username" value="{{ $user->username }}" readonly id="lname" class="bg-white text-sm py-1 border-[#E5E7EB] w-full rounded-md px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600">
                </div>
                <div class="">
                    <label class="text-[#808191] mb-1 text-sm block">Password</label>
                    <div id="passwordWrapper" class="flex items-center gap-1 border border-[#E5E7EB] w-full rounded-md pr-2 bg-white focus-within:ring-1 focus-within:ring-sky-600 focus-within:border-sky-600 transition duration-200 overflow-hidden">
                        <input id="passwordInput" type="password" name="password" class="bg-white text-sm py-1 w-full border-none outline-none ring-0 focus:outline-none focus:ring-0 focus:border-none" />
                        <button type="button" id="togglePassword"><img src="{{ asset('assets/img/icons/eye.svg') }}" class="w-5 h-5" alt="Toggle Password" /></button>
                    </div>
                </div>
                <div>
                    <label class="text-[#808191] mb-1 text-sm block">Confirm Password</label>
                    <div id="confirmWrapper" class="flex items-center gap-1 border border-[#E5E7EB] w-full rounded-md pr-2 bg-white focus-within:ring-1 focus-within:ring-sky-600 focus-within:border-sky-600 transition duration-200 overflow-hidden">
                        <input id="confirmPasswordInput" type="password" class="bg-white text-sm py-1 w-full border-none outline-none ring-0 focus:outline-none focus:ring-0 focus:border-none" />
                        <button type="button" id="toggleConfirmPassword"><img src="{{ asset('assets/img/icons/eye.svg') }}" class="w-5 h-5" alt="Toggle Password" /></button>
                    </div>
                </div>
            </div>
            <div class="flex justify-end">
                <input type="submit" class="bg-blue-600 text-white py-2 px-6 text-sm inline-block rounded-md cursor-pointer" value="Create User">
            </div>
        </form>
    </div>
   
    
@endsection


@push('script')
<script>
    //profile pic
    const fileInput = document.getElementById('fileUpload');
    const profilePic = document.getElementById('profilePic');

    fileInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            profilePic.src = e.target.result;
        };
        reader.readAsDataURL(file);
        }
    });

    // password
    const passwordInput = document.getElementById('passwordInput');
    const confirmInput = document.getElementById('confirmPasswordInput');
    const passwordWrapper = document.getElementById('passwordWrapper');
    const confirmWrapper = document.getElementById('confirmWrapper');

    // Toggle Password Visibility
    document.getElementById('togglePassword').addEventListener('click', () => {
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    });

    document.getElementById('toggleConfirmPassword').addEventListener('click', () => {
        confirmInput.type = confirmInput.type === 'password' ? 'text' : 'password';
    });

    // Function to check match
    function checkPasswordMatch() {
        const password = passwordInput.value;
        const confirmPassword = confirmInput.value;

        const isMismatch = password && confirmPassword && password !== confirmPassword;

        // Add or remove red border
        if (isMismatch) {
        passwordWrapper.classList.add('border-red-500');
        confirmWrapper.classList.add('border-red-500');
        } else {
        passwordWrapper.classList.remove('border-red-500');
        confirmWrapper.classList.remove('border-red-500');
        }
    }

    // Check on input events
    passwordInput.addEventListener('input', checkPasswordMatch);
    confirmInput.addEventListener('input', checkPasswordMatch);
</script>

@endpush
