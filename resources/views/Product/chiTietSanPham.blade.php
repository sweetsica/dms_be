@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Mẫu yêu cầu mua sắm')
@section('header-style')
    <style>
        .carousel-indicators button.thumbnail {
            width: 200px;
        }

        .carousel-indicators button.thumbnail:not(.active) {
            opacity: 0.7;
        }

        .carousel-indicators {
            position: static;
        }


        .carousel-indicators [data-bs-target] {
            height: 40px;
        }

        @media screen and (min-width: 200px) {
            .carousel {
                max-width: 70%;
                margin: 0 auto;
            }
        }
    </style>
@endsection

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
                            <div class="card_template-body" id="container-fluid">
                                <div class="card_template-body-top">
                                    <div class='row mb-3 d-flex align-items-center'>
                                        <div class="col-4 d-flex align-items-center justify-content-center ">
                                            <a class=" ">
                                                <img class="header_logo" src="{{ env('LOGO_URL', '') }}" />
                                            </a>
                                        </div>
                                        <div class="col-4 d-flex align-items-center justify-content-center flex-column">
                                            <div class="card_template-heading">Thông tin sản phẩm</div>
                                            <div class="d-flex align-items-center">
                                                <div class="modal-title-black mt-2"> SẢN PHẨM XE TANO -</div>
                                                <div class=" modal-title mt-2 ms-2">SP - TANO01</div>
                                            </div>
                                        </div>
                                        <div class="col-4 d-flex align-items-center justify-content-end">
                                            <img class="qrCode_wrapper1" src="{{ asset('/assets/img/QR.webp')}}" alt="">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div>
                                    <div class="text-break " style="margin-left: 4px">1</div>
                                </div> --}}


                                {{-- Giao diện nhập input --}}
                                {{-- <div class="row card_template-body-middle mb-3">
                                    <div class="col-md-6 mb-3">
                                            <div class="upload_wrapper-items">
                                                <div class="alert alert-danger alertNotSupport" role="alert" style="display:none">
                                                    File bạn tải lên hiện tại không hỗ trợ !
                                                </div>
                                                <div class="modal_upload-wrapper">
                                                    <label class="modal_upload-label" for="file">
                                                        Tải ảnh của sản phẩm ở đây</label>
                                                    <div class="mt-2 text-secondary fst-italic">Hỗ trợ định
                                                        dạng
                                                        JPG,
                                                        PNG
                                                    </div>
                                                    <div
                                                        class="modal_upload-action mt-3 d-flex align-items-center justify-content-center">
                                                        <div class="modal_upload-addFile me-3">
                                                            <button role="button" type="button"
                                                                class="btn position-relative pe-4 ps-4">
                                                                <img style="width:16px;height:16px"
                                                                    src="{{ asset('assets/img/upload-file.svg') }}" />
                                                                Tải file lên
                                                                <input role="button" type="file"
                                                                    class="modal_upload-input modal_upload-file" name="files[]"
                                                                    multiple onchange="updateList(event)">
                                                            </button>
                                                        </div>
            
                                                    </div>
                                                </div>
                                                <ul class="modal_upload-list"
                                                    style="max-height: 134px; overflow-y: scroll; overflow-x: hidden;"></ul>
                                            </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="card-title-black">Mô tả:</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <textarea rows="4" type="text" placeholder="(Vui lòng nhập thông tin chung về sản phẩm)" class="form-control textareaResize" name="">VF 5 Plus sở hữu thiết kế hiện đại, trẻ trung, cá tính và nổi bật với các lựa chọn phối màu nội ngoại thất, đảm bảo cá nhân hóa theo phong cách sống, cá tính và sở thích của mỗi khách hàng.</textarea>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <textarea rows="6" type="text" placeholder="(Vui lòng nhập thông tin chung về sản phẩm)" class="form-control textareaResize" name="">VinFast VF 5 Plus được trang bị đầy đủ những công nghệ tiên tiến bậc nhất:&#13;&#10;-Giám sát hành trình cơ bản&#13;&#10;-Cảnh báo giao thông phía sau&#13;&#10;-Cảnh báo điểm mù&#13;&#10;-Hỗ trợ đỗ xe phía sau&#13;&#10;-Hỗ trợ phanh khẩn cấp...</textarea>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <button type="button" class="btn btn-danger" id="showPriceButton">Giá bán</button>
                                            </div>
                                            <div class="col-md-12 mb-3" id="priceSection" style="display: none;">
                                                <div class="card_template-title d-flex align-items-center justify-content-center">
                                                    <div class="text-nowrap">Giá bán:</div>
                                                    <div class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                        <input type="text" placeholder="" class="form-control" name="proposalNo">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4 mb-3">
                                                <textarea rows="1" type="text" placeholder="(Catalogue)" class="form-control textareaResize" name="">Catalogue mô tả</textarea>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <textarea rows="1" type="text" placeholder="(Bản thiết kế)" class="form-control textareaResize" name="">Bản thiết kế</textarea>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <textarea rows="1" type="text" placeholder="(Giới thiệu)" class="form-control textareaResize" name="">Giới thiệu</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="col-md-12 mb-3">
                                            <div class="mb-3">
                                                <div class="modal-title">Thông số kỹ thuật:</div>
                                            </div>

                                            <div class="DNTU_repeater">
                                                <div data-repeater-list="DNTU_list">
                                                    <div class="row repeater_wrapper d-flex align-items-center" style="position: relative" data-repeater-item>
                                                            <div class="col-md-5 mb-3 d-flex align-items-center">
                                                                <div class=" card_template-sub with_input d-flex justify-content-center align-items-center" style="width:30%">
                                                                    <input type="text" value="Độ dài" placeholder="" class="card-title-black form-control" name="proposalNo">
                                                                </div>
                                                                <div class=" card_template-sub with_input d-flex justify-content-center align-items-center" style="width:70%">
                                                                    <input type="text" value="Catalogue mô tả" placeholder="" class=" form-control" name="proposalNo">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 mb-3 d-flex align-items-center">
                                                                <div class=" card_template-sub with_input d-flex justify-content-center align-items-center" style="width:30%">
                                                                    <input type="text" value="Độ dài" placeholder="" class="card-title-black form-control" name="proposalNo">
                                                                </div>
                                                                <div class=" card_template-sub with_input d-flex justify-content-center align-items-center" style="width:70%">
                                                                    <input type="text" value="Catalogue mô tả" placeholder="" class=" form-control" name="proposalNo">
                                                                </div>
                                                            </div>
                                                            <div class="col-2 mb-3">
                                                                <img data-repeater-delete role="button" src="{{ asset('/assets/img/trash.svg') }}" width="20px" height="20px" />
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="">
                                                    <div class="d-flex justify-content-start">
                                                        <div role="button" class="fs-5 text-danger" data-repeater-create><i class="bi bi-plus-circle"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>


                                    
                                </div> --}}

                                {{-- Giao diện hiển thị --}}
                                <div class="row card_template-body-middle mb-3">
                                    <div class="col-md-6 mb-3" style="overflow: hidden;">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-2.jpg" class="d-block w-100 "
                                                        alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-1.jpg" class="d-block w-100"
                                                        alt="...">
                                                </div>
                                                <div class="carousel-item">
                                                    <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-3.jpg" class="d-block w-100"
                                                        alt="...">
                                                </div>
                                            </div>
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active thumbnail"
                                                    aria-current="true" aria-label="Slide 1">
                                                    <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-2.jpg" class="d-block w-100"
                                                        alt="...">
                                                </button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="thumbnail"
                                                    aria-label="Slide 2">
                                                    <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-1.jpg" class="d-block w-100"
                                                        alt="...">
                                                </button>
                                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="thumbnail"
                                                    aria-label="Slide 3">
                                                    <img src="https://codingyaar.com/wp-content/uploads/bootstrap-carousel-slide-3.jpg" class="d-block w-100"
                                                        alt="...">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="card-title-black">Mô tả:</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="text-break " style="margin-left: 4px">1</div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <div class="text-break " style="margin-left: 4px">1</div>
                                                
                                            </div>
                                            <div class="col-md-12 mb-3" id="priceSection" style="display: none;">
                                                <div class="card_template-title d-flex align-items-center justify-content-center">
                                                    <div class="text-nowrap">Giá bán:</div>
                                                    <div class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                        <div class="text-break " style="margin-left: 4px">1</div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4 mb-3">
                                                <div class="text-break " style="margin-left: 4px">1</div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="text-break " style="margin-left: 4px">1</div>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="text-break " style="margin-left: 4px">1</div>

                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="col-md-12 mb-3">
                                            <div class="mb-3">
                                                <div class="modal-title">Thông số kỹ thuật:</div>
                                            </div>

                                            <div class="DNTU_repeater">
                                                <div data-repeater-list="DNTU_list">
                                                    <div class="row repeater_wrapper d-flex align-items-center" style="position: relative" data-repeater-item>
                                                            <div class="col-md-5 mb-3 d-flex align-items-center">
                                                                <div class=" card_template-sub with_input d-flex justify-content-center align-items-center" style="width:30%">

                                                                     <div class="text-break " style="margin-left: 4px">1</div>
                                                                </div>
                                                                <div class=" card_template-sub with_input d-flex justify-content-center align-items-center" style="width:70%">

                                                                    <div class="text-break " style="margin-left: 4px">1</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 mb-3 d-flex align-items-center">
                                                                <div class=" card_template-sub with_input d-flex justify-content-center align-items-center" style="width:30%">
                                                                    <div class="text-break " style="margin-left: 4px">1</div>
                                                                </div>
                                                                <div class=" card_template-sub with_input d-flex justify-content-center align-items-center" style="width:70%">
                                                                    <div class="text-break " style="margin-left: 4px">1</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 mb-3">
                                                                <img data-repeater-delete role="button" src="{{ asset('/assets/img/trash.svg') }}" width="20px" height="20px" />
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="">
                                                    <div class="d-flex justify-content-start">
                                                        <div role="button" class="fs-5 text-danger" data-repeater-create><i class="bi bi-plus-circle"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>


                                    
                                </div>
                                
                                
                                <div class="card_template-body-bottom">
                                    <div class="row">
                                        <div class="col-12 modal-title">Sản phẩm liên quan</div>
                                        <div class="col-4 mt-3">
                                            <div class=" control_product"  >
                                                <div href="#" class="control_product_link" id="control_link-1">
                                                    
                                                    <div class="control_product_img" style="width: 30%">
                                                        <img src="{{ asset('/assets/img/xedien.png')}}" alt="">
                                                    </div>
                                                    <div class="control-info ms-2" style="width: 60%">

                                                        <div class="over_info1 card-title-black fs-5">
                                                            Mẫu xe gia đình - BT-TANO1
                                                        </div>
                                                        <div class="over_info1">120.000.000</div>
                                                        <a href="" class="over_info1">Xem chi tiết</a>
                                                    </div>
                                                    <div  class="col btn test_btn-remove custom-btn" href="#" data-bs-toggle="modal" data-bs-target="#xoa"  style="width: 10%">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 mt-3">
                                            <div class=" control_product"  >
                                                <div href="#" class="control_product_link" id="control_link-1">
                                                    
                                                    <div class="control_product_img" style="width: 30%">
                                                        <img src="{{ asset('/assets/img/xedien.png')}}" alt="">
                                                    </div>
                                                    <div class="control-info ms-2" style="width: 60%">

                                                        <div class="over_info1 card-title-black fs-5">
                                                            Mẫu xe gia đình - BT-TANO1
                                                        </div>
                                                        <div class="over_info1">120.000.000</div>
                                                        <a href="" class="over_info1">Xem chi tiết</a>
                                                    </div>
                                                    <div  class="col btn test_btn-remove custom-btn" href="#" data-bs-toggle="modal" data-bs-target="#xoa"  style="width: 10%">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 mt-3">
                                            <div class=" control_product"  >
                                                <div href="#" class="control_product_link" id="control_link-1">
                                                    
                                                    <div class="control_product_img" style="width: 30%">
                                                        <img src="{{ asset('/assets/img/xedien.png')}}" alt="">
                                                    </div>
                                                    <div class="control-info ms-2" style="width: 60%">

                                                        <div class="over_info1 card-title-black fs-5">
                                                            Mẫu xe gia đình - BT-TANO1
                                                        </div>
                                                        <div class="over_info1">120.000.000</div>
                                                        <a href="" class="over_info1">Xem chi tiết</a>
                                                    </div>
                                                    <div  class="col btn test_btn-remove custom-btn" href="#" data-bs-toggle="modal" data-bs-target="#xoa"  style="width: 10%">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3">
                                            <button class="btn btn-danger d-block" data-bs-toggle="modal" data-bs-target="#add">+ Thêm thông số</button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="card_template-footer">
                                    <button type="button" class="btn btn-outline-danger ps-5 pe-5 me-3" data-bs-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-danger ps-5 pe-5">Lưu</button>
                                </div> 
                            </div>
                    </div>
                </div>
            </div>
            @include('template.footer.footer')
        </div>
    </div>
    @include('template.sidebar.sidebarDeXuat.sidebarRight')

            {{-- delete --}}
            <div class="modal fade" id="xoa" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h5 class="modal-title w-100" id="exampleModalLabel">XOÁ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="fs-5">Bạn có thực sự muốn xoá sản phẩm này không?</div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger"  data-bs-toggle="modal" data-bs-dismiss="modal">Hủy</button>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" id="deleteRowElement">Có, tôi muốn
                                    xóa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


    {{-- Modal thêm sản phẩm liên quan --}}
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Link sản phẩm liên quan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formThemCapPhat" method="POST" action="#">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 d-flex align-items-center pb-3 mt-2" >
                                <div class="d-flex align-items-center">
                                    <div class="card-title">Chọn sản phẩm liên quan</div>
                                </div>

                                <div class="col-sm-7" style="padding-left: 10px">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Sản phẩm">
                                        <select class="selectpicker" data-dropup-auto="false" data-width="100%" data-live-search="true" title="Chọn sản phẩm ..." data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn" data-size="3" name="secretary_id" data-live-search-placeholder="Tìm kiếm...">
                                            <option value="1">1</option>
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                </div>
                                
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
        document.getElementById('showPriceButton').addEventListener('click', function() {
            document.getElementById('showPriceButton').style.display = 'none';
            document.getElementById('priceSection').style.display = 'block';
        });
    </script>
    

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
