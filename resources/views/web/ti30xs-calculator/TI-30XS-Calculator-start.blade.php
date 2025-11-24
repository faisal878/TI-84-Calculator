@extends('app')
@php
    $metaTtitle = '';
@endphp

@push('style')
    <link rel="stylesheet" href="{{ asset('ti30xs-calculator/ti30.css') }}">
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
    <h1 class="font-extrabold text-4xl md:text-7xl text-center">
       TI 30XS Calculator Online
    </h1>
    <div class="calculator-container">
      <!-- Calculator Body -->
      <div class="calculator" role="application" aria-label="TI-30XS MultiView Scientific Calculator" >
        <!-- Solar Panel -->
        <div class="solar-panel" aria-hidden="true"></div>

        <!-- Display Section -->
        <div class="display-section">
          <!-- Status Indicators -->
          <div class="status-indicators" aria-hidden="true">
            <span class="indicator" id="second-indicator">2nd</span>
            <span class="indicator" id="hyp-indicator">HYP</span>
            <span class="indicator" id="fix-indicator">FIX</span>
            <span class="indicator" id="sci-indicator">SCI</span>
            <span class="indicator" id="eng-indicator">ENG</span>
            <span class="indicator" id="angle-indicator">DEG</span>
            <span class="indicator" id="k-indicator">K</span>
            <span class="indicator" id="stat-indicator">STAT</span>
          </div>

          <!-- Main Display -->
          <div
            class="display"
            role="textbox"
            aria-label="Calculator display"
            tabindex="0"
          >
            <div
              class="display-line"
              id="entry-line"
              aria-label="Entry line"
            ></div>
            <div
              class="display-line"
              id="result-line"
              aria-label="Result line"
            ></div>
            <div
              class="display-line"
              id="history-line-1"
              aria-label="History line 1"
            ></div>
            <div
              class="display-line"
              id="history-line-2"
              aria-label="History line 2"
            ></div>
          </div>
        </div>

        <!-- Button Grid -->
        <div class="button-grid" role="group" aria-label="Calculator buttons">
          <!-- Row 1 -->
          <button
            class="btn btn-green"
            id="second-btn"
            aria-label="Second function"
          >
            <span class="btn-label">2nd</span>
          </button>
          <button class="btn btn-mode" id="mode-btn" aria-label="Mode settings">
            <span class="btn-secondary">quit</span>
            <span class="btn-label">mode</span>
          </button>
          <button class="btn btn-mode" id="delete-btn" aria-label="Delete">
            <span class="btn-secondary">insert</span>
            <span class="btn-label">delete</span>
          </button>
          <div class="nav-circle">
            <button class="nav-btn" id="up-btn" aria-label="Up">▲</button>
            <button class="nav-btn" id="left-btn" aria-label="Left">◄</button>
            <button class="nav-btn" id="right-btn" aria-label="Right">►</button>
            <button class="nav-btn" id="down-btn" aria-label="Down">▼</button>
          </div>

          <!-- Row 2 -->
          <button class="btn btn-alpha" id="alpha-btn" aria-label="Alpha">
            <span class="btn-secondary">F3</span>
            <span class="btn-label">alpha</span>
          </button>
          <button
            class="btn btn-scientific"
            id="x-var-btn"
            aria-label="X variable"
          >
            <span class="btn-secondary">angle</span>
            <span class="btn-label">x-var</span>
          </button>
          <button
            class="btn btn-scientific"
            id="stat-btn"
            aria-label="Statistics"
          >
            <span class="btn-secondary">stat</span>
            <span class="btn-label">stat</span>
          </button>

          <!-- Row 3 -->
          <button class="btn btn-scientific" id="math-btn" aria-label="Math">
            <span class="btn-secondary">test</span>
            <span class="btn-label">math</span>
          </button>
          <button
            class="btn btn-scientific"
            id="apps-btn"
            aria-label="Applications"
          >
            <span class="btn-secondary">char</span>
            <span class="btn-label">apps</span>
          </button>
          <button class="btn btn-scientific" id="prgm-btn" aria-label="Program">
            <span class="btn-label">prgm</span>
          </button>
          <button class="btn btn-secondary" id="clear-btn" aria-label="Clear">
            <span class="btn-label">clear</span>
          </button>

          <!-- Row 4 -->
          <button
            class="btn btn-function"
            id="x-inverse-btn"
            aria-label="X inverse"
          >
            <span class="btn-secondary">abs</span>
            <span class="btn-label">x⁻¹</span>
          </button>
          <button class="btn btn-trig" id="sin-btn" aria-label="Sine">
            <span class="btn-secondary">sin⁻¹</span>
            <span class="btn-label">sin</span>
          </button>
          <button class="btn btn-trig" id="cos-btn" aria-label="Cosine">
            <span class="btn-secondary">cos⁻¹</span>
            <span class="btn-label">cos</span>
          </button>
          <button class="btn btn-trig" id="tan-btn" aria-label="Tangent">
            <span class="btn-secondary">tan⁻¹</span>
            <span class="btn-label">tan</span>
          </button>
          <button class="btn btn-operation" id="divide-btn" aria-label="Divide">
            <span class="btn-secondary">e</span>
            <span class="btn-label">÷</span>
          </button>

          <!-- Row 5 -->
          <button class="btn btn-function" id="square-btn" aria-label="Square">
            <span class="btn-secondary">√</span>
            <span class="btn-label">x²</span>
          </button>
          <button class="btn btn-function" id="power-btn" aria-label="Power">
            <span class="btn-secondary">ˣ√</span>
            <span class="btn-label">^</span>
          </button>
          <button class="btn btn-function" id="log-btn" aria-label="Logarithm">
            <span class="btn-secondary">10ˣ</span>
            <span class="btn-label">log</span>
          </button>
          <button class="btn btn-function" id="ln-btn" aria-label="Natural log">
            <span class="btn-secondary">eˣ</span>
            <span class="btn-label">ln</span>
          </button>
          <button
            class="btn btn-operation"
            id="multiply-btn"
            aria-label="Multiply"
          >
            <span class="btn-secondary">π</span>
            <span class="btn-label">×</span>
          </button>

          <!-- Row 6 -->
          <button class="btn btn-function" id="sto-btn" aria-label="Store">
            <span class="btn-secondary">recall</span>
            <span class="btn-label">sto→</span>
          </button>
          <button class="btn btn-number" id="btn-7" aria-label="Seven">
            <span class="btn-secondary">y-var</span>
            <span class="btn-label">7</span>
          </button>
          <button class="btn btn-number" id="btn-8" aria-label="Eight">
            <span class="btn-secondary">table</span>
            <span class="btn-label">8</span>
          </button>
          <button class="btn btn-number" id="btn-9" aria-label="Nine">
            <span class="btn-secondary">graph</span>
            <span class="btn-label">9</span>
          </button>
          <button
            class="btn btn-operation"
            id="subtract-btn"
            aria-label="Subtract"
          >
            <span class="btn-secondary">ans</span>
            <span class="btn-label">−</span>
          </button>

          <!-- Row 7 -->
          <button class="btn btn-special" id="on-btn" aria-label="On">
            <span class="btn-secondary">off</span>
            <span class="btn-label">on</span>
          </button>
          <button class="btn btn-number" id="btn-4" aria-label="Four">
            <span class="btn-secondary">L1</span>
            <span class="btn-label">4</span>
          </button>
          <button class="btn btn-number" id="btn-5" aria-label="Five">
            <span class="btn-secondary">L2</span>
            <span class="btn-label">5</span>
          </button>
          <button class="btn btn-number" id="btn-6" aria-label="Six">
            <span class="btn-secondary">L3</span>
            <span class="btn-label">6</span>
          </button>
          <button class="btn btn-operation" id="add-btn" aria-label="Add">
            <span class="btn-secondary">entry</span>
            <span class="btn-label">+</span>
          </button>

          <!-- Row 8 -->
          <button class="btn btn-special" id="data-btn" aria-label="Data">
            <span class="btn-secondary">[</span>
            <span class="btn-label">data</span>
          </button>
          <button class="btn btn-number" id="btn-1" aria-label="One">
            <span class="btn-secondary">L4</span>
            <span class="btn-label">1</span>
          </button>
          <button class="btn btn-number" id="btn-2" aria-label="Two">
            <span class="btn-secondary">L5</span>
            <span class="btn-label">2</span>
          </button>
          <button class="btn btn-number" id="btn-3" aria-label="Three">
            <span class="btn-secondary">L6</span>
            <span class="btn-label">3</span>
          </button>
          <button
            class="btn btn-special large-btn"
            id="enter-btn"
            aria-label="Enter"
            rowspan="2"
          >
            <span class="btn-secondary">solve</span>
            <span class="btn-label">enter</span>
          </button>

          <!-- Row 9 -->
          <button class="btn btn-number large-btn" id="btn-0" aria-label="Zero">
            <span class="btn-secondary">reset</span>
            <span class="btn-label">0</span>
          </button>
          <button class="btn btn-number" id="decimal-btn" aria-label="Decimal">
            <span class="btn-secondary">i</span>
            <span class="btn-label">.</span>
          </button>
          <button
            class="btn btn-number"
            id="negative-btn"
            aria-label="Negative"
          >
            <span class="btn-secondary">!</span>
            <span class="btn-label">(−)</span>
          </button>
        </div>

        <!-- Branding -->
        <div class="branding" aria-hidden="true">
          <span class="brand-text">TEXAS INSTRUMENTS</span>
          <span class="model-text">TI-30XS MultiView™</span>
        </div>
      </div>

      <!-- Error Display -->
      <div
        class="error-display"
        id="error-display"
        role="alert"
        aria-live="polite"
        hidden
      ></div>

      <!-- Help Panel (Hidden by default) -->
      <div
        class="help-panel"
        id="help-panel"
        role="dialog"
        aria-label="Calculator help"
        aria-modal="true"
      >
        <div class="help-content">
          <h2>TI-30XS MultiView Help</h2>
          <div class="help-section">
            <h3>Basic Operations</h3>
            <p>
              Use the number buttons and operation buttons for basic arithmetic.
            </p>
          </div>
          <div class="help-section">
            <h3>Scientific Functions</h3>
            <p>
              Press 2nd (green button) to access secondary functions shown in
              green above each button.
            </p>
          </div>
          <div class="help-section">
            <h3>Memory</h3>
            <p>
              Use STO→ to store values and 2nd + STO→ (recall) to recall them.
            </p>
          </div>
          <button
            class="help-close-btn"
            id="help-close-btn"
            aria-label="Close help"
            type="button"
          >
            Close
          </button>
        </div>
      </div>
    </div>
    
</div>


@include('web.inc.footer')
@endsection

@push('script')
<script src="{{ asset('ti30xs-calculator/ti30x.js') }}"></script>
@endpush  