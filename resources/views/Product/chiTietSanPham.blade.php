@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Mẫu yêu cầu mua sắm')

@php
    $userDepartmentName = session('department_name');
    // function getProposalRelatedPeople($proposal)
    // {
    //     $data = $proposal->data;
    //     $data = json_decode($data);
    //     if (!isset($data->relatedPeople)) {
    //         return [];
    //     }
    //     return $data->relatedPeople;
    // }

    // function isRelatedToProposal($proposal, $userId)
    // {
    //     $related = getProposalRelatedPeople($proposal);
    //     if (count($related) == 0) {
    //         return false;
    //     }
    //     foreach ($related as $item) {
    //         if ($item == $userId) {
    //             return true;
    //         }
    //     }
    // }

    // function isEdit($proposal, $userId)
    // {
    //     if ($proposal->status > 0) {
    //         return false;
    //     }
    //     if ($proposal->sender_id == $userId) {
    //         return true;
    //     }
    // }
    // foreach (Session::get('listPositions') as $items)
    //     if ($items->id === Session::get('position_id'))
    //         $position_name =$items->name 
@endphp
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="card_template-wrapper">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card_template-body" id="container-fluid">
                                <div class="card_template-body-top">
                                    <div class='row mb-3 d-flex align-items-center'>
                                        
                                        <div class="col-12 d-flex align-items-center justify-content-center flex-column">
                                            <div class="card_template-heading">Thông số sản phẩm</div>
                                            <div class="card_template-sub with_input d-flex justify-content-center align-items-center">Xe điện - SP0001</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card_template-body-middle">
                                    <div class="col-md-12 mb-3">
                                        <textarea type="text"  rows="4" placeholder="" class=" form-control textareaResize" name="product">Mẫu xe điện bán chạy nhất thế giới được Thái Hưng nhập về để phục vụ cho quá trình nghiên cứu. Được mệnh danh là xe điện nhỏ nhất thế giới, Wuling Hongguang Mini EV chỉ có mức giá từ 100-150 triệu đồng tương đương với mẫu xe SH Honda được ưa thích hiện nay. Với chính sách và ưu đãi hấp dẫn của Trung Quốc cho người dân khi mua xe điện, Wuling Hongquang trở thành xe điện báy chạy nhất toàn cầu và vượt qua Tesla Model 3.

                                        </textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="table-responsive YCMS_repeater">
                                            <table class="table table-bordered" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                      <th class="text-nowrap text-center" style="width:10%">Model</th>
                                                      <th class="text-nowrap text-center" style="width:30%">Hình ảnh</th>
                                                      <th class="text-nowrap text-center" style="width:30%">Thông số kỹ thuật cơ bản</th>
                                                    </tr>
                                                </thead>
                                                <tbody >

                                                    <tr >
                                                        <td>
                                                            <div class="">
                                                                <textarea type="text"  rows="1" placeholder="" class="card-title-black form-control textareaResize" name="product">WLD T242</textarea>
                                                                
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <div class="d-flex flex-column justify-content-center align-items-center">

                                                                <div class="upload_wrapper-items">
                                                                    <input type="hidden" value="" />
                                                                    <button role="button" type="button" class="btn position-relative border d-flex">
                                                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/upload-file.svg') }}" />
                                                                        <span class="ps-2">Chọn ảnh</span>
                                                                        <input role="button" type="file" class="modal_upload-input modal_upload-file" name="files[]" multiple onchange="updateList(event)" />
                                                                    </button>
                                                                    <ul class="modal_upload-list" style="max-height: 200px; overflow-y: scroll; overflow-x: hidden;">
                                                                    </ul>
                
                                                                </div>
                
                                                            </div>
                                                        </td>
                                                            
                                                        <td>
                                                            <textarea rows="14" type="text " placeholder="" class="form-control textareaResize" name="quantity">Xe Điện Wuling - WLDT242&#13;&#10;- Khối lượng bản thân xe: 540kg&#13;&#10;- Khối lượng toàn bộ xe: 1.080kg&#13;&#10;- Số chỗ ngồi 4+2 (6 người kể cả lái)&#13;&#10;- Kích thước bao (D x R x C) 3536 x 1200 x 1800 mm&#13;&#10;- Khoảng cách trục: 3340 mm&#13;&#10;- Ký hiệu, động cơ: HPQ4-48-18N/Điện xoay chiều&#13;&#10;- Tốc độ tối đa: 24 km/h&#13;&#10;- Ắc quy Chì Axit: 48V - 170Ah&#13;&#10;- Công suất động cơ Motor (max) 4KW&#13;&#10;- Lốp xe: + Trục 1 (1st Axle): 2/205/50-10&#13;&#10;+ Trục 2 (2md Axle): 2/205/50-10&#13;&#10;- Khả năng leo dốc 20%&#13;&#10;- Quãng đường hoạt động: 70km/h</textarea>
                                                        </td>
                                                        
                                                    </tr>

                                                    
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="card_template-body-bottom">
                                    <div class="row">
                                        <div class="col-12 modal-title">Sản phẩm liên quan</div>
                                        <div class="col-4 mt-3">
                                            <div class=" control_product"  >
                                                <a href=" {{ route('customers') }}" class="control_product_link" id="control_link-1">
                                                    
                                                    <div class="control_product_img" style="width: 40%">
                                                        <img src="{{ asset('/assets/img/xedien.png')}}" alt="">
                                                    </div>
                                                    <div class="control-info ms-2" style="width: 80%">

                                                        <div class="over_info1 control_title fs-5">
                                                            Xe điện tuần tra
                                                        </div>
                                                        <div class="over_info2">Tiết kiệm năng lượng, Tốc độ 28km/h, </div>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-4 mt-3">
                                            <div class=" control_product"  >
                                                <a href=" {{ route('customers') }}" class="control_product_link" id="control_link-1">
                                                    <div class="control_product_img" style="width: 40%">
                                                        <img src="{{ asset('/assets/img/xedien.png')}}" alt="">
                                                    </div>
                                                    <div class="control-info ms-2" style="width: 80%">

                                                        <div class="over_info1 control_title fs-5">
                                                            Xe đẩy hàng
                                                        </div>
                                                        <div class="over_info2">Lồng chứa rời, Tải trọng 400kg </div>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-4 mt-3">
                                            <div class=" control_product"  >
                                                <a href=" {{ route('customers') }}" class="control_product_link" id="control_link-1">
                                                    <div class="control_product_img" style="width: 40%">
                                                        <img src="{{ asset('/assets/img/xedien.png')}}" alt="">
                                                    </div>
                                                    <div class="control-info ms-2" style="width: 80%">

                                                        <div class="over_info1 control_title fs-5">
                                                            Xe thăm quan
                                                        </div>
                                                        <div class="over_info2">Quãng đường 120km, 12 chỗ ngồi</div>
                                                    </div>

                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3" >
                                            <button class="btn btn-danger d-block" data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Thêm sản phẩm liên quan" data-bs-original-title="Thêm sản phẩm liên quan" data-bs-toggle="modal" data-bs-target="#add">+</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="card_template-footer">
                                    <a href="#" type="button" class="btn btn-outline-danger ps-5 pe-5 me-3">Hủy</a>
                                    <button type="submit" class="btn btn-danger ps-5 pe-5">Lưu</button>
                                </div> 
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            @include('template.footer.footer')
        </div>
    </div>
    @include('template.sidebar.sidebarDeXuat.sidebarRight')

    
    {{-- Modal thêm sản phẩm liên quan --}}
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



@endsection
@section('footer-script')

    <!-- Plugins -->
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
    <script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_chiPhi.js') }}"></script>

    <script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>

    <script>
        const targetTable = $('#dsDaoTao').DataTable({
            paging: true,
            ordering: false,
            order: [
                [0, 'desc']
            ],
            pageLength: 25,
            language: {
                info: 'Hiển thị _START_ đến _END_ trên _TOTAL_ bản ghi',
                infoEmpty: 'Hiện tại chưa có bản ghi nào',
                search: 'Tìm kiếm',
                paginate: {
                    previous: '<i class="bi bi-caret-left-fill"></i>',
                    next: '<i class="bi bi-caret-right-fill"></i>',
                },
                search: '',
                searchPlaceholder: 'Tìm kiếm...',
                zeroRecords: 'Không tìm thấy kết quả',
            },
            oLanguage: {
                sLengthMenu: "_MENU_ bản ghi trên trang",
            },
            dom: '<"d-flex justify-content-between mb-3"<"card-title-left"><"d-flex "<"card-title-right justify-content-end">f>>rt<"dataTables_bottom"i<"d-flex align-items-center justify-content-between"lp>>',
        });
        $('div.card-title-left').html(`
            <div class="action_wrapper">
                <select id="filter_status"  class="selectpicker filter_status" data-dropup-auto="false" title="Lọc chủ đề">
                    <option value="all">Tất cả</option>
                </select>
            </div>
        `);
        $('div.card-title-right').html(`
            <div class="action_wrapper">
                <div class="action_export me-3">
                    <button class="btn btn-danger d-block testCreateUser" data-bs-toggle="modal"
                        data-bs-target="#taoDeXuat">Tạo đề xuất</button>
                </div>
            </div>
        `);
    </script>

    <script>
        updateList = function(e) {
            const input = e.target;
            const outPut = input.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector(
                '.modal_upload-list');
            const notSupport = outPut.parentNode.querySelector('.alertNotSupport');

            let children = '';
            console.log(children);
            const allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
            const maxFileSize = 10485760; //10MB in bytes

            for (let i = 0; i < input.files.length; ++i) {
                const file = input.files.item(i);
                //allowedTypes.includes(file.type) &&
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
                    setTimeout(() => {
                        notSupport.style.display = 'none';
                    }, 3500);
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

            const inputEl = liEl.parentNode.parentNode.querySelector('.modal_upload-input');
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
    </script>
    <script>
        const select = document.querySelector('#filter_status');
        const rows = document.querySelectorAll('.table-row');

        select.addEventListener('change', () => {
            const selectedStatusId = select.value;

            rows.forEach(row => {
                const statusId = row.getAttribute('data-status-id');
                if (selectedStatusId === 'all' || selectedStatusId === statusId) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
    <script>
        function filterTable() {
            var input, filter, table, rows, status_id;
            input = document.getElementById("search-input");
            filter = input.value.toUpperCase();
            table = document.getElementById("table");
            rows = table.getElementsByTagName("tr");
            status_id = document.querySelector(".filter_status").value;
            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var cols = row.getElementsByTagName("td");
                var display = false;
                var statusValue = cols[5].innerText;
                if (status_id === "all" || statusValue === status_id) {
                    if (filter === "") {
                        display = true;
                    } else {
                        for (var j = 0; j < cols.length; j++) {
                            var col = cols[j];
                            if (col.innerText.toUpperCase().indexOf(filter) > -1) {
                                display = true;
                                break;
                            }
                        }
                    }
                }
                if (display) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            }
        }
    </script>

    <script>
        $(document).ready(function() {

            $('.datePicker').daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                // startDate: new Date(),
                locale: {
                    format: 'DD/MM/YYYY '
                }
            });

        });
    </script>




    <script>
        $(document).ready(function() {
            // Hide the text areas initially
            $('.showSign, .showFormYKien').hide();
            $('#confirmBtn').hide();

            // Attach event listeners to radio buttons using a loop
            $('input[type="radio"]').each(function() {
                $(this).click(function() {
                    //show confirm button
                    $('#confirmBtn').show();
                    var selectedRadio = $(this).val();

                    if (selectedRadio === 'confirmRadio') {
                        $('.showSign').show();
                        $('.showFormYKien').hide();
                    } else if (selectedRadio === 'destroyRadio') {
                        $('.showFormYKien').show();
                        $('.showSign').hide();
                    }
                });
            });
        });
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/components/capturePDF.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/components/autoResize.js') }}"></script>
@endsection
