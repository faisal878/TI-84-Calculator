<section class="py-24 bg-[#000000] relative overflow-hidden lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto">
        <div class="grid lg:grid-cols-2 gap-6">
            <div class="">
                <a href="{{ route('home') }}" class="text-white font-bold text-[20px] mb-3">
                    Logo here
                    {{-- <img src="{{ asset('assets/img/Logo-white.png') }}" width="200" alt=""> --}}
                </a>
                <p class="text-white lg:w-[75%] mb-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. At atque animi impedit! Assumenda voluptatum, eius deserunt nemo labore quae at amet asperiores non ipsa magnam. Tempore rerum fugit perferendis in.</p>
                <div class="flex items-center gap-3">
                    <a href="javascript:void(0)"><img src="{{ asset('assets/img/fb.svg') }}" class="w-[24px] h-[24px]" alt="Facebook Icon"></a>
                    <a href="javascript:void(0)"><img src="{{ asset('assets/img/x.svg') }}" class="w-[20px] h-[20px]" alt="X Icon"></a>
                    <a href="javascript:void(0)"><img src="{{ asset('assets/img/instgram.svg') }}" class="w-[24px] h-[24px]" alt="Instagram ICon"></a>
                    <a href="javascript:void(0)"><img src="{{ asset('assets/img/linkedin.svg') }}" class="w-[24px] h-[24px]" alt="Linkedin Icon"></a>
                </div>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="">
                    <p class="text-[#b3d9cc] font-bold mb-3">Useful Links</p>
                    <a href="{{ route('home') }}" class="text-white block mb-2">Home</a>
                    {{-- <a href="{{ route('about') }}" class="text-white block mb-2">About Us</a> --}}
                    <a href="{{ route('contact') }}" class="text-white block mb-2">Contact Us</a>
                    <a href="{{ route('terms-and-conditions') }}" class="text-white block mb-2">Term and Condition</a>
                    <a href="{{ route('privacy-policy') }}" class="text-white block mb-2">Privacy policy</a>
                </div>
            </div>
        </div>
        <div class="mt-5"><p class="text-sm text-[#b3d9cc]">© {{ date('Y') }} — Revision. All Rights Reserved.</p></div>
    </div>
</section>