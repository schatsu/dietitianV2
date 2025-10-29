@if ($paginator->hasPages())
    <ul class="pagination pagination-style-01 fs-13 fw-500 mb-0">

        {{-- Geri --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="{{__('messages.previous')}}"
                    class="page-link" href="#"><i class="feather icon-feather-arrow-left fs-18 d-xs-none"></i></a>
            </li>
        @else
            <li class="page-item">
                <a
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="{{__('messages.previous')}}"
                    class="page-link" href="{{ $paginator->previousPageUrl() }}">
                    <i class="feather icon-feather-arrow-left fs-18 d-xs-none"></i>
                </a>
            </li>
        @endif

        {{-- Sayfa numaraları --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled"><a class="page-link" href="#">{{ $element }}</a></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><a class="page-link" href="#">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ str_pad($page, 2, '0', STR_PAD_LEFT) }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- İleri --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="{{__('messages.next')}}"
                    class="page-link" href="{{ $paginator->nextPageUrl() }}">
                    <i class="feather icon-feather-arrow-right fs-18 d-xs-none"></i>
                </a>
            </li>
        @else
            <li class="page-item disabled">
                <a
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="{{__('messages.next')}}"
                    class="page-link" href="#"><i class="feather icon-feather-arrow-right fs-18 d-xs-none"></i></a>
            </li>
        @endif
    </ul>
@endif
