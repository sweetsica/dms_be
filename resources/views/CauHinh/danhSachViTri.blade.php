@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách vị trí')

@section('header-style')
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-treeSelect/cbtree.css') }}"> --}}
    <style>
        .tree_wrapper {
            overflow-y: scroll;
            height: 100vmin;
            padding-bottom: 150px;
        }
    </style>
@endsection

@section('content')
    @include('template.sidebar.sidebarCoCauToChuc.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">
                            Danh sách vị trí
                        </h5>
                        @include('template.components.sectionCard')
                    </div>

                    <div class="card mb-3">
                        <div class="card-body position-relative body_content-wrapper" style="display:block"
                            id="body_content-1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <div class="title_wrapper d-flex align-items-center justify-content-between mb-3">
                                            <div class="card-title">Toàn Công Ty</div>
                                            <div class="action_wrapper">
                                                <div class="me-3">
                                                    <form method="GET" action="#">
                                                        <div class="form-group has-search">
                                                            <span type="submit"
                                                                class="bi bi-search form-control-feedback fs-5"></span>
                                                            <input type="text" class="form-control test_search"
                                                                placeholder="Tìm kiếm" value="{{ request()->get('q') }}"
                                                                name="q">
                                                        </div>
                                                    </form>
                                                </div>

                                                <div>
                                                    <div class="main_search d-flex">
                                                        <button class="btn btn-danger test_create" data-bs-toggle="modal"
                                                            data-bs-target="#themDSThemViTri">Thêm vị trí</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="table-responsive dataTables_wrapper">
                                        <table id="danhSachViTri" class="table table-responsive table-hover table-bordered">
                                            <thead>
                                                <tr class="bg-light">
                                                    <th class="text-nowrap" style="width: 2%">STT</th>
                                                    {{-- <th class="text-nowrap" style="width: 5%">Mã vị trí</th> --}}
                                                    <th class="text-nowrap" style="width: 17%">Tên vị trí/chức danh</th>
                                                    <th class="text-nowrap" style="width: 10%">Cấp nhân sự</th>
                                                    <th class="text-nowrap" style="width: 10%">Đơn vị công tác</th>
                                                    <th class="text-nowrap" style="width: 32%">Mô tả Công việc (Tóm tắt)
                                                    </th>
                                                    <th class="text-nowrap" style="width: 6%">Định biên</th>
                                                    <th class="text-nowrap" style="width: 10%">Quỹ lương năm</th>
                                                    <th class="text-nowrap" style="width: 8%">Gói trang bị</th>
                                                    <th class="text-nowrap" style="width: 5%">Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            1
                                                        </div>
                                                    </th>
                                                    <td>
                                                        <div class="overText" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-original-title="Tên">
                                                            Tên</div>
                                                    </td>
                                                    <td>
                                                        <div class="overText" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-original-title="Chức vụ">
                                                            Chức vụ
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="overText" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-original-title="Phòng ban">
                                                            Phòng ban
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="overText" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Mô tả">
                                                            Mô tả</div>
                                                    </td>
                                                    <td>
                                                        <div class="overText" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Max nhân viên">
                                                            Max nhân viên</div>

                                                    </td>
                                                    <td>
                                                        <div class="overText" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Salary fund">
                                                            Salary fund</div>
                                                    </td>
                                                    <td>
                                                        <div data-bs-toggle="modal" data-bs-target="#trangBiHanhChinh">
                                                            Pack Quản lý
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="table_actions d-flex justify-content-center">
                                                            <div class="btn test_btn-edit-1" data-bs-toggle="modal"
                                                                data-bs-target="#suaDSThemViTri1">
                                                                <img style="width:16px;height:16px"
                                                                    src="{{ asset('assets/img/edit.svg') }}" />
                                                            </div>
                                                            <div class="btn test_btn-remove-1" data-bs-toggle="modal"
                                                                data-bs-target="#xoaViTri1">
                                                                <img style="width:16px;height:16px"
                                                                    src="{{ asset('assets/img/trash.svg') }}" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>

                                                {{-- Xóa Vi tri --}}
                                                <div class="modal fade" id="xoaViTri1}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-danger"
                                                                    id="exampleModalLabel">Xóa vị trí</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn có thực sự muốn xoá vị trí này không?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-outline-danger test_btn-cancel-1"
                                                                    data-bs-dismiss="modal">Hủy</button>
                                                                <form action="#" method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger test_btn-remove-1">Xóa</button>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Sua Vi Tri chức danh -->
                                                <div class="modal fade" id="suaDSThemViTri1" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-center">
                                                                <h5 class="modal-title w-100" id="exampleModalLabel">
                                                                    Sửa Vị trí/Chức danh
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <form method="POST" action="#">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="row">

                                                                        <div class="col-sm-12 mb-3">
                                                                            <input class="form-control test_name-edit-1"
                                                                                type="text" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Tên vị trí"
                                                                                name="name" value="name">
                                                                        </div>
                                                                        <div class="col-sm-6 mb-3">
                                                                            <div data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Đơn vị công tác">
                                                                                <select
                                                                                    class="selectpicker test_deps-edit-1"
                                                                                    data-dropup-auto="false" required
                                                                                    data-live-search="true"
                                                                                    name="department_id" data-width="100%"
                                                                                    title="Đơn vị công tác *"
                                                                                    data-live-search-placeholder="Tìm kiếm..."
                                                                                    data-size="3">

                                                                                    <option value="1">
                                                                                        name
                                                                                    </option>
                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-sm-6 mb-3"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title="Cấp nhân sự">
                                                                            <select id="onchangeCapNhanSu"
                                                                                data-dropup-auto="false"
                                                                                class="selectpicker test_pos-edit-1"
                                                                                title="Cấp nhân sự *"
                                                                                name="position_level" data-width="100%"
                                                                                data-live-search="true"
                                                                                data-live-search-placeholder="Tìm kiếm..."
                                                                                data-size="3">
                                                                                    <option value="1">
                                                                                        name
                                                                                    </option>

                                                                                <option value="themCapNhanSu"
                                                                                    class="text-danger">+ Thêm mới
                                                                                </option>
                                                                            </select>



                                                                        </div>

                                                                        <div class="col-sm-12 mb-3">
                                                                            <textarea data-bs-toggle="tooltip" name="description" data-bs-placement="top" title="Mô tả công việc"
                                                                                class="form-control test-des-edit-1">desc</textarea>
                                                                        </div>

                                                                        <div class="col-sm-6 mb-3">
                                                                            <input
                                                                                class="form-control test-employees-edit-1"
                                                                                type="number" min="0"
                                                                                data-bs-toggle="tooltip"
                                                                                data-bs-placement="top" title="Định biên"
                                                                                name="max_employees"
                                                                                value="max_employees">
                                                                        </div>
                                                                        <div class="col-sm-6 mb-3">
                                                                            <input
                                                                                class="form-control test-salary-edit-1"
                                                                                type="text" data-bs-toggle="tooltip"
                                                                                data-bs-placement="top"
                                                                                title="Quỹ lương năm" name="salary_fund"
                                                                                value="salary_fund" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-outline-danger test_cancel-edit-1"
                                                                        data-bs-dismiss="modal">Hủy</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger test_save-edit-1">Lưu</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tbody>
                                        </table>
                                    </div>

                                    {{-- <nav aria-label="Page navigation example" class="float-end mt-3"
                                        id="target-pagination">
                                        <ul class="pagination">
                                            @foreach ($listPositions->links as $link)
                                                <li class="page-item {{ $link->active ? 'active' : '' }}">
                                                    <a class="page-link" href="{{ getPaginationLink($link, 'page') }}"
                                                        aria-label="Previous">
                                                        <span aria-hidden="true">{!! $link->label !!}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </nav> --}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            @include('template.footer.footer')
        </div>
    </div>
    @include('template.sidebar.sidebarCoCauToChuc.sidebarRight')

    {{-- Xóa Cơ cấu tổ chức --}}
    <div class="modal fade" id="xoaCoCauToChuc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">XOÁ CƠ CẤU TỔ CHỨC</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có thực sự muốn xoá cơ cấu tổ chức đã chọn không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Xóa Vi tri --}}
    <div class="modal fade" id="xoaViTri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">Xóa vị trí</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có thực sự muốn xoá vị trí này không?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger">Xóa</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Them Co Cau -->
    <div class="modal fade" id="suaDonViPhongBan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 40%">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Sửa cơ cấu tốt chức</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="d-flex col-sm-4">
                                    <div class="modal_body-title">Tên đơn vị <span class="text-danger">*</span></div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="Digital Marketing">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex col-sm-4">
                                    <div class="modal_body-title">Mã đơn vị <span class="text-danger">*</span></div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" value="DMKT">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="d-flex col-sm-4">
                                    <div class="modal_body-title">Thuộc đơn vị <span class="text-danger">*</span></div>
                                </div>
                                <div class="col-sm-8">
                                    <select class="selectpicker" data-dropup-auto="false" title="Chọn đơn vị mẹ">
                                        <option selected>CTCP Mastertran</option>
                                        <option>CTCP Thái Bình Hưng Thịnh</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex col-sm-4">
                                    <div class="modal_body-title">Cấp tổ chức <span class="text-danger">*</span></div>
                                </div>
                                <div class="col-sm-8 d-flex align-items-center">
                                    <select class="selectpicker" data-dropup-auto="false" title="Chọn cấp tổ chức">
                                        <option selected>Công ty con</option>
                                        <option>Chi nhánh</option>
                                        <option>Văn phòng đại diện</option>
                                        <option>Văn phòng</option>
                                        <option>Trung tâm</option>
                                        <option>Phòng ban</option>
                                        <option>Nhóm/tổ/đội</option>
                                        <option>Phân xưởng</option>
                                        <option>Nhà máy</option>
                                        <option>Công ty thành viên</option>
                                    </select>
                                    <div class="modal_list-more" data-bs-toggle="modal"
                                        data-bs-target="#danhsachCapToChuc">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <div class="d-flex align-items-center mb-3">
                                <div class="d-flex col-sm-4">
                                    <div class="modal_body-title">Trưởng đơn vị <span class="text-danger">*</span></div>
                                </div>
                                <div class="col-sm-8">
                                    <select class="selectpicker" data-dropup-auto="false" title="Chọn trưởng đơn vị">
                                        <option selected>Nguyễn Ngọc Bảo</option>
                                        <option>Đặng Nguyễn Lam Mai</option>
                                        <option>Hồ Thị Hồng Vân</option>
                                        <option>Nguyễn Thị Ngọc Lan</option>
                                        <option>Nguyễn Thị Hồng Oanh</option>
                                        <option>Hà Nguyễn Minh Hiếu</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex col-sm-4">
                                    <div class="modal_body-title">Trụ sở chính <span class="text-danger">*</span></div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text"
                                        value="219 Trung Kính, Yên Hòa, Cầu Giấy, Hà Nội">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="d-flex align-items-center">
                                <div class="d-flex col-sm-2">
                                    <div class="modal_body-title">Chức năng<br> nhiệm vụ<span class="text-danger">*</span>
                                    </div>
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text"
                                        value="Xây dựng chiến lược truyền thông và chiến lược Marketing để tiếp cận với nhóm khách hàng.">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Danh sach phong ban -->
    <div class="modal fade" id="danhsachPhongBan" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 38%">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Danh sách phòng ban</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label ms-3" for="flexRadioDefault1">
                                        Cung ứng
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label ms-3" for="flexRadioDefault2">
                                        Trade Marketing
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault3">
                                    <label class="form-check-label ms-3" for="flexRadioDefault3">
                                        Digital Marketing
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault4">
                                    <label class="form-check-label ms-3" for="flexRadioDefault4">
                                        Truyền thông
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault5">
                                    <label class="form-check-label ms-3" for="flexRadioDefault5">
                                        Quản trị Nhãn/Đào tạo
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault6">
                                    <label class="form-check-label ms-3" for="flexRadioDefault6">
                                        Kho & Giao vận
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault7">
                                    <label class="form-check-label ms-3" for="flexRadioDefault7">
                                        Hành chính nhân sự
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault8">
                                    <label class="form-check-label ms-3" for="flexRadioDefault8">
                                        Kế toán
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault9">
                                    <label class="form-check-label ms-3" for="flexRadioDefault9">
                                        Tài chính
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault10">
                                    <label class="form-check-label ms-3" for="flexRadioDefault10">
                                        Dịch vụ bán hàng
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault11">
                                    <label class="form-check-label ms-3" for="flexRadioDefault11">
                                        Kinh doanh OTC
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault12">
                                    <label class="form-check-label ms-3" for="flexRadioDefault12">
                                        Kinh doanh ETC
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault13">
                                    <label class="form-check-label ms-3" for="flexRadioDefault13">
                                        Kinh doanh MT
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault14">
                                    <label class="form-check-label ms-3" for="flexRadioDefault14">
                                        Kinh doanh online
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <div class="btn text-primary" data-bs-toggle="modal" data-bs-target="#themPhongBan">
                                <i class="bi bi-plus"></i>
                                Thêm mới
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#themDSThemViTri">Hủy</button>
                    <button type="button" class="btn btn-danger">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Danh sach cap to chuc -->
    <div class="modal fade" id="danhsachCapToChuc" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 38%">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">DANH SÁCH CẤP TỔ CHỨC</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label ms-3" for="flexRadioDefault1">
                                        Công ty con
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label ms-3" for="flexRadioDefault2">
                                        Chi nhánh
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault3">
                                    <label class="form-check-label ms-3" for="flexRadioDefault3">
                                        Văn phòng đại diện
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault4">
                                    <label class="form-check-label ms-3" for="flexRadioDefault4">
                                        Văn phòng
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault5">
                                    <label class="form-check-label ms-3" for="flexRadioDefault5">
                                        Trung tâm
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault6">
                                    <label class="form-check-label ms-3" for="flexRadioDefault6">
                                        Phòng ban
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault7">
                                    <label class="form-check-label ms-3" for="flexRadioDefault7">
                                        Nhóm/tổ/đội
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault8">
                                    <label class="form-check-label ms-3" for="flexRadioDefault8">
                                        Phân xưởng
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault9">
                                    <label class="form-check-label ms-3" for="flexRadioDefault9">
                                        Nhà máy
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault10">
                                    <label class="form-check-label ms-3" for="flexRadioDefault10">
                                        Công ty thành viên
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="btn text-primary mt-3" data-bs-toggle="modal" data-bs-target="#themPhongBan">
                                <i class="bi bi-plus"></i>
                                Thêm mới
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#themPhongBan">Hủy</button>
                    <button type="button" class="btn btn-danger">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Danh sach chuc danh -->
    <div class="modal fade" id="danhsachChucDanh" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 38%">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">DANH SÁCH CHỨC DANH</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label ms-3" for="flexRadioDefault1">
                                        Chủ tịch HĐQT
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2">
                                    <label class="form-check-label ms-3" for="flexRadioDefault2">
                                        Tổng Giám đốc
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault3">
                                    <label class="form-check-label ms-3" for="flexRadioDefault3">
                                        Phó Tổng Giám đốc
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault4">
                                    <label class="form-check-label ms-3" for="flexRadioDefault4">
                                        Giám đốc điều hành
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault5">
                                    <label class="form-check-label ms-3" for="flexRadioDefault5">
                                        Quản lý cấp cao
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault6">
                                    <label class="form-check-label ms-3" for="flexRadioDefault6">
                                        Quản lý cấp trung
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault7">
                                    <label class="form-check-label ms-3" for="flexRadioDefault7">
                                        Trưởng phòng
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault8">
                                    <label class="form-check-label ms-3" for="flexRadioDefault8">
                                        Phó phòng
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault9">
                                    <label class="form-check-label ms-3" for="flexRadioDefault9">
                                        Trưởng nhóm
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault10">
                                    <label class="form-check-label ms-3" for="flexRadioDefault10">
                                        Chuyên viên
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-check_wrapper d-flex justify-content-between align-items-center border-bottom">
                                <div class="form-check d-flex align-items-center">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault10">
                                    <label class="form-check-label ms-3" for="flexRadioDefault10">
                                        Nhân viên
                                    </label>
                                </div>
                                <div class="form-check_actions">
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/edit.svg') }}" />
                                    </div>
                                    <div class="btn">
                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/trash.svg') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="btn text-primary mt-3" {{-- data-bs-toggle="modal" data-bs-target="#themChucDanh" --}}>
                                <i class="bi bi-plus"></i>
                                Thêm mới
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#themDSThemViTri">Hủy</button>
                    <button type="button" class="btn btn-danger">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Them phong ban -->
    <div class="modal fade" id="themPhongBan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">THÊM ĐƠN VỊ/PHÒNG BAN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="d-flex col-sm-4">
                                    <div class="modal_body-title">Tên đơn vị <span class="text-danger">*</span></div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="Nhập Tên đơn vị">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex col-sm-4">
                                    <div class="modal_body-title">Mã đơn vị <span class="text-danger">*</span></div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="Nhập Mã đơn vị">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="d-flex col-sm-4">
                                    <div class="modal_body-title">Thuộc đơn vị <span class="text-danger">*</span></div>
                                </div>
                                <div class="col-sm-8">
                                    <select class="selectpicker" data-dropup-auto="false" title="Chọn đơn vị">
                                        <option>Doppelherz</option>
                                        <option>CTCP Mastertran</option>
                                        <option>CTCP Thái Bình Hưng Thịnh</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex col-sm-4">
                                    <div class="modal_body-title">Cấp tổ chức <span class="text-danger">*</span></div>
                                </div>
                                <div class="col-sm-8 d-flex align-items-center">
                                    <select class="selectpicker" data-dropup-auto="false" title="Chọn cấp tổ chức">
                                        <option>Công ty con</option>
                                        <option>Chi nhánh</option>
                                        <option>Văn phòng đại diện</option>
                                        <option>Văn phòng</option>
                                        <option>Trung tâm</option>
                                        <option>Phòng ban</option>
                                        <option>Nhóm/tổ/đội</option>
                                        <option>Phân xưởng</option>
                                        <option>Nhà máy</option>
                                        <option>Công ty thành viên</option>
                                    </select>
                                    <div class="modal_list-more" data-bs-toggle="modal"
                                        data-bs-target="#danhsachCapToChuc">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="d-flex col-sm-4">
                                    <div class="modal_body-title">Trưởng đơn vị <span class="text-danger">*</span></div>
                                </div>
                                <div class="col-sm-8">
                                    <select class="selectpicker" data-dropup-auto="false" title="Chọn trưởng đơn vị">
                                        <option>Nguyễn Ngọc Bảo</option>
                                        <option>Đặng Nguyễn Lam Mai</option>
                                        <option>Hồ Thị Hồng Vân</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="d-flex col-sm-4">
                                    <div class="modal_body-title">Trụ sở chính <span class="text-danger">*</span></div>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" placeholder="Nhập địa chỉ">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="d-flex align-items-center">
                                <div class="d-flex col-sm-2">
                                    <div class="modal_body-title">Chức năng <br> nhiệm vụ<span
                                            class="text-danger">*</span></div>
                                </div>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Nhập Chức năng, nhiệm vụ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal"
                        data-bs-toggle="modal" data-bs-target="#themViTriCongViec">Hủy</button>
                    <button type="button" class="btn btn-danger">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Them Vi Tri chức danh -->
    <div class="modal fade" id="themDSThemViTri" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">THÊM Vị trí/Chức danh</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            {{-- <div class="col-sm-6 mb-3">
                                <input class="form-control" type="text"  placeholder="Nhập mã vị trí">
                            </div> --}}

                            <div class="col-sm-12 mb-3">
                                <input class="form-control test_name" required type="text"
                                    placeholder="Nhập tên vị trí *" name="name" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Tên vị trí">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Đơn vị công tác">
                                    <select class="selectpicker test_deps" data-dropup-auto="false" required
                                        name="department_id" title="Chọn đơn vị công tác *" data-width="100%"
                                        data-live-search="true" data-live-search-placeholder="Tìm kiếm..."
                                        data-size="5">
                                            <option value="1">
                                                name
                                            </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Cấp nhân sự">
                                    <select id="onchangeCapNhanSu" class="selectpicker test_pos"
                                        data-dropup-auto="false" placeholder="Chọn cấp nhân sự *"
                                        name="position_level" title="Chọn cấp nhân sự " data-width="100%"
                                        data-live-search="true" data-live-search-placeholder="Tìm kiếm..."
                                        data-size="5">
                                            <option value="1">
                                                name
                                            </option>
                                        <option value="" class="text-danger">+ Thêm mới</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm12 mb-3">
                                <textarea class="form-control test_des" name="description" placeholder="Nhập mô tả công việc"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mô tả công việc"></textarea>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <input class="form-control test_employees" type="number" min="0"
                                    name="max_employees" placeholder="Định biên *" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Định biên">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <input class="form-control test_salary" type="number" min="0"
                                    name="salary_fund" placeholder="Quỹ lương năm *" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Quỹ lương năm" />
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger test_cancel"
                            data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger test_save">Lưu</button>
                    </div>

                </form>
            </div>
        </div>
    </div>



    <!-- Modal Them cấp nhân sự-->
    <div class="modal fade" id="themCapNhanSu" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">THÊM CẤP NHÂN SỰ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/danh-sach-cap-nhan-su" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <input class="form-control test_code" type="text"
                                    placeholder="Nhập mã cấp nhân sự">
                            </div>

                            <div class="col-sm-6 mb-3">
                                <input class="form-control test_name" type="text"
                                    placeholder="Nhập tên cấp nhân sự" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger test_cancel" data-bs-dismiss="modal"
                            data-bs-toggle="modal" data-bs-target="#themDSThemViTri">Hủy</button>
                        <button type="submit" class="btn btn-danger test_save">Lưu</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer-script')
    {{-- <script src="{{ asset('assets/plugins/jquery-treeSelect/cbtree.js') }}" type="text/javascript"></script> --}}

    <script>
        $(document).ready(function() {
            $.datetimepicker.setLocale('vi');

            $('#createUser').datetimepicker({
                format: 'd/m/Y',
                timepicker: false,
            });

            $('#suaCreateUser').datetimepicker({
                format: 'd/m/Y',
                timepicker: false,
            });
            $('#onchangePhongBan').change(function() {
                var opval = $(this).val();
                if (opval == "themPhongBan") {
                    $('#themPhongBan').modal("show");
                    $('#themThanhVien').modal("hide");
                }
            });
            $('#onchangeViTriCongViec').change(function() {
                var opval = $(this).val();
                if (opval == "themViTriCongViec") {
                    $('#themViTriCongViec').modal("show");
                    $('#themThanhVien').modal("hide");
                }
            });
            $('.onchangeCapNhanSu').change(function() {
                var opval = $(this).val();
                if (opval == "themCapNhanSu") {
                    $('#themCapNhanSu').modal("show");
                    $('#themDSThemViTri').modal("hide");
                }
            });
        });
    </script>
    <script>
        function fileValue(value) {
            var path = value.value;
            var extenstion = path.split('.').pop();
            if (extenstion == "jpg" || extenstion == "svg" || extenstion == "jpeg" || extenstion == "png" || extenstion ==
                "gif") {
                document.getElementById('image-preview').src = window.URL.createObjectURL(value.files[0]);
            } else {
                alert("Không hỗ trợ định dạng này. ")
            }
        }
    </script>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
            // Click Tree
            const clickTrees = document.querySelectorAll(".clicktree");
            clickTrees.forEach((clickTree) => {
                clickTree.addEventListener("click", () => {
                    const id = clickTree.getAttribute("data-href");
                    const element = document.querySelector(id);
                    if (element) {
                        const items = document.querySelectorAll(".body_content-wrapper");
                        items.forEach((item) => {
                            item.style.display = "none";
                        });
                        element.style.display = "block";
                        const noContent = document.querySelector(".body_noContent-wrapper");
                        if (noContent) {

                            noContent.style.display = "none";
                        }
                    } else {
                        const items = document.querySelectorAll(".body_content-wrapper");
                        items.forEach((item) => {
                            item.style.display = "none";
                        });
                    }
                });
            });

            // Search Tree
            document.querySelector("#search_tree").addEventListener("keyup", function() {
                var value = this.value.toLowerCase();
                var lis = document.querySelectorAll(".tree li");
                for (var i = 0; i < lis.length; i++) {
                    var li = lis[i];
                    var text = li.textContent.toLowerCase();
                    if (text.indexOf(value) > -1) {
                        li.style.display = "";
                    } else {
                        li.style.display = "none";
                    }
                }
            });
        });
    </script>

    <script>
        function handleClickTree(evt) {
            const dpId = evt.target.getAttribute('data-department-id');
            if (!dpId) return;
            //?id=dpId to url
            const url = new URL(window.location.href);
            url.searchParams.set('department', dpId);
            console.log(url.href);
            window.location.href = url.href;
        }
    </script>
@endsection
