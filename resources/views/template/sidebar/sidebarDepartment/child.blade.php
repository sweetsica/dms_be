<ul>
    @foreach ($donViCon as $donVi)
        <li data-id="{{ $donVi->id }}">
            {{ $donVi->order }} <a href="{{ route('department.index2', ['department_id' => $donVi->id]) }}"
                class="title-child" id="{{ $donVi->id }}">{{ $donVi->name }}</a>
            @if ($donVi->donViCon->count() > 0)
                @include('template.sidebar.sidebarDepartment.child', ['donViCon' => $donVi->donViCon])
            @endif
        </li>
    @endforeach
</ul>
