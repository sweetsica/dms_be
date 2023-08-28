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
        .textsm
        {
            font-size:20px;
        }
        .card-title-black 
        {
            margin-bottom: 10px;
        }  
        .table_left tr th
        {
            color: var(--primary-color);
            width: 20%;
        }
        .text_body1
        {   
            margin-right: 85%;
        }
        .table_left tr td
        {
            text-align: right;
            width: 80%;
        }
        .table_right tr th
        {
            color: var(--primary-color);
            margin-left: 30%;
        }
        .table_right tr td
        {
            text-align: right;           
        }
        .table_right
        {
        }
        .text_title2 
        {
            margin-left: 15%;
        }
        .modal-body 
        {
            padding: 3%;
        }
    </style>
@endsection

@section('content')
    {{-- @include('template.sidebar.sidebarDepartment.sidebarLeft') --}}
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
                                                                <th class="text-nowrap text-center" style="width:2%">
                                                                    STT
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:8%">
                                                                    Trạng thái
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:8%">
                                                                    Mã đơn đặt hàng
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:8%">
                                                                    Mã khách hàng
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:13%">
                                                                    Tên khách hàng
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:16%">
                                                                    Địa chỉ
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:6%">
                                                                    Ngày lập
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:6%">
                                                                    Người lập
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:6%">
                                                                    Tổng tiền
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:6%">
                                                                    Người duyệt
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:10%">
                                                                    Hình thức thanh toán
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:6%">
                                                                    Ghi chú
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
                                                                        {{ $t++ }}
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
                                                                <td>
                                                                    <div class="overText text-center"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title=" {{ $item->contact_name }}">
                                                                        {{ $item->contact_name }}
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
                                                                <td>
                                                                    <div class="overText text-center"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="">
                                                                        
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

    {{-- Chi tiết đơn đặt hàng --}}
    <div class="modal fade" id="chiTietNhaCungCap{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Đơn đặt hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3 mb-3">                        
                        <div class="row g-2 mb-3">
                            <div class="col-lg-3">
                                <input name="name" required type="text" placeholder="Mã đơn đặt hàng"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Mã đơn đặt hàng" value="" disabled>

                            </div>
                            <div class="col-lg-3">
                                <input name="code" required type="text" placeholder="Mã khách hàng"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Mã khách hàng" value="" disabled>
                            </div>
                            <div class="col-lg-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tuyến">
                                    <select name="manage" class="selectpicker" title="Chọn tuyến" 
                                        data-dropup-auto="false" data-live-search="true" disabled>
                                        <option value="" selected>Tuyến</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ngày lập">
                                        <input type="text" id="bd" readonly
                                            value="{{ date('d/m/Y', strtotime('2023-08-25')) }}"
                                            class="form-control">
                                        <i class="bi bi-calendar-plus style_pickdate"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <input name="name" required type="text" placeholder="Tên khách hàng" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" 
                                    title="Tên khách hàng"  value="" disabled>
                            </div>
                            <div class="col-lg-3">
                                <input name="name" required type="text" placeholder="Số điện thoại"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Số điện thoại" value="" disabled>
                            </div>
                            <div class="col-lg-3">
                                <input name="name" required type="text" placeholder="Email" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" 
                                    title="Email" value="" disabled>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ngày giao">
                                        <input type="text" id="bd" readonly
                                            value="{{ date('d/m/Y', strtotime('2023-08-25')) }}"
                                            class="form-control">
                                        <i class="bi bi-calendar-plus style_pickdate"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <input name="name" required type="text" placeholder="Địa chỉ"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Địa chỉ" value="" disabled>
                            </div>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-lg-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hình thức thanh toán">
                                    <select name="manage" class="selectpicker" title="Hình thức thanh toán" 
                                        data-dropup-auto="false" data-live-search="true" disabled>
                                        <option value="" selected>Tiền mặt</option>
                                        <option value="" >Chuyển khoản</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <input name="name" required type="text" placeholder="Ghi chú"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Ghi chú" value="" disabled>
                            </div>
                        </div>                        
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-lg-12 mb-3">
                            <h5 class="modal-title">Danh sách sản phẩm</h5>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive mb-3" style="min-height: 150px">
                                    <table id="contact" class="table table-responsive table-hover table-bordered"
                                        style="width: 150%">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap text-center">Mã sản phẩm</th>
                                                <th class="text-nowrap text-center" style="width: 10%;">Tên sản phẩm
                                                </th>
                                                <th class="text-nowrap text-center" style="width: 8%;">Hạn sử dụng
                                                </th>
                                                <th class="text-nowrap text-center" style="width: 5%;">Số lô</th>
                                                <th class="text-nowrap text-center" style="width: 5%;">ĐVT
                                                </th>
                                                <th class="text-nowrap text-center" style="width: 5%;">Số lượng</th>
                                                <th class="text-nowrap text-center" style="width: 8%;">Đơn giá
                                                </th>
                                                <th class="text-nowrap text-center" style="width: 8%;">Tổng đơn </th>
                                                <th class="text-nowrap text-center" style="width: 5%;">Tỷ lệ CK (%)
                                                </th>
                                                <th class="text-nowrap text-center" style="width: 8%;">Chiết khấu</th>
                                                <th class="text-nowrap text-center" style="width: 8%;">Tiền trước thuế
                                                </th>
                                                <th class="text-nowrap text-center" style="width: 5%;">Thuế suất (%)
                                                </th>
                                                <th class="text-nowrap text-center" style="width: 8%;">Tiền thuế</th>
                                                <th class="text-nowrap text-center" style="width: 8%;">Tiền sau thuế
                                                </th>
                                                <th class="text-nowrap text-center" style="width: 10%;">Ghi chú</th>
                                                <th> <i class="bi bi-plus fs-3 add-spec_edit"
                                                        style="color: var(--primary-color);cursor: pointer;"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody id="specifications_edit">
                                            <tr>
                                                <td class="text-center">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Mã sản phẩm">
                                                        <select class="selectpicker" data-dropup-auto="false"
                                                            data-width="100%" data-live-search="true"
                                                            title="Chọn mã sản phẩm"
                                                            data-select-all-text="Mã sản phẩm"
                                                            data-deselect-all-text="Bỏ chọn" data-size="3"
                                                            name="data[0][key1]"
                                                            data-live-search-placeholder="Tìm kiếm..."
                                                            id="selectCodeProductEdit_0">
                                                            <option value="Xe điện GODLF" selected>GODLF
                                                            </option>
                                                            <option value="Xe máy XSR155">XSR155
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <input id="nameProductEdit_0" class="nameProduct form-control"
                                                        disabled>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" name="data[0][key2]"
                                                        value="2023-09-30">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key3]"
                                                        value="30">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="data[0][key4]"
                                                        value="Chiếc">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key5]"
                                                        id="soLuongEdit_0" value="50">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key6]"
                                                        id="donGiaEdit_0" value="2000000">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key7]"
                                                        id="tongGiaEdit_0" disabled value="1000000000">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key8]"
                                                        id="tiLeCKEdit_0" value="2">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key9]"
                                                        id="CKEdit_0" disabled value="20000000">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key10]"
                                                        id="tienTruocThueEdit_0" disabled value="98000000">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key11]"
                                                        id="thueSuatEdit_0" value="10">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key12]"
                                                        id="tienThueEdit_0" disabled value="9800000">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key13]"
                                                        id="tienSauThueEdit_0" disabled value="107800000">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="data[0][key14]">
                                                </td>
                                                <td class="text-center">
                                                    <i class="bi bi-trash fs-3 remove-spec_edit"
                                                        style="color: var(--primary-color);cursor: pointer;"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    <div data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                        title="Mã sản phẩm">
                                                        <select class="selectpicker" data-dropup-auto="false"
                                                            data-width="100%" data-live-search="true"
                                                            title="Chọn mã sản phẩm"
                                                            data-select-all-text="Mã sản phẩm"
                                                            data-deselect-all-text="Bỏ chọn" data-size="3"
                                                            name="data[0][key1]"
                                                            data-live-search-placeholder="Tìm kiếm..."
                                                            id="selectCodeProductEdit_1">
                                                            <option value="Xe điện GODLF" selected>GODLF
                                                            </option>
                                                            <option value="Xe máy XSR155">XSR155
                                                            </option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <input id="nameProductEdit_1" class="nameProduct form-control"
                                                        disabled>
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" name="data[0][key2]"
                                                        value="2023-09-30">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key3]"
                                                        value="30">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="data[0][key4]"
                                                        value="Chiếc">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key5]"
                                                        id="soLuongEdit_1" value="50">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key6]"
                                                        id="donGiaEdit_1" value="2000000">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key7]"
                                                        id="tongGiaEdit_1" disabled value="1000000000">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key8]"
                                                        id="tiLeCKEdit_1" value="2">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key9]"
                                                        id="CKEdit_1" disabled value="20000000">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key10]"
                                                        id="tienTruocThueEdit_1" disabled value="98000000">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key11]"
                                                        id="thueSuatEdit_1" value="10">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key12]"
                                                        id="tienThueEdit_1" disabled value="9800000">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="data[0][key13]"
                                                        id="tienSauThueEdit_1" disabled value="107800000">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="data[0][key14]">
                                                </td>
                                                <td class="text-center">
                                                    <i class="bi bi-trash fs-3 remove-spec_edit"
                                                        style="color: var(--primary-color);cursor: pointer;"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="display: grid; grid-template-columns: auto auto auto auto auto; gap: 20px"
                                    class="mb-3">
                                    <div>
                                        <div class="text-center">
                                            <span class="modal-title">Tổng tiền hàng</span>
                                            <div class="border p-3 mt-3">
                                                <span class="fw-bold fs-5" id="sumTienHangEdit"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-center">
                                            <span class="modal-title">Tổng tiền chiết khấu</span>
                                            <div class="border p-3 mt-3">
                                                <span class="fw-bold fs-5" id="sumTienChietKhauEdit"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-center">
                                            <span class="modal-title">Tổng tiền trước thuế</span>
                                            <div class="border p-3 mt-3">
                                                <span class="fw-bold fs-5" id="sumTienTruocThueEdit"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-center">
                                            <span class="modal-title">Tổng tiền thuế</span>
                                            <div class="border p-3 mt-3">
                                                <span class="fw-bold fs-5" id="sumTienThueEdit"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-center">
                                            <span class="modal-title">Tổng thanh toán</span>
                                            <div class="border p-3 mt-3">
                                                <span class="fw-bold fs-5" id="sumThanhToanEdit"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <span class="modal-title"> Số tiền bằng chữ:</span>
                                    </div>

                                    <div class="col-lg-12 mb-3">
                                        <input class="form-control" type="text"
                                            placeholder="Nhập số tiền bằng chữ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-lg-12">
                            <h3 class="modal-title">Sản phẩm khuyến mại</h3>
                        </div>
                        <table class="table">
                            <thead>
                                <th>123</th>
                                <th>123</th>
                                <th>123</th>
                            </thead>
                            <tbody>
                                <td>123</td>
                                <td>123</td>
                                <td>123</td>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="row g-3 mb-3" style="border-bottom:1px solid black; margin-top:20px;"></div>                    

                    <div class="row g-3 mb-3">                        
                        <div class="col-lg-9">
                            <table class="table table-borderless table_left">
                                <tr>
                                    <th>
                                        <span>Tổng tiền hàng:</span>
                                    </th>
                                    <td>
                                        <span class="text_body1">100.000.000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <span>Tổng tiền chiết khấu:</span>
                                    </th>
                                    <td>
                                        <span class="text_body1">100.000.000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <span>Tổng tiền trước thuế:</span>
                                    </th>
                                    <td>
                                        <span class="text_body1">100.000.000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <span>Tổng tiền thuế:</span>
                                    </th>
                                    <td>
                                        <span class="text_body1">100.000.000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <span>Tổng thanh toán:</span>
                                    </th>
                                    <td>
                                        <span class="text_body1">100.000.000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <span>Số tiền bằng chữ:</span>
                                    </th>
                                    <td style="text-align: left">
                                        <span style="margin-left:3%">Một trăm triệu đồnggggggg</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-3">
                            <table class="table table-borderless table_right">
                                <tr>
                                    <th>
                                        <span class="text_title2">Thanh toán trước:</span>
                                    </th>
                                    <td>
                                        <span>100.000.000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <span class="text_title2">Số tiền còn lại:</span>
                                    </th>
                                    <td>
                                        <span>100.000.000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <span class="text_title2">Hạn mức công nợ:</span>
                                    </th>
                                    <td>
                                        <span>100.000.000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <span class="text_title2">Dư nợ hiện tại:</span>
                                    </th>
                                    <td>
                                        <span>100.000.000</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <span class="text_title2">Hạn thanh toán:</span>
                                    </th>
                                    <td>
                                        <span>100.000.000</span>
                                    </td>
                                </tr>                                
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

@endsection