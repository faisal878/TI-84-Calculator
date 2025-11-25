@extends('app')
@php
    $metaTtitle = 'We Are Manamil — Digital Solutions & AI Innovation';
@endphp

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset("ti84/ti84.css") }}"/>
@endpush

@section('content')
@include('web.inc.navbar')

<div class="pt-8 w-80 m-auto">
    <a class="rounded-full border text-neutral-500 hover:border-neutral-500 border-bd-color cursor-pointer flex items-center justify-center h-7" href="https://tihub.org/">
        <span class="inline-block h-2 w-2 rounded-full bg-red-500 mr-2"></span>
        <span class="text-xs mr-2">Want to run <strong>apps</strong> online? Try this!</span>
        <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="14" height="14">
            <path d="M48.61414101 512.514586C48.614141 256.995556 256.478384 49.131313 512.003879 49.131313c255.51903001 0 463.38198 207.864242 463.38197999 463.383273 0 255.525495-207.864242 463.388444-463.38197999 463.388444C256.478384 975.904323 48.614141 768.04008101 48.61414101 512.514586L48.61414101 512.514586zM909.191758 512.514586c0-219.015758-178.173414-397.186586-397.186586-397.186586-219.020929 0-397.193051 178.172121-397.19305101 397.186586 0 219.019636 178.172121 397.191758 397.19305101 397.191758C731.01834299 909.707636 909.191758 731.535515 909.191758 512.514586L909.191758 512.514586zM567.474424 701.247354l165.761293-163.939556c9.797818-9.667232 12.249212-23.964444 7.378747-35.979636-0.297374-0.757657-1.025293-1.353697-1.387313-2.085495-1.521778-3.075879-3.176727-6.156929-5.72897-8.73761599-0.028444-0.029737-0.065939-0.029737-0.094384-0.06593901-0.036202-0.02973699-0.036202-0.067232-0.067232-0.100848L568.962586 325.51046501c-12.907313-12.944808-33.857939-12.974545-46.796283-0.07111101-6.491798 6.454303-9.73317199 14.964364-9.733172 23.434343 0 8.442828 3.206465 16.914101 9.662061 23.368404l106.843798 107.177374L313.407354 479.419475c-18.30270699 0-33.101576 14.828606-33.101576 33.096404 0 18.27297 14.797576 33.101576 33.101576 33.101576l317.287434 0-109.756768 108.56598c-6.556444 6.454303-9.83014101 14.995394-9.83014099 23.53002 0 8.409212 3.17672699 16.818424 9.56638399 23.272727C533.513051 713.990465 554.467556 714.121051 567.474424 701.247354L567.474424 701.247354zM567.474424 701.247354" fill="currentColor"></path>
        </svg>
    </a>
</div>

<div class="max-w-4xl m-auto space-y-10 p-6 ">
    <h1 class="font-extrabold text-4xl md:text-7xl text-center"> {{ $tool->title }} </h1>
    <div class="flex flex-col items-center w-full">
        <div class="flex flex-wrap justify-center gap-4">
            <div class=""><div id="calculatorDiv" class="m-auto"></div></div>
        </div>
    </div>
    <div class="space-y-4">
        <h2 class="font-extrabold text-xl md:text-2xl">Embed the TI-84 Calculator Online on Your Site!</h2>
        <p class="text-neutral-500 text-lg leading-7 px-4"> Easily add our TI-84 calculator simulator to your website with a simple iframe code. Give your users direct access to a fully functional TI-84 calculator, perfect for math and science needs—no extra setup required! </p>
        <div class="grid grid-cols-2 gap-4 justify-center mt-6">
            @if ($tools->isNotEmpty())
                @foreach ($tools as $item)
                    <a href="{{ url($item->slug) }}" class="p-6  rounded-lg border border-gray-200 hover:shadow-lg cursor-pointer transition-shadow duration-300 block max-w-md">
                        <h2 class="font-bold text-xl mb-3 capitalize">{{ $item->title }}</h2>
                        <p class="text-[14px] text-[#696981] line-clamp-3">{{ $item->meta_description }}</p>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
    @php
        $rawData = json_decode($tool->data, true);
    @endphp
    <div class="space-y-4">{!! @$rawData['content']['value'] !!}</div>
</div>

@include('web.inc.footer')
@endsection

@push('script')
<script src="https://mn.testnav.com/client/texasinstruments/js/ELG-min.js"></script>
    <!-- these tags would contain inlined data files in the html bundle-->
    <script id="h84statej" type="application/json" data-url="https://mn.testnav.com/client/texasinstruments/bin/No_AppsCE.h84statej"></script>
    <script id="ti84faceplate" type="application/json" data-url="https://mn.testnav.com/client/texasinstruments/images/TI84CE_touch.svg"></script>
<script>
      const from_id = (id) => document.getElementById(id);
      const h84statej = from_id("h84statej");
      const ti84faceplate = from_id("ti84faceplate");
      const calc_div = from_id("calculatorDiv");
      const main_div = from_id("main_div");

      //proxy the xmlhttprequest open to remove the hash from the url
      XMLHttpRequest.prototype.open = new Proxy(XMLHttpRequest.prototype.open, {
        apply: function (target, thisArg, args) {
          if (typeof args[1] === "string") {
            args[1] = args[1].replace(/#.*$/, "");
          }
          Reflect.apply(target, thisArg, args);
        },
      })

      function create_blob(string) {
        if (!string) return null;
        let blob = new Blob([JSON.parse(string)]);
        return URL.createObjectURL(blob);
      }

      function open_popup() {
        let width = window.getComputedStyle(calc_div)["width"].replace("px", "");
        let height = window.getComputedStyle(calc_div)["height"].replace("px", "");
        let new_url = new URL(location.href);
        new_url.hash = "popup";
        window.open(new_url.href, null, `height=${height}, width=${width}`);
      }

      function main() {
        if (location.hash === "#popup" || location.protocol == "file:"){
          main_div.style.display = "none";
        }

        let default_rom = h84statej.getAttribute("data-url");
        let default_faceplate = ti84faceplate.getAttribute("data-url");

        let rom_url = create_blob(h84statej.innerHTML) || default_rom;
        let faceplate_url = create_blob(ti84faceplate.innerHTML) || default_faceplate;
        
        rom_url += "#.h84statej";
        faceplate_url += "#.svg";
        let ti84 = new TI84PCE({ROMLocation: rom_url, FaceplateLocation: faceplate_url});
      }

      main();
    </script> 
@endpush  