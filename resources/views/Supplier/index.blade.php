@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách nhà cung cấp')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
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
        return route('Supplier.index', $queryString);
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
    {{-- @include('template.sidebar.sidebarDepartment.sidebarLeft') --}}
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Danh sách nhà cung cấp</h5>
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
                                                            data-bs-toggle="modal" data-bs-target="#addSupplier">Thêm
                                                            mới</button>
                                                    </div>
                                                @endif

                                            </div>
                                            <form id="select-form" action="{{ route('Supplier.delete') }}"
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

                                                    <table id="dsNhaCungCap" style="width: 150%;"
                                                        class="table table-responsive table-hover table-bordered filter">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-nowrap text-center" style="width:1%"><input
                                                                        type="checkbox" id="select-all"></th>
                                                                <th class="text-nowrap text-center" style="width:2%">STT
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:10%">Trạng
                                                                    thái</th>
                                                                <th class="text-nowrap text-center" style="width:10%">Mã NCC
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:20%">Tên
                                                                    NCC
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:10%">Người
                                                                    liên hệ
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:10%">Số
                                                                    điện thoại
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:10%">Email
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:10%">Mã số
                                                                    thuế
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:20%">Địa
                                                                    chỉ
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:10%">Hạn
                                                                    mức công nợ
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:10%">Số
                                                                    ngày được nợ
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
                                                        <?php $t = 1; ?>
                                                        {{-- @foreach ($supplierList as $item)
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center"> <input type="checkbox"
                                                                            name="selected_items[]"
                                                                            value="{{ $item->id }}">
                                                                    </td>
                                                                    <td class=" text-center">
                                                                        {{ $t++ }}
                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->name }}">
                                                                            {{ $item->name }}
                                                                        </div>
                                                                    </td>
                                                                    <td class="">
                                                                        <a style="color: black; text-decoration: underline;"
                                                                            href="{{ route('department.index2', ['department_id' => $item->id]) }}">
                                                                            <div class="overText" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="{{ $item->code }}">
                                                                                {{ $item->code }}
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
                                                    @foreach ($supplierList as $item)
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="checkbox" name="selected_items[]" value="{{ $item->id }}">
                                                                </td>
                                                                <td>
                                                                    <div class="overText text-center"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="">
                                                                        {{ $supplierList->total() - $loop->index - ($supplierList->currentPage() - 1) * $supplierList->perPage() }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="overText text-center"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="">
                                                                        @switch($item->status)
                                                                        @case(0)
                                                                            <span class="badge bg-danger">
                                                                                Ngưng hợp tác
                                                                            </span>
                                                                        @break

                                                                        @case(1)
                                                                            <span class="badge bg-success">
                                                                                Đang hợp tác
                                                                            </span>
                                                                        @break

                                                                        @default
                                                                            <span></span>
                                                                        @break
                                                                    @endswitch
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="overText text-center"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="">
                                                                        {{ $item->code }}
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#chiTietNhaCungCap{{ $item->id }}"
                                                                        style="background: transparent">
                                                                        <div class="text-wrap btn-show_detail"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->name }}">
                                                                            {{ $item->name }}
                                                                        </div>
                                                                    </button>
                                                                </td>
                                                                <td>
                                                                    <div class="overText text-center"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title=" {{ $item->contact_name }}">
                                                                        {{ $item->contact_name }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="overText text-center"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ $item->contact_phone }}">
                                                                        {{ $item->contact_phone }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="overText text-center"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ $item->contact_name }}">
                                                                        {{ $item->contact_email }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="overText text-center"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ $item->tax_code }}">
                                                                        {{ $item->tax_code }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="text-wrap text-center"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ $item->address }}">
                                                                        {{ $item->address }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="overText text-center"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ $item->debt_limit }}">
                                                                        {{ $item->debt_limit }}
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="overText text-center"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="{{ $item->days_owed }}">
                                                                        {{ $item->days_owed }}
                                                                    </div>
                                                                </td>
                                                                @if (session('user')['role_id'] == '1')
                                                                    <td
                                                                        style="background: #fff; position: sticky; right: 0;">
                                                                        <div
                                                                            class="table_actions d-flex justify-content-center">
                                                                            <div data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Sửa ">
                                                                                <div class="btn" data-bs-toggle="modal"
                                                                                    data-bs-target="#suaNhaCungCap{{ $item->id }}">
                                                                                    <img style="width:16px;height:16px"
                                                                                        src="{{ asset('assets/img/edit.svg') }}" />
                                                                                </div>
                                                                            </div>
                                                                            <div data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Xóa">
                                                                                <div class="btn" data-bs-toggle="modal"
                                                                                    data-bs-target="#xoaNhaCungCap{{ $item->id }}">
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
                                                            {{ $supplierList->appends([
                                                                    'search' => $search,
                                                                ])->links() }}
                                                        </ul>
                                                    </nav>
                                                </div>
                                                <nav aria-label="Page navigation example" class="float-end mt-3" id="target-pagination">
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
                                        <select name="parent" required class="selectpicker" data-dropup-auto="false"
                                            data-live-search="true">
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
                                        <select name="ib_lead" class="selectpicker" data-dropup-auto="false"
                                            data-live-search="true">
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
                        <form action="{{ route('departmentr.destroy', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}

    {{-- Sửa nhà cung cấp --}}
@foreach ($supplierList as $item)
    <div class="modal fade" id="suaNhaCungCap{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Sửa nhà cung cấp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('Supplier.update', $item->id) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3 mb-3">
                            <div class="col-lg-12">
                                <h3 class="modal-title">Thông tin chung</h3>
                            </div>
                            <div class="col-lg-4">
                                <input name="name" required type="text" placeholder="Tên nhà cung cấp*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Tên nhà cung cấp*" value="{{ $item->name }}">

                            </div>
                            <div class="col-lg-4">
                                <input name="code" required type="text" placeholder="Mã nhà cung cấp*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Mã nhà cung cấp*" value="{{ $item->code }}">
                            </div>
                            <div class="col-lg-4">
                                <input name="business_areas" type="text" placeholder="Lĩnh vực kinh doanh"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Lĩnh vực kinh doanh" value="{{ $item->business_areas }}">
                            </div>
                            <div class="col-lg-4">
                                <input name="tax_code" type="text" placeholder="Mã số thuế"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Mã số thuế" value="{{ $item->tax_code }}">
                            </div>
                            <div class="col-lg-4">
                                <input name="representative" type="text" placeholder="Người đại diện"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Người đại diện" value="{{ $item->representative }}">
                            </div>
                            <div class="col-lg-4">
                                <input name="job_title" type="text" placeholder="Chức danh"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Chức danh" value="{{ $item->job_title }}">
                            </div>
                            <div class="col-lg-4">
                                <input name="bank_number" type="text" placeholder="Số tài khoản"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Số tài khoản" value="{{ $item->bank_number }}">
                            </div>
                            <div class="col-lg-8">
                                <input name="bank_name" type="text" placeholder="Mở ngân hàng tại"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Mở ngân hàng tại" value="{{ $item->bank_name }}">
                            </div>
                            <div class="col-lg-12">
                                <input name="address" type="text" placeholder="Địa chỉ" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Địa chỉ"
                                    value="{{ $item->address }}">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-lg-12">
                                <h3 class="modal-title">Người liên hệ</h3>
                            </div>
                            <div class="col-lg-4">
                                <input name="contact_name" type="text" placeholder="Tên người liên hệ"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Tên người liên hệ" value="{{ $item->contact_name }}">
                            </div>
                            <div class="col-lg-4">
                                <input name="contact_phone" type="number" placeholder="SĐT người liên hệ"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="SĐT người liên hệ" value="{{ $item->contact_phone }}">
                            </div>
                            <div class="col-lg-4">
                                <input name="contact_email" type="text" placeholder="Email người liên hệ"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Email người liên hệ" value="{{ $item->contact_email }}">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-lg-12">
                                <h3 class="modal-title">Công nợ</h3>
                            </div>
                            <div class="col-lg-4">
                                <input name="debt_limit" type="number" placeholder="Hạn mức công nợ"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Hạn mức công nợ" value="{{ $item->debt_limit }}">
                            </div>
                            <div class="col-lg-4">
                                <input name="days_owed" type="number" placeholder="Số ngày được nợ"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Số ngày được nợ" value="{{ $item->days_owed }}">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-lg-12">
                                <h3 class="modal-title">Trạng thái</h3>
                            </div>
                            <div class="col-lg-4">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Trạng thái">
                                    <select name="status" class="selectpicker">
                                        @if ($item->status == 1)
                                        <option disabled>Chọn trạng thái
                                        </option>
                                        <option value="1" selected>Đang hợp tác
                                        </option>
                                        <option value="0">Ngừng hợp tác
                                        </option>
                                        @else
                                        <option disabled>Chọn trạng thái
                                        </option>
                                        <option value="1">Đang hợp tác
                                        </option>
                                        <option value="0" selected>Ngừng hợp tác
                                        </option>
                                        @endif
                                    </select>
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

    {{-- Chi tiết nhà cung cấp --}}
    <div class="modal fade" id="chiTietNhaCungCap{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Chi tiết nhà cung cấp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3 mb-3">
                        <div class="col-lg-12">
                            <h3 class="modal-title">Thông tin chung</h3>
                        </div>
                        <div class="col-lg-4">
                            <input name="name" required type="text" placeholder="Tên nhà cung cấp*"
                                class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Tên nhà cung cấp*" value="{{ $item->name }}" disabled>

                        </div>
                        <div class="col-lg-4">
                            <input name="code" required type="text" placeholder="Mã nhà cung cấp*"
                                class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Mã nhà cung cấp*" value="{{ $item->code }}" disabled>
                        </div>
                        <div class="col-lg-4">
                            <input name="name" required type="text" placeholder="Lĩnh vực kinh doanh"
                                class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Lĩnh vực kinh doanh" value="{{ $item->business_areas }}" disabled>
                        </div>
                        <div class="col-lg-4">
                            <input name="name" required type="text" placeholder="Mã số thuế" class="form-control"
                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Mã số thuế"  value="{{ $item->tax_code }}" disabled>
                        </div>
                        <div class="col-lg-4">
                            <input name="name" required type="text" placeholder="Người đại diện"
                                class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Người đại diện" value="{{ $item->representative }}" disabled>
                        </div>
                        <div class="col-lg-4">
                            <input name="name" required type="text" placeholder="Chức danh" class="form-control"
                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Chức danh" value="{{ $item->job_title }}" disabled>
                        </div>
                        <div class="col-lg-4">
                            <input name="name" required type="text" placeholder="Số tài khoản"
                                class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Số tài khoản" value="{{ $item->bank_number }}" disabled>
                        </div>
                        <div class="col-lg-8">
                            <input name="name" required type="text" placeholder="Mở ngân hàng tại"
                                class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Mở ngân hàng tại" value="{{ $item->bank_name }}" disabled>
                        </div>
                        <div class="col-lg-12">
                            <input name="name" required type="text" placeholder="Địa chỉ" class="form-control"
                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Địa chỉ"
                                value="{{ $item->address }}" disabled>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-lg-12">
                            <h3 class="modal-title">Người liên hệ</h3>
                        </div>
                        <div class="col-lg-4">
                            <input name="name" required type="text" placeholder="Tên người liên hệ"
                                class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Tên người liên hệ" value="{{ $item->contact_name }}" disabled>
                        </div>
                        <div class="col-lg-4">
                            <input name="code" required type="text" placeholder="SĐT người liên hệ"
                                class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="SĐT người liên hệ" value="{{ $item->contact_phone }}" disabled>
                        </div>
                        <div class="col-lg-4">
                            <input name="name" required type="text" placeholder="Email người liên hệ"
                                class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Email người liên hệ" value="{{ $item->contact_email }}" disabled>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-lg-12">
                            <h3 class="modal-title">Công nợ</h3>
                        </div>
                        <div class="col-lg-4">
                            <input name="name" required type="text" placeholder="Hạn mức công nợ"
                                class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Hạn mức công nợ" value="{{ $item->debt_limit }}" disabled>
                        </div>
                        <div class="col-lg-4">
                            <input name="code" required type="text" placeholder="Số ngày được nợ"
                                class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Số ngày được nợ" value="{{ $item->days_owed }}" disabled>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-lg-12">
                            <h3 class="modal-title">Trạng thái</h3>
                        </div>
                        <div class="col-lg-4">
                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Trạng thái">
                                <select name="" class="selectpicker" disabled>
                                    @if ($item->status == 1)
                                    <option value="1" selected>Đang hợp tác
                                    </option>
                                    <option value="0">Ngừng hợp tác
                                    </option>
                                    @else
                                    <option value="1">Đang hợp tác
                                    </option>
                                    <option value="0" selected>Ngừng hợp tác
                                    </option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Xóa nhà cung cấp --}}
    <div class="modal fade" id="xoaNhaCungCap{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Xóa nhà cung cấp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có thực sự muốn xoá nhà cung cấp này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                    <form action="{{ route('Supplier.destroy', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
    <!-- Modal Thêm mới nhà cung cấp -->
    <div class="modal fade" id="addSupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h1 class="modal-title w-100" id="exampleModalLabel">Thêm nhà cung cấp</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addForm" action="{{ route('Supplier.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3 mb-3">
                            <div class="col-lg-12">
                                <h3 class="modal-title">Thông tin chung</h3>
                            </div>
                            <div class="col-lg-4">
                                <input name="name" required type="text" placeholder="Tên nhà cung cấp*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Tên nhà cung cấp*">
                            </div>
                            <div class="col-lg-4">
                                <input name="code" required type="text" placeholder="Mã nhà cung cấp*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Mã nhà cung cấp*">
                            </div>
                            <div class="col-lg-4">
                                <input name="business_areas" type="text" placeholder="Lĩnh vực kinh doanh"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Lĩnh vực kinh doanh">
                            </div>
                            <div class="col-lg-4">
                                <input name="tax_code" type="text" placeholder="Mã số thuế"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Mã số thuế">
                            </div>
                            <div class="col-lg-4">
                                <input name="representative" type="text" placeholder="Người đại diện"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Người đại diện">
                            </div>
                            <div class="col-lg-4">
                                <input name="job_title" type="text" placeholder="Chức danh"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Chức danh">
                            </div>
                            <div class="col-lg-4">
                                <input name="bank_number" type="text" placeholder="Số tài khoản"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Số tài khoản">
                            </div>
                            <div class="col-lg-8">
                                <input name="bank_name" type="text" placeholder="Mở ngân hàng tại"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Mở ngân hàng tại">
                            </div>
                            <div class="col-lg-12">
                                <input name="address" type="text" placeholder="Địa chỉ" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Địa chỉ">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-lg-12">
                                <h3 class="modal-title">Người liên hệ</h3>
                            </div>
                            <div class="col-lg-4">
                                <input name="contact_name" type="text" placeholder="Tên người liên hệ"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Tên người liên hệ">
                            </div>
                            <div class="col-lg-4">
                                <input name="contact_phone" type="number" placeholder="SĐT người liên hệ"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="SĐT người liên hệ">
                            </div>
                            <div class="col-lg-4">
                                <input name="contact_email" type="text" placeholder="Email người liên hệ"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Email người liên hệ">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-lg-12">
                                <h3 class="modal-title">Công nợ</h3>
                            </div>
                            <div class="col-lg-4">
                                <input name="debt_limit" type="number" placeholder="Hạn mức công nợ"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Hạn mức công nợ">
                            </div>
                            <div class="col-lg-4">
                                <input name="days_owed" type="number" placeholder="Số ngày được nợ"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Số ngày được nợ">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-lg-12">
                                <h3 class="modal-title">Trạng thái</h3>
                            </div>
                            <div class="col-lg-4">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Trạng thái">
                                    <select name="status" class="selectpicker">
                                        <option disabled>Chọn trạng thái
                                        </option>
                                        <option value="1">Đang hợp tác
                                        </option>
                                        <option value="0">Ngừng hợp tác
                                        </option>
                                    </select>
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
                                                <option value="{{ $item->parent }}">{{ $item->donvime->name }}</option>
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
