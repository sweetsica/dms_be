@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách PNMNCC')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection
<style>
    .text_default {
        color: var(--primary-color)
    }

    .btn-show_detail {
        color: black;
        text-decoration: underline;
        cursor: pointer;
    }

    .btn-show_detail:hover {
        color: var(--primary-color);
    }
</style>
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Danh sách phiếu nhập mua nhà cung cấp</h5>
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
                                                <div
                                                    class="justify-content-between align-items-center flex-grow-1 mb-2 mb-md-0">
                                                    <form method="GET" action="">
                                                        <div class="form-group has-search">
                                                            <input type="text" style="width: 150px; float: right;"
                                                                class="form-control" placeholder="Tìm kiếm" name="search">
                                                        </div>
                                                    </form>
                                                </div>


                                                <div class="mx-2">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kho"
                                                        style="width: 100px;">
                                                        <select name="" class="selectpicker" placeholder="Kho">
                                                            <option value="Kho 1">Kho 1
                                                            </option>
                                                            <option value="Kho 2">Kho 2
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mx-2">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Người tạo" style="width: 100px;">
                                                        <select name="" class="selectpicker" placeholder="Người tạo">
                                                            <option value="Admin">Admin
                                                            </option>
                                                            <option value="Giám đốc">Giám đốc
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mx-2">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Thời gian">
                                                        <input type="date" class="form-control" style="width: 100px;"
                                                            placeholder="Thời gian" />
                                                    </div>
                                                </div>

                                                <div class="mx-2">
                                                    <button class="btn btn-danger btn-lg" style="padding: 7px 15px;">
                                                        <i class="bi bi-download "></i>
                                                    </button>
                                                </div>

                                                @if (session('user')['role_id'] == '1')
                                                    <div class="action_export order-md-4">
                                                        <button class="btn btn-danger d-block testCreateUser"
                                                            data-bs-toggle="modal" data-bs-target="#addPNMNCC">Thêm
                                                        </button>
                                                    </div>
                                                @endif

                                            </div>
                                            <form id="select-form" action="{{ route('delete-selected-items') }}"
                                                method="POST">
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
                                                                <th class="text-nowrap text-center" style="width: 2%"><input
                                                                        type="checkbox" id="select-all"></th>
                                                                <th class="text-nowrap text-center" style="width: 3%">STT
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 5%">Mã
                                                                    phiếu
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 15%">Tên
                                                                    phiếu
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 10%">Kho
                                                                    nhận hàng</th>
                                                                <th class="text-nowrap text-center" style="width: 10%">Thời
                                                                    gian
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 15%">Người
                                                                    tạo
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 20%">Ghi
                                                                    chú
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 4%">Trạng
                                                                    thái
                                                                </th>
                                                                @if (session('user')['role_id'] == '1')
                                                                    <th class="text-nowrap text-center" style="width: 5%">
                                                                        <span>Hành
                                                                            động</span>
                                                                    </th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        {{-- @foreach ($departmentList as $item)
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center"> <input type="checkbox"
                                                                            name="selected_items[]"
                                                                            value="{{ $item->id }}"></td>
                                                                    <td class=" text-center">
                                                                        {{ $t++ }}
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
                                                                            href="{{ route('department.index2', ['department_id' => $item->id]) }}">
                                                                            <div class="overText" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="{{ $item->name }}">
                                                                                {{ $item->name }}
                                                                            </div>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        @if ($item->donvime)
                                                                            <a style="color: black; text-decoration: underline;"
                                                                                href="{{ route('department.index2', ['department_id' => $item->donvime->id]) }}">
                                                                                <div class="overText"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="{{ $item->donvime->name ?? '' }}">
                                                                                    {{ $item->donvime->name ?? '' }}
                                                                                </div>
                                                                            </a>
                                                                        @else
                                                                        @endif
                                                                    </td>
                                                                    <td class="">
                                                                        <div data-bs-toggle="modal"
                                                                            data-bs-target="#infoUser{{ $item->ib_lead }}"
                                                                            role="button"
                                                                            style="text-decoration: underline;"
                                                                            class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->leader_name }}">
                                                                            {{ $item->leader_name }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->description }}">
                                                                            {{ $item->description }}
                                                                        </div>
                                                                    </td>
                                                                    @if (session('user')['role_id'] == '1')
                                                                        <td>

                                                                            <div
                                                                                class="table_actions d-flex justify-content-center">
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
                                                        @endforeach --}}
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center"> <input type="checkbox"
                                                                        name="selected_items[]" value="">
                                                                </td>
                                                                <td class="text-center">1
                                                                </td>
                                                                <td class="text-center">
                                                                    12345
                                                                </td>
                                                                <td class="text-center">
                                                                    {{-- Nhớ sửa title name item nha --}}
                                                                    <div class="text-wrap text-center btn-show_detail"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Xuất văn phòng phẩm">
                                                                        <a style="color: black; text-decoration: underline"
                                                                            href="{{ route('BuySupplier.show', 1) }}">Xuất
                                                                            văn phòng phẩm</a>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">Hà Nội
                                                                </td>
                                                                <td class="text-center">Thái Bình
                                                                </td>
                                                                <td class="text-center">24/08/2023
                                                                </td>
                                                                <td class="text-center">Nguyễn Trãi - 00001
                                                                </td>
                                                                <td class="text-center">Đã tạo
                                                                </td>

                                                                <td class="text-center">
                                                                    <div
                                                                        class="table_actions d-flex justify-content-center">
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Sửa ">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#suaNK">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/edit.svg') }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Xóa">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#xoaNK">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/trash.svg') }}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
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

    {{-- @foreach ($departmentList as $item)
        <div class="modal fade" id="suaDeXuat{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">Sửa đơn vị</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('department.update', $item->id) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <input data-bs-toggle="tooltip" data-bs-placement="top" title="Nhập tên đơn vị*"
                                        name="name" type="text" placeholder="Tên đơn vị" class="form-control"
                                        value="{{ $item->name }}" required>
                                </div>
                                <div class="col-6 mb-3">
                                    <input data-bs-toggle="tooltip" data-bs-placement="top" title="Mã đơn vị*"
                                        name="code" type="text" placeholder="Mã đơn vị*" class="form-control"
                                        value="{{ $item->code }}" required>
                                </div>
                                <div class="col-6 mb-3">

                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn đơn vị cha">
                                        <select name="parent" required class="selectpicker" data-dropup-auto="false" data-live-search="true">
                                            <?php if( $item->parent == 0){ ?>
                                            <option value="0">Chọn
                                                đơn
                                                vị cha</option>
                                            <?php
                                      }else{ ?>
                                            <option value="{{ $item->parent }}">
                                                @if ($item->donvime)
                                                    {{ $item->donvime->name }}
                                                @endif
                                            </option>
                                            <?php } ?>
                                            <option value="0">Chọn
                                                đơn
                                                vị cha</option>
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
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn trưởng bộ phận">
                                        <select name="ib_lead" class="selectpicker" data-dropup-auto="false" data-live-search="true">
                                            <?php if( $item->ib_lead == 0){ ?>
                                            <option value="0">Chọn
                                                trưởng bộ phận
                                            </option>
                                            <?php }else{ ?>
                                            <option value="{{ $item->ib_lead }}">
                                                {{ $item->leader_name }}
                                            </option>
                                            <?php } ?>
                                            <option value="0">Chọn
                                                trưởng bộ phận</option>
                                            @foreach ($UnitLeaderList as $av)
                                                <option value="{{ $av->id }}">
                                                    {{ $av->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top">
                                    <textarea name="description" type="text" placeholder="Chức năng nhiệm vụ" class="form-control "
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Mô tả" style="height: 80px;">{{ $item->description }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-danger">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach --}}


    {{-- Modal sửa nhập kho --}}
    <div class="modal fade" id="suaNK" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Sửa phiếu nhập mua nhà cung cấp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addForm" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <input name="" required type="text" placeholder="Tên kỹ năng nghiệp vụ"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Tên kỹ năng nghiệp vụ" value="Bán xe">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input name="" required type="date" placeholder="Mô tả" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mô tả"
                                    value="Kinh doanh xe">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Phân loại">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Phân loại" data-select-all-text="Phân loại"
                                        data-deselect-all-text="Bỏ chọn" data-size="3" name=""
                                        data-live-search-placeholder="Tìm kiếm...">
                                        <option value="Loại 1" selected>Loại 1
                                        </option>
                                        <option value="Loại 2">Loại 2
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Cấp nhân sự" data-select-all-text="Cấp nhân sự"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name=""
                                    data-live-search-placeholder="Tìm kiếm...">
                                    <option value="Cấp 1">Cấp 1
                                    </option>
                                    <option value="Cấp 2" selected>Cấp 2
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Vị trí/chức danh"
                                    data-select-all-text="Vị trí/chức danh" data-deselect-all-text="Bỏ chọn"
                                    data-size="3" name="" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="Tổng giám đốc">Tổng giám đốc
                                    </option>
                                    <option value="Admin" selected>Admin
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Đơn vị công tác"
                                    data-select-all-text="Đơn vị công tác" data-deselect-all-text="Bỏ chọn"
                                    data-size="3" name="" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="Thái Hưng" selected>Thái Hưng
                                    </option>
                                    <option value="Cầu Giấy">Cầu Giấy
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger me-3" data-bs-dismiss="modal">Hủy</button>
                        <button id="submitBtn" type="submit" class="btn btn-danger">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Xóa nhập kho --}}
    <div class="modal fade" id="xoaNK" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Xóa phiếu nhập mua nhà cung cấp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có thực sự muốn xoá phiếu nhập mua nhà cung cấp này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                    <form action="" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal thêm nhập kho -->
    <div class="modal fade" id="addPNMNCC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm phiếu nhập mua nhà cung cấp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addForm" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <input name="" required type="text" placeholder="Tên kỹ năng nghiệp vụ"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Tên kỹ năng nghiệp vụ">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input name="" required type="date" placeholder="Mô tả" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mô tả">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Phân loại">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Phân loại" data-select-all-text="Phân loại"
                                        data-deselect-all-text="Bỏ chọn" data-size="3" name=""
                                        data-live-search-placeholder="Tìm kiếm...">
                                        <option value="Loại 1">Loại 1
                                        </option>
                                        <option value="Loại 2">Loại 2
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Cấp nhân sự" data-select-all-text="Cấp nhân sự"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name=""
                                    data-live-search-placeholder="Tìm kiếm...">
                                    <option value="Cấp 1">Cấp 1
                                    </option>
                                    <option value="Cấp 2">Cấp 2
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Vị trí/chức danh"
                                    data-select-all-text="Vị trí/chức danh" data-deselect-all-text="Bỏ chọn"
                                    data-size="3" name="" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="Tổng giám đốc">Tổng giám đốc
                                    </option>
                                    <option value="Admin">Admfa-inverse
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Đơn vị công tác"
                                    data-select-all-text="Đơn vị công tác" data-deselect-all-text="Bỏ chọn"
                                    data-size="3" name="" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="Thái Hưng">Thái Hưng
                                    </option>
                                    <option value="Cầu Giấy">Cầu Giấy
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger me-3" data-bs-dismiss="modal">Hủy</button>
                        <button id="submitBtn" type="submit" class="btn btn-danger">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('footer-script')
    <!-- Plugins -->
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
