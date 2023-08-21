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
                                <div class="card-body position-relative">
                                    <div class='row'>
                                        <div class="col-md-12">
                                            <div
                                                class="action_wrapper d-flex flex-wrap justify-content-between align-items-center mb-3">
                                                {{-- <div class="order-2 order-md-1" style="font-size: 15px;">
                                                    <b>Danh sách đơn vị trực thuộc</b>
                                                </div> --}}
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
                                                            data-bs-toggle="modal" data-bs-target="#taoDeXuat">Thêm đơn
                                                            vị</button>
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
                                                        class="table table-responsive table-hover table-bordered filter">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-nowrap text-center" style="width:1%"><input
                                                                        type="checkbox" id="select-all"></th>
                                                                <th class="text-nowrap text-center" style="width:2%">STT
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:3%">Mã đơn
                                                                    vị</th>
                                                                <th class="text-nowrap text-center" style="width:10%">Tên
                                                                    đơn vị </th>
                                                                <th class="text-nowrap text-center" style="width:5%">Đơn vị
                                                                    cha </th>
                                                                <th class="text-nowrap text-center" style="width:5%">Trưởng
                                                                    bộ phận
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:20%">Chức
                                                                    năng nhiệm vụ
                                                                </th>
                                                                @if (session('user')['role_id'] == '1')
                                                                    <th class="text-nowrap text-center" style="width:1%">
                                                                        <span>Hành
                                                                            động</span>
                                                                    </th>
                                                                @endif
                                                            </tr>
                                                        </thead>
                                                        <?php $t = 1; ?>
                                                        @foreach ($departmentList as $item)
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
                                                                                {{-- <div class="btn" data-bs-toggle="modal"
                                                                                    data-bs-target="#qrCode">
                                                                                    <i class="bi bi-share-fill"
                                                                                        style="color: #787878;"></i>
                                                                                </div> --}}
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
                                                        @endforeach
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

    @foreach ($listUsers as $item)
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
                                    <select disabled name="personnel_lv_id" class="selectpicker"
                                        data-dropup-auto="false">
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
                                    <select disabled name="position_id" class="selectpicker" data-dropup-auto="false"
                                        multiple>
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
                                            $positionIds = is_array($positionIds) ? $positionIds : [];
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
                                <input value="{{ $item->annual_salary ?? '' }}" style="pointer-events: none"
                                    name="annual_salary" type="text" placeholder="Quỹ lương năm" class="form-control"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Quỹ lương năm">
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
                                    <select disabled name="working_form" class="selectpicker" data-dropup-auto="false"
                                        required>
                                        <option value="{{ $item->working_form }}">
                                            {{ $item->working_form }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Trạng thái">
                                    <select disabled name="status" class="selectpicker" data-dropup-auto="false"
                                        required>
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

    <!-- Modal Thêm Tao De Xuat -->
    <div class="modal fade" id="taoDeXuat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm Đơn Vị</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('department.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <input name="name" required type="text" placeholder="Nhập tên đơn vị*"
                                    class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Nhập tên đơn vị*">
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Mã đơn vị*">
                                    <input name="code" required type="text" placeholder="Mã đơn vị*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Mã đơn vị*">
                                </div>
                            </div>
                            <div class="col-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn đơn vị mẹ">
                                    <select name="parent" required class="selectpicker" data-dropup-auto="false">
                                        <option value="0">Chọn đơn vị mẹ</option>
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
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Chọn trưởng bộ phận">
                                    <select name="ib_lead" required class="selectpicker" data-dropup-auto="false">
                                        <option value="0">Chọn trưởng bộ phận</option>
                                        @foreach ($UnitLeaderList as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top">
                                    <textarea name="description" type="text" placeholder="Chức năng nhiệm vụ" class="form-control "
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Chức năng nhiệm vụ" style="height: 80px;"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer" style="padding: 10px -2px !important;">
                                <button type="button" class="btn btn-outline-danger"
                                    data-bs-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-danger">Tạo</button>
                            </div>
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

                    <div class="modal-body">
                        <div class="row">

                            <div class="col-12 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-original-title="Lọc theo đơn vị mẹ">

                                    <select id="select-status" class="selectpicker select_filter"
                                        data-dropup-auto="false" title="Lọc theo đơn vị mẹ" name='don_vi_me'>
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
