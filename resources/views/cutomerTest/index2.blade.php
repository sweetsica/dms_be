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
@endsection
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container">
                    <div class="mainSection_heading">

                        <h5 class="mainSection_heading-title">Chi tiết khách hàng</h5>
                        @include('template.components.sectionCard')
                    </div>
                    <div class="card mb-3">
                        <div class="card-body card-warpper">
                            <div class="border rounded">
                                <div class="container">
                                    <h1 class="mb-5 fw-bold text-center text-color_pimary">CÔNG TY
                                        TNHH
                                        KINH DOANH VÀ XÂY
                                        DỰNG BM</h1>
                                    <div class="mb-5 warpper-search">
                                        <div class="input-group input-item">
                                            <span class="input-group-text" id="addon-wrapping"><i
                                                    class="bi bi-search"></i></span>
                                            <input type="text" class="form-control" placeholder="Tìm kiếm..."
                                                aria-label="Username" aria-describedby="addon-wrapping">
                                        </div>
                                        <button type="button" class="btn btn-outline-danger ms-2"><i
                                                class="bi bi-funnel"></i></button>
                                        <button type="button" class="btn btn-danger ms-2"><i
                                                class="bi bi-plus-circle"></i></button>
                                        <button type="button" class="btn btn-secondary ms-2"><i
                                                class="bi bi-three-dots"></i></button>
                                    </div>

                                    <div class="container">
                                        <div class="rev_slider">
                                            <div class="rev_slide">
                                                <div class="img-slide">
                                                    <img
                                                        src="https://images.pexels.com/photos/842711/pexels-photo-842711.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                                                </div>
                                            </div>

                                            <div class="rev_slide">
                                                <div class="img-slide">
                                                    <img
                                                        src="https://images.pexels.com/photos/1525041/pexels-photo-1525041.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                                                </div>
                                            </div>
                                            <div class="rev_slide">
                                                <div class="img-slide">
                                                    <img
                                                        src="https://images.pexels.com/photos/1379636/pexels-photo-1379636.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="row ">
                                            <div class="col-lg-12">
                                                <div class="layout_120">
                                                    <span class="fw-bold text-content">Người liên
                                                        hệ:</span>
                                                    <input class="input-contact" value="Nguyễn Phương Thuận" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col-lg-6 mt-4">
                                                <div class="layout_120">
                                                    <span class="fw-bold text-content">Số điện thoại:</span>
                                                    <input class="input-contact" value="12345789" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mt-4">
                                                <div class="layout_120">
                                                    <span class="fw-bold text-content">
                                                        Email:</span>
                                                    <input class="input-contact" value="npthuan2000@gmail.com" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mt-4">
                                                <div class="layout_120">
                                                    <span class="fw-bold text-content">Giai đoạn:</span>
                                                    <input class="input-contact" value="Giai đoạn 1" />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mt-4">
                                                <div class="layout_120">
                                                    <span class="fw-bold text-content">Tỷ lệ thành công:
                                                    </span>
                                                    <input class="input-contact" value="100%" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="viewport mt-5">
                                    <ul class="tabs">
                                        <li class="label-item">
                                            <input type="radio" name="tab" id="playlists" value="playlists" checked>
                                            <label class="label-info header_menu-link" for="playlists">
                                                Thông tin chi tiết
                                            </label>
                                            <div class="tabBody">
                                                <div class="container">
                                                    {{-- Liên hệ --}}
                                                    <div class="mb-5">
                                                        <h2 class="text-color_pimary mt-4"> Liên hệ</h2>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Người liên
                                                                        hệ:</span>
                                                                    <input class="input-contact"
                                                                        value="Nguyễn Phương Thuận" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mt-5">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Số điện
                                                                        thoại:</span>
                                                                    <input class="input-contact" value="123456789" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mt-5">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Email:</span>
                                                                    <input class="input-contact"
                                                                        value="npthuan2000@gmail.com" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Tổ chức --}}
                                                    <div class="mb-5">
                                                        <h2 class="text-color_pimary">Tổ chức
                                                        </h2>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Tên công ty:</span>
                                                                    <input class="input-contact"
                                                                        value="CÔNG TY TNHH KINH DOANH VÀ XÂY DỰNG BM" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">SDT công
                                                                        ty:</span>
                                                                    <input class="input-contact" value="123456789" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mt-5">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Mã số thuế:</span>
                                                                    <input class="input-contact" value="10101010001" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mt-5">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Email công
                                                                        ty:</span>
                                                                    <input class="input-contact"
                                                                        value="congtya@gmail.com" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mt-5">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Đại diện:</span>
                                                                    <input class="input-contact" value="Nguyễn Văn A" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mt-5">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Chức danh:</span>
                                                                    <input class="input-contact" value="Chủ tịch" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mt-5">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Số tài khoản:</span>
                                                                    <input class="input-contact" value="99999999" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 mt-5">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Ngân hàng:</span>
                                                                    <input class="input-contact" value="BIDV" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Địa chỉ --}}
                                                    <div class="mb-5">
                                                        <h2 class="text-color_pimary">Địa chỉ
                                                        </h2>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Tỉnh/thành</span>
                                                                    <input class="input-contact" value="Hà Nội" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Quận/huyện:</span>
                                                                    <input class="input-contact" value="Sóc Sơn" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Phường/xã:</span>
                                                                    <input class="input-contact" value="Phù Lỗ" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mt-5 layout_120">
                                                                    <span class="fw-bold text-content">Địa chỉ:</span>
                                                                    <input class="input-contact"
                                                                        value="Phù Lỗ - Sóc Sơn - Hà Nội" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    {{-- Mô tả --}}
                                                    <div class="mb-5">
                                                        <h2 class="text-color_pimary">Mô tả
                                                        </h2>

                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Nhân sự thu
                                                                        thập:</span>
                                                                    <input class="input-contact"
                                                                        value="Nguyễn Phương Thuận" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">SP quan
                                                                        tâm:</span>
                                                                    <input class="input-contact" value="XSR155S" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    {{-- Phân loại --}}
                                                    <div class="mb-5">
                                                        <h2 class="text-color_pimary">Phân loại
                                                        </h2>
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Nhóm khách
                                                                        hàng:</span>
                                                                    <input class="input-contact" value="Tiềm năng" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Kênh khách
                                                                        hàng:</span>
                                                                    <input class="input-contact" value="OTC" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold text-content">Tuyến:</span>
                                                                    <input class="input-contact"
                                                                        value="Hà Nội - Hải Phòng" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-5">
                                                        <div id="map" style="height: 300px; display: none">
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
                                            <label class="label-info header_menu-link" for="albums">Cơ hội</label>
                                            <div class="tabBody">

                                            </div>
                                        </li>
                                        <li class="label-item">
                                            <input type="radio" name="tab" id="baogia" value="baogia">
                                            <label class=" label-info header_menu-link" for="baogia">Báo giá</label>
                                            <div class="tabBody">

                                            </div>
                                        </li>
                                    </ul>
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

    <style>
        .slick-slider {
            margin-left: -12%;
            margin-right: -12%;
            width: 70%;
            margin: auto;
        }

        .slick-list {
            padding-top: 10% !important;
            padding-bottom: 10% !important;
            padding-left: 15% !important;
            padding-right: 15% !important;
        }

        .slick-dots {
            text-align: right;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .slick-track {
            max-width: 100% !important;
            transform: translate3d(0, 0, 0) !important;
            perspective: 100px;
        }

        .slick-slide {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            opacity: 0;
            width: 100% !important;
            transform: translate3d(0, 0, 0);
            transition: transform 1s, opacity 1s;
        }

        .slick-current {
            opacity: 1;
            position: relative;
            display: block;
            transform: translate3d(0, 0, 20px);
            z-index: 2;
        }

        .slick-snext {
            opacity: 1;
            transform: translate3d(20%, 0, 0px);
            z-index: 1;
        }

        .slick-sprev {
            opacity: 1;
            transform: translate3d(-20%, 0, 0px);
        }

        .slick-arrow {
            display: none !important;
        }

        .img-slide img {
            object-fit: contain;
            width: 100%;
            height: 100%;
        }


        .warpper-search {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .input-item {
            width: 200px !important;
        }

        .card-body {
            padding: 50px !important;
        }

        .text-color_pimary {
            color: var(--primary-color)
        }

        .text-content {
            font-size: 14px
        }

        .layout_120 {
            display: grid;
            grid-template-columns: 120px auto;
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

        .input-contact {
            border-top: none !important;
            border-left: none !important;
            border-right: none !important;
            border-bottom: 1px solid #969393 !important;
            line-height: 15px;
            width: 100%;
            font-size: 12px;
            font-style: italic
        }

        .input-contact:focus {
            outline: none !important;
            border-top: none !important;
            border-left: none !important;
            border-right: none !important;
            border-bottom: 1px solid #969393 !important;
            box-shadow: none !important;
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var rev = $('.rev_slider');
        rev.on('init', function(event, slick, currentSlide) {
            var
                cur = $(slick.$slides[slick.currentSlide]),
                next = cur.next(),
                prev = cur.prev();
            prev.addClass('slick-sprev');
            next.addClass('slick-snext');
            cur.removeClass('slick-snext').removeClass('slick-sprev');
            slick.$prev = prev;
            slick.$next = next;
        }).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
            //console.log('beforeChange');
            var
                cur = $(slick.$slides[nextSlide]);
            //console.log(slick.$prev, slick.$next);
            slick.$prev.removeClass('slick-sprev');
            slick.$next.removeClass('slick-snext');
            next = cur.next(),
                prev = cur.prev();
            prev.prev();
            prev.next();
            prev.addClass('slick-sprev');
            next.addClass('slick-snext');
            slick.$prev = prev;
            slick.$next = next;
            cur.removeClass('slick-next').removeClass('slick-sprev');
        });

        rev.slick({
            speed: 1000,
            arrows: true,
            dots: false,
            focusOnSelect: true,
            prevArrow: '<button> prev</button>',
            nextArrow: '<button> next</button>',
            infinite: true,
            centerMode: true,
            slidesPerRow: 1,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding: '0',
            swipe: true,
            customPaging: function(slider, i) {
                return '';
            },
        });
    </script>
@endsection
