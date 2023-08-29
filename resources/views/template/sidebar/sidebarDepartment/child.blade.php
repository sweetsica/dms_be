<ul>
    @foreach ($donViCon as $donVi)
        <li data-id="{{ $donVi->id }}">
            {{$x-1}}.{{$y++}} <a href="{{ route('department.index2',['department_id' => $donVi->id]) }}" class="title-child">{{ $donVi->name }}</a>
            @if ($donVi->donViCon->count() > 0)
                @include('template.sidebar.sidebarDepartment.child', ['donViCon' => $donVi->donViCon])
            @endif
        </li>
    @endforeach
</ul>
