@extends('app')
@php
    $metaTtitle = 'We Are Manamil — Digital Solutions & AI Innovation';
@endphp

@section('content')
<div class="h-screen flex overflow-hidden bg-[#F4F7F3]">
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-40 z-40 opacity-0 pointer-events-none transition-opacity duration-500 ease-in-out"></div>
  <aside class="w-64 lg:flex flex-col border-r border-gray-200 bg-[#F4F7F3] lg:relative absolute top-0 bottom-0 z-50 lg:translate-x-0  -translate-x-full transition-transform duration-500 ease-in-out">
    <div class="pt-3 px-3 mb-6 shrink-0">
      <a href="#">
        <img src="{{ asset('assets/img/Logo.png') }}" class="w-full max-w-[180px]" alt="Logo">
      </a>
    </div>
    <div class="px-3 shrink-0 mb-6">
      <a href="#" class="flex items-center justify-center gap-2 px-3 py-2 text-sm rounded-3xl shadow bg-white border border-gray-200 hover:bg-[#E8F3DB] transition">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg" class="icon" aria-hidden="true"><path d="M2.6687 11.333V8.66699C2.6687 7.74455 2.66841 7.01205 2.71655 6.42285C2.76533 5.82612 2.86699 5.31731 3.10425 4.85156L3.25854 4.57617C3.64272 3.94975 4.19392 3.43995 4.85229 3.10449L5.02905 3.02149C5.44666 2.84233 5.90133 2.75849 6.42358 2.71582C7.01272 2.66769 7.74445 2.66797 8.66675 2.66797H9.16675C9.53393 2.66797 9.83165 2.96586 9.83179 3.33301C9.83179 3.70028 9.53402 3.99805 9.16675 3.99805H8.66675C7.7226 3.99805 7.05438 3.99834 6.53198 4.04102C6.14611 4.07254 5.87277 4.12568 5.65601 4.20313L5.45581 4.28906C5.01645 4.51293 4.64872 4.85345 4.39233 5.27149L4.28979 5.45508C4.16388 5.7022 4.08381 6.01663 4.04175 6.53125C3.99906 7.05373 3.99878 7.7226 3.99878 8.66699V11.333C3.99878 12.2774 3.99906 12.9463 4.04175 13.4688C4.08381 13.9833 4.16389 14.2978 4.28979 14.5449L4.39233 14.7285C4.64871 15.1465 5.01648 15.4871 5.45581 15.7109L5.65601 15.7969C5.87276 15.8743 6.14614 15.9265 6.53198 15.958C7.05439 16.0007 7.72256 16.002 8.66675 16.002H11.3337C12.2779 16.002 12.9461 16.0007 13.4685 15.958C13.9829 15.916 14.2976 15.8367 14.5447 15.7109L14.7292 15.6074C15.147 15.3511 15.4879 14.9841 15.7117 14.5449L15.7976 14.3447C15.8751 14.128 15.9272 13.8546 15.9587 13.4688C16.0014 12.9463 16.0017 12.2774 16.0017 11.333V10.833C16.0018 10.466 16.2997 10.1681 16.6667 10.168C17.0339 10.168 17.3316 10.4659 17.3318 10.833V11.333C17.3318 12.2555 17.3331 12.9879 17.2849 13.5771C17.2422 14.0993 17.1584 14.5541 16.9792 14.9717L16.8962 15.1484C16.5609 15.8066 16.0507 16.3571 15.4246 16.7412L15.1492 16.8955C14.6833 17.1329 14.1739 17.2354 13.5769 17.2842C12.9878 17.3323 12.256 17.332 11.3337 17.332H8.66675C7.74446 17.332 7.01271 17.3323 6.42358 17.2842C5.90135 17.2415 5.44665 17.1577 5.02905 16.9785L4.85229 16.8955C4.19396 16.5601 3.64271 16.0502 3.25854 15.4238L3.10425 15.1484C2.86697 14.6827 2.76534 14.1739 2.71655 13.5771C2.66841 12.9879 2.6687 12.2555 2.6687 11.333ZM13.4646 3.11328C14.4201 2.334 15.8288 2.38969 16.7195 3.28027L16.8865 3.46485C17.6141 4.35685 17.6143 5.64423 16.8865 6.53613L16.7195 6.7207L11.6726 11.7686C11.1373 12.3039 10.4624 12.6746 9.72827 12.8408L9.41089 12.8994L7.59351 13.1582C7.38637 13.1877 7.17701 13.1187 7.02905 12.9707C6.88112 12.8227 6.81199 12.6134 6.84155 12.4063L7.10132 10.5898L7.15991 10.2715C7.3262 9.53749 7.69692 8.86241 8.23218 8.32715L13.2791 3.28027L13.4646 3.11328ZM15.7791 4.2207C15.3753 3.81702 14.7366 3.79124 14.3035 4.14453L14.2195 4.2207L9.17261 9.26856C8.81541 9.62578 8.56774 10.0756 8.45679 10.5654L8.41772 10.7773L8.28296 11.7158L9.22241 11.582L9.43433 11.543C9.92426 11.432 10.3749 11.1844 10.7322 10.8271L15.7791 5.78027L15.8552 5.69629C16.185 5.29194 16.1852 4.708 15.8552 4.30371L15.7791 4.2207Z"></path></svg>
        New Chat
      </a>
    </div>
    <div class="flex-1 flex flex-col overflow-hidden px-3 pb-3">
      <div class="shrink-0 flex items-center justify-between dropbox cursor-pointer" target-data="dropbox-1">
        <p class="text-sm text-gray-500">History</p>
        <img src="{{ asset('assets/img/icons/arrow-down.svg') }}" class="w-[18px] dropbox-icon transition-transform duration-300" alt="">
      </div>
      <div class="flex-1 overflow-y-auto mt-2 dropbox-body" id="dropbox-1">
        <div class="text-sm hover:bg-[#e8ebea] py-1 px-[5px] rounded-md mb-1 flex items-center justify-between">
          <a href="" class="w-full">Chat 1</a>
          {{-- dropdown --}}
          <div class="">
            <div class="dropbox cursor-pointer" target-data="linkEdit-1">
              <img src="{{ asset('assets/img/icons/doted.svg') }}" class="w-[18px] dropbox-icon transition-transform duration-300" alt="">
            </div>
            <div class="absolute hidden border p-1 dropbox-body bg-white rounded-md shadow w-[110px]" id="linkEdit-1">
              <a href="javascript:void(0)" class="flex items-center gap-2 text-sm px-1 py-[5px] hover:bg-[#e8ebea] rounded-md"><img src="{{ asset('assets/img/icons/edit-pen.svg') }}" class="w-[17px] h-[17px]" alt="">Rename</a>
              <a href="javascript:void(0)" class="flex items-center gap-2 text-sm px-1 py-[5px] hover:bg-red-100 text-[#EF4444] rounded-md"><img src="{{ asset('assets/img/icons/delete.svg') }}" class="w-[17px] h-[17px]" alt="">Rename</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </aside>
  
  <!-- Main content -->
  <div class="flex-1 flex flex-col overflow-y-auto bg-white p-3">
    <!-- Header -->
    <header class="flex items-center justify-between">
      <div class="flex items-center gap-3">
        <button id="gptmenu" class="lg:hidden p-2 rounded-md hover:bg-gray-100">
          <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path d="M4 6h16M4 12h16M4 18h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
        {{--  --}}
        <div class="relative">
          <div class="shrink-0 flex items-center justify-between gap-1 dropbox cursor-pointer bg-[#EDF2F1] px-3 py-1 rounded-xl" target-data="dropbox-version">
            <p class="text-sm">your GPT</p>
            <img src="{{ asset('assets/img/icons/arrow-down.svg') }}" class="w-[18px] dropbox-icon transition-transform duration-300" alt="">
          </div>
          <div class="absolute hidden border p-1 dropbox-body bg-white rounded-md shadow w-[170px] mt-[2px]" id="dropbox-version">
            <a href="javascript:void(0)" class="flex items-center justify-between gap-2 text-sm px-1 py-[5px] hover:bg-[#e8ebea] rounded-md">
              Your GPT <img src="{{ asset('assets/img/icons/tick.svg') }}" class="w-[18px]" alt="">
            </a>
          </div>
        </div>
      </div>
      <div class="flex items-center gap-4">
        <a href="javascript:void(0)" class="flex items-center gap-2 text-[13px] bg-[#EDF2F1] px-3 py-1 rounded-xl">Home <img src="{{ asset('assets/img/icons/home.svg') }}" class="w-[15px] mb-[2px]" alt=""></a>
        <a href="javascript:void(0)" class="flex items-center gap-2 text-[13px] bg-[#EDF2F1] px-3 py-1 rounded-xl">Export <img src="{{ asset('assets/img/icons/export.svg') }}" class="w-[15px] mb-[2px]" alt=""></a>
      </div>
    </header>
    <!-- Content area -->
    <main class="flex items-center justify-center h-screen">
      <div class="box-border flex flex-col justify-center items-center w-full max-w-[840px] mx-auto px-8 pb-16 relative">
        <h1 class="text-3xl font-bold text-center">Good evening, Ali</h1>
        <p class="text-base font-semibold text-gray-500 text-center mb-5">How can I help you?</p>
        <div class="border border-gray-200 shadow p-3 rounded-2xl w-full mb-3">
          <textarea name="" id="autoTextarea" cols="" rows="2" class="w-full text-base p-0 border-0 outline-none focus:outline-none focus:ring-0 resize-none overflow-hidden" placeholder="Ask GPT AI..."></textarea>
          <div class="flex items-center justify-end">
            <a href="javascript:void(0)" class="hover:bg-[#ececec] p-[6px] rounded-full"><img src="{{ asset('assets/img/icons/upload-file.svg') }}" class="w-[20px]" alt=""></a>
            <a href="javascript:void(0)" class="hover:bg-[#ececec] p-[6px] rounded-full"><img src="{{ asset('assets/img/icons/mic.svg') }}" class="w-[20px]" alt=""></a>
          </div>
        </div>
        <div class="flex items-center justify-start w-full lg:overflow-visible overflow-x-auto gap-2 mb-3 pr-4">
          <a href="javascript:void(0)" class="shrink-0 flex items-center gap-2 text-sm text-gray-600 px-4 py-2 rounded-3xl bg-[#F3F3F1] whitespace-nowrap"><img src="{{ asset('assets/img/icons/img-icon.svg') }}" class="w-[19px]" alt=""> Create Image</a>
          <a href="javascript:void(0)" class="shrink-0 flex items-center gap-2 text-sm text-gray-600 px-4 py-2 rounded-3xl bg-[#F3F3F1] whitespace-nowrap"><img src="{{ asset('assets/img/icons/img-icon.svg') }}" class="w-[19px]" alt=""> Create Image</a>
          <a href="javascript:void(0)" class="shrink-0 flex items-center gap-2 text-sm text-gray-600 px-4 py-2 rounded-3xl bg-[#F3F3F1] whitespace-nowrap"><img src="{{ asset('assets/img/icons/img-icon.svg') }}" class="w-[19px]" alt=""> Create Image</a>
          <a href="javascript:void(0)" class="shrink-0 flex items-center gap-2 text-sm text-gray-600 px-4 py-2 rounded-3xl bg-[#F3F3F1] whitespace-nowrap"><img src="{{ asset('assets/img/icons/img-icon.svg') }}" class="w-[19px]" alt=""> Create Image</a>
          <a href="javascript:void(0)" class="shrink-0 flex items-center gap-2 text-sm text-gray-600 px-4 py-2 rounded-3xl bg-[#F3F3F1] whitespace-nowrap"><img src="{{ asset('assets/img/icons/img-icon.svg') }}" class="w-[19px]" alt=""> Create Image</a>
        </div>
        <div class="grid grid-cols-12 w-full justify-start gap-4">
          <div class="md:col-span-4 col-span-12 border bg-[#FAFAF8] p-3 rounded-xl">
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-2 text-sm font-bold">Faisalabad <img src="{{ asset('assets/img/icons/navigation.png') }}" class="w-[12px]" alt=""></div>
              <div class="">
                <img src="{{ asset('assets/img/icons/weather.png') }}" class="w-[34px]" alt="">
              </div>
            </div>
            <div class="flex items-center justify-between mt-4">
              <div class="text-3xl">
                32<sup>o</sup> C
              </div>
              <div class="text-end text-gray-500">
                <p>sunny</p>
                <div class="flex items-center justify-end gap-2 text-sm">
                  <p>H:31<sup>c</sup></p>
                  <p>L:21<sup>c</sup></p>
                </div>
              </div>
            </div>
          </div>
          <div class="md:col-span-4 col-span-12 md:block hidden border bg-[#FAFAF8] p-3 rounded-xl">
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-2 text-sm font-bold">Faisalabad <img src="{{ asset('assets/img/icons/navigation.png') }}" class="w-[12px]" alt=""></div>
              <div class="">
                <img src="{{ asset('assets/img/icons/weather.png') }}" class="w-[34px]" alt="">
              </div>
            </div>
            <div class="flex items-center justify-between mt-4">
              <div class="text-3xl">
                32<sup>o</sup> C
              </div>
              <div class="text-end text-gray-500">
                <p>sunny</p>
                <div class="flex items-center justify-end gap-2 text-sm">
                  <p>H:31<sup>c</sup></p>
                  <p>L:21<sup>c</sup></p>
                </div>
              </div>
            </div>
          </div>
          <div class="md:col-span-4 col-span-12 md:block hidden border bg-[#FAFAF8] p-3 rounded-xl">
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-2 text-sm font-bold">Faisalabad <img src="{{ asset('assets/img/icons/navigation.png') }}" class="w-[12px]" alt=""></div>
              <div class="">
                <img src="{{ asset('assets/img/icons/weather.png') }}" class="w-[34px]" alt="">
              </div>
            </div>
            <div class="flex items-center justify-between mt-4">
              <div class="text-3xl">
                32<sup>o</sup> C
              </div>
              <div class="text-end text-gray-500">
                <p>sunny</p>
                <div class="flex items-center justify-end gap-2 text-sm">
                  <p>H:31<sup>c</sup></p>
                  <p>L:21<sup>c</sup></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
@endsection

@push('script')
<script>
// dropdown
document.addEventListener("DOMContentLoaded", () => {
  const dropboxes = document.querySelectorAll(".dropbox");

  dropboxes.forEach((drop) => {

    drop.addEventListener("click", (e) => {
      e.stopPropagation();

      const targetId = drop.getAttribute("target-data");
      const targetBox = document.getElementById(targetId);
      const icon = drop.querySelector(".dropbox-icon");

      // 🔥 Parent dropdown-body, agar na mile to whole document use karo
      let parentContainer = drop.closest(".dropbox-body") || document;

      // Hide dropdowns within SAME LEVEL
      parentContainer.querySelectorAll(".dropbox-body").forEach((box) => {
        if (box.id !== targetId) {
          box.classList.add("hidden");
        }
      });

      // Reset icons in same level
      parentContainer.querySelectorAll(".dropbox-icon").forEach((ic) => {
        if (ic !== icon) {
          ic.classList.remove("rotate-180");
        }
      });

      // Toggle clicked dropdown
      targetBox.classList.toggle("hidden");
      icon.classList.toggle("rotate-180");
    });

  });
});


// textara k leay
document.addEventListener("DOMContentLoaded", () => {
    const textarea = document.getElementById("autoTextarea");

    textarea.addEventListener("input", () => {
        textarea.style.height = "auto";           // Reset height
        textarea.style.height = textarea.scrollHeight + "px";  

        // Max height limit 100px
        if (textarea.scrollHeight > 300) {
            textarea.style.height = "100px";
            textarea.style.overflowY = "auto";    // Enable scroll
        } else {
            textarea.style.overflowY = "hidden";   // No scroll
        }
    });
});


// side menu
document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("gptmenu");
    const sidebar = document.querySelector("aside");
    const overlay = document.getElementById("overlay");

    // Open Sidebar
    btn.addEventListener("click", () => {
        sidebar.classList.remove("-translate-x-full");
        sidebar.classList.add("translate-x-0");

        overlay.classList.remove("opacity-0", "pointer-events-none");
        overlay.classList.add("opacity-100", "pointer-events-auto");
    });

    // Close on overlay click
    overlay.addEventListener("click", () => {
        sidebar.classList.add("-translate-x-full");
        sidebar.classList.remove("translate-x-0");

        overlay.classList.add("opacity-0", "pointer-events-none");
        overlay.classList.remove("opacity-100", "pointer-events-auto");
    });
});


</script>
@endpush  