@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách kho')
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
                        <h5 class="mainSection_heading-title">Danh sách kho</h5>
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
                                                            data-bs-toggle="modal" data-bs-target="#addKho">Thêm
                                                            mới</button>
                                                    </div>
                                                @endif

                                            </div>
                                            <form id="select-form" action="{{ route('WareHouse.delete') }}"
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
                                                                <th class="text-nowrap text-center" style="width: 5%">Mã
                                                                    kho
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 10%">Tên
                                                                    kho
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 5%">Phân
                                                                    loại</th>
                                                                <th class="text-nowrap text-center" style="width: 10%">Mô tả
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 15%">Địa
                                                                    chỉ
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 10%">Người
                                                                    quản lý
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 10%">Kế
                                                                    toán phụ trách
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width: 8%">Trạng
                                                                    thái
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
                                                    <?php $k = 1 ?>
                                                    @foreach ($wareHouseList as $item)
                                                        <?php $accountant_name = $item->accountant ?>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center"> <input type="checkbox"
                                                                        name="selected_items[]" value="{{ $item->id }}">
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $k++ }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $item->code }}
                                                                </td>
                                                                <td class="text-center">
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#chiTietKho{{ $item->id }}"
                                                                        style="background: transparent">
                                                                        <div class="text-wrap text-center btn-show_detail"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="{{ $item->name }}">
                                                                            {{ $item->name }}
                                                                        </div>
                                                                    </button>
                                                                </td>
                                                                <td class="text-center">
                                                                    @switch($item->classify)
                                                                        @case(0)
                                                                            <span>
                                                                                Kho công ty
                                                                            </span>
                                                                        @break

                                                                        @case(1)
                                                                            <span>
                                                                                Kho nhà phân phối
                                                                            </span>
                                                                        @break  

                                                                        @case(2)
                                                                            <span>
                                                                                Kho bán lẻ
                                                                            </span>
                                                                        @break                                                                       

                                                                        @default
                                                                            <span></span>
                                                                        @break
                                                                    @endswitch   
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $item->description }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $item->address }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $item->manage_name }}
                                                                </td>
                                                                <td class="text-center">
                                                                    @foreach($listUsers as $user)
                                                                        @if ($accountant_name == $user->id)
                                                                        {{ $user->name ?? '' }}
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                                <td class="text-center">
                                                                    @switch($item->status)
                                                                        @case(0)
                                                                            <span class="badge bg-danger">
                                                                                Ngưng hoạt động
                                                                            </span>
                                                                        @break

                                                                        @case(1)
                                                                            <span class="badge bg-success">
                                                                                Đang hoạt động
                                                                            </span>
                                                                        @break                                                                        

                                                                        @default
                                                                            <span></span>
                                                                        @break
                                                                    @endswitch   
                                                                </td>
                                                                <td class="text-center"
                                                                    style="background: #fff; position: sticky; right: 0;">
                                                                    <div
                                                                        class="table_actions d-flex justify-content-center">
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Sửa ">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#suaKho{{ $item->id }}">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/edit.svg') }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Xóa">
                                                                            <div class="btn" data-bs-toggle="modal"
                                                                                data-bs-target="#xoaKho{{ $item->id }}">
                                                                                <img style="width:16px;height:16px"
                                                                                    src="{{ asset('assets/img/trash.svg') }}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
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
@foreach ($wareHouseList as $item)
    <div class="modal fade" id="suaKho{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Sửa kho</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addForm" action="{{ route('WareHouse.update', $item->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <input name="code" required type="text" placeholder="Mã kho*" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mã kho*" value="{{ $item->code }}">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input name="name" required type="text" placeholder="Tên kho*" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tên kho*"
                                    value="{{ $item->name }}">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Phân loại*">
                                    <select name="classify" class="selectpicker" required>
                                        <option disabled>Phân loại*</option>
                                        @if ($item->classify == 1)
                                            <option value="0">Kho công ty
                                            </option>
                                            <option value="1" selected>Kho nhà phân phối
                                            </option>
                                            <option value="2">Kho bán lẻ
                                            </option>
                                        @elseif ($item->classify == 2)
                                            <option value="0">Kho công ty
                                            </option>
                                            <option value="1">Kho nhà phân phối
                                            </option>
                                            <option value="2" selected>Kho bán lẻ
                                            </option>
                                        @else 
                                            <option value="0" selected>Kho công ty
                                            </option>
                                            <option value="1">Kho nhà phân phối
                                            </option>
                                            <option value="2">Kho bán lẻ
                                            </option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input name="description" type="text" placeholder="Mô tả*" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mô tả*"
                                    value="{{ $item->description }}">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input name="address" required type="text" placeholder="Địa chỉ*" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Địa chỉ*"
                                    value="{{ $item->address }}">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Người quản lý*">
                                    <select name="manage" class="selectpicker" data-dropup-auto="false" data-live-search="true" required>
                                        <?php if( $item->manage == 0){ ?>
                                            <option value="0">Chọn người quản lý*
                                            </option>
                                            <?php }else{ ?>
                                            <option value="{{ $item->manage }}">
                                                {{ $item->manage_name }}
                                            </option>
                                            <?php } ?>
                                            <option value="0">Chọn
                                                người quản lý*</option>
                                            @foreach ($listUsers as $av)
                                                <option value="{{ $av->id }}">
                                                    {{ $av->name }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-dropup-auto="false" data-bs-placement="bottom" title="Kế toán phụ trách*">
                                    <select name="accountant" class="selectpicker" data-dropup-auto="false" data-live-search="true" required>
                                        @foreach ($listUsers as $u)
                                                    @if ($item->accountant == $u->id)
                                                        <option value="{{ $u->id }}" selected>{{ $u->name }}</option>
                                                    @else
                                                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                    @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Trạng thái*">
                                    <select name="status" class="selectpicker" required>
                                        @if ($item->status == 1)                                            
                                            <option value="1" selected>Đang hoạt động
                                            </option>
                                            <option value="0">Ngưng hoạt động
                                            </option>
                                        @elseif (($item->status == 0) )
                                            <option value="1">Đang hoạt động
                                            </option>
                                            <option value="0" selected>Ngưng hoạt động
                                            </option>
                                        @endif
                                        
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

    {{-- Modal chi tiết kho --}}
    <div class="modal fade" id="chiTietKho{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Chi tiết kho</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addForm" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <input name="code"type="text" placeholder="Mã kho" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mã kho" value="{{ $item->code }}"
                                    disabled>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input name="name" type="text" placeholder="Tên kho" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tên kho"
                                    value="{{ $item->name }}" disabled>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Phân loại">
                                    <select name="" class="selectpicker" disabled required>
                                        @if ($item->classify == 1)
                                            <option value="0">Kho công ty
                                            </option>
                                            <option value="1" selected>Kho nhà phân phối
                                            </option>
                                            <option value="2">Kho bán lẻ
                                            </option>
                                        @elseif ($item->classify == 2)
                                            <option value="0">Kho công ty
                                            </option>
                                            <option value="1">Kho nhà phân phối
                                            </option>
                                            <option value="2" selected>Kho bán lẻ
                                            </option>
                                        @else 
                                            <option value="0" selected>Kho công ty
                                            </option>
                                            <option value="1">Kho nhà phân phối
                                            </option>
                                            <option value="2">Kho bán lẻ
                                            </option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input name="code" required type="text" placeholder="Mô tả" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mô tả"
                                    value="{{ $item->description }}" disabled>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input name="code" required type="text" placeholder="Địa chỉ" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Địa chỉ"
                                    value="{{ $item->address }}" disabled>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-dropup-auto="false" data-bs-placement="bottom" title="Người quản lý">
                                    <select name="" class="selectpicker" disabled>
                                        <?php if( $item->manage == 0){ ?>
                                            <option value="0">Chọn người quản lý
                                            </option>
                                            <?php }else{ ?>
                                            <option value="{{ $item->manage }}">
                                                {{ $item->manage_name }}
                                            </option>
                                            <?php } ?>
                                            <option value="0">Chọn
                                                người quản lý</option>
                                            @foreach ($listUsers as $av)
                                                <option value="{{ $av->id }}">
                                                    {{ $av->name }}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-dropup-auto="false" data-bs-placement="bottom" title="Kế toán phụ trách">
                                    <select name="" class="selectpicker" disabled>
                                        @foreach ($listUsers as $u)
                                            @if ($item->accountant == $u->id)
                                                <option value="{{ $u->id }}" selected>{{ $u->name }}</option>
                                            @else
                                                <option value="{{ $u->id }}">{{ $u->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Trạng thái">
                                    <select name="" class="selectpicker" disabled>
                                        @if ($item->status == 1)                                            
                                            <option value="1" selected>Đang hoạt động
                                            </option>
                                            <option value="0">Ngưng hoạt động
                                            </option>
                                        @elseif (($item->status == 0) )
                                            <option value="1">Đang hoạt động
                                            </option>
                                            <option value="0" selected>Ngưng hoạt động
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
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Xóa kho --}}
    <div class="modal fade" id="xoaKho{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Xóa kho</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có thực sự muốn xoá kho này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                    <form action="{{ route('WareHouse.destroy', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
    <!-- Modal thêm kho -->
    <div class="modal fade" id="addKho" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm Kho</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addForm" action="{{ route('WareHouse.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <input name="code" required type="text" placeholder="Mã kho*" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mã kho*" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input name="name" required type="text" placeholder="Tên kho*" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tên kho*" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Phân loại*" required>
                                    <select name="classify" class="selectpicker" title="Phân loại*" required>
                                        <option value="0">Kho công ty
                                        </option>
                                        <option value="1">Kho nhà phân phối
                                        </option>
                                        <option value="2">Kho bán lẻ
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input name="description" type="text" placeholder="Mô tả" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Mô tả">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input name="address" required type="text" placeholder="Địa chỉ*" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Địa chỉ*" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Người quản lý*">
                                    <select name="manage" class="selectpicker" data-dropup-auto="false" 
                                        data-live-search="true" title="Chọn người quản lý*" required>
                                        @foreach($listUsers as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kế toán phụ trách*">
                                    <select name="accountant" class="selectpicker" data-dropup-auto="false" 
                                        data-live-search="true" title="Chọn kế toán phụ trách*" required>                                        
                                        @foreach($listUsers as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Trạng thái" required>
                                    <select name="status" title="Chọn trạng thái*" class="selectpicker" required>                                        
                                        <option value="1">Đang hoạt động
                                        </option>
                                        <option value="0">Ngưng hoạt động
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

@endsection