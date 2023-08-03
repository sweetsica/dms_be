
<ul style=" margin: 10px; padding: 0;">
    @foreach($donViCon as $donVi)
    <li class="child" style=" margin: 10px; padding: 0;">
            <img  src="{{ asset('assets/img/cong.png') }}">&nbsp;&nbsp;{{ $donVi->name }}
            @if($donVi->donViCon->count() > 0)
                @include('template.sidebar.sidebarPosition.child', ['donViCon' => $donVi->donViCon])
            @endif
        </li>
    @endforeach
</ul>


{{-- <ul class="tree">
    @foreach($departmentlists as $donVi)
        <li>
            {{ $donVi->name }}
            @if($donVi->donViCon->count() > 0)
                @include('template.sidebar.sidebarDepartment.child', ['donViCon' => $donVi->donViCon])
            @endif
        </li>
    @endforeach
</ul> --}}
