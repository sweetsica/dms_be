    @extends('template.master')
    @section('title', 'Chi Tiết sản phẩm')
    @section('header-style')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>

    @endsection
    @section('content')
        @include('template.sidebar.sidebarMaster.sidebarLeft')
        <div id="mainWrap" class="mainWrap">
            <div class="mainSection">
                <div class="main">
                    <div class="container">

                        <div class="card mb-3">

                            <div class="card-body card-warpper">
                                <div class="warrper-header mb-5">
                                    <div
                                        class="action_wrapper-search d-flex flex-wrap justify-content-between align-items-center mb-3">
                                        <div class="title-hearder text-center">
                                            <div class="fw-bold text-title_header">THÔNG SỐ SẢN PHẨM</div>
                                            <div class="fw-bold text-title_header"> SẢN PHẨM XE TANO -
                                                <span class="text-color_pimary">SP-TANO01</span>
                                            </div>
                                        </div>
                                        <div class="img-logo">
                                            <img class="img-header " src="{{ asset('/assets/img/logo.jpg') }}" />
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="container">
                                        <div class="row g-2">
                                            <div class="col-lg-7 text-center" id="slider-show">
                                                <div class="container">
                                                    <div class="row g-0">
                                                        <div class="col-lg-2">
                                                            <div class="imgaaa"
                                                                style="display: grid; grid-template-columns: auto">
                                                                <div class="border border-2 secondary mb-3 ">
                                                                    <img class="demo cursor h-100 w-100 "
                                                                        src="{{ asset('assets/img/oto-1.png') }}"
                                                                        style="width:100%" onclick="currentSlide(1)"
                                                                        alt="The Woods">
                                                                </div>
                                                                <div class="border border-2 secondary mb-3 ">
                                                                    <img class="demo cursor h-100 w-100 border border-1"
                                                                        src="{{ asset('assets/img/oto-2.png') }}"
                                                                        style="width:100%" onclick="currentSlide(2)"
                                                                        alt="Cinque Terre">
                                                                </div>

                                                                <div class="border border-2 secondary mb-3 ">
                                                                    <img class="demo cursor h-100 w-100 border border-1"
                                                                        src="{{ asset('assets/img/oto-3.png') }}"
                                                                        style="width:100%" onclick="currentSlide(3)"
                                                                        alt="Mountains and fjords">
                                                                </div>

                                                                <div class="border border-2 secondary mb-3 ">
                                                                    <img class="demo cursor h-100 w-100 border border-1"
                                                                        src="{{ asset('assets/img/oto-4.png') }}"
                                                                        style="width:100%" onclick="currentSlide(4)"
                                                                        alt="Mountains and fjords">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-10">
                                                            <div>
                                                                <div class="mySlides">
                                                                    <img src="{{ asset('assets/img/oto-1.png') }}"
                                                                        class="w-100"
                                                                        style="object-fit: contain;height: 91%">
                                                                </div>

                                                                <div class="mySlides">
                                                                    <img src="{{ asset('assets/img/oto-2.png') }}"
                                                                        class="w-100"
                                                                        style="object-fit: contain;height: 91%">
                                                                </div>

                                                                <div class="mySlides">
                                                                    <img src="{{ asset('assets/img/oto-3.png') }}"
                                                                        class="w-100"
                                                                        style="object-fit: contain;height: 91%">
                                                                </div>
                                                                <div class="mySlides">
                                                                    <img src="{{ asset('assets/img/oto-4.png') }}"
                                                                        class="w-100"
                                                                        style="object-fit: contain;height: 91%">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <span>
                                                        <p class="m-0 fs-3 fw-bold">Giá bán</p>
                                                        <p class="m-0 fs-4 fw-bold text-color_pimary">$ 500.00</p>
                                                    </span>
                                                    <span>
                                                        <img class="" src="{{ asset('/assets/img/Qr-code.png') }}"
                                                            style="width: 72px; height: 72px;" />
                                                    </span>
                                                </div>

                                                <div class="mb-2">
                                                    <p class="m-0 fs-3 fw-bold">Mô tả</p>
                                                    <div class="description-content">
                                                        <p class="fs-5 text-justify">VF 5 Plus sở hữu thiết kế hiện đại, trẻ
                                                            trung, cá tính và nổi bật với các
                                                            lựa chọn phối màu theo cá tính và sở thích của mỗi khách hàng.

                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="mb-2">
                                                    <div class="row ">
                                                        <div class="col-lg-4 mb-3">
                                                            <a href="#" class="text-color_pimary">
                                                                <img src="{{ asset('assets/img/icon-pdf.png') }}"
                                                                    class="img img-thumbnail"
                                                                    style="width:30%; border:none" />
                                                                <span class="fw-bold fs-4">BaoGia.pdf</span>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-4 mb-3">
                                                            <a href="#" class="text-color_pimary">
                                                                <img src="{{ asset('assets/img/icon-pdf.png') }}"
                                                                    class="img img-thumbnail"
                                                                    style="width:30%; border:none" />
                                                                <span class="fw-bold fs-4">ThietKe.pdf</span>
                                                            </a>
                                                        </div>
                                                        <div class="col-lg-4 mb-3">
                                                            <a href="#" class="text-color_pimary">
                                                                <img src="{{ asset('assets/img/icon-pdf.png') }}"
                                                                    class="img img-thumbnail"
                                                                    style="width:30%; border:none" />
                                                                <span class="fw-bold fs-4">ChaoHang.pdf</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <p class="m-0 fs-3 fw-bold mb-3">Phiên bản màu</p>
                                                    <div class="d-flex">
                                                        <div class="rounded-circle border border-secondary mx-3"
                                                            style="width: 18px; height: 18px;background: #61D1D8"></div>
                                                        <div class="rounded-circle border border-secondary mx-3"
                                                            style="width: 18px; height: 18px;background: #ffff"></div>
                                                        <div class="rounded-circle border border-secondary mx-3"
                                                            style="width: 18px; height: 18px;background: #D02F2F"></div>
                                                        <div class="rounded-circle border border-secondary mx-3"
                                                            style="width: 18px; height: 18px;background: #61D620"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        {{-- Thông số kỹ thuật --}}
                                        <div class="mb-4">
                                            <h2 class="text-color_pimary mt-4">Thông số kỹ thuật</h2>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <table
                                                        class="table table-bordered border border-2 border-secondary text-center"
                                                        id="table_add">
                                                        <tr style="height: 30px;">
                                                            <th class="text-content table-primary text-center">
                                                                Tên thông số
                                                            </th>
                                                            <th class="text-content table-primary text-center">
                                                                Thông số
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">Kích thước (L*W*H) [mm]
                                                            </td>
                                                            <td class="text-center">3,400 * 1,594 * 1,560
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">Trọng lượng Không tải
                                                                [kg]
                                                            </td>
                                                            <td class="text-center">950</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">Tốc độ tối đa [km/h]
                                                            </td>
                                                            <td class="text-center">120</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">Thêm thông số</td>
                                                            <td class="text-center"><button type="button"
                                                                    class="btn btn-danger btn-sm add-row"
                                                                    data-field="Giá xe">
                                                                    Thêm
                                                                </button></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-lg-6">
                                                    <table
                                                        class="table table-bordered border border-2 border-secondary text-center"
                                                        id="table_add">
                                                        <tr style="height: 30px;">
                                                            <th class="text-content table-primary text-center">
                                                                Tên thông số
                                                            </th>
                                                            <th class="text-content table-primary text-center">
                                                                Thông số
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">Kích thước (L*W*H) [mm]
                                                            </td>
                                                            <td class="text-center">3,400 * 1,594 * 1,560
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">Trọng lượng Không tải
                                                                [kg]
                                                            </td>
                                                            <td class="text-center">950</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">Tốc độ tối đa [km/h]
                                                            </td>
                                                            <td class="text-center">120</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center">Thêm thông số</td>
                                                            <td class="text-center"><button type="button"
                                                                    class="btn btn-danger btn-sm add-row"
                                                                    data-field="Giá xe">
                                                                    Thêm
                                                                </button></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Sản phẩm liên quan --}}
                                        <div class="mb-4">
                                            <h2 class="text-color_pimary">Sản phẩm liên quan</h2>
                                            <div class="row g-0 mb-4">
                                                <div class="col-lg-4 mb-3">
                                                    <div
                                                        style="display:grid; grid-template-columns: 155px auto; align-items:center">
                                                        <img src="{{ asset('assets/img/oto-1.png') }}" />
                                                        <div>
                                                            <p class="m-0 fs-5 fw-bold">XE TANO-SP-TANO01
                                                            </p>
                                                            <p class="m-0 text-color_pimary fw-bold">$
                                                                500.00</p>
                                                            <p class="m-0"><a href="#"
                                                                    class="text-secondary">Xem chi
                                                                    tiết</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <div
                                                        style="display:grid; grid-template-columns: 155px auto; align-items:center">
                                                        <img src="{{ asset('assets/img/oto-2.png') }}" />
                                                        <div>
                                                            <p class="m-0 fs-5 fw-bold">XE TANO-SP-TANO01
                                                            </p>
                                                            <p class="m-0 text-color_pimary fw-bold">$
                                                                500.00</p>
                                                            <p class="m-0"><a href="#"
                                                                    class="text-secondary">Xem chi
                                                                    tiết</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <div
                                                        style="display:grid; grid-template-columns: 155px auto; align-items:center">
                                                        <img src="{{ asset('assets/img/oto-3.png') }}" />
                                                        <div>
                                                            <p class="m-0 fs-5 fw-bold">XE TANO-SP-TANO01
                                                            </p>
                                                            <p class="m-0 text-color_pimary fw-bold">$
                                                                500.00</p>
                                                            <p class="m-0"><a href="#"
                                                                    class="text-secondary">Xem chi
                                                                    tiết</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="btn btn-outline-danger">Link Sản
                                                    phẩm</button>
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
                padding: 15px 50px 50px 50px !important;
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
                border-bottom: 1px solid #969393 !important;
                line-height: 15px;
                width: 100%;
                font-size: 1.5rem;
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
        </script>
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

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const addButtons = document.querySelectorAll(".add-row");

                addButtons.forEach(button => {
                    button.addEventListener("click", function() {
                        const newRow = document.createElement("tr");
                        newRow.classList.add("new-row");
                        newRow.innerHTML = `
                    <td class="text-center"><input class="form-control" type="text" placeholder="Nhập tên thông số"></td>
                    <td class="text-center">
                        <div class="d-flex">
                            <input class="form-control" type="text" placeholder="Nhập thông số">
                            <button type="button" class="btn btn-success btn-sm save-row mx-2">
                                Lưu
                            </button>
                            <button type="button" class="btn btn-danger btn-sm close-row">
                                Xóa
                            </button>
                        </div>
                    </td>
                `;

                        const previousRow = this.closest("tr");
                        previousRow.insertAdjacentElement("beforebegin", newRow);
                    });
                });
            });

            document.addEventListener("click", function(event) {
                if (event.target.classList.contains("close-row")) {
                    const rowToRemove = event.target.closest(".new-row");
                    if (rowToRemove) {
                        rowToRemove.remove();
                    }
                }
            });
        </script>
    @endsection
