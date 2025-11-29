<section class="py-24 bg-[#000000] relative overflow-hidden lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto">
        <div class="grid lg:grid-cols-2 gap-6">
            <div class="">
                <p class="text-white lg:w-[75%] mb-4">
                    TI-84 Calculator Online, along with Graphics Calculator and TI-30XS Calculator Online, provides students with versatile digital tools for solving equations, plotting graphs, and handling complex math problems. These calculators can be used directly in any browser without installation, making them perfect for math and science students looking for quick and easy solutions.
                </p>
                <div class="flex items-center gap-3">
                    @if(isset($socialMedia['Facebook']))
                        <a href="{{ $socialMedia['Facebook'] }}" target="_blank"><img src="{{ asset('assets/img/fb.svg') }}" class="w-[24px] h-[24px]" alt="Facebook Icon"></a>
                    @endif
                    @if(isset($socialMedia['Twitter']))
                        <a href="{{ $socialMedia['Twitter'] }}" target="_blank"><img src="{{ asset('assets/img/x.svg') }}" class="w-[20px] h-[20px]" alt="X Icon"></a>
                    @endif
                    @if(isset($socialMedia['Instagram']))
                        <a href="{{ $socialMedia['Instagram'] }}" target="_blank"><img src="{{ asset('assets/img/instgram.svg') }}" class="w-[24px] h-[24px]" alt="Instagram Icon"></a>
                    @endif
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
        <div class="mt-5"><p class="text-sm text-[#b3d9cc]">© {{ date('Y') }} — Revision. All Rights Reserved. Design By <a href="https://manamil.dev/">Manamil Dev</a> </p></div>
    </div>
</section>