@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Mẫu đề nghị quyết toán tạm ứng')

@section('content')

    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="card_template-wrapper">
                        <form action="" method="POST"
                            enctype="multipart/form-data">
                           @csrf
                            @method('PUT')
                            <div class="card_template-body">
                                <div class="card_template-body-top">
                                    <div class='row mb-3 align-items-center'>
                                        <div class="col-3 d-flex align-items-center justify-content-center flex-column">
                                            <a class=" ">
                                                <img class="header_logo" src="{{ env('LOGO_URL', '') }}" />
                                            </a>
                                            <div class="card_template-title fst-italic">BM013.QT02/12</div>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-center flex-column">
                                            <div class="card_template-heading">Đề nghị quyết toán tạm ứng</div>
                                            <div class="card_template-heading-mini">Mã: {{ Time () }}</div>

                                        </div>
                                        <div class="col-3">
                                            <div class="row card_template-title fst-italic d-flex align-items-center justify-content-center">
                                                <div class="col text-nowrap d-flex justify-content-end align-items-center ">Số/No:</div>
                                                <div
                                                    class="col card_template-sub with_input d-flex justify-content-start align-items-center">
                                                                <textarea rows="1" type="text" placeholder="" class=" form-control textareaResize" name=""></textarea>
                                                        
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="row card_template-title fst-italic d-flex align-items-center justify-content-end pb-2">
                                                <div class="col text-nowrap d-flex justify-content-end align-items-center">Ngày/date:</div>
                                                <div class="col card_template-sub with_input d-flex justify-content-start align-items-center">
                                                    <input type="text" placeholder="" class="form-control datePicker"
                                                            value="{{ date('d/m/Y' )}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="row d-flex justify-content-end">
                                        <div class="mb-3 col-3 ">
                                            <div class="card_template-title with_form">
                                                <div class="text-nowrap">Nợ:</div>
                                                <div class="card_template-sub with_input">
                                                    <textarea rows="1" type="text" placeholder="" class="form-control textareaResize" name=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-end">
                                        <div class="mb-3 col-3 ">
                                            <div class="card_template-title with_form">
                                                <div class="text-nowrap">Có:</div>
                                                <div class="card_template-sub with_input">
                                                    <textarea rows="1" type="text" placeholder="" class="form-control textareaResize" name=""></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="row">
                                        <div class="mb-3 col-12">
                                            <div class="card_template-title with_form">
                                                <div class="text-nowrap">Họ và tên người thanh toán:</div>
                                                <span class="card_template-sub with_input">
                                                    <textarea rows="1" type="text" placeholder="(Vui lòng nhập số tiền)" class="form-control textareaResize" name=""> Nguyễn Thị Thùy Linh</textarea>
                                                    
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-12">
                                            <div class="card_template-title with_form">
                                                <div class="text-nowrap">Bộ phận (hoặc địa chỉ): </div>
                                                <span class="card_template-sub with_input">
                                                    <textarea rows="1" type="text" placeholder="(Vui lòng nhập số tiền)" class="form-control textareaResize" name="">Trade MKT</textarea>
                                                    
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-12">
                                            <div class="card_template-title with_form">
                                                <div class="text-nowrap">Số tiền tạm ứng được thanh toán theo bảng dưới đây:</div>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row mb-3">
                                        <div class="table-responsive QTTU_repeater">
                                            <table class="table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th class="text-center" scope="col">Diễn giải</th>
                                                    <th class="text-center" scope="col">Số tiền</th>
                                                    <th scope="col" style="width:3%"></th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td class="text-center">A</td>
                                                    <td class="text-center">B</td>
                                                    <td style="width:3%"></td>

                                                  </tr>
                                                  <tr>
                                                    <th>I . Số tiền tạm ứng</th>
                                                    <td></td>
                                                    <td style="width:3%"></td>
                                                  </tr>
                                                  <tr>
                                                    <td>1. Số tạm ứng các kỳ trước chưa chi hết</td>
                                                    <td>
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập số tiền)" class="text-center form-control textareaResize" name=""></textarea>
                                                    </td>
                                                    <td style="width:3%"></td>
                                                  </tr>
                                                  <tr>
                                                    <td>2. Số tạm ứng kỳ này:</td>
                                                    <td>
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập số tiền)" class=" text-center form-control textareaResize" name=""></textarea>
                                                    </td>
                                                    <td style="width:3%"></td>
                                                  </tr>
                                                  <tbody data-repeater-list="listShoppingRequest">
                                                    <tr data-repeater-item>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="col-2 d-flex justify-content-center">- Phiếu chi số</div>
                                                                    <div class="col-2">

                                                                        <textarea rows="1" type="text" placeholder="" class="form-control textareaResize" name=""></textarea>
                                                                    </div>
                                                                    <div class="col-2 d-flex justify-content-center">ngày </div>
                                                                    <div class="col-2">

                                                                        <input type="text" placeholder="" class="col form-control datePicker" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>                                                    
                                                        
                                                        <td>
                                                            <textarea rows="1" type="text" placeholder="(Vui lòng nhập số tiền)" class="text-center form-control textareaResize" name=""></textarea>
                                                        </td>

                                                        <td class="text-center">
                                                            <img data-repeater-delete role="button"
                                                                src="{{ asset('/assets/img/trash.svg') }}"
                                                                width="15px" height="15px" />
                                                        </td>

                                                    </tr>
                                                </tbody>


                                                <tr>
                                                    <td colspan="3">
                                                        <span role="button" class="fs-5 text-danger"
                                                            data-repeater-create><i
                                                                class="bi bi-plus-circle"></i></span>
                                                    </td>
                                                <tr>


                                                </table>
                                            </div>
                                            <div class="table-responsive QTTU_repeater_2">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th>II . Số tiền đã chi</th>
                                                        <td>
                                                            <textarea rows="1" type="text" placeholder="(Vui lòng nhập số tiền)" class="text-center form-control textareaResize" name=""></textarea>
                                                        </td>
                                                        <td style="width:3%"></td>
                                                    </tr>
                                                

                                                    <tbody data-repeater-list="listShoppingRequest123">
                                                        <tr data-repeater-item>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <div class="col-2 d-flex justify-content-center">Chứng từ số</div>
                                                                    <div class="col-2">

                                                                        <textarea rows="1" type="text" placeholder="" class="form-control textareaResize" name=""></textarea>
                                                                    </div>
                                                                    <div class="col-2 d-flex justify-content-center">ngày </div>
                                                                    <div class="col-2">

                                                                        <input type="text" placeholder="" class="col form-control datePicker" value="">
                                                                    </div>
                                                                </div>
                                                            </td>                                                    
                                                            
                                                            <td>
                                                                <textarea rows="1" type="text" placeholder="(Vui lòng nhập số tiền)" class="text-center form-control textareaResize" name=""></textarea>
                                                            </td>
                                                            <td class="text-center">
                                                                <img data-repeater-delete role="button"
                                                                    src="{{ asset('/assets/img/trash.svg') }}"
                                                                    width="15px" height="15px" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                <tr>
                                                    <td colspan="3">
                                                        <span role="button" class="fs-5 text-danger"
                                                            data-repeater-create><i
                                                                class="bi bi-plus-circle"></i></span>
                                                    </td>
                                                <tr>
                                                
                                                <tr>
                                                    <th>III. Chênh lệch</th>
                                                    <td>
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập số tiền)" class="text-center form-control textareaResize" name=""></textarea>
                                                    </td>
                                                    <td style="width:3%"></td>
                                                </tr>

                                                <tr>
                                                    <td>1. Số tạm ứng chi không hết ( I - II )</td>
                                                    <td>
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập số tiền)" class=" text-center form-control textareaResize" name=""></textarea>
                                                    </td>
                                                    <td style="width:3%"></td>
                                                </tr>

                                                <tr>
                                                    <td>2. Chi quá số tạm ứng ( II - I )</td>
                                                    <td>
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập số tiền)" class="text-center form-control textareaResize" name=""></textarea>
                                                    </td>
                                                    <td style="width:3%"></td>
                                                </tr>
                                                  
                                                </tbody>
                                              </table>

                                        </div>
                                    </div>

                                    <div class="mb-3 col-12">
                                        <div class="card_template-title  with_form">
                                            <div class="text-nowrap">Tệp đính kèm/Attached files:</div>
                                        </div>
                                    </div>
                                        <div class="col-md-5 mb-3">
                                            <div class="d-flex flex-column">

                                                <div class="upload_wrapper-items">
                                                    <input type="hidden" value="" />
                                                    <button role="button" type="button"
                                                        class="btn position-relative border d-flex">
                                                        <img style="width:16px;height:16px"
                                                            src="{{ asset('assets/img/upload-file.svg') }}" />
                                                        <span class="ps-2">Chọn file đính kèm</span>
                                                        <input role="button" type="file"
                                                            class="modal_upload-input modal_upload-file" name="files[]"
                                                            multiple onchange="updateList(event)" />
                                                    </button>
                                                    <ul class="modal_upload-list"
                                                        style="max-height: 200px; overflow-y: scroll; overflow-x: hidden;">
                                                    </ul>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="card_template-body-bottom">
                                            <div class="row">
                                                <div class="card_template-body-bottom">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="card_template-title text-center">Người đề nghị</div>
                                                            <div class=" text-center">(Ký và ghi rõ họ tên)</div>
                                                            <div class=" d-flex align-items-center justify-content-center">
                                                                <div class="card_template-title fw-normal">
                                                                    <img width="100" src="{{ asset('assets/img/sign-temp.jpg') }}">
                                                                </div>
                                                            </div>
                                                            <div class="d-flex align-items-center justify-content-center">
                                                                Nguyễn Thị A
                                                            </div>
                                                        </div>
                    
                                                        <div class="col">
                                                            <div class="card_template-title text-center">Kế toán trưởng</div>
                                                            <div class=" text-center">(Ký và để lại nhận xét)</div>
                                                            <div class=" d-flex align-items-center justify-content-center">
                                                                <div class="d-flex align-items-center  justify-content-center">
                                                                    {{-- data-bs-toggle="modal" data-bs-target="#confirmSign" --}}
                                                                    <button type="button" data-signature="chiefAccountantSignature" class="btn btn-outline-primary fs-6 showImageBtn">Chèn chữ ký</button>
                                                                    <div class="showSignImg text-center d-none" data-signature="chiefAccountantSignature">
                                                                        <img width="100" src="{{ asset('/assets/img/noSignature.jpg') }}" />
                                                                        <div class="text-center">
                                                                            <span class="txt_medium d-block">Chưa có chữ ký. Bấm vào đây thể thêm chữ ký</span>
                                                                            <a href="{{ route('users.me') }}" class="btn btn-outline-danger">Tạo chữ kí</a>
                                                                        </div>
                                                                        <div class="d-flex align-items-center justify-content-center">
                                                                            Nguyễn Thị A
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col">
                                                            <div class="card_template-title text-center">Kế toán thanh toán</div>
                                                            <div class=" text-center">(Ký và để lại nhận xét)</div>
                                                            <div class=" d-flex align-items-center justify-content-center">
                                                                <div class="d-flex align-items-center  justify-content-center">
                                                                    {{-- data-bs-toggle="modal" data-bs-target="#confirmSign" --}}
                                                                    <button type="button" data-signature="accountantSignature" class="btn btn-outline-primary fs-6 showImageBtn">Chèn chữ ký</button>
                                                                    <div class="showSignImg text-center d-none" data-signature="accountantSignature">
                                                                        <img width="100" src="{{ asset('/assets/img/noSignature.jpg') }}" />
                                                                        <div class="text-center">
                                                                            <span class="txt_medium d-block">Chưa có chữ ký. Bấm vào đây thể thêm chữ ký</span>
                                                                            <a href="{{ route('users.me') }}" class="btn btn-outline-danger">Tạo chữ kí</a>
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
                                                                    <button type="button" data-signature="approveSignature" class="btn btn-outline-primary fs-6 showImageBtn">Chèn chữ ký</button>
                                                                    <div class="showSignImg text-center d-none" data-signature="approveSignature">
                                                                        <img width="100" src="{{ asset('/assets/img/noSignature.jpg') }}" />
                                                                        <div class="text-center">
                                                                            <span class="txt_medium d-block">Chưa có chữ ký. Bấm vào đây thể thêm chữ ký</span>
                                                                            <a href="{{ route('users.me') }}" class="btn btn-outline-danger">Tạo chữ kí</a>
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
                            <div class="mb-3 col-12 col-md-12 d-flex justify-content-between align-items-center funkyradio">
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
                @if (session('user')['role'] == 'admin')
                <div class="action_export me-3">
                    <button class="btn btn-danger d-block testCreateUser" data-bs-toggle="modal"
                        data-bs-target="#taoDeXuat">Tạo đề xuất</button>
                </div>
                @endif
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
        $(document).ready(function() {
        // Hide the text areas initially
        $('.showSign, .showFormYKien').hide();

        // Attach event listeners to radio buttons using a loop
        $('input[type="radio"][name="radio"]').each(function() {
            $(this).click(function() {
            var selectedRadio = $(this).attr('id');

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
