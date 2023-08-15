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
                            <div class="container">
                                {{-- Title Header --}}
                                <div class="d-flex align-items-center justify-content-between mt-3">
                                    <h1 class="text-color_pimary">CÔNG TY CỔ PHẦN ABC VIỆT NAM - ABC</h1>
                                    <div>
                                        <button class="btn btn-outline-danger me-3">Về danh sách</button>
                                        <button class="btn btn-danger">Tạo đơn hàng</button>
                                    </div>
                                </div>

                                {{-- Thông tin liên hệ --}}
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="container">
                                            <div class="mb-4">
                                                <div class="mySlides">
                                                    <img src="{{ asset('assets/img/oto-1.png') }}" style="width:100%">
                                                </div>

                                                <div class="mySlides">
                                                    <img src="{{ asset('assets/img/oto-2.png') }}" style="width:100%">
                                                </div>

                                                <div class="mySlides">
                                                    <img src="{{ asset('assets/img/oto-3.png') }}" style="width:100%">
                                                </div>

                                                <div class="mySlides">
                                                    <img src="{{ asset('assets/img/oto-4.png') }}" style="width:100%">
                                                </div>
                                            </div>

                                            <div class="row g-1">
                                                <div class="col-lg-3">
                                                    <img class="demo cursor" src="{{ asset('assets/img/oto-1.png') }}"
                                                        style="width:100%" onclick="currentSlide(1)" alt="The Woods">
                                                </div>
                                                <div class="col-lg-3">
                                                    <img class="demo cursor" src="{{ asset('assets/img/oto-2.png') }}"
                                                        style="width:100%" onclick="currentSlide(2)" alt="Cinque Terre">
                                                </div>
                                                <div class="col-lg-3">
                                                    <img class="demo cursor" src="{{ asset('assets/img/oto-3.png') }}"
                                                        style="width:100%" onclick="currentSlide(3)"
                                                        alt="Mountains and fjords">
                                                </div>
                                                <div class="col-lg-3">
                                                    <img class="demo cursor" src="{{ asset('assets/img/oto-4.png') }}"
                                                        style="width:100%" onclick="currentSlide(4)" alt="Northern Lights">
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <span>
                                                        <h2 class="text-color_pimary fs-3 mb-4">Thông tin liên hệ</h2>
                                                        <div class="layout_120">
                                                            <span class="fw-bold fs-4">Người liên hệ:</span>
                                                            <input class="input-contact" value="Hà Anh" />
                                                        </div>
                                                    </span>
                                                    <img src="{{ asset('assets/img/Qr-code.png') }}"
                                                        style="width: 104px; height: 104px;" />
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="layout_120">
                                                    <span class="fw-bold fs-4">Email:</span>
                                                    <input class="input-contact" value="haanhvt@gmail.com" />
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mt-4">
                                                <div class="layout_120">
                                                    <span class="fw-bold fs-4">Số điện thoại:</span>
                                                    <input class="input-contact" value="0989099088" />
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-4">
                                                <div class="layout_120">
                                                    <span class="fw-bold fs-4">Giai đoạn:</span>
                                                    <input class="input-contact text-color_pimary" value="Trinh sát" />
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-4">
                                                <div class="layout_120">
                                                    <span class="fw-bold fs-4">Tỷ lệ thành công:</span>
                                                    <input class="input-contact" value="Tỷ lệ thành công:" />
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
                                                    <label class="input-label text-color_pimary fs-4 fw-bold"
                                                        for="attachment" style="cursor: pointer">Đính kèm file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">
                                            <div id="aniimated-thumbnials" class="slider-for">
                                                <a href="http://farm9.staticflickr.com/8242/8558295633_f34a55c1c6_b.jpg">
                                                    <img
                                                        src="http://farm9.staticflickr.com/8242/8558295633_f34a55c1c6_b.jpg" />
                                                </a>
                                                <a href="http://farm9.staticflickr.com/8382/8558295631_0f56c1284f_b.jpg">
                                                    <img
                                                        src="http://farm9.staticflickr.com/8382/8558295631_0f56c1284f_b.jpg" />
                                                </a>
                                                <a href="http://farm9.staticflickr.com/8225/8558295635_b1c5ce2794_b.jpg">
                                                    <img
                                                        src="http://farm9.staticflickr.com/8225/8558295635_b1c5ce2794_b.jpg" />
                                                </a>
                                                <a href="http://farm9.staticflickr.com/8383/8563475581_df05e9906d_b.jpg">
                                                    <img
                                                        src="http://farm9.staticflickr.com/8383/8563475581_df05e9906d_b.jpg" />
                                                </a>
                                            </div>

                                            <div class="slider-nav">
                                                <div class="item-slick">
                                                    <img src="http://farm9.staticflickr.com/8242/8558295633_f34a55c1c6_b.jpg"
                                                        alt="Alt">
                                                </div>
                                                <div class="item-slick">
                                                    <img src="http://farm9.staticflickr.com/8382/8558295631_0f56c1284f_b.jpg"
                                                        alt="Alt">
                                                </div>
                                                <div class="item-slick">
                                                    <img src="http://farm9.staticflickr.com/8225/8558295635_b1c5ce2794_b.jpg"
                                                        alt="Alt">
                                                </div>
                                                <div class="item-slick">
                                                    <img src="http://farm9.staticflickr.com/8383/8563475581_df05e9906d_b.jpg"
                                                        alt="Alt">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="container">
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
                                </div> --}}
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
                                                {{-- Thông tin chung --}}
                                                <div class="my-3 wapper-contact">
                                                    <h2 class="text-color_pimary fs-3">1. Thông tin chung</h2>
                                                    <div class="row mt-5">
                                                        <div class="col-lg-4">
                                                            <div class="layout_120">
                                                                <span class="fw-bold fs-4">Tên khách hàng:</span>
                                                                <input class="input-contact" value="Công ty cp abc" />
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-4">
                                                            <div class="layout_120">
                                                                <span class="fw-bold fs-4">Số điện
                                                                    thoại:</span>
                                                                <input class="input-contact" value="0989099088" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="layout_120">
                                                                <span class="fw-bold fs-4">Email:</span>
                                                                <input class="input-contact" value="haanhvt@gmail.com" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Tổ chức --}}
                                                <div class="mb-3 wapper-contact">
                                                    <h2 class="text-color_pimary fs-3">2. Tổ chức</h2>
                                                    </h2>
                                                    <div class="row mt-5">
                                                        <div class="col-lg-4">
                                                            <div class="layout_120">
                                                                <span class="fw-bold fs-4">Tên công ty:</span>
                                                                <input class="input-contact" value="Công ty cp abc" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="layout_120">
                                                                <span class="fw-bold fs-4">SĐT công ty:</span>
                                                                <input class="input-contact" value="0989099088" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="layout_120">
                                                                <span class="fw-bold fs-4">Email công ty:</span>
                                                                <input class="input-contact" value="haanhvt@gmail.com" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mt-5">
                                                            <div class="layout_120">
                                                                <span class="fw-bold fs-4">Mã số thuế:</span>
                                                                <input class="input-contact" value="0107465382" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mt-5">
                                                            <div class="layout_120">
                                                                <span class="fw-bold fs-4">Đại diện:</span>
                                                                <input class="input-contact" value="Trần Minh Nam" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mt-5">
                                                            <div class="layout_120">
                                                                <span class="fw-bold fs-4">Chức danh:</span>
                                                                <input class="input-contact" value="Giám đốc" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mt-5">
                                                            <div class="layout_120">
                                                                <span class="fw-bold fs-4">Số tài khoản:</span>
                                                                <input class="input-contact" value="103988291" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8 mt-5">
                                                            <div class="layout_120">
                                                                <span class="fw-bold fs-4">Ngân hàng:</span>
                                                                <input class="input-contact"
                                                                    value="Ngân hàng TMCP Việt Nam Thịnh vượng - Chinh nhánh Hà Nội" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <h2 class="text-color_pimary fs-3 pb-4">3. Địa chỉ</h2>
                                                    {{-- Địa chỉ --}}
                                                    <div class="col-lg-4">
                                                        <div class="mb-3 wapper-contact">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="layout_120">
                                                                        <span class="fw-bold fs-4">Tỉnh/thành:</span>
                                                                        <input class="input-contact" value="Hà Nội" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-4">
                                                                    <div class="layout_120">
                                                                        <span class="fw-bold fs-4">Quận/huyện:</span>
                                                                        <input class="input-contact" value="Cầu Giấy" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-4">
                                                                    <div class="layout_120">
                                                                        <span class="fw-bold fs-4">Phường/xã:</span>
                                                                        <input class="input-contact" value="Yên Hòa" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Mô tả --}}
                                                        <div class="mb-3 wapper-contact">
                                                            <div class="row">
                                                                <h2 class="text-color_pimary fs-3">4. Mô tả</h2>
                                                                <div class="col-lg-12 mt-4">
                                                                    <div class="layout_120">
                                                                        <span class="fw-bold fs-4">NS thu thập:</span>
                                                                        <input class="input-contact" value="Admin" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-4">
                                                                    <div class="layout_120">
                                                                        <span class="fw-bold fs-4">SP quan tâm:</span>
                                                                        <input class="input-contact"
                                                                            value="Xe điện, xe golf" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Phân loại --}}
                                                        <div class="row">
                                                            <h2 class="text-color_pimary fs-3">5. Phân loại</h2>
                                                            <div class="col-lg-12 mt-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Nhóm KH:</span>
                                                                    <input class="input-contact" value="1,3" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mt-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Kênh KH:</span>
                                                                    <input class="input-contact" value="OTC" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mt-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Tuyến:</span>
                                                                    <input class="input-contact" value="Hà Nội - Thứ 2" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- Địa chỉ và map --}}
                                                    <div class="col-lg-8">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Địa chỉ:</span>
                                                                    <input class="input-contact"
                                                                        value="219 Trung Kính, Yên Hòa, Cầu Giấy ,Hà Nội" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12 mt-4">
                                                                <div>
                                                                    <div id="map"
                                                                        style="height: 345px; display: block;background: red">
                                                                    </div>
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
            @include('template.footer.footer')
        </div>
    </div>
    @include('template.sidebar.sidebarMaster.sidebarRight')

    <style>
        img {
            vertical-align: middle;
        }

        /* Hide the images by default */
        .mySlides {
            display: none;
        }

        /* Add a pointer when hovering over the thumbnail images */
        .cursor {
            cursor: pointer;
        }

        /* Next & previous buttons */
        .prev,
        .next {
            cursor: pointer;
            position: absolute;
            top: 40%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 20px;
            border-radius: 0 3px 3px 0;
            user-select: none;
            -webkit-user-select: none;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Six columns side by side */
        .column {
            float: left;
            width: 16.66%;
        }

        /* Add a transparency effect for thumnbail images */
        .demo {
            opacity: 0.6;
        }

        .active,
        .demo:hover {
            opacity: 1;
        }

        .header_menu-link {
            font-size: 1.5rem !important;
        }

        .action_wrapper-search {
            position: relative;
        }


        .input-group {
            position: relative;
        }

        .input-group .input-group-text {
            background-color: #f8f9fa;
            border: none;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
        }

        .form-control {
            border: none;
            border-radius: 0;
            box-shadow: none;
        }

        .input-label {
            margin-left: 10px;
            line-height: calc(1.5em + 0.75rem + 2px);
            font-size: 1rem;
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

        #progress li {
            float: left;
            padding: 10px 30px 10px 40px;
            background: #333;
            color: #fff;
            position: relative;
            border-top: 1px solid #666;
            border-bottom: 1px solid #666;
            width: 16%;
            margin: 0 1px;
            font-size: 8px
        }

        #progress li:before {
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
            border-left: 16px solid #333;
            border-top: 16px solid transparent;
            border-bottom: 16px solid transparent;
            position: absolute;
            top: 0;
            left: 100%;
            z-index: 20;
        }

        #progress li.active {
            background: #555;
        }

        #progress li.active:after {
            border-left-color: #555;
        }

        .wapper-contact {
            padding-bottom: 20px;
            border-bottom: 1px solid #07060633;
        }

        .img-header {
            width: 40%;
            height: auto;
            margin: auto
        }

        .title-hearder {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 3.5rem;
        }

        .input-item {
            width: 200px !important;
        }

        .card-body {
            padding: 15px 30px 30px 30px !important;
        }

        .text-color_pimary {
            color: var(--primary-color);
        }

        .text-title_header {
            font-size: 2rem
        }

        .text-content {
            font-size: 1.6rem
        }

        .title-pdf {
            font-size: 1.5rem
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
            border-bottom: none !important;
            /* border-bottom: 1px solid #969393 !important; */
            line-height: 15px;
            width: 100%;
            font-size: 1.5rem;
        }

        .input-contact:focus {
            outline: none !important;
            border-top: none !important;
            border-left: none !important;
            border-right: none !important;
            border-bottom: none !important;
            /* border-bottom: 1px solid #969393 !important; */
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
        // Show Slider
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("demo");
            let captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }

        $('.slider').owlCarousel({
            loop: true,
            margin: 10,
            items: 1,
            dots: false,
            URLhashListener: true
        })
        $('.slider2').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            items: 3,
            dots: false,
            center: true,
            URLhashListener: true
        })

        // var rev = $('.rev_slider');
        // rev.on('init', function(event, slick, currentSlide) {
        //     var
        //         cur = $(slick.$slides[slick.currentSlide]),
        //         next = cur.next(),
        //         prev = cur.prev();
        //     prev.addClass('slick-sprev');
        //     next.addClass('slick-snext');
        //     cur.removeClass('slick-snext').removeClass('slick-sprev');
        //     slick.$prev = prev;
        //     slick.$next = next;
        // }).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        //     //console.log('beforeChange');
        //     var
        //         cur = $(slick.$slides[nextSlide]);
        //     //console.log(slick.$prev, slick.$next);
        //     slick.$prev.removeClass('slick-sprev');
        //     slick.$next.removeClass('slick-snext');
        //     next = cur.next(),
        //         prev = cur.prev();
        //     prev.prev();
        //     prev.next();
        //     prev.addClass('slick-sprev');
        //     next.addClass('slick-snext');
        //     slick.$prev = prev;
        //     slick.$next = next;
        //     cur.removeClass('slick-next').removeClass('slick-sprev');
        // });

        // rev.slick({
        //     speed: 1000,
        //     arrows: true,
        //     dots: false,
        //     focusOnSelect: true,
        //     prevArrow: '<button> prev</button>',
        //     nextArrow: '<button> next</button>',
        //     infinite: true,
        //     centerMode: true,
        //     slidesPerRow: 1,
        //     slidesToShow: 1,
        //     slidesToScroll: 1,
        //     centerPadding: '0',
        //     swipe: true,
        //     customPaging: function(slider, i) {
        //         return '';
        //     },
        // });
    </script>
@endsection
