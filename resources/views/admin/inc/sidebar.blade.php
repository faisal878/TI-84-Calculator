<div id="sidebar" class="transition-all duration-300 absolute top-4 md:left-4 left-[-220px] rounded-2xl bottom-4 w-[55px] bg-white flex flex-col overflow-hidden z-[20] shadow border">
    <div class="flex justify-between  items-center border-b border-[#D9D9D9] px-[11px] py-3 bg-[#FAFAFA] h-[75px]">
        <div class="items-center hidden menu-log">Manamil.Dev</div>
        <a href="javascript:void(0)" id="menuToggle" class="border border-[#D9D9D9] py-1 px-1 rounded md:block hidden">
            <img id="menuToggleIconOpen" src="{{ asset('assets/img/icons/menu.svg') }}" class="object-fit w-[22px] h-[16px] block" alt="menu">
            <img id="menuToggleIconClose" src="{{ asset('assets/img/icons/close-menu.svg') }}" class="object-fit w-[22px] h-[20px] hidden" alt="close">
        </a>
    </div>
    <div class="py-[10px] ps-[11px] pe-[8px] overflow-y-auto custom-scrollbar">
        <p class="text-[#5C5E64] lg:text-[11px] text-[10px] uppercase mb-[4px]">MAIN</p>
        
        <a href="{{ route('dashboard') }}" class="sidebarlink group {{ Request::is('admin/dashboard*') ? 'bg-blue-600 font-bold text-white' : 'text-[#5C5E64]' }}">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="min-w-[16px] min-h-[16px] flex items-center justify-center mr-2">
                        <img src="{{ asset('assets/img/icons/Home-simple-door.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('admin/dashboard*') ? 'hidden' : 'block' }} group-hover:hidden" alt="home icon">
                        <img src="{{ asset('assets/img/icons/Home-simple-door-white.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('admin/dashboard*') ? 'block' : 'hidden' }} group-hover:block" alt="home icon">
                    </div>
                    <span class="menu-text hidden group-hover:text-white text-[12.5px] leading-none">Dashboard</span>
                </div>
            </div>
        </a>

        <a href="javascript:void(0)" class="sidebarlink group dropbox {{ Request::is('admin/blog*') ? 'active bg-blue-600 text-white font-bold' : 'hover:bg-blue-600  hover:text-white' }}" target-data="dropbox-6">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="min-w-[16px] min-h-[16px] flex items-center justify-center mr-2">
                        <img src="{{ asset('assets/img/icons/management.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('admin/blog*') ? 'hidden' : 'block' }} group-hover:hidden" alt="dropbox-menu-icon">
                        <img src="{{ asset('assets/img/icons/management-white.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('admin/blog*') ? 'block' : 'hidden' }} group-hover:block" alt="dropbox-menu-icon">
                    </div>
                    <span class="menu-text hidden text-[12.5px] leading-none {{ Request::is('admin/blog*') ? 'text-white' : 'text-[#5C5E64] group-hover:text-white' }}">Blog</span>
                </div>
                <div> 
                    <img src="{{ asset('assets/img/icons/union.png') }}" class="dropbox-icon {{ Request::is('admin/blog*') ? 'hidden' : 'block' }} group-hover:hidden" alt=""> 
                    <img src="{{ asset('assets/img/icons/union-white.png') }}" class="dropbox-icon {{ Request::is('admin/blog*') ? 'block' : 'hidden' }} group-hover:block" alt=""> 
                </div>
            </div>
        </a>
        <div class="flex p-2 rounded-md group dropbox-body" id="dropbox-6" style="display:{{ Request::is('admin/blog*') ? 'block'  : 'none' }}">
            <div class="border-2 mr-1 rounded-sm"></div>
            <div class="w-full">
                <a href="{{ route('admin.categories.index') }}" class="sidebardropdownlink {{ Request::is('admin/blog/categories*') ? 'bg-gray-200 font-bold text-[#030639]' : 'text-[#5C5E64]' }}">Categories</a>
                <a href="{{ route('admin.blog.post') }}" class="sidebardropdownlink {{ Request::is('admin/blog/posts*') ? 'bg-gray-200 font-bold text-[#030639]' : 'text-[#5C5E64]' }}">Posts</a>
                {{-- <a href="{{ route('assign-permissions') }}" class="sidebardropdownlink {{ Request::is('assign/permissions') ? 'bg-gray-200 font-bold text-[#030639]' : 'text-[#5C5E64]' }}">Assign Permissions</a> --}}
            </div>
        </div>

        <a href="{{ route('admin.gallery') }}" class="sidebarlink group {{ Request::is('admin/gallery*') ? 'bg-blue-600 font-bold text-white' : 'text-[#5C5E64]' }}">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="min-w-[16px] min-h-[16px] flex items-center justify-center mr-2">
                        <img src="{{ asset('assets/img/icons/Home-simple-door.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('admin/gallery*') ? 'hidden' : 'block' }} group-hover:hidden" alt="home icon">
                        <img src="{{ asset('assets/img/icons/Home-simple-door-white.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('admin/gallery*') ? 'block' : 'hidden' }} group-hover:block" alt="home icon">
                    </div>
                    <span class="menu-text hidden group-hover:text-white text-[12.5px] leading-none">Gallery</span>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.tools.index') }}" class="sidebarlink group {{ Request::is('admin/tools*') ? 'bg-blue-600 font-bold text-white' : 'text-[#5C5E64]' }}">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="min-w-[16px] min-h-[16px] flex items-center justify-center mr-2">
                        <img src="{{ asset('assets/img/icons/Home-simple-door.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('admin/tools*') ? 'hidden' : 'block' }} group-hover:hidden" alt="home icon">
                        <img src="{{ asset('assets/img/icons/Home-simple-door-white.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('admin/tools*') ? 'block' : 'hidden' }} group-hover:block" alt="home icon">
                    </div>
                    <span class="menu-text hidden group-hover:text-white text-[12.5px] leading-none">Tools</span>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.terms.condition') }}" class="sidebarlink group {{ Request::is('admin/terms-and-conditions*') ? 'bg-blue-600 font-bold text-white' : 'text-[#5C5E64]' }}">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="min-w-[16px] min-h-[16px] flex items-center justify-center mr-2">
                        <img src="{{ asset('assets/img/icons/Home-simple-door.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('admin/terms-and-conditions*') ? 'hidden' : 'block' }} group-hover:hidden" alt="home icon">
                        <img src="{{ asset('assets/img/icons/Home-simple-door-white.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('admin/terms-and-conditions*') ? 'block' : 'hidden' }} group-hover:block" alt="home icon">
                    </div>
                    <span class="menu-text hidden group-hover:text-white text-[12.5px] leading-none">Term and Condition</span>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.privacy.policy') }}" class="sidebarlink group {{ Request::is('admin/privacy-policy*') ? 'bg-blue-600 font-bold text-white' : 'text-[#5C5E64]' }}">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="min-w-[16px] min-h-[16px] flex items-center justify-center mr-2">
                        <img src="{{ asset('assets/img/icons/Home-simple-door.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('admin/privacy-policy*') ? 'hidden' : 'block' }} group-hover:hidden" alt="home icon">
                        <img src="{{ asset('assets/img/icons/Home-simple-door-white.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('admin/privacy-policy*') ? 'block' : 'hidden' }} group-hover:block" alt="home icon">
                    </div>
                    <span class="menu-text hidden group-hover:text-white text-[12.5px] leading-none">Privacy Policy</span>
                </div>
            </div>
        </a>
        <a href="{{ route('admin.contact.us') }}" class="sidebarlink group {{ Request::is('admin/contact-us') ? 'bg-blue-600 font-bold text-white' : 'text-[#5C5E64]' }}">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="min-w-[16px] min-h-[16px] flex items-center justify-center mr-2">
                        <img src="{{ asset('assets/img/icons/Home-simple-door.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('admin/contact-us') ? 'hidden' : 'block' }} group-hover:hidden" alt="home icon">
                        <img src="{{ asset('assets/img/icons/Home-simple-door-white.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('admin/contact-us') ? 'block' : 'hidden' }} group-hover:block" alt="home icon">
                    </div>
                    <span class="menu-text hidden group-hover:text-white text-[12.5px] leading-none">Contact Us</span>
                </div>
            </div>
        </a>

        {{-- <a href="javascript:void(0)" class="sidebarlink group dropbox {{ Request::is('user/management','role*','assign/permissions*','create/new/user', 'edit/user/*') ? 'active bg-blue-600 text-white font-bold' : 'hover:bg-blue-600  hover:text-white' }}" target-data="dropbox-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="min-w-[16px] min-h-[16px] flex items-center justify-center mr-2">
                        <img src="{{ asset('assets/img/icons/management.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('user/management','role*','assign/permissions*','create/new/user', 'edit/user/*') ? 'hidden' : 'block' }} group-hover:hidden" alt="dropbox-menu-icon">
                        <img src="{{ asset('assets/img/icons/management-white.svg') }}" class="object-fit w-[16px] h-[16px] {{ Request::is('user/management','role*','assign/permissions*','create/new/user', 'edit/user/*') ? 'block' : 'hidden' }} group-hover:block" alt="dropbox-menu-icon">
                    </div>
                    <span class="menu-text hidden text-[12.5px] leading-none {{ Request::is('user/management','role*','assign/permissions*','create/new/user', 'edit/user/*') ? 'text-white' : 'text-[#5C5E64] group-hover:text-white' }}">Management</span>
                </div>
                <div> 
                    <img src="{{ asset('assets/img/icons/union.png') }}" class="dropbox-icon {{ Request::is('user/management','role*','assign/permissions*','create/new/user', 'edit/user/*') ? 'hidden' : 'block' }} group-hover:hidden" alt=""> 
                    <img src="{{ asset('assets/img/icons/union-white.png') }}" class="dropbox-icon {{ Request::is('user/management','role*','assign/permissions*','create/new/user', 'edit/user/*') ? 'block' : 'hidden' }} group-hover:block" alt=""> 
                </div>
            </div>
        </a> --}}

        <div class="flex p-2 rounded-md group dropbox-body" id="dropbox-4" style="display:{{ Request::is('user/management','role*','assign/permissions*','create/new/user','edit/user/*') ? : 'none' }}">
            <div class="border-2 mr-1 rounded-sm"></div>
            <div class="w-full">
                <a href="{{ route('user-management') }}" class="sidebardropdownlink {{ Request::is('user/management','create/new/user','edit/user/*') ? 'bg-gray-200 font-bold text-[#030639]' : 'text-[#5C5E64]' }}">User Management</a>
                <a href="{{ route('role') }}" class="sidebardropdownlink {{ Request::is('role*') ? 'bg-gray-200 font-bold text-[#030639]' : 'text-[#5C5E64]' }}">Role / Permissions</a>
                {{-- <a href="{{ route('assign-permissions') }}" class="sidebardropdownlink {{ Request::is('assign/permissions') ? 'bg-gray-200 font-bold text-[#030639]' : 'text-[#5C5E64]' }}">Assign Permissions</a> --}}
            </div>
        </div>
    </div>
</div>


@push('script')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const menuToggle = document.getElementById('menuToggle');
    const menuTextElements = document.querySelectorAll('.menu-text');
    const menulogo = document.querySelectorAll('.menu-log');
    const dropboxes = document.querySelectorAll('.dropbox');
    const dropboxBodies = document.querySelectorAll('.dropbox-body');

    // ✅ Mobile Menu Button Icons
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');

    // ✅ Menu Toggle Button Icons
    const menuToggleIconOpen = document.getElementById('menuToggleIconOpen');
    const menuToggleIconClose = document.getElementById('menuToggleIconClose');

    let mobileSidebarOpen = false;

    // ✅ Collapse menu for mobile/tablet sizes on reload
    const screenWidth = window.innerWidth;
    if (screenWidth < 768) {
        // tablet r us bri scren bnd rhy ge
        localStorage.setItem('sidebarExpanded', 'true');
    } else {
        // sidebar mobile pr open rhy ge
        localStorage.setItem('sidebarExpanded', 'false');
    }

    let hoverTimeout;

    // Hover enter on sidebar → expand
    sidebar.addEventListener('mouseenter', function () {
        clearTimeout(hoverTimeout);
        if (!isExpanded) {
            expandSidebar();
        }
    });

    // Hover leave from sidebar → collapse
    sidebar.addEventListener('mouseleave', function () {
        hoverTimeout = setTimeout(() => {
            if (isExpanded) {
                collapseSidebar();
            }
        }, 300); // small delay for smoother UX
    });

    

    let isExpanded = localStorage.getItem('sidebarExpanded') === 'true';

    function expandSidebar() {
        sidebar.classList.remove('w-[55px]');
        sidebar.classList.add('w-[220px]');
        menuTextElements.forEach(el => el.classList.remove('hidden'));
        menulogo.forEach(el => el.classList.remove('hidden'));
        localStorage.setItem('sidebarExpanded', 'true');
        isExpanded = true;

        if (window.innerWidth < 3024) {
            sidebar.classList.add('z-[20]');
        }

        // ✅ Toggle menuToggle icon
        if (menuToggleIconOpen && menuToggleIconClose) {
            menuToggleIconOpen.classList.add('hidden');
            menuToggleIconClose.classList.remove('hidden');
        }
    }

    function collapseSidebar() {
        sidebar.classList.remove('w-[220px]');
        sidebar.classList.add('w-[55px]');
        menuTextElements.forEach(el => el.classList.add('hidden'));
        menulogo.forEach(el => el.classList.add('hidden'));
        localStorage.setItem('sidebarExpanded', 'false');
        isExpanded = false;

        dropboxBodies.forEach(div => div.style.display = 'none');

        setTimeout(() => {
            sidebar.classList.remove('z-[20]');
        }, 2);

        // ✅ Toggle menuToggle icon
        if (menuToggleIconOpen && menuToggleIconClose) {
            menuToggleIconOpen.classList.remove('hidden');
            menuToggleIconClose.classList.add('hidden');
        }
    }

    // ✅ Initialize based on saved state
    if (isExpanded) {
        expandSidebar();
    } else {
        collapseSidebar();
    }

    // ✅ Toggle sidebar with menuToggle button (for tablets/desktops)
    menuToggle.addEventListener('click', function (e) {
        e.stopPropagation();
        if (isExpanded) {
            collapseSidebar();
        } else {
            expandSidebar();
        }
    });

    // ✅ Toggle sidebar for mobile menu button
    mobileMenuBtn.addEventListener('click', function (e) {
        e.stopPropagation();

        if (mobileSidebarOpen) {
            sidebar.classList.remove('left-4');
            sidebar.classList.add('left-[-220px]');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        } else {
            sidebar.classList.remove('left-[-220px]');
            sidebar.classList.add('left-4');
            menuIcon.classList.add('hidden');
            closeIcon.classList.remove('hidden');
        }

        mobileSidebarOpen = !mobileSidebarOpen;
    });
    document.addEventListener('click', function (e) {
        if (window.innerWidth < 768 && mobileSidebarOpen) {
            const isClickInsideSidebar = sidebar.contains(e.target);
            const isClickOnToggleBtn = mobileMenuBtn.contains(e.target);

            if (!isClickInsideSidebar && !isClickOnToggleBtn) {
                sidebar.classList.remove('left-4');
                sidebar.classList.add('left-[-220px]');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                mobileSidebarOpen = false;
            }
        }
    });

    // ✅ Dropdown click handler
    dropboxes.forEach(function (dropbox) {
        dropbox.addEventListener('click', function (e) {
            e.stopPropagation();

            const targetId = this.getAttribute('target-data');
            const targetDiv = document.getElementById(targetId);

            if (!isExpanded) {
                expandSidebar();
            }

            const isVisible = targetDiv.style.display === 'flex';

            dropboxBodies.forEach(div => div.style.display = 'none');
            dropboxes.forEach(btn => btn.classList.remove('active'));

            if (!isVisible) {
                targetDiv.style.display = 'flex';
                this.classList.add('active');
            } else {
                targetDiv.style.display = 'none';
                this.classList.remove('active');
            }
        });
    });
});


</script>
@endpush