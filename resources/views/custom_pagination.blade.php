<ul class="pagination justify-content-center" style="margin-top: 100px;">
    @if ($posts->currentPage() > 1)
        <li class="page-item"><a class="page-link" href="{{ route('blogs', ['page' => $posts->currentPage() - 1]) }}">السابق</a></li>
    @endif

    @for ($i = 1; $i <= $posts->lastPage(); $i++)
        <li class="page-item {{ $i == $posts->currentPage() ? 'active' : '' }}">
            <a class="page-link" href="{{ route('blogs', ['page' => $i]) }}">{{ $i }}</a>
        </li>
    @endfor

    @if ($posts->currentPage() < $posts->lastPage())
        <li class="page-item"><a class="page-link" href="{{ route('blogs', ['page' => $posts->currentPage() + 1]) }}">التالى</a></li>
    @endif
</ul>
