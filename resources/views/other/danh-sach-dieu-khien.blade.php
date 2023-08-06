@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Danh sách điều khiển')

@section('header-style')
    <style>
        .withBg {
            background-image: url(https://tichdiem.doppelherz.vn/assets/img/gioithieubg.webp);
            background-position: 50%;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endsection

@section('content')
    <div id="mainWrap" class="mainWrap m-0">
        <div class="mainSection withBg">
            <div class="main">
                <div class="container" style="max-width: calc( 968px - 180px );">
                    <div class="mainSection_heading mb-5 mt-4">
                        <h5 class="mainSection_heading-title" style="color: var(--primary-color)">Danh sách điều khiển</h5>
                        {{-- @include('template.components.sectionCard') --}}
                    </div>

                    <div class="card mb-3">
                        <div class="card-body" style="background-color: var(--white-color-blur); padding: 20px 10px">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-4 col-xl-3">
                                    <div class=" control_wrapper"  >
                                        <a href=" {{ route('store-customer') }}" class="control_link" id="control_link-1">
                                            <div class="control_img">
                                                <img src="{{ asset('/assets/img/control/agreement.png') }}" alt="">
                                            </div>
                                            <div class="control_title fs-5">
                                                Khách hàng
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-4 col-xl-3">
                                    <div class=" control_wrapper"  >
                                        <a href="{{ route('Personnel.store') }}" class="control_link" id="control_link-2">
                                            <div class="control_img">
                                                <img src="{{ asset('/assets/img/control/2.png') }}"
                                                    alt="">
                                            </div>
                                            <div class="control_title fs-5">
                                                Nhân sự
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-4 col-xl-3">
                                    <div class=" control_wrapper"  >
                                        <a href="{{ route('product.list') }}" class="control_link" id="control_link-3">
                                            <div class="control_img">
                                                <img src="{{ asset('/assets/img/control/features.png') }}" alt="">
                                            </div>
                                            <div class="control_title fs-5">
                                                Sản phẩm
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-4 col-xl-3">
                                    <div class=" control_wrapper"  >
                                        <a href="{{ route('version.list') }}" class="control_link" id="control_link-4">
                                            <div class="control_img">
                                                <img src="{{ asset('/assets/img/control/order-delivery.png') }}" alt="">
                                            </div>
                                            <div class="control_title fs-5">
                                                Sản phẩm Custom
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body" style="background-color: var(--white-color-blur); padding: 20px 10px">
                            <div class="row">
                                <div class="col-6 col-sm-6 col-md-4 col-xl-3 mb-5 mt-5">
                                    <div class=" control_wrapper"  >
                                        <a href="#" class="control_link" id="control_link-5">
                                            <div class="control_img">
                                                <img src="{{ asset('/assets/img/control/cargo.png') }}" alt="">
                                            </div>
                                            <div class="control_title fs-5">
                                                Đơn hàng
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-4 col-xl-3 mb-5 mt-5">
                                    <div class=" control_wrapper"  >
                                        <a href="danh-sach-tuyen" class="control_link" id="control_link-6">
                                            <div class="control_img">
                                                <img src="{{ asset('/assets/img/control/users.png') }}" alt="">
                                            </div>
                                            <div class="control_title fs-5">
                                                Tuyến
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-4 col-xl-3 mb-5 mt-5">
                                    <div class=" control_wrapper"  >
                                        <a href="{{ route('department.store') }}" class="control_link" id="control_link-7">
                                            <div class="control_img">
                                                <img src="{{ asset('/assets/img/control/workflow.png') }}" alt="">
                                            </div>
                                            <div class="control_title fs-5">
                                                Cơ cấu đơn vị
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-4 col-xl-3 mb-5 mt-5">
                                    <div class=" control_wrapper"  >
                                        <a href="{{ route('position.store') }}" class="control_link" id="control_link-8">
                                            <div class="control_img">
                                                <img src="{{ asset('/assets/img/control/brain.png') }}" alt="">
                                            </div>
                                            <div class="control_title fs-5">
                                                Cơ cấu chức danh
                                            </div>
                                        </a>
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

    <script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>

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
        $(document).ready(function() {

            $('.datePicker').daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY '
                }
            });

        });
    </script>

@endsection
