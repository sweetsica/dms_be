@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Mẫu yêu cầu mua sắm')

@php
    $userDepartmentName = session('department_name');
    function getProposalRelatedPeople($proposal)
    {
        $data = $proposal->data;
        $data = json_decode($data);
        if (!isset($data->relatedPeople)) {
            return [];
        }
        return $data->relatedPeople;
    }

    function isRelatedToProposal($proposal, $userId)
    {
        $related = getProposalRelatedPeople($proposal);
        if (count($related) == 0) {
            return false;
        }
        foreach ($related as $item) {
            if ($item == $userId) {
                return true;
            }
        }
    }

    function isEdit($proposal, $userId)
    {
        if ($proposal->status > 0) {
            return false;
        }
        if ($proposal->sender_id == $userId) {
            return true;
        }
    }
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
                        <form action="{{ route('proposal.updateData', $proposal->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card_template-body" id="container-fluid-{{ $proposal->id }}">
                                <div class="card_template-body-top">
                                    <div class='row mb-3 align-items-center'>
                                        <div class="col-3 d-flex align-items-center justify-content-center flex-column">
                                            <a class=" ">
                                                <img class="header_logo" src="{{ env('LOGO_URL', '') }}" />
                                            </a>
                                            <div class="card_template-title fst-italic">BM013.QT02/12</div>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-center flex-column">
                                            <div class="card_template-heading">Yêu cầu mua sắm</div>
                                            <div class="card_template-heading-mini">Purchasing requirement</div>
                                            <div class="card_template-heading-mini">Mã: {{ $proposal->code }}</div>

                                        </div>
                                        <div class="col-3">
                                            <div class="card_template-title fst-italic d-flex align-items-center justify-content-center">
                                                <div class="text-nowrap">Số/No:</div>
                                                <div class="card_template-sub with_input d-flex justify-content-center align-items-center"">
                                                    @if (isEdit($proposal, session('user')['id']))
                                                        <input type="text" placeholder="" class="form-control" name="proposalNo">
                                                    @else
                                                        <div class="card_template-sub-text">
                                                            {{ $proposalData->proposalNo ?? '' }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card_template-title fst-italic d-flex align-items-center justify-content-center">
                                                <div class="text-nowrap">Ngày/Date:</div>
                                                <div class="card_template-sub with_input d-flex justify-content-center align-items-center"">
                                                    @if (isEdit($proposal, session('user')['id']))
                                                        <input type="text" placeholder="" class="form-control datePicker" value="{{ date('d/m/Y', strtotime($proposal->created_at)) }}">
                                                    @else
                                                        <span>{{ date('d/m/Y', strtotime($proposal->created_at)) }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card_template-body-middle">

                                    <div class="col-md-12 mb-3">
                                        <div class="table-responsive YCMS_repeater">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center" style="width:3%">STT</th>
                                                        <th scope="col" class="text-center" style="width: 22%">Tên, chủng
                                                            loại, quy cách hàng hóa (Đính kèm hình ảnh, mô tả nếu có)</th>
                                                        <th scope="col" class="text-center" style="width: 7%">Số lượng
                                                        </th>
                                                        <th scope="col" class="text-center" style="width: 5%">ĐVT</th>
                                                        <th scope="col" class="text-center" style="width: 15%">MĐ sử dụng
                                                            &
                                                            T.gian hoàn thành</th>
                                                        <th scope="col" class="text-center" style="width: 15%">NCC tốt
                                                            nhất
                                                            (Tên, sđt, đc)</th>
                                                        <th scope="col" class="text-center" style="width: 15%">Đơn giá
                                                            (VNĐ)
                                                        </th>
                                                        <th scope="col" class="text-center" style="width: 15%">Tổng tiền
                                                            (VNĐ)</th>
                                                        @if (isEdit($proposal, $user->id))
                                                            <th scope="col" style="width:3%"></th>
                                                        @endif

                                                    </tr>
                                                </thead>
                                                @if (isEdit($proposal, $user->id))
                                                    <tbody data-repeater-list="listShoppingRequest">
                                                        <tr data-repeater-item>
                                                            <td scope="row" class="text-center">
                                                                <div>
                                                                    1
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <textarea type="text" rows="1" placeholder="" class="form-control textareaResize" name="product"></textarea>
                                                            </td>
                                                            <td>
                                                                <textarea rows="1" type="text" placeholder="" class="form-control textareaResize" name="quantity"></textarea>
                                                            </td>
                                                            <td>
                                                                <textarea rows="1" type="text" placeholder="" class="form-control textareaResize" name="unit"></textarea>
                                                            </td>
                                                            <td>
                                                                <textarea rows="1" type="text" placeholder="" class="form-control textareaResize" name="purpose"></textarea>
                                                            </td>
                                                            <td>
                                                                <textarea rows="1" type="text" placeholder=""class="form-control textareaResize" name="provider"></textarea>
                                                            </td>
                                                            <td>
                                                                <textarea rows="1" type="text" placeholder=""style="text-align: right;" class="form-control textareaResize" name="price"></textarea>
                                                            </td>
                                                            <td>
                                                                <textarea rows="1" type="text" placeholder=""style="text-align: right;" class="form-control textareaResize" name="totalPrice"></textarea>
                                                            </td>
                                                            <td>
                                                                <img data-repeater-delete role="button" src="{{ asset('/assets/img/trash.svg') }}" width="15px" height="15px" />
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                    <tr>
                                                        <td colspan="9">
                                                            <span role="button" class="fs-5 text-danger" data-repeater-create><i class="bi bi-plus-circle"></i></span>
                                                        </td>
                                                        </td>
                                                    <tr>
                                                    @else
                                                        <tbody>
                                                            @if (isset($proposalData->listShoppingRequest))
                                                                @foreach ($proposalData->listShoppingRequest as $item)
                                                                    <tr>
                                                                        <td scope="row" class="text-center">
                                                                            <div>
                                                                                {{ $loop->iteration }}
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-break" style="white-space: pre-line;">
                                                                                {{ $item->product }}
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-break" style="white-space: pre-line;">
                                                                                {{ $item->quantity }}
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-break" style="white-space: pre-line;">
                                                                                {{ $item->unit }}
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-break" style="white-space: pre-line;">
                                                                                {{ $item->purpose }}
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <div class="text-break" style="white-space: pre-line;">
                                                                                {{ $item->provider }}
                                                                            </div>
                                                                        </td>
                                                                        <td style="text-align: right">
                                                                            <div class="text-break" style="white-space: pre-line;">
                                                                                {{ $item->price }}
                                                                            </div>
                                                                        </td>
                                                                        <td style="text-align: right">
                                                                            <div class="text-break" style="white-space: pre-line;">
                                                                                {{ $item->totalPrice }}
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                @endif

                                                <td colspan="7" class="text-center fw-bold">Tổng (chưa VAT)</td>
                                                <td colspan="2">
                                                    <div style="text-align: right">
                                                        @if (isEdit($proposal, $user->id))
                                                            <textarea rows="1" type="text" placeholder=""class="form-control textareaResize" name="sumPriceNovat"></textarea>
                                                        @else
                                                            <span>{{ $proposalData->sumPriceNovat ?? '' }}</span>
                                                        @endif

                                                    </div>
                                                </td>

                                                </tr>
                                                <tr>
                                                    <td colspan="7" class="text-center fw-bold">Tổng (có VAT)</td>
                                                    <td colspan="2">
                                                        <div style="text-align: right">

                                                            @if (isEdit($proposal, $user->id))
                                                                <textarea rows="1" type="text" placeholder=""class="form-control textareaResize" name="sumPricevat"></textarea>
                                                            @else
                                                                <span>{{ $proposalData->sumPricevat ?? '' }}</span>
                                                            @endif
                                                        </div>
                                                    </td>

                                                </tr>
                                            </table>

                                        </div>
                                    </div>

                                    <div class="mb-3 col-12">
                                        <div class="card_template-title  with_form">
                                            <div class="text-nowrap">Tệp đính kèm/Attached files:</div>
                                        </div>
                                    </div>
                                    @if (isEdit($proposal, $user->id))
                                        <div class="col-md-5 mb-3">
                                            <div class="d-flex flex-column">

                                                <div class="upload_wrapper-items">
                                                    <input type="hidden" value="" />
                                                    <button role="button" type="button" class="btn position-relative border d-flex">
                                                        <img style="width:16px;height:16px" src="{{ asset('assets/img/upload-file.svg') }}" />
                                                        <span class="ps-2">Chọn file đính kèm</span>
                                                        <input role="button" type="file" class="modal_upload-input modal_upload-file" name="files[]" multiple onchange="updateList(event)" />
                                                    </button>
                                                    <ul class="modal_upload-list" style="max-height: 200px; overflow-y: scroll; overflow-x: hidden;">
                                                    </ul>

                                                </div>

                                            </div>
                                        </div>
                                    @else
                                        <ul class="modal_upload-list" style="max-height: 200px; overflow-y: scroll; overflow-x: hidden;">
                                            @foreach ($proposalFiles as $file)
                                                <li>
                                                    <a href="{{ $file }}" target="_blank">Xem file đính kèm</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    @endif
                                </div>

                                <div class="card_template-body-bottom">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card_template-title text-center">Người lập/</div>
                                            <div class="card_template-title text-center">Applicant</div>
                                            <div class=" text-center">(Ký và ghi rõ họ tên)</div>
                                            <div class=" d-flex align-items-center justify-content-center" style="height: 100px; ">
                                                @if (isEdit($proposal, $user->id))
                                                    <div>
                                                        @if ($proposal->sender_id == $user->id)
                                                            <button id="showImageBtn" type="button" class="btn btn-outline-primary fs-6">Chèn chữ ký</button>
                                                        @endif
                                                        <div id="signatureImg" style="display: none">
                                                            @if ($user->signature)
                                                                <img width="100" src="{{ $user->signature }}" />
                                                            @else
                                                                <div class="text-center">
                                                                    <span class="txt_medium d-block">Chưa có chữ ký. Bấm
                                                                        vào đây thể thêm chữ ký</span>
                                                                    <a href="{{ route('users.me') }}" class="btn btn-outline-danger">Tạo chữ kí</a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @else
                                                    <img width="100" src="{{ $proposalData->senderSignature ?? '' }}" />
                                                @endif
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center">
                                                {{ $proposal->sender->name ?? '' }}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card_template-title text-center">Phụ trách bộ phận/</div>
                                            <div class="card_template-title text-center">Head of Department</div>
                                            <div class=" text-center">(Ký và để lại nhận xét)</div>
                                            <div class=" d-flex align-items-center justify-content-center" style="height: 100px; ">
                                                <div>
                                                    @if (isset($proposalData->rejectReason1))
                                                        <div>
                                                            <div class="text-center">x</div>
                                                            <div>{{ $proposalData->rejectReason1 }}</div>
                                                        </div>
                                                    @elseif (isset($proposalData->relatedSignature1))
                                                        <img src="{{ $proposalData->relatedSignature1 }}" alt="" width="100">
                                                    @else
                                                        @if (isRelatedToProposal($proposal, $user->id))
                                                            <button type="button" class="btn btn-outline-primary fs-6" data-bs-toggle="modal" data-bs-target="#confirmSign1">Chèn
                                                                chữ ký</button>
                                                        @endif
                                                    @endif

                                                </div>
                                            </div>
                                            @if (isset($proposalData->relatedUserName1))
                                                <div class="d-flex align-items-center justify-content-center">
                                                    {{ $proposalData->relatedUserName1 ?? '' }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col">
                                            <div class="card_template-title text-center">Kế toán/</div>
                                            <div class="card_template-title text-center">Accountant</div>
                                            <div class=" text-center">(Ký và để lại nhận xét)</div>
                                            <div class=" d-flex align-items-center justify-content-center" style="height: 100px; ">
                                                <div>
                                                    @if (isset($proposalData->rejectReason2))
                                                        <div>
                                                            <div class="text-center">x</div>
                                                            <div>{{ $proposalData->rejectReason2 }}</div>
                                                        </div>
                                                    @elseif (isset($proposalData->relatedSignature2))
                                                        <img src="{{ $proposalData->relatedSignature2 }}" alt="" width="100">
                                                    @else
                                                    @if ($userDepartmentName == "Phòng Tài chính Kế toán" || $userDepartmentName == "Bộ phận Kế toán")
                                                    <button type="button" class="btn btn-outline-primary fs-6" data-bs-toggle="modal" data-bs-target="#confirmSign2">Chèn
                                                                chữ ký</button>
                                                        @endif
                                                    @endif

                                                </div>
                                            </div>                                            
                                            @if (isset($proposalData->relatedUserName2))
                                                <div class="d-flex align-items-center justify-content-center">
                                                    {{ $proposalData->relatedUserName2 ?? '' }}
                                                </div>
                                            {{-- @elseif ($userDepartmentName == "Phòng Tài chính Kế toán" || $userDepartmentName == "Bộ phận Kế toán")
                                                <div class="d-flex align-items-center justify-content-center">
                                                    {{ $user->name }}
                                                </div> --}}
                                            @endif
                                        </div>


                                        <div class="col">
                                            <div class="card_template-title text-center">Phê duyệt/</div>
                                            <div class="card_template-title text-center">Approved by</div>
                                            <div class=" text-center">(Ký và để lại nhận xét)</div>
                                            <div class=" d-flex align-items-center justify-content-center" style="height: 100px; ">
                                                <div>
                                                    @if (isset($proposalData->receiverRejectReason))
                                                        <div>
                                                            <div class="text-center">x</div>
                                                            <div>{{ $proposalData->receiverRejectReason }}</div>
                                                        </div>
                                                    @elseif (isset($proposalData->receiverSignature))
                                                        <img src="{{ $proposalData->receiverSignature }}" alt="" width="100">
                                                    @else
                                                        @if ($proposal->receiver_id == $user->id)
                                                            <button type="button" class="btn btn-outline-primary fs-6" data-bs-toggle="modal" data-bs-target="#receiverConfirmSign">Chèn chữ ký</button>
                                                        @endif
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center">
                                                {{ $proposal->receiver->name ?? '' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                @if (isEdit($proposal, $user->id))
                                    <div class="card_template-footer">
                                        <a href="/de-xuat-theo-mau" type="button" class="btn btn-outline-danger ps-5 pe-5 me-3">Hủy</a>
                                        <button type="submit" class="btn btn-danger ps-5 pe-5">Gửi</button>
                                    </div>
                                @else
                                    <div class="card_template-footer">
                                        <a href="/de-xuat-theo-mau" type="button" class="btn btn-outline-danger ps-2 pe-2 me-3">Về danh sách</a>
                                        <button type="button" class="btn btn-danger btnPrint" style="padding: 0 36px;" data-content="container-fluid-{{ $proposal->id }}">In</button>
                                    </div>
                                    @if (count($nextProposalIds))
                                        <div class="card_template-footer">
                                            <a href="/de-xuat-theo-mau/{{ $nextProposalIds[0] }}" type="button" class="btn btn-danger ps-5 pe-5 ms-3">
                                                {{ $proposal->status > 1 ? 'Chuyển kí tiếp' : 'Bỏ qua' }}
                                                <i class="bi bi-arrow-right-short"></i>
                                            </a>
                                        </div>
                                    @else
                                        <div class="card_template-footer">
                                            <a href="{{ route('proposal.list') }}" type="button" class="btn btn-danger ps-5 pe-5 ms-3">
                                                Đã hết đề xuất
                                            </a>
                                        </div>
                                    @endif

                                @endif



                            </div>
                        </form>
                    </div>
                    <div class="card_template-comment-wrapper">
                        <div class="card_template-comment">
                            <form action="{{ route('comment.store') }}" method="POST">
                                <div class="card_template-form mb-3">
                                    <input type="hidden" name="target" value="proposals">
                                    <input type="hidden" name="target_id" value="{{ $proposal->id }}">
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
                            <div class="card_template-text-wrapper" style="height: 74px; overflow-y: scroll; overflow-x: hidden">
                                @foreach ($comments->data as $comment)
                                    {{-- Items --}}
                                    <div class="card_template-text-items d-flex justify-content-between fs-5">
                                        <div class="fw-bold text-nowrap">
                                            {{ $comment->user->name }}:
                                        </div>
                                        <div class="flex-fill mx-3">
                                            <div class="text-break" style="white-space: pre-line;">{{ $comment->content }}</div>
                                        </div>
                                        <div class="d-flex align-items-start">
                                            <div class="text-break mx-3 text-nowrap" style="white-space: pre-line;">{{ date('H:i || d/m/y ', strtotime('+7 hours', strtotime($comment->created_at))) }}</div>
                                            <div>
                                                <form action="{{ route('comment.delete', $comment->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-transparent">
                                                        <img style="width:18px;height:18px" src="{{ asset('assets/img/trash.svg') }}" />
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Items --}}
                                @endforeach
                            </div>
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
                        <a href="/xem/yeu-cau-mua-sam/id" type="button" class="btn btn-danger">Gửi</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @for ($i = 0; $i < 3; $i++)
        {{-- Modal Sign --}}
        <div class="modal fade" id="confirmSign{{ $i + 1 }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">Ý kiến phản hồi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('proposal.updateData', $proposal->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="mb-3 col-12 col-md-12 d-flex justify-content-between align-items-center funkyradio">
                                    <div class="funkyradio-danger">
                                        <input type="radio" name="isConfirm{{ $i + 1 }}" value="confirmRadio" id="confirmRadio{{ $i + 1 }}" />
                                        <label for="confirmRadio{{ $i + 1 }}">Xác nhận</label>
                                    </div>
                                    <div class="funkyradio-danger">
                                        <input type="radio" name="isConfirm{{ $i + 1 }}" value="destroyRadio" id="destroyRadio{{ $i + 1 }}" />
                                        <label for="destroyRadio{{ $i + 1 }}">Từ chối</label>
                                    </div>
                                </div>

                                <div class="mb-3 col-12 col-md-12 showSign">
                                    @if ($user->signature)
                                        <img width="100" src="{{ $user->signature }}" />
                                        <input type="hidden" name="relatedSignature{{ $i + 1 }}" value="{{ $user->signature }}">
                                    @else
                                        <div class="text-center">
                                            <span class="txt_medium d-block">Chưa có chữ ký. Bấm vào đây thể thêm chữ
                                                ký</span>
                                            <a href="{{ route('users.me') }}" class="btn btn-outline-danger">Tạo chữ
                                                kí</a>
                                        </div>
                                    @endif
                                    <input type="hidden" name="relatedUserName{{ $i + 1 }}" value="{{ $user->name }}">
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


    <div class="modal fade" id="receiverConfirmSign" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Ý kiến phản hồi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('proposal.updateData', $proposal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col-12 col-md-12 d-flex justify-content-between align-items-center funkyradio">
                                <div class="funkyradio-danger">
                                    <input type="radio" name="isReceiverConfirm" value="confirmRadio" id="receiverConfirm" />
                                    <label for="receiverConfirm">Xác nhận</label>
                                </div>
                                <div class="funkyradio-danger">
                                    <input type="radio" name="isReceiverConfirm" value="destroyRadio" id="destroyRadioRec" />
                                    <label for="destroyRadioRec">Từ chối</label>
                                </div>
                            </div>

                            <div class="mb-3 col-12 col-md-12 showSign">
                                @if ($user->signature)
                                    <img width="100" src="{{ $user->signature }}" />
                                    <input type="hidden" name="receiverSignature" value="{{ $user->signature }}">
                                @else
                                    <div class="text-center">
                                        <span class="txt_medium d-block">Chưa có chữ ký. Bấm vào đây thể thêm chữ ký</span>
                                        <a href="{{ route('users.me') }}" class="btn btn-outline-danger">Tạo chữ kí</a>
                                    </div>
                                @endif
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
                input.value = `{!! $user->signature !!}`;

                signatureImg.parentNode.appendChild(input);

            });
        }


        // const showImageBtn2 = document.getElementById('showImageBtn2');
        // const signatureImg2 = document.getElementById('signatureImg2');

        // if (showImageBtn2 && signatureImg2) {
        //     showImageBtn2.addEventListener('click', () => {
        //         showImageBtn2.style.display = 'none';
        //         signatureImg2.style.display = 'block';


        //         //create hidden input
        //         const input = document.createElement('input');
        //         input.type = 'hidden';
        //         input.name = 'relatedSignature1';
        //         input.value = `{!! $user->signature !!}`;

        //         signatureImg2.parentNode.appendChild(input);
        //     });
        // }



        // const showImageBtn3 = document.getElementById('showImageBtn3');
        // const signatureImg3 = document.getElementById('signatureImg3');

        // if (showImageBtn3 && signatureImg3) {


        //     showImageBtn3.addEventListener('click', () => {
        //         showImageBtn3.style.display = 'none';
        //         signatureImg3.style.display = 'block';

        //         const input = document.createElement('input');
        //         input.type = 'hidden';
        //         input.name = 'relatedSignature2';
        //         input.value = `{!! $user->signature !!}`;

        //         signatureImg3.parentNode.appendChild(input);
        //     });

        // }


        // const showImageBtn4 = document.getElementById('showImageBtn4');
        // const signatureImg4 = document.getElementById('signatureImg4');

        // if (showImageBtn4 && signatureImg4) {
        //     showImageBtn4.addEventListener('click', () => {
        //         showImageBtn4.style.display = 'none';
        //         signatureImg4.style.display = 'block';

        //         const input = document.createElement('input');
        //         input.type = 'hidden';
        //         input.name = 'relatedSignature3';
        //         input.value = `{!! $user->signature !!}`;

        //         signatureImg4.parentNode.appendChild(input);

        //     });
        // }




        // const showImageBtn5 = document.getElementById('showImageBtn5');
        // const signatureImg5 = document.getElementById('signatureImg5');

        // if (showImageBtn5 && signatureImg5) {
        //     showImageBtn5.addEventListener('click', () => {
        //         showImageBtn5.style.display = 'none';
        //         signatureImg5.style.display = 'block';

        //         const input = document.createElement('input');
        //         input.type = 'hidden';
        //         input.name = 'receiverSignature';
        //         input.value = `{!! $user->signature !!}`;

        //         signatureImg5.parentNode.appendChild(input);
        //     });
        // }
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
