@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách CTKM')
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
                        <h5 class="mainSection_heading-title">Danh sách chương trình khuyến mại</h5>
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
                                                    class="order-1 order-md-2  justify-content-between align-items-center flex-grow-1 mb-2 mb-md-0">
                                                    <form method="GET" action="">
                                                        <div class="form-group has-search">
                                                            <input type="text" style="width: 150px; float: right;"
                                                                class="form-control" placeholder="Tìm kiếm" name="search">
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
                                                            data-bs-toggle="modal" data-bs-target="#addCTKM">Thêm
                                                            mới</button>
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
                                                        class="table table-responsive table-hover table-bordered filter"
                                                        style="width: 150%;">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-nowrap text-center" style="width: 2%"><input
                                                                        type="checkbox" id="select-all"></th>
                                                                <th class="text-nowrap text-center" style="width: 3%">STT
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 8%">Trạng
                                                                    thái
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 8%">Mã
                                                                    CTKM
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 15%">Tên
                                                                    CTKM</th>
                                                                <th class="text-nowrap text-center" style="width: 8%">Hình
                                                                    thức KM
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 8%">Ngày
                                                                    bắt đầu
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 8%">Ngày
                                                                    kết thúc
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 8%">Bội
                                                                    số
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 5%">Loại
                                                                    KH
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 5%">Nhóm
                                                                    KH
                                                                </th>
                                                                @if (session('user')['role_id'] == '1')
                                                                    <th class="text-nowrap text-center"
                                                                        style="width:1%;background: #fff; position: sticky; right: 0;">
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
                                                                <td class="text-center"> <span class="badge bg-success">Hoạt
                                                                        động</span>
                                                                </td>
                                                                <td class="text-center">
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#chiTietCTKM"
                                                                        style="background: transparent">
                                                                        <div class="text-wrap text-center btn-show_detail"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="GIAM300K">
                                                                            GIAM300K
                                                                        </div>
                                                                    </button>
                                                                </td>
                                                                <td class="text-center">Giảm 300k cho đơn hàng trên 1tr đồng
                                                                </td>
                                                                <td class="text-center">Giảm giá
                                                                </td>
                                                                <td class="text-center">21/08/2023
                                                                </td>
                                                                <td class="text-center">31/08/2023
                                                                </td>
                                                                <td class="text-center">Không áp dụng
                                                                </td>
                                                                <td class="text-center">
                                                                    Khách lẻ
                                                                </td>
                                                                <td class="text-center">

                                                                </td>
                                                                <td class="text-center"
                                                                    style="background: #fff; position: sticky; right: 0;">
                                                                    <div
                                                                        class="table_actions d-flex justify-content-center">
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Sửa ">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#suaCTKM">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/edit.svg') }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Xóa">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#xoaCTKM">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/trash.svg') }}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="text-center"> <input type="checkbox"
                                                                        name="selected_items[]" value="">
                                                                </td>
                                                                <td class="text-center">1
                                                                </td>
                                                                <td class="text-center"> <span
                                                                        class="badge bg-danger">Khóa</span>
                                                                </td>
                                                                <td class="text-center">
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#chiTietCTKM"
                                                                        style="background: transparent">
                                                                        <div class="text-wrap text-center btn-show_detail"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="MUA3TANG1">
                                                                            MUA3TANG1
                                                                        </div>
                                                                    </button>
                                                                </td>
                                                                <td class="text-center">Mua 3 tặng 1
                                                                </td>
                                                                <td class="text-center">Tặng sản phẩm
                                                                </td>
                                                                <td class="text-center">21/08/2023
                                                                </td>
                                                                <td class="text-center">31/08/2023
                                                                </td>
                                                                <td class="text-center">Áp dụng
                                                                </td>
                                                                <td class="text-center">
                                                                    Khách lẻ
                                                                </td>
                                                                <td class="text-center">
                                                                    VIP
                                                                </td>
                                                                <td class="text-center"
                                                                    style="background: #fff; position: sticky; right: 0;">
                                                                    <div
                                                                        class="table_actions d-flex justify-content-center">
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Sửa ">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#suaCTKM">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/edit.svg') }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Xóa">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#xoaCTKM">
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


    {{-- Modal sửa kho --}}
    <div class="modal fade" id="suaCTKM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Sửa chương trình khuyến mại</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addForm" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <h5 class="modal-title">1. Thông tin CTKM</h5>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="code" required type="text" placeholder="Mã CTKM*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Mã CTKM*" value="M3T1">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="name" required type="text" placeholder="Tên CTKM*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Tên CTKM*" value="Khuyến mại">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hình thức khuyến mại">
                                    <select name="" class="selectpicker">
                                        <option value="">Chọn hình thức khuyến mại
                                        </option>
                                        <option value="Tặng sản phẩm" selected>Tặng sản phẩm
                                        </option>
                                        <option value="Tặng tiền">Tặng tiền
                                        </option>
                                        <option value="Chiết khấu phần trăm(%)">Chiết khấu phần trăm(%)
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="code" required type="text" placeholder="Ngày áp dụng"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Ngày áp dụng" value="24/08/2023">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="code" required type="text" placeholder="Ngày kết thúc"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Ngày kết thúc" value="30/08/2023">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Bội số">
                                            <select name="" class="selectpicker">
                                                <option value="">Chọn bội số
                                                </option>
                                                <option value="Áp dụng" selected>Áp dụng
                                                </option>
                                                <option value="Không áp dụng">Không áp dụng
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Trạng thái">
                                            <select name="" class="selectpicker">
                                                <option value="">Chọn trạng thái
                                                </option>
                                                <option value="Hoạt động" selected>Hoạt động
                                                </option>
                                                <option value="Khóa">Khóa
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nhóm khách hàng áp dụng">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Nhóm khách hàng áp dụng"
                                        data-select-all-text="Nhóm khách hàng áp dụng" data-deselect-all-text="Bỏ chọn"
                                        data-size="3" name="" data-live-search-placeholder="Tìm kiếm..."
                                        multiple>
                                        <option value="Chọn tất cả">Chọn tất cả
                                        </option>
                                        <option value="Nhóm 1" selected>Nhóm 1
                                        </option>
                                        <option value="Nhóm 2">Nhóm 2
                                        </option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Loại khách hàng áp dụng">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Loại khách hàng áp dụng"
                                        data-select-all-text="Loại khách hàng áp dụng" data-deselect-all-text="Bỏ chọn"
                                        data-size="3" name="" data-live-search-placeholder="Tìm kiếm..."
                                        multiple>
                                        <option value="Chọn tất cả" selected>Chọn tất cả
                                        </option>
                                        <option value="Khách lẻ">Khách lẻ
                                        </option>
                                        <option value="Đại lý">Đại lý
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Khách hàng áp dụng">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Khách hàng áp dụng"
                                        data-select-all-text="Khách hàng áp dụng" data-deselect-all-text="Bỏ chọn"
                                        data-size="3" name="" data-live-search-placeholder="Tìm kiếm..."
                                        multiple>
                                        <option value="Chọn tất cả">Chọn tất cả
                                        </option>
                                        <option value="Khách bình thường" selected>Khách bình thường
                                        </option>
                                        <option value="Khách Vip" selected>Khách Vip
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <h5 class="modal-title">2. Chi tiết CTKM</h5>
                            </div>
                            <div class="table-responsive" style="min-height: 200px">
                                <table id="contact" class="table table-responsive table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap text-center">Mã sản phẩm</th>
                                            <th class="text-nowrap text-center" style="width: 10%;">Tên SP AD
                                            </th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Đạt số lượng</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Đạt số tiền</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Số lượng SP tặng
                                            </th>
                                            <th class="text-nowrap text-center">Mã SP tặng</th>
                                            <th class="text-nowrap text-center" style="width: 10%;">Tên SP
                                                tặng</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Chiết khấu %</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Tặng tiền</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="specifications_edit">
                                        <tr>
                                            <td class="text-center">
                                                <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Mã sản phẩm">
                                                    <select class="selectpicker" data-dropup-auto="false"
                                                        data-width="100%" data-live-search="true"
                                                        title="Chọn mã sản phẩm" data-select-all-text="Mã sản phẩm"
                                                        data-deselect-all-text="Bỏ chọn" data-size="3"
                                                        name="data[0][key1][]" data-live-search-placeholder="Tìm kiếm..."
                                                        id="selectCodeProductEdit_0" multiple>
                                                        <option value="Xe điện GODLF" selected>GODLF
                                                        </option>
                                                        <option value="Xe máy XSR155">XSR155
                                                        </option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span id="nameProductEdit_0" class="nameProduct"></span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[0][key2]"
                                                    value="3">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[0][key3]"
                                                    value="100">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[0][key3]"
                                                    value="10">
                                            </td>
                                            <td class="text-center">
                                                <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Mã sản phẩm tặng">
                                                    <select class="selectpicker" data-dropup-auto="false"
                                                        data-width="100%" data-live-search="true"
                                                        title="Chọn sản phẩm ..." data-select-all-text="Mã sản phẩm tặng"
                                                        data-deselect-all-text="Bỏ chọn" data-size="3"
                                                        name="data[0][key4][]" data-live-search-placeholder="Tìm kiếm..."
                                                        id="codeProductBonusEdit_0" multiple>
                                                        <option value="Tua vít" selected>TUAVIT
                                                        </option>
                                                        <option value="Bọc da" selected>BOCDA
                                                        </option>
                                                        <option value="Vô lăng">VOLANG
                                                        </option>
                                                    </select>
                                                </div>

                                            </td>
                                            <td class="text-center">
                                                <span id="productBonusEdit_0"></span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[0][key5]"
                                                    value="5">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[0][key6]"
                                                    value="0">
                                            </td>
                                            <td class="text-center">
                                                <i class="bi bi-plus fs-3 add-spec_edit"
                                                    style="color: var(--primary-color);cursor: pointer;"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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

    {{-- Modal chi tiết kho --}}
    <div class="modal fade" id="chiTietCTKM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Chi tiết chương trình khuyến mại</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <h5 class="modal-title">1. Thông tin CTKM</h5>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <input name="code" required type="text" placeholder="Mã CTKM*" class="form-control"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mã CTKM*" value="M3T1"
                                disabled>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <input name="name" required type="text" placeholder="Tên CTKM*" class="form-control"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tên CTKM*" value="Khuyến mại"
                                disabled>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hình thức khuyến mại">
                                <select name="" class="selectpicker" disabled>
                                    <option value="">Chọn hình thức khuyến mại
                                    </option>
                                    <option value="Tặng sản phẩm" selected>Tặng sản phẩm
                                    </option>
                                    <option value="Tặng tiền">Tặng tiền
                                    </option>
                                    <option value="Chiết khấu phần trăm(%)">Chiết khấu phần trăm(%)
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <input name="code" required type="text" placeholder="Ngày áp dụng"
                                class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Ngày áp dụng" value="24/08/2023" disabled>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <input name="code" required type="text" placeholder="Ngày kết thúc"
                                class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Ngày kết thúc" value="30/08/2023" disabled>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Bội số">
                                        <select name="" class="selectpicker" disabled>
                                            <option value="">Chọn bội số
                                            </option>
                                            <option value="Áp dụng" selected>Áp dụng
                                            </option>
                                            <option value="Không áp dụng">Không áp dụng
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Trạng thái">
                                        <select name="" class="selectpicker" disabled>
                                            <option value="">Chọn trạng thái
                                            </option>
                                            <option value="Hoạt động" selected>Hoạt động
                                            </option>
                                            <option value="Khóa">Khóa
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nhóm khách hàng áp dụng">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Nhóm khách hàng áp dụng"
                                    data-select-all-text="Nhóm khách hàng áp dụng" data-deselect-all-text="Bỏ chọn"
                                    data-size="3" name="" data-live-search-placeholder="Tìm kiếm..." multiple
                                    disabled>
                                    <option value="Chọn tất cả">Chọn tất cả
                                    </option>
                                    <option value="Nhóm 1" selected>Nhóm 1
                                    </option>
                                    <option value="Nhóm 2">Nhóm 2
                                    </option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Loại khách hàng áp dụng">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Loại khách hàng áp dụng"
                                    data-select-all-text="Loại khách hàng áp dụng" data-deselect-all-text="Bỏ chọn"
                                    data-size="3" name="" data-live-search-placeholder="Tìm kiếm..." multiple
                                    disabled>
                                    <option value="Chọn tất cả" selected>Chọn tất cả
                                    </option>
                                    <option value="Khách lẻ">Khách lẻ
                                    </option>
                                    <option value="Đại lý">Đại lý
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Khách hàng áp dụng">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Khách hàng áp dụng"
                                    data-select-all-text="Khách hàng áp dụng" data-deselect-all-text="Bỏ chọn"
                                    data-size="3" name="" data-live-search-placeholder="Tìm kiếm..." multiple
                                    disabled>
                                    <option value="Chọn tất cả">Chọn tất cả
                                    </option>
                                    <option value="Khách bình thường" selected>Khách bình thường
                                    </option>
                                    <option value="Khách Vip" selected>Khách Vip
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-3">
                            <h5 class="modal-title">2. Chi tiết CTKM</h5>
                        </div>
                        <div class="table-responsive" style="min-height: 200px">
                            <table id="contact" class="table table-responsive table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-nowrap text-center">Mã sản phẩm</th>
                                        <th class="text-nowrap text-center" style="width: 10%;">Tên SP AD
                                        </th>
                                        <th class="text-nowrap text-center" style="width: 8%;">Đạt số lượng</th>
                                        <th class="text-nowrap text-center" style="width: 8%;">Đạt số tiền</th>
                                        <th class="text-nowrap text-center" style="width: 8%;">Số lượng SP tặng
                                        </th>
                                        <th class="text-nowrap text-center">Mã SP tặng</th>
                                        <th class="text-nowrap text-center" style="width: 10%;">Tên SP
                                            tặng</th>
                                        <th class="text-nowrap text-center" style="width: 8%;">Chiết khấu %</th>
                                        <th class="text-nowrap text-center" style="width: 8%;">Tặng tiền</th>
                                    </tr>
                                </thead>
                                <tbody id="detailCTKM">
                                    <tr>
                                        <td class="text-center">
                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mã sản phẩm">
                                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                                    data-live-search="true" title="Chọn mã sản phẩm"
                                                    data-select-all-text="Mã sản phẩm" data-deselect-all-text="Bỏ chọn"
                                                    data-size="3" name="data[0][key1][]"
                                                    data-live-search-placeholder="Tìm kiếm..."
                                                    id="selectCodeProductDetail_0" multiple disabled>
                                                    <option value="Xe điện GODLF" selected>GODLF
                                                    </option>
                                                    <option value="Xe máy XSR155">XSR155
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span id="nameProductDetail_0" class="nameProduct"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[0][key2]"
                                                value="3" disabled>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[0][key3]"
                                                value="100" disabled>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[0][key3]"
                                                value="10" disabled>
                                        </td>
                                        <td class="text-center">
                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Mã sản phẩm tặng">
                                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                                    data-live-search="true" title="Chọn sản phẩm ..."
                                                    data-select-all-text="Mã sản phẩm tặng"
                                                    data-deselect-all-text="Bỏ chọn" data-size="3"
                                                    name="data[0][key4][]" data-live-search-placeholder="Tìm kiếm..."
                                                    id="codeProductBonusDetail_0" multiple disabled>
                                                    <option value="Tua vít" selected>TUAVIT
                                                    </option>
                                                    <option value="Bọc da" selected>BOCDA
                                                    </option>
                                                    <option value="Vô lăng">VOLANG
                                                    </option>
                                                </select>
                                            </div>

                                        </td>
                                        <td class="text-center">
                                            <span id="productBonusDetail_0"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[0][key5]"
                                                value="5" disabled>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[0][key6]"
                                                value="0" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mã sản phẩm">
                                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                                    data-live-search="true" title="Chọn mã sản phẩm"
                                                    data-select-all-text="Mã sản phẩm" data-deselect-all-text="Bỏ chọn"
                                                    data-size="3" name="data[0][key1][]"
                                                    data-live-search-placeholder="Tìm kiếm..."
                                                    id="selectCodeProductDetail_1" multiple disabled>
                                                    <option value="Xe điện GODLF" selected>GODLF
                                                    </option>
                                                    <option value="Xe máy XSR155" selected>XSR155
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span id="nameProductDetail_1" class="nameProduct"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[0][key2]"
                                                value="3" disabled>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[0][key3]"
                                                value="100" disabled>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[0][key3]"
                                                value="10" disabled>
                                        </td>
                                        <td class="text-center">
                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Mã sản phẩm tặng">
                                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                                    data-live-search="true" title="Chọn sản phẩm ..."
                                                    data-select-all-text="Mã sản phẩm tặng"
                                                    data-deselect-all-text="Bỏ chọn" data-size="3"
                                                    name="data[0][key4][]" data-live-search-placeholder="Tìm kiếm..."
                                                    id="codeProductBonusDetail_1" multiple disabled>
                                                    <option value="Tua vít">TUAVIT
                                                    </option>
                                                    <option value="Bọc da" selected>BOCDA
                                                    </option>
                                                    <option value="Vô lăng">VOLANG
                                                    </option>
                                                </select>
                                            </div>

                                        </td>
                                        <td class="text-center">
                                            <span id="productBonusDetail_1"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[0][key5]"
                                                value="5" disabled>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[0][key6]"
                                                value="0" disabled>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Xóa kho --}}
    <div class="modal fade" id="xoaCTKM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Xóa chương trình khuyến mại</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có thực sự muốn xoá chương trình khuyến mại này không?
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

    <!-- Modal thêm kho -->
    <div class="modal fade" id="addCTKM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm chương trình khuyến mại</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addForm" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <h5 class="modal-title">1. Thông tin CTKM</h5>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="code" required type="text" placeholder="Mã CTKM*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Mã CTKM*">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="name" required type="text" placeholder="Tên CTKM*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Tên CTKM*">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hình thức khuyến mại">
                                    <select name="" class="selectpicker">
                                        <option value="">Chọn hình thức khuyến mại
                                        </option>
                                        <option value="Tặng sản phẩm">Tặng sản phẩm
                                        </option>
                                        <option value="Tặng tiền">Tặng tiền
                                        </option>
                                        <option value="Chiết khấu phần trăm(%)">Chiết khấu phần trăm(%)
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="code" required type="text" placeholder="Ngày áp dụng"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Ngày áp dụng">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="code" required type="text" placeholder="Ngày kết thúc"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Ngày kết thúc">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Bội số">
                                            <select name="" class="selectpicker">
                                                <option value="">Chọn bội số
                                                </option>
                                                <option value="Áp dụng">Áp dụng
                                                </option>
                                                <option value="Không áp dụng">Không áp dụng
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Trạng thái">
                                            <select name="" class="selectpicker">
                                                <option value="">Chọn trạng thái
                                                </option>
                                                <option value="Hoạt động">Hoạt động
                                                </option>
                                                <option value="Khóa">Khóa
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nhóm khách hàng áp dụng">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Nhóm khách hàng áp dụng"
                                        data-select-all-text="Nhóm khách hàng áp dụng" data-deselect-all-text="Bỏ chọn"
                                        data-size="3" name="" data-live-search-placeholder="Tìm kiếm..."
                                        multiple>
                                        <option value="Chọn tất cả">Chọn tất cả
                                        </option>
                                        <option value="Nhóm 1">Nhóm 1
                                        </option>
                                        <option value="Nhóm 2">Nhóm 2
                                        </option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Loại khách hàng áp dụng">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Loại khách hàng áp dụng"
                                        data-select-all-text="Loại khách hàng áp dụng" data-deselect-all-text="Bỏ chọn"
                                        data-size="3" name="" data-live-search-placeholder="Tìm kiếm..."
                                        multiple>
                                        <option value="Chọn tất cả">Chọn tất cả
                                        </option>
                                        <option value="Khách lẻ">Khách lẻ
                                        </option>
                                        <option value="Đại lý">Đại lý
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Khách hàng áp dụng">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Khách hàng áp dụng"
                                        data-select-all-text="Khách hàng áp dụng" data-deselect-all-text="Bỏ chọn"
                                        data-size="3" name="" data-live-search-placeholder="Tìm kiếm..."
                                        multiple>
                                        <option value="Chọn tất cả">Chọn tất cả
                                        </option>
                                        <option value="Khách bình thường">Khách bình thường
                                        </option>
                                        <option value="Khách Vip">Khách Vip
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <h5 class="modal-title">2. Chi tiết CTKM</h5>
                            </div>
                            <div class="table-responsive" style="min-height: 200px">
                                <table id="contact" class="table table-responsive table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap text-center">Mã sản phẩm</th>
                                            <th class="text-nowrap text-center" style="width: 10%;">Tên SP AD
                                            </th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Đạt số lượng</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Đạt số tiền</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Số lượng SP tặng
                                            </th>
                                            <th class="text-nowrap text-center">Mã SP tặng</th>
                                            <th class="text-nowrap text-center" style="width: 10%;">Tên SP
                                                tặng</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Chiết khấu %</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Tặng tiền</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="specifications">
                                        <tr>
                                            <td class="text-center">
                                                <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Mã sản phẩm">
                                                    <select class="selectpicker" data-dropup-auto="false"
                                                        data-width="100%" data-live-search="true"
                                                        title="Chọn mã sản phẩm" data-select-all-text="Mã sản phẩm"
                                                        data-deselect-all-text="Bỏ chọn" data-size="3"
                                                        name="data[0][key1][]" data-live-search-placeholder="Tìm kiếm..."
                                                        id="selectCodeProduct_0" multiple>
                                                        <option value="Xe điện GODLF">GODLF
                                                        </option>
                                                        <option value="Xe máy XSR155">XSR155
                                                        </option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span id="nameProduct_0" class="nameProduct"></span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[0][key2]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[0][key3]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[0][key3]">
                                            </td>
                                            <td class="text-center">
                                                <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Mã sản phẩm tặng">
                                                    <select class="selectpicker" data-dropup-auto="false"
                                                        data-width="100%" data-live-search="true"
                                                        title="Chọn sản phẩm ..." data-select-all-text="Mã sản phẩm tặng"
                                                        data-deselect-all-text="Bỏ chọn" data-size="3"
                                                        name="data[0][key4][]" data-live-search-placeholder="Tìm kiếm..."
                                                        id="codeProductBonus_0" multiple>
                                                        <option value="Tua vít">TUAVIT
                                                        </option>
                                                        <option value="Bọc da">BOCDA
                                                        </option>
                                                        <option value="Vô lăng">VOLANG
                                                        </option>
                                                    </select>
                                                </div>

                                            </td>
                                            <td class="text-center">
                                                <span id="productBonus_0"></span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[0][key5]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[0][key6]">
                                            </td>
                                            <td class="text-center">
                                                <i class="bi bi-plus fs-3 add-spec"
                                                    style="color: var(--primary-color);cursor: pointer;"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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

    {{-- Filter --}}
    {{-- <div class="modal fade" id="filterOptions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Lọc dữ liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" method="GET">

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo Đơn vị cha">

                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo Đơn vị cha" name='don_vi_me'>
                                        @foreach ($departmentList as $item)
                                        @if ($item->donvime)
                                            <option value="{{ $item->parent}}">{{ $item->donvime->name}}</option>
                                            @endif
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

    {{-- Xử lý modal thêm  --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addSpecIcons = document.querySelectorAll(".add-spec");
            let specCount = 1;

            addSpecIcons.forEach(icon => {
                icon.addEventListener("click", function() {
                    const newSpecDiv = document.createElement("tr");
                    newSpecDiv.innerHTML = `
                    <td class="text-center">
                                                <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Mã sản phẩm">
                                                    <select class="selectpicker" data-dropup-auto="false"
                                                        data-width="100%" data-live-search="true"
                                                        title="Chọn mã sản phẩm" data-select-all-text="Mã sản phẩm"
                                                        data-deselect-all-text="Bỏ chọn" data-size="3"
                                                        name="data[0][key1][]" data-live-search-placeholder="Tìm kiếm..."
                                                        id="selectCodeProduct_${specCount}" multiple>
                                                        <option value="Xe điện GODLF">GODLF
                                                        </option>
                                                        <option value="Xe máy XSR155">XSR155
                                                        </option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span id="nameProduct_${specCount}"></span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[${specCount}][key2]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[${specCount}][key3]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[${specCount}][key3]">
                                            </td>
                                            <td class="text-center">
                                                <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Mã sản phẩm tặng">
                                                    <select class="selectpicker" data-dropup-auto="false"
                                                        data-width="100%" data-live-search="true"
                                                        title="Chọn sản phẩm ..." data-select-all-text="Mã sản phẩm tặng"
                                                        data-deselect-all-text="Bỏ chọn" data-size="3"
                                                        name="data[0][key4][]" data-live-search-placeholder="Tìm kiếm..."
                                                        id="codeProductBonus_${specCount}" multiple>
                                                        <option value="Tua vít">TUAVIT
                                                        </option>
                                                        <option value="Bọc da">BOCDA
                                                        </option>
                                                        <option value="Vô lăng">VOLANG
                                                        </option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span id="productBonus_${specCount}"></span>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[${specCount}][key5]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[${specCount}][key6]">
                                            </td>
                                            <td class="text-center">
                                                <i class="bi bi-trash fs-3 remove-spec"
                                                    style="color: var(--primary-color);cursor: pointer;"></i>
                                            </td>
            `;

                    document.getElementById("specifications").appendChild(newSpecDiv);

                    $('.selectpicker').selectpicker();

                    const selectCodeProduct = newSpecDiv.querySelector(
                        `#selectCodeProduct_${specCount}`
                    );
                    const nameProductSpan = newSpecDiv.querySelector(
                        `#nameProduct_${specCount}`
                    );

                    selectCodeProduct.addEventListener("change", function() {
                        const selectedOptions = Array.from(selectCodeProduct
                            .selectedOptions);
                        const selectedValues = selectedOptions.map(option => option.value);
                        nameProductSpan.textContent = selectedValues.join(", ");
                    });

                    const codeProductBonus = newSpecDiv.querySelector(
                        `#codeProductBonus_${specCount}`
                    );
                    const productBonusSpan = newSpecDiv.querySelector(
                        `#productBonus_${specCount}`
                    );

                    codeProductBonus.addEventListener("change", function() {
                        const selectedOptions = Array.from(codeProductBonus
                            .selectedOptions);
                        const selectedValues = selectedOptions.map(option => option.value);
                        productBonusSpan.textContent = selectedValues.join(", ");
                    });

                    const removeSpecIcons = document.querySelectorAll(".remove-spec");

                    removeSpecIcons.forEach(removeIcon => {
                        removeIcon.addEventListener("click", function() {
                            newSpecDiv.remove();
                        });
                    });

                    specCount++;
                });
            });

            const selectCodeProduct_0 = document.querySelector("#selectCodeProduct_0");
            const nameProductSpan_0 = document.querySelector("#nameProduct_0");

            selectCodeProduct_0.addEventListener("change", function() {
                const selectedOptions = Array.from(selectCodeProduct_0.selectedOptions);
                const selectedValues = selectedOptions.map(option => option.value);
                nameProductSpan_0.textContent = selectedValues.join(", ");
            });

            const codeProductBonus_0 = document.querySelector("#codeProductBonus_0");
            const productBonusSpan_0 = document.querySelector("#productBonus_0");

            codeProductBonus_0.addEventListener("change", function() {
                const selectedOptions = Array.from(codeProductBonus_0.selectedOptions);
                const selectedValues = selectedOptions.map(option => option.value);
                productBonusSpan_0.textContent = selectedValues.join(", ");
            });
        });
    </script>

    {{-- Xử lý modal sửa --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Function to update selected values in span
            function updateSelectedValues(selectId, spanId) {
                const selectedOptions = Array.from(document.querySelectorAll(`#${selectId} option:checked`));
                const selectedValues = selectedOptions.map(option => option.value);
                const spanElement = document.querySelector(`#${spanId}`);
                spanElement.textContent = selectedValues.join(", ");
            }

            // Update selected values for the initial row
            updateSelectedValues("selectCodeProductEdit_0", "nameProductEdit_0");
            updateSelectedValues("codeProductBonusEdit_0", "productBonusEdit_0");

            const addSpecIcons = document.querySelectorAll(".add-spec_edit");
            let specCount = 1;

            addSpecIcons.forEach(icon => {
                icon.addEventListener("click", function() {
                    const newSpecDiv = document.createElement("tr");
                    newSpecDiv.innerHTML = `
                <td class="text-center">
                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Mã sản phẩm">
                                                <select class="selectpicker" data-dropup-auto="false"
                                                    data-width="100%" data-live-search="true"
                                                    title="Chọn mã sản phẩm" data-select-all-text="Mã sản phẩm"
                                                    data-deselect-all-text="Bỏ chọn" data-size="3"
                                                    name="data[0][key1][]" data-live-search-placeholder="Tìm kiếm..."
                                                    id="selectCodeProductEdit_${specCount}" multiple>
                                                    <option value="Xe điện GODLF">GODLF
                                                    </option>
                                                    <option value="Xe máy XSR155">XSR155
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span id="nameProductEdit_${specCount}"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[${specCount}][key2]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[${specCount}][key3]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[${specCount}][key3]">
                                        </td>
                                        <td class="text-center">
                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Mã sản phẩm tặng">
                                                <select class="selectpicker" data-dropup-auto="false"
                                                    data-width="100%" data-live-search="true"
                                                    title="Chọn sản phẩm ..." data-select-all-text="Mã sản phẩm tặng"
                                                    data-deselect-all-text="Bỏ chọn" data-size="3"
                                                    name="data[0][key4][]" data-live-search-placeholder="Tìm kiếm..."
                                                    id="codeProductBonusEdit_${specCount}" multiple>Ư
                                                    <option value="Tua vít">TUAVIT
                                                    </option>
                                                    <option value="Bọc da">BOCDA
                                                    </option>
                                                    <option value="Vô lăng">VOLANG
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span id="productBonusEdit_${specCount}"></span>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[${specCount}][key5]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="data[${specCount}][key6]">
                                        </td>
                                        <td class="text-center">
                                            <i class="bi bi-trash fs-3 remove-spec"
                                                style="color: var(--primary-color);cursor: pointer;"></i>
                                        </td>
        `;

                    document.getElementById("specifications_edit").appendChild(newSpecDiv);

                    $('.selectpicker').selectpicker();

                    const selectCodeProduct = newSpecDiv.querySelector(
                        `#selectCodeProductEdit_${specCount}`
                    );
                    const nameProductSpan = newSpecDiv.querySelector(
                        `#nameProductEdit_${specCount}`
                    );

                    selectCodeProduct.addEventListener("change", function() {
                        const selectedOptions = Array.from(selectCodeProduct
                            .selectedOptions);
                        const selectedValues = selectedOptions.map(option => option.value);
                        nameProductSpan.textContent = selectedValues.join(", ");
                    });

                    const codeProductBonus = newSpecDiv.querySelector(
                        `#codeProductBonusEdit_${specCount}`
                    );
                    const productBonusSpan = newSpecDiv.querySelector(
                        `#productBonusEdit_${specCount}`
                    );

                    codeProductBonus.addEventListener("change", function() {
                        const selectedOptions = Array.from(codeProductBonus
                            .selectedOptions);
                        const selectedValues = selectedOptions.map(option => option.value);
                        productBonusSpan.textContent = selectedValues.join(", ");
                    });
                    const removeSpecIcons = document.querySelectorAll(".remove-spec");

                    removeSpecIcons.forEach(removeIcon => {
                        removeIcon.addEventListener("click", function() {
                            newSpecDiv.remove();
                        });
                    });

                    specCount++;
                });
            });
            const selectCodeProduct_0 = document.querySelector("#selectCodeProductEdit_0");
            const nameProductSpan_0 = document.querySelector("#nameProductEdit_0");

            selectCodeProduct_0.addEventListener("change", function() {
                const selectedOptions = Array.from(selectCodeProduct_0.selectedOptions);
                const selectedValues = selectedOptions.map(option => option.value);
                nameProductSpan_0.textContent = selectedValues.join(", ");
            });

            const codeProductBonus_0 = document.querySelector("#codeProductBonusEdit_0");
            const productBonusSpan_0 = document.querySelector("#productBonusEdit_0");

            codeProductBonus_0.addEventListener("change", function() {
                const selectedOptions = Array.from(codeProductBonus_0.selectedOptions);
                const selectedValues = selectedOptions.map(option => option.value);
                productBonusSpan_0.textContent = selectedValues.join(", ");
            });
        });
    </script>

    {{-- Xử lý chi tiết CTKM --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Function to update selected values in span
            function updateSelectedValues(selectId, spanId) {
                const selectedOptions = Array.from(document.querySelectorAll(`#${selectId} option:checked`));
                const selectedValues = selectedOptions.map(option => option.value);
                const spanElement = document.querySelector(`#${spanId}`);
                spanElement.textContent = selectedValues.join(", ");
            }

            // Function to handle dynamic rows
            function handleDynamicRows() {
                const rows = document.querySelectorAll("#detailCTKM tr");
                rows.forEach((row, index) => {
                    const selectCodeProduct = row.querySelector(`#selectCodeProductDetail_${index}`);
                    const codeProductBonus = row.querySelector(`#codeProductBonusDetail_${index}`);
                    const nameProductSpan = row.querySelector(`#nameProductDetail_${index}`);
                    const productBonusSpan = row.querySelector(`#productBonusDetail_${index}`);


                    updateSelectedValues(`selectCodeProductDetail_${index}`,
                        `nameProductDetail_${index}`);

                    updateSelectedValues(`codeProductBonusDetail_${index}`,
                        `productBonusDetail_${index}`);
                });
            }

            // Update selected values for all rows
            handleDynamicRows();
        });
    </script>
@endsection
