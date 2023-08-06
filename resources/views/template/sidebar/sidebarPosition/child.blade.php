<ul>
    @foreach ($donViCon as $donVi)
        <li>
            {{ $donVi->name }}
            @if ($donVi->donViCon->count() > 0)
                @include('template.sidebar.sidebarPosition.child', ['donViCon' => $donVi->donViCon])
            @endif
        </li>
    @endforeach
</ul>
