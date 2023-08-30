@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Chi tiết kho')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
@endsection
<style>
    .text_default {
        color: var(--primary-color)
    }

    .btn-show_detail {
        color: black;
        text-decoration: underline;
        cursor: pointer;
    }

    .btn-show_detail:hover {
        color: var(--primary-color);
    }

    .img-qr {
        width: 100%;
        max-height: 70px;
        object-fit: cover;
    }

    .style_select {
        border: none !important;
    }

    .style_select button.btn.dropdown-toggle.btn-light {
        background-color: transparent;
        border: none;
        box-shadow: none;
        outline: none;
    }

    .style_select .dropdown-toggle::after {
        display: none;
    }
</style>
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Chi tiết đơn đặt hàng</h5>
                        @include('template.components.sectionCard')
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex align-items-center justify-content-between my-4 mx-3">
                                <div>
                                    <button class="btn btn-outline-danger p-2 me-2">
                                        <i class="bi bi-x-lg"></i>
                                        Từ chối
                                    </button>
                                    <button class="btn btn-danger p-2">
                                        <i class="bi bi-check-lg"></i>
                                        Duyệt
                                    </button>
                                </div>
                                <div>
                                    <button class="btn btn-danger me-2">Lưu</button>
                                    <button class="btn btn-danger me-2">
                                        <i class="bi bi-pencil "></i>
                                        Sửa
                                    </button>
                                    <button class="btn btn-danger me-2">
                                        <i class="bi bi-printer "></i>
                                        In
                                    </button>
                                    <a href="{{ route('PurchaseOrder.index') }}">
                                        <button class="btn btn-outline-secondary">
                                            Đóng
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body" style="padding: 50px">
                                    <div
                                        class="d-flex align-items-center justify-content-between border-bottom border-secondary border-1 pb-3">
                                        <div class="item-logo">
                                            <img class="header_logo" src="{{ asset('assets/img/logo-thaihung-1-2.jpg') }}"
                                                alt="logo" />
                                            {{-- <img class="header_logo" src="{{ env('LOGO_URL', '') }}" alt="logo" /> --}}
                                            <p class="m-0 fs-5">Mã: BH_1</p>
                                        </div>
                                        <div class="item-title text-center">
                                            <h1 class="m-0">PHIẾU ĐẶT HÀNG</h1>
                                            <p class="m-0 fs-5">Ngày đặt: 01/08/2023</p>
                                        </div>
                                        <div class="item-qr">
                                            <img src="{{ asset('assets/img/Qr-code.png') }}" alt="Qr-code"
                                                class="img-qr" />
                                        </div>
                                    </div>

                                    <div class="mt-5 border-bottom border-1 pb-3">
                                        <div class="row g-0 mb-5">
                                            <div class="col-lg-6">
                                                <div>
                                                    <span class="fs-5 fw-bold">Khách hàng :</span>
                                                    <span class="fs-5 ">Quầy thuốc Thịnh Phúc - DTSD029</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <span class="fs-5 fw-bold">Số điện thoại : </span>
                                                    <span class="fs-5 ">0842838939</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-0 mb-5">
                                            <div class="col-lg-12">
                                                <div>
                                                    <span class="fs-5 fw-bold">Địa chỉ :</span>
                                                    <span class="fs-5 ">156 Hùng Vương, Ấp Phú Hòa, Xã Tân Phú Đông, Thành
                                                        Phố
                                                        Sa Đéc, Tỉnh Đồng Tháp </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-0 mb-5">
                                            <div class="col-lg-6">
                                                <div>
                                                    <span class="fs-5 fw-bold">Nhân viên đặt :</span>
                                                    <span class="fs-5 ">Nguyễn Văn A - TBHT00</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div>
                                                    <span class="fs-5 fw-bold">Nhóm :</span>
                                                    <span class="fs-5 ">O9A-Đội O9A</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div>
                                                    <span class="fs-5 fw-bold">Tuyến :</span>
                                                    <span class="fs-5 ">Đồng Tháp - Thứ 3</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-0 mb-5">
                                            <div class="col-lg-6">
                                                <div>
                                                    <span class="fs-5 fw-bold">Loại thanh toán :</span>
                                                    <span class="fs-5 ">Thanh toán ngay</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <span class="fs-5 fw-bold">Hình thức thanh toán :</span>
                                                    <span class="fs-5 ">Tiền mặt</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-0 mb-5">
                                            <div class="col-lg-12">
                                                <div>
                                                    <span class="fs-5 fw-bold">Ghi chú :</span>
                                                    <span class="fs-5 "></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row g-0 mb-5">
                                            <div class="col-lg-6">
                                                <div>
                                                    <span class="fs-5 fw-bold">Người duyệt :</span>
                                                    <span class="fs-5 ">Nguyễn Trãi - TBHT04</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <span class="fs-5 fw-bold">Ngày duyệt :</span>
                                                    <span class="fs-5 ">22/08/2023</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5">
                                        <div class="d-flex align-items-center">
                                            <span class="text_default fs-4 fw-bold me-3">1. Sản phẩm đặt hàng</span>
                                            <div data-bs-toggle="tooltip" data-bs-placement="bottom" title="Chọn kho"
                                                style="width: 120px;">
                                                <select name="" class="selectpicker" placeholder="Chọn kho"
                                                    id="selectKho">
                                                    <option value="1">Kho 1
                                                    </option>
                                                    <option value="2">Kho 2
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        @php
                                            $arrProduct = [
                                                [
                                                    'id' => 1,
                                                    'dvt' => 'Hộp',
                                                    'maSP' => 'SP01',
                                                ],
                                                [
                                                    'id' => 2,
                                                    'dvt' => 'Chiếc',
                                                    'maSP' => 'SP02',
                                                ],
                                            ];
                                            
                                            $arrKho = [
                                                [
                                                    'id' => 1,
                                                    'name' => 'Kho 1',
                                                    'tonkho' => '11/100',
                                                    'donGia' => 1000000,
                                                ],
                                                [
                                                    'id' => 2,
                                                    'name' => 'Kho 2',
                                                    'tonkho' => '20/100',
                                                    'donGia' => 1500000,
                                                ],
                                            ];
                                            $jsonProduct = json_encode($arrProduct);
                                            $jsonKho = json_encode($arrKho);
                                        @endphp

                                        <input type="hidden" id="jsonProduct" value="{{ $jsonProduct }}">
                                        <input type="hidden" id="jsonKho" value="{{ $jsonKho }}">

                                        <div class="mt-5">
                                            <div class="table-responsive">

                                                <table id="dsNhaCungCap" style="width: 150%;"
                                                    class="table table-responsive table-hover table-bordered filter">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-nowrap text-center" style="width:2%">
                                                                STT
                                                            </th>
                                                            <th class="text-nowrap text-center" style="width:8%">
                                                                Mã SP
                                                            </th>
                                                            <th class="text-nowrap text-center" style="width:15%">
                                                                Tên sản phẩm
                                                            </th>
                                                            <th class="text-nowrap text-center" style="width:8%">
                                                                ĐVT
                                                            </th>
                                                            <th class="text-nowrap text-center" style="width:8%">
                                                                Kho xuất
                                                            </th>
                                                            <th class="text-nowrap text-center" style="width:8%">
                                                                SL/Tồn kho
                                                            </th>
                                                            <th class="text-nowrap text-center" style="width:8%">
                                                                Đơn giá
                                                            </th>
                                                            <th class="text-nowrap text-center" style="width:8%">
                                                                Thành tiền
                                                            </th>
                                                            <th class="text-nowrap text-center" style="width:8%">
                                                                Chiết khấu
                                                            </th>
                                                            <th class="text-nowrap text-center" style="width:8%">
                                                                Tỷ lệ CK(%)
                                                            </th>
                                                            <th class="text-nowrap text-center" style="width:15%">
                                                                Ghi chú
                                                            </th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody id="tableBody">
                                                        <tr>
                                                            <td class="text-center text-nowrap" id="stt">
                                                                1
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="text" disabled id="maSP_0" name=""
                                                                    placeholder="Mã sản phẩm">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <select name="" class="style_select selectpicker"
                                                                    id="selectNameProduct_0" placeholder="Tên sản phẩm">
                                                                    <option value="1">Sản phẩm 01
                                                                    </option>
                                                                    <option value="2">Sản phẩm 02
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="text" disabled id="DVT_0" name=""
                                                                    placeholder="Đơn vị tính">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="text" disabled id="nameKho_0" name=""
                                                                    placeholder="Kho xuất">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="text" disabled id="sltk_0" name=""
                                                                    placeholder="Số lượng tồn kho">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="text" disabled id="donGia_0" name=""
                                                                    placeholder="Đơn giá">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="number" disabled id="thanhTien_0"
                                                                    name="" placeholder="Thành tiền">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="number" id="ck_0" name=""
                                                                    placeholder="Chiết khấu">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="number" id="tyLeCK_0" name=""
                                                                    placeholder="Tỷ lệ CK">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control style_select bg-transparent"
                                                                    type="text" id="ghiChu_0" name=""
                                                                    placeholder="Ghi chú">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <i class="bi bi-trash fs-4 fw-bold text_default"
                                                                    id="remove-item"></i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center"> <i
                                                                    class="bi bi-plus-circle text_default fs-4 fw-bold "
                                                                    id="addRowButton"></i>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
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
    </div>
    @include('template.footer.footer')
    </div>
    </div>
    @include('template.sidebar.sidebarMaster.sidebarRight')

@endsection
@section('footer-script')
    <!-- Plugins -->
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

    <script type="text/javascript" src="{{ asset('/assets/js/components/resetFilter.js') }}"></script>

    <script>
        const tableBody = document.getElementById("tableBody");
        const addRowButton = document.getElementById("addRowButton");


        addRowButton.addEventListener("click", function() {
            const newRow = document.createElement("tr");
            newRow.innerHTML = `
            <td class="text-center text-nowrap">
                                                                1
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control" type="text" disabled
                                                                    id="maSP_0" name="">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <select name="" class="selectpicker"
                                                                    id="selectNameProduct_0" placeholder="Tên sản phẩm">
                                                                    <option value="1">Sản phẩm 01
                                                                    </option>
                                                                    <option value="2">Sản phẩm 02
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <input class="form-control" type="text" disabled
                                                                    id="DVT_0" name="">
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                1
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                1
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                1
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                1
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                1
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                1
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                1
                                                            </td>
                                                            <td class="text-center text-nowrap">
                                                                <i class="bi bi-trash fs-4 fw-bold text_default" id="remove-item"></i>
                                                            </td>
        `;

            tableBody.insertBefore(newRow, addRowButton.parentNode.parentNode);
            $('.selectpicker').selectpicker();

            const deleteIcons = newRow.querySelectorAll("#remove-item");
            deleteIcons.forEach(deleteIcon => {
                deleteIcon.addEventListener("click", function() {
                    newRow.remove();
                });
            });
        });


        var inputJsonProduct = document.getElementById('jsonProduct');
        var jsonProduct = JSON.parse(inputJsonProduct.value);

        const selectNameProduct = document.getElementById("selectNameProduct_0");
        const maSPInput = document.getElementById("maSP_0");
        const DVTInput = document.getElementById("DVT_0");

        selectNameProduct.addEventListener("change", function() {
            const selectedValue = selectNameProduct.value;
            const selectedItem = jsonProduct.find(item => item.id.toString() === selectedValue);

            if (selectedItem) {
                maSPInput.value = selectedItem.maSP;
                DVTInput.value = selectedItem.dvt;
            } else {
                maSPInput.value = "";
                DVTInput.value = "";
            }
        });

        var inputJsonKho = document.getElementById('jsonKho');
        var jsonKho = JSON.parse(inputJsonKho.value);

        const selectKho = document.getElementById("selectKho");
        const nameKho = document.getElementById("nameKho_0");
        const sltkInput = document.getElementById("sltk_0");
        const donGiaInput = document.getElementById("donGia_0");
        const thanhTienInput = document.getElementById("thanhTien_0");
        const tyLeCkInput = document.getElementById("tyLeCK_0");

        selectKho.addEventListener("change", function() {
            const selectedValue = selectKho.value;
            const selectedItem = jsonKho.find(item => item.id.toString() === selectedValue);
            if (selectedItem) {
                nameKho.value = selectedItem.name;
                sltkInput.value = selectedItem.tonkho;
                donGiaInput.value = selectedItem.donGia;

                const indexOfSlash = selectedItem.tonkho.indexOf("/");
                const numberBeforeSlash = Number(selectedItem.tonkho.slice(0, indexOfSlash));
                thanhTienInput.value = selectedItem.donGia * numberBeforeSlash;

            } else {
                nameKho.value = "";
                sltkInput.value = "";
                donGiaInput.value = "";
                thanhTienInput.value = "";
            }
        });

        function calculateTienCK() {
            const tyleCkInput = parseFloat(tyLeCkInput.value);
            console.log('tyleCkInput', tyleCkInput);
        }
    </script>

@endsection
