@extends('app')
@php
  $metaTtitle = '';
  $rawData = json_decode($tool->data, true);
@endphp

@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset("ti84/ti84.css") }}"/>
    <style>
     
     /* .calculatorDiv {
        outline: none !important;
        margin-left: auto;
        margin-right: auto;
      } 
      #main_div {
        padding: 4px;
        max-width: 300px;
        margin-left: auto;
        margin-right: auto;
        display: flex;
        flex-direction: column;
        gap: 4px;
      }  */
    </style>
    
@endpush

@section('content')

@include('web.inc.navbar')

<div class="max-w-4xl m-auto space-y-10 p-6 ">

  <h1 class="font-extrabold text-4xl md:text-7xl text-center capitalize"> {{ $tool->title }} </h1>
  <div class=""><div id="calculatorDiv" class="m-auto"></div></div>
</div> 
<section class="lg:px-0 px-[15px]">
    <div class="">
        <div class="grid lg:grid-cols-1 grid-cols-1 gap-4 pb-8 max-w-[900px] m-auto content">
            {!! @$rawData['content']['value'] !!}
        </div>
    </div>
</section>
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