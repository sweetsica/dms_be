@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Mẫu yêu cầu tuyển dụng')
@section('header-style')
    <style>
        .style_input {
            border: none
        }

        .style_input button.btn.dropdown-toggle.btn-light {
            background-color: transparent;
            border: none;
            box-shadow: none;
            outline: none;
        }

        .style_input .dropdown-toggle::after {
            display: none;
        }

        .noBorder {
            word-break: break-all;
            box-shadow: none !important;
            border-bottom: 1px dashed #ccc;
            border-radius: 0px;
            border-top: none;
            border-right: none;
            border-left: none;
        }

        input.datePickerRanger {
            word-wrap: break-word;
        }


        .style_select {
            border: none
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
@endsection

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
                            <div class="card_template-body">
                                <div class="card_template-body-top">
                                    <div class='row mb-3 align-items-center'>
                                        <div class="col-3 d-flex align-items-center justify-content-center flex-column">
                                            <a class=" ">
                                                <img class="header_logo" src="{{ env('LOGO_URL', '') }}" />
                                            </a>
                                            {{-- <div class="card_template-title fst-italic">BM013.QT02/12</div> --}}
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-center flex-column">
                                            <div class="card_template-heading">PHIẾU YÊU CẦU TUYỂN DỤNG</div>
                                            {{-- <div class="mt-2 card_template-heading-mini">Hoàn thành bởi 
                                                <span style="color: var(--primary-color)" class="fw-bolder">TRƯỞNG BỘ PHẬN</span>
                                            </div> --}}
                                            <div class="card_template-heading-mini">Mã: {{ Time() }}</div>

                                        </div>
                                        <div class="col-3">

                                            {{-- <div class="row card_template-title fst-italic d-flex align-items-center justify-content-center">
                                                <div class="col text-nowrap d-flex justify-content-end align-items-center ">Bộ phận:</div>
                                                <div
                                                    class="col card_template-sub with_input d-flex justify-content-start align-items-center">
                                                        <input type="text" placeholder="" class="form-control" name="">
                                                    
                                                </div>
                                            </div> --}}
                                            <div
                                                class="row card_template-title fst-italic d-flex  justify-content-end justify-content-center">
                                                <div class="col text-nowrap d-flex justify-content-end align-items-center ">
                                                    Số hiệu:</div>
                                                <div
                                                    class="col card_template-sub with_input d-flex  justify-content-start align-items-center">
                                                    <input type="text" placeholder="" class="form-control"
                                                        name="">

                                                </div>
                                            </div>
                                            <div
                                                class="row card_template-title fst-italic d-flex align-items-center justify-content-end pb-2">
                                                <div class="col text-nowrap d-flex justify-content-end align-items-center">
                                                    Ngày/Date:</div>
                                                <div
                                                    class="col card_template-sub with_input d-flex justify-content-start align-items-center">
                                                    <input type="text" placeholder="" class="form-control datePicker"
                                                        value="{{ date('d/m/Y') }}">
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <div class="card-body">
                                                {{-- <div class="row" style="">
                                                    <h5 style="color: var(--primary-color)">1. YÊU CẦU CHUNG</h5>
                                                </div> --}}
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="5">Tên vị trí:</td>
                                                            <td colspan="7">
                                                                <div
                                                                    class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                                    <textarea rows="1" type="text" placeholder="(Vui lòng nhập nội dung)" class=" form-control textareaResize"
                                                                        name=""></textarea>

                                                                </div>
                                                            </td>
                                                            <td colspan="4">Số lượng:</td>
                                                            <td colspan="2" style="width: 30px;">
                                                                <div
                                                                    class="card_template-sub d-flex justify-content-center align-items-center">
                                                                    <textarea rows="1" type="text" placeholder="" class="form-control textareaResize"
                                                                        name=""></textarea>

                                                                </div>
                                                            </td>
                                                            <td colspan="4">Loại hình công việc:</td>
                                                            <td colspan="4">
                                                                <div
                                                                    class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                                    <select name="" id=""
                                                                        class="style_select selectpicker"
                                                                        title="Chọn loại hình công việc" data-size="5"
                                                                        data-live-search="true">
                                                                        <option value="Toàn thời gian">Toàn thời gian
                                                                        </option>
                                                                        <option value="Phòng Kinh doanh">Phòng Kinh doanh
                                                                        </option>
                                                                    </select>

                                                                </div>

                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td colspan="5">Địa điểm làm việc:</td>
                                                            <td colspan="7">
                                                                <div
                                                                    class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                                    <select name="" id=""
                                                                        class="style_select selectpicker"
                                                                        title="Chọn địa điểm làm việc" data-size="5"
                                                                        data-live-search="true">
                                                                        <option value="Văn phòng Hà Nội">Văn phòng Hà Nội
                                                                        </option>
                                                                        <option value="Văn phòng Đà Nẵng">Văn phòng Đà Nẵng
                                                                        </option>
                                                                        <option value="Văn phòng Hồ Chí Minh">Văn phòng Hồ
                                                                            Chí Minh</option>
                                                                        <option value="Nhà máy Thái Bình">Nhà máy Thái Bình
                                                                        </option>
                                                                        <option value="Tại địa bàn">Tại địa bàn</option>
                                                                    </select>

                                                                </div>
                                                            </td>
                                                            <td colspan="4">Quản lý trực tiếp:</td>
                                                            <td colspan="12">
                                                                <div
                                                                    class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                                    <select name="" id=""
                                                                        class="style_select selectpicker"
                                                                        title="Chọn quản lý trực tiếp" data-size="5"
                                                                        data-live-search="true">
                                                                        <option value="Trưởng bộ phận Trade Marketing">
                                                                            Trưởng bộ phận Trade Marketing</option>
                                                                    </select>

                                                                </div>
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td colspan="5">Lý do tuyển dụng:</td>
                                                            <td colspan="13">
                                                                <div
                                                                    class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                                    <select name="" id=""
                                                                        class="style_select selectpicker"
                                                                        title="Chọn lý do tuyển dụng" data-size="5"
                                                                        data-live-search="true">
                                                                        <option value="Tuyển bổ sung">Tuyển bổ sung</option>
                                                                        <option value="Tuyển thay thế">Tuyển thay thế
                                                                        </option>
                                                                    </select>

                                                                </div>
                                                            </td>
                                                            <td colspan="4">Thời gian cần nhân sự:</td>
                                                            <td colspan="5">
                                                                <div
                                                                    class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                                    <input type="text" placeholder=""
                                                                        class="form-control datePicker"
                                                                        value="{{ date('d/m/Y') }}">

                                                                </div>
                                                            </td>

                                                        </tr>
                                                </table>


                                            </div>

                                            <div class="card-body" style="margin-bottom: 10px">
                                                <div class="row d-flex align-items-center">
                                                    <h5 class="col-2"
                                                        style="margin-bottom: 0;color: var(--primary-color)">Đính kèm mô tả
                                                        công việc</h5>
                                                    <div
                                                        class="col-2 card_template-sub d-flex justify-content-start align-items-center">
                                                        <select name="" id="" class=" selectpicker"
                                                            title="Chọn mô tả công việc" data-size="5"
                                                            data-live-search="true">
                                                            <option value="Nhân viên BA">Nhân viên BA</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="card_template-body-bottom">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card_template-title text-center">Trưởng Bộ phận yêu cầu tuyển dụng
                                            </div>
                                            <div class=" text-center">(Ký và ghi rõ họ tên)</div>
                                            <div class=" d-flex align-items-center justify-content-center">
                                                <div class="card_template-title fw-normal">
                                                    <img width="100" src="{{ asset('/assets/img/sign-temp.jpg') }}" />
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center">
                                                Nguyễn Thị A
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="card_template-title text-center">P. Hành chính Nhân sự</div>
                                            <div class=" text-center">(Ký và để lại nhận xét)</div>
                                            <div class=" d-flex align-items-center justify-content-center">
                                                <div class="d-flex align-items-center  justify-content-center">
                                                    {{-- data-bs-toggle="modal" data-bs-target="#confirmSign" --}}
                                                    <button type="button" data-signature="departmentSignature"
                                                        class="btn btn-outline-primary fs-6 showImageBtn">Chèn chữ
                                                        ký</button>
                                                    <div class="showSignImg text-center d-none"
                                                        data-signature="departmentSignature">
                                                        <img width="100"
                                                            src="{{ asset('/assets/img/noSignature.jpg') }}" />
                                                        <div class="text-center">
                                                            <span class="txt_medium d-block">Chưa có chữ ký. Bấm vào đây
                                                                thể thêm chữ ký</span>
                                                            <a href="{{ route('users.me') }}"
                                                                class="btn btn-outline-danger">Tạo chữ kí</a>
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            Nguyễn Thị A
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="card_template-title text-center">Phê duyệt</div>
                                            <div class=" text-center">(Ký và để lại nhận xét)</div>
                                            <div class=" d-flex align-items-center justify-content-center">
                                                <div class="d-flex align-items-center  justify-content-center">
                                                    {{-- data-bs-toggle="modal" data-bs-target="#confirmSign" --}}
                                                    <button type="button" data-signature="approveSignature"
                                                        class="btn btn-outline-primary fs-6 showImageBtn">Chèn chữ
                                                        ký</button>
                                                    <div class="showSignImg text-center d-none"
                                                        data-signature="approveSignature">
                                                        <img width="100"
                                                            src="{{ asset('/assets/img/noSignature.jpg') }}" />
                                                        <div class="text-center">
                                                            <span class="txt_medium d-block">Chưa có chữ ký. Bấm vào đây
                                                                thể thêm chữ ký</span>
                                                            <a href="{{ route('users.me') }}"
                                                                class="btn btn-outline-danger">Tạo chữ kí</a>
                                                        </div>
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            Nguyễn Thị A
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="card_template-footer">
                                    <a href="/de-xuat-theo-mau" type="button"
                                        class="btn btn-outline-danger ps-5 pe-5 me-3">Hủy</a>
                                    <button type="submit" class="btn btn-danger ps-5 pe-5">Gửi</button>
                                </div>
                                {{-- <div class="card_template-footer">
                                            <a href="/de-xuat-theo-mau" type="button" class="btn btn-outline-danger ps-2 pe-2 me-3">Về danh sách</a>
                                            <button type="button" class="btn btn-danger ps-5 pe-5 me-3 btnPrint">In</button>
                                        </div> --}}



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



    {{-- Modal Confirm --}}
    <div class="modal fade" id="conFirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Xác nhận yêu cầu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="" action="" id="myForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div>Bạn đã chắc chắn với thông tin đề nghị chưa</div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Xem lại</button>
                        <button type="button" class="btn btn-danger">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Sign --}}
    <div class="modal fade" id="confirmSign" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Ý kiến phản hồi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="" action="" id="myForm">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div
                                class="mb-3 col-12 col-md-12 d-flex justify-content-between align-items-center funkyradio">
                                <div class="funkyradio-danger">
                                    <input type="radio" name="radio" id="confirmRadio" />
                                    <label for="confirmRadio">Xác nhận</label>
                                </div>
                                <div class="funkyradio-danger">
                                    <input type="radio" name="radio" id="destroyRadio" />
                                    <label for="destroyRadio">Từ chối</label>
                                </div>
                            </div>

                            <div class="mb-3 col-12 col-md-12 showSign">
                                <img width="100" src="{{ asset('/assets/img/sign-temp.jpg') }}" />
                            </div>

                            <div class="mb-3 col-12 col-md-12 showFormYKien">
                                <textarea name="" id="" cols="5" class="form-control" placeholder="Nhập ý kiến"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pe-5 ps-5">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="receiverConfirmSign" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Ý kiến phản hồi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div
                                class="mb-3 col-12 col-md-12 d-flex justify-content-between align-items-center funkyradio">
                                <div class="funkyradio-danger">
                                    <input type="radio" name="isReceiverConfirm" value="confirmRadio"
                                        id="receiverConfirm" />
                                    <label for="receiverConfirm">Xác nhận</label>
                                </div>
                                <div class="funkyradio-danger">
                                    <input type="radio" name="isReceiverConfirm" value="destroyRadio"
                                        id="destroyRadioRec" />
                                    <label for="destroyRadioRec">Từ chối</label>
                                </div>
                            </div>

                            <div class="mb-3 col-12 col-md-12 showSign">
                                <img width="100" src="" />
                                <input type="hidden" name="receiverSignature" value="">

                            </div>

                            <div class="mb-3 col-12 col-md-12 showFormYKien">
                                <textarea name="receiverRejectReason" cols="5" class="form-control" placeholder="Nhập ý kiến"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger pe-5 ps-5" id="confirmBtn">Xác nhận</button>
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
                // startDate: new Date(),
                locale: {
                    format: 'DD/MM/YYYY '
                }
            });

        });
    </script>

    <script>
        $(document).ready(function() {

            $('.datePicker').daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
            $('.datePickerRanger').daterangepicker({
                singleDatePicker: false,
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            // Hide the text areas initially
            $('.showSign, .showFormYKien').hide();

            // Attach event listeners to radio buttons using a loop
            $('input[type="radio"]').each(function() {
                $(this).click(function() {
                    var selectedRadio = $(this).val();

                    if (selectedRadio === 'confirmRadio') {
                        $('.showSign').show();
                        $('.showFormYKien').hide();
                        $('.showCol').hide()
                        // $('.conFirmSign').removeClass('col-12').addClass('col-8');
                    } else if (selectedRadio === 'destroyRadio') {
                        $('.showFormYKien').show();
                        $('.showSign').hide();
                        $('.showCol').show()
                        // $('.conFirmSign').removeClass('col-8').addClass('col-8');
                        // $('.conFirmSign').removeClass('col-12').addClass('col-8');
                    }
                });
            });
        });
    </script>

    <script>
        document.querySelectorAll('.showImageBtn').forEach(function(btn) {
            const signature = btn.getAttribute('data-signature');
            const signImg = document.querySelector(`.showSignImg[data-signature="${signature}"]`);

            btn.addEventListener('click', function() {
                signImg.classList.toggle('d-none');
                btn.style.display = 'none';
                //create input
                // const input = document.createElement('input');
                // input.name = signature;
                // input.type = 'hidden';
                // btn.parentNode.appendChild(input);
                // if (signature == "deployerSignature") {
                //     const input = document.createElement('input');
                //     input.name = 'status';
                //     input.type = 'hidden';
                //     input.value = `1`; //mean sent
                //     btn.parentNode.appendChild(input);
                // }
            });
        });
    </script>

    <script>
        $('.btnConFirm').on('click', function() {
            $('#receiverConfirmSign').modal('hide');
            $('.showConfirmModal').addClass('d-none');
            $('.showConfirmImg[data-signature="' + $(this).data('signature') + '"]').removeClass('d-none');
            $(this).siblings('.showConfirmImg').removeClass('d-none');
        });
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/components/autoResize.js') }}"></script>
@endsection
