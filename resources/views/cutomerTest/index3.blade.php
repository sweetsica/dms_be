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
                                        <div class="fw-bold text-title_header"> SẢN PHẨM XE TANO -
                                            <span class="text-color_pimary">SP-TANO01</span>
                                        </div>
                                    </div>
                                    <div class="img-logo">
                                        <img class="img-header " src="{{ asset('/assets/img/logo.jpg') }}" />
                                    </div>
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
                                                                    src="{{ asset('assets/img/oto-1.png') }}"
                                                                    style="width:100%" onclick="currentSlide(1)"
                                                                    alt="The Woods">
                                                            </div>
                                                            <div class="border border-2 secondary mb-3 ">
                                                                <img class="demo cursor h-100 w-100 border border-1"
                                                                    src="{{ asset('assets/img/oto-2.png') }}"
                                                                    style="width:100%" onclick="currentSlide(2)"
                                                                    alt="Cinque Terre">
                                                            </div>

                                                            <div class="border border-2 secondary mb-3 ">
                                                                <img class="demo cursor h-100 w-100 border border-1"
                                                                    src="{{ asset('assets/img/oto-3.png') }}"
                                                                    style="width:100%" onclick="currentSlide(3)"
                                                                    alt="Mountains and fjords">
                                                            </div>

                                                            <div class="border border-2 secondary mb-3 ">
                                                                <img class="demo cursor h-100 w-100 border border-1"
                                                                    src="{{ asset('assets/img/oto-4.png') }}"
                                                                    style="width:100%" onclick="currentSlide(4)"
                                                                    alt="Mountains and fjords">
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <div>
                                                            <div class="mySlides">
                                                                <img src="{{ asset('assets/img/oto-1.png') }}"
                                                                    class="w-100" style="object-fit: contain;height: 100%">
                                                            </div>

                                                            <div class="mySlides">
                                                                <img src="{{ asset('assets/img/oto-2.png') }}"
                                                                    class="w-100" style="object-fit: contain;height: 100%">
                                                            </div>

                                                            <div class="mySlides">
                                                                <img src="{{ asset('assets/img/oto-3.png') }}"
                                                                    class="w-100" style="object-fit: contain;height: 100%">
                                                            </div>
                                                            <div class="mySlides">
                                                                <img src="{{ asset('assets/img/oto-4.png') }}"
                                                                    class="w-100" style="object-fit: contain;height: 100%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="d-flex justify-content-between mb-3">
                                                <span>
                                                    <p class="m-0 fs-4 fw-bold">Giá bán</p>
                                                    <p class="m-0 fs-5 fw-bold text-color_pimary">$ 500.00</p>
                                                </span>
                                                <span>
                                                    <img class="" src="{{ asset('/assets/img/Qr-code.png') }}"
                                                        style="width: 45px; height: 45px;" />
                                                </span>
                                            </div>

                                            <div class="mb-2">
                                                <p class="m-0 fs-4 fw-bold">Mô tả</p>
                                                <div class="descrption-content">
                                                    <p class="fs-5 text-justify">VF 5 Plus sở hữu thiết kế hiện đại, trẻ
                                                        trung, cá tính và nổi bật với các
                                                        lựa chọn phối màu theo cá tính và sở thích của mỗi khách hàng.

                                                    </p>
                                                </div>
                                            </div>

                                            <div class="mb-2">
                                                <div class="row ">
                                                    <div class="col-lg-4 mb-3">
                                                        <a href="#"
                                                            class="text-color_pimary d-flex align-items-center">
                                                            <img src="{{ asset('assets/img/icon-pdf.png') }}"
                                                                class="img img-thumbnail"
                                                                style="width:30%; border:none" />
                                                            <span class="fw-bold fs-6">BaoGia.pdf</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-4 mb-3">
                                                        <a href="#"
                                                            class="text-color_pimary d-flex align-items-center">
                                                            <img src="{{ asset('assets/img/icon-pdf.png') }}"
                                                                class="img img-thumbnail"
                                                                style="width:30%; border:none" />
                                                            <span class="fw-bold fs-6">ThietKe.pdf</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-4 mb-3">
                                                        <a href="#"
                                                            class="text-color_pimary d-flex align-items-center">
                                                            <img src="{{ asset('assets/img/icon-pdf.png') }}"
                                                                class="img img-thumbnail"
                                                                style="width:30%; border:none" />
                                                            <span class="fw-bold fs-6">ChaoHang.pdf</span>
                                                        </a>
                                                    </div>
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
                                                    {{-- Kích thước --}}
                                                    <tr style="height: 40px;">
                                                        <th colspan="2" class="ps-5 text-color_pimary fw-bold"
                                                            style="background: #D9D9D9">KÍCH THƯỚC</th>
                                                    </tr>
                                                    <tr style="height: 40px;">
                                                        <td class="ps-5">Kích thước (L*W*H) [mm]
                                                        </td>
                                                        <td class="text-center">3,400 * 1,594 * 1,560
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 40px;">
                                                        <td class="ps-5">Trọng lượng Không tải
                                                            [kg]
                                                        </td>
                                                        <td class="text-center">950</td>
                                                    </tr>
                                                    <tr style="height: 40px;">
                                                        <td class="ps-5">Tốc độ tối đa [km/h]
                                                        </td>
                                                        <td class="text-center">120</td>
                                                    </tr>

                                                    {{-- Khối lượng --}}
                                                    <tr style="height: 40px;">
                                                        <th colspan="2" class="ps-5 text-color_pimary fw-bold"
                                                            style="background: #D9D9D9">KHỐI LƯƠNG</th>
                                                    </tr>
                                                    <tr style="height: 40px;">
                                                        <td class="ps-5">Tự trọng (Kg)
                                                        </td>
                                                        <td class="text-center">1231
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 40px;">
                                                        <td class="ps-5">Tổng trọng (Kg)
                                                        </td>
                                                        <td class="text-center">1860</td>
                                                    </tr>
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
                                                    {{-- Kích thước --}}
                                                    <tr style="height: 40px;">
                                                        <th colspan="2" class="ps-5 text-color_pimary fw-bold"
                                                            style="background: #D9D9D9">HIỆU NĂNG</th>
                                                    </tr>
                                                    <tr style="height: 40px;">
                                                        <td class="ps-5">Kích thước tổng thể (D x R x C) (mm)
                                                        </td>
                                                        <td class="text-center">4490 x 1615 x 1900
                                                        </td>
                                                    </tr>
                                                    <tr style="height: 40px;">
                                                        <td class="ps-5">Kích thước thùng (D x R x C) (mm)
                                                        </td>
                                                        <td class="text-center">2680 x 1430 x 1320</td>
                                                    </tr>
                                                    <tr style="height: 40px;">
                                                        <td class="ps-5">Vệt bánh xe (trước/ sau) (mm)
                                                        </td>
                                                        <td class="text-center">1386/1408</td>
                                                    </tr>
                                                    <tr style="height: 40px;">
                                                        <td class="ps-5">Tự trọng (Kg)
                                                        </td>
                                                        <td class="text-center">1231</td>
                                                    </tr>
                                                    <tr style="height: 40px;">
                                                        <td class="ps-5">Tự trọng (Kg)
                                                        </td>
                                                        <td class="text-center">1231</td>
                                                    </tr>
                                                    <tr style="height: 40px;">
                                                        <td class="ps-5">Tổng trọng (Kg)
                                                        </td>
                                                        <td class="text-center">1860</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Sản phẩm liên quan --}}
                                    <div class="mb-4">
                                        <h2 class="text-color_pimary my-4">Sản phẩm liên quan</h2>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div
                                                    style="display:flex; align-items:center; justify-content: space-between">
                                                    <img class="w-100 h-auto" style="max-width: 140px;"
                                                        src="{{ asset('assets/img/oto-1.png') }}" />
                                                    <div>
                                                        <p class="m-0 fs-5 fw-bold">XE TANO-SP-TANO01
                                                        </p>
                                                        <p class="m-0 text-color_pimary fw-bold">$
                                                            500.00</p>
                                                        <a href="#" class="text-secondary">Xem chi tiết</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div
                                                    style="display:flex; align-items:center; justify-content: space-between">
                                                    <img class="w-100 h-auto" style="max-width: 140px;"
                                                        src="{{ asset('assets/img/oto-2.png') }}" />
                                                    <div>
                                                        <p class="m-0 fs-5 fw-bold">XE TANO-SP-TANO01
                                                        </p>
                                                        <p class="m-0 text-color_pimary fw-bold">$
                                                            500.00</p>
                                                        <a href="#" class="text-secondary">Xem chi tiết</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div
                                                    style="display:flex; align-items:center; justify-content: space-between">
                                                    <img class="w-100 h-auto" style="max-width: 140px;"
                                                        src="{{ asset('assets/img/oto-3.png') }}" />
                                                    <div>
                                                        <p class="m-0 fs-5 fw-bold">XE TANO-SP-TANO01
                                                        </p>
                                                        <p class="m-0 text-color_pimary fw-bold">$
                                                            500.00</p>
                                                        <a href="#" class="text-secondary">Xem chi tiết</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-danger me-md-2 px-5" type="button">In</button>
                        <button class="btn btn-outline-danger me-md-2" type="button">Về danh sách</button>
                        <button class="btn btn-danger  px-5" type="button" data-bs-toggle="modal"
                            data-bs-target="#addDetailProduct">Thêm chi tiết</button>
                    </div>
                </div>

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
                            <form id="addForm" method="POST" action="" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        {{-- Giá bán --}}
                                        <div class="col-md-12 mb-3">
                                            <div class="card-title fs-4">1. Giá bán</div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <input type="text" name="gia" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Nhập giá tiền" placeholder="Nhập giá tiền"
                                                class="form-control">
                                        </div>

                                        {{-- Mô tả --}}
                                        <div class="col-md-12 mb-3">
                                            <div class="card-title fs-4">2. Mô tả</div>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <textarea type="text" name="mota" data-bs-toggle="tooltip" data-bs-placement="top" title="Mô tả"
                                                placeholder="Nhập mô tả" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-3" id="specifications">
                                        {{-- Thông số kỹ thuật --}}
                                        <div class="col-md-12 mb-3">
                                            <div class="card-title fs-4">3. Thông số kỹ thuật</div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <select name="loaithongso['0']" class="selectpicker" data-dropup-auto="false"
                                                data-width="100%" title="Nhập thông số" data-size="3">
                                                <option value="Sản phẩm">Thông số 1</option>
                                                <option value="Phiên bản">Thông số 2</option>
                                                <option value="Tuỳ chọn">Thông số 3</option>
                                                <option value="Vật tư MKT">Thông số 4</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <select name="tenthongso['0']" class="selectpicker" data-dropup-auto="false"
                                                data-width="100%" title="Tên thông số" data-size="3">
                                                <option value="Sản phẩm">Tên thông số 1</option>
                                                <option value="Phiên bản">Tên Thông số 2</option>
                                                <option value="Tuỳ chọn">Tên Thông số 3</option>
                                                <option value="Vật tư MKT">Tên Thông số 4</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="d-flex align-items-center">
                                                <input type="text" name="thongso['0']" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title="Thông số" placeholder="Thông số"
                                                    class="form-control">
                                                <i class="bi bi-plus fs-4 ms-2 add-spec"
                                                    style="cursor: pointer; color: var(--primary-color)"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        {{-- Sản phẩm liên quan --}}
                                        <div class="col-md-12 mb-3">
                                            <div class="card-title fs-4">4. Sản phẩm liên quan</div>
                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <select name="sanpham" class="selectpicker" data-dropup-auto="false"
                                                data-width="100%" title="Chọn tên sản phẩm " data-size="3">
                                                <option value="Sản phẩm">Sản phẩm 1</option>
                                                <option value="Phiên bản">Sản phẩm 2</option>
                                                <option value="Tuỳ chọn">Sản phẩm 3</option>
                                                <option value="Vật tư MKT">Sản phẩm 4</option>
                                            </select>
                                        </div>
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
                                                            <button role="button" type="button"
                                                                class="btn position-relative pe-4 ps-4">
                                                                <img style="width:16px;height:16px"
                                                                    src="{{ asset('assets/img/upload-file.svg') }}" />
                                                                Tải file lên
                                                                <input accept=".png, .jpeg, .jpg" required role="button"
                                                                    type="file"
                                                                    class="modal_upload-input modal_upload-file"
                                                                    name="file" onchange="updateList(event)">
                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>
                                                <ul class="modal_upload-list"
                                                    style="max-height: 134px; overflow-y: scroll; overflow-x: hidden;">
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12">
                                            <div class="input-group align-items-center">
                                                <input type="file" class="form-control" id="attachment"
                                                    name="attachment" style="display: none">
                                                <i class="bi bi-link-45deg fs-3 fw-bold"
                                                    style="color: var(--primary-color)"></i>
                                                <label class="input-label fs-4 fw-bold ms-2" for="attachment"
                                                    style="cursor: pointer;color: var(--primary-color)">Đính kèm
                                                    file</label>
                                            </div>
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
    <script>
        // Show Slider
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("demo");
            let captionText = document.getElementById("caption");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            captionText.innerHTML = dots[slideIndex - 1].alt;
        }
    </script>
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
                        <select name="loaithongso['${specCount}']" class="selectpicker" data-dropup-auto="false"
                            data-width="100%" title="Nhập thông số" data-size="3">
                            <option value="Sản phẩm">Thông số 1</option>
                            <option value="Phiên bản">Thông số 2</option>
                            <option value="Tuỳ chọn">Thông số 3</option>
                            <option value="Vật tư MKT">Thông số 4</option>
                        </select>
                    </div>
                    <div class="col-md-4 ">
                        <select name="tenthongso['${specCount}']" class="selectpicker" data-dropup-auto="false"
                            data-width="100%" title="Tên thông số" data-size="3" >
                            <option value="Sản phẩm">Tên thông số 1</option>
                            <option value="Phiên bản">Tên Thông số 2</option>
                            <option value="Tuỳ chọn">Tên Thông số 3</option>
                            <option value="Vật tư MKT">Tên Thông số 4</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex align-items-center">
                            <input type="text" name="thongso['${specCount}']" data-bs-toggle="tooltip"
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
@endsection
