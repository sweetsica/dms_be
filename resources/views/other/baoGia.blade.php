@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Mẫu yêu cầu mua sắm')

@php
    $userDepartmentName = session('department_name');
    // function getProposalRelatedPeople($proposal)
    // {
    //     $data = $proposal->data;
    //     $data = json_decode($data);
    //     if (!isset($data->relatedPeople)) {
    //         return [];
    //     }
    //     return $data->relatedPeople;
    // }

    // function isRelatedToProposal($proposal, $userId)
    // {
    //     $related = getProposalRelatedPeople($proposal);
    //     if (count($related) == 0) {
    //         return false;
    //     }
    //     foreach ($related as $item) {
    //         if ($item == $userId) {
    //             return true;
    //         }
    //     }
    // }

    // function isEdit($proposal, $userId)
    // {
    //     if ($proposal->status > 0) {
    //         return false;
    //     }
    //     if ($proposal->sender_id == $userId) {
    //         return true;
    //     }
    // }
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card_template-body" id="container-fluid">
                                <div class="card_template-body-top">
                                    <div class='row mb-3 d-flex align-items-center'>
                                        <div class="col-3 d-flex align-items-center justify-content-center flex-column">
                                            <a class=" ">
                                                <img class="header_logo" src="{{ env('LOGO_URL', '') }}" />
                                            </a>
                                            <div class="card_template-title fst-italic">BM013.QT02/12</div>
                                        </div>
                                        <div class="col-6 d-flex align-items-center justify-content-center flex-column">
                                            <div class="card_template-heading">Bảng báo giá</div>
                                            <div class="card_template-heading-mini">Mã: </div>

                                        </div>
                                        <div class="col-3">
                                            <div class="card_template-title fst-italic d-flex align-items-center justify-content-center">
                                                <div class="text-nowrap">Số/No:</div>
                                                <div class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                        <input type="text" placeholder="" class="form-control" name="proposalNo">
                                                    
                                                </div>
                                            </div>
                                            <div class="card_template-title fst-italic d-flex align-items-center justify-content-center">
                                                <div class="text-nowrap">Ngày/Date:</div>
                                                <div class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                    <input type="text" placeholder="" class="form-control datePicker" value="">
                                                    

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
                                                  <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="card_template-title d-flex align-items-center justify-content-center">
                                                                <div class="card-title-black text-nowrap">Công ty:</div>
                                                                <div class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                                        <input type="text" value="Cổ phần Thái Bình Hưng Thịnh" placeholder="" class="card-title-black form-control" name="proposalNo">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="card_template-title d-flex align-items-center justify-content-center">
                                                                <div class="card-title-black text-nowrap">Liên hệ:</div>
                                                                <div class=" card_template-sub with_input d-flex justify-content-center align-items-center">
                                                                        <input type="text" value="Phạm Ánh Dương – TPKD" placeholder="" class="form-control" name="proposalNo">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="card_template-title d-flex align-items-center justify-content-center">
                                                                <div class="text-nowrap">Địa chỉ:</div>
                                                                <div class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                                        <input type="text" value="Số 266 đường Trần Hưng Đạo, thị trấn An Bài, huyện Quỳnh Phụ, tỉnh Thái Bình." placeholder="" class=" form-control" name="proposalNo">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="card_template-title d-flex align-items-center justify-content-center">
                                                                <div class=" text-nowrap">Di động:</div>
                                                                <div class=" card_template-sub with_input d-flex justify-content-center align-items-center">
                                                                        <input type="text" value="0945.699.269" placeholder="" class="form-control" name="proposalNo">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="card_template-title d-flex align-items-center justify-content-center">
                                                                <div class=" text-nowrap">Mã số thuế:</div>
                                                                <div class=" card_template-sub with_input d-flex justify-content-center align-items-center">
                                                                        <input type="text" value="1000374568" placeholder="" class=" form-control" name="proposalNo">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="card_template-title d-flex align-items-center justify-content-center">
                                                                <div class=" text-nowrap">Email:</div>
                                                                <div class=" card_template-sub with_input d-flex justify-content-center align-items-center">
                                                                        <input type="text" value="duong_pham@tbht.vn" placeholder="" class=" form-control" name="proposalNo">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="card_template-title d-flex align-items-center justify-content-center">
                                                                <div class=" text-nowrap">Số tổng đài:</div>
                                                                <div class=" card_template-sub with_input d-flex justify-content-center align-items-center">
                                                                        <input type="text" value="088.880.9889" placeholder="" class=" form-control" name="proposalNo">
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="card_template-title d-flex align-items-center justify-content-center">
                                                                <div class=" text-nowrap">Website:</div>
                                                                <div class=" card_template-sub with_input d-flex justify-content-center align-items-center">
                                                                        <input type="text" value="https://tbht.vn/" placeholder="" class=" form-control" name="proposalNo">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    
                                                  </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <textarea type="text"  rows="1" placeholder="" class="card-title-black form-control textareaResize" name="product">Khách hàng: Quý khách hàng.</textarea>
                                    
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <textarea type="text"  rows="2" placeholder="" class=" form-control textareaResize" name="product">Cảm ơn Quý khách hàng đã quan tâm đến sản phẩm. Hy vọng rằng sản phẩm sẽ đáp ứng tốt nhu cầu của Quý khách và chúng tôi mong rằng sẽ nhận được phản hồi của Quý khách trong thời gian sớm nhất. Xin hãy tham chiếu Mã báo giá: VN001 trên các thư từ liên quan hoặc đơn đặt hàng. Vui lòng trao đổi với nhân viên tư vấn để biết thêm thông tin chi tiết. Điều khoản thanh toán: Thanh toán trước 50% giá trị đơn hàng khi tiến hành ký Hợp đồng mua bán. 50% giá trị đơn hàng còn lại Quý khách hàng sẽ thanh toán sau 05 ngày kể từ ngày Công ty chúng tôi thông báo thờigian giao hàng.
                                            Điều khoản giao hàng: Công ty chúng tôi sẽ tiến hành giao hàng khi đã nhận đủ 100% giá trị đơn hàng.Thời gian giao hàng dự kiến: Trong vòng 45 ngày kể từ ngày hai bên ký kết Hợp đồng mua bán. Hiệu lực báo giá:
                                            Giá và số lượng chỉ có hiệu lực khi mặt hàng (sản phẩm) được khách hàng quyết định mua. Model, hình ảnh, thông số kỹ thuật và báo giá như sau:</textarea>
                                    
                                    </div>
                                    
                                 
                                    

                                    {{-- <div class="col-md-12 mb-3">
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
                                                        <th scope="col" style="width:3%"></th>

                                                    </tr>
                                                </thead>
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

                                                <td colspan="7" class="text-center fw-bold">Tổng (chưa VAT)</td>
                                                <td colspan="2">
                                                    <div style="text-align: right">
                                                        <textarea rows="1" type="text" placeholder=""class="form-control textareaResize" name="sumPriceNovat"></textarea>
                                                        

                                                    </div>
                                                </td>

                                                </tr>
                                                <tr>
                                                    <td colspan="7" class="text-center fw-bold">Tổng (có VAT)</td>
                                                    <td colspan="2">
                                                        <div style="text-align: right">
                                                            <textarea rows="1" type="text" placeholder=""class="form-control textareaResize" name="sumPricevat"></textarea>
                                                            
                                                        </div>
                                                    </td>

                                                </tr>
                                            </table>

                                        </div>
                                    </div> --}}

                                    {{-- <div class="mb-3 col-12">
                                        <div class="card_template-title  with_form">
                                            <div class="text-nowrap">Tệp đính kèm/Attached files:</div>
                                        </div>
                                    </div>
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
                                        </div> --}}
                                </div>

                                
                            </div>
                            {{-- <div class="d-flex justify-content-end">
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



                            </div> --}}
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
                        <a href="/xem/yeu-cau-mua-sam/id" type="button" class="btn btn-danger">Gửi</a>
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
                // startDate: new Date(),
                locale: {
                    format: 'DD/MM/YYYY '
                }
            });

        });
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
