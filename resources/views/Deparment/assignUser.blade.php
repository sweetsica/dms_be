@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Thông tin vị trí')
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
                        <h5 class="mainSection_heading-title">Thông tin vị trí - {{ $getPos->name ?? '' }}</h5>
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
                                                                        <span
                                                                            class="fs-5">{{ $getPos->name ?? '' }}</span>
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
                                                                        <span
                                                                            class="fs-5">{{ $getPos->code ?? '' }}</span>
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
                                                                            {{ $getPos->areas->name ?? '' }}
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
                                                                            {{ $getPos->description ?? '' }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 border">
                                                        <div class="row my-2">
                                                            <div class="col-lg-8">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <span class="fs-5 fw-bold">Trạng thái:</span>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <span class="fs-5">Hoạt động</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="col-lg-4">
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
                                                            </div> --}}
                                                        </div>
                                                        <div class="row my-2">
                                                            <div class="col-lg-12">
                                                                <div class="row">
                                                                    <div class="col-lg-4">
                                                                        <span class="fs-5 fw-bold">Định biên/thực tế:</span>
                                                                    </div>
                                                                    <div class="col-lg-8">
                                                                        <span class="fs-5">10 người</span>
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
                                                                        <span class="fs-5">100.000.000 VNĐ</span>
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
                                                        @foreach ($listUsers as $item)
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center"> <input type="checkbox"
                                                                            name="selected_items[]"
                                                                            value="{{ $item->id }}"></td>
                                                                    <td class=" text-center">
                                                                        {{ $loop->iteration }}
                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->code ?? '' }}">
                                                                            {{ $item->code ?? '' }}
                                                                        </div>
                                                                    </td>
                                                                    <td style="text-decoration: underline" data-bs-toggle="modal"
                                                                        data-bs-target="#infoUser{{ $item->id }}"
                                                                        role="button" class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->name ?? '' }}">
                                                                            {{ $item->name ?? '' }}
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->department->name ?? '' }}">
                                                                            {{ $item->department->name ?? '' }}
                                                                        </div>
                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->level->name ?? '' }}">
                                                                            {{ $item->level->name ?? '' }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->role->name ?? '' }}">
                                                                            {{ $item->role->name ?? '' }}
                                                                        </div>

                                                                    </td>
                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->area->name ?? '' }}">
                                                                            {{ $item->area->name ?? '' }}
                                                                        </div>
                                                                    </td>

                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->email ?? '' }}">
                                                                            {{ $item->email ?? '' }}
                                                                        </div>
                                                                    </td>

                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->phone ?? '' }}">
                                                                            {{ $item->phone ?? '' }}
                                                                        </div>
                                                                    </td>

                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->working_form ?? '' }}">
                                                                            {{ $item->working_form ?? '' }}
                                                                        </div>
                                                                    </td>

                                                                    <td class="">
                                                                        <div class="overText" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="{{ $item->status ?? '' }}">
                                                                            {{ $item->status ?? '' }}
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
                                                                                        data-bs-target="#suaDeXuat{{ $item->id }}">
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

    @foreach ($listUsers as $item)
        <div class="modal fade" id="suaDeXuat{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                                    <input name="password" required type="password" placeholder="Mật khẩu*"
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
                                            @foreach ($departmentlists as $dmList)
                                                <option {{ $dmList->id == $item->department_id ? 'selected' : '' }}
                                                    value="{{ $dmList->id }}">
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
                                            @foreach ($personnelLevelList as $perLvList)
                                                <option {{ $perLvList->id == $item->position_level_id ? 'selected' : '' }}
                                                    value="{{ $perLvList->id }}">
                                                    {{ $perLvList->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Vị trí chức danh">
                                        <select name="position_id" class="selectpicker" data-dropup-auto="false"
                                            multiple>
                                            <?php if( $item->position_id == null){ ?>
                                            <option value="">Vị trí
                                                chức danh</option>
                                            <?php }else{ ?>
                                            <?php } ?>
                                            @php
                                                $positionIds = json_decode($item->position_id, true);
                                            @endphp
                                            @foreach ($positionlists as $posiList)
                                                <option {{ in_array($posiList->id, $positionIds) ? ' selected' : '' }}
                                                    value="{{ $posiList->id }}">
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
                                            @foreach ($roleList as $roleLit)
                                                <option {{ $roleLit->id == $item->role_id ? 'selected' : '' }}
                                                    value="{{ $roleLit->id }}">
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
                                {{-- <div class="col-6 mb-3"> --}}
                                    {{-- <input name="pack" type="text"
                            placeholder="Gói trang bị"
                            class="form-control"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Gói trang bị"
                            value="{{ $item->pack }}"> --}}
                                    {{-- <div data-bs-toggle="tooltip" data-bs-placement="top" title="Gói trang bị">
                                        <select name="pack" class="selectpicker" data-dropup-auto="false">
                                            <option value="{{ $item->pack }}">
                                                {{ $item->pack }}
                                            </option>

                                        </select>
                                    </div>
                                </div> --}}
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Hình thức làm việc">
                                        <select name="working_form" class="selectpicker" data-dropup-auto="false"
                                            required>
                                            <option value="Chính thức" {{ $item->working_form == "Chính thức" ? "selected" : "" }}>
                                                Chính thức</option>
                                            <option value="Thử việc" {{ $item->working_form == "Thử việc" ? "selected" : "" }}>Thử
                                                việc</option>
                                            <option value="Cộng tác viên" {{ $item->working_form == "Cộng tác viên" ? "selected" : "" }}>
                                                Cộng tác viên</option>
                                            <option value="Thực tập sinh" {{ $item->working_form == "Thực tập sinh" ? "selected" : "" }}>
                                                Thực tập sinh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Trạng thái">
                                        <select name="status" class="selectpicker" data-dropup-auto="false" required>
                                            <option value="Đang làm việc" {{ $item->status == "Đang làm việc" ? "selected" : "" }}>
                                                Đang làm việc</option>
                                            <option value="Đã nghỉ việc" {{ $item->status == "Đã nghỉ việc" ? "selected" : "" }}>Đã
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
        <div class="modal fade" id="xoaDeXuat{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel">Gỡ nhân sự khỏi ví trí </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Bạn có thực sự muốn gỡ nhân sự khỏi ví trí này không?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                        <form
                            action="{{ route('remove.user.position', ['user_id' => $item->id, 'pos_id' => $getPos->id]) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal Thêm Tao De Xuat -->
        <div class="modal fade" id="infoUser{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">Thông tin nhân sự</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
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
                                        <input value="{{ $item->name ?? '' }}" style="pointer-events: none"
                                            name="name" required type="text" placeholder="Họ và tên*"
                                            class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Họ và tên*">
                                    </div>
                                    <div class="col-4 mb-3">
                                        <div data-bs-toggle="tooltip" data-bs-placement="top" title="Giới tính*">
                                            <select disabled name="gender" class="selectpicker" data-dropup-auto="false"
                                                required>
                                                <option value="Nam" {{ $item->gender == 'Nam' ? 'selected' : '' }}>Nam
                                                </option>
                                                <option value="Nữ" {{ $item->gender == 'Nữ' ? 'selected' : '' }}>Nữ
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input value="{{ $item->birthday ?? '' }}" style="pointer-events: none"
                                            name="birthday" required type="date" placeholder="Ngày sinh*"
                                            class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Ngày sinh*">
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input value="{{ $item->code ?? '' }}" style="pointer-events: none"
                                            name="code" required type="text" placeholder="Mã nhân sự*"
                                            class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Nhập mã nhân sự*">
                                    </div>
                                    <div class="col-8 mb-3">
                                        <input value="{{ $item->address ?? '' }}" style="pointer-events: none"
                                            name="address" type="text" placeholder="Địa chỉ" class="form-control"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Địa chỉ">
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input value="{{ $item->email ?? '' }}" style="pointer-events: none"
                                            name="email" required type="email" placeholder="Email*"
                                            class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Email*">
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input value="********" style="pointer-events: none" name="password" required
                                            type="password" placeholder="Mật khẩu*" class="form-control"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Mật khẩu*">
                                    </div>
                                    <div class="col-4 mb-3">
                                        <input value="{{ $item->phone ?? '' }}" style="pointer-events: none"
                                            name="phone" required type="text" placeholder="Số điện thoại*"
                                            class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Số điện thoại*">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div>
                                <h1 style="color: red;">Thông tin công
                                    việc</h1>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Đơn vị công tác">
                                    <select disabled name="department_id" class="selectpicker" data-dropup-auto="false">
                                        <?php if( $item->department_id == null){ ?>
                                        <option value="">Chọn đơn
                                            vị công tác</option>
                                        <?php }else{ ?>
                                        <?php } ?>
                                        <option value="{{ $item->department_id }}">
                                            {{ $item->department_name }}
                                        </option>
                                        @foreach ($departmentlists as $dmList)
                                            <option {{ $dmList->id == $item->department_id ? 'selected' : '' }}
                                                value="{{ $dmList->id }}">
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
                                    <select disabled name="personnel_lv_id" class="selectpicker" data-dropup-auto="false">
                                        <?php if( $item->personnel_lv_id == null){ ?>
                                        <option value="">Cấp nhân
                                            sự</option>
                                        <?php }else{ ?>
                                        <?php } ?>
                                        <option value="{{ $item->personnel_lv_id }}">
                                            {{ $item->personnel_level_name }}
                                        </option>
                                        @foreach ($personnelLevelList as $perLvList)
                                            <option {{ $perLvList->id == $item->position_level_id ? 'selected' : '' }}
                                                value="{{ $perLvList->id }}">
                                                {{ $perLvList->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Vị trí chức danh">
                                    <select disabled name="position_id" class="selectpicker" data-dropup-auto="false" multiple>
                                        <?php if( $item->position_id == null){ ?>
                                        <option value="">Vị trí
                                            chức danh</option>
                                        <?php }else{ ?>
                                        <?php } ?>
                                        <option value="{{ $item->position_id }}">
                                            {{ $item->position_name }}
                                        </option>
                                        @php
                                            $positionIds = json_decode($item->position_id, true);
                                        @endphp
                                        @foreach ($positionlists as $posiList)
                                            <option {{ in_array($posiList->id, $positionIds) ? ' selected' : '' }}
                                                value="{{ $posiList->id }}">
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
                                    <select disabled name="role_id" class="selectpicker" data-dropup-auto="false">
                                        <?php if( $item->role_id == null){ ?>
                                        <option value="">Vai trò
                                        </option>
                                        <?php }else{ ?>
                                        <?php } ?>
                                        <option value="{{ $item->role_id }}">
                                            {{ $item->role_name }}
                                        </option>
                                        @foreach ($roleList as $roleLit)
                                            <option {{ $roleLit->id == $item->role_id ? 'selected' : '' }}
                                                value="{{ $roleLit->id }}">
                                                {{ $roleLit->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Địa bàn">
                                    <select disabled name="area_id" class="selectpicker" data-dropup-auto="false">
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
                                    <select disabled name="manage" class="selectpicker" data-dropup-auto="false">
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
                                <input value="{{ $item->annual_salary ?? "" }}" style="pointer-events: none" name="annual_salary" type="text" placeholder="Quỹ lương năm"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Quỹ lương năm">
                            </div>
                            {{-- <div class="col-6 mb-3"> --}}
                                {{-- <input name="pack" type="text"
                        placeholder="Gói trang bị"
                        class="form-control"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="Gói trang bị"
                        value="{{ $item->pack }}"> --}}
                                {{-- <div data-bs-toggle="tooltip" data-bs-placement="top" title="Gói trang bị">
                                    <select disabled name="pack" class="selectpicker" data-dropup-auto="false">
                                        <option value="{{ $item->pack }}">
                                            {{ $item->pack }}
                                        </option>

                                    </select>
                                </div>
                            </div> --}}
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Hình thức làm việc">
                                    <select disabled name="working_form" class="selectpicker" data-dropup-auto="false" required>
                                        <option value="{{ $item->working_form }}">
                                            {{ $item->working_form }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Trạng thái">
                                    <select disabled name="status" class="selectpicker" data-dropup-auto="false" required>
                                        <option value="{{ $item->status }}">
                                            {{ $item->status }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    {{-- Gán nhân sự --}}
    <div class="modal fade" id="assignUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Gán nhân sự</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('assign.user.position', ['id' => $getPos->id]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Chọn nhân sự">
                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" data-width="100%" data-size="3"
                                        data-live-search="true" data-select-all-text="Chọn tất cả"
                                        data-deselect-all-text="Bỏ chọn" data-live-search-placeholder="Tìm kiếm..."
                                        title="Chọn nhân sự" name='assignUser'>
                                        @foreach ($selectableUser as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }} -
                                                {{ $user->code }}</option>
                                        @endforeach
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
