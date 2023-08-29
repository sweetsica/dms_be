@extends('template.master')
@section('title', 'Chi Tiết sản phẩm')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css.map">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            display: none;
            /* Ẩn input thực tế */
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

        .box-color_1,
        .box-color_2,
        .box-color_3,
        .box-color_4 {
            width: 18px;
            height: 18px;
        }

        .box-color_1 {
            background: #61D1D8
        }

        .box-color_2 {
            background: #ffff
        }

        .box-color_3 {
            background: #D02F2F
        }

        .box-color_4 {
            background: #61D620
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

        .img-slider {
            width: 100%;
            object-fit: cover;
            height: 100%;
        }

        .img-slider_nav {
            width: 100%;
            height: 100%;
            object-fit: cover;
            margin-right: 10px;
            padding: 8%;
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

        .text-secondary:hover {
            color: var(--primary-color) !important;
        }

        .file-name {
            color: var(--primary-color);
            font-size: 1.2rem;
            padding: 0 10px;
            font-weight: 700;
        }
    </style>
@endsection
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection" style="height: 120rem">
            <div class="main">
                <div class="container">
                    <div class="card mb-3">
                        <div class="card-body card-warpper">
                            <div class="warrper-header mb-5">
                                <div
                                    class="action_wrapper-search d-flex flex-wrap justify-content-between align-items-center mb-3">
                                    <div class="title-hearder text-center">
                                        <div class="fw-bold text-title_header">THÔNG SỐ SẢN PHẨM</div>
                                        <div class="fw-bold text-title_header text-uppercase"> {{ $product->name }} -
                                            <span class="text-color_pimary text-uppercase">{{ $product->code }}</span>
                                        </div>
                                    </div>
                                    <div class="img-logo">
                                        <img class="img-header" src="{{ asset('/assets/img/logo.jpg') }}" />
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="container mb-4">
                                    <div class="row g-2">
                                        <div class="col-lg-6 text-center" id="slider-show">
                                            <div class="container">
                                                <div class="row g-4">
                                                    <div class="col-lg-12">
                                                        <div class="slider slider-single">
                                                            <div>
                                                                <img class="img-slider" src="{{ $product->thumbnail }}"
                                                                    alt="Slider Show" />
                                                            </div>

                                                            @if (!empty(json_decode($details->images)))
                                                                @foreach (json_decode($details->images) as $key => $img)
                                                                    <div>
                                                                        <img class="img-slider" src="{{ $img }}"
                                                                            alt="Slider Show" />
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="slider slider-nav ">
                                                            <div class="mb-3">
                                                                <img src="{{ $product->thumbnail }}" class="img-slider_nav"
                                                                    alt="Slider Nav" />
                                                            </div>

                                                            @if (!empty(json_decode($details->images)))
                                                                @foreach (json_decode($details->images) as $key => $img)
                                                                    <div class="mb-3">
                                                                        <img src="{{ $img }}"
                                                                            class="img-slider_nav" alt="Slider Nav" />
                                                                    </div>
                                                                @endforeach
                                                            @endif


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-between mb-3">
                                                <span>
                                                    <p class="m-0 fs-4 fw-bold">Giá bán</p>
                                                    <p class="m-0 fs-5 fw-bold text-color_pimary">$ {{ $details->price }}
                                                    </p>
                                                </span>
                                                <div class="col-4 d-flex align-items-center justify-content-end"
                                                    style="height: 70px;">
                                                    {!! QrCode::generate(route('product.show', $product->id)) !!}
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <p class="m-0 fs-4 fw-bold">Mô tả</p>
                                                <div class="descrption-content">
                                                    <p class="fs-5 text-justify">
                                                        {{ $details->description }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <p class="m-0 fs-3 fw-bold mb-3">Phiên bản màu</p>
                                                <div class="d-flex">
                                                    <div class="rounded-circle border border-secondary mx-3 box-color_1">
                                                    </div>
                                                    <div class="rounded-circle border border-secondary mx-3 box-color_2">
                                                    </div>
                                                    <div class="rounded-circle border border-secondary mx-3 box-color_3">
                                                    </div>
                                                    <div class="rounded-circle border border-secondary mx-3 box-color_4">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-2">
                                                <div class="row ">
                                                    @if (!empty(json_decode($details->attachments)))
                                                        @foreach (json_decode($details->attachments) as $key => $file)
                                                            <div class="col-lg-6 mb-3">
                                                                <a href="{{ $file }}"
                                                                    class="text-color_pimary d-flex align-items-center">
                                                                    <img src="{{ asset('assets/img/icon-pdf.png') }}"
                                                                        class="img img-thumbnail"
                                                                        style="width:20%; border:none" />
                                                                    <span
                                                                        class="fw-bold fs-6 text-truncate">{{ $file }}</span>
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    {{-- Thông số kỹ thuật --}}
                                    <div class="mb-4">
                                        <h2 class="text-color_pimary my-4">Thông số kỹ thuật</h2>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <table class="table table-bordered border border-1 text-center"
                                                    id="table_add">
                                                    <tr style="height: 40px;">
                                                        <th class="text-content text-center" style="background: #DBFDFF91">
                                                            Tên thông số
                                                        </th>
                                                        <th class="text-content text-center" style="background: #DBFDFF91">
                                                            Thông số
                                                        </th>
                                                    </tr>

                                                    <tr style="height: 40px;">
                                                        <th colspan="2" class="ps-5 text-color_pimary fw-bold"
                                                            style="background: #D9D9D9">KÍCH THƯỚC</th>
                                                    </tr>
                                                    @if (!empty($details->data))
                                                        @foreach ($combinedData as $data)
                                                            @if ($data->key1 == 'Kích thước')
                                                                <tr style="height: 40px;">
                                                                    <td class="ps-5">{{ $data->key2 }}
                                                                    </td>
                                                                    <td class="text-center">{{ $data->key3 }}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    <tr style="height: 40px;">
                                                        <th colspan="2" class="ps-5 text-color_pimary fw-bold"
                                                            style="background: #D9D9D9">KHỐI LƯƠNG</th>
                                                    </tr>
                                                    @if (!empty($details->data))
                                                        @foreach ($combinedData as $data)
                                                            @if ($data->key1 == 'Khối lượng')
                                                                <tr style="height: 40px;">
                                                                    <td class="ps-5">{{ $data->key2 }}
                                                                    </td>
                                                                    <td class="text-center">{{ $data->key3 }}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </table>
                                            </div>
                                            <div class="col-lg-6">
                                                <table class="table table-bordered border border-1 text-center"
                                                    id="table_add">
                                                    <tr style="height: 40px;">
                                                        <th class="text-content text-center"
                                                            style="background: #DBFDFF91">
                                                            Tên thông số
                                                        </th>
                                                        <th class="text-content text-center"
                                                            style="background: #DBFDFF91">
                                                            Thông số
                                                        </th>
                                                    </tr>
                                                    <tr style="height: 40px;">
                                                        <th colspan="2" class="ps-5 text-color_pimary fw-bold"
                                                            style="background: #D9D9D9">HIỆU NĂNG</th>
                                                    </tr>
                                                    @if (!empty($details->data))
                                                        @foreach ($combinedData as $data)
                                                            @if ($data->key1 == 'Hiệu năng')
                                                                <tr style="height: 40px;">
                                                                    <td class="ps-5">{{ $data->key2 }}
                                                                    </td>
                                                                    <td class="text-center">{{ $data->key3 }}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Sản phẩm liên quan --}}
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="card-title fs-4">4. Sản phẩm liên quan</div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <div class="col-12 mt-3">
                                                <button type="button" class="btn btn-danger d-block"
                                                    data-bs-toggle="modal" data-bs-target="#add">+ Link sản phẩm liên
                                                    quan</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        {{-- <h2 class="text-color_pimary my-4">Sản phẩm liên quan</h2> --}}
                                        <div class="row">
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
                                                            <div href="/chi-tiet-san-pham/{{ $related->id }}"
                                                                class="control_product_link d-flex justify-content-between"
                                                                id="control_link-1">
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
                                                                <div class="col-2 btn test_btn-remove-{{ $related->id }}"href="#"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#xoaSanPham{{ $related->id }}">
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-danger me-md-2 px-5" type="button" data-bs-toggle="modal"
                            data-bs-target="#product{{ $product->id }}">Xem trước</button>
                        <a class="btn btn-outline-danger me-md-2" href="/danh-sach-san-pham" type="button">Về danh
                            sách</a>
                        <button class="btn btn-danger  px-5" type="button" data-bs-toggle="modal"
                            data-bs-target="#addDetailProduct">Thêm - sửa chi tiết</button>
                    </div>
                </div>

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
                                            <button type="submit" class="btn btn-danger" id="deleteRowElement">Có, tôi
                                                muốn
                                                xóa</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif


                {{-- Modal thêm chi tiết sản phẩm --}}
                <div class="modal fade" id="addDetailProduct" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h5 class="modal-title w-100" id="exampleModalLabel">Thêm chi tiết sản phẩm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form id="addForm" method="POST"
                                action="{{ route('product.create', ['id' => $product->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        {{-- Giá bán --}}
                                        <div class="col-md-12 mb-3">
                                            <div class="card-title fs-4">1. Giá bán</div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <input type="number" name="price" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Nhập giá tiền" placeholder="Nhập giá tiền"
                                                class="form-control" value="{{ $details->price }}">
                                        </div>

                                        {{-- Mô tả --}}
                                        <div class="col-md-12 mb-3">
                                            <div class="card-title fs-4">2. Mô tả</div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <textarea type="text" name="description" data-bs-toggle="tooltip" data-bs-placement="top" title="Mô tả"
                                                placeholder="Nhập mô tả" class="form-control">{{ $details->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-3" id="specifications">
                                        {{-- Thông số kỹ thuật --}}
                                        <div class="col-md-12 mb-3">
                                            <div class="card-title fs-4">3. Thông số kỹ thuật</div>
                                        </div>
                                        @if (!empty($details->data))
                                            @foreach ($combinedData as $data)
                                                <div class="col-md-4 mb-3">
                                                    <select name="data[0][key1]" class="selectpicker"
                                                        data-dropup-auto="false" data-width="100%" data-size="3">
                                                        <option>{{ $data->key1 }}</option>
                                                        @foreach ($TechnicalSpecificationsGroupList as $item)
                                                            <option value="{{ $item->name }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-4 mb-3">
                                                    <select name="data[0][key2]" class="selectpicker"
                                                        data-dropup-auto="false" data-width="100%" data-size="3">
                                                        <option>{{ $data->key2 }}</option>
                                                        @foreach ($SpecificationsList as $item)
                                                            <option value="{{ $item->name }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <div class="d-flex align-items-center">
                                                        <input type="text" name="data[0][key3]"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Thông số" placeholder="Thông số" class="form-control"
                                                            value="{{ $data->key3 }}">
                                                        <i class="bi bi-plus fs-4 ms-2 add-spec"
                                                            style="cursor: pointer; color: var(--primary-color)"></i>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="col-md-4 mb-3">
                                                <select name="data[0][key1]" class="selectpicker"
                                                    data-dropup-auto="false" data-width="100%" data-size="3"
                                                    title="Chọn nhóm thông số kỹ thuật">
                                                    @foreach ($TechnicalSpecificationsGroupList as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <select name="data[0][key2]" class="selectpicker"
                                                    data-dropup-auto="false" data-width="100%" data-size="3"
                                                    title="Chọn thông số kỹ thuật">
                                                    @foreach ($SpecificationsList as $item)
                                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div class="d-flex align-items-center">

                                                    <input type="text" name="data[0][key3]" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Thông số" placeholder="Thông số"
                                                        class="form-control">
                                                    <i class="bi bi-plus fs-4 ms-2 add-spec"
                                                        style="cursor: pointer; color: var(--primary-color)"></i>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="row">
                                        {{-- Hình ảnh --}}
                                        <div class="col-md-12 mb-3">
                                            <div class="card-title fs-4">5. Hình ảnh</div>
                                        </div>

                                        <div class="col-12 col-md-12">
                                            <div class="upload_wrapper-items">
                                                <div class="alert alert-danger alertNotSupport" role="alert"
                                                    style="display:none">
                                                    File bạn tải lên hiện tại không hỗ trợ !
                                                </div>
                                                <div class="modal_upload-wrapper">
                                                    <label class="modal_upload-label" for="file">
                                                        Tải ảnh sản phẩm tại đây</label>
                                                    <div class="mt-2 text-secondary fst-italic">Hỗ trợ định
                                                        dạng
                                                        JPG hoặc
                                                        PNG kích
                                                        thước tệp không quá 10MB
                                                    </div>
                                                    <div
                                                        class="modal_upload-action mt-3 d-flex align-items-center justify-content-center">
                                                        <div class="modal_upload-addFile me-3">
                                                            <label for="fileInput" id="fileButton"
                                                                class="btn position-relative border d-flex w-500">
                                                                <img src="{{ asset('assets/img/upload-file.svg') }}" />
                                                                <span class="ps-2">Đính kèm ảnh sản phẩm</span>
                                                            </label>
                                                            <input accept="image/jpeg,image/png" id="fileInput" multiple
                                                                role="button" type="file"
                                                                class="modal_upload-input modal_upload-file"
                                                                name="files[]" onchange="updateList(event)" />
                                                        </div>
                                                    </div>
                                                    @if (!empty(json_decode($details->images)))
                                                        <div class="d-flex mt-3">
                                                            @foreach (json_decode($details->images) as $key => $img)
                                                                <img class="d-flex mt-3" src="{{ $img }}"
                                                                    style="width:25%; display: flex"
                                                                    alt="Mountains and fjords"> &nbsp;&nbsp;&nbsp;
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    <div id="preview" class="d-flex mt-3"></div>
                                                    {{-- <ul id="attachments" class="file-list" style="padding: 0 0 4px 0; word-break: break-all;"></ul> --}}
                                                </div>
                                                <ul class="modal_upload-list"
                                                    style="max-height: 134px; overflow-y: scroll; overflow-x: hidden;">
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12">
                                            <div class="input-group align-items-center">
                                                {{-- <input type="file" class="form-control" id="attachment"
                                                    name="attachments[]" style="display: none"> --}}

                                                <i class="bi bi-link-45deg fs-3 fw-bold"
                                                    style="color: var(--primary-color)"></i>
                                                <label class="input-label fs-4 fw-bold ms-2" for="attachment"
                                                    style="cursor: pointer;color: var(--primary-color)">Đính kèm
                                                    file</label>
                                                <input accept=".pdf,.xlsx,.docx" id="attachment" multiple role="button"
                                                    type="file" class="modal_upload-input modal_upload-file"
                                                    name="attachments[]" onchange="updateAttachments(event)" />
                                            </div>
                                            @if (!empty(json_decode($details->attachments)))
                                                @foreach (json_decode($details->attachments) as $key => $file)
                                                    <div class="col-lg-4 mb-3">
                                                        <a href="#"
                                                            class="text-color_pimary d-flex align-items-center">
                                                            <img src="{{ asset('assets/img/icon-pdf.png') }}"
                                                                class="img img-thumbnail"
                                                                style="width:30%; border:none" />
                                                            <span class="fw-bold fs-6">{{ $file }}</span>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div id="previewAttachments" class="row"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger me-3"
                                        data-bs-dismiss="modal">Hủy</button>
                                    <button type="submit" class="btn btn-danger">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            @include('template.footer.footer')
        </div>
    </div>
    @include('template.sidebar.sidebarMaster.sidebarRight')

    {{-- Modal Print --}}
    <div class="modal fade" id="product{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl-centered" role="document" style="max-width: 24cm">
            <div class="modal-content" id="modal-content{{ $product->id }}">
                <div class="modal-body">
                    <div class="card_template-body-top" style="margin-bottom: 2rem">
                        <div class='row my-2'>
                            <div class="col-4">
                                <a class="mb-2 w-70">
                                    <img class="header_logo" src="{{ asset('/assets/img/logo.jpg') }}" />
                                </a>
                            </div>
                            <div class="col-4">
                                <div
                                    style="
                                    font-size: 2rem;
                                    text-align: center">
                                    <div class="fw-bold ">THÔNG SỐ SẢN PHẨM</div>
                                    <div class="fw-bold  text-uppercase">
                                        {{ $product->name }} -
                                        <span class="text-uppercase"
                                            style="color: var(--primary-color)">{{ $product->code }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card_template-body-middle1">
                        <div class="row">
                            <div class="col-7 text-center">
                                <div class="container">
                                    <div class="row g-4">
                                        <div class="col-lg-12">
                                            <div class="slider slider-single">
                                                <div>
                                                    <img class="img-slider" src="{{ $product->thumbnail }}"
                                                        alt="Slider Show" />
                                                </div>

                                                @if (!empty(json_decode($details->images)))
                                                    @foreach (json_decode($details->images) as $key => $img)
                                                        <div>
                                                            <img class="img-slider" src="{{ $img }}"
                                                                alt="Slider Show" />
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="slider slider-nav ">
                                                <div class="mb-3">
                                                    <img src="{{ $product->thumbnail }}" class="img-slider_nav"
                                                        alt="Slider Nav" />
                                                </div>

                                                @if (!empty(json_decode($details->images)))
                                                    @foreach (json_decode($details->images) as $key => $img)
                                                        <div class="mb-3">
                                                            <img src="{{ $img }}" class="img-slider_nav"
                                                                alt="Slider Nav" />
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-5">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                                    <span>
                                        <p class="m-0 fs-4 fw-bold">Giá bán</p>
                                        <p class="m-0 fs-4 fw-bold" style="color: var(--primary-color)">
                                            $
                                            {{ $details->price }}
                                        </p>
                                    </span>
                                    <div class="col-4" style="height: 50px;">
                                        {!! QrCode::size(50)->generate(route('product.show', $product->id)) !!}
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <p class="m-0 fs-4 fw-bold">Mô tả</p>
                                    <div class="descrption-content">
                                        <p class="fs-5 text-justify">
                                            {{ $details->description }}
                                        </p>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <p class="m-0 fs-3 fw-bold mb-3">Phiên bản màu</p>
                                    <div class="d-flex">
                                        <div class="rounded-circle border border-secondary mx-3"
                                            style="width: 18px; height: 18px; overflow: hidden;">
                                            <img style="width: 100%; height: 150%;"
                                                src="{{ asset('assets/img/blue.jpg') }}" />
                                        </div>
                                        <div class="rounded-circle border border-secondary mx-3"
                                            style="width: 18px; height: 18px; overflow: hidden;">
                                        </div>
                                        <div class="rounded-circle border border-secondary mx-3"
                                            style="width: 18px; height: 18px; overflow: hidden;">
                                            <img style="width: 100%; height: 150%;"
                                                src="{{ asset('assets/img/red.jpg') }}" />
                                        </div>
                                        <div class="rounded-circle border border-secondary mx-3"
                                            style="width: 18px; height: 18px; overflow: hidden;">
                                            <img style="width: 100%; height: 150%;"
                                                src="{{ asset('assets/img/green.png') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card_template-body-middle1">
                        {{-- Thông số kỹ thuật --}}
                        <div class="mb-4">
                            <h2 class="my-4" style="color: var(--primary-color)">Thông số kỹ thuật</h2>
                            <div class="row">
                                <div class="col-6">
                                    <table class="table table-bordered border border-1 text-center" id="table_add">
                                        <tr style="height: 40px;">
                                            <th class="text-content text-center" style="background: #DBFDFF91">
                                                Tên thông số
                                            </th>
                                            <th class="text-content text-center" style="background: #DBFDFF91">
                                                Thông số
                                            </th>
                                        </tr>

                                        <tr style="height: 40px;">
                                            <th colspan="2" class="ps-5 text-color_pimary fw-bold"
                                                style="background: #D9D9D9">KÍCH THƯỚC</th>
                                        </tr>
                                        @if (!empty($details->data))
                                            @foreach ($combinedData as $data)
                                                @if ($data->key1 == 'Kích thước')
                                                    <tr style="height: 40px;">
                                                        <td class="ps-5">{{ $data->key2 }}
                                                        </td>
                                                        <td class="text-center">{{ $data->key3 }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                        <tr style="height: 40px;">
                                            <th colspan="2" class="ps-5 text-color_pimary fw-bold"
                                                style="background: #D9D9D9">KHỐI LƯƠNG</th>
                                        </tr>
                                        @if (!empty($details->data))
                                            @foreach ($combinedData as $data)
                                                @if ($data->key1 == 'Khối lượng')
                                                    <tr style="height: 40px;">
                                                        <td class="ps-5">{{ $data->key2 }}
                                                        </td>
                                                        <td class="text-center">{{ $data->key3 }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </table>
                                </div>
                                <div class="col-6">
                                    <table class="table table-bordered border border-1 text-center" id="table_add">
                                        <tr style="height: 40px;">
                                            <th class="text-content text-center" style="background: #DBFDFF91">
                                                Tên thông số
                                            </th>
                                            <th class="text-content text-center" style="background: #DBFDFF91">
                                                Thông số
                                            </th>
                                        </tr>
                                        <tr style="height: 40px;">
                                            <th colspan="2" class="ps-5 text-color_pimary fw-bold"
                                                style="background: #D9D9D9">HIỆU NĂNG</th>
                                        </tr>
                                        @if (!empty($details->data))
                                            @foreach ($combinedData as $data)
                                                @if ($data->key1 == 'Hiệu năng')
                                                    <tr style="height: 40px;">
                                                        <td class="ps-5">{{ $data->key2 }}
                                                        </td>
                                                        <td class="text-center">{{ $data->key3 }}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card_template-body-middle1">
                        {{-- Sản phẩm liên quan --}}
                        <div class="col-12 mb-3">
                            <h2 style="color: var(--primary-color)">Sản phẩm liên quan</h2>
                        </div>
                        <div class="mb-4">
                            <div class="row g-4">
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
                                            <div class="row g-0">
                                                <div href="/chi-tiet-san-pham/{{ $related->id }}"
                                                    class=" d-flex justify-content-between align-items-center border p-3"
                                                    id="control_link-1">
                                                    <div class="col-6 control_product_img">
                                                        <img src="{{ $related->thumbnail }}" alt="">
                                                    </div>
                                                    <div class="col-6 control-info ms-2">
                                                        <div class="over_info1 card-title-black fs-5">
                                                            {{ $related->name }} -
                                                            {{ $related->code }}
                                                        </div>
                                                        <div class="over_info1">
                                                            {{ number_format($detailsPro->price ?? 0, 2, ',', '.') }}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>



                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-danger btnPrint"
                            data-content="modal-content{{ $product->id }}">In</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                                    @if (!empty($details->related) && in_array($op->id, json_decode($details->related, true))) selected @endif>
                                                    {{ $op->name }}
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

    <script src="{{ asset('/assets/plugins/print.min.js') }}"></script>
    <script src="{{ asset('/assets/js/components/capturePDF.js') }}"></script>

    {{-- Slick --}}
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        $(".slider-single").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            useTransform: false,
            asNavFor: ".slider-nav",
        });
        $(".slider-nav").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: ".slider-single",
            dots: false,
            focusOnSelect: true,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev bg-transparent" style="position: absolute;left: -3%; top: 40%; z-index: 9;"><i class="bi bi-arrow-left-short fs-2 text-color_pimary"></i></button>',
            nextArrow: '<button type="button" class="slick-prev bg-transparent" style="position: absolute;right: -3%; top: 40%; z-index: 9;"><i class="bi bi-arrow-right-short fs-2 text-color_pimary"></i></button>'
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addSpecIcons = document.querySelectorAll(".add-spec");
            let specCount = 1;

            addSpecIcons.forEach(icon => {
                icon.addEventListener("click", function() {


                    const newSpecDiv = document.createElement("div");
                    newSpecDiv.classList.add("col-md-12", "mb-3");

                    newSpecDiv.innerHTML = `
            <div class="row g-2">
                    <div class="col-md-4 ">
                        <select name="data[${specCount}][key1]" class="selectpicker" data-dropup-auto="false"
                            data-width="100%" title="Nhập thông số" data-size="3">
                            @foreach ($TechnicalSpecificationsGroupList as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <select name="data[${specCount}][key2]" class="selectpicker" data-dropup-auto="false"
                            data-width="100%" title="Tên thông số" data-size="3" >
                            @foreach ($SpecificationsList as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <input type="text" name="data[${specCount}][key3]" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Thông số" placeholder="Thông số"
                                class="form-control">
                            <i class="bi bi-trash fs-4 ms-2 remove-spec"
                                style="cursor: pointer; color: var(--primary-color)"></i>
                        </div>
                    </div>
                </div>
            `;

                    document.getElementById("specifications").appendChild(newSpecDiv);

                    $('.selectpicker').selectpicker();

                    const removeSpecIcons = document.querySelectorAll(".remove-spec");

                    removeSpecIcons.forEach(removeIcon => {
                        removeIcon.addEventListener("click", function() {
                            newSpecDiv.remove();
                        });
                    });

                    specCount++;
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#fileInput').on('change', function(e) {
                $('#preview').empty();
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
                    }
                }
            });
        });

        function updateAttachments(event) {
            $('#previewAttachments').empty();
            var files = event.target.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var p = document.createElement('p');
                p.textContent = file.name;
                p.className = 'file-name';
                $('#previewAttachments').append(p);
            }
        }

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
        function removeFileFromFileList(deleteButton) {
            var liEl = deleteButton.parentNode;
            var fileList = document.querySelectorAll('.file-list li');
            var index = Array.prototype.indexOf.call(fileList, liEl);

            if (index >= 0) {
                liEl.remove();
            }
        }
    </script>

@endsection
