@extends('template.master')
@section('title', 'Danh sách khách hàng')
@section('header-style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css.map">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"
        integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>


@endsection
@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Chi tiết khách hàng</h5>
                        @include('template.components.sectionCard')
                    </div>
                    <div class="card mb-5">
                        <div class="card-body card-warpper">
                            <div class="container">
                                {{-- Title Header --}}
                                <div class="d-flex align-items-center justify-content-between my-3">
                                    <h1 class="text-color_pimary fs-3">{{ $customer->companyName ?? $customer->name }}</h1>
                                    <div>
                                        <button class="btn btn-outline-danger btn-back"><a
                                                href="{{ route('customers') }}">Về danh
                                                sách</a></button>
                                        <button class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#suachitiet">Sửa thông tin</button>
                                        <button class="btn btn-danger">Tạo đơn hàng</button>
                                    </div>
                                </div>

                                {{-- Thông tin liên hệ --}}
                                <div class="row">
                                    <div class="col-lg-5">
                                        <div class="row g-4">
                                            <div class="col-lg-12">
                                                <div class="slider slider-single">
                                                    <div>
                                                        {{-- <img class="img-slider"
                                                            src="{{ asset('assets/img/avatardefault.jpg') }}" /> --}}
                                                            <img class="img-slider"
                                                            src="{{ asset($customer->image) }}" />
                                                    </div>
                                                    <!-- <div>
                                                                                                                                                                                                                                                                                                                                                                                            <img class="img-slider" src="{{ asset('assets/img/oto-2.png') }}" />
                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                        <div>
                                                                                                                                                                                                                                                                                                                                                                                            <img class="img-slider" src="{{ asset('assets/img/oto-3.png') }}" />
                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                        <div>
                                                                                                                                                                                                                                                                                                                                                                                            <img class="img-slider" src="{{ asset('assets/img/oto-4.png') }}" />
                                                                                                                                                                                                                                                                                                                                                                                        </div> -->
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="slider slider-nav">
                                                    <!-- <div>
                                                                                                                                                                                                                                                                                                                                                                                            <img src="{{ asset('assets/img/avatardefault.jpg') }}"
                                                                                                                                                                                                                                                                                                                                                                                                class="img-slider_nav" />
                                                                                                                                                                                                                                                                                                                                                                                        </div> -->
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="d-flex justify-content-between">
                                                    <span>
                                                        <h2 class="text-color_pimary fs-3 mb-4">Thông tin liên
                                                            hệ</h2>
                                                        <div class="layout_120">
                                                            <span class="fw-bold fs-4">Người liên hệ:</span>
                                                            <span class="fs-4">{{ $customer->name }}</span>
                                                        </div>
                                                    </span>
                                                    <img src="{{ asset('assets/img/QR.webp') }}"
                                                        style="width: 65px; height: 65px;" />
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mt-4">
                                                <div class="layout_120">
                                                    <span class="fw-bold fs-4">Email:</span>
                                                    <span class="fs-4">{{ $customer->email }}</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mt-4">
                                                <div class="layout_120">
                                                    <span class="fw-bold fs-4">Số điện thoại:</span>
                                                    <span class="fs-4">{{ $customer->phone }}</span>
                                                </div>
                                            </div>


                                            <div class="col-lg-12 mt-4">
                                                <div class="layout_120">
                                                    <span class="fw-bold fs-4">Ghi chú:</span>
                                                    <span class="fs-4">{{ $customer->description }}</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-5 mt-5">
                                                <div class="layout_120">
                                                    <span class="fw-bold fs-4">Giai đoạn:</span>
                                                    <span class="fs-4 text-color_pimary">{{ $customer->status }}</span>
                                                </div>
                                            </div>

                                            <div class="col-lg-7 mt-5">
                                                <div class="row">
                                                    <div class="col-lg-6 ">
                                                        <span class="fw-bold fs-4 title-contact">Tỷ lệ:</span>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <span class="fs-4">100%</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mt-5">
                                                <ul id="progress">
                                                    <li class="{{ $customer->status === 'Trinh sát' ? 'active' : '' }}">
                                                        Trinh sát</li>
                                                    <li class="{{ $customer->status === 'Cơ hội' ? 'active' : '' }}">Cơ
                                                        hội
                                                    </li>
                                                    <li class="{{ $customer->status === 'Khách hàng' ? 'active' : '' }}">
                                                        Khách hàng</li>
                                                    <li class="{{ $customer->status === 'Đơn hàng' ? 'active' : '' }}">
                                                        Đơn
                                                        hàng</li>
                                                    <li class="{{ $customer->status === 'Giao hàng' ? 'active' : '' }}">
                                                        Giao
                                                        hàng</li>
                                                    <li class="{{ $customer->status === 'CSKH' ? 'active' : '' }}">CSKH
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="mt-4">
                                                <div class="input-group align-items-center">
                                                    <!-- <input type="file" class="form-control" id="attachment"
                                                                                                                                                                                                                                                                                                                                                                                            name="attachment" style="display: none"> -->
                                                    <i class="bi bi-link-45deg text-color_pimary fs-3 fw-bold"></i>
                                                    <label class="input-label text-color_pimary fs-4 fw-bold ms-2"
                                                        for="attachment" style="cursor: pointer">File đính kèm</label>
                                                </div>
                                                <div class="col-4 mt-3">
                                                    @foreach (json_decode($customer->fileName) ?? [] as $file)
                                                        @php
                                                            $extension = pathinfo($file, PATHINFO_EXTENSION);
                                                        @endphp
                                                        @if (in_array($extension, ['doc', 'docx', 'xls', 'xlsx', 'pdf']))
                                                            <a
                                                                href="{{ route('customer.download', ['id' => $customer->id, 'name' => $file]) }}">{{ $file }}</a>
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="viewport mt-5">
                                <div class="container">
                                    <ul class="tabs">
                                        <li class="label-item">
                                            <input type="radio" name="tab" id="playlists" value="playlists"
                                                checked>
                                            <label class="label-info header_menu-link" for="playlists">
                                                Thông tin chi tiết
                                            </label>
                                            <div class="tabBody">
                                                <div class="container">
                                                    {{-- Thông tin chung --}}
                                                    {{-- <div class="my-3 wapper-contact mt-5">
                                                        <h2 class="text-color_pimary fs-3">1. Thông tin chung</h2>
                                                        <div class="row mt-5">
                                                            <div class="col-lg-5">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Tên KH:</span>
                                                                    <span class="fs-4">{{ $customer->name }}</span>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-3">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Số điện
                                                                        thoại:</span>
                                                                    <span class="fs-4">{{ $customer->phone }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="row g-0 ">
                                                                    <div class="col-lg-5">
                                                                        <span
                                                                            class="fw-bold fs-4 title-contact">Email:</span>
                                                                    </div>
                                                                    <div class="col-lg-7 text-end">
                                                                        <span class="fs-4">{{ $customer->email }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    {{-- Thông tin chung --}}
                                                    <div class="my-3 wapper-contact mt-4">
                                                        <h2 class="text-color_pimary fs-3">1. Thông tin chung</h2>
                                                        </h2>
                                                        <div class="row mt-3">
                                                            <div class="col-lg-5">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Mã số thuế:</span>
                                                                    <span
                                                                        class="fs-4">{{ $customer->taxCode ?? '' }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Đại diện:</span>
                                                                    <span
                                                                        class="fs-4">{{ $customer->personCompany ?? '' }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="row g-0">
                                                                    <div class="col-lg-5">
                                                                        <span class="fw-bold fs-4 title-contact">Chức
                                                                            danh:</span>
                                                                    </div>
                                                                    <div class="col-lg-7 text-end">
                                                                        <span
                                                                            class="fs-4">{{ $customer->career ?? '' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="col-lg-5 mt-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Lĩnh vực KD:</span>
                                                                    <span class="fs-4">
                                                                        {{ $customer->business_areas ?? '' }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-3 mt-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">SĐT công ty:</span>
                                                                    <span
                                                                        class="fs-4">{{ $customer->companyPhoneNumber ?? '' }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 mt-4">
                                                                <div class="row g-0">
                                                                    <div class="col-lg-5 ">
                                                                        <span class="fw-bold fs-4 title-contact">Email
                                                                            công
                                                                            ty:</span>
                                                                    </div>
                                                                    <div class="col-lg-7 text-end">
                                                                        <span
                                                                            class="fs-4">{{ $customer->companyEmail ?? '' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3">
                                                            <div class="col-lg-5 mt-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Số tài khoản:</span>
                                                                    <span
                                                                        class="fs-4">{{ $customer->accountNumber ?? '' }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7 mt-4">
                                                                <div class="layout_120">
                                                                    <span class="fw-bold fs-4">Ngân hàng:</span>
                                                                    <span
                                                                        class="fs-4">{{ $customer->bankOpen ?? '' }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row wapper-contact mt-4">
                                                        <h2 class="text-color_pimary fs-3 pb-4">2. Liên hệ</h2>
                                                        <div class="col-lg-12">
                                                            <div class="table-responsive">
                                                                <table id="contact"
                                                                    class="table table-responsive table-hover table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="text-nowrap text-center"
                                                                                style="">STT</th>
                                                                            <th class="text-nowrap text-center"
                                                                                style="">Họ và tên</th>
                                                                            <th class="text-nowrap text-center"
                                                                                style="">Số điện thoại</th>
                                                                            <th class="text-nowrap text-center"
                                                                                style="">Email</th>
                                                                            <th class="text-nowrap text-center"
                                                                                style="">Chức danh</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <@php
                                                                        $a=1;
                                                                    @endphp
                                                                    <tbody>
                                                                        @if (!empty($customer->contact))
                                                                            @foreach ($combinedData as $data)
                                                                            <tr>
                                                                            <td class="text-nowrap text-center"
                                                                            style="">{{ $a++}}</td>
                                                                            <td class="text-nowrap text-center"
                                                                            style="">{{ $data->key1}}</td>
                                                                            <td class="text-nowrap text-center"
                                                                            style="">{{ $data->key2}}</td>
                                                                            <td class="text-nowrap text-center"
                                                                            style="">{{ $data->key3}}</td>
                                                                            <td class="text-nowrap text-center"
                                                                            style="">{{ $data->key4}}</td>
                                                                            @endforeach
                                                                            </tr>
                                                                        @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row wapper-contac mt-4">
                                                        <h2 class="text-color_pimary fs-3 pb-4">3. Địa chỉ</h2>
                                                        {{-- Địa chỉ --}}
                                                        <div class="col-lg-5">
                                                            <div class="mb-3 wapper-contact">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="layout_120">
                                                                            <span class="fw-bold fs-4">Tỉnh/thành:</span>
                                                                            <span
                                                                                class="fs-4">{{ $customer->city ?? '' }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 mt-4">
                                                                        <div class="layout_120">
                                                                            <span class="fw-bold fs-4">Quận/huyện:</span>
                                                                            <span
                                                                                class="fs-4">{{ $customer->district ?? '' }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 mt-4">
                                                                        <div class="layout_120">
                                                                            <span class="fw-bold fs-4">Phường/xã:</span>
                                                                            <span
                                                                                class="fs-4">{{ $customer->guide ?? '' }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- Mô tả --}}
                                                            <div class="mb-3 wapper-contact">
                                                                <div class="row">
                                                                    <h2 class="text-color_pimary fs-3">4. Mô tả
                                                                    </h2>
                                                                    <div class="col-lg-12 mt-4">
                                                                        <div class="layout_120">
                                                                            <span class="fw-bold fs-4">NS thu
                                                                                thập:</span>
                                                                            <span
                                                                                class="fs-4">{{ $customer->person->name ?? '' }}</span>
                                                                        </div>
                                                                    </div>
                                                                    @php
                                                                        $products = $customer->products();
                                                                        $productNames = [];
                                                                        foreach ($products as $product) {
                                                                            $productNames[] = $product->name;
                                                                        }
                                                                        $productList = implode(', ', $productNames);
                                                                    @endphp
                                                                    <div class="col-lg-12 mt-4">
                                                                        <div class="layout_120">
                                                                            <span class="fw-bold fs-4">SP quan
                                                                                tâm:</span>
                                                                            <span class="fs-4">
                                                                                {{ $productList }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            {{-- Phân loại --}}
                                                            <div class="row">
                                                                <h2 class="text-color_pimary fs-3">5. Phân loại
                                                                </h2>
                                                                <div class="col-lg-12 mt-4">
                                                                    <div class="layout_120">
                                                                        <span class="fw-bold fs-4">Nhóm KH:</span>
                                                                        <span class="fs-4">{{ $customer->group }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-4">
                                                                    <div class="layout_120">
                                                                        <span class="fw-bold fs-4">Kênh KH:</span>
                                                                        <span
                                                                            class="fs-4">{{ $customer->channel->name ?? '' }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-4">
                                                                    <div class="layout_120">
                                                                        <span class="fw-bold fs-4">Tuyến:</span>
                                                                        <span
                                                                            class="fs-4">{{ $customer->route->name ?? '' }}
                                                                            -
                                                                            {{ $customer->route->travel_time ?? '' }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- Địa chỉ và map --}}
                                                        <div class="col-lg-7">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="layout_120">
                                                                        <span class="fw-bold fs-4">Địa chỉ:</span>
                                                                        <span class="fs-4"
                                                                            id="addressTxt">{{ $customer->address ?? '' }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 mt-4">
                                                                    <div id="map" class="border"
                                                                        style="height: 345px; display: block">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="label-item">
                                            <input type="radio" name="tab" id="artists" value="artists">
                                            <label class=" label-info header_menu-link" for="artists">Chào
                                                hàng</label>
                                            <div class="tabBody">

                                            </div>
                                        </li>
                                        <li class="label-item">
                                            <input type="radio" name="tab" id="albums" value="albums">
                                            <label class="label-info header_menu-link" for="albums">Cơ
                                                hội</label>
                                            <div class="tabBody">

                                            </div>
                                        </li>
                                        <li class="label-item">
                                            <input type="radio" name="tab" id="baogia" value="baogia">
                                            <label class=" label-info header_menu-link" for="baogia">Báo
                                                giá</label>
                                            <div class="tabBody">

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="card w-75 m-auto">
                            <div class="card-body">
                                <form method="POST" autocomplete="off"
                                    action="{{ route('cmt.customer', ['id' => $customer->id]) }}"
                                    onsubmit="return showConfirmation()">
                                    @csrf
                                    <div class="card_template-form mb-3">
                                        <input type="hidden" value="{{ session('user')['name'] }}" name="author">
                                        <div class="card-title fs-4">Trao đổi</div>
                                        <div class="flex-fill ms-3 d-flex align-items-center">
                                            <input placeholder="Viết bình luận..." rows="1" id="comment"
                                                class="form-control" name="content"></input>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-danger mx-3">Gửi</button>
                                        </div>
                                    </div>
                                </form>
                                @foreach (json_decode($customer->comment, true) ?? [] as $key => $comment)
                                    <div class="row p-4" style="background: #c1c4c1; border-radius: 10px">
                                        <div class="col-lg-3">
                                            <span class="fs-5 fw-bold">{{ $comment['author'] }}</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <span class="fs-5">{{ $comment['content'] }}</span>
                                        </div>
                                        <div class="col-lg-3">
                                            <span class="fs-5">{{ $comment['timeComment'] }}</span>
                                            <a href="{{ route('delete.comment', ['id' => $customer->id, 'key' => $key]) }}"
                                                class="bi bi-trash fs-4 ms-4 icon-trash_comment"></a>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('template.footer.footer')
        </div>
    </div>
    @include('template.sidebar.sidebarMaster.sidebarRight')

    <div class="modal fade editForm" id="suachitiet" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Sửa chi tiết khách hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formThemCapPhatChitiet" method="POST" action="{{ route('update.customer',$customer->id) }}" enctype="multipart/form-data">
                    @csrf
                    <input name="name" style="display: none;" id="name">
                    <input name="personContact" style="display: none;" id="personContact">
                    <input name="phone" style="display: none;" id="phone">
                    <input name="email" style="display: none;" id="email">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="card-title">1. Tổ chức</div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="taxCode" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Mã số thuế" placeholder="Mã số thuế" class="form-control" value="{{ $customer->taxCode ?? '' }}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="personCompany" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Người đại diện" placeholder="Người đại diện"
                                    class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="career" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Chức danh" placeholder="Chức danh" class="form-control">
                            </div>

                            <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Lĩnh vực kinh doanh">
                                <select class="selectpicker" id="customerType">
                                    <option value="" selected>Lĩnh vực kinh doanh</option>
                                    <option value="Kim khí">Kim khí</option>
                                    <option value="Điện máy">Điện máy</option>
                                    <option value="Xe điện">Xe điện</option>
                                    <option value="Máy công cụ">Máy công cụ</option>
                                    <option value="Vật liệu xây dựng">Vật liệu xây dựng</option>
                                    <option value="Lĩnh vực khác">Lĩnh vực khác</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <input type="text" name="companyPhoneNumber" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Số điện thoại công ty"
                                    placeholder="Số điện thoại công ty" class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="companyEmail" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Email công ty" placeholder="Email công ty"
                                    class="form-control">
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="text" name="accountNumber" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Số tài khoản" placeholder="Số tài khoản"
                                    class="form-control">
                            </div>
                            <div class="col-md-8 mb-3">
                                <input type="text" name="bankOpen" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Mở tại ngân hàng" placeholder="Mở tại ngân hàng" class="form-control">
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="card-title">2. Liên hệ</div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="table-responsive">
                                    <table id="contact" class="table table-responsive table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-nowrap text-center" style="">STT</th>
                                                <th class="text-nowrap text-center" style="">Họ và tên</th>
                                                <th class="text-nowrap text-center" style="">Số điện thoại</th>
                                                <th class="text-nowrap text-center" style="">Email</th>
                                                <th class="text-nowrap text-center" style="">Chức danh</th>
                                                <th class="text-nowrap text-center">
                                                    <i class="bi bi-plus fs-3" id="addRowIcon"
                                                        style="color: var(--primary-color); cursor: pointer;"></i>

                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="card-title">3. Địa chỉ</div>
                            </div>
                            <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Tỉnh/thành">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Tỉnh/thành*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="city" id="city"
                                    data-live-search-placeholder="Tìm kiếm...">
                                </select>
                            </div>
                            <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Quận/huyện">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Quận/huyện*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="district" id="district"
                                    data-live-search-placeholder="Tìm kiếm...">
                                </select>
                            </div>
                            <div class="col-md-4 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Phường/xã">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Phường/xã*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="guide" id="guide"
                                    data-live-search-placeholder="Tìm kiếm...">
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="text" id="addressInput" name="address" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Địa chỉ" placeholder="Địa chỉ*" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <div id="map"
                                    style="height: 300px; display: block ;opacity: 0.5;background-image: url('{{ asset('/assets/img/img_map.jpg') }}'); "
                                    class="border"></div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="card-title">4. Mô tả</div>
                            </div>

                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Nhân sự thu thập*">

                                <select {{ session('user')['role_id'] != '1' ? 'disabled' : '' }} class="selectpicker"
                                    data-dropup-auto="false" data-width="100%" required data-live-search="true"
                                    title="Nhân sự thu thập*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="personId"
                                    data-live-search-placeholder="Tìm kiếm...">
                                    {{-- @foreach ($listPersons as $per)
                                        <option value="{{ $per->id }}"
                                            {{ $per->id == session('user')['id'] ? 'selected' : '' }}>
                                            {{ $per->name }}
                                        </option>
                                    @endforeach --}}
                                </select>
                                <div class="error-text" id="personIdError" style="color: red;"></div>
                            </div>

                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Sản phẩm quan tâm">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Sản phẩm quan tâm*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="productId[]" id="productId"
                                    data-live-search-placeholder="Tìm kiếm..." multiple>
                                </select>
                            </div>


                            <div class="col-md-12 mb-3">
                                <div class="card-title">5. Phân loại</div>
                            </div>

                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Nhóm khách hàng">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Nhóm khách hàng*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="groupId" id="groupId"
                                    data-live-search-placeholder="Tìm kiếm...">
                                    <option value="Nhà thuốc">Nhà thuốc</option>
                                    <option value="Phòng khám/Trung tâm tế">Phòng khám/Trung tâm tế</option>
                                    <option value="Bệnh viện">Bệnh viện</option>
                                    <option value="Nhà phân phối">Nhà phân phối</option>
                                    <option value="Online">Online</option>
                                    <option value="Khách sạn">Khách sạn</option>
                                    <option value="Nhà thuốc S">Nhà thuốc S</option>
                                    <option value="Siêu thị/Cửa hàng bán lẻ">Siêu thị/Cửa hàng bán lẻ</option>
                                    <option value="Chuỗi nhà thuốc">Chuỗi nhà thuốc</option>
                                    <option value="Đại siêu thị">Đại siêu thị</option>
                                    <option value="Làm đẹp/Phòng tập thể dục/Thể thao">Làm đẹp/Phòng tập thể dục/Thể thao
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Tuyến">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Tuyến*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="routeId" id="routeId"
                                    data-live-search-placeholder="Tìm kiếm...">
                                </select>
                            </div>

                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Kênh khách hàng">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" title="Kênh khách hàng*" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="chanelId" id="chanelId"
                                    data-live-search-placeholder="Tìm kiếm...">
                                </select>
                            </div>
                            <div class="col-md-6 mb-3" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Trạng thái*">
                                <select class="selectpicker" data-dropup-auto="false" data-width="100%"
                                    data-live-search="true" data-select-all-text="Chọn tất cả"
                                    data-deselect-all-text="Bỏ chọn" data-size="3" name="status"
                                    data-live-search-placeholder="Tìm kiếm...">
                                    <option value="Trinh sát" selected>Trinh sát</option>
                                    <option value="Cơ hội">Cơ hội</option>
                                    <option value="Khách hàng">Khách hàng</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="card-title">6. Hình ảnh</div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="upload-files-container">
                                    <div class="drag-file-area">
                                        <span class="material-icons-outlined upload-icon fs-3 mt-4">Tải file ảnh tại
                                            đây</span>
                                        <h3 class="dynamic-message fs-5 text-secondary">Hỗ trợ định dạng JPG hoặc PNG kích
                                            thước không quá
                                            10MB</h3>
                                        <label class="label">
                                            <input type="file" class="default-file-input" style="display: none"
                                                name="avatar[]" />
                                            <span class="btn btn-outline-danger mb-4"><i
                                                    class="bi bi-cloud-arrow-up"></i>Tải file lên</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="input-group align-items-center">
                                    <input type="file" class="form-control" id="attachment" name="attachment[]"
                                        style="display: none" multiple>
                                    <i class="bi bi-link-45deg text-color_pimary fs-3 fw-bold"></i>
                                    <label class="input-label text-color_pimary fs-4 fw-bold ms-2" for="attachment"
                                        style="cursor: pointer">Đính kèm file</label>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <ul id="fileListDisplay" class="list-unstyled"></ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-outline-danger me-3" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .title-contact {
            padding-left: 25px;
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
            padding: 12%;
        }

        .header_menu-link {
            font-size: 1.5rem !important;
        }

        .action_wrapper-search {
            position: relative;
        }

        #progress {
            padding: 0;
            list-style-type: none;
            font-size: 10px;
            clear: both;
            line-height: 1em;
            margin: 0 -1px;
            text-align: center;
        }

        #progress li:first-child {
            border-radius: 20px 0 0 20px;
        }

        #progress li {
            float: left;
            padding: 10px 10px 10px 10px;
            background: #c1c4c1;
            color: #fff;
            position: relative;
            width: calc(16% - 1px);
            margin: 0 1px;
            font-size: 12px;
        }


        #progress li:nth-child(n + 2):before {
            content: '';
            border-left: 16px solid #fff;
            border-top: 16px solid transparent;
            border-bottom: 16px solid transparent;
            position: absolute;
            top: 0;
            left: 0;

        }

        #progress li:after {
            content: '';
            border-left: 16px solid #c1c4c1;
            border-top: 16px solid transparent;
            border-bottom: 15px solid transparent;
            position: absolute;
            top: 0;
            left: 100%;
            z-index: 20;
        }

        #progress li.active {
            background: #46ab2b;
        }

        #progress li.active:after {
            border-left-color: #46ab2b;
        }

        .wapper-contact {
            padding-bottom: 20px;
            border-bottom: 1px solid #07060633;
        }


        .card-body {
            padding: 15px 30px 30px 30px !important;
        }

        .text-color_pimary {
            color: var(--primary-color);
        }

        .layout_120 {
            display: grid;
            grid-template-columns: 100px auto;
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

        .icon-trash_comment:hover {
            color: var(--primary-color);
            cursor: pointer;
        }

        .btn-back a {
            color: var(--primary-color)
        }

        .btn-back:hover a {
            color: #fff
        }
    </style>



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
            slidesToShow: 3,
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
        $(document).ready(function() {
            var apiKey = "b5b7553f4280465482f4a03273fb8813";
            var map;
            var marker;
            var address = $("#addressTxt").text().trim();
            $("#map").show();
            geocodeAddress(address);

            // Function to geocode address
            function geocodeAddress(address) {
                $.ajax({
                    url: 'https://api.opencagedata.com/geocode/v1/json',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        q: address,
                        key: apiKey
                    },
                    success: function(response) {
                        if (response.total_results > 0) {
                            var latitude = response.results[0].geometry.lat;
                            var longitude = response.results[0].geometry.lng;

                            // Display map
                            if (!map) {
                                map = L.map('map').setView([latitude, longitude], 13);
                                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

                                }).addTo(map);
                            } else {
                                map.setView([latitude, longitude], 13);
                            }

                            // Add or update marker
                            if (!marker) {
                                marker = L.marker([latitude, longitude]).addTo(map);
                            } else {
                                marker.setLatLng([latitude, longitude]);
                            }
                        } else {
                            alert("Please check the address.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("An error occurred while geocoding: " + error);
                    }
                });
            }
        });
    </script>
@endsection
