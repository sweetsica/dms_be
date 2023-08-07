@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách khách hàng')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    
    <style>

    </style>
@endsection
@php
    
    // function getPaginationLink($link, $pageName)
    // {
    //     if (!isset($link->url)) {
    //         return '#';
    //     }
    
    //     $pageNumber = explode('?page=', $link->url)[1];

    //     $queryString = request()->query();
    
    //     $queryString[$pageName] = $pageNumber;
    //     return route('timekeeping.list', $queryString);
    // }

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

    $listData = [
        ['id' => 1, 'code' => 'KH0001', 'name' => 'Nguyễn Tuân', 'usermanager' => 'Nguyễn Văn A - TBHT00', "mobi" => '0988888888', "email" => 'khachhang1@tbht.vn', 'nhom' => 'Nhà Thuốc', 'kenh' => 'OTC', 'tuyen' => 'Thứ 2',  'business' => 'Công ty A',  'thue' => '123456',  'tinh' => 'Hà Nội',  'quan' => 'Cầu Giấy',  'phuong' => 'Yên Hoà',  'diachi' => '219 Trung Kính',  'tuyen' => 'Thứ 2',  'sp' => 'Ô tô điện, xe đạp điện',  'trangthai' => 'Tiềm năng',],
        
    ];
    
@endphp
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    {{-- <div class="card_template-wrapper">
                        
                    </div> --}}
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Chi tiết khách hàng</h5>
                        @include('template.components.sectionCard')
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class='row'>
                                <div class="col-md-12">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center mb-3">
                                            
                                            <div class="card-title"> <i class="bi bi-briefcase" style="padding-right: 6px"></i>Nhà thuốc Vĩnh Thịnh</div>
                                            
                                        </div>

                                        <div class="action_wrapper">

                                            
                                            <div class="action_export ms-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Về danh sách" data-bs-original-title="Về danh sách">
                                                <a class="btn btn-outline-danger d-block testCreateUser" href="/customer" role="button"
                                                    role="button">Về danh sách</a>
                                            </div>
                                            <div class="action_export ms-3" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Tạo đơn hàng" data-bs-original-title="Tạo đơn hàng">
                                                <button class="btn btn-danger d-block testCreateUser" data-bs-toggle="modal" data-bs-target="#">Tạo đơn hàng</button>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    <div class="row mb-3 d-flex align-items-center mt-3">
                                        
                                        <div class="col-4">
                                            <div class="card_template-title d-flex align-items-center">
                                                <div class="text-nowrap me-4">Người liên hệ:</div>
                                                <div class="card_template-sub d-flex align-items-center">
                                                    <div class="card_template-sub-text">Hà Anh</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="card_template-title d-flex align-items-center">
                                                <div class="text-nowrap me-4 ">Số điện thoại:</div>
                                                <div class="card_template-sub d-flex align-items-center">
                                                    <div class="card_template-sub-text">098888888</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="card_template-title d-flex align-items-center">
                                                <div class="text-nowrap me-4">Email:</div>
                                                <div class="card_template-sub d-flex align-items-center">
                                                    <div class="card_template-sub-text">test@tbht.vn</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mb-3 d-flex align-items-center mt-3">
                                        
                                        <div class="col-4">
                                            <div class="card_template-title d-flex align-items-center">
                                                <div class="text-nowrap me-4">Giai đoạn:</div>
                                                <div class="card_template-sub d-flex align-items-center">
                                                    <div class="card_template-sub-text">Trinh sát</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="card_template-title d-flex align-items-center">
                                                <div class="text-nowrap me-4 ">Tỷ lệ thành công:</div>
                                                <div class="card_template-sub d-flex align-items-center">
                                                    <div class="card_template-sub-text">100%</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="viewport mt-3">
                                        <ul class="tabs">
                                          <li class="label-item">
                                            <input type="radio" name="tab" id="playlists" value="playlists" checked> 
                                            <label class="label-info header_menu-link"  for="playlists">
                                                Thông tin chi tiết
                                            </label>
                                            <div class="tabBody">
                                                <div class="row">
                                                    <div class="col-sm-12 card-title mt-3">1. Liên hệ</div>
                                                    <div class="col-4 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Người liên hệ:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">Hà Anh</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4 ">Số điện thoại:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">098888888</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Email:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">test@tbht.vn</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 card-title mt-3">2. Tổ chức</div>
                                                    <div class="col-6 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Tên công ty:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">Nhà thuốc Vĩnh Thịnh</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Số điện thoại công ty:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">024 791 88 88</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Mã số thuế:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">0108976543</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Email công ty:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">nhathuocvinhthinh@gmail.com</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Người đại diện:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text fw-bolder">Lê Vĩnh Long</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Chức danh:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text fw-bolder">Giám đốc</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Số tài khoản: </div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">07003988012</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Mở tại ngân hàng:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">Vietcombank - CN Cầu Giấy</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 card-title mt-3">3. Địa chỉ</div>
                                                    <div class="col-6 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Tỉnh/thành:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">Hà Nội</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4 ">Quận/huyện:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">Cầu Giấy</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Phường/xã:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">Yên Hòa</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Địa chỉ:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">219 Trung Kính</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <div id="map" style="height: 300px; display: none"></div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 card-title mt-3">4. Mô tả</div>
                                                    <div class="col-6 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Nhân sự thu thập: </div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">Nguyễn Hương Mai</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4 ">Sản phẩm quan tâm: </div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">Viên sủi, Colagen</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 card-title mt-3">5. Phân loại</div>
                                                    <div class="col-4 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4">Nhóm khách hàng: </div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">Nhà thuốc</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4 ">Kênh khách hàng:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">Nhà thuốc</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 mt-3">
                                                        <div class="card_template-title d-flex align-items-center">
                                                            <div class="text-nowrap me-4 ">Tuyến:</div>
                                                            <div class="card_template-sub d-flex align-items-center">
                                                                <div class="card_template-sub-text">Hà Nội - Thứ 2</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>




                                            </div>
                                          </li>  
                                          <li class="label-item">
                                            <input type="radio" name="tab" id="artists" value="artists"> 
                                            <label class=" label-info header_menu-link"  for="artists">Chào hàng</label>
                                            <div class="tabBody">

                                            </div>
                                          </li>  
                                          <li class="label-item">
                                            <input type="radio" name="tab" id="albums" value="albums"> 
                                            <label class="label-info header_menu-link"  for="albums">Cơ hội</label>
                                            <div class="tabBody">
                                      
                                            </div>
                                          </li>
                                          <li class="label-item">
                                            <input type="radio" name="tab" id="baogia" value="baogia"> 
                                            <label class=" label-info header_menu-link"  for="baogia">Báo giá</label>
                                            <div class="tabBody">

                                            </div>
                                          </li>
                                        </ul>
                                    </div>


                                    
                                    
                                    <nav aria-label="Page navigation example" class="float-end mt-3"
                                        id="target-pagination">
                                        <ul class="pagination">
                                            {{-- @foreach ($listUsers->links as $link)
                                                <li class="page-item {{ $link->active ? 'active' : '' }}">
                                                    <a class="page-link" href="{{ getPaginationLink($link, 'page') }}" aria-label="Previous">
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

    @foreach($listData as $item)
    {{-- delete --}}
    <div class="modal fade" id="xoaca{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="#" method="POST">
                        @csrf
                        {{-- @method('DELETE') --}}
                        <button type="submit" class="btn btn-danger" id="deleteRowElement">Có, tôi muốn
                            xóa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- edit --}}
    <div class="modal fade" id="suaca{{ $item['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm khách hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formThemCapPhat" method="POST" action="#">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="card-title">1. Thông tin chung</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" value="1" name="topic" data-bs-toggle="tooltip" required data-bs-placement="top" title="Tên khách hàng" placeholder="Tên khách hàng*" class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <input type="text" value="1"  name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Số điện thoại" placeholder="Số điện thoại*" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" value="1"  name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Email" placeholder="Email*" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card-title">2. Tổ chức</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" value="1"  name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Tên công ty" placeholder="Tên công ty" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" value="1"  name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Người đại diện" placeholder="Người đại diện" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" value="1"  name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Chức danh" placeholder="Chức danh" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" value="1"  name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Mã số thuế" placeholder="Mã số thuế" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" value="1"  name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Số điện thoại công ty" placeholder="Số điện thoại công ty" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" value="1"  name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Email công ty" placeholder="Email công ty" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" value="1"  name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Số tài khoản" placeholder="Số tài khoản" class="form-control">
                            </div>
                            <div class="col-md-8 mb-3">
                                <input type="text" value="1"  name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Mở tại ngân hàng" placeholder="Mở tại ngân hàng" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="card-title">3. Địa chỉ</div>
                            </div>
                            <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Tỉnh/thành">
                                <select class="selectpicker" required data-dropup-auto="false" data-width="100%" data-live-search="true" title="Tỉnh/thành*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1" selected>1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Quận/huyện">
                                <select class="selectpicker" required data-dropup-auto="false" data-width="100%" data-live-search="true" title="Quận/huyện*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1" selected>1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Phường/xã">
                                <select class="selectpicker" required data-dropup-auto="false" data-width="100%" data-live-search="true" title="Phường/xã*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1" selected>1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" value="1"  name="topic" data-bs-toggle="tooltip" required data-bs-placement="top" title="Địa chỉ" placeholder="Địa chỉ*" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="card-title">4. Mô tả</div>
                            </div>
                            
                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Nhân sự thu thập">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%" required data-live-search="true" title="Nhân sự thu thập*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1" selected>1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Sản phẩm quan tâm">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%" required data-live-search="true" title="Sản phẩm quan tâm*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1" selected>1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            

                            <div class="col-md-12 mb-3">
                                <div class="card-title">5. Phân loại</div>
                            </div>
                            
                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Nhóm khách hàng">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%" required data-live-search="true" title="Nhóm khách hàng*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="Nhà thuốc" selected>Nhà thuốc</option>
                                    <option value="Phòng khám/Trung tâm tế">Phòng khám/Trung tâm tế</option>
                                    <option value="Bệnh viện">Bệnh viện</option>
                                    <option value="Nhà phân phối">Nhà phân phối</option>
                                    <option value="Online">Online</option>
                                    <option value="Khách sạn">Khách sạn</option>
                                    <option value="Nhà thuốc S">Nhà thuốc S</option>
                                    <option value="Siêu thị/Cửa hàng bán lẻ">Siêu thị/Cửa hàng bán lẻ</option>
                                    <option value="Chuỗi nhà thuốc">Chuỗi nhà thuốc</option>
                                    <option value="Đại siêu thị">Đại siêu thị</option>
                                    <option value="Làm đẹp/Phòng tập thể dục/Thể thao">Làm đẹp/Phòng tập thể dục/Thể thao</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Tuyến">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%" required data-live-search="true" title="Tuyến*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1" selected>1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Kênh khách hàng">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%" required data-live-search="true" title="Kênh khách hàng*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="OTC" selected>OTC</option>
                                    <option value="ETC">ETC</option>
                                    <option value="MT">MT</option>
                                    <option value="Đại lý cá nhân">Đại lý cá nhân</option>

                                </select>
                            </div>
                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Trạng thái">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%" required data-live-search="true" title="Trạng thái*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="Trinh sát" selected>Trinh sát</option>
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

    @endforeach

    <!-- Modal thêm khách hàng -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Thêm khách hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formThemCapPhat" method="POST" action="#">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="card-title">1. Thông tin chung</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" required data-bs-placement="top" title="Tên khách hàng" placeholder="Tên khách hàng*" class="form-control">
                            </div>

                            <div class="col-md-4 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Số điện thoại" placeholder="Số điện thoại*" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Email" placeholder="Email*" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card-title">2. Tổ chức</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Tên công ty" placeholder="Tên công ty" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Người đại diện" placeholder="Người đại diện" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Chức danh" placeholder="Chức danh" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Mã số thuế" placeholder="Mã số thuế" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Số điện thoại công ty" placeholder="Số điện thoại công ty" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Email công ty" placeholder="Email công ty" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Số tài khoản" placeholder="Số tài khoản" class="form-control">
                            </div>
                            <div class="col-md-8 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" data-bs-placement="top" title="Mở tại ngân hàng" placeholder="Mở tại ngân hàng" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="card-title">3. Địa chỉ</div>
                            </div>
                            <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Tỉnh/thành">
                                <select class="selectpicker" required data-dropup-auto="false" data-width="100%" data-live-search="true" title="Tỉnh/thành*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1">1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Quận/huyện">
                                <select class="selectpicker" required data-dropup-auto="false" data-width="100%" data-live-search="true" title="Quận/huyện*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1">1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Phường/xã">
                                <select class="selectpicker" required data-dropup-auto="false" data-width="100%" data-live-search="true" title="Phường/xã*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1">1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" name="topic" data-bs-toggle="tooltip" required data-bs-placement="top" title="Địa chỉ" placeholder="Địa chỉ*" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="card-title">4. Mô tả</div>
                            </div>
                            
                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Nhân sự thu thập">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%" required data-live-search="true" title="Nhân sự thu thập*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1">1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Sản phẩm quan tâm">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%" required data-live-search="true" title="Sản phẩm quan tâm*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1">1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            

                            <div class="col-md-12 mb-3">
                                <div class="card-title">5. Phân loại</div>
                            </div>
                            
                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Nhóm khách hàng">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%" required data-live-search="true" title="Nhóm khách hàng*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
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
                                    <option value="Làm đẹp/Phòng tập thể dục/Thể thao">Làm đẹp/Phòng tập thể dục/Thể thao</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Tuyến">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%" required data-live-search="true" title="Tuyến*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="1">1</option>
                                    <option value="1">1</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Kênh khách hàng">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%" required data-live-search="true" title="Kênh khách hàng*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                    <option value="OTC">OTC</option>
                                    <option value="ETC">ETC</option>
                                    <option value="MT">MT</option>
                                    <option value="Đại lý cá nhân">Đại lý cá nhân</option>

                                </select>
                            </div>
                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Trạng thái">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%" required data-live-search="true" title="Trạng thái*" data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
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
                                <div class="modal_items col-sm-6" >
                                    Email:<span class="text-danger">khtbht@gmail.com</span>
                                </div>
                                <div class="modal_items col-sm-6" >
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
                                <div class="modal_items col-sm-6" >
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
                                <div class="modal_items col-sm-6" >
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


@endsection
@section('footer-script')
        <!-- Plugins -->
         <script src="{{ asset('assets/plugins/jquery-datetimepicker/custom-datetimepicker.js') }}"></script>

        <script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
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


<script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>


    <script type="text/javascript" src="{{ asset('/assets/js/components/resetFilter.js') }}"></scrip>
    <script type="text/javascript" src="{{ asset('/assets/js/components/dataHrefTable.js') }}"></script>
@endsection
