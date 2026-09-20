@extends('app')
@push('style')
@endpush
@section('content')
@include('web.inc.navbar')

<section class="lg:px-0 px-[15px]">
    <div class="max-w-[1240px] m-auto text-center relative pt-16 overflow-hidden">
        <h1 class="font-bold mb-4 max-w-[940px] m-auto leading-tight lg:text-[52px] md:text-[42px] text-[33px] text-[#22281E] relative">TI-84 Calculator Manual <span class="text-[#034737]">— Complete User Guide</span></h1>
        <p class="text-[18px] text-[#696981] max-w-[760px] m-auto">Everything you need to know to use the TI-84 Calculator Online — from turning it on to fixing the most common errors.</p>
    </div>
</section>

<section class="pb-24 relative overflow-hidden lg:px-0 px-[15px]">
    <div class="max-w-[900px] m-auto">

        {{-- Table of Contents --}}
        <div class="bg-[#F7F8F6] rounded-xl p-8 mb-12">
            <h2 class="font-bold text-[22px] text-[#22281E] mb-4">Table of Contents</h2>
            <ul class="space-y-2 text-[#034737] text-[16px]">
                <li><a href="#getting-started" class="hover:underline">1. Getting Started</a></li>
                <li><a href="#keyboard-layout" class="hover:underline">2. Keyboard Layout &amp; Button Functions</a></li>
                <li><a href="#mode-settings" class="hover:underline">3. Mode Settings</a></li>
                <li><a href="#errors" class="hover:underline">4. Error Messages &amp; Troubleshooting</a></li>
                <li><a href="#faqs" class="hover:underline">FAQs</a></li>
            </ul>
        </div>

        {{-- 1. Getting Started --}}
        <div id="getting-started" class="mb-14">
            <h2 class="font-bold text-[28px] text-[#22281E] mb-4">1. Getting Started</h2>
            <p class="text-[17px] text-[#696981] leading-relaxed mb-4">
                Welcome to the TI-84 Calculator Online manual. This guide walks you through every part of the emulator — from turning it on to fixing the most common errors — so you can use it with confidence for homework, practice, and learning.
            </p>

            <h3 class="font-semibold text-[20px] text-[#22281E] mb-2 mt-6">Opening the Calculator</h3>
            <p class="text-[17px] text-[#696981] leading-relaxed mb-4">
                Visit ti-84calconline.com and the emulator loads automatically in your browser. No downloads, installs, or plugins are required. It works the same way on desktop, tablet, and mobile.
            </p>

            <h3 class="font-semibold text-[20px] text-[#22281E] mb-2 mt-6">Turning the Calculator On/Off</h3>
            <ul class="list-disc pl-6 text-[17px] text-[#696981] leading-relaxed mb-4 space-y-1">
                <li>Press the <strong>ON</strong> key (bottom-left corner) to wake the calculator.</li>
                <li>Press <strong>2nd</strong> then <strong>ON</strong> (which acts as OFF) to turn it off.</li>
                <li>If the calculator freezes, simply refresh the browser tab — it reloads instantly with default settings.</li>
            </ul>

            <h3 class="font-semibold text-[20px] text-[#22281E] mb-2 mt-6">Resetting the Calculator</h3>
            <p class="text-[17px] text-[#696981] leading-relaxed mb-2">If you want to clear all stored data, functions, and settings:</p>
            <ul class="list-disc pl-6 text-[17px] text-[#696981] leading-relaxed mb-4 space-y-1">
                <li>Press <strong>2nd → MEM</strong> (above the + key)</li>
                <li>Select <strong>Reset</strong></li>
                <li>Choose <strong>All RAM → Reset</strong></li>
            </ul>
            <p class="text-[17px] text-[#696981] leading-relaxed">This restores factory defaults — useful if the calculator behaves unexpectedly.</p>
        </div>

        {{-- 2. Keyboard Layout --}}
        <div id="keyboard-layout" class="mb-14">
            <h2 class="font-bold text-[28px] text-[#22281E] mb-4">2. Keyboard Layout &amp; Button Functions</h2>
            <p class="text-[17px] text-[#696981] leading-relaxed mb-4">
                The TI-84 keyboard is organized into functional zones. Understanding these zones makes navigation much faster.
            </p>

            <h3 class="font-semibold text-[20px] text-[#22281E] mb-2 mt-6">Using 2nd and ALPHA Functions</h3>
            <p class="text-[17px] text-[#696981] leading-relaxed mb-4">
                Every key has up to three functions: the main function (white), the 2nd function (blue, printed above), and the ALPHA function (green). Press <strong>2nd</strong> or <strong>ALPHA</strong> first, then the key, to access these.
            </p>
            <p class="text-[17px] text-[#696981] leading-relaxed">
                Example: To type π, press <strong>2nd</strong> then <strong>^</strong> (since π is the 2nd function of the ^ key).
            </p>
        </div>

        {{-- 3. Mode Settings --}}
        <div id="mode-settings" class="mb-14">
            <h2 class="font-bold text-[28px] text-[#22281E] mb-4">3. Mode Settings</h2>
            <p class="text-[17px] text-[#696981] leading-relaxed mb-4">
                Press <strong>MODE</strong> to open the settings screen. Use the arrow keys to move between options and <strong>ENTER</strong> to select.
            </p>
            <div class="bg-[#F7F8F6] rounded-xl p-6">
                <p class="text-[17px] text-[#22281E] leading-relaxed">
                    <strong>Tip:</strong> If your trig answers look wrong (e.g., sin(30) doesn't equal 0.5), check whether MODE is set to Radian instead of Degree.
                </p>
            </div>
        </div>

        {{-- 4. Error Messages --}}
        <div id="errors" class="mb-14">
            <h2 class="font-bold text-[28px] text-[#22281E] mb-4">4. Error Messages &amp; Troubleshooting</h2>
            <p class="text-[17px] text-[#696981] leading-relaxed mb-6">
                These are the most common errors students encounter, what causes them, and how to fix each one.
            </p>

            <div class="space-y-6">
                <div class="border border-[#E5E7E1] rounded-xl p-6">
                    <h3 class="font-semibold text-[19px] text-[#034737] mb-2">ERR: SYNTAX</h3>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Cause:</strong> A typo or invalid combination of symbols in your expression (e.g., missing parenthesis, two operators in a row).</p>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Fix:</strong> Select 1: Quit or 2: Goto (Goto takes you directly to the mistake). Check for missing ), misplaced negative signs, or an extra operator.</p>
                </div>

                <div class="border border-[#E5E7E1] rounded-xl p-6">
                    <h3 class="font-semibold text-[19px] text-[#034737] mb-2">ERR: DIM MISMATCH</h3>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Cause:</strong> Two matrices or lists you're trying to combine (add, multiply) don't have compatible dimensions.</p>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Fix:</strong> Check the dimensions of each matrix/list under 2nd → MATRIX → EDIT and make sure they match the operation you're performing.</p>
                </div>

                <div class="border border-[#E5E7E1] rounded-xl p-6">
                    <h3 class="font-semibold text-[19px] text-[#034737] mb-2">ERR: INVALID DIM</h3>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Cause:</strong> Trying to use a list or matrix that hasn't been properly defined, or referencing an invalid index.</p>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Fix:</strong> Re-enter the list/matrix data, or confirm the dimension size is correct before performing the operation.</p>
                </div>

                <div class="border border-[#E5E7E1] rounded-xl p-6">
                    <h3 class="font-semibold text-[19px] text-[#034737] mb-2">ERR: DOMAIN</h3>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Cause:</strong> You entered a value outside the valid input range for a function (e.g., taking the square root of a negative number in real mode, or an invalid argument for log).</p>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Fix:</strong> Check your input values against the function's valid domain.</p>
                </div>

                <div class="border border-[#E5E7E1] rounded-xl p-6">
                    <h3 class="font-semibold text-[19px] text-[#034737] mb-2">ERR: DIVIDE BY 0</h3>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Cause:</strong> Your expression divides a number by zero, or a graphed function has an undefined point (asymptote).</p>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Fix:</strong> Adjust the expression, or if graphing, this is often expected behavior — the function is undefined at that point.</p>
                </div>

                <div class="border border-[#E5E7E1] rounded-xl p-6">
                    <h3 class="font-semibold text-[19px] text-[#034737] mb-2">ERR: WINDOW RANGE</h3>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Cause:</strong> Xmin ≥ Xmax or Ymin ≥ Ymax in the WINDOW settings.</p>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Fix:</strong> Press WINDOW and make sure Xmin is less than Xmax, and Ymin is less than Ymax.</p>
                </div>

                <div class="border border-[#E5E7E1] rounded-xl p-6">
                    <h3 class="font-semibold text-[19px] text-[#034737] mb-2">ERR: NO SIGN CHNG (during Solver)</h3>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Cause:</strong> The Equation Solver couldn't find a root because the function doesn't change sign within the guessed range.</p>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Fix:</strong> Change your initial guess value closer to where you expect the actual solution to be.</p>
                </div>

                <div class="border border-[#E5E7E1] rounded-xl p-6">
                    <h3 class="font-semibold text-[19px] text-[#034737] mb-2">ERR: ARGUMENT</h3>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Cause:</strong> A function is missing a required argument, or has too many.</p>
                    <p class="text-[16px] text-[#696981] leading-relaxed"><strong>Fix:</strong> Check the syntax for that specific function (e.g., nCr( requires two numbers separated by a comma).</p>
                </div>
            </div>
        </div>

        {{-- FAQs --}}
        <div id="faqs" class="mb-14">
            <h2 class="font-bold text-[28px] text-[#22281E] mb-6">FAQs</h2>
            <div class="space-y-6">
                <div>
                    <h3 class="font-semibold text-[18px] text-[#22281E] mb-1">Q: Why won't my graph show up?</h3>
                    <p class="text-[16px] text-[#696981] leading-relaxed">A: This usually means the function is outside your current WINDOW range, or the calculator is in the wrong graphing mode. Press ZOOM → ZStandard to reset to a default view and check MODE is set to Func.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-[18px] text-[#22281E] mb-1">Q: How do I clear an error and go back to my typo?</h3>
                    <p class="text-[16px] text-[#696981] leading-relaxed">A: When an error message appears, press 2 for Goto — this places the cursor exactly where the problem is.</p>
                </div>
                <div>
                    <h3 class="font-semibold text-[18px] text-[#22281E] mb-1">Q: Can I recover data after a reset?</h3>
                    <p class="text-[16px] text-[#696981] leading-relaxed">A: No — resetting RAM clears all stored programs, lists, and matrices permanently. Back up important data manually before resetting.</p>
                </div>
            </div>
        </div>

    </div>
</section>

@include('web.inc.footer')
@endsection

@push('script')
<script>
</script>
@endpush
