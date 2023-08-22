@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách tổ chức')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection

@section('content')
    @include('template.sidebar.sidebarDepartment.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Hồ sơ phòng ban - {{ $getDept->name ?? '' }}</h5>
                        @include('template.components.sectionCard')
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class='row'>

                                        <div class="col-md-12">
                                            <div class="action_wrapper align-items-center mb-3 justify-content-end">
                                                @if (session('user')['role_id'] == '1')
                                                    <div class="action_export order-md-4">
                                                        <button class="btn btn-danger d-block testCreateUser"
                                                            data-bs-toggle="modal" data-bs-target="#taoDeXuat">Thêm vị
                                                            trí</button>
                                                    </div>
                                                @endif

                                            </div>

                                            <div>

                                                <div class="row g-2">
                                                    <div class="col-lg-6 border">
                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <span class="fs-5 fw-bold">Tên đơn vị:</span>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <span
                                                                            class="fs-5">{{ $getDept->name ?? '' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <span class="fs-5 fw-bold">Mã đơn vị:</span>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <span
                                                                            class="fs-5">{{ $getDept->code ?? '' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <span class="fs-5 fw-bold">Địa bàn:</span>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <span class="fs-5">
                                                                            {{ $getDept->areas->name ?? '' }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <span class="fs-5 fw-bold">Chức năng nhiệm
                                                                            vụ:</span>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <span class="fs-5">
                                                                            {{ $getDept->description ?? '' }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 border">
                                                        <div class="row my-2">
                                                            <div class="col-lg-8">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <span class="fs-5 fw-bold">Trạng thái:</span>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <span class="fs-5">Hoạt động</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="row">
                                                                    {{--                                                                    <div class="col-lg-6"> --}}
                                                                    {{--                                                                        <span class="fs-5 fw-bold">Thử việc:</span> --}}
                                                                    {{--                                                                    </div> --}}
                                                                    {{--                                                                    <div class="col-lg-6"> --}}
                                                                    {{--                                                                        <span class="fs-5"> --}}
                                                                    {{--                                                                            Thử việc --}}
                                                                    {{--                                                                        </span> --}}
                                                                    {{--                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="row">
                                                                    {{--                                                                    <div class="col-lg-6"> --}}
                                                                    {{--                                                                        <span class="fs-5 fw-bold">Cộng tác:</span> --}}
                                                                    {{--                                                                    </div> --}}
                                                                    {{--                                                                    <div class="col-lg-6"> --}}
                                                                    {{--                                                                        <span class="fs-5"> --}}
                                                                    {{--                                                                            abc --}}
                                                                    {{--                                                                        </span> --}}
                                                                    {{--                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <span class="fs-5 fw-bold">Định biên/thực
                                                                            tế:</span>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <span class="fs-5">10 người</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <span class="fs-5 fw-bold">Quỹ lương năm:</span>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <span class="fs-5">120.000.000 VND</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="fs-4 fw-bold my-4" style="color: var(--primary-color)">
                                                Danh sách vị
                                                trí trực thuộc</div>
                                            <div
                                                style="display: grid;
                                            grid-template-columns: auto auto auto auto auto;
                                            gap: 10px;
                                            align-items: center;">


                                                <form method="GET" action="">
                                                    {{-- <div style="display: flex"> --}}
                                                    <div class="form-group has-search">
                                                        <input type="text" class="form-control"
                                                            value="{{ $search }}" placeholder="Tìm kiếm"
                                                            name="search">
                                                    </div>
                                                    <div class="form-group has-search" style="display: none">
                                                        <input type="text" class="form-control"
                                                            value="{{ $department_id }}" placeholder="Tìm kiếm"
                                                            name="department_id">
                                                    </div>


                                                    {{-- <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Lọc cấp nhân sự">
                                                    <select name="cap_nhan_su"  class="selectpicker"
                                                        data-dropup-auto="false">
                                                        <option value="">Lọc cấp nhân sự</option>
                                                        @foreach ($personnelLevelList as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                    </select>
                                                </div> --}}
                                                 <button style="display: none">ok</button>
                                            {{-- </div> --}}
                                            </form>

                                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Lọc cấp nhân sự">
                                                    <select name="filter_personnel_level" required class="selectpicker"
                                                        data-dropup-auto="false">
                                                        <option value="">Lọc cấp nhân sự</option>
                                                        {{-- @foreach ($personnelLevelList as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach --}}
                                                    </select>
                                                </div>

                                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Lọc tên vị trí">
                                                    <select name="filter_personnel_level" required class="selectpicker"
                                                        data-dropup-auto="false">
                                                        <option value="">Lọc tên vị trí</option>
                                                        {{-- @foreach ($personnelLevelList as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach --}}
                                                    </select>
                                                </div>

                                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Lọc người đảm nhiệm">
                                                    <select name="filter_personnel_level" required class="selectpicker"
                                                        data-dropup-auto="false">
                                                        <option value="">Lọc người đảm nhiệm</option>
                                                        {{-- @foreach ($personnelLevelList as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->name }}
                                                                </option>
                                                            @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <form id="select-form" action="{{ route('delete-selected-items') }}"
                                                method="POST">
                                                @csrf
                                                <div class="action_export mx-3 order-md-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Xóa">
                                                    <button class="btn btn-danger  " type="submit"
                                                        onclick="return confirm('Bạn có muốn xóa không?')"
                                                        id="delete-selected-button" style="display: none;">Xóa</button>
                                                </div><br>
                                                <div class="table-responsive">

                                                    <table id="dsDaoTao"
                                                        class="table table-responsive table-hover table-bordered filter">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-nowrap text-center" style="width:1%">
                                                                    <input type="checkbox" id="select-all">
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:2%">STT
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:10%">Mã
                                                                    vị trí</th>
                                                                <th class="text-nowrap text-center" style="width:10%">Tên
                                                                    vị trí</th>
                                                                <th class="text-nowrap text-center" style="width:10%">Cấp
                                                                    nhân sự </th>
                                                                <th class="text-nowrap text-center" style="width:30%">Mô
                                                                    tả </th>
                                                                <th class="text-nowrap text-center" style="width:10%">
                                                                    Quỹ lương
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:8%">Định
                                                                    biên
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:8%">
                                                                    Người đảm nhiệm
                                                                </th>
                                                                @if (session('user')['role_id'] == '1')
                                                                    <th class="text-nowrap text-center" style="width:3%">
                                                                        <span>Hành
                                                                            động</span>
                                                                    </th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        @foreach ($listPosToDept as $item)
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center"> <input type="checkbox"
                                                                            name="selected_items[]"
                                                                            value="{{ $item->id }}"></td>
                                                                    <td class=" text-center">
                                                                        {{ $loop->iteration }}
                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->code }}">
                                                                            {{ $item->code }}
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->name }}">
                                                                            <a style="color: black; text-decoration: underline"
                                                                                href="{{ route('department.assignUser', ['id' => $item->id]) }}">{{ $item->name }}</a>

                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->levels->name ?? '' }}">
                                                                            {{ $item->levels->name ?? '' }}
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->description }}">
                                                                            {{ $item->description }}
                                                                        </div>
                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->wage }}">
                                                                            {{ $item->wage }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->staffing }}">
                                                                            {{ $item->staffing }}
                                                                        </div>

                                                                    </td>
                                                                    @php
                                                                        $getUser = \App\Models\Personnel::where('position_id', $item->id)->get();
                                                                        $userNames = $getUser->pluck('name')->implode(', ');
                                                                    @endphp
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $userNames }}">
                                                                            {{ $userNames }}
                                                                        </div>

                                                                    </td>
                                                                    @if (session('user')['role_id'] == '1')
                                                                        <td>

                                                                            <div
                                                                                class="table_actions d-flex justify-content-center">
                                                                                {{-- <div class="btn" data-bs-toggle="modal"
                                                                                    data-bs-target="#qrCode">
                                                                                    <i class="bi bi-share-fill"
                                                                                        style="color: #787878;"></i>
                                                                                </div> --}}
                                                                                <div data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Sửa ">
                                                                                    <div class="btn"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#suaDeXuat{{ $item->id }}">
                                                                                        <img style="width:16px;height:16px"
                                                                                            src="{{ asset('assets/img/edit.svg') }}" />
                                                                                    </div>
                                                                                </div>
                                                                                <div data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Xóa">
                                                                                    <div class="btn"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#xoaDeXuat{{ $item->id }}">
                                                                                        <img style="width:16px;height:16px"
                                                                                            src="{{ asset('assets/img/trash.svg') }}" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    @endif
                                                                </tr>
                                                            </tbody>
                                                        @endforeach
                                                    </table>
                                                    {{-- <nav aria-label="Page navigation example" class="float-end mt-3"
                                                        id="target-pagination">
                                                        <ul class="pagination">
                                                            {{ $departmentList->appends([
                                                                    'search' => $search,
                                                                ])->links() }}
                                                        </ul>
                                                    </nav> --}}
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('template.footer.footer')
    </div>
    </div>
    @include('template.sidebar.sidebarMaster.sidebarRight')

    @foreach ($positionlists as $item)
        {{-- Sửa đề xuất --}}
        <div class="modal fade" id="suaDeXuat{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">Sửa vị trí/chức danh</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('position.update', $item->id) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <input data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Nhập tên vị trí/chức danh*" name="name" type="text"
                                        class="form-control" value="{{ $item->name }}" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <input data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Nhập mã vị trí/chức danh*" name="code" type="text"
                                        class="form-control" value="{{ $item->code }}" required>
                                </div>

                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn đơn vị công tác*">
                                        <select name="department_id" required class="selectpicker"
                                            data-dropup-auto="false">
                                            <option value="{{ $item->department_id }}">
                                                {{ $item->department_name }}
                                            </option>
                                            @foreach ($departmentlists as $ac)
                                                <option value="{{ $ac->id }}" {{ $ac->id == $item->department_id ? "selected" : "" }}>
                                                    @php
                                                        $str = '';
                                                        for ($i = 0; $i < $ac->level; $i++) {
                                                            echo $str;
                                                            $str = '  --';
                                                        }
                                                    @endphp
                                                    {{ $ac->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn cấp nhân sự*">
                                        <select name="personnel_level" required class="selectpicker"
                                            data-dropup-auto="false">
                                            <option value="">Chọn cấp nhân sự*
                                            </option>
                                            @foreach ($personnelLevelList as $av)
                                                <option value="{{ $av->id }}" {{ $av->id == $item->personnel_level ? "selected" : "" }}>
                                                    {{ $av->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">

                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn cấp quản lý">
                                        <select name="parent" class="selectpicker" data-dropup-auto="false">
                                            <?php if ($item->parent == null){ ?>
                                            <option value="0">Chọn cấp quản lý
                                            </option>
                                            <?php } else { ?>
                                            <?php } ?>
                                            <option value="{{ $item->parent }}">
                                                @if ($item->donvime)
                                                    {{ $item->donvime->name }}
                                                @endif
                                            </option>
                                            @foreach ($positionlists as $ac)
                                                <option value="{{ $ac->id }}">
                                                    @php
                                                        $str = '';
                                                        for ($i = 0; $i < $ac->level; $i++) {
                                                            echo $str;
                                                            $str = '  --';
                                                        }
                                                    @endphp
                                                    {{ $ac->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn gói trang bị">
                                        <select name="pack" class="selectpicker" data-dropup-auto="false">
                                            <option value="">Chọn gói
                                                trang bị
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top">
                                        <textarea name="description" type="text" placeholder="Mô tả công việc" class="form-control "
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Mô tả công việc" style="height: 80px;">{{ $item->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <input name="staffing" type="text" placeholder="Định biên" class="form-control"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Định biên"
                                        value="{{ $item->staffing }}">
                                </div>
                                <div class="col-6 mb-3">
                                    <input name="wage" type="text" placeholder="Quỹ lương năm"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Quỹ lương năm" value="{{ $item->wage }}">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy
                            </button>
                            <button type="submit" class="btn btn-danger">Lưu
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Xóa đề xuất --}}
        <div class="modal fade" id="xoaDeXuat{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel">Xóa đơn vị </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có thực sự muốn xoá đơn vị này không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                        <form action="{{ route('position.detach', $item->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Thêm Tao De Xuat -->
    <div class="modal fade" id="taoDeXuat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm mới vị trí/chức danh</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('position.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input name="name" required type="text" placeholder="Nhập tên vị trí/chức danh*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Nhập tên vị trí/chức danh*" required>
                            </div>
                            <div class="col-6 mb-3">
                                <input name="code" required type="text" placeholder="Nhập mã vị trí/chức danh*"
                                    class="form-control" data-bs-toggle="tooltip" title="Nhập mã vị trí/chức danh*"
                                    required>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn đơn vị công tác*">
                                    <select name="department_id" required class="selectpicker" data-dropup-auto="false">
                                        <option value="">Chọn đơn vị công tác*</option>
                                        @foreach ($departmentlists as $item)
                                            @if ($item->id == request()->department_id)
                                                <option selected value="{{ $item->id }}">
                                                    {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn cấp nhân sự*">
                                    <select name="personnel_level" required class="selectpicker"
                                        data-dropup-auto="false">
                                        <option value="">Chọn cấp nhân sự*</option>
                                        @foreach ($personnelLevelList as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn vị trí cấp quản lý">
                                    <select name="parent" required class="selectpicker" data-dropup-auto="false">
                                        <option value="0">Chọn vị trí cấp quản lý</option>
                                        @foreach ($positionlists as $item)
                                            <option value="{{ $item->id }}">
                                                @php
                                                    $str = '';
                                                    for ($i = 0; $i < $item->level; $i++) {
                                                        echo $str;
                                                        $str = '  --';
                                                    }
                                                @endphp
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn gói trang bị">
                                    <select name="pack" class="selectpicker" data-dropup-auto="false">
                                        <option value="">Chọn gói trang bị</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top">
                                    <textarea name="description" type="text" placeholder="Mô tả công việc" class="form-control "
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Mô tả công việc" style="height: 80px;"></textarea>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <input name="staffing" type="text" placeholder="Định biên" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Định biên">
                            </div>
                            <div class="col-6 mb-3">
                                <input name="wage" type="text" placeholder="Quỹ lương năm" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Quỹ lương năm">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy
                                </button>
                                <button type="submit" class="btn btn-danger">Tạo</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <!-- Modal Thêm Tao De Xuat -->
    <div class="modal fade" id="taoDeXuat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm Đơn Vị</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('department.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input name="name" required type="text" placeholder="Nhập tên đơn vị*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Nhập tên đơn vị*">
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Mã đơn vị*">
                                    <input name="code" required type="text" placeholder="Mã đơn vị*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Mã đơn vị*">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn đơn vị mẹ">
                                    <select name="parent" required class="selectpicker" data-dropup-auto="false">
                                        <option value="0">Chọn đơn vị mẹ</option>
                                        @foreach ($departmentlists as $item)
                                            <option value="{{ $item->id }}">
                                                @php
                                                    $str = '';
                                                    for ($i = 0; $i < $item->level; $i++) {
                                                        echo $str;
                                                        $str = '  --';
                                                    }
                                                @endphp
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn trưởng bộ phận">
                                    <select name="ib_lead" required class="selectpicker" data-dropup-auto="false">
                                        <option value="0">Chọn trưởng bộ phận</option>
                                        @foreach ($UnitLeaderList as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top">
                                    <textarea name="description" type="text" placeholder="Chức năng nhiệm vụ" class="form-control "
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Chức năng nhiệm vụ" style="height: 80px;"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer" style="padding: 10px -2px !important;">
                                <button type="button" class="btn btn-outline-danger"
                                    data-bs-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-danger">Tạo</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    {{-- Filter --}}
    {{-- <div class="modal fade" id="filterOptions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Lọc dữ liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" method="GET">
                    {{-- @foreach (request()->query() as $key => $value)
                        @if (!in_array($key, ['don_vi_me']))
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endif
                    @endforeach --}}
    {{-- <div class="modal-body">
        <div class="row">
            <div class="col-12 mb-3">
                <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Lọc theo trưởng đơn vị">
                    <select id="select-status" class="selectpicker select_filter" data-dropup-auto="false"
                        title="Lọc theo trưởng đơn vị" name='leader_name'>
                        @foreach ($UnitLeaderList as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 mb-3">
                <div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Lọc theo đơn vị mẹ">
                    <select id="select-status" class="selectpicker select_filter" data-dropup-auto="false"
                        title="Lọc theo đơn vị mẹ" name='don_vi_me'>
                        @foreach ($departmentList as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="reset" class="btn btn-outline-danger">Làm
                mới</button>
            <button type="submit" class="btn btn-danger">Lọc</button>
        </div>
        </form>
    </div>
    </div>
    </div> --}}

    {{-- Gán vị trí --}}
    <div class="modal fade" id="assignPosition" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Gán vị trí</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" method="GET">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Chọn vị trí">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Chọn vị trí" name='position'>
                                        <option value="Trưởng phòng kinh doanh">Trưởng phòng kinh doanh</option>
                                        <option value="Nhân viên kinh doanh">Nhân viên kinh doanh</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-outline-danger">Hủy</button>
                            <button type="submit" class="btn btn-danger">Lưu</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer-script')
    <!-- Plugins -->
    {{-- <script type="text/javascript" src="{{ asset('assets/plugins/jquery-repeater/repeater.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-repeater/custom-repeater.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>


    <!-- Chart Js -->
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs-plugin-stacked100@1.0.0.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs-plugin-datalabels@2.0.0.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_khachHangActive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_khachHangMoi.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_soDonHang.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_doanhSo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_nhanSu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_chiPhi.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/components/dataHrefTable.js') }}"></script>

    <script>
        $(".locDuLieuPick").datepicker({
            format: "mm-yyyy",
            orientation: 'top',
            autoclose: true,
            switchOnClick: true,
            startView: "months",
            +
            minViewMode: "months",
            locale: 'vi',
        });
    </script>

    <script type="text/javascript" src="{{ asset('/assets/js/components/resetFilter.js') }}"></script>


    <script>
        // Khi ô checkbox chọn/bỏ chọn tất cả được thay đổi
        document.getElementById('select-all').addEventListener('change', function() {
            // Lấy danh sách tất cả các ô checkbox trong bảng
            const checkboxes = document.querySelectorAll('input[name="selected_items[]"]');

            // Đặt giá trị của tất cả các ô checkbox trong bảng theo giá trị của ô chọn/bỏ chọn tất cả
            checkboxes.forEach((checkbox) => {
                checkbox.checked = this.checked;
            });
        });
    </script>

    <script>
        const checkboxes = document.querySelectorAll('input[name="selected_items[]"]');
        const selectAllCheckbox = document.getElementById('select-all');
        const deleteButton = document.getElementById('delete-selected-button');

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', updateDeleteButton);
        });

        selectAllCheckbox.addEventListener('change', () => {
            checkboxes.forEach((checkbox) => {
                checkbox.checked = selectAllCheckbox.checked;
            });
            updateDeleteButton();
        });

        function updateDeleteButton() {
            const atLeastOneChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
            deleteButton.style.display = atLeastOneChecked ? 'block' : 'none';
        }
    </script>

@endsection
