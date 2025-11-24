@extends('app')
@php
    $metaTtitle = '';
@endphp

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
    <h1 class="font-extrabold text-4xl md:text-7xl text-center">
        TI30XS Calculator Online
    </h1>
    <div class="flex flex-col items-center w-full p-6">
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('ti-30xs-calculator-start') }}" target="_blank" class="font-bold text-base h-12 px-4 flex items-center rounded-lg bg-blue-400 text-white hover:bg-blue-500">
                Start
            </a>
        </div>
    </div>
    <div class="space-y-4">
        <h2 class="font-extrabold text-xl md:text-2xl">Embed the TI-84 Calculator Online on Your Site!</h2>
        <p class="text-neutral-500 text-lg leading-7 px-4">
            Easily add our TI-84 calculator simulator to your website with a simple iframe code. Give your users direct access to a fully functional TI-84 calculator, perfect for math and science needs—no extra setup required!
        </p>
        <div class="flex flex-col md:flex-row gap-4 justify-center mt-6">
            <a href="#" class="p-6 rounded-lg border border-gray-200 hover:shadow-lg cursor-pointer transition-shadow duration-300 block max-w-md">
                <h2 class="font-bold text-xl mb-3">Graphing Calculator</h2>
                <p class="text-[14px] text-[#696981] line-clamp-3">
                   Generate secure bcrypt password hashes online with custom cost factor. Fast, safe, and compatible with Laravel and PHP applications.
                </p>
            </a>
            <a href="#" class="p-6 rounded-lg border border-gray-200 hover:shadow-lg cursor-pointer transition-shadow duration-300 block max-w-md">
                <h2 class="font-bold text-xl mb-3">TI-30XS Calculator</h2>
                <p class="text-[14px] text-[#696981] line-clamp-3">
                  Run a free SSL server test to analyze your website’s SSL certificate, configuration, and overall security grade. Find vulnerabilities, verify HTTPS setup, and improve your site’s SSL performance.
                </p>
            </a>
        </div>
    </div>
    <div class="space-y-4">
        <p class="text-neutral-500 text-lg leading-relaxed text-center">
           Are you looking for a <strong>TI 84 calculator online</strong>?<br><br>
           Our website offers a free, user-friendly <strong>TI-84 graphing calculator simulator</strong> that allows you to perform complex calculations without the need for physical hardware.<br><br>
           Whether you're a student working on math assignments or a professional solving technical problems, this online calculator is designed to help you tackle it all.<br><br>
           If you encounter any issues or have suggestions, please submit feedback <br>through the email. 
           <a href="mailto:support@ti84calc.com" class="text-blue-600 underline decoration-from-font" title="TI 84 Calculator Online">
                support@ti84calc.com
            </a>. 
        </p>
        <h2 class="font-extrabold text-2xl">Why Use Our TI 84 Calculator Online?</h2>
        <p class="text-neutral-500 text-lg leading-7">
            The TI-84 Plus and TI-84 Plus CE are two of the most popular calculators used in schools and universities for graphing, algebra, calculus, and more. But not everyone has access to these expensive devices at all times. That’s where our online TI-84 calculator comes in handy. It's available 24/7, requires no installation, and is 100% free.
        </p>
        <h3 class="font-bold text-xl">Key Features</h3>
        <ul class="list-disc list-inside text-neutral-500 space-y-1">
            <li><strong>Graphing Capabilities:</strong> Plot functions, graphs, and equations with ease.</li>
            <li><strong>Scientific Functions:</strong> Solve algebraic expressions, calculus problems, and more.</li>
            <li><strong>TI-84 Plus & CE Compatibility:</strong> Our simulator mimics the experience of using both the TI-84 Plus and TI-84 Plus CE models.</li>
            <li><strong>No Downloads or Installs:</strong> Use the calculator directly from your browser without any downloads.</li>
            <li><strong>Free and Accessible:</strong> Completely free to use for students, teachers, and professionals.</li>
        </ul>
        <h3 class="font-bold text-xl">How to Use the TI 84 Calculator Online</h3>
        <ol class="list-decimal list-inside text-neutral-500 space-y-1">
            <li>Open the calculator on our website.</li>
            <li>Enter your equations or expressions using the keypad.</li>
            <li>Use the graphing feature to plot functions or visualize data.</li>
            <li>Explore advanced features for solving calculus or algebra problems.</li>
        </ol>
        <h3 class="font-bold text-xl">Who Can Benefit from This Online TI 84 Calculator?</h3>
        <ul class="list-disc list-inside text-neutral-500 space-y-1">
            <li><strong>Students:</strong> Perfect for math, science, and engineering courses.</li>
            <li><strong>Teachers:</strong> Use it in classrooms for demonstrations or virtual learning sessions.</li>
            <li><strong>Professionals:</strong> Engineers, data analysts, and other professionals who need a reliable graphing calculator on the go.</li>
        </ul>
        <h3 class="font-bold text-xl">FAQ: Common Questions About Our TI 84 Calculator Online</h3>
        <ul class="list-disc list-inside text-neutral-500 space-y-1">
            <li><strong>Is it free?</strong> Yes, completely free with no hidden fees.</li>
            <li><strong>Does it work like a real TI-84?</strong> Yes, it mimics the TI-84 Plus & CE calculators.</li>
            <li><strong>Mobile Friendly?</strong> Fully optimized for desktop and mobile browsers.</li>
        </ul>
        <h3 class="font-bold text-xl">Conclusion</h3>
        <p class="text-neutral-500 text-lg leading-7">
            Our TI 84 calculator online offers a free, easy-to-use solution for anyone in need of a powerful graphing calculator. Whether you're solving algebra problems, plotting graphs, or working on calculus, this tool has you covered. Visit our website today and start using the TI-84 Plus and TI-84 Plus CE simulator for free!
        </p>
        <p class="font-bold text-lg">
            Start calculating now at 
            <a href="https://ti84calc.com" class="text-blue-600 underline decoration-from-font">
               ti84calc.com
            </a>.
        </p>
    </div>
</div>


@include('web.inc.footer')
@endsection

@push('script')

@endpush  