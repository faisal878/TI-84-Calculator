<div class="absolute top-4 right-4 h-[75px] md:left-[87px] left-4 flex justify-between">
    <div class="flex items-center px-5 lg:w-[65%] w-[100%] h-[75px] rounded-2xl bg-white">
        <div class="md:hidden grid grid-cols-2 w-full">
            <div class=""><img src="{{ asset('assets/img/Logo.png') }}" class="w-[160px]" alt=""></div>
            <div class="flex items-center gap-3 justify-end">
                
                <a href="javascript:void(0)" id="mobileMenuBtn" class="border p-2 rounded inline-block">
                    <img id="menuIcon" src="{{ asset('assets/img/icons/menu.svg') }}" class="w-5 h-5 block" />
                    <img id="closeIcon" src="{{ asset('assets/img/icons/close-menu.svg') }}" class="w-5 h-5 hidden" />
                </a>
            </div>
        </div>
        <div class="md:block hidden w-full">
            
        </div>
    </div>
    <div class="lg:flex items-center lg:w-[34%] w-[16%] h-[75px] rounded-2xl bg-white relative dropdown  hidden">
        <a href="javascript:void(0)" class="prof flex items-center p-3 pe-4 justify-between w-full">
            <div class="flex items-center">
                <div class="w-[60px] rounded-full h-[60px] border overflow-hidden">
                    {{-- @if (Auth::user()->image)
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" class="w-full h-[60px] object-cover" alt="">
                    @else --}}
                        <img src="{{ asset('assets/img/userprofile.png') }}" class="w-full h-[60px] object-cover" alt="">
                    {{-- @endif --}}
                </div>
                @if (Auth::user()->image)
                    <div class="ml-3 lg:block hidden">
                        <p class="mb-0"><strong>{{ Auth::user()->name }}</strong></p>
                        <p class="mb-0 text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                @endif
            </div>
            <div class="">
                <img src="{{ asset('assets/img/icons/union.png') }}" alt="">
            </div>
        </a>
        <div class="absolute border-black p-3 bg-white rounded-lg top-[75px] right-6 w-52 z-[30] hidden" style="box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1), 0px 0px 20px rgba(0, 0, 0, 0.06);" id="dropdown-open">
            <a href="{{ route("profile") }}" class="justify-between hover:bg-gray-200 block p-3 rounded-md group">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="min-w-[20px] min-h-[20px] flex items-center justify-center mr-2">
                            <img src="{{ asset('assets/img/icons/Profile.svg') }}" class="object-cover w-[20px] h-[20px] group-hover:filter group-hover:invert" alt="">
                        </div>
                        <span class="text-[#BDBDBD] group-hover:text-[#030639] block text-sm h-[20px] font-bold">Profile</span>
                    </div>
                </div>
            </a> 

            <form action="{{ route('logout') }}" class="justify-between hover:bg-gray-200 block p-3 rounded-md group" method="POST" >
                @csrf
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="min-w-[20px] min-h-[20px] flex items-center justify-center mr-2">
                            <img src="{{ asset('assets/img/icons/logout.svg') }}" class="object-cover w-[20px] h-[20px] group-hover:filter group-hover:invert" alt="">
                        </div>
                        <button type="submit" class="text-[#BDBDBD] group-hover:text-[#030639] block text-sm h-[20px] font-bold">Logout</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>