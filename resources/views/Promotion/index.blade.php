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
@php
    
    function getPaginationLink($link, $pageName)
    {
        if (!isset($link['url'])) {
            return '#';
        }
    
        $pageNumber = explode('?page=', $link['url'])[1];
    
        $queryString = request()->query();
    
        $queryString[$pageName] = $pageNumber;
        return route('Promotion.index', $queryString);
    }
    
    // function isFiltering($filterNames)
    // {
    //     $filters = request()->query();
    //     foreach ($filterNames as $filterName) {
    //         if (isset($filters[$filterName]) && $filters[$filterName] != '') {
    //             return true;
    //         }
    //     }
    //     return false;
    // }
    
@endphp
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
                                                class="action_wrapper d-flex flex-wrap justify-content-between align-items-center">
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
                                                        data-bs-target="#filterOptions" style="padding: 7px 15px;">
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
                                                                {{-- <th class="text-nowrap text-center" style="width: 5%">Nhóm
                                                                    KH
                                                                </th> --}}
                                                                @if (session('user')['role_id'] == '1')
                                                                    <th class="text-nowrap text-center"
                                                                        style="width:1%;background: #fff; position: sticky; right: -1px;">
                                                                        <span>Hành
                                                                            động</span>
                                                                    </th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        @php
                                                            $f = 1;
                                                        @endphp
                                                        <tbody>
                                                            @foreach ($promotions as $item)
                                                                <tr>
                                                                    <td class="text-center"> <input type="checkbox"
                                                                            name="selected_items[]" value="">
                                                                    </td>
                                                                    <td class="text-center">{{ $f++ }}
                                                                    </td>
                                                                    <td class="text-center">
                                                                        @if ($item->status == 'Hoạt động')
                                                                            <span class="badge bg-success">Hoạt
                                                                                động</span>
                                                                        @else
                                                                            <span class="badge bg-danger">Khóa</span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <button type="button" data-bs-toggle="modal"
                                                                            data-bs-target="#chiTietCTKM{{ $item->id }}"
                                                                            style="background: transparent">
                                                                            <div class="text-wrap text-center btn-show_detail"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="GIAM300K">
                                                                                {{ $item->code }}
                                                                            </div>
                                                                        </button>
                                                </div>
                                                </td>
                                                <td class="text-center">{{ $item->name }}
                                                </td>
                                                <td class="text-center">{{ $item->promotion_form }}
                                                </td>
                                                <td class="text-center">{{ $item->applicable_date }}
                                                </td>
                                                <td class="text-center">{{ $item->end_date }}
                                                </td>
                                                <td class="text-center">{{ $item->multiples }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->customer_type }}
                                                </td>
                                                <td class="text-center">
                                                    @foreach ($customerGroupNames[$item->id] as $customerGroupName)
                                                        {{ $customerGroupName }}<br>
                                                    @endforeach
                                                </td>
                                                {{-- <td class="text-center">
                                                    @if (isset($promotionDetailsArray[$item->id]))
                                                        @foreach ($promotionDetailsArray[$item->id] as $promotionDetail)
                                                            <p>Key 1: {{ $promotionDetail['key2'] }}</p>
                                                        @endforeach
                                                    @endif
                                                </td> --}}
                                                <td class="text-center"
                                                    style="background: #fff; position: sticky; right: -1px;">
                                                    <div class="table_actions d-flex justify-content-center">
                                                        <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Sửa ">
                                                            <div class="btn" data-bs-toggle="modal"
                                                                data-bs-target="#suaCTKM{{ $item->id }}">
                                                                <img style="width:16px;height:16px"
                                                                    src="{{ asset('assets/img/edit.svg') }}" />
                                                            </div>
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Xóa">
                                                            <div class="btn" data-bs-toggle="modal"
                                                                data-bs-target="#xoaCTKM{{ $item->id }}">
                                                                <img style="width:16px;height:16px"
                                                                    src="{{ asset('assets/img/trash.svg') }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                                </table>
                                                <nav aria-label="Page navigation example" class="float-end mt-3"
                                                    id="target-pagination">
                                                    <ul class="pagination">
                                                        @foreach ($pagination['links'] as $link)
                                                            <li class="page-item {{ $link['active'] ? 'active' : '' }}">
                                                                <a class="page-link"
                                                                    href="{{ getPaginationLink($link, 'page') }}"
                                                                    aria-label="Previous">
                                                                    <span aria-hidden="true">{!! $link['label'] !!}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
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
    </div>
    </div>
    @include('template.footer.footer')
    </div>
    </div>
    @include('template.sidebar.sidebarMaster.sidebarRight')


    @foreach ($promotions as $item)
        {{-- Modal CTKM --}}
        <div class="modal fade" id="suaCTKM{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">Sửa chương trình khuyến mại</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="addForm" action="{{ route('Promotion.update', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <h5 class="modal-title">1. Thông tin CTKM</h5>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <input name="code" required type="text" placeholder="Mã CTKM*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Mã CTKM*" value="{{ $item->code }}">
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <input name="name" required type="text" placeholder="Tên CTKM*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Tên CTKM*" value="Khuyến mại" value="{{ $item->name }}">
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Hình thức khuyến mại">
                                        <select name="promotion_form" class="selectpicker">
                                            <option value="{{ $item->promotion_form }}">{{ $item->promotion_form }}
                                            </option>
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
                                    <input name="applicable_date" type="text" placeholder="Ngày áp dụng"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Ngày áp dụng" value="{{ $item->applicable_date }}">
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <input name="end_date" type="text" placeholder="Ngày kết thúc"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Ngày kết thúc" value="{{ $item->end_date }}">
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Bội số">
                                                <select name="multiples" class="selectpicker">
                                                    <option value="{{ $item->multiples }}">{{ $item->multiples }}
                                                    </option>
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
                                                <select name="status" class="selectpicker">
                                                    <option value="{{ $item->status }}">{{ $item->status }}</option>
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
                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Nhóm khách hàng áp dụng">
                                        <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                            data-live-search="true" title="Nhóm khách hàng áp dụng"
                                            data-select-all-text="Nhóm khách hàng áp dụng"
                                            data-deselect-all-text="Bỏ chọn" data-size="3" name="customer_group_id[]"
                                            data-live-search-placeholder="Tìm kiếm..." multiple>
                                            @foreach ($customerGroupNames[$item->id] as $customerGroupName)
                                                <option selected value="{{ $item->customer_group_id }}">
                                                    {{ $customerGroupName }}</option>
                                            @endforeach
                                            {{-- <option value="{{ $item->customer_group_id }}"> {{ $item->customer_group_id }}</option> --}}
                                            @foreach ($listgroup as $a)
                                                <option value="{{ $a->id }}"> {{ $a->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Loại khách hàng áp dụng">
                                        <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                            data-live-search="true" title="Loại khách hàng áp dụng"
                                            data-select-all-text="Loại khách hàng áp dụng"
                                            data-deselect-all-text="Bỏ chọn" name="customer_type"
                                            data-live-search-placeholder="Tìm kiếm..." multiple>
                                            <option value="{{ $item->customer_type }}">{{ $item->customer_type }}
                                            </option>
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
                                            data-size="3" name="customer_id[]"
                                            data-live-search-placeholder="Tìm kiếm..." multiple>
                                            @foreach ($customerNames[$item->id] as $customerName)
                                                <option selected value="{{ $item->customer_id }}"> {{ $customerName }}
                                                </option>
                                            @endforeach
                                            @foreach ($customersList as $customer)
                                                <option value="{{ $customer->id }}"> {{ $customer->name }}</option>
                                            @endforeach
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
                                                <th class="text-nowrap text-center">Tên SP AD</th>
                                                <th class="text-nowrap text-center" style="width: 10%;">Mã sản phẩm
                                                </th>
                                                <th class="text-nowrap text-center" style="width: 8%;">Đạt số lượng</th>
                                                <th class="text-nowrap text-center" style="width: 8%;">Đạt số tiền</th>
                                                <th class="text-nowrap text-center" style="width: 8%;">Số lượng SP tặng
                                                </th>
                                                <th class="text-nowrap text-center">Tên SP</th>
                                                <th class="text-nowrap text-center" style="width: 10%;">Mã SP tặng
                                                    tặng</th>
                                                <th class="text-nowrap text-center" style="width: 8%;">Chiết khấu %</th>
                                                <th class="text-nowrap text-center" style="width: 8%;">Tặng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody id="specifications_edit">
                                            @if (!empty($item->promotion_details))
                                                @php
                                                    $h = 0;
                                                    $l = 0;
                                                    $k = 0;
                                                    $m = 0;
                                                    $n = 0;
                                                    $n1 = 0;
                                                @endphp
                                                @foreach ($promotionDetailsArray[$item->id] as $promotionDetail)
                                                    <tr>
                                                        <td class="text-center">
                                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="Mã sản phẩm">
                                                                <select class="selectpicker" data-dropup-auto="false"
                                                                    data-width="100%" data-live-search="true"
                                                                    title="Chọn mã sản phẩm"
                                                                    data-select-all-text="Mã sản phẩm"
                                                                    data-deselect-all-text="Bỏ chọn" data-size="3"
                                                                    name="promotion_details[{{ $n++ }}][key1]"
                                                                    data-live-search-placeholder="Tìm kiếm..."
                                                                    id="selectCodeProductEdit_{{ $h++ }}">
                                                                    <option selected
                                                                        value="{{ $promotionDetail['key1'] }}">
                                                                        {{ $promotionDetail['key1'] }}</option>
                                                                    @foreach ($products as $product)
                                                                        <option value="{{ $product->code }}">
                                                                            {{ $product->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <input id="nameProductEdit_{{ $l++ }}"
                                                                name="promotion_details[{{ $n1++ }}][key2]"
                                                                class="nameProduct form-control"
                                                                value="{{ $promotionDetail['key2'] }}" />

                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="promotion_details[{{ $n++ }}][key3]"
                                                                value="{{ $promotionDetail['key3'] }}">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="promotion_details[{{ $n++ }}][key4]"
                                                                value="{{ $promotionDetail['key4'] }}">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="promotion_details[{{ $n++ }}][key5]"
                                                                value="{{ $promotionDetail['key5'] }}">
                                                        </td>
                                                        <td class="text-center">
                                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="Mã sản phẩm tặng">
                                                                <select class="selectpicker" data-dropup-auto="false"
                                                                    data-width="100%" data-live-search="true"
                                                                    title="Chọn sản phẩm ..."
                                                                    data-select-all-text="Mã sản phẩm tặng"
                                                                    data-deselect-all-text="Bỏ chọn" data-size="3"
                                                                    name="promotion_details[{{ $n++ }}][key6]"
                                                                    data-live-search-placeholder="Tìm kiếm..."
                                                                    id="codeProductBonusEdit_{{ $k++ }}">
                                                                    <option selected
                                                                        value="{{ $promotionDetail['key6'] }}">
                                                                        {{ $promotionDetail['key6'] }}</option>
                                                                    @foreach ($products as $product)
                                                                        <option value="{{ $product->code }}">
                                                                            {{ $product->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </td>
                                                        <td class="text-center">
                                                            <input id="productBonusEdit_{{ $m++ }}"
                                                                name="promotion_details[{{ $n++ }}][key7]"
                                                                class="form-control"
                                                                value="{{ $promotionDetail['key7'] }}" />
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="promotion_details[{{ $n++ }}][key8]"
                                                                value="{{ $promotionDetail['key8'] }}">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="promotion_details[{{ $n++ }}][key9]"
                                                                value="{{ $promotionDetail['key9'] }}">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                            <tr>
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
                            <button type="button" class="btn btn-outline-danger me-3"
                                data-bs-dismiss="modal">Hủy</button>
                            <button id="submitBtn" type="submit" class="btn btn-danger">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Modal chi tiết CTKM --}}
        <div class="modal fade" id="chiTietCTKM{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">Chi tiết kho</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mb-3">
                                <h5 class="modal-title">1. Thông tin CTKM</h5>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="applicable_date" type="text" placeholder="Tên CTKM" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tên CTKM"
                                    value="{{ $item->name }}" disabled>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="applicable_date" type="text" placeholder="Thời gian"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Thời gian" value="{{ $item->applicable_date - $item->start_date }}" disabled>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="applicable_date" type="text" placeholder="Hình thức khuyến mãi"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Hình thức khuyến mãi" value="{{ $item->promotion_form }}" disabled>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="applicable_date" type="text" placeholder="Ngày kết thúc"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Ngày kết thúc" value="{{ $item->applicable_date - $item->end_date }}"
                                    disabled>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="applicable_date" type="text" placeholder="Bội số" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Bội số"
                                    value="{{ $item->multiples }}" disabled>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="applicable_date" type="text" placeholder="Trạng thái"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Trạng thái" value="{{ $item->status }}" disabled>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="applicable_date" type="text" placeholder="Nhóm KH áp dụng"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Nhóm KH áp dụng" value="{{ $item->customer_group_id }}" disabled>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="applicable_date" type="text" placeholder="Loại khách hàng"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Loại khách hàng" value="{{ $item->customer_type }}" disabled>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="applicable_date" type="text" placeholder="Khách hàng áp dụng"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Khách hàng áp dụng" value="{{ $item->customer_type }}" disabled>
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
                                            <th class="text-nowrap text-center">Tên SP AD</th>
                                            <th class="text-nowrap text-center" style="width: 10%;">Mã sản phẩm
                                            </th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Đạt số lượng</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Đạt số tiền</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Số lượng SP tặng
                                            </th>
                                            <th class="text-nowrap text-center">Tên SP
                                                tặng</th>
                                            <th class="text-nowrap text-center" style="width: 10%;">Mã SP tặng</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Chiết khấu %</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Tặng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detailCTKM">
                                        @if (!empty($item->promotion_details))
                                            @php
                                                $p = 0;
                                            @endphp
                                            @foreach ($promotionDetailsArray[$item->id] as $promotionDetail)
                                                <tr>
                                                    <td class="text-center">
                                                        <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Mã sản phẩm">
                                                            <select class="selectpicker" data-dropup-auto="false"
                                                                data-width="100%" data-live-search="true"
                                                                title="Chọn mã sản phẩm"
                                                                data-select-all-text="Mã sản phẩm"
                                                                data-deselect-all-text="Bỏ chọn" data-size="3"
                                                                name="data[0][key1][]"
                                                                data-live-search-placeholder="Tìm kiếm..."
                                                                id="selectCodeProductDetail_{{ $p++ }}" multiple
                                                                disabled>
                                                                {{-- @if (isset($data->key1))
                                                    <option  selected >
                                                        @foreach ($data->key1 as $value)
                                                        {{ $value}}
                                                        @endforeach
                                                    </option>
                                                @endif --}}
                                                                <option selected value="{{ $promotionDetail['key1'] }}">
                                                                    {{ $promotionDetail['key1'] }}</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <span id="nameProductDetail_{{ $p++ }}"
                                                            class="nameProduct">{{ $promotionDetail['key2'] }}</span>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="data[0][key2]"
                                                            value="{{ $promotionDetail['key3'] }}" disabled>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="data[0][key3]"
                                                            value="{{ $promotionDetail['key4'] }}" disabled>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="data[0][key3]"
                                                            value="{{ $promotionDetail['key5'] }}" disabled>
                                                    </td>
                                                    <td class="text-center">
                                                        <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Mã sản phẩm tặng">
                                                            <select class="selectpicker" data-dropup-auto="false"
                                                                data-width="100%" data-live-search="true"
                                                                title="Chọn sản phẩm ..."
                                                                data-select-all-text="Mã sản phẩm tặng"
                                                                data-deselect-all-text="Bỏ chọn" data-size="3"
                                                                name="data[0][key4][]"
                                                                data-live-search-placeholder="Tìm kiếm..."
                                                                id="codeProductBonusDetail_{{ $p++ }}" multiple
                                                                disabled>
                                                                <option value="{{ $promotionDetail['key6'] }}" selected>
                                                                    {{ $promotionDetail['key6'] }}
                                                                </option>

                                                            </select>
                                                        </div>

                                                    </td>
                                                    <td class="text-center">
                                                        <span
                                                            id="productBonusDetail_{{ $p++ }}">{{ $promotionDetail['key7'] }}</span>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="data[0][key5]"
                                                            value="{{ $promotionDetail['key8'] }}" disabled>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="data[0][key6]"
                                                            value="{{ $promotionDetail['key9'] }}" disabled>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
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

        {{-- Modal Xóa CTKM --}}
        <div class="modal fade" id="xoaCTKM{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                        <form action="{{ route('Promotion.destroy', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal thêm CTKM -->
    <div class="modal fade" id="addCTKM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm chương trình khuyến mại</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addForm" action="{{ route('Promotion.store') }}" method="POST">
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
                                    <select name="promotion_form" class="selectpicker">
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
                                <input name="applicable_date" type="text" placeholder="Ngày áp dụng"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Ngày áp dụng">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <input name="end_date" type="text" placeholder="Ngày kết thúc" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ngày kết thúc">
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Bội số">
                                            <select name="multiples" class="selectpicker">
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
                                            <select name="status" class="selectpicker">
                                                <option value="Hoạt động">Chọn trạng thái
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
                                        data-size="3" name="customer_group_id[]"
                                        data-live-search-placeholder="Tìm kiếm..." multiple>
                                        @foreach ($listgroup as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Loại khách hàng áp dụng">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Loại khách hàng áp dụng"
                                        data-select-all-text="Loại khách hàng áp dụng" data-deselect-all-text="Bỏ chọn"
                                        data-size="3" name="customer_type" data-live-search-placeholder="Tìm kiếm..."
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
                                        data-size="3" name="customer_id[]" data-live-search-placeholder="Tìm kiếm..."
                                        multiple>
                                        @foreach ($customersList as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                        @endforeach
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
                                            <th class="text-nowrap text-center">Tên SP AD</th>
                                            <th class="text-nowrap text-center" style="width: 10%;">Mã sản phẩm
                                            </th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Đạt số lượng</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Đạt số tiền</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Số lượng SP tặng
                                            </th>
                                            <th class="text-nowrap text-center">Tên SP tặng</th>
                                            <th class="text-nowrap text-center" style="width: 10%;">Mã SP tặng
                                            </th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Chiết khấu %</th>
                                            <th class="text-nowrap text-center" style="width: 8%;">Tặng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody id="specifications">
                                        <tr>
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



@endsection
@section('footer-script')
    <!-- Plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>


    <!-- Chart Js -->
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs-plugin-stacked100@1.0.0.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs-plugin-datalabels@2.0.0.js') }}">
    </script>

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
            let specCount = 0;


            function addNewRow() {
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                <td class="text-center">
                    <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mã sản phẩm">
                        <select class="selectpicker" data-dropup-auto="false" data-width="100%" data-live-search="true"
                            title="Chọn mã sản phẩm" data-select-all-text="Mã sản phẩm" data-deselect-all-text="Bỏ chọn"
                            data-size="3" name="promotion_details[${specCount}][key1]"
                            data-live-search-placeholder="Tìm kiếm..."
                            id="selectCodeProduct_${specCount}">
                            @foreach ($products as $item)
                                <option value="{{ $item->code }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td class="text-center">
                    <input id="nameProduct_${specCount}" class="form-control" name="promotion_details[${specCount}][key2]"
                        readonly value="abc">
                </td>
                <td><input type="text" class="form-control" name="promotion_details[${specCount}][key3]"></td>
                <td><input type="text" class="form-control" name="promotion_details[${specCount}][key4]"></td>
                <td><input type="text" class="form-control" name="promotion_details[${specCount}][key5]"></td>
                <td class="text-center">
                    <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mã sản phẩm tặng">
                        <select class="selectpicker" data-dropup-auto="false" data-width="100%" data-live-search="true"
                            title="Chọn sản phẩm ..." data-select-all-text="Mã sản phẩm tặng"
                            data-deselect-all-text="Bỏ chọn" data-size="3"
                            name="promotion_details[${specCount}][key6]" data-live-search-placeholder="Tìm kiếm..."
                            id="codeProductBonus_${specCount}">
                            @foreach ($products as $item)
                                <option value="{{ $item->code }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td class="text-center">
                    <input id="productBonus_${specCount}" class="form-control"
                        name="promotion_details[${specCount}][key7]" readonly>
                </td>
                <td><input type="text" class="form-control" name="promotion_details[${specCount}][key8]"></td>
                <td><input type="text" class="form-control" name="promotion_details[${specCount}][key9]"></td>
                <td class="text-center">
                    <i class="bi bi-trash fs-3 remove-spec" style="color: var(--primary-color); cursor: pointer;"></i>
                </td>
            `;

                const currentRow = document.querySelector(".add-spec").closest("tr");

                currentRow.parentNode.insertBefore(newRow, currentRow);
                $('.selectpicker').selectpicker();

                const selectCodeProduct = newRow.querySelector(`#selectCodeProduct_${specCount}`);
                const nameProductSpan = newRow.querySelector(`#nameProduct_${specCount}`);
                const codeProductBonus = newRow.querySelector(`#codeProductBonus_${specCount}`);
                const productBonusSpan = newRow.querySelector(`#productBonus_${specCount}`);

                selectCodeProduct.addEventListener("change", function() {
                    const selectedOptions = Array.from(selectCodeProduct.selectedOptions);
                    const selectedValues = selectedOptions.map(option => option.value);
                    nameProductSpan.value = selectedValues.join(", ");
                });

                codeProductBonus.addEventListener("change", function() {
                    const selectedOptions = Array.from(codeProductBonus.selectedOptions);
                    const selectedValues = selectedOptions.map(option => option.value);
                    productBonusSpan.value = selectedValues.join(", ");
                });

                const removeSpecIcons = newRow.querySelectorAll(".remove-spec");

                removeSpecIcons.forEach(removeIcon => {
                    removeIcon.addEventListener("click", function() {
                        newRow.remove();
                    });
                });

                specCount++;
            }

            addNewRow();

            const addSpecIcons = document.querySelectorAll(".add-spec");

            addSpecIcons.forEach(icon => {
                icon.addEventListener("click", addNewRow);
            });
        });
    </script>

    {{-- Xử lý modal sửa --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let specCount = 0;

            function addNewRow() {
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                <td class="text-center">
                    <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mã sản phẩm">
                        <select class="selectpicker" data-dropup-auto="false" data-width="100%" data-live-search="true"
                            title="Chọn mã sản phẩm" data-select-all-text="Mã sản phẩm" data-deselect-all-text="Bỏ chọn"
                            data-size="3" name="promotion_detail[${specCount}][key1]"
                            data-live-search-placeholder="Tìm kiếm..."
                            id="selectCodeProductEdit_${specCount}">
                            @foreach ($products as $item)
                                <option value="{{ $item->code }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td class="text-center">
                    <input id="nameProductEdit_${specCount}" class="form-control" name="promotion_detail[${specCount}][key2]"
                        readonly>
                </td>
                <td><input type="text" class="form-control" name="promotion_detail[${specCount}][key3]"></td>
                <td><input type="text" class="form-control" name="promotion_detail[${specCount}][key4]"></td>
                <td><input type="text" class="form-control" name="promotion_detail[${specCount}][key5]"></td>
                <td class="text-center">
                    <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mã sản phẩm tặng">
                        <select class="selectpicker" data-dropup-auto="false" data-width="100%" data-live-search="true"
                            title="Chọn sản phẩm ..." data-select-all-text="Mã sản phẩm tặng"
                            data-deselect-all-text="Bỏ chọn" data-size="3"
                            name="promotion_detail[${specCount}][key6]" data-live-search-placeholder="Tìm kiếm..."
                            id="codeProductBonusEdit_${specCount}">
                            @foreach ($products as $item)
                                <option value="{{ $item->code }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td class="text-center">
                    <input id="productBonusEdit_${specCount}" class="form-control"
                        name="promotion_detail[${specCount}][key7]" readonly>
                </td>
                <td><input type="text" class="form-control" name="promotion_detail[${specCount}][key8]"></td>
                <td><input type="text" class="form-control" name="promotion_detail[${specCount}][key9]"></td>
                <td class="text-center">
                    <i class="bi bi-trash fs-3 remove-spec" style="color: var(--primary-color); cursor: pointer;"></i>
                </td>
            `;

                const currentRow = document.querySelector(".add-spec_edit").closest("tr");

                currentRow.parentNode.insertBefore(newRow, currentRow);
                $('.selectpicker').selectpicker();

                const selectCodeProduct = newRow.querySelector(`#selectCodeProductEdit_${specCount}`);
                const nameProductSpan = newRow.querySelector(`#nameProductEdit_${specCount}`);
                const codeProductBonus = newRow.querySelector(`#codeProductBonusEdit_${specCount}`);
                const productBonusSpan = newRow.querySelector(`#productBonusEdit_${specCount}`);

                selectCodeProduct.addEventListener("change", function() {
                    const selectedOptions = Array.from(selectCodeProduct.selectedOptions);
                    const selectedValues = selectedOptions.map(option => option.value);
                    nameProductSpan.value = selectedValues.join(", ");
                });

                codeProductBonus.addEventListener("change", function() {
                    const selectedOptions = Array.from(codeProductBonus.selectedOptions);
                    const selectedValues = selectedOptions.map(option => option.value);
                    productBonusSpan.value = selectedValues.join(", ");
                });

                const removeSpecIcons = newRow.querySelectorAll(".remove-spec_edit");

                removeSpecIcons.forEach(removeIcon => {
                    removeIcon.addEventListener("click", function() {
                        newRow.remove();
                    });
                });

                specCount++;
            }


            const addSpecIcons = document.querySelectorAll(".add-spec_edit");

            addSpecIcons.forEach(icon => {
                icon.addEventListener("click", addNewRow);
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
