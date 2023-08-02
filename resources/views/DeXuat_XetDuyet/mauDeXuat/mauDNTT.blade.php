@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Mẫu đề nghị thanh toán')

@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container-fluid">
                        <div id="container-fluid-1">
                            <div class="card_template-wrapper mb-3">
                                <div class="card_template-body">
                                    <div class="card_template-body-top">
                                        <div class='row mb-3'>
                                            <div class="col-3 d-flex align-items-center justify-content-center flex-column">
                                                <a class=" ">
                                                    <img class="header_logo" src="{{ env('LOGO_URL', '') }}" />
                                                </a>
                                                <div class="card_template-title fst-italic">BM001.QT07/20</div>
                                            </div>
                                            <div class="col-6 d-flex align-items-center justify-content-center flex-column">
                                                <div class="card_template-heading">Đề nghị thanh toán</div>
                                                <div class="card_template-heading-mini">Request for payment</div>
                                                <div class="card_template-heading-mini">Mã: ...</div>

                                            </div>
                                            <div class="col-3 d-flex justify-content-center flex-column">
                                                <div
                                                    class="card_template-title fst-italic d-flex align-items-center justify-content-center">
                                                    <div class="text-nowrap">Số/No:</div>
                                                    <div
                                                        class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                        <div class="card_template-sub-text">...</div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="card_template-title fst-italic d-flex align-items-center justify-content-center">
                                                    <div class="text-nowrap">Ngày/Date:</div>
                                                    <div
                                                        class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                        <span>01/01/2001</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card_template-body-middle">
                                        <div class="row">
                                            <div class="mb-3 col-6 col-sm-6 col-md-6 col-xl-6">
                                                <div class="card_template-title with_form">
                                                    <div class="text-nowrap">Người đề nghị/Requester: </div>
                                                    <span class="card_template-sub with_input">
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập nội dung)" class="form-control textareaResize"
                                                            name="requester"></textarea>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-6 col-sm-6 col-md-6 col-xl-6">
                                                <div class="card_template-title with_form">
                                                    <div class="text-nowrap">Bộ phận/Department:</div>
                                                    <span class="card_template-sub with_input">
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập nội dung)" class="form-control textareaResize"
                                                            name="department"></textarea>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-12 col-sm-12 col-md-12 col-xl-12">
                                                <div class="card_template-title with_form">
                                                    <div class="text-nowrap">Nội dung thanh toán/Contents of payment: </div>
                                                    <span class="card_template-sub with_input">
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập nội dung)" class="form-control textareaResize"
                                                            name="paymentContent"></textarea>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-12 col-sm-12 col-md-12 col-xl-12">
                                                <div class="card_template-title with_form">
                                                    <div class="text-nowrap">Số tiền/Amount</div>
                                                    <span class="card_template-sub with_input">
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập nội dung)" class="form-control textareaResize"
                                                            name="amountNumber"></textarea>
                                                    </span>
                                                </div>
                                                <div class="card_template-mini with_form mt-3">
                                                    <textarea rows="1" type="text" placeholder="(Vui lòng nhập số tiền bằng chữ)"
                                                        class="form-control textareaResize" name="amountText"></textarea>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-12 col-sm-12 col-md-12 col-xl-12">
                                                <div class="card_template-title with_form">
                                                    <div class="text-nowrap">Người nhận tiền/Receiver:</div>
                                                    <span class="card_template-sub with_input">
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập nội dung)" class="form-control textareaResize"
                                                            name="receiver"></textarea>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-12 col-sm-12 col-md-12 col-xl-12">
                                                <div class="card_template-title with_form">
                                                    <div class="text-nowrap">Hình thức thanh toán/Payment method:</div>
                                                    <span class="card_template-sub with_input">
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập nội dung)" class="form-control textareaResize"
                                                            name="paymentMethod"></textarea>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mb-3  col-6 col-sm-6 col-md-6 col-xl-6">
                                                <div class="card_template-title  with_form">
                                                    <div class="text-nowrap">Số tài khoản/Account number:</div>
                                                    <span class="card_template-sub with_input">
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập nội dung)" class="form-control textareaResize"
                                                            name="accountNumber"></textarea>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mb-3  col-6 col-sm-6 col-md-6 col-xl-6">
                                                <div class="card_template-title  with_form">
                                                    <div class="text-nowrap">Tại ngân hàng/with bank:</div>
                                                    <span class="card_template-sub with_input">
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập nội dung)" class="form-control textareaResize"
                                                            name="bank"></textarea>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mb-3  col-12 col-sm-12 col-md-12 col-xl-12">
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
                                                                class="modal_upload-input modal_upload-file"
                                                                name="files[]" multiple onchange="updateList(event)" />
                                                        </button>
                                                        <ul class="modal_upload-list"
                                                            style="max-height: 200px; overflow-y: scroll; overflow-x: hidden;">
                                                        </ul>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card_template-body-bottom">
                                        <div class="row">
                                            <div class="col">
                                                <div class="card_template-title text-center">Người lập/</div>
                                                <div class="card_template-title text-center">Applicant</div>
                                                <div class=" text-center">(Ký và ghi rõ họ tên)</div>
                                                <div class=" d-flex align-items-center justify-content-center"
                                                    style="height: 100px; ">
                                                    <div>
                                                        <button id="showImageBtn" type="button"
                                                            class="btn btn-outline-primary fs-6">Chèn chữ
                                                            ký</button>
                                                        <div id="signatureImg" style="display: none">
                                                            <div class="text-center">
                                                                <span class="txt_medium d-block">Chưa có chữ ký.
                                                                    Bấm vào đây thể thêm chữ ký</span>
                                                                <a href="#"
                                                                    class="btn btn-outline-danger">Tạo chữ kí</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    Name
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card_template-title text-center">Phụ trách bộ phận/</div>
                                                <div class="card_template-title text-center">Head of Department</div>
                                                <div class=" text-center">(Ký và để lại nhận xét)</div>

                                                <div class=" d-flex align-items-center justify-content-center"
                                                    style="height: 100px; ">
                                                    <div>
                                                        <button type="button" class="btn btn-outline-primary fs-6"
                                                            data-bs-toggle="modal" data-bs-target="#confirmSign1">Chèn chữ
                                                            ký</button>
                                                    </div>

                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    ...
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="card_template-title text-center">Kế toán kiểm soát/</div>
                                                <div class="card_template-title text-center">Control Accounting</div>
                                                <div class=" text-center">(Ký và để lại nhận xét)</div>
                                                <div class=" d-flex align-items-center justify-content-center"
                                                    style="height: 100px; ">
                                                    <div>
                                                        <button type="button" class="btn btn-outline-primary fs-6"
                                                            data-bs-toggle="modal" data-bs-target="#confirmSign3">Chèn chữ
                                                            ký</button>

                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    ...
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="card_template-title text-center">Phê duyệt/</div>
                                                <div class="card_template-title text-center">Approved by</div>
                                                <div class=" text-center">(Ký và để lại nhận xét)</div>
                                                <div class=" d-flex align-items-center justify-content-center"
                                                    style="height: 100px; ">
                                                    <div>
                                                        <button type="button" class="btn btn-outline-primary fs-6"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#receiverConfirmSign">Chèn chữ
                                                            ký</button>

                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    ...
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="page_break"></div>

                            <div class="card_template-wrapper pt-5 mb-3">
                                <div class="card_template-body">
                                    <div class="card_template-body-top">
                                        <div class='row mb-3'>
                                            <div
                                                class="col-3 d-flex align-items-center justify-content-center flex-column">
                                                <a class=" ">
                                                    <img class="header_logo" src="{{ env('LOGO_URL', '') }}" />
                                                </a>
                                                <div class="card_template-title fst-italic">BM003.QT07/20</div>
                                            </div>
                                            <div
                                                class="col-6 d-flex align-items-center justify-content-center flex-column">
                                                <div class="card_template-heading">Bảng kê đề nghị</div>
                                                <div class="card_template-heading-mini">Mã: ...-BK</div>
                                            </div>
                                            <div class="col-3 card_template-topRight">
                                                <div
                                                    class="card_template-title fst-italic d-flex align-items-center justify-content-center">
                                                    <div class="text-nowrap">Ngày/Date:</div>
                                                    <div
                                                        class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                        <span>01/01/2001</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card_template-body-middle">
                                        <div class="row">
                                            <div class="mb-3 col-8">
                                                <div class="card_template-title with_form">
                                                    <div class="text-nowrap">Người đề nghị/Requester:</div>
                                                    <span class="card_template-sub with_input">
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập nội dung)" class="form-control textareaResize"
                                                            name="requesterPage2"></textarea>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-4">
                                                <div class="card_template-title with_form">
                                                    <div class="text-nowrap">Công việc:</div>
                                                    <span class="card_template-sub with_input">
                                                        <textarea rows="1" type="text" placeholder="(Vui lòng nhập nội dung)" class="form-control textareaResize"
                                                            name="task"></textarea>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="table-responsive DNTT_repeater">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="text-center" style="width:2%">STT
                                                            </th>
                                                            <th scope="col" class="text-center" style="width:10%">Số
                                                                chứng từ
                                                            </th>
                                                            <th scope="col" class="text-center" style="width:33%">Nội
                                                                dung
                                                            </th>
                                                            <th scope="col" class="text-center" style="width:17%">Số
                                                                tiền</th>
                                                            <th scope="col" class="text-center" style="width:36%">Ghi
                                                                chú</th>
                                                            <th scope="col" style="width:2%"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody data-repeater-list="listPaymentOrders">
                                                        <tr data-repeater-item>
                                                            <td scope="row" class="text-center">
                                                                <div>
                                                                    1
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <textarea rows="1" type="text" placeholder="" class="form-control textareaResize" name="orderNo"></textarea>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <textarea rows="1" type="text" placeholder="(Vui lòng nhập nội dung)" class="form-control textareaResize"
                                                                        name="orderContent"></textarea>
                                                                </div>
                                                            </td>
                                                            <td class="">
                                                                <div>
                                                                    <textarea rows="1" type="text" placeholder="(Vui lòng nhập nội dung)" class="form-control textareaResize"
                                                                        name="orderMoney"></textarea>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div>
                                                                    <textarea rows="1" type="text" placeholder="(Vui lòng nhập nội dung)" class="form-control textareaResize"
                                                                        name="oderNote"></textarea>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="text-center">
                                                                    <img data-repeater-delete role="button"
                                                                        src="{{ asset('/assets/img/trash.svg') }}"
                                                                        width="15px" height="15px" />
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                                <div class="d-flex justify-content-start">
                                                    <div role="button" class="fs-5 text-danger" data-repeater-create>
                                                        <i class="bi bi-plus-circle"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card_template-body-bottom">
                                        <div class="row">
                                            <div class="col"></div>
                                            <div class="col">
                                                <div class="card_template-title text-center">Người lập</div>
                                                <div class="card_template-title text-center">Applicant</div>
                                                <div class=" text-center">(Ký và ghi rõ họ tên)</div>
                                                <div class=" d-flex align-items-center justify-content-center"
                                                    style="height: 100px; ">
                                                    <div>
                                                        <button id="showImageBtn2" type="button"
                                                            class="btn btn-outline-primary fs-6">Chèn chữ
                                                            ký</button>
                                                        <div id="signatureImg2" style="display: none">
                                                            <div class="text-center">
                                                                <span class="txt_medium d-block">Chưa có chữ ký.
                                                                    Bấm vào đây thể thêm chữ ký</span>
                                                                <a href="#" class="btn btn-outline-danger">Tạo chữ
                                                                    kí</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center justify-content-center">
                                                    ...
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
                                    <div class="card_template-footer">
                                        <a href="/de-xuat-theo-mau" type="button"
                                            class="btn btn-outline-danger ps-2 pe-2 me-3">Về danh sách</a>
                                        <button type="button" class="btn btn-danger btnPrint" style="padding:0 36px;"
                                            data-content="container-fluid-1">In</button>
                                    </div>
                                    <div class="card_template-footer">
                                        <a href="/de-xuat-theo-mau/1" type="button"
                                            class="btn btn-danger ps-5 pe-5 ms-3">
                                            ...
                                            <i class="bi bi-arrow-right-short"></i>
                                        </a>
                                    </div>
                                    <div class="card_template-footer">
                                        <a href="#" type="button" class="btn btn-danger ps-5 pe-5 ms-3">
                                            Đã hết đề xuất
                                        </a>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </form>
                <div class="card_template-comment-wrapper">
                    <div class="card_template-comment">
                        <form action="#" method="POST">
                            <div class="card_template-form mb-3">
                                <input type="hidden" name="target" value="proposals">
                                <input type="hidden" name="target_id" value="1">
                                @csrf
                                <div class="card-title">Trao đổi</div>
                                <div class="flex-fill ms-3 d-flex align-items-center">
                                    <textarea placeholder="Viết bình luận..." rows="1" class="form-control" name="content"></textarea>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-danger mx-3">Gửi</button>
                                </div>
                            </div>
                        </form>
                        <div class="card_template-text-wrapper"
                            style="height: 74px; overflow-y: scroll; overflow-x: hidden">
                            {{-- Items --}}
                            <div class="card_template-text-items d-flex justify-content-between fs-5">
                                <div class="fw-bold text-nowrap">
                                    Name:
                                </div>
                                <div class="flex-fill mx-3">
                                    <div class="text-break" style="white-space: pre-line;">...
                                    </div>
                                </div>
                                <div class="d-flex align-items-start">
                                    <div class="text-break mx-3 text-nowrap" style="white-space: pre-line;">
                                        01/01/2001
                                    </div>
                                    <div>
                                        <form action="#" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-transparent">
                                                <img style="width:18px;height:18px"
                                                    src="{{ asset('assets/img/trash.svg') }}" />
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- End Items --}}
                        </div>
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
                        <a href="xem/de-nghi-thanh-toan/id" type="button" class="btn btn-danger">Gửi</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @for ($i = 0; $i < 3; $i++)
        {{-- Modal Sign --}}
        <div class="modal fade" id="confirmSign{{ $i + 1 }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">Ý kiến phản hồi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div
                                    class="mb-3 col-12 col-md-12 d-flex justify-content-between align-items-center funkyradio">
                                    <div class="funkyradio-danger">
                                        <input type="radio" name="isConfirm{{ $i + 1 }}" value="confirmRadio"
                                            id="confirmRadio{{ $i + 1 }}" />
                                        <label for="confirmRadio{{ $i + 1 }}">Xác nhận</label>
                                    </div>
                                    <div class="funkyradio-danger">
                                        <input type="radio" name="isConfirm{{ $i + 1 }}" value="destroyRadio"
                                            id="destroyRadio{{ $i + 1 }}" />
                                        <label for="destroyRadio{{ $i + 1 }}">Từ chối</label>
                                    </div>
                                </div>

                                <div class="mb-3 col-12 col-md-12 showSign">
                                    <div class="text-center">
                                        <span class="txt_medium d-block">Chưa có chữ ký. Bấm vào đây thể thêm chữ
                                            ký</span>
                                        <a href="#" class="btn btn-outline-danger">Tạo chữ
                                            kí</a>
                                    </div>
                                </div>

                                <div class="mb-3 col-12 col-md-12 showFormYKien">
                                    <textarea name="rejectReason{{ $i + 1 }}" cols="5" class="form-control" placeholder="Nhập ý kiến"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger pe-5 ps-5">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endfor


    <div class="modal fade" id="receiverConfirmSign" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Ý kiến phản hồi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST">
                    @csrf
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
                                <div class="text-center">
                                    <span class="txt_medium d-block">Chưa có chữ ký. Bấm vào đây thể thêm chữ ký</span>
                                    <a href="#" class="btn btn-outline-danger">Tạo chữ kí</a>
                                </div>
                            </div>

                            <div class="mb-3 col-12 col-md-12 showFormYKien">
                                <textarea name="receiverRejectReason" cols="5" class="form-control" placeholder="Nhập ý kiến"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="confirmBtn" class="btn btn-danger pe-5 ps-5">Xác nhận</button>
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
                startDate: new Date(),
                locale: {
                    format: 'DD/MM/YYYY '
                }
            });

        });
    </script>


    <script>
        const showImageBtn = document.getElementById('showImageBtn');
        const signatureImg = document.getElementById('signatureImg');

        if (showImageBtn && signatureImg) {
            showImageBtn.addEventListener('click', () => {
                showImageBtn.style.display = 'none';
                signatureImg.style.display = 'block';
                //create hidden input
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'senderSignature';
                input.value = `...`;

                signatureImg.parentNode.appendChild(input);

            });
        }

        const showImageBtn2 = document.getElementById('showImageBtn2');
        const signatureImg2 = document.getElementById('signatureImg2');

        if (showImageBtn2 && signatureImg2) {
            showImageBtn2.addEventListener('click', () => {
                showImageBtn2.style.display = 'none';
                signatureImg2.style.display = 'block';
                //create hidden input
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'senderSignature2';
                input.value = `...`;

                signatureImg2.parentNode.appendChild(input);

            });
        }
    </script>


    <script>
        $(document).ready(function() {
            // Hide the text areas initially
            $('.showSign, .showFormYKien').hide();
            $('#confirmBtn').hide();
            // Attach event listeners to radio buttons using a loop
            $('input[type="radio"]').each(function() {
                $(this).click(function() {
                    var selectedRadio = $(this).val();
                    $('#confirmBtn').show();
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
