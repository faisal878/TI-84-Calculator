@extends('app')
@php
    $metaTtitle = '';
@endphp

@push('style')
    <script src="https://www.desmos.com/api/v1.11/calculator.js?apiKey=dcb31709b452b1cf9dc26972add0fda6"></script>
@endpush

@section('content')

@include('web.inc.navbar')
<div class="p-8 w-80 m-auto">
    <a class="rounded-full border text-neutral-500 hover:border-neutral-500 border-bd-color cursor-pointer flex items-center justify-center h-7" href="https://tihub.org/">
        <span class="inline-block h-2 w-2 rounded-full bg-red-500 mr-2"></span>
        <span class="text-xs mr-2">Want to run <strong>apps</strong> online? Try this!</span>
        <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="14" height="14">
            <path d="M48.61414101 512.514586C48.614141 256.995556 256.478384 49.131313 512.003879 49.131313c255.51903001 0 463.38198 207.864242 463.38197999 463.383273 0 255.525495-207.864242 463.388444-463.38197999 463.388444C256.478384 975.904323 48.614141 768.04008101 48.61414101 512.514586L48.61414101 512.514586zM909.191758 512.514586c0-219.015758-178.173414-397.186586-397.186586-397.186586-219.020929 0-397.193051 178.172121-397.19305101 397.186586 0 219.019636 178.172121 397.191758 397.19305101 397.191758C731.01834299 909.707636 909.191758 731.535515 909.191758 512.514586L909.191758 512.514586zM567.474424 701.247354l165.761293-163.939556c9.797818-9.667232 12.249212-23.964444 7.378747-35.979636-0.297374-0.757657-1.025293-1.353697-1.387313-2.085495-1.521778-3.075879-3.176727-6.156929-5.72897-8.73761599-0.028444-0.029737-0.065939-0.029737-0.094384-0.06593901-0.036202-0.02973699-0.036202-0.067232-0.067232-0.100848L568.962586 325.51046501c-12.907313-12.944808-33.857939-12.974545-46.796283-0.07111101-6.491798 6.454303-9.73317199 14.964364-9.733172 23.434343 0 8.442828 3.206465 16.914101 9.662061 23.368404l106.843798 107.177374L313.407354 479.419475c-18.30270699 0-33.101576 14.828606-33.101576 33.096404 0 18.27297 14.797576 33.101576 33.101576 33.101576l317.287434 0-109.756768 108.56598c-6.556444 6.454303-9.83014101 14.995394-9.83014099 23.53002 0 8.409212 3.17672699 16.818424 9.56638399 23.272727C533.513051 713.990465 554.467556 714.121051 567.474424 701.247354L567.474424 701.247354zM567.474424 701.247354" fill="currentColor"></path>
        </svg>
    </a>
</div>

<div class="max-w-4xl m-auto space-y-10 p-6 ">
    <h1 class="font-extrabold text-4xl md:text-7xl text-center capitalize"> {{ $tool->title }} </h1>
    
</div>
<div class="max-w-[1200px] m-auto px-15">
    <div id="calculator" style="width: 100%; height: 98vh;"></div>
</div>


@include('web.inc.footer')
@endsection

@push('script')
<script>
    var elt = document.getElementById('calculator');
    var calculator = Desmos.GraphingCalculator(elt);
    calculator.setExpression({id:'graph1', latex:'y=x^2'});
</script>
<script>
    window.TestBridge = {};
</script>
@endpush  