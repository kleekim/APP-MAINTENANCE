@if ($paginator->hasPages())
<div style="display:flex; align-items:center; gap:4px;">

    {{-- Précédent --}}
    @if ($paginator->onFirstPage())
        <span style="padding:6px 12px; border-radius:6px; color:#cbd5e1; font-size:13px;">‹</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}"
           style="padding:6px 12px; border-radius:6px; color:#475569; font-size:13px; text-decoration:none; background:#f1f5f9;">‹</a>
    @endif

    {{-- Pages --}}
    @foreach ($elements as $element)
        @if (is_string($element))
            <span style="padding:6px 10px; color:#94a3b8; font-size:13px;">{{ $element }}</span>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span style="padding:6px 12px; border-radius:6px; background:#1e293b; color:white; font-size:13px; font-weight:600;">{{ $page }}</span>
                @else
                    <a href="{{ $url }}"
                       style="padding:6px 12px; border-radius:6px; color:#475569; font-size:13px; text-decoration:none; background:#f1f5f9;">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Suivant --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
           style="padding:6px 12px; border-radius:6px; color:#475569; font-size:13px; text-decoration:none; background:#f1f5f9;">›</a>
    @else
        <span style="padding:6px 12px; border-radius:6px; color:#cbd5e1; font-size:13px;">›</span>
    @endif

</div>
@endif