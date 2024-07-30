@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-end">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1"><i class="las la-angle-left"></i></a>
            </li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="las la-angle-left"></i>

            </a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="las la-angle-right"></i></a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#"><i class="las la-angle-right"></i></a>
            </li>
        @endif
    </ul>

    <style>
        .page-item.active .page-link{
            z-index: 3;
            color: #fff !important  ;
            background-color: #6667AB !important;
            border-color: #6667AB !important;
            border-radius: 50%;
            padding: 6px 12px;
        }
        .page-link{
            z-index: 3;
            color: #6667AB !important;
            background-color: #fff;
            border-color: #64669c;
            border-radius: 50%;
            padding: 6px 12px !important;
        }
        .page-item:first-child .page-link{
            border-radius: 30% !important;
        }
        .page-item:last-child .page-link{
            border-radius: 30% !important;
        }
        .pagination li{
            padding: 3px;
        }
        .disabled .page-link{
            color: #555269 !important;
            opacity: 0.5 !important;
        }
    </style>
@endif
