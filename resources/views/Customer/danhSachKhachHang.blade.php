@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách khách hàng')
@section('header-style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin="" />
<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
    integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
    crossorigin=""></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    #sethPhatMap {
        width: 100%;
        height: 600px;
        position: inherit;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .map-popup-content {
        width: 300px;
    }

    .map-popup-content .left {
        float: left;
        width: 40%;
    }

    .map-popup-content .left img {
        width: 100%;
        height: 100px;
        margin: -15px 0 -15px -20px;
        border-radius: 12px;
    }

    .map-popup-content .right {
        float: left;
        width: 60%;
    }

    .clearfix {
        clear: both;
    }
</style>
@endsection
@php

// function getPaginationLink($link, $pageName)
// {
// if (!isset($link->url)) {
// return '#';
// }

// $pageNumber = explode('?page=', $link->url)[1];

// $queryString = request()->query();

// $queryString[$pageName] = $pageNumber;
// return route('timekeeping.list', $queryString);
// }

// function isFiltering($filterNames)
// {
// $filters = request()->query();
// foreach ($filterNames as $filterName) {
// if (isset($filters[$filterName]) && $filters[$filterName] != '') {
// return true;
// }
// }
// return false;
// }
@endphp
@section('content')
@include('template.sidebar.sidebarMaster.sidebarLeft')
<div id="mainWrap" class="mainWrap">
    <div class="mainSection">
        <div class="main">
            <div class="container">
                <div class="mainSection_heading">
                    <h5 class="mainSection_heading-title">Danh sách khách hàng</h5>
                    @include('template.components.sectionCard')
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class='row'>
                            <div class="col-md-12">
                                <div class="action_wrapper d-flex justify-content-end mb-3">

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

                                        {{-- <div class="action_export ms-3" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Lọc">
                                            <button
                                                class="btn btn-outline-danger {{ isFiltering(['department', 'user', 'adminDate']) ? 'active' : '' }}"
                                                data-bs-toggle="modal" data-bs-target="#filterAdmin"><i
                                                    class="bi bi-funnel"></i>
                                            </button>
                                        </div> --}}

                                    </div>
                                    {{-- <div class="action_export ms-3" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Xuất file Excel">
                                        <a role="button" target="_blank" href={{ route('print.dwtUser', ['date'=>
                                            request()->userDate ?? date('m-Y')]) }}
                                            class="btn-export"><i class="bi bi-download"></i></a>
                                    </div> --}}

                                    <div class="action_export ms-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                        aria-label="Thêm khách hàng" data-bs-original-title="Thêm khách hàng">
                                        <button class="btn btn-danger d-block testCreateUser" data-bs-toggle="modal"
                                            data-bs-target="#add">Thêm khách hàng</button>
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
                                                <th class="text-nowrap text-center" style="width:4%">Hành động</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($listData as $key => $item)
                                            <tr class="table-row">
                                                {{-- ata-bs-toggle="modal" data-bs-target="#info" role="button" --}}
                                                <td>
                                                    <div class="overText text-center">
                                                        {{$loop->iteration }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="{{ $item['name'] }}">
                                                        {{ $item['name'] }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title=" {{ $item['phone'] }}">
                                                        {{ $item['phone'] }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText center" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="  {{ $item['email'] }}">
                                                        {{ $item['email'] }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText center" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="  {{ $item['comanyName'] }}">
                                                        {{ $item['comanyName'] }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText center" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="  {{ $item['taxCode'] }}">
                                                        {{ $item['taxCode'] }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText center" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="  {{ $item['city'] }}">
                                                        {{ $item['city'] }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText center" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="{{ $item['district'] }}">
                                                        {{ $item['district'] }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText center" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="{{ $item['guide'] }}">
                                                        {{ $item['guide'] }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText center" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="{{ $item['address'] }}">
                                                        {{ $item['address'] }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText center" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="{{ $item['groupId'] }}">
                                                        {{ $item['groupId'] }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText center" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title=" {{ isset($chanelNames[$key]) ? $chanelNames[$key] : '' }}">
                                                        {{ isset($chanelNames[$key]) ? $chanelNames[$key] : '' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText center" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="{{ isset($routeNames[$key]) ? $routeNames[$key] : '' }}">
                                                        {{ isset($routeNames[$key]) ? $routeNames[$key] : '' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText center" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="{{ isset($personalNames[$key]) ? $personalNames[$key] : '' }}">
                                                        {{ isset($personalNames[$key]) ? $personalNames[$key] : '' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText center" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="{{ isset($productNames[$key]) ? $productNames[$key] : '' }}">
                                                        {{ isset($productNames[$key]) ? $productNames[$key] : '' }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="overText center" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="{{ $item['status'] }}">
                                                        {{ $item['status'] }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="table_actions d-flex justify-content-center">
                                                        <div class="btn test_btn-edit-{{ $item['id'] }}" href="#"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#suaca{{ $item['id'] }}">
                                                            <img style="width:16px;height:16px"
                                                                src="{{ asset('assets/img/edit.svg') }}" />
                                                        </div>
                                                        <div class="btn test_btn-remove-{{ $item['id'] }}" href="#"
                                                            data-bs-toggle="modal"
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
                                    <nav aria-label="Page navigation example" class="float-end mt-3"
                                        id="target-pagination">
                                        <ul class="pagination">
                                            {{-- @foreach ($documents->links as $link)
                                            <li class="page-item {{ $link->active ? 'active' : '' }}">
                                                <a class="page-link" href="{{ getPaginationLink($link, 'page') }}"
                                                    aria-label="Previous">
                                                    <span aria-hidden="true">{!! $link->label !!}</span>
                                                </a>
                                            </li>
                                            @endforeach --}}
                                        </ul>
                                    </nav>
                                </div>
                                <nav aria-label="Page navigation example" class="float-end mt-3" id="target-pagination">
                                    <ul class="pagination">
                                        {{-- @foreach ($listUsers->links as $link)
                                        <li class="page-item {{ $link->active ? 'active' : '' }}">
                                            <a class="page-link" href="{{ getPaginationLink($link, 'page') }}"
                                                aria-label="Previous">
                                                <span aria-hidden="true">{!! $link->label !!}</span>
                                            </a>
                                        </li>
                                        @endforeach --}}
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
<div class="modal fade editForm" id="suaca{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalLabel">Sửa khách hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formThemCapPhat" method="POST" action="{{ route('update.customer', ['id' => $item->id]) }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="card-title">1. Thông tin chung</div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" value="{{ $item->name }}" name="name" data-bs-toggle="tooltip" required
                                data-bs-placement="top" title="Tên khách hàng" placeholder="Tên khách hàng*"
                                class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <input type="text" value="{{ $item->phone }}" name="phone" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Số điện thoại" placeholder="Số điện thoại*"
                                class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" value="{{ $item->email }}" name="email" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Email" placeholder="Email*" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="card-title">2. Tổ chức</div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" value="{{ $item->comanyName }}" name="comanyName"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Tên công ty"
                                placeholder="Tên công ty" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" value="{{ $item->personContact }}" name="personContact"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Người đại diện"
                                placeholder="Người đại diện" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" value="{{ $item->career }}" name="career" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Chức danh" placeholder="Chức danh" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" value="{{ $item->taxCode }}" name="taxCode" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Mã số thuế" placeholder="Mã số thuế"
                                class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" value="{{ $item->companyPhoneNumber }}" name="companyPhoneNumber"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Số điện thoại công ty"
                                placeholder="Số điện thoại công ty" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" value="{{ $item->companyEmail }}" name="companyEmail"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Email công ty"
                                placeholder="Email công ty" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" value="{{ $item->accountNumber }}" name="accountNumber"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Số tài khoản"
                                placeholder="Số tài khoản" class="form-control">
                        </div>
                        <div class="col-md-8 mb-3">
                            <input type="text" value="{{ $item->bankOpen }}" name="bankOpen" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Mở tại ngân hàng" placeholder="Mở tại ngân hàng"
                                class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="card-title">3. Địa chỉ</div>
                        </div>
                        <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Tỉnh/thành">
                            <select class="selectpicker" required data-dropup-auto="false" data-width="100%"
                                data-live-search="true" title="{{ $item->city }}" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="city" id="city_edit"
                                data-live-search-placeholder="Tìm kiếm...">
                            </select>
                        </div>
                        <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Quận/huyện">
                            <select class="selectpicker" required data-dropup-auto="false" data-width="100%"
                                data-live-search="true" title="{{ $item->district }}" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="district" id="district_edit"
                                data-live-search-placeholder="Tìm kiếm...">
                            </select>
                        </div>
                        <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Phường/xã">
                            <select class="selectpicker" required data-dropup-auto="false" data-width="100%"
                                data-live-search="true" title="{{ $item->guide }}" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="guide" id="guide_edit"
                                data-live-search-placeholder="Tìm kiếm...">
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input id="editAddress" type="text" value="{{ $item->address }}" name="address"
                                data-bs-toggle="tooltip" required data-bs-placement="top" title="Địa chỉ"
                                placeholder="Địa chỉ*" class="form-control">
                        </div>
                        <div id="mapEdit" style="height: 300px;"></div>
                        <div class="col-md-12 mb-3">
                            <div class="card-title">4. Mô tả</div>
                        </div>

                        <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Nhân sự thu thập">
                            <select class="selectpicker" data-dropup-auto="false" data-width="100%" required
                                data-live-search="true" title="Nhân sự thu thập*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="personId"
                                data-live-search-placeholder="Tìm kiếm...">
                                @foreach ($listData as $items)
                                <option value="{{ $items->id }}" {{ $items->id == $item->id ? 'selected' : '' }}>
                                    {{ $items->personId }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Sản phẩm quan tâm">
                            <select class="selectpicker" data-dropup-auto="false" data-width="100%" required
                                data-live-search="true" title="Sản phẩm quan tâm*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="productId"
                                data-live-search-placeholder="Tìm kiếm...">
                                @foreach ($listData as $items)
                                <option value="{{ $items->id }}" {{ $items->id == $item->id ? 'selected' : '' }}>
                                    {{ isset($productNames[$key]) ? $productNames[$key] : '' }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="card-title">5. Phân loại</div>
                        </div>
                        <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Nhóm khách hàng">
                            <select class="selectpicker" data-dropup-auto="false" data-width="100%" required
                                data-live-search="true" title="Nhóm khách hàng*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="groupId"
                                data-live-search-placeholder="Tìm kiếm...">
                                @foreach ($listData as $items)
                                <option value="{{ $items->id }}" {{ $items->id == $item->id ? 'selected' : '' }}>
                                    {{ $items->groupId }}
                                </option>
                                @endforeach
                                <option value="1">Nhà thuốc</option>
                                <option value="2">Phòng khám/Trung tâm tế</option>
                                <option value="3">Bệnh viện</option>
                                <option value="4">Nhà phân phối</option>
                                <option value="5">Online</option>
                                <option value="6">Khách sạn</option>
                                <option value="7">Nhà thuốc S</option>
                                <option value="8">Siêu thị/Cửa hàng bán lẻ</option>
                                <option value="9">Chuỗi nhà thuốc</option>
                                <option value="10">Đại siêu thị</option>
                                <option value="11">Làm đẹp/Phòng tập thể dục/Thể thao
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Tuyến">
                            <select class="selectpicker" data-dropup-auto="false" data-width="100%" required
                                data-live-search="true" title="Tuyến*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="routeId"
                                data-live-search-placeholder="Tìm kiếm...">
                                @foreach ($listData as $items)
                                <option value="{{ $items->id }}" {{ $items->id == $item->id ? 'selected' : '' }}>
                                    {{ isset($routeNames[$key]) ? $routeNames[$key] : '' }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Kênh khách hàng">
                            <select class="selectpicker" data-dropup-auto="false" data-width="100%" required
                                data-live-search="true" title="Kênh khách hàng*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="chanelId"
                                data-live-search-placeholder="Tìm kiếm...">
                                <option value="ETC">ETC</option>
                                <option value="MT">MT</option>
                                <option value="Đại lý cá nhân">Đại lý cá nhân</option>
                                @foreach ($listData as $items)
                                <option value="{{ $items->id }}" {{ $items->id == $item->id ? 'selected' : '' }}>
                                    {{ isset($chanelNames[$key]) ? $chanelNames[$key] : '' }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Trạng thái">
                            <select class="selectpicker" data-dropup-auto="false" data-width="100%" required
                                data-live-search="true" title="Trạng thái*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="status"
                                data-live-search-placeholder="Tìm kiếm...">
                                <option value="Tiềm năng">Tiềm năng</option>
                                <option value="Cơ hội">Cơ hội</option>
                                <option value="Khách hàng">Khách hàng</option>
                                @foreach ($listData as $items)
                                <option value="{{ $items->id }}" {{ $items->id == $item->id ? 'selected' : '' }}>
                                    {{ $items->status }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger me-3" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach

<!-- Modal thêm khách hàng -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalLabel">Thêm khách hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formThemCapPhat" method="POST" action="{{ route('create-customer') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="card-title">1. Thông tin chung</div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="code" data-bs-toggle="tooltip" required data-bs-placement="top"
                                title="Mã khách hàng" placeholder="Mã khách hàng*" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="name" data-bs-toggle="tooltip" required data-bs-placement="top"
                                title="Tên khách hàng" placeholder="Tên khách hàng*" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <input type="text" name="phone" data-bs-toggle="tooltip" required data-bs-placement="top"
                                title="Số điện thoại" placeholder="Số điện thoại*" class="form-control">
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" name="email" data-bs-toggle="tooltip" required data-bs-placement="top"
                                title="Email" placeholder="Email*" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="card-title">2. Tổ chức</div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" name="companyName" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Tên công ty" placeholder="Tên công ty" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" name="personContact" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Người đại diện" placeholder="Người đại diện" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" name="career" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Chức danh" placeholder="Chức danh" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" name="taxCode" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Mã số thuế" placeholder="Mã số thuế" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" name="companyPhoneNumber" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Số điện thoại công ty"
                                placeholder="Số điện thoại công ty" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" name="companyEmail" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Email công ty" placeholder="Email công ty" class="form-control">
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="text" name="accountNumber" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Số tài khoản" placeholder="Số tài khoản" class="form-control">
                        </div>
                        <div class="col-md-8 mb-3">
                            <input type="text" name="bankOpen" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Mở tại ngân hàng" placeholder="Mở tại ngân hàng" class="form-control">
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="card-title">3. Địa chỉ</div>
                        </div>
                        <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Tỉnh/thành">
                            <select class="selectpicker" required data-dropup-auto="false" data-width="100%"
                                data-live-search="true" title="Tỉnh/thành*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="city" id="city"
                                data-live-search-placeholder="Tìm kiếm...">
                            </select>
                        </div>
                        <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Quận/huyện">
                            <select class="selectpicker" required data-dropup-auto="false" data-width="100%"
                                data-live-search="true" title="Quận/huyện*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="district" id="district"
                                data-live-search-placeholder="Tìm kiếm...">
                            </select>
                        </div>
                        <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Phường/xã">
                            <select class="selectpicker" required data-dropup-auto="false" data-width="100%"
                                data-live-search="true" title="Phường/xã*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="guide" id="guide"
                                data-live-search-placeholder="Tìm kiếm...">
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <input type="text" name="address" data-bs-toggle="tooltip" required data-bs-placement="top"
                                title="Địa chỉ" placeholder="Địa chỉ*" class="form-control" id="addressInput"
                                style="width: 80%; display: inline-block;">
                            <button type="button" class="btn btn-danger" id="searchButton"
                                style="display: inline-block; width: 17%; margin-left: 2%;">Tìm kiếm</button>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div id="sethPhatMap"></div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="card-title">4. Mô tả</div>
                        </div>

                        <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Nhân sự thu thập">
                            <select class="selectpicker" data-dropup-auto="false" data-width="100%" required
                                data-live-search="true" title="Nhân sự thu thập*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="personId" id="personId"
                                data-live-search-placeholder="Tìm kiếm...">
                            </select>
                        </div>
                        <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Sản phẩm quan tâm">
                            <select class="selectpicker" data-dropup-auto="false" data-width="100%" required
                                data-live-search="true" title="Sản phẩm quan tâm*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="productId[]" id="productId"
                                data-live-search-placeholder="Tìm kiếm..." multiple>
                            </select>
                        </div>


                        <div class="col-md-12 mb-3">
                            <div class="card-title">5. Phân loại</div>
                        </div>

                        <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Nhóm khách hàng">
                            <select class="selectpicker" data-dropup-auto="false" data-width="100%" required
                                data-live-search="true" title="Nhóm khách hàng*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="groupId" id="groupId"
                                data-live-search-placeholder="Tìm kiếm...">
                                <option value="Nhà thuốc">Nhà thuốc</option>
                                <option value="Phòng khám/Trung tâm tế">Phòng khám/Trung tâm tế</option>
                                <option value="Bệnh viện">Bệnh viện</option>
                                <option value="Nhà phân phối">Nhà phân phối</option>
                                <option value="Online">Online</option>
                                <option value="Khách sạn">Khách sạn</option>
                                <option value="Nhà thuốc S">Nhà thuốc S</option>
                                <option value="Siêu thị/Cửa hàng bán lẻ">Siêu thị/Cửa hàng bán lẻ</option>
                                <option value="Chuỗi nhà thuốc">Chuỗi nhà thuốc</option>
                                <option value="Đại siêu thị">Đại siêu thị</option>
                                <option value="Làm đẹp/Phòng tập thể dục/Thể thao">Làm đẹp/Phòng tập thể dục/Thể thao
                                </option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Tuyến">
                            <select class="selectpicker" data-dropup-auto="false" data-width="100%" required
                                data-live-search="true" title="Tuyến*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="routeId" id="routeId"
                                data-live-search-placeholder="Tìm kiếm...">
                            </select>
                        </div>

                        <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Kênh khách hàng">
                            <select class="selectpicker" data-dropup-auto="false" data-width="100%" required
                                data-live-search="true" title="Kênh khách hàng*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="chanelId" id="chanelId"
                                data-live-search-placeholder="Tìm kiếm...">
                            </select>
                        </div>
                        <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Trạng thái">
                            <select class="selectpicker" data-dropup-auto="false" data-width="100%" required
                                data-live-search="true" title="Trạng thái*" data-select-all-text="Chọn tất cả"
                                data-deselect-all-text="Bỏ chọn" data-size="3" name="status"
                                data-live-search-placeholder="Tìm kiếm...">
                                <option value="Trinh sát">Trinh sát</option>
                                <option value="Tiềm năng">Tiềm năng</option>
                                <option value="Cơ hội">Cơ hội</option>
                                <option value="Khách hàng">Khách hàng</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger me-3" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Thông tin khách hàng --}}
<div class="modal fade" id="info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="exampleModalLabel">Thông tin khách hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 mt-3">
                        <div class="d-flex align-items-center">
                            <div class="modal-title">Thông tin chung</div>
                        </div>
                        <div class="modal_list row">
                            <div class="modal_items col-sm-6">
                                Tên khách hàng: <span class="text-danger">Nguyễn Văn A</span>
                            </div>
                            <div class="modal_items col-sm-6">
                                Mã khách hàng:<span class="text-danger">KH0001</span>
                            </div>
                            <div class="modal_items col-sm-6">
                                Số điện thoại: <span class="text-danger">098888888888</span>
                            </div>
                            <div class="modal_items col-sm-6">
                                Email:<span class="text-danger">khtbht@gmail.com</span>
                            </div>
                            <div class="modal_items col-sm-6">
                                Địa chỉ:<span class="text-danger">219 Trung Kính, Cầu Giấy, Hà Nội</span>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <div class="d-flex align-items-center">
                            <div class="modal-title">Thông tin đầu mối liên hệ</div>
                        </div>
                        <div class="modal_list row">
                            <div class="modal_items col-sm-6">
                                Tên người liên hệ: <span class="text-danger">Nguyễn Văn A</span>
                            </div>
                            <div class="modal_items col-sm-6">
                                Danh xưng:<span class="text-danger">Chị</span>
                            </div>
                            <div class="modal_items col-sm-6">
                                Số điện thoại: <span class="text-danger">098888888888</span>
                            </div>
                            <div class="modal_items col-sm-6">
                                Email:<span class="text-danger">khtbht@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <div class="d-flex align-items-center">
                            <div class="modal-title">Quản lý khách hàng</div>
                        </div>
                        <div class="modal_list row">
                            <div class="modal_items col-sm-6">
                                Nhân sự phụ trách: <span class="text-danger">Nguyễn Văn A</span>
                            </div>
                            <div class="modal_items col-sm-6">
                                Nhóm khách hàng <span class="text-danger"></span>
                            </div>
                            <div class="modal_items col-sm-6">
                                Kênh khách hàng: <span class="text-danger">Nhà thuốc</span>
                            </div>
                            <div class="modal_items col-sm-6">
                                Tuyến:<span class="text-danger">Thứ 2</span>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger me-3" data-bs-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>
</div>

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
    $("#guide").change(() => { })


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
    $("#guide_edit").change(() => { })



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

</script>


<script>
    var mapObj = null;
    var zoomLevel = 7;
    // var defaultCoord = [10.7743, 106.6669]
    var mapConfig = {
        attributionControl: true,
        // center: defaultCoord,
        zoom: zoomLevel,
    };
    window.onload = function () {
        // init map
        mapObj = L.map('sethPhatMap', mapConfig);

        // add tile để map có thể hoạt động
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapObj);

    }
    document.getElementById('searchButton').addEventListener('click', function () {
        mapObj.invalidateSize();
        var address = document.getElementById('addressInput').value;
        var xhr = new XMLHttpRequest();
        var url = nominatimUrl = 'https://nominatim.openstreetmap.org/search?q=' + encodeURI(address) + '&format=json';
        $.ajax({
            url: nominatimUrl,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.length > 0) {
                    var result = data[0];
                    var name = result.display_name;
                    var lat = parseFloat(result.lat);
                    var lon = parseFloat(result.lon);

                    // Tạo marker với kết quả tìm kiếm
                    addMarker([lat, lon], name, {}, {
                        title: name
                    });

                    // Di chuyển tới vị trí tìm kiếm
                    mapObj.setView([lat, lon], 10);
                } else {
                    alert('Không tìm thấy kết quả phù hợp.');
                    // Sử dụng defaultCoord nếu không tìm thấy kết quả phù hợp
                    mapObj.setView(defaultCoord, zoomLevel);
                }
            },
            error: function (xhr, status, error) {
                alert('Đã xảy ra lỗi trong quá trình tìm kiếm.');
                // Sử dụng defaultCoord nếu có lỗi trong quá trình tìm kiếm
                mapObj.setView(defaultCoord, zoomLevel);
            }
        });
        // tạo marker
        var popupOption = {
            className: "map-popup-content",
        };
        function addMarker(coord, popupContent, popupOptionObj, markerObj) {
            if (!popupOptionObj) {
                popupOptionObj = {};
            }
            if (!markerObj) {
                markerObj = {};
            }

            var marker = L.marker(coord, markerObj).addTo(mapObj);
            var popup = L.popup(popupOptionObj);
            popup.setContent(popupContent);

            // binding
            marker.bindPopup(popup);

            return marker;
        }
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
    updateList = function (e) {
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
    $(document).ready(function () {

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
        }).on('show.daterangepicker', function (ev, picker) {
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
    $(document).ready(function () {
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
                success: function (response) {
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
                error: function (xhr, status, error) {
                    console.log("An error occurred while geocoding: " + error);
                }
            });
        }

        // Event handler for focusout event on address input
        $('#addressInput').on('focusout', function () {
            var address = $(this).val();
            $("#map").show();
            geocodeAddress(address);
        });

        // Bind an event handler to the pop-up event
        $('.editForm').on('shown.bs.modal', function () {
            // Retrieve the value of the input with ID "editAddress" within the current modal
            var addressValue = $(this).find('#editAddress').val();
            geocodeAddressEdit(addressValue);

            $(this).find('#editAddress').on('focusout', function () {
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
                    success: function (response) {
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
                    error: function (xhr, status, error) {
                        console.log("An error occurred while geocoding: " + error);
                    }
                });
            }
        });
    });
</script>
@endsection