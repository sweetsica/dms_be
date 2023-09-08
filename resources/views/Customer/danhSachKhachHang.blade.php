@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách khách hàng')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <style>

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
        return route('customers', $queryString);
    }

@endphp
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Danh sách khách hàng</h5>
                        @include('template.components.sectionCard')
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class='row'>
                                <div class="col-md-12">
                                    <div class="action_wrapper d-flex justify-content-end">

                                        <div class="action_wrapper d-flex justify-content-end mb-3">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <form method="GET" action="#">
                                                    {{-- @foreach (request()->query() as $key => $value)
                                                @if ($key != 'q' && $key != 'page')
                                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                                @endif
                                                @endforeach --}}
                                                    <div class="form-group has-search">
                                                        <span type="submit"
                                                            class="bi bi-search form-control-feedback fs-5"></span>
                                                        <input type="text" class="form-control" placeholder="Tìm kiếm"
                                                            value="{{ request()->get('q') }}" name="q">
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

                                        </div>
                                        {{-- <div class="action_export ms-3" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Xuất file Excel">
                                        <a role="button" target="_blank" href={{ route('print.dwtUser', ['date'=>
                                            request()->userDate ?? date('m-Y')]) }}
                                            class="btn-export"><i class="bi bi-download"></i></a>
                                    </div> --}}

                                        <div class="action_export" data-bs-toggle="tooltip" data-bs-placement="top"
                                            aria-label="Thêm khách hàng" data-bs-original-title="Thêm khách hàng">
                                            <button class="btn btn-danger d-block testCreateUser" data-bs-toggle="modal"
                                                data-bs-target="#info">Thêm khách hàng</button>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="dsDaoTao"
                                            class="table table-responsive table-hover table-bordered filter"
                                            style="width: 180%">
                                            <thead>
                                                <tr>
                                                    <th class="text-nowrap text-center" style="width:2%">STT</th>
                                                    <th class="text-nowrap text-center" style="width:6%">Mã khách hàng</th>
                                                    <th class="text-nowrap text-center" style="width:8%">Tên khách hàng</th>
                                                    <th class="text-nowrap text-center" style="width:6%">Số điện thoại</th>
                                                    <th class="text-nowrap text-center" style="width:6%">Email</th>
                                                    <th class="text-nowrap text-center" style="width:8%">Tên công ty</th>
                                                    <th class="text-nowrap text-center" style="width:5%">Mã số thuế</th>
                                                    <th class="text-nowrap text-center" style="width:6%">Tỉnh/thành</th>
                                                    <th class="text-nowrap text-center" style="width:6%">Quận/huyện</th>
                                                    <th class="text-nowrap text-center" style="width:6%">Phường/xã</th>
                                                    <th class="text-nowrap text-center" style="width:10%">Địa chỉ</th>
                                                    <th class="text-nowrap text-center" style="width:6%">Nhóm KH</th>
                                                    <th class="text-nowrap text-center" style="width:6%">Kênh KH</th>
                                                    <th class="text-nowrap text-center" style="width:6%">Tuyến KH</th>
                                                    <th class="text-nowrap text-center" style="width:8%">Nhân sự thu thập
                                                    </th>
                                                    <th class="text-nowrap text-center" style="width:8%">Sản phẩm quan tâm
                                                    </th>
                                                    <th class="text-nowrap text-center" style="width:6%">Trạng thái</th>
                                                    <th class="text-nowrap text-center"
                                                        style="width:4%;background: #fff; position: sticky; right: 0;">Hành
                                                        động</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listData as $key => $item)
                                                    <tr class="table-row"
                                                        data-href="/chi-tiet-khach-hang/{{ $item['id'] }}" role="button">
                                                        <td>
                                                            <div class="overText text-center">
                                                                {{-- {{ $loop->iteration }} --}}
                                                                {{ $listData->total() - $loop->index - ($listData->currentPage() - 1) * $listData->perPage() }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ $item['code'] }}">
                                                                {{ $item['code'] }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ $item['name'] }}">
                                                                {{ $item['name'] }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title=" {{ $item['phone'] }}">
                                                                {{ $item['phone'] }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="  {{ $item['email'] }}">
                                                                {{ $item['email'] }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="  {{ $item['companyName'] }}">
                                                                {{ $item['companyName'] }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="  {{ $item['taxCode'] }}">
                                                                {{ $item['taxCode'] }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="  {{ $item['city'] }}">
                                                                {{ $item['city'] }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ $item['district'] }}">
                                                                {{ $item['district'] }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ $item['guide'] }}">
                                                                {{ $item['guide'] }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ $item['address'] }}">
                                                                {{ $item['address'] }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ $item['group'] }}">
                                                                {{ $item['group'] }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title=" {{ $item->channel->name ?? '' }}">
                                                                {{ $item->channel->name ?? '' }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="{{ $item->route->name ?? '' }}">
                                                                {{ $item->route->name ?? '' }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                title="{{ $item->person->name ?? '' }}">
                                                                {{ $item->person->name ?? '' }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @php
                                                                $products = $item->products();
                                                                $productNames = [];
                                                                foreach ($products as $product) {
                                                                    $productNames[] = $product->name;
                                                                }
                                                                $productList = implode(', ', $productNames);
                                                            @endphp
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ $productList }}">
                                                                {{ $productList }}
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="overText text-center" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="{{ $item['status'] }}">
                                                                {{ $item['status'] }}
                                                            </div>
                                                        </td>
                                                        <td style="background: #fff; position: sticky; right: 0;">
                                                            <div class="table_actions d-flex justify-content-center">
                                                                <div class="btn test_btn-edit-{{ $item['id'] }}"
                                                                    href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#suaca{{ $item['id'] }}">
                                                                    <img style="width:16px;height:16px"
                                                                        src="{{ asset('assets/img/edit.svg') }}" />
                                                                </div>
                                                                <div class="btn test_btn-remove-{{ $item['id'] }}"
                                                                    href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#xoaca{{ $item['id'] }}">
                                                                    <img style="width:16px;height:16px"
                                                                        src="{{ asset('assets/img/trash.svg') }}" />
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <nav aria-label="Page navigation example" class="float-end mt-3"
                                        id="target-pagination">
                                        <ul class="pagination">
                                            @foreach ($pagination['links'] as $link)
                                                <li class="page-item {{ $link['active'] ? 'active' : '' }}">
                                                    <a class="page-link" href="{{ getPaginationLink($link, 'page') }}"
                                                        aria-label="Previous">
                                                        <span aria-hidden="true">{!! $link['label'] !!}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </nav>
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

    @foreach ($listData as $item)
        {{-- delete --}}
        <div class="modal fade" id="xoaca{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">XOÁ</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="fs-5">Bạn có thực sự muốn xoá không?</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                        <form action="{{ route('delete.customer', $item->id) }}" method="POST">
                            @csrf
                            {{-- @method('DELETE') --}}
                            <button type="submit" class="btn btn-danger" id="deleteRowElement">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- edit --}}
        <div class="modal fade " id="suaca{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">Sửa khách hàng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formThemCapPhat" method="POST"
                        action="{{ route('edit.customer', ['id' => $item->id]) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Loại khách hàng">
                                    <select class="selectpicker" id="">
                                        <option value="{{ $item->customer_type }}"> {{ $item->customer_type }} </option>
                                        <option value="Khách hàng lẻ" selected>Khách hàng lẻ</option>
                                        <option value="Nhà phân phối">Nhà phân phối</option>
                                        <option value="Đại lý">Đại lý</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <input type="text" name="personContact" data-bs-toggle="tooltip" id=""
                                        data-bs-placement="top" title="Mã khách hàng" placeholder="Mã khách hàng*"
                                        class="form-control">
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <input type="text" name="name" data-bs-toggle="tooltip" required
                                        id="" data-bs-placement="top" title="Tên khách hàng"
                                        class="form-control" value="{{ $item->name }}">
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <input type="text" name="phone" data-bs-toggle="tooltip" required
                                        id="" data-bs-placement="top" title="Số điện thoại"
                                        class="form-control" value="{{ $item->phone }}">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="text" name="email" data-bs-toggle="tooltip" id=""
                                        data-bs-placement="top" placeholder="Email" title="Email"
                                        value="{{ $item->email }}" class="form-control">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <input type="text" name="address" data-bs-toggle="tooltip" required
                                        id="" data-bs-placement="top" title="Địa chỉ" placeholder="Địa chỉ"
                                        class="form-control" value="{{ $item->address }}">
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <textarea class="form-control" placeholder="Ghi chú" id="" style="height: 100px" name="description">{{ $item->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger me-3"
                                data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-danger">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Lọc  -->
    <div class="modal fade" id="filterOptions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Lọc dữ liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="GET" action="">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo nhóm khách hàng">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo nhóm khách hàng" name='nhomKH'>
                                        @foreach ($listgroup as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo kênh khách hàng">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo kênh khách hàng" name='kenhKH'>
                                        @foreach ($listChannel as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo tuyến khách hàng">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo tuyến khách hàng" name='tuyenKH'>
                                        @foreach ($listRoute as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo nhân sự thu thập">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo nhân sự thu thập" name='nhansutt'>
                                        @foreach ($listPersons as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo tỉnh">
                                    <select id="city" class="selectpicker" data-dropup-auto="false"
                                        title="Lọc theo tỉnh" name='cityFilter'>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo quận">
                                    <select id="district" class="selectpicker select_filter" data-dropup-auto="false"
                                        title="Lọc theo nhân quận" name='districtFilter'>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo xã">
                                    <select id="guide" class="selectpicker select_filter" data-dropup-auto="false"
                                        title="Lọc theo xã" name='guideFilter'>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="reset" class="btn btn-outline-danger">Làm
                                mới</button>
                            <button type="submit" class="btn btn-danger">Lọc</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Thông tin khách hàng --}}
    <div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thông tin khách hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formThemCapPhatChitiet" method="POST" action="{{ route('create-customer-simple') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Loại khách hàng">
                                <select class="selectpicker" id="customerTypeAdd" name="customer_type">
                                    <option value="Khách hàng lẻ" selected>Khách hàng lẻ</option>
                                    <option value="Nhà phân phối">Nhà phân phối</option>
                                    <option value="Đại lý">Đại lý</option>
                                </select>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="personContact" data-bs-toggle="tooltip"
                                    id="personContactInput" data-bs-placement="top" title="Mã khách hàng"
                                    placeholder="Mã khách hàng" class="form-control mb-1">
                            </div>

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="name" data-bs-toggle="tooltip" id="nameInput"
                                    data-bs-placement="top" title="Tên khách hàng" placeholder="Tên khách hàng*"
                                    class="form-control mb-1" required>

                            </div>

                            <div class="col-lg-6 mb-3">
                                <input type="text" name="phone" data-bs-toggle="tooltip" required id="phoneInput"
                                    data-bs-placement="top" title="Số điện thoại" placeholder="Số điện thoại*"
                                    class="form-control mb-1" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input type="text" name="email" data-bs-toggle="tooltip" id="emailInput"
                                    data-bs-placement="top" title="Email" placeholder="Email" class="form-control">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input type="text" name="address" data-bs-toggle="tooltip" id="addressInputGeneral"
                                    data-bs-placement="top" title="Địa chỉ"
                                    placeholder="Địa chỉ (VD: 219 Trung Kính, Yên Hòa)*" class="form-control" required>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <textarea class="form-control" placeholder="Ghi chú" id="descriptionInput" style="height: 100px"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex align-items-center justify-content-between">
                        <div>
                            <button type="submit" class="btn btn-danger">Lưu và thêm</button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-outline-danger me-3"
                                data-bs-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#themchitiet" id="btn_chi_tiet">Thêm chi tiết</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Thêm chi tiết khách hàng --}}
    <div class="modal fade" id="themchitiet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm chi tiết khách hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="customerForm" {{-- method="POST" action="{{ route('create-customer') }}" --}} enctype="multipart/form-data">
                    @csrf
                    <input name="name" style="display: none;" id="name">
                    <input name="customer_type" style="display: none;" id="customer_type">
                    <input name="description" style="display: none;" id="description">
                    <input name="personContact" style="display: none;" id="personContact">
                    <input name="phone" style="display: none;" id="phone">
                    <input name="email" style="display: none;" id="email">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="card-title">1. Tổ chức</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="taxCode" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Mã số thuế" placeholder="Mã số thuế" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="personCompany" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Người đại diện" placeholder="Người đại diện"
                                    class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="career" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Chức danh" placeholder="Chức danh" class="form-control">
                            </div>

                            <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lĩnh vực kinh doanh">
                                <select class="selectpicker" name="business_areas">
                                    <option value="" selected>Lĩnh vực kinh doanh</option>
                                    <option value="Kim khí">Kim khí</option>
                                    <option value="Điện máy">Điện máy</option>
                                    <option value="Xe điện">Xe điện</option>
                                    <option value="Máy công cụ">Máy công cụ</option>
                                    <option value="Vật liệu xây dựng">Vật liệu xây dựng</option>
                                    <option value="Lĩnh vực khác">Lĩnh vực khác</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <input type="text" name="companyPhoneNumber" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Số điện thoại công ty"
                                    placeholder="Số điện thoại công ty" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="companyEmail" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Email công ty" placeholder="Email công ty"
                                    class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="accountNumber" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Số tài khoản" placeholder="Số tài khoản"
                                    class="form-control">
                            </div>
                            <div class="col-md-8 mb-3">
                                <input type="text" name="bankOpen" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Mở tại ngân hàng" placeholder="Mở tại ngân hàng" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="card-title">2. Liên hệ</div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="table-responsive">
                                    <table id="contact" class="table table-responsive table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap text-center" style="">STT</th>
                                                <th class="text-nowrap text-center" style="">Họ và tên</th>
                                                <th class="text-nowrap text-center" style="">Số điện thoại</th>
                                                <th class="text-nowrap text-center" style="">Email</th>
                                                <th class="text-nowrap text-center" style="">Chức danh</th>
                                                <th class="text-nowrap text-center">
                                                    <i class="bi bi-plus fs-3" id="addRowIcon"
                                                        style="color: var(--primary-color); cursor: pointer;"></i>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="card-title">3. Địa chỉ</div>
                            </div>
                            <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Tỉnh/thành">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Tỉnh/thành*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="city" id="city"
                                    data-live-search-placeholder="Tìm kiếm...">
                                </select>
                                <div class="error-text" id="cityError" style="color: red;"></div>
                            </div>
                            <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Quận/huyện">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Quận/huyện*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="district" id="district"
                                    data-live-search-placeholder="Tìm kiếm...">
                                </select>
                                <div class="error-text" id="districtError" style="color: red;"></div>
                            </div>
                            <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Phường/xã">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Phường/xã*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="guide" id="guide"
                                    data-live-search-placeholder="Tìm kiếm...">
                                </select>
                                <div class="error-text" id="guideError" style="color: red;"></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" id="addressInput" name="address" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Địa chỉ" placeholder="Địa chỉ*" class="form-control">
                                <div class="error-text" id="addressError" style="color: red;"></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div id="map"
                                    style="height: 300px; display: block ;opacity: 0.5;background-image: url('{{ asset('/assets/img/img_map.jpg') }}'); "
                                    class="border"></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card-title">4. Mô tả</div>
                            </div>

                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Nhân sự thu thập*">

                                <select {{ session('user')['role_id'] != '1' ? 'disabled' : '' }} class="selectpicker"
                                    data-dropup-auto="false" data-width="100%" required data-live-search="true"
                                    title="Nhân sự thu thập*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="personId"
                                    data-live-search-placeholder="Tìm kiếm...">
                                    @foreach ($listPersons as $per)
                                        <option value="{{ $per->id }}"
                                            {{ $per->id == session('user')['id'] ? 'selected' : '' }}>
                                            {{ $per->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="error-text" id="personIdError" style="color: red;"></div>
                            </div>

                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Sản phẩm quan tâm">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Sản phẩm quan tâm*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="productId[]" id="productId"
                                    data-live-search-placeholder="Tìm kiếm..." multiple>
                                </select>
                                <div class="error-text" id="productIdError" style="color: red;"></div>
                            </div>


                            <div class="col-md-12 mb-3">
                                <div class="card-title">5. Phân loại</div>
                            </div>

                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Nhóm khách hàng">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Nhóm khách hàng*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="group" id="groupId"
                                    data-live-search-placeholder="Tìm kiếm...">
                                    @foreach ($listgroup as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <div class="error-text" id="groupError" style="color: red;"></div>
                            </div>

                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Tuyến">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Tuyến*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="routeId" id="routeId"
                                    data-live-search-placeholder="Tìm kiếm...">
                                </select>
                                <div class="error-text" id="routeIdError" style="color: red;"></div>
                            </div>

                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Kênh khách hàng">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Kênh khách hàng*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="chanelId" id="chanelId"
                                    data-live-search-placeholder="Tìm kiếm...">
                                </select>
                                <div class="error-text" id="chanelIdError" style="color: red;"></div>
                            </div>
                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Trạng thái*">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="status"
                                    data-live-search-placeholder="Tìm kiếm...">
                                    <option value="Trinh sát" selected>Trinh sát</option>
                                    <option value="Cơ hội">Cơ hội</option>
                                    <option value="Khách hàng">Khách hàng</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="card-title">6. Hình ảnh</div>
                            </div>

                            <div class="col-12 col-md-12">
                                <div class="upload_wrapper-items">
                                    <div class="alert alert-danger alertNotSupport" role="alert" style="display:none">
                                        File bạn tải lên hiện tại không hỗ trợ !
                                    </div>
                                    <div class="modal_upload-wrapper">
                                        <label class="modal_upload-label" for="file">
                                            Tải ảnh sản phẩm tại đây</label>
                                        <div class="mt-2 text-secondary fst-italic">Hỗ trợ định
                                            dạng
                                            JPG hoặc
                                            PNG kích
                                            thước tệp không quá 10MB
                                        </div>
                                        <div
                                            class="modal_upload-action mt-3 d-flex align-items-center justify-content-center">
                                            <div class="modal_upload-addFile me-3">
                                                <label for="fileInput" id="fileButton"
                                                    class="btn position-relative border d-flex w-500">
                                                    <img src="{{ asset('assets/img/upload-file.svg') }}" />
                                                    <span class="ps-2">Đính kèm ảnh sản phẩm</span>
                                                </label>
                                                <input accept="image/jpeg,image/png" role="button" type="file"
                                                    class="modal_upload-input modal_upload-file" name="image"
                                                    onchange="updateList(event)" />
                                            </div>
                                        </div>

                                        <div id="preview" class="d-flex mt-3"></div>
                                    </div>
                                    <ul class="modal_upload-list"
                                        style="max-height: 134px; overflow-y: scroll; overflow-x: hidden;">
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="input-group align-items-center">
                                    <input type="file" class="form-control" id="attachment" name="attachment[]"
                                        style="display: none" multiple>
                                    <i class="bi bi-link-45deg text-color_pimary fs-3 fw-bold"></i>
                                    <label class="input-label text-color_pimary fs-4 fw-bold ms-2" for="attachment"
                                        style="cursor: pointer">Đính kèm file</label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <ul id="fileListDisplay" class="list-unstyled"></ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-outline-danger me-3" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-danger" id="submitButton">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addButton = document.querySelector("[data-bs-target^='#themchitiet']");
            const nameInput = document.querySelector("#nameInput");
            const customerTypeInput = document.querySelector("#customerTypeAdd");
            const descriptionInput = document.querySelector("#descriptionInput");
            const customerTypeAdd = document.querySelector("#customerTypeAdd");
            const emailInput = document.querySelector("#emailInput");
            const phoneInput = document.querySelector("#phoneInput");
            const personContactInput = document.querySelector("#personContactInput")
            const addressInputGeneral = document.querySelector("#addressInputGeneral");
            const nameI = document.querySelector("#name");
            const customerTypeAddI = document.querySelector("#customer_type");
            const descriptionI = document.querySelector("#description");
            const emailI = document.querySelector("#email");
            const phoneI = document.querySelector("#phone");
            const personI = document.querySelector("#personContact");
            const addressInput = document.querySelector("#addressInput");
            addButton.addEventListener("click", function() {
                nameI.value = nameInput.value;
                customerTypeAddI.value = customerTypeInput.value;
                descriptionI.value = descriptionInput.value;
                customerTypeAddI.value = customerTypeAdd.value;
                emailI.value = emailInput.value;
                phoneI.value = phoneInput.value;
                personI.value = personContactInput.value;
                addressInput.value = addressInputGeneral.value;
            });


        });

        function geocodeAddressEdit(address) {
            $.ajax({
                url: 'https://api.opencagedata.com/geocode/v1/json',
                method: 'GET',
                dataType: 'json',
                data: {
                    q: address,
                    key: apiKey
                },
                success: function(response) {
                    if (response.total_results > 0) {
                        var latitude = response.results[0].geometry.lat;
                        var longitude = response.results[0].geometry.lng;

                        // Display map
                        if (!map) {
                            map = L.map('mapEdit').setView([latitude, longitude], 13);
                            L.tileLayer(
                                'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

                                }).addTo(map);
                        } else {
                            map.setView([latitude, longitude], 13);
                        }

                        // Add or update marker
                        if (!marker) {
                            marker = L.marker([latitude, longitude]).addTo(map);
                        } else {
                            marker.setLatLng([latitude, longitude]);
                        }
                    } else {
                        alert("Please check the address.");
                    }
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred while geocoding: " + error);
                }
            });
        }

        const fileAttach = document.querySelector("#attachment");
        const fileListDisplay = document.querySelector("#fileListDisplay");

        fileAttach.addEventListener("change", function() {
            const files = Array.from(fileAttach.files);
            fileListDisplay.innerHTML = ""; // Xóa danh sách cũ
            files.forEach(file => {
                const listItem = document.createElement("li");
                listItem.textContent = file.name;
                fileListDisplay.appendChild(listItem);
            });
        });
    </script>

    <style>
        .text-color_pimary {
            color: var(--primary-color);
        }

        .upload-files-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .drag-file-area {
            border: 2px dashed var(--primary-color);
            border-radius: 10px;
            text-align: center;
            width: 100%;
        }

        .drag-file-area .upload-icon {
            font-size: 2rem;
        }

        .drag-file-area h3 {
            font-size: 26px;
            margin: 15px 0;
        }

        .drag-file-area label {
            font-size: 19px;
        }

        .drag-file-area label .browse-files-text {
            color: var(--primary-color);
            font-weight: bolder;
            cursor: pointer;
        }

        .browse-files span {
            position: relative;
            top: -25px;
        }

        .default-file-input {
            opacity: 0;
        }

        .cannot-upload-message {
            background-color: #ffc6c4;
            font-size: 17px;
            display: flex;
            align-items: center;
            margin: 5px 0;
            padding: 5px 10px 5px 30px;
            border-radius: 5px;
            color: #BB0000;
            display: none;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .cannot-upload-message span,
        .upload-button-icon {
            padding-right: 10px;
        }

        .cannot-upload-message span:last-child {
            padding-left: 20px;
            cursor: pointer;
        }

        .file-block {
            color: #f7fff7;
            background-color: var(--primary-color);
            transition: all 1s;
            width: 390px;
            position: relative;
            display: none;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0 15px;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
        }

        .file-info {
            display: flex;
            align-items: center;
            font-size: 15px;
        }

        .file-icon {
            margin-right: 10px;
        }

        .file-name,
        .file-size {
            padding: 0 3px;
        }

        .remove-file-icon {
            cursor: pointer;
        }

        .progress-bar {
            display: flex;
            position: absolute;
            bottom: 0;
            left: 4.5%;
            width: 0;
            height: 5px;
            border-radius: 25px;
            background-color: #4BB543;
        }

        .upload-button {
            font-family: 'Montserrat';
            background-color: var(--primary-color);
            color: #f7fff7;
            display: flex;
            align-items: center;
            font-size: 18px;
            border: none;
            border-radius: 20px;
            margin: 10px;
            padding: 7.5px 50px;
            cursor: pointer;
        }

        .btn-disable {
            background: #bab0b0 !important;
            border: none !important;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        //load data tỉnh thành từ https://provinces.open-api.vn/api/
        const host = "https://provinces.open-api.vn/api/";
        var callAPI = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data, "city");
                });
        }
        callAPI('https://provinces.open-api.vn/api/?depth=1');
        var callApiDistrict = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data.districts, "district");
                    // $('#district').selectpicker('destroy');
                });
        }
        var callApiWard = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data.wards, "guide");
                    // $('#guide').selectpicker('destroy');
                });
        }

        var renderData = (array, select) => {
            $('#' + select).selectpicker('destroy');
            let row = '<option disable value="">Chọn</option>';
            array.forEach(element => {
                row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
            });
            document.querySelector("#" + select).innerHTML = row;
            $('#' + select).selectpicker();
        }

        $("#city").change(() => {
            callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
        });
        $("#district").change(() => {
            callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
        });
        $("#guide").change(() => {})


        //sua dia chi cho edit
        var callAPI_edit = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData_edit(response.data, "city_edit");
                });
        }
        callAPI_edit('https://provinces.open-api.vn/api/?depth=1');
        var callApiDistrict_edit = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData_edit(response.data.districts, "district_edit");
                });
        }
        var callApiWard_edit = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData_edit(response.data.wards, "guide_edit");
                });
        }

        var renderData_edit = (array, select) => {
            $('#' + select).selectpicker('destroy');
            let row = '<option disable value="">Chọn</option>';
            array.forEach(element => {
                row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
            });
            document.querySelector("#" + select).innerHTML = row;
            $('#' + select).selectpicker();
        }

        $("#city_edit").change(() => {
            callApiDistrict_edit(host + "p/" + $("#city_edit").find(':selected').data('id') + "?depth=2");
        });
        $("#district_edit").change(() => {
            callApiWard_edit(host + "d/" + $("#district_edit").find(':selected').data('id') + "?depth=2");
        });
        $("#guide_edit").change(() => {})



        //load data nhan su api
        function loadPersonnelData() {
            const apiUrl = '/nhan_su';
            const selectElement = document.getElementById('personId');
            fetch(apiUrl)
                .then((response) => response.json())
                .then((data) => {
                    selectElement.innerHTML = '';
                    data.forEach((person) => {
                        const option = document.createElement('option');
                        option.value = person.id;
                        option.textContent = person.name;
                        selectElement.appendChild(option);
                    });

                    $('#personId').selectpicker('refresh');
                })
                .catch((error) => console.error('Lỗi khi gọi API:', error));
        }
        window.addEventListener('load', loadPersonnelData);

        //load data san pham api
        function loadProductData() {
            const apiUrl = '/danh_sach_san_pham_cho_select';
            const selectElement = document.getElementById('productId');
            fetch(apiUrl)
                .then((response) => response.json())
                .then((data) => {
                    selectElement.innerHTML = '';
                    data.forEach((product) => {
                        const option = document.createElement('option');
                        option.value = product.id;
                        option.textContent = product.name;
                        selectElement.appendChild(option);
                    });

                    $('#productId').selectpicker('refresh');
                })
                .catch((error) => console.error('Lỗi khi gọi API:', error));
        }
        window.addEventListener('load', loadProductData);

        //load data kenh api
        function loadChanelData() {
            const apiUrl = '/department_getAll';
            const selectElement = document.getElementById('chanelId');
            fetch(apiUrl)
                .then((response) => response.json())
                .then((data) => {
                    selectElement.innerHTML = '';
                    data.forEach((chanel) => {
                        const option = document.createElement('option');
                        option.value = chanel.id;
                        option.textContent = chanel.name;
                        selectElement.appendChild(option);
                    });

                    $('#chanelId').selectpicker('refresh');
                })
                .catch((error) => console.error('Lỗi khi gọi API:', error));
        }
        window.addEventListener('load', loadChanelData);

        //load data tuyen api
        function loadRouteData() {
            const apiUrl = '/route_direction_getAll';
            const selectElement = document.getElementById('routeId');
            fetch(apiUrl)
                .then((response) => response.json())
                .then((data) => {
                    selectElement.innerHTML = '';
                    data.forEach((route) => {
                        const option = document.createElement('option');
                        option.value = route.id;
                        option.textContent = route.name;
                        selectElement.appendChild(option);
                    });

                    $('#routeId').selectpicker('refresh');
                })
                .catch((error) => console.error('Lỗi khi gọi API:', error));
        }
        window.addEventListener('load', loadRouteData);

        var isAdvancedUpload = function() {
            var div = document.createElement('div');
            return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window &&
                'FileReader' in window;
        }();

        let draggableFileArea = document.querySelector(".drag-file-area");
        let browseFileText = document.querySelector(".browse-files");
        let uploadIcon = document.querySelector(".upload-icon");
        let dragDropText = document.querySelector(".dynamic-message");
        let fileInput = document.querySelector(".default-file-input");
        let cannotUploadMessage = document.querySelector(".cannot-upload-message");
        let cancelAlertButton = document.querySelector(".cancel-alert-button");
        let uploadedFile = document.querySelector(".file-block");
        let fileName = document.querySelector(".file-name");
        let fileSize = document.querySelector(".file-size");
        let progressBar = document.querySelector(".progress-bar");
        let removeFileButton = document.querySelector(".remove-file-icon");
        let uploadButton = document.querySelector(".upload-button");
        let fileFlag = 0;

        fileInput.addEventListener("click", () => {
            fileInput.value = '';
            console.log(fileInput.value);
        });

        fileInput.addEventListener("change", e => {
            console.log(" > " + fileInput.value)
            uploadIcon.innerHTML = 'Tải file lên';
            dragDropText.innerHTML = 'File Dropped Successfully!';
            document.querySelector(".label").innerHTML =
                `<input type="file" class="default-file-input" style=""/>`;
            uploadButton.innerHTML = `Upload`;
            fileName.innerHTML = fileInput.files[0].name;
            fileSize.innerHTML = (fileInput.files[0].size / 1024).toFixed(1) + " KB";
            uploadedFile.style.cssText = "display: flex;";
            progressBar.style.width = 0;
            fileFlag = 0;
        });

        uploadButton.addEventListener("click", () => {
            let isFileUploaded = fileInput.value;
            if (isFileUploaded != '') {
                if (fileFlag == 0) {
                    fileFlag = 1;
                    var width = 0;
                    var id = setInterval(frame, 50);

                    function frame() {
                        if (width >= 390) {
                            clearInterval(id);
                            uploadButton.innerHTML =
                                `<span class="material-icons-outlined upload-button-icon"> check_circle </span> Uploaded`;
                        } else {
                            width += 5;
                            progressBar.style.width = width + "px";
                        }
                    }
                }
            } else {
                cannotUploadMessage.style.cssText = "display: flex; animation: fadeIn linear 1.5s;";
            }
        });

        cancelAlertButton.addEventListener("click", () => {
            cannotUploadMessage.style.cssText = "display: none;";
        });

        if (isAdvancedUpload) {
            ["drag", "dragstart", "dragend", "dragover", "dragenter", "dragleave", "drop"].forEach(evt =>
                draggableFileArea.addEventListener(evt, e => {
                    e.preventDefault();
                    e.stopPropagation();
                })
            );

            ["dragover", "dragenter"].forEach(evt => {
                draggableFileArea.addEventListener(evt, e => {
                    e.preventDefault();
                    e.stopPropagation();
                    uploadIcon.innerHTML = 'file_download';
                    dragDropText.innerHTML = 'Drop your file here!';
                });
            });

            draggableFileArea.addEventListener("drop", e => {
                uploadIcon.innerHTML = 'check_circle';
                dragDropText.innerHTML = 'File Dropped Successfully!';
                // document.querySelector(".label").innerHTML =
                //     `drag & drop or <span class="browse-files"> <input type="file" class="default-file-input" style=""/> <span class="browse-files-text" style="top: -23px; left: -20px;"> browse file</span> </span>`;
                uploadButton.innerHTML = `Upload`;

                let files = e.dataTransfer.files;
                fileInput.files = files;
                console.log(files[0].name + " " + files[0].size);
                console.log(document.querySelector(".default-file-input").value);
                fileName.innerHTML = files[0].name;
                fileSize.innerHTML = (files[0].size / 1024).toFixed(1) + " KB";
                uploadedFile.style.cssText = "display: flex;";
                progressBar.style.width = 0;
                fileFlag = 0;
            });
        }

        removeFileButton.addEventListener("click", () => {
            uploadedFile.style.cssText = "display: none;";
            fileInput.value = '';
            uploadIcon.innerHTML = 'file_upload';
            dragDropText.innerHTML = 'Drag & drop any file here';
            document.querySelector(".label").innerHTML =
                `or <span class="browse-files"> <input type="file" class="default-file-input"/> <span class="browse-files-text">browse file</span> <span>from device</span> </span>`;
            uploadButton.innerHTML = `Upload`;
        });
    </script>
@endsection
@section('footer-script')

    <!-- Plugins -->
    <script src="{{ asset('assets/plugins/jquery-datetimepicker/custom-datetimepicker.js') }}"></script>

    <script type="text/javascript" charset="utf-8"
        src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-repeater/repeater.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-repeater/custom-repeater.js') }}"></script>
    <!-- Chart Js -->
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs-plugin-stacked100@1.0.0.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs-plugin-datalabels@2.0.0.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_khachHangActive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_khachHangMoi.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_soDonHang.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_doanhSo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_nhanSu.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>

    <script>
        updateList = function(e) {
            const input = e.target;
            const outPut = input.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector(
                '.modal_upload-list');
            const notSupport = outPut.parentNode.parentNode.querySelector('.alertNotSupport');

            let children = '';
            console.log(children);
            // const allowedTypes = ['application/pdf'];
            // const allowedExtensions = ['.pdf'];
            const maxFileSize = 10485760; //10MB in bytes

            for (let i = 0; i < input.files.length; ++i) {
                const file = input.files.item(i);
                // if (file.size <= maxFileSize && allowedTypes.includes(file.type) && allowedExtensions.includes(
                //         getFileExtension(file.name))) {
                if (file.size <= maxFileSize) {
                    children += `<li>
            <span class="fs-5">
                <i class="bi bi-link-45deg"></i> ${file.name}
            </span>
            <span class="modal_upload-remote" onclick="removeFileFromFileList(event, ${i})">
                <img style="width:18px;height:18px" src="{{ asset('assets/img/trash.svg') }}" />
            </span>
        </li>`;
                } else {

                    notSupport.style.display = 'block';
                    //remove all files from input
                    input.value = '';

                    setTimeout(() => {
                        notSupport.style.display = 'none';
                    }, 5000);
                }
            }
            outPut.innerHTML = children;
        }

        //delete file from input
        function removeFileFromFileList(event, index) {
            const deleteButton = event.target;
            //get tag name
            const tagName = deleteButton.tagName.toLowerCase();
            let liEl;
            if (tagName == "img") {
                liEl = deleteButton.parentNode.parentNode;
            }
            if (tagName == "span") {
                liEl = deleteButton.parentNode;
            }

            const inputEl = liEl.parentNode.parentNode.parentNode.querySelector('.modal_upload-input');
            const dt = new DataTransfer()

            const {
                files
            } = inputEl

            for (let i = 0; i < files.length; i++) {
                const file = files[i]
                if (index !== i)
                    dt.items.add(file) // here you exclude the file. thus removing it.
            }

            inputEl.files = dt.files // Assign the updates list
            liEl.remove();
        }

        function removeUploaded(event) {
            const deleteButton = event.target;
            //get tag name
            const tagName = deleteButton.tagName.toLowerCase();
            let liEl;
            if (tagName == "img") {
                liEl = deleteButton.parentNode.parentNode;
            }
            if (tagName == "span") {
                liEl = deleteButton.parentNode;
            }
            liEl.remove();
        }

        function getFileExtension(filename) {
            return '.' + filename.split('.').pop();
        }
    </script>

    <script>
        $(document).ready(function() {

            $('.datePicker').daterangepicker({
                singleDatePicker: false,
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY '
                }
            });

            $(".locDuLieuPick").datepicker({
                format: "mm-yyyy",
                orientation: 'top',
                autoclose: true,
                startView: "months",
                minViewMode: "months",
                locale: 'vi',
            });

            $('.timepicker').daterangepicker({
                timePicker: true,
                singleDatePicker: true,
                timePicker24Hour: true,
                timePickerIncrement: 1,
                timePickerSeconds: false,
                locale: {
                    format: 'HH:mm'
                },
                timePickerminTime: '08:00',
                timePickermaxTime: '17:00'
            }).on('show.daterangepicker', function(ev, picker) {
                picker.container.find(".calendar-table").hide();
            });

        });
    </script>

    <script>
        function reloadWithoutParams() {
            const currentUrl = window.location.pathname;
            window.location.href = currentUrl;
        }
    </script>



    <script>
        function resetTaskFilters(queryNames) {
            console.log("reset filters", queryNames);
            const urlParams = new URLSearchParams(window.location.search);
            queryNames.forEach(queryName => {

                urlParams.delete(queryName);


            })
            window.location.search = urlParams;
        }
    </script>

    <script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>


    <script type="text/javascript" src="{{ asset('/assets/js/components/resetFilter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/components/dataHrefTable.js') }}"></script>

    <script>
        $(document).ready(function() {
            var apiKey = "b5b7553f4280465482f4a03273fb8813";
            var map;
            var marker;

            // Function to geocode address
            function geocodeAddress(address) {
                $.ajax({
                    url: 'https://api.opencagedata.com/geocode/v1/json',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        q: address,
                        key: apiKey
                    },
                    success: function(response) {
                        if (response.total_results > 0) {
                            var latitude = response.results[0].geometry.lat;
                            var longitude = response.results[0].geometry.lng;

                            // Display map
                            if (!map) {
                                map = L.map('map').setView([latitude, longitude], 13);
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

                                }).addTo(map);
                            } else {
                                map.setView([latitude, longitude], 13);
                            }

                            // Add or update marker
                            if (!marker) {
                                marker = L.marker([latitude, longitude]).addTo(map);
                            } else {
                                marker.setLatLng([latitude, longitude]);
                            }
                        } else {
                            alert("Please check the address.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("An error occurred while geocoding: " + error);
                    }
                });
            }

            // Event handler for focusout event on address input
            $('#addressInput').on('focusout', function() {
                var address = $(this).val();
                $("#map").show();
                geocodeAddress(address);
            });

            // Bind an event handler to the pop-up event
            $('.editForm').on('shown.bs.modal', function() {
                // Retrieve the value of the input with ID "editAddress" within the current modal
                var addressValue = $(this).find('#editAddress').val();
                geocodeAddressEdit(addressValue);

                $(this).find('#editAddress').on('focusout', function() {
                    // Retrieve the value when the input field loses focus
                    var addressValueFocusOut = $(this).val();
                    geocodeAddressEdit(addressValueFocusOut);
                });

                // Function to geocode address
                function geocodeAddressEdit(address) {
                    $.ajax({
                        url: 'https://api.opencagedata.com/geocode/v1/json',
                        method: 'GET',
                        dataType: 'json',
                        data: {
                            q: address,
                            key: apiKey
                        },
                        success: function(response) {
                            if (response.total_results > 0) {
                                var latitude = response.results[0].geometry.lat;
                                var longitude = response.results[0].geometry.lng;

                                // Display map
                                if (!map) {
                                    map = L.map('mapEdit').setView([latitude, longitude], 13);
                                    L.tileLayer(
                                        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

                                        }).addTo(map);
                                } else {
                                    map.setView([latitude, longitude], 13);
                                }

                                // Add or update marker
                                if (!marker) {
                                    marker = L.marker([latitude, longitude]).addTo(map);
                                } else {
                                    marker.setLatLng([latitude, longitude]);
                                }
                            } else {
                                alert("Please check the address.");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("An error occurred while geocoding: " + error);
                        }
                    });
                }
            });
        });
    </script>
    <script>
        document.getElementById("submitButton").addEventListener("click", function() {
            const formData = new FormData(document.getElementById("customerForm"));
            fetch("{{ route('create-customer') }}", {
                    method: "POST",
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // const codeError = document.getElementById("codeError");
                    // const nameError = document.getElementById("nameError");
                    // const phoneError = document.getElementById("phoneError");
                    const cityError = document.getElementById("cityError");
                    const addressError = document.getElementById("addressError");
                    const districtError = document.getElementById("districtError");
                    const guideError = document.getElementById("guideError");
                    const personIdError = document.getElementById("personIdError");
                    const productIdError = document.getElementById("productIdError");
                    const groupError = document.getElementById("groupError");
                    const chanelIdError = document.getElementById("chanelIdError");
                    const routeIdError = document.getElementById("routeIdError");

                    if (data.success) {
                        // coderessError.innerHTML = "";
                        addressError.innerHTML = "";
                        // nameError.innerHTML = "";
                        // phoneError.innerHTML = "";
                        cityError.innerHTML = "";
                        districtError.innerHTML = "";
                        guideError.innerHTML = "";
                        personIdError.innerHTML = "";
                        productIdError.innerHTML = "";
                        groupError.innerHTML = "";
                        chanelIdError.innerHTML = "";
                        routeIdError.innerHTML = "";
                        // nameError.innerHTML = '';
                        closeModal(); // Gọi hàm đóng modal
                        window.location.href = "{{ route('customers') }}"; // Điều hướng trang khách hàng
                    } else {

                        // coderessError.innerHTML = data.errors.code;
                        addressError.innerHTML = data.errors.address;
                        // nameError.innerHTML = data.errors.name;
                        // phoneError.innerHTML = data.errors.phone;
                        cityError.innerHTML = data.errors.city;
                        districtError.innerHTML = data.errors.district;
                        guideError.innerHTML = data.errors.guide;
                        personIdError.innerHTML = data.errors.personId;
                        productIdError.innerHTML = data.errors.productId;
                        groupError.innerHTML = data.errors.group;
                        chanelIdError.innerHTML = data.errors.chanelId;
                        routeIdError.innerHTML = data.errors.routeId;
                    }
                })
                .catch(error => {
                    console.error("Error:", error);
                });
        });

        function closeModal() {
            const modal = document.getElementById("themchitiet");
            modal.style.display = "none";
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const themChiTietBtn = document.getElementById('btn_chi_tiet');
            themChiTietBtn.classList.add('btn-disable');
            themChiTietBtn.disabled = true;
        });

        const customerTypeSelect = document.getElementById('customerTypeAdd');
        const themChiTietBtn = document.getElementById('btn_chi_tiet');
        const addressInputGeneral = document.getElementById('addressInputGeneral');
        const nameInput = document.getElementById('nameInput');
        const phoneInput = document.getElementById('phoneInput');

        customerTypeSelect.addEventListener('change', () => {
            const selectedValue = customerTypeSelect.value;

            if (selectedValue === 'Khách hàng lẻ') {
                themChiTietBtn.disabled = true;
                themChiTietBtn.classList.add('btn-disable');


                // Xóa thông báo lỗi
                hideErrorMessage(addressInputGeneral);
                hideErrorMessage(nameInput);
                hideErrorMessage(phoneInput);
            }

            if (selectedValue !== 'Khách hàng lẻ') {
                checkAndToggleButton();
            }
        });

        addressInputGeneral.addEventListener('input', checkAndToggleButton);
        nameInput.addEventListener('input', checkAndToggleButton);
        phoneInput.addEventListener('input', checkAndToggleButton);

        function checkAndToggleButton() {
            const selectedValue = customerTypeSelect.value;
            const addressValue = addressInputGeneral.value.trim();
            const nameValue = nameInput.value.trim();
            const phoneValue = phoneInput.value.trim();

            if (selectedValue !== 'Khách hàng lẻ') {
                if (!addressValue) {
                    showErrorMessage(addressInputGeneral, 'Địa chỉ không được để trống');
                } else {
                    hideErrorMessage(addressInputGeneral);
                }

                if (!nameValue) {
                    showErrorMessage(nameInput, 'Tên khách hàng không được để trống');
                } else {
                    hideErrorMessage(nameInput);
                }

                if (!phoneValue) {
                    showErrorMessage(phoneInput, 'Số điện thoại không được để trống');
                } else {
                    hideErrorMessage(phoneInput);
                }

                if (addressValue && nameValue && phoneValue) {
                    themChiTietBtn.disabled = false;
                    themChiTietBtn.classList.remove('btn-disable');
                } else {
                    themChiTietBtn.disabled = true;
                    themChiTietBtn.classList.add('btn-disable');
                }
            }
        }

        function showErrorMessage(inputElement, message) {
            let errorSpan = inputElement.nextElementSibling;
            if (!errorSpan || !errorSpan.classList.contains('error-message')) {
                errorSpan = document.createElement('span');
                errorSpan.className = 'error-message text-danger';
                inputElement.parentNode.insertBefore(errorSpan, inputElement.nextSibling);
            }
            errorSpan.textContent = message;
        }

        function hideErrorMessage(inputElement) {
            const errorSpan = inputElement.nextElementSibling;
            if (errorSpan && errorSpan.classList.contains('error-message')) {
                errorSpan.remove();
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tbody = document.querySelector('#contact tbody');

            let rowCount = 1;
            let specCount = 0;

            const addRow = () => {
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                <td class="text-center">${rowCount}</td>
                <td><input type="text" class="form-control" name="contact[${specCount}][key1]"></td>
                <td><input type="text" class="form-control" name="contact[${specCount}][key2]"></td>
                <td><input type="text" class="form-control" name="contact[${specCount}][key3]"></td>
                <td><input type="text" class="form-control" name="contact[${specCount}][key4]"></td>
                <td class="text-center">
                    <i class="bi bi-trash deleteRow fs-3"
                    style="color: var(--primary-color); cursor: pointer;" ></i>
                </td>
            `;

                tbody.appendChild(newRow);
                rowCount++;
                specCount++;

                // Xử lý sự kiện xóa hàng
                const deleteButtons = document.querySelectorAll('.deleteRow');
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        this.closest('tr').remove();
                    });
                });
            };

            // Gọi hàm addRow để thêm hàng ngay sau khi tải trang xong
            addRow();

            const addRowIcon = document.getElementById('addRowIcon');
            addRowIcon.addEventListener('click', function() {
                addRow();
            })
        });
    </script>
@endsection
