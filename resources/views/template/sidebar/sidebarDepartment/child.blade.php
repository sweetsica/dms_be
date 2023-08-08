<ul>
    @foreach ($donViCon as $donVi)
        <li>
            <a href="{{ route('Personnel.show',$donVi->id) }}" class="title-child">{{ $donVi->name }}</a>
            @if ($donVi->donViCon->count() > 0)
                @include('template.sidebar.sidebarDepartment.child', ['donViCon' => $donVi->donViCon])
            @endif
        </li>
    @endforeach
</ul>
