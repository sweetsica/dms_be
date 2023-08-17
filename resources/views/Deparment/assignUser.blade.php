@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách tổ chức')
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
                        <h5 class="mainSection_heading-title">Danh sách tổ chức</h5>
                        @include('template.components.sectionCard')
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class='row'>

                                        <div class="col-md-12">
                                            <div
                                                class="action_wrapper d-flex flex-wrap justify-content-between align-items-center mb-3">

                                                <div
                                                    class="order-1 order-md-2  justify-content-between align-items-center flex-grow-1 mb-2 mb-md-0">
                                                    <form method="GET" action="">
                                                        <div class="form-group has-search">
                                                            <input type="text" style="width: 150px; float: right;"
                                                                class="form-control" value="{{ $search }}"
                                                                placeholder="Tìm kiếm" name="search">
                                                        </div>
                                                    </form>
                                                </div>

                                                {{-- <div class="action_export mx-3 order-md-3" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Lọc">
                                                    <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                        data-bs-target="#infoUser">
                                                        <i class="bi bi-funnel"></i>
                                                    </button>
                                                </div> --}}

                                                @if (session('user')['role_id'] == '1')
                                                    <div class="action_export order-md-4">
                                                        <button class="btn btn-danger d-block testCreateUser"
                                                            data-bs-toggle="modal" data-bs-target="#assignUser">Gán nhân
                                                            sự</button>
                                                    </div>
                                                @endif

                                            </div>
                                            <div>

                                                <div class="row g-2">
                                                    <div class="col-lg-6 border">
                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <span class="fs-5 fw-bold">Tên vị trí/chức
                                                                            danh:</span>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <span class="fs-5">ABC</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <span class="fs-5 fw-bold">Mã vị trí/chức
                                                                            danh:</span>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <span class="fs-5">ABC</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <span class="fs-5 fw-bold">Địa bàn:</span>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <span class="fs-5">
                                                                            Hà Nội
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <span class="fs-5 fw-bold">Chức năng nhiệm
                                                                            vụ:</span>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <span class="fs-5">
                                                                            Quản lý doanh thu, tìm kiếm khách hàng, thương
                                                                            thảo
                                                                            hợp
                                                                            đồng, phát triển thị trường
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 border">
                                                        <div class="row my-2">
                                                            <div class="col-lg-4">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <span class="fs-5 fw-bold">Chính thức:</span>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <span class="fs-5">avc</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <span class="fs-5 fw-bold">Thử việc:</span>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <span class="fs-5">
                                                                            Thử việc
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <span class="fs-5 fw-bold">Cộng tác:</span>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <span class="fs-5">
                                                                            abc
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <span class="fs-5 fw-bold">Định biên/thực tế:</span>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <span class="fs-5">avc</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <span class="fs-5 fw-bold">Quỹ lương năm:</span>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <span class="fs-5">1000</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fs-4 fw-bold mt-4" style="color: var(--primary-color)">
                                                Danh sách nhân sự đảm nhiệm</div>
                                            <form id="select-form" action="{{ route('delete-selected-items') }}"
                                                method="POST">
                                                @csrf
                                                <div class="action_export mx-3 order-md-1" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Xóa">
                                                    <button class="btn btn-danger  " type="submit"
                                                        onclick="return confirm('Bạn có muốn xóa không?')"
                                                        id="delete-selected-button" style="display: none;">Xóa</button>
                                                </div><br>
                                                <div class="table-responsive">

                                                    <table id="dsDaoTao"
                                                        class="table table-responsive table-hover table-bordered filter">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-nowrap text-center" style="width:1%">
                                                                    <input type="checkbox" id="select-all">
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:2%">STT
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:10%">Mã
                                                                    nhân sự</th>
                                                                <th class="text-nowrap text-center" style="width:10%">Tên
                                                                    nhân sự </th>
                                                                <th class="text-nowrap text-center" style="width:10%">Đơn
                                                                    vị
                                                                    công tác </th>
                                                                <th class="text-nowrap text-center" style="width:10%">Cấp
                                                                    nhân sự
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:20%">Vai
                                                                    trò
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:20%">Địa
                                                                    bàn
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:20%">
                                                                    Email
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:20%">Số
                                                                    điện thoại
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:20%">Hình
                                                                    thức
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:20%">
                                                                    Trạng
                                                                    thái
                                                                </th>
                                                                @if (session('user')['role_id'] == '1')
                                                                    <th class="text-nowrap text-center" style="width:3%">
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
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->name }}">
                                                                            {{ $item->name }}
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        @if ($item->donvime)
                                                                            <div class="overText" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="{{ $item->donvime->name }}">
                                                                                {{ $item->donvime->name }}
                                                                            </div>
                                                                        @else
                                                                        @endif
                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
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
                                                                                <div class="btn" data-bs-toggle="modal"
                                                                                    data-bs-target="#qrCode">
                                                                                    <i class="bi bi-share-fill"
                                                                                        style="color: #787878;"></i>
                                                                                </div>
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
                                                    </table>
                                                    <nav aria-label="Page navigation example" class="float-end mt-3"
                                                        id="target-pagination">
                                                        <ul class="pagination">
                                                            {{ $departmentList->appends([
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
        </div>
    </div>
    @include('template.footer.footer')
    </div>
    </div>
    @include('template.sidebar.sidebarMaster.sidebarRight')

    @foreach ($departmentList as $item)
        {{-- Sửa đề xuất --}}
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
                                    <input data-bs-toggle="tooltip" data-bs-placement="top" title="Mã đơn vị"
                                        name="code" type="text" placeholder="Mã đơn vị" class="form-control"
                                        value="{{ $item->code }}" required>
                                </div>
                                <div class="col-6 mb-3">

                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn đơn vị mẹ">
                                        <select name="parent" required class="selectpicker" data-dropup-auto="false">
                                            <?php if( $item->parent == 0){ ?>
                                            <option value="0">Chọn
                                                đơn
                                                vị mẹ</option>
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
                                                vị mẹ</option>
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
                                        <select name="ib_lead" class="selectpicker" data-dropup-auto="false">
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


        {{-- Xóa đề xuất --}}
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
    @endforeach


    <!-- Modal Thêm Tao De Xuat -->
    <div class="modal fade" id="infoUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thông tin nhân sự</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('Personnel.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div>
                            <h1 style="color: red;">Thông tin cá nhân</h1>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <img src="https://img.freepik.com/free-icon/user_318-159711.jpg"
                                    class="rounded-circle w-100 h-auto" alt="img-avatar">
                            </div>
                            <div class="col-lg-9">
                                <div class="row">

                                    <div class="col-4 mb-3">
                                        <input name="name" required type="text" placeholder="Họ và tên*"
                                            class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Họ và tên*">
                                    </div>
                                    <div class="col-4 mb-3">
                                        <div data-bs-toggle="tooltip" data-bs-placement="top" title="Giới tính*">
                                            <select name="gender" class="selectpicker" data-dropup-auto="false"
                                                required>
                                                <option value="">Giới tính*</option>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input name="birthday" required type="date" placeholder="Ngày sinh*"
                                            class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Ngày sinh*">
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input name="code" required type="text" placeholder="Mã nhân sự*"
                                            class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Nhập mã nhân sự*">
                                    </div>
                                    <div class="col-8 mb-3">
                                        <input name="address" type="text" placeholder="Địa chỉ" class="form-control"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Địa chỉ">
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input name="email" required type="email" placeholder="Email*"
                                            class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Email*">
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input name="password" required type="text" placeholder="Mật khẩu*"
                                            class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Mật khẩu*">
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input name="phone" required type="text" placeholder="Số điện thoại*"
                                            class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Số điện thoại*">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div>
                                <h1 style="color: red;">Thông tin công việc</h1>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Đơn vị công tác">
                                    <select name="department_id" class="selectpicker" data-dropup-auto="false">
                                        <option value="">Đơn vị công tác</option>
                                        {{-- @foreach ($departmentlists as $item)
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
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Cấp nhân sự">
                                    <select name="personnel_lv_id" class="selectpicker" data-dropup-auto="false">
                                        <option value="">Cấp nhân sự</option>
                                        {{-- @foreach ($personnelLevelList as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Vị trí chức danh">
                                    <select name="position_id" class="selectpicker" data-dropup-auto="false">
                                        <option value="">Vị trí chức danh</option>
                                        {{-- @foreach ($positionlists as $item)
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
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Vai trò">
                                    <select name="role_id" class="selectpicker" data-dropup-auto="false">
                                        <option value="">Vai trò</option>
                                        {{-- @foreach ($roleList as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Địa bàn">
                                    <select name="area_id" class="selectpicker" data-dropup-auto="false">
                                        <option value="">Địa bàn</option>
                                        {{-- @foreach ($localityList as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach --}}

                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Quản lý trực tiếp">
                                    <select name="manage" class="selectpicker" data-dropup-auto="false">
                                        <option value="">Quản lý trực tiếp</option>
                                        {{-- @foreach ($personnellists as $item)
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
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <input name="annual_salary" type="text" placeholder="Quỹ lương năm"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Quỹ lương năm">
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Gói trang bị">
                                    <select name="pack" class="selectpicker" data-dropup-auto="false">
                                        <option value="">Gói trang bị</option>
                                    </select>
                                </div>
                                {{-- <input name="pack" type="text" placeholder="Gói trang bị" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Gói trang bị"> --}}
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Hình thức làm việc">
                                    <select name="working_form" class="selectpicker" data-dropup-auto="false" required>
                                        <option value="">Hình thức làm việc*</option>
                                        <option value="Chính thức">Chính thức</option>
                                        <option value="Thử việc">Thử việc</option>
                                        <option value="Cộng tác viên">Cộng tác viên</option>
                                        <option value="Thực tập sinh">Thực tập sinh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Trạng thái">
                                    <select name="status" class="selectpicker" data-dropup-auto="false" required>
                                        <option value="">Trạng thái*</option>
                                        <option value="Đang làm việc">Đang làm việc</option>
                                        <option value="Đã nghỉ việc">Đã nghỉ việc</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Gán nhân sự --}}
    <div class="modal fade" id="assignUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Gán nhân sự</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" method="GET">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Chọn nhân sự">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Chọn nhân sự" name='assignUser'>
                                        <option value="Nguyễn Văn A">Nguyễn Văn A</option>
                                        <option value="Nguyễn Thị C">Nguyễn Thị C</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-outline-danger">Hủy</button>
                            <button type="submit" class="btn btn-danger">Lưu</button>
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
            +
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

@endsection
