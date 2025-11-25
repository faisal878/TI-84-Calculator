<nav aria-label="Page navigation example" class="justify-end flex md:mt-0 mt-1">
    <ul class="inline-flex -space-x-px text-xs">
      {{-- Previous Button --}}
      @if ($paginator->onFirstPage())
        <li>
          <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0  rounded-s-lg">Previous</span>
        </li>
      @else
        <li>
          <a href="{{ $paginator->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0  rounded-s-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
        </li>
      @endif
  
      {{-- First Page and Ellipsis --}}
      @if ($paginator->currentPage() > 2)
        <li>
          <a href="{{ $paginator->url(1) }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border  hover:bg-gray-100 hover:text-gray-700">1</a>
        </li>
        <li>
          <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border ">...</span>
        </li>
      @endif
  
      {{-- Page Number Links --}}
      @php
        $currentPage = $paginator->currentPage();
        $lastPage = $paginator->lastPage();
        $startPage = max(1, $currentPage - 1); // Start page (current - 1)
        $endPage = min($lastPage, $currentPage + 1); // End page (current + 1)
      @endphp
  
      @for ($i = $startPage; $i <= $endPage; $i++)
        <li>
          <a href="{{ $paginator->url($i) }}" class="flex items-center justify-center px-3 h-8 leading-tight {{ $i == $currentPage ? 'text-blue-600 border  bg-blue-50' : 'text-gray-500 bg-white border  hover:bg-gray-100 hover:text-gray-700' }}">
            {{ $i }}
          </a>
        </li>
      @endfor
  
      {{-- Ellipsis and Last Page --}}
      @if ($paginator->currentPage() < $paginator->lastPage() - 2)
        <li>
          <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border ">...</span>
        </li>
        <li>
          <a href="{{ $paginator->url($paginator->lastPage()) }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border  hover:bg-gray-100 hover:text-gray-700">{{ $paginator->lastPage() }}</a>
        </li>
      @endif
  
      {{-- Next Button --}}
      @if ($paginator->hasMorePages())
        <li>
          <a href="{{ $paginator->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border  rounded-e-lg hover:bg-gray-100 hover:text-gray-700">Next</a>
        </li>
      @else
        <li>
          <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border  rounded-e-lg">Next</span>
        </li>
      @endif
    </ul>
  </nav>
  