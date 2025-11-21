<nav class="py-2 lg:px-0 px-[15px]">
    <div class="py-6 max-w-[1240px] m-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="logo-here">
            Logo here...
            {{-- <img src="{{ asset('assets/img/Logo.png') }}" width="200" alt=""> --}}
        </a>
        <div class="md:flex gap-4 hidden">
            <a href="{{ route('home') }}" class="inline-block font-medium py-[5px] px-[14px] rounded-xl hover:text-[#034737] hover:bg-[#EDF2F1]">Home</a>
            <a href="{{ route('about') }}" class="inline-block font-medium py-[5px] px-[14px] rounded-xl hover:text-[#034737] hover:bg-[#EDF2F1]">About Us</a>
            <a href="{{ route('contact') }}" class="inline-block font-medium py-[5px] px-[14px] rounded-xl hover:text-[#034737] hover:bg-[#EDF2F1]">Contact</a>
        </div>
        <button id="sidemenuToggle" type="button" class="inline-flex items-center p-2 w-[48px] h-[48px] justify-center rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-0 focus:ring-transparent hover:bg-transparent active:bg-transparent">
            <img src="{{ asset('assets/img/menu-icon.svg') }}" alt="Light Icon" class="w-[40px] h-[40px]">
        </button>
    </div>
</nav>
<!-- Shadow Overlay -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-40 opacity-0 pointer-events-none transition-opacity duration-500 ease-in-out"></div>
<div class="sideMenu fixed -translate-x-full top-0 left-0 right-0 bottom-0 bg-white grid grid-rows-[auto_1fr_auto] z-50 transition-transform duration-500 ease-in-out">
    <div class="py-6 px-[24px] flex justify-between items-center">
        <a href="{{ route('home') }}" class="logo-here">
            Logo here
            {{-- <img src="{{ asset('assets/img/Logo.png') }}" width="200" alt=""> --}}
        </a>
        <button id="closeBtn" type="button" class="inline-flex items-center p-2 w-[48px] h-[48px] justify-center rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-0 focus:ring-transparent hover:bg-transparent active:bg-transparent">
            <img src="{{ asset('assets/img/close.svg') }}" alt="Close Icon" class="w-[40px] h-[40px]">
        </button>
    </div>

    <div class="px-[24px] pt-[24px] pb-[20px]">
        <ul class="space-y-4">
            <li><a href="{{ route('home') }}" class="block font-medium">Home</a></li>
            <li><a href="{{ route('about') }}" class="block font-medium">About Us</a></li>
            <li><a href="{{ route('contact') }}" class="block font-medium">Contact</a></li>
        </ul>
    </div>

    <div class="px-[24px] pt-[20px] pb-6 border-t">
        <div class="flex items-center gap-3">
            <a href="javascript:void(0)"><img src="{{ asset('assets/img/fb_black.svg') }}" class="w-[24px] h-[24px]" alt="Facebook Icon"></a>
            <a href="javascript:void(0)"><img src="{{ asset('assets/img/x_black.svg') }}" class="w-[20px] h-[20px]" alt="X Icon"></a>
            <a href="javascript:void(0)"><img src="{{ asset('assets/img/linkedin_black.svg') }}" class="w-[24px] h-[24px]" alt="Linkedin Icon"></a>
        </div>
    </div>
</div>
@push('script')
<script>
    const sidemenuToggle = document.getElementById('sidemenuToggle');
    const closeBtn = document.getElementById('closeBtn');
    const sideMenu = document.querySelector('.sideMenu');
    const overlay = document.getElementById('overlay');

    sidemenuToggle.addEventListener('click', () => {
        sideMenu.classList.remove('-translate-x-full');
        overlay.classList.remove('opacity-0', 'pointer-events-none');
        overlay.classList.add('opacity-100');
    });

    function closeSideMenu() {
        sideMenu.classList.add('-translate-x-full');
        overlay.classList.add('opacity-0', 'pointer-events-none');
        overlay.classList.remove('opacity-100');
    }

    closeBtn.addEventListener('click', closeSideMenu);
    overlay.addEventListener('click', closeSideMenu);
</script>


@endpush