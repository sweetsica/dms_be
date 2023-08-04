<ul>
    @foreach ($donViCon as $donVi)
        <li>
            {{ $donVi->name }}
            @if ($donVi->donViCon->count() > 0)
                @include('template.sidebar.sidebarDepartment.child', ['donViCon' => $donVi->donViCon])
            @endif
        </li>
    @endforeach
</ul>


{{-- <ul class="tree">
    @foreach ($departmentlists as $donVi)
        <li>
            {{ $donVi->name }}
            @if ($donVi->donViCon->count() > 0)
                @include('template.sidebar.sidebarDepartment.child', ['donViCon' => $donVi->donViCon])
            @endif
        </li>
    @endforeach
</ul> --}}
