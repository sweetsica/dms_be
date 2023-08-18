@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách nhân sự')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection

@section('content')
    @include('template.sidebar.sidebarPosition.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Danh sách nhân sự</h5>
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
                                                <div class="order-2 order-md-1" style="font-size: 15px;">
                                                    {{-- <b>Danh sách cấp nhân sự</b> --}}
                                                </div>
                                                <div
                                                    class="order-1 order-md-2  justify-content-between align-items-center flex-grow-1 mb-2 mb-md-0">
                                                    <form method="GET" action="">
                                                        <div class="form-group has-search">
                                                            {{-- <span type="submit"
                                                                class="bi bi-search  fs-5" style="float: left;;"></span> --}}
                                                            <input type="text" style="width: 150px; float: right;"
                                                                class="form-control" value="{{ $search }}"
                                                                placeholder="Tìm kiếm" name="search">
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
                                                            data-bs-toggle="modal" data-bs-target="#taoDeXuat">Thêm nhân
                                                            sự</button>
                                                    </div>
                                                @endif
                                            </div>
                                            <form id="select-form" action="{{ route('Personnel.delete') }}" method="POST">
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
                                                                <th class="text-nowrap text-center" style="width:2%">STT
                                                                </th>
                                                                <th class="text-nowrap">Mã nhân sự</th>
                                                                <th class="text-nowrap">Tên nhân sự</th>
                                                                <th class="text-nowrap">Đơn vị công tác (phòng ban)</th>
                                                                <th class="text-nowrap">Vị trí/ chức danh</th>
                                                                <th class="text-nowrap">Cấp nhân sự</th>
                                                                <th class="text-nowrap">Vai trò</th>
                                                                <th class="text-nowrap">Địa bàn</th>
                                                                <th class="text-nowrap">Email</th>
                                                                <th class="text-nowrap">Số điện thoại</th>
                                                                <th class="text-nowrap">Hình thức</th>
                                                                <th class="text-nowrap">Trạng thái</th>
                                                                @if (session('user')['role_id'] == '1')
                                                                    <th class="text-nowrap text-center"><span>Hành
                                                                            động</span>
                                                                    </th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        <?php $a = 1; ?>
                                                        @foreach ($personnelList as $item)
                                                            <tbody>
                                                                <tr>
                                                                    <td class=" text-center">
                                                                        {{ $a++ }}
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
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->department_name }}">
                                                                            {{ $item->department_name }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->position_name }}">
                                                                            {{ $item->position_name }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->personnel_level_name }}">
                                                                            {{ $item->personnel_level_name }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->role_name }}">
                                                                            {{ $item->role_name }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->locality_name }}">
                                                                            {{ $item->locality_name }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->email }}">
                                                                            {{ $item->email }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->phone }}">
                                                                            {{ $item->phone }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title=" {{ $item->working_form }}">
                                                                            {{ $item->working_form }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->status }}">
                                                                            {{ $item->status }}
                                                                        </div>
                                                                    </td>
                                                                    @if (session('user')['role_id'] == '1')
                                                                        <td>
                                                                            <div
                                                                                class="table_actions d-flex justify-content-end">

                                                                                <div data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Sửa">
                                                                                    <div class="btn"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#sua{{ $item['id'] }}">
                                                                                        <img style="width:16px;height:16px"
                                                                                            src="{{ asset('assets/img/edit.svg') }}" />
                                                                                    </div>
                                                                                </div>
                                                                                <div data-bs-toggle="tooltip"
                                                                                    data-bs-placement="top"
                                                                                    title="Xóa">
                                                                                    <div class="btn"
                                                                                        data-bs-toggle="modal"
                                                                                        data-bs-target="#xoa{{ $item->id }}">
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
                                                    {{-- {{ $personnelList->appends([
                                                        'search' => $search,
                                                    ])->links() }} --}}

                                                    <nav aria-label="Page navigation example" class="float-end mt-3"
                                                        id="target-pagination">
                                                        <ul class="pagination">
                                                            {{ $personnelList->appends([
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
            @include('template.footer.footer')
        </div>
    </div>
    @include('template.sidebar.sidebarMaster.sidebarRight')


    @foreach ($personnelList as $item)
        <div class="modal fade" id="sua{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">Sửa nhân sự</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('Personnel.update', $item->id) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div>
                                    <h1 style="color: red;">Thông tin cá
                                        nhân</h1>
                                </div>
                                <div class="col-4 mb-3">
                                    <input name="name" required type="text" placeholder="Họ và tên*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Họ và tên*" value="{{ $item->name }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Giới tính*">
                                        <select name="gender" class="selectpicker" data-dropup-auto="false" required>
                                            <option value="{{ $item->gender }}">
                                                {{ $item->gender }}
                                            </option>
                                            <option value="Nam">Nam
                                            </option>
                                            <option value="Nữ">Nữ
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <input name="birthday" required type="date" placeholder="Ngày sinh*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Ngày sinh*" value="{{ $item->birthday }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <input name="code" required type="text" placeholder="Mã nhân sự*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Nhập mã nhân sự*" value="{{ $item->code }}">
                                </div>
                                <div class="col-8 mb-3">
                                    <input name="address" type="text" placeholder="Địa chỉ" class="form-control"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Địa chỉ"
                                        value="{{ $item->address }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <input name="email" required type="text" placeholder="Email*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Email*" value="{{ $item->email }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <input name="password" required type="text" placeholder="Mật khẩu*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Mật khẩu*" value="{{ $item->password }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <input name="phone" required type="text" placeholder="Số điện thoại*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Số điện thoại*" value="{{ $item->phone }}">
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <h1 style="color: red;">Thông tin công
                                        việc</h1>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Đơn vị công tác">
                                        <select name="department_id" class="selectpicker" data-dropup-auto="false">
                                            <?php if( $item->department_id == null){ ?>
                                            <option value="">Chọn đơn
                                                vị công tác</option>
                                            <?php }else{ ?>
                                            <?php } ?>
                                            <option value="{{ $item->department_id }}">
                                                {{ $item->department_name }}
                                            </option>
                                            @foreach ($departmentlists as $dmList)
                                                <option value="{{ $dmList->id }}">
                                                    @php
                                                        $str = '';
                                                        for ($i = 0; $i < $dmList->level; $i++) {
                                                            echo $str;
                                                            $str = '  --';
                                                        }
                                                    @endphp
                                                    {{ $dmList->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Cấp nhân sự">
                                        <select name="personnel_lv_id" class="selectpicker" data-dropup-auto="false">
                                            <?php if( $item->personnel_lv_id == null){ ?>
                                            <option value="">Cấp nhân
                                                sự</option>
                                            <?php }else{ ?>
                                            <?php } ?>
                                            <option value="{{ $item->personnel_lv_id }}">
                                                {{ $item->personnel_level_name }}
                                            </option>
                                            @foreach ($personnelLevelList as $perLvList)
                                                <option value="{{ $perLvList->id }}">
                                                    {{ $perLvList->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Vị trí chức danh">
                                        <select name="position_id" class="selectpicker" data-dropup-auto="false">
                                            <?php if( $item->position_id == null){ ?>
                                            <option value="">Vị trí
                                                chức danh</option>
                                            <?php }else{ ?>
                                            <?php } ?>
                                            <option value="{{ $item->position_id }}">
                                                {{ $item->position_name }}
                                            </option>
                                            @foreach ($positionlists as $posiList)
                                                <option value="{{ $posiList->id }}">
                                                    @php
                                                        $str = '';
                                                        for ($i = 0; $i < $posiList->level; $i++) {
                                                            echo $str;
                                                            $str = '  --';
                                                        }
                                                    @endphp
                                                    {{ $posiList->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Vai trò">
                                        <select name="role_id" class="selectpicker" data-dropup-auto="false">
                                            <?php if( $item->role_id == null){ ?>
                                            <option value="">Vai trò
                                            </option>
                                            <?php }else{ ?>
                                            <?php } ?>
                                            <option value="{{ $item->role_id }}">
                                                {{ $item->role_name }}
                                            </option>
                                            @foreach ($roleList as $roleLit)
                                                <option value="{{ $roleLit->id }}">
                                                    {{ $roleLit->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Địa bàn">
                                        <select name="area_id" class="selectpicker" data-dropup-auto="false">
                                            <?php if( $item->area_id == null){ ?>
                                            <option value="">Địa bàn
                                            </option>
                                            <?php }else{ ?>
                                            <?php } ?>
                                            <option value="{{ $item->area_id }}">
                                                {{ $item->locality_name }}
                                            </option>
                                            @foreach ($localityList as $localList)
                                                <option value="{{ $localList->id }}">
                                                    {{ $localList->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Quản lý trực tiếp">
                                        <select name="manage" class="selectpicker" data-dropup-auto="false">
                                            <?php if( $item->manage == null){ ?>
                                            <option value="">Quản lý
                                                trực tiếp</option>
                                            <?php }else{ ?>
                                            <?php } ?>
                                            <option value="{{ $item->manage }}">
                                                @if ($item->donvime)
                                                    {{ $item->donvime->name }}
                                                @endif
                                            </option>
                                            @foreach ($personnellists as $perllists)
                                                <option value="{{ $perllists->id }}">
                                                    @php
                                                        $str = '';
                                                        for ($i = 0; $i < $perllists->level; $i++) {
                                                            echo $str;
                                                            $str = '  --';
                                                        }
                                                    @endphp
                                                    {{ $perllists->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <input name="annual_salary" type="text" placeholder="Quỹ lương năm"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Quỹ lương năm" value="{{ $item->annual_salary }}">
                                </div>
                                <div class="col-6 mb-3">
                                    {{-- <input name="pack" type="text"
                                placeholder="Gói trang bị"
                                class="form-control"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Gói trang bị"
                                value="{{ $item->pack }}"> --}}
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Gói trang bị">
                                        <select name="pack" class="selectpicker" data-dropup-auto="false">
                                            <option value="{{ $item->pack }}">
                                                {{ $item->pack }}
                                            </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Hình thức làm việc">
                                        <select name="working_form" class="selectpicker" data-dropup-auto="false"
                                            required>
                                            <option value="{{ $item->working_form }}">
                                                {{ $item->working_form }}
                                            </option>
                                            <option value="Chính thức">
                                                Chính thức</option>
                                            <option value="Thử việc">Thử
                                                việc</option>
                                            <option value="Cộng tác viên">
                                                Cộng tác viên</option>
                                            <option value="Thực tập sinh">
                                                Thực tập sinh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Trạng thái">
                                        <select name="status" class="selectpicker" data-dropup-auto="false" required>
                                            <option value="{{ $item->status }}">
                                                {{ $item->status }}
                                            </option>
                                            <option value="Đang làm việc">
                                                Đang làm việc</option>
                                            <option value="Đã nghỉ việc">Đã
                                                nghỉ việc</option>
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

        {{-- Xóa đề xuất --}}
        <div class="modal fade" id="xoa{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel">Xóa NHÂN SỰ </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có thực sự muốn xoá nhân sự này không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                        <form action="{{ route('Personnel.destroy', $item->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Xóa </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Thêm Tao De Xuat -->
    <div class="modal fade" id="taoDeXuat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm mới nhân sự</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('Personnel.store.vtri') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div>
                                <h1 style="color: red;">Thông tin cá nhân</h1>
                            </div>
                            <div class="col-4 mb-3">
                                <input name="name" required type="text" placeholder="Họ và tên*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Họ và tên*">
                            </div>
                            <div class="col-4 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Giới tính*">
                                    <select name="gender" class="selectpicker" data-dropup-auto="false" required>
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
                                <input name="email" required type="email" placeholder="Email*" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Email*">
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
                        <div class="row">
                            <div>
                                <h1 style="color: red;">Thông tin công việc</h1>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Đơn vị công tác">
                                    <select name="department_id" class="selectpicker" data-dropup-auto="false">
                                        <option value="">Đơn vị công tác</option>
                                        @foreach ($departmentlists as $item)
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
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Cấp nhân sự">
                                    <select name="personnel_lv_id" class="selectpicker" data-dropup-auto="false">
                                        <option value="">Cấp nhân sự</option>
                                        @foreach ($personnelLevelList as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Vị trí chức danh">
                                    <select name="position_id" class="selectpicker" data-dropup-auto="false">
                                        <option value="">Vị trí chức danh</option>
                                        @foreach ($positionlists as $item)
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
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Vai trò">
                                    <select name="role_id" class="selectpicker" data-dropup-auto="false">
                                        <option value="">Vai trò</option>
                                        @foreach ($roleList as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Địa bàn">
                                    <select name="area_id" class="selectpicker" data-dropup-auto="false">
                                        <option value="">Địa bàn</option>
                                        @foreach ($localityList as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Quản lý trực tiếp">
                                    <select name="manage" class="selectpicker" data-dropup-auto="false">
                                        <option value="">Quản lý trực tiếp</option>
                                        @foreach ($personnellists as $item)
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
                                        @endforeach
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
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-danger">Tạo</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Filter --}}
    <div class="modal fade" id="filterOptions" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Lọc dữ liệu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="GET">
                    {{-- @foreach (request()->query() as $key => $value)
                                @if (!in_array($key, ['don_vi_me']))
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endif
                            @endforeach --}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo đơn vị công tác">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo đơn vị công tác" name='dv_cong_tac'>
                                        @foreach ($departmentlists as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo vị trí làm việc">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo vị trí làm việc" name='vt_lam_vc'>
                                        @foreach ($positionlists as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo cấp nhân sự">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo cấp nhân sự" name='cap_nhan_su'>
                                        @foreach ($personnelLevelList as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo vai trò">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo vai trò" name='vai_tro'>
                                        @foreach ($roleList as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo địa bàn">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo địa bàn" name='dia_ban'>
                                        @foreach ($localityList as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo trạng thái">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo trạng thái" name='trang_thai'>
                                        {{-- @foreach ($personnel as $item) --}}
                                        <option value="Đang làm việc">Đang làm việc</option>
                                        <option value="Đã nghỉ việc">Đã nghỉ việc</option>
                                        {{-- @endforeach --}}
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
