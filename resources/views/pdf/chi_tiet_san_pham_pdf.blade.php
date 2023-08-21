{{-- @extends('template.master')
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
@section('content') --}}

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
                                    {{-- <div class="img-logo">
                                        <img class="img-header " src="{{ asset('/assets/img/logo.jpg') }}" />
                                    </div> --}}
                                </div>
                            </div>

                            <div>
                                <div class="container mb-4">
                                    <div class="row g-2">
                                        <div class="col-lg-7 text-center" id="slider-show">
                                            <div class="container">
                                                <div class="row g-4">
                                                    <div class="col-lg-2">
                                                        <div class="slider-nav"
                                                            style="display: grid; grid-template-columns: auto">
                                                            <div class="border border-2 secondary mb-3 ">
                                                                <img class="demo cursor h-100 w-100 "
                                                                src="{{ $product->thumbnail }}"
                                                                    style="width:100%" onclick="currentSlide(1)"
                                                                    alt="The Woods">
                                                            </div>

                                                            <?php $im=2; ?>
                                                            @if (!empty(json_decode($details->images)))
                                                            @foreach (json_decode($details->images) as $key => $img)
                                                            <div class="border border-2 secondary mb-3 ">
                                                                <img class="demo cursor h-100 w-100 border border-1"
                                                                        src="{{ $img }}"
                                                                    style="width:100%" onclick="currentSlide({{$im++}})"
                                                                    alt="Mountains and fjords">
                                                            </div>
                                                        @endforeach
                                                        @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div>
                                                            <div class="mySlides">
                                                                <img   src="{{ $product->thumbnail }}"
                                                                    class="w-100" style="object-fit: contain;height: 100%">
                                                            </div>
                                                           @if (!empty(json_decode($details->images)))
                                                           @foreach (json_decode($details->images) as $key => $img)
                                                           <div class="mySlides">
                                                               <img  src="{{ $img }}"
                                                                   class="w-100" style="object-fit: contain;height: 100%">
                                                           </div>
                                                           @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="d-flex justify-content-between mb-3">
                                                <span>
                                                    <p class="m-0 fs-4 fw-bold">Giá bán</p>
                                                    <p class="m-0 fs-5 fw-bold text-color_pimary">$ {{ $details->price }}</p>
                                                </span>
                                                <div class="col-4 d-flex align-items-center justify-content-end"
                                                style="height: 70px;">
                                                {!! QrCode::generate(route('product.show', $product->id)) !!}
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
                                                <div class="row ">
                                                    @if (!empty(json_decode($details->attachments)))
                                                    @foreach (json_decode($details->attachments) as $key => $file)
                                                    {{-- <div class="col-lg-4 mb-3">
                                                        <a href="#"
                                                            class="text-color_pimary d-flex align-items-center">
                                                            <img src="{{ asset('assets/img/icon-pdf.png') }}"
                                                                class="img img-thumbnail"
                                                                style="width:30%; border:none" />
                                                            <span class="fw-bold fs-6">{{ $file }}</span>
                                                        </a>
                                                    </div> --}}
                                                    @endforeach
                                                    @endif
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
                                        <h2 class="text-color_pimary my-4">Thông số kỹ thuật</h2>
                                        <div class="row">
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
                                                            style="background: #D9D9D9">KÍCH THƯỚC</th>
                                                    </tr>
                                                    @if (!empty($details->data))
                                                     @foreach ($combinedData as $data  )
                                                     @if ($data->key1 =='Kích thước')
                                                        <tr style="height: 40px;">
                                                            <td class="ps-5">{{ $data->key2}}
                                                            </td>
                                                            <td class="text-center">{{ $data->key3}}</td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                    @endif
                                                    <tr style="height: 40px;">
                                                        <th colspan="2" class="ps-5 text-color_pimary fw-bold"
                                                            style="background: #D9D9D9">KHỐI LƯƠNG</th>
                                                    </tr>
                                                    @if (!empty($details->data))
                                                    @foreach ($combinedData as $data  )
                                                    @if ($data->key1 =='Khối lượng')
                                                       <tr style="height: 40px;">
                                                           <td class="ps-5">{{ $data->key2}}
                                                           </td>
                                                           <td class="text-center">{{ $data->key3}}</td>
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
                                                    @foreach ($combinedData as $data  )
                                                    @if ($data->key1 =='Hiệu năng')
                                                       <tr style="height: 40px;">
                                                           <td class="ps-5">{{ $data->key2}}
                                                           </td>
                                                           <td class="text-center">{{ $data->key3}}</td>
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
                                        {{-- Sản phẩm liên quan --}}
                                        <div class="col-md-12 mb-3">
                                            <div class="card-title fs-4">4. Sản phẩm liên quan</div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                        <div class="col-12 mt-3">
                                            <button type="button" class="btn btn-danger d-block" data-bs-toggle="modal"
                                                data-bs-target="#add">+ Link sản phẩm liên quan</button>
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
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        {{-- <button class="btn btn-danger me-md-2 px-5" type="button">In</button> --}}
                        {{-- <a class="btn btn-danger me-md-2 px-5" href="{{ route('product.export') }}">Tải file PDF</a> --}}
                        <a class="btn btn-danger me-md-2 px-5" href="{{ route('product.export', $details->product_id) }}">Tải file PDF</a>
                        <button class="btn btn-outline-danger me-md-2" type="button">Về danh sách</button>
                        <button class="btn btn-danger  px-5" type="button" data-bs-toggle="modal"
                            data-bs-target="#addDetailProduct">Thêm chi tiết</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
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

        .text-secondary:hover {
            color: var(--primary-color) !important;
        }
    </style>
{{-- @endsection --}}
