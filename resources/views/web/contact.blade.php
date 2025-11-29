@extends('app')
@push('style')
@endpush
@section('content')
@include('web.inc.navbar')
<section class="lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto text-center relative py-16 overflow-hidden">
        <h1 class="font-bold mb-6 max-w-[940px] m-auto leading-tight lg:text-[52px] md:text-[42px] text-[33px] text-[#22281E] relative">Contact <span class="text-[#034737]"> Us</span></h1>
        <p class="text-[18px] max-w-[600px] m-auto text-[#696981]">We welcome your questions, feedback, and partnership opportunities. Please contact us to discuss how we can be of service.</p>
    </div>
</section>
<section class="pb-24 relative overflow-hidden lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto">
        <div class="grid lg:grid-cols-2 gap-10">
            <div class="">
                <h2 class="text-xl font-semibold mb-2">Send an email</h2>
                <div class="inline-flex text-[#696981] items-center">
                    <img src="{{ asset('assets/img/icons/mail.svg') }}" width="20" alt="email" class="me-2">
                    <a href="mailto:mfaisalsaim3@gmail.com">mfaisalsaim3@gmail.com</a>
                </div>
                <h2 class="text-xl font-semibold mb-2 mt-5">Follow Us</h2>
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-3">
                        @if(isset($socialMedia['Facebook']))
                            <a href="{{ $socialMedia['Facebook'] }}" target="_blank"><img src="{{ asset('assets/img/fb_black.svg') }}" width="20" alt="Facebook Icon"></a>
                        @endif
                        @if(isset($socialMedia['Twitter']))
                            <a href="{{ $socialMedia['Twitter'] }}" target="_blank"><img src="{{ asset('assets/img/x_black.svg') }}" width="20" alt="X Icon"></a>
                        @endif
                        @if(isset($socialMedia['Instagram']))
                            <a href="{{ $socialMedia['Instagram'] }}" target="_blank"><img src="{{ asset('assets/img/icons/Instagram_black.png') }}" width="20" alt="Instagram Icon"></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="">
                <form action="{{ route('contact.sendEmail') }}" method="post" class="grid gap-3">
                    @csrf
                    <input type="text" name="name" required class="w-full py-2 rounded text-lg outline-none text-gray-900 border border-gray-300 bg-[#f8fffe]" placeholder="Your Name">
                    <input type="email" name="email" required class="w-full py-2 rounded text-lg outline-none text-gray-900 border border-gray-300 bg-[#f8fffe]" placeholder="Email">
                    <input type="text" name="subject" required class="w-full py-2 rounded text-lg outline-none text-gray-900 border border-gray-300 bg-[#f8fffe]" placeholder="Subject">
                    <textarea name="message" id="" required cols="" rows="4" class="w-full py-2 rounded text-lg outline-none text-gray-900 border border-gray-300 bg-[#f8fffe]" placeholder="Your message here..."></textarea>
                    <button type="submit" class="w-full py-2 outline-none rounded px-10 text-lg bg-[#22281E] text-white">Send</button>
                </form>
                @if (session('success'))
                    <div class="mt-4 text-green-600"> {{ session('success') }} </div>
                @endif
            </div>
        </div>
    </div>
</section>

@include('web.inc.footer')
@endsection

@push('script')

@endpush  