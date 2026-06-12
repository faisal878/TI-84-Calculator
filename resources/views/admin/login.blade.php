@extends('admin')
@php
    $metaTtitle = 'Login';
@endphp

@section('content')
    <form method="post" action="{{ route('authentication') }}" class="flex items-center">
        @csrf
        <div class="lg:w-[50%] w-full p-3">
            <div class="w-[300px] 2xl:w-[450px] mx-auto 2xl:ml-auto 2xl:mr-auto md:mx-auto lg:mr-20 lg:mt-0 mt-[100px]">
                <div class="text-center mb-10">
                    <img src="{{ asset('img/flame_1.png') }}" width="120" class="inline-block mb-4" alt="">
                    <div class="flex justify-center items-center text-3xl font-bold">
                       
                    </div>
                </div>
                <h1 class="font-bold text-2xl mb-0"> Sign in</h1>
                <p class="text-[#969696] mb-6 text-sm">Please login to continue to your account.</p>
                <div class="bg-white mb-6 rounded-lg">
                    <div class="relative bg-inherit">
                        <input type="text" id="username" name="username" class="peer w-full bg-transparent rounded-md placeholder-transparent px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" placeholder="username" autocomplete="current-username" />
                        <label for="username" class="absolute cursor-text left-0 -top-4 text-sm text-gray-500 bg-inherit mx-1 px-1 peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Username</label>
                    </div>
                </div>
                <div class="bg-white mb-6 rounded-lg">
                    <div class="relative bg-inherit">
                        <input type="password" id="password" name="password" class="peer w-full bg-transparent rounded-md placeholder-transparent px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-sky-600" placeholder="password" autocomplete="current-password" />
                        <label for="password" class="absolute cursor-text left-0 -top-4 text-sm text-gray-500 bg-inherit mx-1 px-2 peer-placeholder-shown:text-sm peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Password</label>
                    </div>
                </div>
                
                {{-- <div class="relative mb-6">
                    <label class="flex items-center space-x-2">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <span class="text-gray-700"><b>Keep me logged in</b></span>
                    </label>
                </div> --}}
                <div class="mb-6">
                    <button type="submit" class="block w-full rounded-md bg-blue-600 py-3 text-sm text-white">Sign In</button>
                </div>
                {{-- <p class="text-center text-[#969696] mb-6">Need an account? <a href="{{ route('sign.up') }}" class="text-blue-600 underline"><b>Create one</b></a></p> --}}
                {{-- <div class="text-center"> <a href="{{ route('forget.password') }}" class="text-blue-600 text-lg"><b>Forget Password?</b></a></div> --}}
                <p class="text-[#969696] text-center mb-6 mt-14 text-md">Develop by <br> <a href="https://manamil.dev/" class="text-orange font-bold" target="_blank">Manamil Dev</a></p>
            </div>
        </div>
        <div class="w-[50%] h-screen lg:block hidden">
            <div class="overflow-hidden rounded-3xl h-[96%] m-3">
                <img src="{{ asset('assets/img/container.jpg') }}" class="w-full h-full object-cover object-bottom" alt="">
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush