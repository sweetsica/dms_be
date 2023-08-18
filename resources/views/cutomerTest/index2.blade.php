@extends('template.master')
@section('title', 'Danh sách khách hàng')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css.map">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


@endsection
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection" style="height: 145rem">
            <div class="main">
                <div class="container">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Chi tiết khách hàng</h5>
                        @include('template.components.sectionCard')
                    </div>
                    <div class="card mb-3">
                        <div class="card-body card-warpper">
                            <div class="container">
                                {{-- Title Header --}}
                                <div class="d-flex align-items-center justify-content-start my-3">
                                    <h1 class="text-color_pimary fs-3">CÔNG TY CỔ PHẦN ABC VIỆT NAM - ABC</h1>

                                </div>

                                {{-- Thông tin liên hệ --}}
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="row g-4">
                                            <div class="col-lg-12">
                                                <div class="slider slider-single">
                                                    <div>
                                                        <img class="img-slider" src="{{ asset('assets/img/oto-1.png') }}" />
                                                    </div>
                                                    <div>
                                                        <img class="img-slider" src="{{ asset('assets/img/oto-2.png') }}" />
                                                    </div>
                                                    <div>
                                                        <img class="img-slider" src="{{ asset('assets/img/oto-3.png') }}" />
                                                    </div>
                                                    <div>
                                                        <img class="img-slider" src="{{ asset('assets/img/oto-4.png') }}" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="slider slider-nav">
                                                    <div>
                                                        <img src="{{ asset('assets/img/oto-1.png') }}"
                                                            class="img-slider_nav" />
                                                    </div>
                                                    <div>
                                                        <img src="{{ asset('assets/img/oto-2.png') }}"
                                                            class="img-slider_nav" />
                                                    </div>
                                                    <div>
                                                        <img src="{{ asset('assets/img/oto-3.png') }}"
                                                            class="img-slider_nav" />
                                                    </div>
                                                    <div>
                                                        <img src="{{ asset('assets/img/oto-4.png') }}"
                                                            class="img-slider_nav" />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between">
                                                    <span>
                                                        <h2 class="text-color_pimary fs-3 mb-4">Thông tin liên
                                                            hệ</h2>
                                                        <div class="layout_120">
                                                            <span class="fw-bold fs-4">Người liên hệ:</span>
                                                            <span class="fs-4">Hà Anh</span>
                                                        </div>
                                                    </span>
                                                    <img src="{{ asset('assets/img/Qr-code.png') }}"
                                                        style="width: 65px; height: 65px;" />
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mt-4">
                                                <div class="layout_120">
                                                    <span class="fw-bold fs-4">Email:</span>
                                                    <span class="fs-4">haanhvt@gmail.com</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mt-4">
                                                <div class="layout_120">
                                                    <span class="fw-bold fs-4">Số điện thoại:</span>
                                                    <span class="fs-4">0989099088</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-5 mt-4">
                                                <div class="layout_120">
                                                    <span class="fw-bold fs-4">Giai đoạn:</span>
                                                    <span class="fs-4 text-color_pimary">Trinh sát</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-7 mt-4">
                                                <div class="row">
                                                    <div class="col-lg-6 ">
                                                        <span class="fw-bold fs-4 title-contact">Tỷ lệ:</span>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <span class="fs-4">100%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mt-4">
                                                <ul id="progress">
                                                    <li class="active">Trinh sát</li>
                                                    <li>Step 2</li>
                                                    <li>Step 3</li>
                                                    <li>Step 4</li>
                                                    <li>Step 5</li>
                                                    <li>Step 6</li>
                                                </ul>
                                            </div>

                                            <div class="mt-4">
                                                <div class="input-group align-items-center">
                                                    <input type="file" class="form-control" id="attachment"
                                                        name="attachment" style="display: none">
                                                    <i class="bi bi-link-45deg text-color_pimary fs-3 fw-bold"></i>
                                                    <label class="input-label text-color_pimary fs-4 fw-bold ms-2"
                                                        for="attachment" style="cursor: pointer">Đính kèm
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="viewport mt-5">
                                <div class="container">
                                    <ul class="tabs">
                                        <li class="label-item">
                                            <input type="radio" name="tab" id="playlists" value="playlists" checked>
                                            <label class="label-info header_menu-link" for="playlists">
                                                Thông tin chi tiết
                                            </label>
                                            <div class="tabBody">
                                                <div class="container">
                                                    {{-- Thông tin chung --}}
                                                    <div class="my-3 wapper-contact mt-5">
                                                        <h2 class="text-color_pimary fs-3">1. Thông tin chung</h2>
                                                        <div class="row mt-5">
                                                            <div class="col-lg-5">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Tên KH:</span>
                                                                    <span class="fs-4">Công ty cp abc</span>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Số điện
                                                                        thoại:</span>
                                                                    <span class="fs-4">0989099088</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="row g-0 ">
                                                                    <div class="col-lg-5">
                                                                        <span
                                                                            class="fw-bold fs-4 title-contact">Email:</span>
                                                                    </div>
                                                                    <div class="col-lg-7 text-end">
                                                                        <span class="fs-4">haanhvt@gmail.com</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Tổ chức --}}
                                                    <div class="mb-3 wapper-contact">
                                                        <h2 class="text-color_pimary fs-3">2. Tổ chức</h2>
                                                        </h2>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-5">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Tên công ty:</span>
                                                                    <span class="fs-4">Công ty cp abc</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">SĐT công ty:</span>
                                                                    <span class="fs-4">0989099088</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="row g-0">
                                                                    <div class="col-lg-5 ">
                                                                        <span class="fw-bold fs-4 title-contact">Email công
                                                                            ty:</span>
                                                                    </div>
                                                                    <div class="col-lg-7 text-end">
                                                                        <span class="fs-4">haanhvt@gmail.com</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="col-lg-5 mt-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Mã số thuế:</span>
                                                                    <span class="fs-4">0107465382</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mt-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Đại diện:</span>
                                                                    <span class="fs-4">Trần Minh Nam</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mt-4">
                                                                <div class="row g-0">
                                                                    <div class="col-lg-5">
                                                                        <span class="fw-bold fs-4 title-contact">Chức
                                                                            danh:</span>
                                                                    </div>
                                                                    <div class="col-lg-7 text-end">
                                                                        <span class="fs-4">Giám đốc</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="col-lg-5 mt-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Số tài khoản:</span>
                                                                    <span class="fs-4">103988291</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7 mt-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Ngân hàng:</span>
                                                                    <span class="fs-4">Ngân hàng TMCP Việt Nam
                                                                        Thịnh vượng -
                                                                        Chinh nhánh Hà Nội</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <h2 class="text-color_pimary fs-3 pb-4">3. Địa chỉ</h2>
                                                        {{-- Địa chỉ --}}
                                                        <div class="col-lg-5">
                                                            <div class="mb-3 wapper-contact">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="layout_120">
                                                                            <span class="fw-bold fs-4">Tỉnh/thành:</span>
                                                                            <span class="fs-4">Hà Nội</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 mt-4">
                                                                        <div class="layout_120">
                                                                            <span class="fw-bold fs-4">Quận/huyện:</span>
                                                                            <span class="fs-4">Cầu Giấy</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 mt-4">
                                                                        <div class="layout_120">
                                                                            <span class="fw-bold fs-4">Phường/xã:</span>
                                                                            <span class="fs-4">Yên Hòa</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- Mô tả --}}
                                                            <div class="mb-3 wapper-contact">
                                                                <div class="row">
                                                                    <h2 class="text-color_pimary fs-3">4. Mô tả
                                                                    </h2>
                                                                    <div class="col-lg-12 mt-4">
                                                                        <div class="layout_120">
                                                                            <span class="fw-bold fs-4">NS thu
                                                                                thập:</span>
                                                                            <span class="fs-4">Admin</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 mt-4">
                                                                        <div class="layout_120">
                                                                            <span class="fw-bold fs-4">SP quan
                                                                                tâm:</span>
                                                                            <span class="fs-4">Xe điện, xe
                                                                                golf</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- Phân loại --}}
                                                            <div class="row">
                                                                <h2 class="text-color_pimary fs-3">5. Phân loại
                                                                </h2>
                                                                <div class="col-lg-12 mt-4">
                                                                    <div class="layout_120">
                                                                        <span class="fw-bold fs-4">Nhóm KH:</span>
                                                                        <span class="fs-4">1,3</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-4">
                                                                    <div class="layout_120">
                                                                        <span class="fw-bold fs-4">Kênh KH:</span>
                                                                        <span class="fs-4">OTC</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-4">
                                                                    <div class="layout_120">
                                                                        <span class="fw-bold fs-4">Tuyến:</span>
                                                                        <span class="fs-4">Hà Nội - Thứ 2</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- Địa chỉ và map --}}
                                                        <div class="col-lg-7">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="layout_120">
                                                                        <span class="fw-bold fs-4">Địa chỉ:</span>
                                                                        <span class="fs-4">219 Trung Kính, Yên
                                                                            Hòa, Cầu Giấy
                                                                            ,Hà Nội</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-4">
                                                                    <div id="map" class="border"
                                                                        style="height: 345px; display: block">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="label-item">
                                            <input type="radio" name="tab" id="artists" value="artists">
                                            <label class=" label-info header_menu-link" for="artists">Chào
                                                hàng</label>
                                            <div class="tabBody">

                                            </div>
                                        </li>
                                        <li class="label-item">
                                            <input type="radio" name="tab" id="albums" value="albums">
                                            <label class="label-info header_menu-link" for="albums">Cơ
                                                hội</label>
                                            <div class="tabBody">

                                            </div>
                                        </li>
                                        <li class="label-item">
                                            <input type="radio" name="tab" id="baogia" value="baogia">
                                            <label class=" label-info header_menu-link" for="baogia">Báo
                                                giá</label>
                                            <div class="tabBody">

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-end">
                        <button class="btn btn-danger me-3 px-5">In</button>
                        <button class="btn btn-outline-danger me-3">Về danh sách</button>
                        <button class="btn btn-danger">Tạo đơn hàng</button>
                    </div>
                </div>
            </div>
            @include('template.footer.footer')
        </div>
    </div>
    @include('template.sidebar.sidebarMaster.sidebarRight')

    <style>
        .title-contact {
            padding-left: 25px;
        }

        .img-slider {
            width: 100%;
            object-fit: cover;
            height: 100%;
        }

        .img-slider_nav {
            width: 100%;
            height: 100%;
            object-fit: cover;
            margin-right: 10px;
            padding: 12%;
        }

        .header_menu-link {
            font-size: 1.5rem !important;
        }

        .action_wrapper-search {
            position: relative;
        }

        #progress {
            padding: 0;
            list-style-type: none;
            font-size: 10px;
            clear: both;
            line-height: 1em;
            margin: 0 -1px;
            text-align: center;
        }

        #progress li:first-child {
            border-radius: 20px 0 0 20px;
        }

        #progress li {
            float: left;
            padding: 10px 10px 10px 10px;
            background: #c1c4c1;
            color: #fff;
            position: relative;
            width: calc(16% - 1px);
            margin: 0 1px;
            font-size: 12px;
        }


        #progress li:nth-child(n + 2):before {
            content: '';
            border-left: 16px solid #fff;
            border-top: 16px solid transparent;
            border-bottom: 16px solid transparent;
            position: absolute;
            top: 0;
            left: 0;

        }

        #progress li:after {
            content: '';
            border-left: 16px solid #c1c4c1;
            border-top: 16px solid transparent;
            border-bottom: 15px solid transparent;
            position: absolute;
            top: 0;
            left: 100%;
            z-index: 20;
        }

        #progress li.active {
            background: #46ab2b;
        }

        #progress li.active:after {
            border-left-color: #46ab2b;
        }

        .wapper-contact {
            padding-bottom: 20px;
            border-bottom: 1px solid #07060633;
        }


        .card-body {
            padding: 15px 30px 30px 30px !important;
        }

        .text-color_pimary {
            color: var(--primary-color);
        }

        .layout_120 {
            display: grid;
            grid-template-columns: 100px auto;
        }

        .layout_90 {
            display: grid;
            grid-template-columns: 90px auto;
        }

        .layout_45 {
            display: grid;
            grid-template-columns: 45px auto;
        }

        .layout_auto {
            display: grid;
            grid-template-columns: auto auto;
        }
    </style>



@section('footer-script')

    <!-- Plugins -->
    <script src="{{ asset('assets/plugins/jquery-datetimepicker/custom-datetimepicker.js') }}"></script>

    <script type="text/javascript" charset="utf-8"
        src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
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


    <script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>


    <script type="text/javascript" src="{{ asset('/assets/js/components/resetFilter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/components/dataHrefTable.js') }}"></script>

    {{-- Slick --}}
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        $(".slider-single").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            useTransform: false,
            asNavFor: ".slider-nav",
        });
        $(".slider-nav").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: ".slider-single",
            dots: false,
            focusOnSelect: true,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev bg-transparent" style="position: absolute;left: -3%; top: 40%; z-index: 9;"><i class="bi bi-arrow-left-short fs-2 text-color_pimary"></i></button>',
            nextArrow: '<button type="button" class="slick-prev bg-transparent" style="position: absolute;right: -3%; top: 40%; z-index: 9;"><i class="bi bi-arrow-right-short fs-2 text-color_pimary"></i></button>'
        });
    </script>
@endsection
