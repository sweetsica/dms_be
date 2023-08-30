@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách vị trí')
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
                        <h5 class="mainSection_heading-title">Danh sách vị trí/chức danh</h5>
                        @include('template.components.sectionCard')
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body position-relative">
                                    <div class='row'>
                                        <div class="col-md-12">
                                            <div
                                                class="action_wrapper d-flex flex-wrap justify-content-between align-items-center mb-3">
                                                {{-- <div class="order-2 order-md-1" style="font-size: 15px;">
                                                    <b>Danh sách vị trí/chức danh</b>
                                                </div> --}}
                                                <div
                                                    class="order-1 order-md-2  justify-content-between align-items-center flex-grow-1 mb-2 mb-md-0">
                                                    <form method="GET" action="">
                                                        <div class="form-group has-search">
                                                            {{-- <span type="submit"
                                                                class="bi bi-search  fs-5" style="float: left;;"></span> --}}
                                                            <input type="text" style="width: 150px; float: right;"
                                                                class="form-control" value="{{ $search }}"
                                                                placeholder="Tìm kiếm" name="search">
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="action_export mx-3 order-md-3" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Lọc">
                                                    <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                        data-bs-target="#filterOptions">
                                                        <i class="bi bi-funnel"></i>
                                                    </button>
                                                </div>
                                                @if (session('user')['role_id'] == '1')
                                                    <div class="action_export order-md-4">
                                                        <button class="btn btn-danger d-block testCreateUser"
                                                            data-bs-toggle="modal" data-bs-target="#taoDeXuat">Thêm vị
                                                            trí/chức danh
                                                        </button>
                                                    </div>
                                                @endif

                                            </div>
                                            <form id="select-form" action="{{ route('Position.delete') }}" method="POST">
                                                @csrf
                                                <div class="action_export mx-3 order-md-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Xóa"
                                                    style="position: absolute; top: 10px; left: 0;">
                                                    <button class="btn btn-danger  " type="submit"
                                                        onclick="return confirm('Bạn có muốn xóa không?')"
                                                        id="delete-selected-button" style="display: none;">Xóa</button>
                                                </div><br>
                                                <div class="table-responsive">
                                                    <table id="dsDaoTao"
                                                        class="table table-responsive table-hover table-bordered filter">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-nowrap text-center" style="width:1%"><input
                                                                        type="checkbox" id="select-all"></th>
                                                                <th class="text-nowrap text-center" style="width:2%">STT
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:6%">Mã vị
                                                                    trí</th>
                                                                <th class="text-nowrap text-center" style="width:10%">Tên vị
                                                                    trí/chức
                                                                    danh
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:10%">Cấp
                                                                    nhân sự</th>
                                                                <th class="text-nowrap text-center" style="width:10%">Đơn vị
                                                                    công tác
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:20%">Mô tả
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:6%">Định
                                                                    biên</th>
                                                                <th class="text-nowrap text-center" style="width:10%">Quỹ
                                                                    lương năm</th>
                                                                <th class="text-nowrap text-center" style="width:8%">Ngày
                                                                    tạo</th>
                                                                <th class="text-nowrap text-center" style="width:8%">Gói
                                                                    trang bị</th>
                                                                @if (session('user')['role_id'] == '1')
                                                                    <th class="text-nowrap text-center" style="width:3%">
                                                                        <span>Thao
                                                                            tác</span>
                                                                    </th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        <?php $g = 1; ?>
                                                        @foreach ($positionList as $item)
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center"> <input type="checkbox"
                                                                            name="selected_items[]"
                                                                            value="{{ $item->id }}"></td>
                                                                    <td class=" text-center">
                                                                        {{ $g++ }}
                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->code }}">
                                                                            {{ $item->code }}
                                                                        </div>
                                                                    </td>
                                                                    <td class="">
                                                                        <a style="color: black; text-decoration: underline;"
                                                                            href="{{ route('department.assignUser', $item->id) }}">
                                                                            <div class="overText" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="{{ $item->name }}">
                                                                                {{ $item->name }}
                                                                            </div>
                                                                        </a>
                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->personnel_level_name }}">
                                                                            {{ $item->personnel_level_name }}
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <a style="color: black; text-decoration: underline;"
                                                                            href="{{ route('department.index2', ['department_id' => $item->department_id]) }}">
                                                                            <div class="overText" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="{{ $item->department_name }}">
                                                                                {{ $item->department_name }}
                                                                            </div>
                                                                        </a>
                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->description }}">
                                                                            {{ $item->description }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText text-center"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title=" {{ $item->staffing }}">
                                                                            {{ $item->staffing }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText text-center"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="  {{ number_format($item->wage, 0, '.', '.') }}">
                                                                            {{ number_format($item->wage, 0, '.', '.') }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="" style="text-align: center;">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ date('d/m/Y', strtotime($item->created_at)) }}">
                                                                            {{ date('d/m/Y', strtotime($item->created_at)) }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText text-center"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title=" {{ $item->pack }}">
                                                                            {{ $item->pack }}
                                                                        </div>

                                                                    </td>
                                                                    @if (session('user')['role_id'] == '1')
                                                                        <td>
                                                                            <div
                                                                                class="table_actions d-flex justify-content-end">
                                                                                <div data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Sửa ">
                                                                                    <div class="btn"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#suaDeXuat{{ $item['id'] }}">
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
                                                    <nav aria-label="Page navigation example" class="float-end mt-3"
                                                        id="target-pagination">
                                                        <ul class="pagination">
                                                            {{ $positionList->appends([
                                                                    'search' => $search,
                                                                ])->links() }}
                                                        </ul>
                                                    </nav>
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
            @include('template.footer.footer')
        </div>
    </div>
    @include('template.sidebar.sidebarPosition.sidebarRight')

    @foreach ($positionList as $item)
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
                                            data-dropup-auto="false" data-live-search="true">
                                            <?php if ($item->department_id == null){ ?>
                                            <option>Chọn đơn vị công
                                                tác*
                                            </option>
                                            <?php
                                      } else { ?>
                                            <?php } ?>
                                            <option value="{{ $item->department_id }}">
                                                {{ $item->department_name }}
                                            </option>
                                            @foreach ($departmentlists as $ac)
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
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn cấp nhân sự*">
                                        <select name="personnel_level" required class="selectpicker"
                                            data-live-search="true" data-dropup-auto="false">
                                            <?php if ($item->personnel_level == null){ ?>
                                            <option>Chọn cấp nhân sự*
                                            </option>
                                            <?php } else { ?>
                                            <?php } ?>
                                            <option value="{{ $item->personnel_level }}">
                                                {{ $item->personnel_level_name }}
                                            </option>
                                            @foreach ($personnelLevelList as $av)
                                                <option value="{{ $av->id }}">
                                                    {{ $av->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">

                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn cấp quản lý">
                                        <select name="parent" class="selectpicker" data-dropup-auto="false"
                                            data-live-search="true">
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
                        <h5 class="modal-title text-danger" id="exampleModalLabel">Xóa vị trí/chức danh</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có thực sự muốn xoá vị trí/chức danh này không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy
                        </button>
                        <form action="{{ route('positionx.destroy', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Xóa
                            </button>
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
                <form id="addForm" action="{{ route('position.store') }}" method="POST">
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
                                    <select name="department_id" required class="selectpicker" data-dropup-auto="false"
                                        data-live-search="true">
                                        <option value="">Chọn đơn vị công tác*</option>
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
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn cấp nhân sự*">
                                    <select name="personnel_level" required class="selectpicker" data-live-search="true"
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
                                    <select name="parent" required class="selectpicker" data-dropup-auto="false"
                                        data-live-search="true">
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
                                <input name="staffing" type="number" placeholder="Định biên" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Định biên">
                            </div>
                            <div class="col-6 mb-3">
                                <input name="wage" type="number" placeholder="Quỹ lương năm" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Quỹ lương năm">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger me-3"
                                    data-bs-dismiss="modal">Hủy</button>
                                <button id="loadingBtn" style="display: none;" class="btn btn-danger" type="button"
                                    disabled>
                                    <span class="spinner-border spinner-border-sm" role="status"
                                        aria-hidden="true"></span>
                                    Loading...
                                </button>
                                <button id="submitBtn" type="submit" class="btn btn-danger">Tạo</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Filter --}}
    <div class="modal fade" id="filterOptions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo cấp nhân sự">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo cấp nhân sự" name='cap_nhan_su'>
                                        @foreach ($personnelLevelList as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo đơn vị công tác">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo đơn vị công tác" name='dv_cong_tac'>
                                        @foreach ($departmentlists as $item)
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

    <script>
        // $('#addForm').on('submit', function(e) {
        //     $('#addDetailProduct').modal('show');
        //     event.preventDefault();
        // });


        $(document).ready(function() {
            // Handle form submission
            $('#addForm').submit(function(event) {
                // Prevent the default form submission
                event.preventDefault();

                // Show the loading button and hide the submit button
                $('#submitBtn').hide();
                $('#loadingBtn').show();

                // Submit the form
                $(this).unbind('submit').submit();
            });
        });
    </script>

@endsection
