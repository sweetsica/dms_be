@extends('template.master')
{{-- Trang chủ GIao Ban --}}
@section('title', 'Chi tiết sản phẩm')
@section('header-style')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

    <style>
        #preview {
            width: 100px;
            height: 10vh;
            object-fit: contain;
        }
        #fileInput {
            margin-bottom: 10px;
        }

        #preview img {
            max-height: 100%;
            object-fit: contain;
            margin: 2px;
            display: block;
        }

        #attachments a {
            display: block;
            margin: 2px;
        }

        .file-list li {
            margin: 2px;
        }

        .file-list span.modal_upload-remote {
            cursor: pointer;
            margin-left: 10px;
        }

        #fileInput {
            display: none; /* Ẩn input thực tế */
        }

        #fileButton {
            position: relative;
            border: 1px solid #ced4da;
            width: 100%;
            display: flex;
            align-items: center;
            padding: 5px 10px;
            cursor: pointer;
        }

        #fileButton img {
            width: 16px;
            height: 16px;
            margin-right: 8px;
        }

        #fileButton span {
            flex-grow: 1;
            margin-right: 8px;
        }



        .carousel-indicators button.thumbnail {
            width: 200px;
            height: 6vh;
            object-fit: contain;
        }

        .carousel-indicators button.thumbnail img {
            max-height: 100%;
            width: auto;
            object-fit: contain;
        }

        .carousel-indicators button.thumbnail:not(.active) {
            opacity: 0.7;
        }

        .carousel-indicators {
            position: static;
        }


        .carousel-indicators [data-bs-target] {
            height: 40px;
        }


        .carousel-item {
            height: 20vh;
            background-size: 100%;
            background-repeat: no-repeat
        }

        .carousel-item img {
            max-height: 100%;
            width: auto;
            object-fit: contain;
        }

        

        @media screen and (min-width: 200px) {
            .carousel {
                max-width: 70%;
                margin: 0 auto;
            }
        }


    </style>
@endsection
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <form method="POST" action="{{ route('product.create', ['id' => $product->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card_template-wrapper">
                            <div class="card_template-body" id="container-fluid">
                                <div class="card_template-body-top">
                                    <div class='row mb-3 d-flex align-items-center'>
                                        <div class="col-4 d-flex align-items-center justify-content-center ">
                                            <a class=" ">
                                                <img class="header_logo" src="{{ env('LOGO_URL', '') }}" />
                                            </a>
                                        </div>
                                        <div class="col-4 d-flex align-items-center justify-content-center flex-column">
                                            <div id="headingDetail" class="card_template-heading">Thông tin sản phẩm</div>
                                            <div class="d-flex align-items-center">
                                                <div class="modal-title-black mt-2 text-uppercase"> {{ $product->name }} -
                                                </div>
                                                <div class=" modal-title mt-2 ms-2 text-uppercase">{{ $product->code }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 d-flex align-items-center justify-content-end"
                                            style="height: 70px;">
                                            {!! QrCode::generate(route('product.show', $product->id)) !!}
                                        </div>
                                    </div>
                                </div>

                                {{-- Giao diện nhập input --}}
                                <div class="row card_template-body-middle mb-3">
                                    {{-- <div id="fileInput" class="col-md-6 mb-3 {{ empty($details->images) ? 'd-block' : 'd-none' }}">
                                        <div class="upload_wrapper-items">
                                            <div class="alert alert-danger alertNotSupport" role="alert"
                                                style="display:none">
                                                File bạn tải lên hiện tại không hỗ trợ !
                                            </div>
                                            <div class="modal_upload-wrapper">
                                                <label class="modal_upload-label" for="file">
                                                    Tải ảnh của sản phẩm ở đây</label>
                                                <div class="mt-2 text-secondary fst-italic">Hỗ trợ định
                                                    dạng
                                                    JPG,
                                                    PNG
                                                </div>
                                                <div
                                                    class="modal_upload-action mt-3 d-flex align-items-center justify-content-center">
                                                    <div class="modal_upload-addFile me-3">
                                                        <button role="button" type="button"
                                                            class="btn position-relative pe-4 ps-4">
                                                            <img style="width:16px;height:16px"
                                                                src="{{ asset('assets/img/upload-file.svg') }}" />
                                                            Tải file lên
                                                            <input role="button" type="file"
                                                                class="modal_upload-input modal_upload-file" name="files[]"
                                                                multiple onchange="updateList(event)">
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                            <ul class="modal_upload-list"
                                                style="max-height: 134px; overflow-y: scroll; overflow-x: hidden;"></ul>
                                        </div>
                                    </div> --}}

                                    <div class="col-md-6">
                                        <div class="upload_wrapper-items">
                                            <input type="hidden" value="" />
                                            <label for="fileInput" id="fileButton" class="btn position-relative border d-flex w-50">
                                                <img src="{{ asset('assets/img/upload-file.svg') }}" />
                                                <span class="ps-2">Đính kèm tài liệu</span>
                                            </label>
                                            <input id="fileInput" multiple role="button" type="file"
                                                class="modal_upload-input modal_upload-file" name="file" onchange="updateList(event)" />
                                        </div>
                                    
                                        <div id="preview" class="d-flex mt-3"></div>
                                        <ul id="attachments" class="file-list" style="padding: 0 0 4px 0; word-break: break-all;"></ul>

                                    </div>


                                    {{-- @if (!empty($details->images))
                                        <div id="caroselImg" class="col-md-6 mb-3 {{ !empty($details->images) ? 'd-block' : 'd-none' }}" style="overflow: hidden;">
                                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    @foreach (json_decode($details->images) as $key => $img)
                                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                            <img src="{{ $img }}" class="d-block w-100" alt="...">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <div class="carousel-indicators">
                                                    @foreach (json_decode($details->images) as $key => $img)
                                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}"
                                                            class="{{ $key == 0 ? 'active' : '' }} thumbnail" aria-current="true"
                                                            aria-label="Slide {{ $key + 1 }}">
                                                            <img src="{{ $img }}" class="d-block w-100" alt="...">
                                                        </button>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        
                                    @endif --}}

                                    <div class="col-md-6 mb-3">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <div class="card-title-black">Mô tả:</div>
                                            </div>
                                            @if (!$details->description)
                                                <div class="col-md-12 mb-3">
                                                    <textarea rows="4" type="text" placeholder="(Vui lòng nhập thông tin chung về sản phẩm)"
                                                        class="form-control textareaResize" name="description"></textarea>
                                                </div>
                                            @else
                                                <div class="col-md-12 mb-3">
                                                    <textarea style="pointer-events: none;" rows="4" type="text"
                                                        placeholder="(Vui lòng nhập thông tin chung về sản phẩm)" class="form-control textareaResize" name="description">{{ $details->description }}</textarea>
                                                </div>
                                            @endif

                                            @if (!$details->price)
                                                <div class="col-md-12 mb-3">
                                                    <button type="button" class="btn btn-danger" id="showPriceButton">Giá
                                                        bán</button>
                                                </div>
                                                <div class="col-md-12 mb-3" id="priceSection" style="display: none;">
                                                    <div
                                                        class="card_template-title d-flex align-items-center justify-content-center">
                                                        <div class="text-nowrap">Giá bán:</div>
                                                        <div
                                                            class="card_template-sub with_input d-flex justify-content-center align-items-center">
                                                            <input type="text" placeholder="" class="form-control"
                                                                name="price">
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-12 mb-3">
                                                    <div
                                                        class="card_template-title d-flex align-items-center justify-content-center">
                                                        <div class="text-nowrap">Giá bán:</div>
                                                        <div
                                                            class="card_template-sub with_input d-flex justify-content-center align-items-center">

                                                            <textarea style="pointer-events: none;" rows="1" type="text" placeholder="Nhập giá tiền" class="form-control textareaResize"
                                                                name="price">{{ $details->price }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if (!empty($details->attachments))
                                                @foreach (json_decode($details->attachments) as $att)
                                                    <div class="col-md-4 mb-3">
                                                        <div class="text-break " style="margin-left: 4px">
                                                            <a
                                                                href="{{ $att }}">{{ pathinfo(basename($att), PATHINFO_FILENAME) }}</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="mb-3">
                                            <div class="modal-title">Thông số kỹ thuật:</div>
                                        </div>
                                        @php
                                            $hasNonNullValue = false;
                                            $data = json_decode($details->data);
                                            if ($data) {
                                                foreach ($data as $key => $element) {
                                                    if ($element->key !== null || $element->value !== null) {
                                                        $hasNonNullValue = true;
                                                        break; // Exit the loop if a non-null value is found
                                                    }
                                                }
                                            }
                                        @endphp
                                        @if (!$hasNonNullValue)
                                            <div class="row d-flex align-items-center" style="position: relative">
                                                <div class="col-md-4 mb-3 d-flex align-items-center item-1">
                                                    <div class="countData card_template-sub with_input d-flex justify-content-center align-items-center"
                                                        style="width:50%">
                                                        <textarea rows="1" type="text" placeholder="Độ dài" class="card-title-black form-control textareaResize"
                                                            name="listProducts[0][key]"></textarea>
                                                    </div>
                                                    <div class="countData card_template-sub with_input d-flex justify-content-center align-items-center"
                                                        style="width:50%">
                                                        <textarea rows="1" type="text" placeholder="Catalogue mô tả" class="form-control textareaResize"
                                                            name="listProducts[0][value]"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row d-flex align-items-center" style="position: relative">
                                                @foreach ($data as $key => $element)
                                                    <div class="col-md-4 mb-3 d-flex align-items-center item-1">
                                                        <div class="countData card_template-sub with_input d-flex justify-content-center align-items-center"
                                                            style="width:50%">
                                                            <textarea rows="1" style="pointer-events: none;" type="text" placeholder="Độ dài"
                                                                class="card-title-black form-control textareaResize" name="listProducts[0][key]">{{ $element->key }}</textarea>
                                                        </div>
                                                        <div class="countData card_template-sub with_input d-flex justify-content-center align-items-center"
                                                            style="width:50%">
                                                            <textarea rows="1" style="pointer-events: none;" type="text" placeholder="Catalogue mô tả"
                                                                class="form-control textareaResize" name="listProducts[0][value]">{{ $element->value }}</textarea>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="">
                                            <div class="d-flex justify-content-start">
                                                <div role="button" class="fs-5 text-danger"><i
                                                        class="bi bi-plus-circle"></i></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                

                                <div class="card_template-body-bottom">
                                    <div class="row">
                                        <div class="col-12 modal-title">Sản phẩm liên quan</div>
                                        @if (!empty($details->related))
                                            @php
                                                $relatedProductIds = json_decode($details->related);
                                                $relatedProducts = \App\Models\Product::whereIn('id', $relatedProductIds)->get();
                                            @endphp
                                            @foreach ($relatedProducts as $related)
                                                @php
                                                    $detailsPro = \App\Models\ProductDetails::where('id', $related->id)->first();
                                                @endphp
                                                <div class="col-4 mt-3">
                                                    <div class="row control_product">
                                                        <div href="/chi-tiet-san-pham/{{ $related->id }}" class="control_product_link d-flex justify-content-between" id="control_link-1">
                                                            <div class="col-3 control_product_img">
                                                                <img src="{{ $related->thumbnail }}" alt="">
                                                            </div>
                                                            <div class="col-5 control-info ms-2">

                                                                <div class="over_info1 card-title-black fs-5">
                                                                    {{ $related->name }} - {{ $related->code }}
                                                                </div>
                                                                <div class="over_info1">
                                                                    {{ number_format($detailsPro->price ?? 0, 2, ',', '.') }}
                                                                </div>
                                                                <a href="/chi-tiet-san-pham/{{ $related->id }}"
                                                                    class="over_info1">Xem chi tiết</a>
                                                            </div>
                                                            <div class="col-2 btn test_btn-remove-{{ $related->id }}"href="#" data-bs-toggle="modal" data-bs-target="#xoaSanPham{{ $related->id }}" >
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="col-12 mt-3">
                                            <button type="button" class="btn btn-danger d-block" data-bs-toggle="modal"
                                                data-bs-target="#add">+ Link sản phẩm liên quan</button>
                                        </div>

                                    </div>


                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="card_template-footer">
                                    <button type="button" class="btn btn-danger ps-5 pe-5 me-3 editRowBtn">Sửa</button>
                                    <a href="/danh-sach-san-pham" class="btn btn-outline-danger ps-5 pe-5 me-3"
                                        role="button">Hủy</a>
                                    <button type="submit" class="btn btn-danger ps-5 pe-5">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('template.footer.footer')
        </div>
    </div>
    @include('template.sidebar.sidebarDeXuat.sidebarRight')
    @if (isset($relatedProducts))
        @foreach ($relatedProducts as $related)
            {{-- delete --}}
            <div class="modal fade" id="xoaSanPham{{ $related->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <form method="POST" action="{{ route('product.deleted', ['id' => $related->id]) }}">
                        @csrf
                        <input type="hidden" name="detail_id" value="{{ $details->id }}">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h5 class="modal-title w-100" id="exampleModalLabel">
                                    XOÁ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="fs-5">Bạn có thực sự muốn xoá sản phẩm liên quan
                                    này không?</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger"
                                    data-bs-dismiss="modal">Hủy</button>
                                <button type="submit" class="btn btn-danger" id="deleteRowElement">Có, tôi muốn
                                    xóa</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    @endif

    {{-- Modal thêm sản phẩm liên quan --}}
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Link sản phẩm liên quan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('product.related', ['id' => $product->id]) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 d-flex align-items-center pb-3 mt-2">
                                <div class="d-flex align-items-center">
                                    <div class="card-title">Chọn sản phẩm liên quan</div>
                                </div>

                                <div class="col-sm-7" style="padding-left: 10px">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Sản phẩm">
                                        <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                            data-live-search="true" title="Chọn sản phẩm ..."
                                            data-select-all-text="Chọn tất cả" data-deselect-all-text="Bỏ chọn"
                                            data-size="3" name="related[]" data-live-search-placeholder="Tìm kiếm..."
                                            multiple>

                                            @forelse ($other_product as $op)
                                                <option value="{{ $op->id }}"
                                                    @if (!empty($details->related) && in_array($op->id, json_decode($details->related, true))) selected @endif>{{ $op->name }}
                                                    -
                                                    {{ $op->code }}</option>
                                            @empty
                                                <option value="" selected disabled>Chưa có sản phẩm nào để chọn
                                                </option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger me-3" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Lưu</button>
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
        $(document).ready(function() {
            $('#fileInput').on('change', function(e) {
                $('#preview').empty();
                $('#attachments').empty();

                var files = e.target.files;

                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var reader = new FileReader();

                    if (file.type.startsWith('image/')) {
                        reader.onload = (function(file) {
                            return function(e) {
                                var img = document.createElement('img');
                                img.src = e.target.result;
                                $('#preview').append(img);
                            };
                        })(file);

                        if (file) {
                            reader.readAsDataURL(file);
                        }
                    } else {
                        var li = document.createElement('li');
                        li.innerHTML = `
                            <span class="fs-5">
                                <i class="bi bi-link-45deg"></i> ${file.name}
                            </span>
                            <span class="modal_upload-remote" onclick="removeFileFromFileList(this)">
                                <img style="width:18px;height:18px" src="{{ asset('assets/img/trash.svg') }}" />
                            </span>
                        `;
                        $('#attachments').append(li);
                    }
                }
            });
        });

        function removeFileFromFileList(deleteButton) {
            var liEl = deleteButton.parentNode;
            var fileList = document.querySelectorAll('.file-list li');
            var index = Array.prototype.indexOf.call(fileList, liEl);

            if (index >= 0) {
                liEl.remove();
            }
        }
    </script>


    <script>
        $(document).on('click', '.editRowBtn', function() {
            var fileInputDiv = $('#fileInput');
            var caroselDiv = $('#caroselImg');

            if (fileInputDiv.hasClass('d-none')) {
                fileInputDiv.removeClass('d-none').addClass('d-block');
            }
            
            if (caroselDiv.hasClass('d-block')) {
                caroselDiv.removeClass('d-block').addClass('d-none');
            }

            // Get the parent tr element
            var mainWrap = $('#mainWrap');

            // Remove the "pointer-events: none;" style from all input fields
            mainWrap.find('input, textarea').removeAttr('style');

            // Set focus on the first input or textarea field
            mainWrap.find('textarea:first').focus();
            $('#headingDetail').text("Sửa thông tin sản phẩm");
            $(this).hide();
        });
    </script>

    <script>
        document.getElementById('showPriceButton').addEventListener('click', function() {
            document.getElementById('showPriceButton').style.display = 'none';
            document.getElementById('priceSection').style.display = 'block';
        });
    </script>


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
// Hàm thêm phần tử
function addNewElement(index) {
    var newDivElement = document.createElement("div");
    newDivElement.className = `col-md-4 mb-3 d-flex align-items-center item-${index + 1}`;
    newDivElement.innerHTML = `
        <div class="countData card_template-sub with_input d-flex justify-content-center align-items-center" style="width:45%">
            <textarea rows="1" type="text" placeholder="Độ dài" class="card-title-black form-control textareaResize" name="listProducts[${index}][key]"></textarea>
        </div>
        <div class="countData card_template-sub with_input d-flex justify-content-center align-items-center" style="width:45%">
            <textarea rows="1" type="text" placeholder="Catalogue mô tả" class="form-control textareaResize" name="listProducts[${index}][value]"></textarea>
        </div>
        <div class="col-2 mb-3" style="width:10%">
            <img data-repeater-delete role="button" src="{{ asset('/assets/img/trash.svg') }}" width="20px" height="20px" />
        </div>
    `;

    var colMd4Elements = document.querySelectorAll(".item-" + index);
    var lastColMd4Element = colMd4Elements[colMd4Elements.length - 1];

    lastColMd4Element.parentNode.insertBefore(newDivElement, lastColMd4Element.nextSibling);

    // Gắn sự kiện xóa vào nút delete trong phần tử mới
    var deleteButton = newDivElement.querySelector('[data-repeater-delete]');
    deleteButton.addEventListener('click', function(event) {
        deleteElement(newDivElement);
    });
}

// Hàm xóa phần tử
function deleteElement(element) {
    var index = element.classList[2].split('-')[1]; // Lấy index từ class
    var itemElement = document.querySelector(`.item-${index}`);
    if (itemElement) {
        itemElement.remove();
    }
    element.remove();
}

// Sự kiện thêm
var plusButton = document.querySelector(".bi-plus-circle");
plusButton.addEventListener("click", function() {
    var count = document.querySelectorAll('.countData').length / 2;
    addNewElement(count);
});

// Sự kiện xóa
document.addEventListener('click', function(event) {
    if (event.target && event.target.getAttribute('data-repeater-delete')) {
        var col2Element = event.target.closest('.col-2');
        var colMd4Element = col2Element.closest('.col-md-4');
        deleteElement(colMd4Element);
    }
});



    </script>




    {{-- <script>
        updateList = function(e) {
            const input = e.target;
            const outPut = input.parentNode.parentNode.parentNode.parentNode.parentNode.querySelector(
                '.modal_upload-list');
            const notSupport = outPut.parentNode.querySelector('.alertNotSupport');

            let children = '';
            console.log(children);
            const allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
            const maxFileSize = 10485760; 

            for (let i = 0; i < input.files.length; ++i) {
                const file = input.files.item(i);
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
        function removeFileFromFileList(event, index) {
            const deleteButton = event.target;
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
                    dt.items.add(file)
            }

            inputEl.files = dt.files 
            liEl.remove();
        }

        function removeUploaded(event) {
            const deleteButton = event.target;
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
    </script> --}}
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
