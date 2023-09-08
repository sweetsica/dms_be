@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách đơn đặt hàng')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
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

        .textsm {
            font-size: 20px;
        }

        .card-title-black {
            margin-bottom: 10px;
        }

        .table_left tr th {
            color: var(--primary-color);
            width: 20%;
        }

        .text_body1 {
            margin-right: 85%;
        }

        .table_left tr td {
            text-align: right;
            width: 80%;
        }

        .table_right tr th {
            color: var(--primary-color);
            margin-left: 30%;
        }

        .table_right tr td {
            text-align: right;
        }

        .table_right {}

        .text_title2 {
            margin-left: 15%;
        }

        .modal-body {
            padding: 3%;
        }
    </style>
@endsection

@php
    
    function getPaginationLink($link, $pageName)
    {
        if (!isset($link['url'])) {
            return '#';
        }
    
        $pageNumber = explode('?page=', $link['url'])[1];
    
        $queryString = request()->query();
    
        $queryString[$pageName] = $pageNumber;
        return route('PurchaseOrder.index', $queryString);
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
    
    function getStatusBg($statusInt)
    {
        //cast to int
        $statusInt = (int) $statusInt;
        switch ($statusInt) {
            case 0:
                return 'border-bottom';
                break;
            case 1:
                return 'background: #BFDBFE';
                break;
            case 2:
                return 'background: #BFDBFE';
                break;
            case 3:
                return 'background: #BFDBFE';
                break;
            case 4:
                return 'background: #BBF7D0';
                break;
            case -1:
                return 'background: #F6C9C4';
                break;
                
            default:
                return '';
                break;
        }
    }
@endphp

@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Danh sách đơn đặt hàng</h5>
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
                                                            <input type="text" style="width: 150px; float: right; margin-right:10px;"
                                                                class="form-control" placeholder="Tìm kiếm" name="search">
                                                        </div>
                                                    </form>
                                                </div>

                                                {{-- <div class="mx-2">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Trạng thái" style="width: 120px;">
                                                        <select name="" class="selectpicker"
                                                            placeholder="Trạng thái">
                                                            <option value="Tất cả" style="border-bottom">Tất cả
                                                            </option>
                                                            <option value="0" style="border-bottom">Đã tạo
                                                            </option>
                                                            <option value="1" style="background: #BFDBFE">Chờ
                                                                duyệt
                                                            </option>
                                                            <option value="2" style="background: #BFDBFE">Đã
                                                                duyệt
                                                            </option>
                                                            <option value="3" style="background: #BFDBFE">
                                                                Đã xuất hàng
                                                            </option>
                                                            <option value="4" style="background: #BBF7D0">
                                                                Đã giao hàng
                                                            </option>
                                                            <option value="-1" style="background: #F6C9C4">
                                                                Từ chối
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="mx-2">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Người đặt" style="width: 120px;">
                                                        <select name="" class="selectpicker" placeholder="Người đặt">
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
                                                        <input type="date" class="form-control" style="width: 120px;"
                                                            placeholder="Thời gian" />
                                                    </div>
                                                </div> --}}

                                                <form id="filterForm">
                                                    @foreach (request()->query() as $key => $value)
                                                            @if (!in_array($key, ['trang_thai', 'nguoi_dat', 'thoi_gian']))
                                                                <input type="hidden" name="{{ $key }}"
                                                                    value="{{ $value }}">
                                                            @endif
                                                    @endforeach
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="Trạng thái" style="width: 120px;">
                                                                <select name="trang_thai" class="selectpicker select_filter"
                                                                    placeholder="Trạng thái">
                                                                    <option value="" disabled
                                                                                {{ request()->trang_thai ? '' : 'selected' }}>
                                                                                Lọc trạng thái</option>
                                                                    <option value="all" style="border-bottom"
                                                                    {{ request()->trang_thai == 'all' ? 'selected' : '' }}>
                                                                            Tất cả</option>                                                                    
                                                                    <option value="0" style="border-bottom" 
                                                                    {{ request()->trang_thai == '0' ? 'selected' : '' }}>
                                                                    Đã tạo
                                                                    </option>
                                                                    <option value="1" style="background: #BFDBFE"
                                                                    {{ request()->trang_thai == 1 ? 'selected' : '' }}>
                                                                    Chờ duyệt
                                                                    </option>
                                                                    <option value="2" style="background: #BFDBFE"
                                                                    {{ request()->trang_thai == 2 ? 'selected' : '' }}>
                                                                    Đã duyệt
                                                                    </option>
                                                                    <option value="3" style="background: #BFDBFE"
                                                                    {{ request()->trang_thai == 3 ? 'selected' : '' }}>
                                                                        Đã xuất hàng
                                                                    </option>
                                                                    <option value="4" style="background: #BBF7D0"
                                                                    {{ request()->trang_thai == 4 ? 'selected' : '' }}>
                                                                        Đã giao hàng
                                                                    </option>
                                                                    <option value="-1" style="background: #F6C9C4"
                                                                    {{ request()->trang_thai == -1 ? 'selected' : '' }}>
                                                                        Từ chối
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
        
                                                        <div class="col-md-4">
                                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="Người đặt" style="width: 120px;">
                                                                <select name="nguoi_dat" class="selectpicker select_filter" 
                                                                placeholder="Người đặt"  data-live-search="true">
                                                                    <option value="" disabled
                                                                                {{ request()->nguoi_dat ? '' : 'selected' }}>
                                                                                Lọc người đặt</option>
                                                                    <option value="all"
                                                                        {{ request()->nguoi_dat == 'all' ? 'selected' : '' }}>
                                                                        Tất cả</option>
                                                                    @foreach ($listUsers as $item)
                                                                        <option
                                                                            {{ request()->nguoi_dat == $item->id ? 'selected' : '' }}
                                                                            value="{{ $item->id }}">
                                                                            {{ $item->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
        
                                                        <div class="col-md-4">
                                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="Ngày đặt">
                                                                <input type="date" name="thoi_gian" {{ request()->thoi_gian }} 
                                                                    value= "{{ request()->thoi_gian }}" class="form-control" style="width: 120px;"
                                                                    placeholder="Ngày đặt" onchange="submitFunction()"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>

                                                <div class="mx-2">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Export Excel">
                                                        <a class="btn btn-danger btn-lg" href="purchase_order/export/all">
                                                            <i class="bi bi-download "></i>
                                                        </a>
                                                    </div>
                                                </div>

                                                @if (session('user')['role_id'] == '1')
                                                    <div class="action_export order-md-4" data-bs-toggle="tooltip"
                                                        data-bs-placement="bottom" title="Thêm đơn đặt hàng">
                                                        <button class="btn btn-danger d-block testCreateUser"
                                                            data-bs-toggle="modal" data-bs-target="#addDonHang">Thêm
                                                        </button>
                                                    </div>
                                                @endif

                                            </div>

                                            <form id="select-form" action="{{ route('PurchaseOrder.delete') }}" method="POST">
                                                @csrf
                                                <div class="action_export mx-3 order-md-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Xóa"
                                                    style="position: absolute; top: 10px; left: 0;">
                                                    <button class="btn btn-danger  " type="submit"
                                                        onclick="return confirm('Bạn có muốn xóa không?')"
                                                        id="delete-selected-button" style="display: none;">Xóa</button>
                                                </div><br>
                                                <div class="table-responsive">

                                                    <table id="dsNhaCungCap" style="width: 150%;"
                                                        class="table table-responsive table-hover table-bordered filter">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-nowrap text-center" style="width:1%"><input
                                                                        type="checkbox" id="select-all"></th>
                                                                <th class="text-nowrap text-center" style="width:2%">
                                                                    STT
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:10%">
                                                                    Người đặt
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:8%">
                                                                    Trạng thái
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:8%">
                                                                    Mã phiếu
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:8%">
                                                                    Mã KH
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:15%">
                                                                    Tên KH
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:15%">
                                                                    Địa chỉ
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:8%">
                                                                    Ngày đặt
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:10%">
                                                                    Tổng tiền
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:20%">
                                                                    Ghi chú
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:8%">
                                                                    Người sửa
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:8%">
                                                                    Ngày sửa
                                                                </th>
                                                                @if (session('user')['role_id'] == '1')
                                                                    <th class="text-nowrap text-center"
                                                                        style="width:1%; background: #fff; position: sticky; right: 0;">
                                                                        <span>Hành
                                                                            động</span>
                                                                    </th>
                                                                @endif
                                                            </tr>
                                                        </thead>                                                        
                                                        <tbody>                                                                                                              
                                                        @foreach ($purchaseOrderList as $item)
                                                            <tr style="{{ getStatusBg($item->status) }}">
                                                                <td class="text-nowrap text-center">
                                                                    <input type="checkbox" name="selected_items[]"
                                                                        value="{{ $item->id }}">
                                                                </td>

                                                                <td>
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="" class="text-nowrap text-center">
                                                                        {{ $purchaseOrderList->total() - $loop->index - ($purchaseOrderList->currentPage() - 1) * $purchaseOrderList->perPage() }}
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Người đặt"
                                                                        class="text-nowrap text-center">
                                                                        {{ $item->orderStaff->name ?? ''}}
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Trạng thái"
                                                                        class="text-nowrap text-center">
                                                                        @switch($item->status)
                                                                            @case(0)
                                                                                <span class="fs-5">Đã tạo</span>
                                                                            @break

                                                                            @case(1)
                                                                                <span class="fs-5">Chờ duyệt</span>
                                                                            @break

                                                                            @case(2)
                                                                                <span class="fs-5">Đã duyệt</span>
                                                                            @break

                                                                            @case(3)
                                                                                <span class="fs-5">Đã xuất hàng</span>
                                                                            @break

                                                                            @case(4)
                                                                                <span class="fs-5">Đã giao hàng</span>
                                                                            @break

                                                                            @case(-1)
                                                                                <span class="fs-5">Từ chối</span>
                                                                            @break

                                                                            @default
                                                                                <span></span>
                                                                            @break
                                                                        @endswitch
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ $item->code }}" class="text-nowrap text-center">
                                                                        <a style="color: black; text-decoration: underline"
                                                                            href="{{ route('PurchaseOrder.show', $item->id) }}">{{ $item->code }}</a>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ $item->customer->code ?? '' }}" class="text-nowrap text-center">
                                                                        {{ $item->customer->code ?? '' }}
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ $item->customer->name ?? '' }}" class="text-nowrap text-center">
                                                                        <a style="color: black; text-decoration: underline"
                                                                            href="{{ route('customer-detail.list', $item->customer->id) }}">
                                                                            {{ $item->customer->name ?? '' }}</a>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ $item->customer->address ?? '' }}" class="text-nowrap text-center">
                                                                        {{ $item->customer->address ?? '' }}
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ date('d/m/Y', strtotime($item->created_at)) }}" class="text-nowrap text-center">
                                                                        {{ date('d/m/Y', strtotime($item->created_at)) }}
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ $item->total_money ?? '' }}" class="text-nowrap text-center">
                                                                        {{ $item->total_money ?? '' }}
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ $item->description }}" class="text-nowrap text-center">
                                                                        {{ $item->description }}
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ $item->editStaff->name ?? '' }}" class="text-nowrap text-center">
                                                                        {{ $item->editStaff->name ?? '' }}
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ date('d/m/Y', strtotime($item->updated_at)) }}" class="text-nowrap text-center">
                                                                        {{ date('d/m/Y', strtotime($item->updated_at)) }}
                                                                    </div>
                                                                </td>
                                                                
                                                                <td style="background: #fff; position: sticky; right: 0;">
                                                                    <div
                                                                        class="table_actions d-flex justify-content-center">
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Sửa ">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#suaDonHang{{ $item->id }}">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/edit.svg') }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Xóa">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#xoaDonHang{{ $item->id }}">
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
                                                    {{-- <nav aria-label="Page navigation example" class="float-end mt-3"
                                                        id="target-pagination">
                                                        <ul class="pagination">
                                                            {{ $departmentList->appends([
                                                                    'search' => $search,
                                                                ])->links() }}
                                                        </ul>
                                                    </nav> --}}
                                                </div>
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
    @include('template.sidebar.sidebarMaster.sidebarRight')

    @foreach ($purchaseOrderList as $item)
    {{-- Sửa đơn hàng --}}
    <div class="modal fade" id="suaDonHang{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Sửa đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('PurchaseOrder.update', $item->id) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chọn nhóm">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Chọn nhóm" data-select-all-text="Chọn nhóm"
                                        data-deselect-all-text="Bỏ chọn" data-size="3" name="group_id"
                                        data-live-search-placeholder="Tìm kiếm...">
                                        @foreach ($listGroups as $group)
                                            @if ($item->group_id == $group->id)
                                            <option value="{{ $group->id }}" selected>{{ $group->name }}</option>
                                            @else
                                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endif
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chọn nhân viên đặt">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Chọn nhân viên đặt"
                                        data-select-all-text="Chọn nhân viên đặt" data-deselect-all-text="Bỏ chọn"
                                        data-size="3" name="order_staff" data-live-search-placeholder="Tìm kiếm...">
                                        @foreach ($listUsers as $user)
                                            @if ($item->order_staff == $user->id)
                                            <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                            @else
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endif
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chọn tuyến">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Chọn tuyến" data-select-all-text="Chọn tuyến"
                                        data-deselect-all-text="Bỏ chọn" data-size="3" name="route_direction"
                                        data-live-search-placeholder="Tìm kiếm...">
                                        @foreach ($listRouteDirections as $route)
                                            @if ($item->route_direction == $route->id)
                                            <option value="{{ $route->id }}" selected>{{ $route->name }}</option>
                                            @else
                                                <option value="{{ $route->id }}">{{ $route->name }}</option>
                                            @endif
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chọn khách hàng">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Chọn khách hàng"
                                        data-select-all-text="Chọn khách hàng" data-deselect-all-text="Bỏ chọn"
                                        data-size="3" name="customer_id" data-live-search-placeholder="Tìm kiếm...">
                                        @foreach ($listCustomers as $customer)
                                            @if ($item->customer_id == $customer->id)
                                            <option value="{{ $customer->id }}" selected>{{ $customer->name }}</option>
                                            @else
                                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                            @endif
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Diễn giải">
                                    <input type="text" class="form-control" placeholder="Diễn giải" name="description"
                                        value="{{ $item->description }}" />
                                    <input type="hidden" name="edit_order" value="{{ session('user')['id'] }}">
                                </div>
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

    {{-- Xóa đơn hàng --}}
    <div class="modal fade" id="xoaDonHang{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Xóa đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có thực sự muốn xoá đơn hàng này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                    <form action="{{ route('PurchaseOrder.destroy', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Thêm đơn đặt hàng -->
    <div class="modal fade" id="addDonHang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 class="modal-title w-100" id="exampleModalLabel">Thêm đơn đặt hàng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addForm" action="{{ route('PurchaseOrder.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chọn nhóm">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Chọn nhóm*" data-select-all-text="Chọn nhóm*"
                                        data-deselect-all-text="Bỏ chọn" data-size="3" name="group_id"
                                        data-live-search-placeholder="Tìm kiếm..." required>
                                            @foreach ($listGroups as $group)
                                                <option value="{{ $group->id }}">{{ $group->name }}
                                                </option>
                                            @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chọn nhân viên đặt">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Chọn nhân viên đặt*"
                                        data-select-all-text="Chọn nhân viên đặt*" data-deselect-all-text="Bỏ chọn"
                                        data-size="3" name="order_staff" data-live-search-placeholder="Tìm kiếm..." required>
                                            @foreach ($listUsers as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}
                                                </option>
                                            @endforeach                                       
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chọn tuyến*">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Chọn tuyến*" data-select-all-text="Chọn tuyến"
                                        data-deselect-all-text="Bỏ chọn" data-size="3" name="route_direction"
                                        data-live-search-placeholder="Tìm kiếm..." required>
                                            @foreach ($listRouteDirections as $route)
                                                <option value="{{ $route->id }}">{{ $route->name }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chọn khách hàng*">
                                    <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                        data-live-search="true" title="Chọn khách hàng*"
                                        data-select-all-text="Chọn khách hàng*" data-deselect-all-text="Bỏ chọn"
                                        data-size="3" name="customer_id" data-live-search-placeholder="Tìm kiếm..." required>
                                            @foreach ($listCustomers as $customer)
                                                <option value="{{ $customer->id }}">{{ $customer->name }}
                                                </option>
                                            @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Diễn giải">
                                    <input type="text" name="description" class="form-control" placeholder="Diễn giải"/>
                                    <input type="hidden" name="code" value="BH_{{ time() }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger me-3" data-bs-dismiss="modal">Hủy</button>
                        <button id="loadingBtn" style="display: none;" class="btn btn-danger" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                        <button id="submitBtn" type="submit" class="btn btn-danger">Lưu</button>
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
        document.addEventListener("DOMContentLoaded", function() {

            let specCount = 0;
            let rowData = []

            function generateUniqueIDs(specCount) {
                const uniqueIDs = {
                    selectCodeProduct: `selectCodeProduct_${specCount}`,
                    nameProduct: `nameProduct_${specCount}`,
                    soLuong: `soLuong_${specCount}`,
                    donGia: `donGia_${specCount}`,
                    tiLeCK: `tiLeCK_${specCount}`,
                    CK: `CK_${specCount}`,
                    tienTruocThue: `tienTruocThue_${specCount}`,
                    thueSuat: `thueSuat_${specCount}`,
                    tienThue: `tienThue_${specCount}`,
                    tienSauThue: `tienSauThue_${specCount}`,
                    tongGia: `tongGia_${specCount}`,
                };
                return uniqueIDs;
            }

            function createSpecificationRow() {
                const newSpecDiv = document.createElement("tr");
                const uniqueIDs = generateUniqueIDs(specCount);

                newSpecDiv.innerHTML = `
            <td class="text-center">
                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Mã sản phẩm">
                                                <select class="selectpicker" data-dropup-auto="false"
                                                    data-width="100%" data-live-search="true"
                                                    title="Chọn mã sản phẩm" data-select-all-text="Mã sản phẩm"
                                                    data-deselect-all-text="Bỏ chọn" data-size="3"
                                                    name="data[${specCount}][key1]" data-live-search-placeholder="Tìm kiếm..."
                                                    id="selectCodeProduct_${specCount}">
                                                    <option value="Xe điện GODLF">GODLF
                                                    </option>
                                                    <option value="Xe máy XSR155">XSR155
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <input id="nameProduct_${specCount}" class="form-control" disabled>
                                        </td>
                                        <td>
                                                <input type="date" class="form-control" name="data[${specCount}][key2]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key3]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[${specCount}][key4]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key5]"
                                                    id="soLuong_${specCount}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key6]"
                                                    id="donGia_${specCount}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key7]"
                                                    id="tongGia_${specCount}" disabled>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key8]"
                                                    id="tiLeCK_${specCount}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key9]"
                                                    id="CK_${specCount}" disabled>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key10]"
                                                    id="tienTruocThue_${specCount}" disabled>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key11]"
                                                    id="thueSuat_${specCount}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key12]"
                                                    id="tienThue_${specCount}" disabled>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key13]"
                                                    id="tienSauThue_${specCount}" disabled>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[${specCount}][key14]">
                                            </td>
                                        <td class="text-center">
                                            <i class="bi bi-trash fs-3 remove-spec"
                                                style="color: var(--primary-color);cursor: pointer;"></i>
                                        </td>
`;

                newSpecDiv.querySelector(`#selectCodeProduct_${specCount}`).id = uniqueIDs.selectCodeProduct;
                newSpecDiv.querySelector(`#nameProduct_${specCount}`).id = uniqueIDs.nameProduct;
                newSpecDiv.querySelector(`#soLuong_${specCount}`).id = uniqueIDs.soLuong;
                newSpecDiv.querySelector(`#donGia_${specCount}`).id = uniqueIDs.donGia;
                newSpecDiv.querySelector(`#tiLeCK_${specCount}`).id = uniqueIDs.tiLeCK;
                newSpecDiv.querySelector(`#CK_${specCount}`).id = uniqueIDs.CK;
                newSpecDiv.querySelector(`#tienTruocThue_${specCount}`).id = uniqueIDs.tienTruocThue;
                newSpecDiv.querySelector(`#thueSuat_${specCount}`).id = uniqueIDs.thueSuat;
                newSpecDiv.querySelector(`#tienThue_${specCount}`).id = uniqueIDs.tienThue;
                newSpecDiv.querySelector(`#tienSauThue_${specCount}`).id = uniqueIDs.tienSauThue;
                newSpecDiv.querySelector(`#tongGia_${specCount}`).id = uniqueIDs.tongGia;

                const newRowData = {
                    selectCodeProduct: uniqueIDs.selectCodeProduct,
                    nameProduct: uniqueIDs.nameProduct,
                    soLuong: uniqueIDs.soLuong,
                    donGia: uniqueIDs.donGia,
                    tiLeCK: uniqueIDs.tiLeCK,
                    CK: uniqueIDs.CK,
                    tienTruocThue: uniqueIDs.tienTruocThue,
                    thueSuat: uniqueIDs.thueSuat,
                    tienThue: uniqueIDs.tienThue,
                    tienSauThue: uniqueIDs.tienSauThue,
                    tongGia: uniqueIDs.tongGia
                };
                rowData.push(newRowData);

                return newSpecDiv;
            }

            function calculateTotal() {
                const soLuong = parseFloat(soLuongInput.value);
                const donGia = parseFloat(donGiaInput.value);
                const tongGia = soLuong * donGia;
                if (!isNaN(tongGia)) {
                    tongGiaInput.value = tongGia;
                } else {
                    tongGiaInput.value = "";
                }

                calculateCK();
                calculateTienTruocThue();
                calculateTienThue();
                calculateTienSauThue();
            }

            function calculateCK() {
                const tongGia = parseFloat(tongGiaInput.value);
                const tiLeCK = parseFloat(tiLeCKInput.value);
                const chiKhau = (tongGia * (tiLeCK / 100)) || 0;

                if (!isNaN(chiKhau)) {
                    CKInput.value = chiKhau;
                } else {
                    CKInput.value = "";
                }
                calculateTienTruocThue();
                calculateTienThue();
                calculateTienSauThue();
            }

            function calculateTienTruocThue() {
                const tongGia = parseFloat(tongGiaInput.value);
                const chiKhau = parseFloat(CKInput.value);
                const tienTruocThue = tongGia - chiKhau;
                if (!isNaN(tienTruocThue)) {
                    tienTruocThueInput.value = tienTruocThue;
                } else {
                    tienTruocThueInput.value = "";
                }
                calculateTienThue();
                calculateTienSauThue();
            }

            function calculateTienThue() {
                const tienTruocThue = parseFloat(tienTruocThueInput.value);
                const thueSuat = parseFloat(thueSuatInput.value);
                const tienThue = (tienTruocThue * (thueSuat / 100)) || "";
                tienThueInput.value = tienThue;

                calculateTienSauThue();
            }

            function calculateTienSauThue() {
                const tienThue = parseFloat(tienThueInput.value);
                const tienSauThue = tienThue + parseFloat(tienTruocThueInput.value);
                tienSauThueInput.value = tienSauThue;
            }

            function calculateSum() {
                let sumTienHang = 0;
                let sumTienChietKhau = 0;
                let sumTienTruocThue = 0;
                let sumTienThue = 0;
                let sumTienSauThue = 0;

                rowData.forEach(data => {

                    const tongGia = parseFloat(document.querySelector(`#${data.tongGia}`).value) || 0;
                    const chiKhau = parseFloat(document.querySelector(`#${data.CK}`).value) || 0;
                    const tienTruocThue = parseFloat(document.querySelector(`#${data.tienTruocThue}`)
                        .value) || 0;
                    const tienThue = parseFloat(document.querySelector(`#${data.tienThue}`).value) || 0;
                    const tienSauThue = parseFloat(document.querySelector(`#${data.tienSauThue}`).value) ||
                        0;

                    sumTienHang += tongGia;
                    sumTienChietKhau += chiKhau;
                    sumTienTruocThue += tienTruocThue;
                    sumTienThue += tienThue;
                    sumTienSauThue += tienSauThue;
                });

                document.getElementById("sumTienHang").textContent = sumTienHang;
                document.getElementById("sumTienChietKhau").textContent = sumTienChietKhau;
                document.getElementById("sumTienTruocThue").textContent = sumTienTruocThue;
                document.getElementById("sumTienThue").textContent = sumTienThue;
                document.getElementById("sumThanhToan").textContent = sumTienSauThue;
            }

            if (specCount === 0) {
                document.getElementById("specifications").appendChild(createSpecificationRow());
                specCount++;
            }

            const addSpecIcons = document.querySelectorAll(".add-spec");

            addSpecIcons.forEach(icon => {
                icon.addEventListener("click", function() {
                    const newSpecDiv = createSpecificationRow();

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
                        nameProductSpan.value = selectedValues.join(", ");
                    });

                    // Xử lý tính thuế các trường render ra
                    const soLuongInput = newSpecDiv.querySelector(`#soLuong_${specCount}`);
                    const donGiaInput = newSpecDiv.querySelector(`#donGia_${specCount}`);
                    const tongGiaInput = newSpecDiv.querySelector(`#tongGia_${specCount}`);
                    const tiLeCKInput = newSpecDiv.querySelector(`#tiLeCK_${specCount}`);
                    const CKInput = newSpecDiv.querySelector(`#CK_${specCount}`);
                    const tienTruocThueInput = newSpecDiv.querySelector(
                        `#tienTruocThue_${specCount}`);
                    const thueSuatInput = newSpecDiv.querySelector(`#thueSuat_${specCount}`);
                    const tienThueInput = newSpecDiv.querySelector(`#tienThue_${specCount}`);
                    const tienSauThueInput = newSpecDiv.querySelector(`#tienSauThue_${specCount}`);

                    soLuongInput.addEventListener("input", calculateTotal);
                    donGiaInput.addEventListener("input", calculateTotal);

                    tiLeCKInput.addEventListener("input", calculateCK);
                    tongGiaInput.addEventListener("input", calculateCK);

                    CKInput.addEventListener("input", calculateTienTruocThue);
                    tienTruocThueInput.addEventListener("input", calculateTienTruocThue);

                    tienTruocThueInput.addEventListener("input", calculateTienThue);
                    thueSuatInput.addEventListener("input", calculateTienThue);

                    tienThueInput.addEventListener("input", calculateTienSauThue);

                    function calculateTotal() {
                        const soLuong = parseFloat(soLuongInput.value);
                        const donGia = parseFloat(donGiaInput.value);
                        const tongGia = soLuong * donGia;
                        if (!isNaN(tongGia)) {
                            tongGiaInput.value = tongGia;
                        } else {
                            tongGiaInput.value = "";
                        }

                        calculateCK();
                        calculateTienTruocThue();
                        calculateTienThue();
                        calculateTienSauThue();
                    }

                    function calculateCK() {
                        const tongGia = parseFloat(tongGiaInput.value);
                        const tiLeCK = parseFloat(tiLeCKInput.value);
                        const chiKhau = (tongGia * (tiLeCK / 100)) || 0;

                        if (!isNaN(chiKhau)) {
                            CKInput.value = chiKhau;
                        } else {
                            CKInput.value = "";
                        }
                        calculateTienTruocThue();
                        calculateTienThue();
                        calculateTienSauThue();
                    }

                    function calculateTienTruocThue() {
                        const tongGia = parseFloat(tongGiaInput.value);
                        const chiKhau = parseFloat(CKInput.value);
                        const tienTruocThue = tongGia - chiKhau;
                        if (!isNaN(tienTruocThue)) {
                            tienTruocThueInput.value = tienTruocThue;
                        } else {
                            tienTruocThueInput.value = "";
                        }
                        calculateTienThue();
                        calculateTienSauThue();
                    }

                    function calculateTienThue() {
                        const tienTruocThue = parseFloat(tienTruocThueInput.value);
                        const thueSuat = parseFloat(thueSuatInput.value);
                        const tienThue = (tienTruocThue * (thueSuat / 100)) || "";
                        tienThueInput.value = tienThue;

                        calculateTienSauThue();
                    }

                    function calculateTienSauThue() {
                        const tienThue = parseFloat(tienThueInput.value);
                        const tienSauThue = tienThue + parseFloat(tienTruocThueInput.value);
                        tienSauThueInput.value = tienSauThue;
                    }

                    function calculateSum() {
                        let sumTienHang = 0;
                        let sumTienChietKhau = 0;
                        let sumTienTruocThue = 0;
                        let sumTienThue = 0;
                        let sumTienSauThue = 0;

                        rowData.forEach(data => {

                            const tongGia = parseFloat(document.querySelector(
                                `#${data.tongGia}`).value) || 0;
                            const chiKhau = parseFloat(document.querySelector(`#${data.CK}`)
                                .value) || 0;
                            const tienTruocThue = parseFloat(document.querySelector(
                                    `#${data.tienTruocThue}`)
                                .value) || 0;
                            const tienThue = parseFloat(document.querySelector(
                                `#${data.tienThue}`).value) || 0;
                            const tienSauThue = parseFloat(document.querySelector(
                                    `#${data.tienSauThue}`).value) ||
                                0;

                            sumTienHang += tongGia;
                            sumTienChietKhau += chiKhau;
                            sumTienTruocThue += tienTruocThue;
                            sumTienThue += tienThue;
                            sumTienSauThue += tienSauThue;
                        });

                        document.getElementById("sumTienHang").textContent = sumTienHang;
                        document.getElementById("sumTienChietKhau").textContent = sumTienChietKhau;
                        document.getElementById("sumTienTruocThue").textContent = sumTienTruocThue;
                        document.getElementById("sumTienThue").textContent = sumTienThue;
                        document.getElementById("sumThanhToan").textContent = sumTienSauThue;
                    }

                    const removeSpecIcons = document.querySelectorAll(".remove-spec");

                    removeSpecIcons.forEach(removeIcon => {
                        removeIcon.addEventListener("click", function() {
                            const parentRow = removeIcon.closest("tr");
                            const removedSpecCount = parseInt(parentRow
                                .querySelector('.selectpicker').id.split('_')[1]
                            );
                            parentRow.remove();
                            rowData = rowData.filter(data => data
                                .selectCodeProduct !==
                                `selectCodeProduct_${removedSpecCount}`);

                            calculateSum();
                            specCount--;
                        });
                    });

                    specCount++;

                    const specifications = document.getElementById('specifications');

                    const inputs = specifications.querySelectorAll('input');

                    inputs.forEach(input => input.addEventListener('input', calculateSum));

                    calculateSum();
                });

            });

            const selectCodeProduct_0 = document.querySelector("#selectCodeProduct_0");
            const nameProductSpan_0 = document.querySelector("#nameProduct_0");

            selectCodeProduct_0.addEventListener("change", function() {
                const selectedOptions = Array.from(selectCodeProduct_0.selectedOptions);
                const selectedValues = selectedOptions.map(option => option.value);
                nameProductSpan_0.value = selectedValues.join(", ");
            });


            // Xử lý tính thuế ô mặc định
            const soLuongInput = document.querySelector(`#soLuong_0`);
            const donGiaInput = document.querySelector(`#donGia_0`);
            const tongGiaInput = document.querySelector(`#tongGia_0`);
            const tiLeCKInput = document.querySelector(`#tiLeCK_0`);
            const CKInput = document.querySelector(`#CK_0`);
            const tienTruocThueInput = document.querySelector(
                `#tienTruocThue_0`);
            const thueSuatInput = document.querySelector(`#thueSuat_0`);
            const tienThueInput = document.querySelector(`#tienThue_0`);
            const tienSauThueInput = document.querySelector(`#tienSauThue_0`);

            const inputs = specifications.querySelectorAll('input');

            soLuongInput.addEventListener("input", calculateTotal);
            donGiaInput.addEventListener("input", calculateTotal);
            tiLeCKInput.addEventListener("input", calculateCK);
            tongGiaInput.addEventListener("input", calculateCK);
            CKInput.addEventListener("input", calculateTienTruocThue);
            tienTruocThueInput.addEventListener("input", calculateTienTruocThue);
            tienTruocThueInput.addEventListener("input", calculateTienThue);
            thueSuatInput.addEventListener("input", calculateTienThue);
            tienThueInput.addEventListener("input", calculateTienSauThue);
            inputs.forEach(input => input.addEventListener('input', calculateSum));

            // Tính tổng
            calculateSum();
        });
    </script>

    {{-- Xử lý modal sửa --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const rows = document.querySelectorAll("#specifications_edit tr");
            let specCount = rows.length;

            const specifications = document.getElementById('specifications_edit');

            const rowData = Array.from(rows);

            function updateSelectedValues(selectId, spanId) {
                const selectedOptions = Array.from(document.querySelectorAll(`#${selectId} option:checked`));
                const selectedValues = selectedOptions.map(option => option.value);
                const spanElement = document.querySelector(`#${spanId}`);
                spanElement.value = selectedValues.join(", ");
            }

            rows.forEach((row, index) => {
                updateSelectedValues(`selectCodeProductEdit_${index}`, `nameProductEdit_${index}`);
                const selectCodeProduct_0 = document.querySelector(`#selectCodeProductEdit_${index}`);
                const nameProductSpan_0 = document.querySelector(`#nameProductEdit_${index}`);

                selectCodeProduct_0.addEventListener("change", function() {
                    const selectedOptions = Array.from(selectCodeProduct_0.selectedOptions);
                    const selectedValues = selectedOptions.map(option => option.value);
                    nameProductSpan_0.value = selectedValues.join(", ");
                });

                // Xử lý tính thuế ô mặc định
                const soLuongInput = document.querySelector(`#soLuongEdit_${index}`);
                const donGiaInput = document.querySelector(`#donGiaEdit_${index}`);
                const tongGiaInput = document.querySelector(`#tongGiaEdit_${index}`);
                const tiLeCKInput = document.querySelector(`#tiLeCKEdit_${index}`);
                const CKInput = document.querySelector(`#CKEdit_${index}`);
                const tienTruocThueInput = document.querySelector(
                    `#tienTruocThueEdit_${index}`);
                const thueSuatInput = document.querySelector(`#thueSuatEdit_${index}`);
                const tienThueInput = document.querySelector(`#tienThueEdit_${index}`);
                const tienSauThueInput = document.querySelector(`#tienSauThueEdit_0`);
                const inputs = specifications.querySelectorAll('input');

                soLuongInput.addEventListener("input", calculateTotal);
                donGiaInput.addEventListener("input", calculateTotal);
                tiLeCKInput.addEventListener("input", calculateCK);
                tongGiaInput.addEventListener("input", calculateCK);
                CKInput.addEventListener("input", calculateTienTruocThue);
                tienTruocThueInput.addEventListener("input", calculateTienTruocThue);
                tienTruocThueInput.addEventListener("input", calculateTienThue);
                thueSuatInput.addEventListener("input", calculateTienThue);
                tienThueInput.addEventListener("input", calculateTienSauThue);
                inputs.forEach(input => input.addEventListener('input', calculateSumEdit));

                function calculateTotal() {
                    const soLuong = parseFloat(soLuongInput.value);
                    const donGia = parseFloat(donGiaInput.value);
                    const tongGia = soLuong * donGia;
                    if (!isNaN(tongGia)) {
                        tongGiaInput.value = tongGia;
                    } else {
                        tongGiaInput.value = "";
                    }

                    calculateCK();
                    calculateTienTruocThue();
                    calculateTienThue();
                    calculateTienSauThue();
                }

                function calculateCK() {
                    const tongGia = parseFloat(tongGiaInput.value);
                    const tiLeCK = parseFloat(tiLeCKInput.value);
                    const chiKhau = (tongGia * (tiLeCK / 100)) || 0;

                    if (!isNaN(chiKhau)) {
                        CKInput.value = chiKhau;
                    } else {
                        CKInput.value = "";
                    }
                    calculateTienTruocThue();
                    calculateTienThue();
                    calculateTienSauThue();
                }

                function calculateTienTruocThue() {
                    const tongGia = parseFloat(tongGiaInput.value);
                    const chiKhau = parseFloat(CKInput.value);
                    const tienTruocThue = tongGia - chiKhau;
                    if (!isNaN(tienTruocThue)) {
                        tienTruocThueInput.value = tienTruocThue;
                    } else {
                        tienTruocThueInput.value = "";
                    }
                    calculateTienThue();
                    calculateTienSauThue();
                }

                function calculateTienThue() {
                    const tienTruocThue = parseFloat(tienTruocThueInput.value);
                    const thueSuat = parseFloat(thueSuatInput.value);
                    const tienThue = (tienTruocThue * (thueSuat / 100)) || "";
                    tienThueInput.value = tienThue;

                    calculateTienSauThue();
                }

                function calculateTienSauThue() {
                    const tienThue = parseFloat(tienThueInput.value);
                    const tienSauThue = tienThue + parseFloat(tienTruocThueInput.value);
                    tienSauThueInput.value = tienSauThue;
                }
                calculateSumEdit()
            });


            function calculateSumEdit() {

                let sumTienHang = 0;
                let sumTienChietKhau = 0;
                let sumTienTruocThue = 0;
                let sumTienThue = 0;
                let sumThanhToan = 0;

                rowData.forEach((row, index) => {

                    const tongGia = parseFloat(row.querySelector(`#tongGiaEdit_${index}`).value) || 0;
                    const chiKhau = parseFloat(row.querySelector(`#CKEdit_${index}`).value) || 0;
                    const tienTruocThue = parseFloat(row.querySelector(`#tienTruocThueEdit_${index}`)
                        .value) || 0;
                    const tienThue = parseFloat(row.querySelector(`#tienThueEdit_${index}`).value) || 0;
                    const tienSauThue = parseFloat(row.querySelector(`#tienSauThueEdit_${index}`)
                            .value) ||
                        0;


                    sumTienHang += tongGia;
                    sumTienChietKhau += chiKhau;
                    sumTienTruocThue += tienTruocThue;
                    sumTienThue += tienThue;
                    sumThanhToan += tienSauThue;
                });

                document.getElementById("sumTienHangEdit").textContent = sumTienHang;
                document.getElementById("sumTienChietKhauEdit").textContent = sumTienChietKhau;
                document.getElementById("sumTienTruocThueEdit").textContent = sumTienTruocThue;
                document.getElementById("sumTienThueEdit").textContent = sumTienThue;
                document.getElementById("sumThanhToanEdit").textContent = sumThanhToan;
            }

            function generateUniqueIDs(specCount) {
                const uniqueIDs = {
                    selectCodeProduct: `selectCodeProductEdit_${specCount}`,
                    nameProduct: `nameProductEdit_${specCount}`,
                    soLuong: `soLuongEdit_${specCount}`,
                    donGia: `donGiaEdit_${specCount}`,
                    tiLeCK: `tiLeCKEdit_${specCount}`,
                    CK: `CKEdit_${specCount}`,
                    tienTruocThue: `tienTruocThueEdit_${specCount}`,
                    thueSuat: `thueSuatEdit_${specCount}`,
                    tienThue: `tienThueEdit_${specCount}`,
                    tienSauThue: `tienSauThueEdit_${specCount}`,
                    tongGia: `tongGiaEdit_${specCount}`,
                };
                return uniqueIDs;
            }

            function createSpecificationRow() {
                const newSpecDiv = document.createElement("tr");
                const uniqueIDs = generateUniqueIDs(specCount);
                newSpecDiv.innerHTML = ` <td class="text-center">
                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Mã sản phẩm">
                                                <select class="selectpicker" data-dropup-auto="false"
                                                    data-width="100%" data-live-search="true"
                                                    title="Chọn mã sản phẩm" data-select-all-text="Mã sản phẩm"
                                                    data-deselect-all-text="Bỏ chọn" data-size="3"
                                                    name="data[${specCount}][key1]" data-live-search-placeholder="Tìm kiếm..."
                                                    id="selectCodeProductEdit_${specCount}">
                                                    <option value="Xe điện GODLF">GODLF
                                                    </option>
                                                    <option value="Xe máy XSR155">XSR155
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <input id="nameProductEdit_${specCount}" class="form-control" disabled>
                                        </td>
                                        <td>
                                                <input type="date" class="form-control" name="data[${specCount}][key2]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key3]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[${specCount}][key4]">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key5]"
                                                    id="soLuongEdit_${specCount}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key6]"
                                                    id="donGiaEdit_${specCount}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key7]"
                                                    id="tongGiaEdit_${specCount}" disabled>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key8]"
                                                    id="tiLeCKEdit_${specCount}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key9]"
                                                    id="CKEdit_${specCount}" disabled>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key10]"
                                                    id="tienTruocThueEdit_${specCount}" disabled>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key11]"
                                                    id="thueSuatEdit_${specCount}">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key12]"
                                                    id="tienThueEdit_${specCount}" disabled>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="data[${specCount}][key13]"
                                                    id="tienSauThueEdit_${specCount}" disabled>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="data[${specCount}][key14]">
                                            </td>
                                        <td class="text-center">
                                            <i class="bi bi-trash fs-3 remove-spec_edit"
                                                style="color: var(--primary-color);cursor: pointer;"></i>
                                        </td>`;

                newSpecDiv.querySelector(`#selectCodeProductEdit_${specCount}`).id = uniqueIDs.selectCodeProduct;
                newSpecDiv.querySelector(`#nameProductEdit_${specCount}`).id = uniqueIDs.nameProduct;
                newSpecDiv.querySelector(`#soLuongEdit_${specCount}`).id = uniqueIDs.soLuong;
                newSpecDiv.querySelector(`#donGiaEdit_${specCount}`).id = uniqueIDs.donGia;
                newSpecDiv.querySelector(`#tiLeCKEdit_${specCount}`).id = uniqueIDs.tiLeCK;
                newSpecDiv.querySelector(`#CKEdit_${specCount}`).id = uniqueIDs.CK;
                newSpecDiv.querySelector(`#tienTruocThueEdit_${specCount}`).id = uniqueIDs.tienTruocThue;
                newSpecDiv.querySelector(`#thueSuatEdit_${specCount}`).id = uniqueIDs.thueSuat;
                newSpecDiv.querySelector(`#tienThueEdit_${specCount}`).id = uniqueIDs.tienThue;
                newSpecDiv.querySelector(`#tienSauThueEdit_${specCount}`).id = uniqueIDs.tienSauThue;
                newSpecDiv.querySelector(`#tongGiaEdit_${specCount}`).id = uniqueIDs.tongGia;

                const newRowData = {
                    selectCodeProduct: uniqueIDs.selectCodeProduct,
                    nameProduct: uniqueIDs.nameProduct,
                    soLuong: uniqueIDs.soLuong,
                    donGia: uniqueIDs.donGia,
                    tiLeCK: uniqueIDs.tiLeCK,
                    CK: uniqueIDs.CK,
                    tienTruocThue: uniqueIDs.tienTruocThue,
                    thueSuat: uniqueIDs.thueSuat,
                    tienThue: uniqueIDs.tienThue,
                    tienSauThue: uniqueIDs.tienSauThue,
                    tongGia: uniqueIDs.tongGia
                };
                return newSpecDiv;
            }

            const addSpecIcons = document.querySelectorAll(".add-spec_edit");
            addSpecIcons.forEach(icon => {
                icon.addEventListener("click", function() {
                    const newSpecDiv = createSpecificationRow();
                    rowData.push(newSpecDiv);
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
                        nameProductSpan.value = selectedValues.join(", ");
                    });

                    // Xử lý tính thuế các trường render ra
                    const soLuongInput = newSpecDiv.querySelector(`#soLuongEdit_${specCount}`);
                    const donGiaInput = newSpecDiv.querySelector(`#donGiaEdit_${specCount}`);
                    const tongGiaInput = newSpecDiv.querySelector(`#tongGiaEdit_${specCount}`);
                    const tiLeCKInput = newSpecDiv.querySelector(`#tiLeCKEdit_${specCount}`);
                    const CKInput = newSpecDiv.querySelector(`#CKEdit_${specCount}`);
                    const tienTruocThueInput = newSpecDiv.querySelector(
                        `#tienTruocThueEdit_${specCount}`);
                    const thueSuatInput = newSpecDiv.querySelector(`#thueSuatEdit_${specCount}`);
                    const tienThueInput = newSpecDiv.querySelector(`#tienThueEdit_${specCount}`);
                    const tienSauThueInput = newSpecDiv.querySelector(
                        `#tienSauThueEdit_${specCount}`);

                    soLuongInput.addEventListener("input", calculateTotal);
                    donGiaInput.addEventListener("input", calculateTotal);

                    tiLeCKInput.addEventListener("input", calculateCK);
                    tongGiaInput.addEventListener("input", calculateCK);

                    CKInput.addEventListener("input", calculateTienTruocThue);
                    tienTruocThueInput.addEventListener("input", calculateTienTruocThue);

                    tienTruocThueInput.addEventListener("input", calculateTienThue);
                    thueSuatInput.addEventListener("input", calculateTienThue);

                    tienThueInput.addEventListener("input", calculateTienSauThue);

                    function calculateTotal() {
                        const soLuong = parseFloat(soLuongInput.value);
                        const donGia = parseFloat(donGiaInput.value);
                        const tongGia = soLuong * donGia;
                        if (!isNaN(tongGia)) {
                            tongGiaInput.value = tongGia;
                        } else {
                            tongGiaInput.value = "";
                        }

                        calculateCK();
                        calculateTienTruocThue();
                        calculateTienThue();
                        calculateTienSauThue();
                    }

                    function calculateCK() {
                        const tongGia = parseFloat(tongGiaInput.value);
                        const tiLeCK = parseFloat(tiLeCKInput.value);
                        const chiKhau = (tongGia * (tiLeCK / 100)) || 0;

                        if (!isNaN(chiKhau)) {
                            CKInput.value = chiKhau;
                        } else {
                            CKInput.value = "";
                        }
                        calculateTienTruocThue();
                        calculateTienThue();
                        calculateTienSauThue();
                    }

                    function calculateTienTruocThue() {
                        const tongGia = parseFloat(tongGiaInput.value);
                        const chiKhau = parseFloat(CKInput.value);
                        const tienTruocThue = tongGia - chiKhau;
                        if (!isNaN(tienTruocThue)) {
                            tienTruocThueInput.value = tienTruocThue;
                        } else {
                            tienTruocThueInput.value = "";
                        }
                        calculateTienThue();
                        calculateTienSauThue();
                    }

                    function calculateTienThue() {
                        const tienTruocThue = parseFloat(tienTruocThueInput.value);
                        const thueSuat = parseFloat(thueSuatInput.value);
                        const tienThue = (tienTruocThue * (thueSuat / 100)) || "";
                        tienThueInput.value = tienThue;

                        calculateTienSauThue();
                    }

                    function calculateTienSauThue() {
                        const tienThue = parseFloat(tienThueInput.value);
                        const tienSauThue = tienThue + parseFloat(tienTruocThueInput.value);
                        tienSauThueInput.value = tienSauThue;
                    }

                    const removeSpecIcons = document.querySelectorAll(".remove-spec_edit");

                    removeSpecIcons.forEach(removeIcon => {
                        removeIcon.addEventListener("click", function() {
                            const parentRow = removeIcon.closest("tr");
                            const removedSpecCount = parseInt(parentRow
                                .querySelector('.selectpicker').id.split('_')[1]
                            );
                            parentRow.remove();


                            rowData = rowData.filter(data => {
                                const idData = data.querySelector(
                                        `td input[id^="nameProductEdit_"]`)
                                    .id;

                                return idData !==
                                    `nameProductEdit_${removedSpecCount}`;
                            });

                            // rowData = rowData.filter(data => data
                            //     .querySelector(
                            //         `td input[id^="nameProductEdit_"]`)
                            //     .id !==
                            //     `nameProductEdit_${removedSpecCount}`);

                            calculateSumEdit();
                            specCount--;
                        });
                    });

                    specCount++;

                    const inputs = specifications.querySelectorAll('input');

                    inputs.forEach(input => input.addEventListener('input', calculateSumEdit));

                    calculateSumEdit();
                });

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
                spanElement.value = selectedValues.join(", ");
            }

            // Function to handle dynamic rows
            function handleDynamicRows() {
                const rows = document.querySelectorAll("#detailCTKM tr");
                rows.forEach((row, index) => {
                    const selectCodeProduct = row.querySelector(`#selectCodeProductDetail_${index}`);
                    const productBonusSpan = row.querySelector(`#productBonusDetail_${index}`);


                    updateSelectedValues(`selectCodeProductDetail_${index}`,
                        `nameProductDetail_${index}`);
                });
            }

            // Update selected values for all rows
            handleDynamicRows();
        });
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector('#filterForm');
            const selectFields = form.querySelectorAll('select');
            const dateFields = form.querySelectorAll('date');

            selectFields.forEach(function(select) {
                select.addEventListener('change', function() {
                    form.submit();
                });
            });

            dateFields.forEach(function(date) {
                date.addEventListener('change', function() {
                    form.submit();
                });
            });
        });
    </script>

    <script>
        function submitFunction() {
            let form = document.getElementById("filterForm");
            form.submit();
        }
    </script>

@endsection
