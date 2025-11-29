@extends('app')
@php
    $metaTtitle = '';
    $rawData = json_decode($tool->data, true);
@endphp

@push('style')
    <script src="https://www.desmos.com/api/v1.11/calculator.js?apiKey=dcb31709b452b1cf9dc26972add0fda6"></script>
@endpush

@section('content')

@include('web.inc.navbar')


<div class="max-w-4xl m-auto space-y-10 p-6 ">
    <h1 class="font-extrabold text-4xl md:text-7xl text-center capitalize"> {{ $tool->title }} </h1>
    
</div>
<div class="max-w-[1200px] m-auto px-15">
    <div id="calculator" style="width: 100%; height: 98vh;"></div>
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
<script>
    var elt = document.getElementById('calculator');
    var calculator = Desmos.GraphingCalculator(elt);
    calculator.setExpression({id:'graph1', latex:'y=x^2'});
</script>
<script>
    window.TestBridge = {};
</script>
@endpush  