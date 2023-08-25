@extends('template.master')

@section('title', 'Hồ sơ người dùng')

@section('header-style')

    <style>
        .information_signature {
            position: relative;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .signature-pad {
            position: absolute;
            left: 0;
            top: 0;
            width: 400px;
            height: 200px;
            background-color: white;
        }
    </style>

@endsection

@section('content')
    @include('template.sidebar.sidebarMaster.sidebarLeft')
    <div id="mainWrap" class="mainWrap">
        <div class="mainSection">
            <div class="main">
                <div class="container-fluid">
                    <div class="mainSection_heading">
                        <h5 class="mainSection_heading-title">Hồ sơ người dùng</h5>
                        @include('template.components.sectionCard')
                    </div>
                @foreach ($user as $item)
                @php
                $manager = $item->manage 
                @endphp
                    <div class="information_wrapper bg-white">
                        <div class="row">
                            <div class="col-12 col-md-5 mb-3">
                                <div class="card" style="height: 100%;">
                                    <div class="card-body">
                                        <div class="information_avatar">
                                            <img src="{{ asset('assets/img/avatar.jpeg') }}" alt=""
                                                class="information_avatar-img">
                                        </div>
                                        <div class="card-title text-center pt-3 pb-3">{{ $item->name }} -
                                            {{ $item->code }}</div>
                                        <div class="information_signature-wrapper mb-3">
                                            <div class="signature_wrapper">
                                                <img class="signature_img"
                                                    src="{{ $item->signature ?? asset('assets/img/noSignature.jpg') }}" />
                                            </div>

                                            <div class="signature_actions">
                                                <button role="button" class="btn btn-outline-danger"
                                                    id="clearSignatureButton">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <button role="button" class="btn btn-outline-warning"
                                                    id="editSignatureButton">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button role="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#signatureModal">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-danger"data-bs-toggle="modal"
                                                data-bs-target="#uploadSignature">
                                                Upload chữ kí(Chức năng đang hoàn thiện)
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <div class="card mb-5">
                                    <div class="card-body">
                                        <div class="card-title mb-3" style="display: flex; justify-content: space-between">
                                            Thông tin cơ bản
                                            <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#suaThongTin">Thay đổi</button>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 col-6 col-md-4">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label fs-5">Họ và tên</label>
                                                    <input type="text" id="name" readonly
                                                        value="{{ $item->name }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 col-6 col-md-4">
                                                <div class="mb-3">
                                                    <label for="sex" class="form-label fs-5">Giới tính</label>
                                                    <input type="text" id="gender" readonly
                                                        value="{{ $item->gender }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 col-6 col-md-4">
                                                <div class="mb-3">
                                                    <label for="bd" class="form-label fs-5">Ngày sinh</label>
                                                    <div class="position-relative">
                                                        <input type="text" id="bd" readonly
                                                            value="{{ date('d/m/Y', strtotime($item->birthday)) }}"
                                                            class="form-control">
                                                        <i class="bi bi-calendar-plus style_pickdate"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 col-6 col-md-4">
                                                <div class="mb-3">
                                                    <label for="bd" class="form-label fs-5">Số điện thoại liên
                                                        hệ</label>
                                                    <input type="text" id="bd" readonly
                                                        value="{{ $item->phone }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="mb-3 col-6 col-md-4">
                                                <div class="mb-3">
                                                    <label for="bd" class="form-label fs-5">Đơn vị công tác</label>
                                                    <input type="text" id="bd" readonly
                                                        value="{{ $item->department_name ?? '' }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 col-6 col-md-4">
                                                <div class="mb-3">
                                                    <label for="bd" class="form-label fs-5">Vị trí làm việc</label>
                                                    <input type="text" id="bd" readonly
                                                        value="{{ $item->position_name ?? '' }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 col-12 col-md-12">
                                                <div class="mb-3">
                                                    <label for="bd" class="form-label fs-5">Địa chỉ</label>
                                                    <input type="text" id="bd" readonly
                                                        value="{{ $item->address }}" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="card-title mb-3"
                                            style="display: flex; justify-content: space-between">
                                            Thông tin tài khoản
                                            {{-- <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#thongTinLienHe">Thay đổi</button> --}}
                                        </div>
                                        <div class="row">

                                            <div class="mb-3 col-6">
                                                <div class="mb-3">
                                                    <label for="sex" class="form-label fs-5">Email liên kết</label>
                                                    <input type="text" id="sex" readonly
                                                        value="{{ $item->email }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-3 col-6">
                                                <div class="mb-3">
                                                    <label for="bd" class="form-label fs-5">Mật khẩu</label>
                                                    <input type="text" id="bd" readonly value="**********"
                                                        class="form-control">
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
            @include('template.footer.footer')
        </div>
    </div>
    @include('template.sidebar.sidebarHopGiaoBan.sidebarRight')
    {{-- Modal Thay đổi thông tin cơ bản --}}
   <div class="modal fade" id="suaThongTin" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">Sửa nhân sự</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('Personnel.update', $item->id) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div>
                                    <h1 style="color: red;">Thông tin cá
                                        nhân</h1>
                                </div>
                                <div class="col-4 mb-3">
                                    <input name="name" required type="text" placeholder="Họ và tên*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Họ và tên*" value="{{ $item->name }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Giới tính*">
                                        <select name="gender" class="selectpicker" data-dropup-auto="false" required>
                                            <option value="{{ $item->gender }}">
                                                {{ $item->gender }}
                                            </option>
                                            <option value="Nam">Nam
                                            </option>
                                            <option value="Nữ">Nữ
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4 mb-3">
                                    <input name="birthday" required type="date" placeholder="Ngày sinh*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Ngày sinh*" value="{{ $item->birthday }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <input name="code" required type="text" placeholder="Mã nhân sự*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Nhập mã nhân sự*" value="{{ $item->code }}">
                                </div>
                                <div class="col-8 mb-3">
                                    <input name="address" type="text" placeholder="Địa chỉ" class="form-control"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Địa chỉ"
                                        value="{{ $item->address }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <input name="email" required type="text" placeholder="Email*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Email*" value="{{ $item->email }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <input name="password" required type="text" placeholder="Mật khẩu*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Mật khẩu*" value="{{ $item->password }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <input name="phone" required type="text" placeholder="Số điện thoại*"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Số điện thoại*" value="{{ $item->phone }}">
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <h1 style="color: red;">Thông tin công
                                        việc</h1>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Đơn vị công tác">
                                        <select name="department_id" class="selectpicker" data-dropup-auto="false" data-live-search="true">
                                            <?php if( $item->department_id == null){ ?>
                                            <option value="">Chọn đơn
                                                vị công tác</option>
                                            <?php }else{ ?>
                                            <?php } ?>
                                            <option value="{{ $item->department_id }}">
                                                {{ $item->department_name }}
                                            </option>
                                            @foreach ($departmentlists as $dmList)
                                                <option value="{{ $dmList->id }}">
                                                    @php
                                                        $str = '';
                                                        for ($i = 0; $i < $dmList->level; $i++) {
                                                            echo $str;
                                                            $str = '  --';
                                                        }
                                                    @endphp
                                                    {{ $dmList->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Cấp nhân sự">
                                        <select name="personnel_lv_id" class="selectpicker" data-dropup-auto="false" data-live-search="true">
                                            <?php if( $item->personnel_lv_id == null){ ?>
                                            <option value="">Cấp nhân
                                                sự</option>
                                            <?php }else{ ?>
                                            <?php } ?>
                                            <option value="{{ $item->personnel_lv_id }}">
                                                {{ $item->personnel_level_name }}
                                            </option>
                                            @foreach ($personnelLevelList as $perLvList)
                                                <option value="{{ $perLvList->id }}">
                                                    {{ $perLvList->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Vị trí chức danh">
                                        <select name="position_id" class="selectpicker" data-dropup-auto="false" data-live-search="true">
                                            <?php if( $item->position_id == null){ ?>
                                            <option value="">Vị trí
                                                chức danh</option>
                                            <?php }else{ ?>
                                            <?php } ?>
                                            <option value="{{ $item->position_id }}">
                                                {{ $item->position_name }}
                                            </option>
                                            @foreach ($positionlists as $posiList)
                                                <option value="{{ $posiList->id }}">
                                                    @php
                                                        $str = '';
                                                        for ($i = 0; $i < $posiList->level; $i++) {
                                                            echo $str;
                                                            $str = '  --';
                                                        }
                                                    @endphp
                                                    {{ $posiList->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Vai trò">
                                        <select name="role_id" class="selectpicker" data-dropup-auto="false">
                                            <?php if( $item->role_id == null){ ?>
                                            <option value="">Vai trò
                                            </option>
                                            <?php }else{ ?>
                                            <?php } ?>
                                            <option value="{{ $item->role_id }}">
                                                {{ $item->role_name }}
                                            </option>
                                            @foreach ($roleList as $roleLit)
                                                <option value="{{ $roleLit->id }}">
                                                    {{ $roleLit->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Địa bàn">
                                        <select name="area_id" class="selectpicker" data-dropup-auto="false" data-live-search="true">
                                            <?php if( $item->area_id == null){ ?>
                                            <option value="">Địa bàn
                                            </option>
                                            <?php }else{ ?>
                                            <?php } ?>
                                            <option value="{{ $item->area_id }}">
                                                {{ $item->locality_name }}
                                            </option>
                                            @foreach ($localityList as $localList)
                                                <option value="{{ $localList->id }}">
                                                    {{ $localList->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Quản lý trực tiếp">
                                        <select name="manage" class="selectpicker" data-dropup-auto="false" data-live-search="true">
                                            <?php if( $item->manage == null){ ?>
                                            <option value="0">Quản lý
                                                trực tiếp</option>
                                            <?php }else{ ?>
                                            <?php } ?>  
                                            <option value="0">Quản lý
                                                trực tiếp</option>                                          
                                            @foreach ($personnellists as $perllists)
                                                @if ($perllists->id == $manager)
                                                    <option value="{{ $perllists->id }}" selected>{{ $perllists->name }}</option>
                                                @endif
                                                <option value="{{ $perllists->id }}">
                                                    @php
                                                        $str = '';
                                                        for ($i = 0; $i < $perllists->level; $i++) {
                                                            echo $str;
                                                            $str = '  --';
                                                        }
                                                    @endphp
                                                    {{ $perllists->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <input name="annual_salary" type="text" placeholder="Quỹ lương năm"
                                        class="form-control" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Quỹ lương năm" value="{{ $item->annual_salary }}">
                                </div>
                                <div class="col-6 mb-3">
                                    {{-- <input name="pack" type="text"
                                placeholder="Gói trang bị"
                                class="form-control"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="Gói trang bị"
                                value="{{ $item->pack }}"> --}}
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Gói trang bị">
                                        <select name="pack" class="selectpicker" data-dropup-auto="false">
                                            <option value="{{ $item->pack }}">
                                                {{ $item->pack }}
                                            </option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Hình thức làm việc">
                                        <select name="working_form" class="selectpicker" data-dropup-auto="false"
                                            required>
                                            <option value="{{ $item->working_form }}">
                                                {{ $item->working_form }}
                                            </option>
                                            <option value="Chính thức">
                                                Chính thức</option>
                                            <option value="Thử việc">Thử
                                                việc</option>
                                            <option value="Cộng tác viên">
                                                Cộng tác viên</option>
                                            <option value="Thực tập sinh">
                                                Thực tập sinh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-3">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Trạng thái">
                                        <select name="status" class="selectpicker" data-dropup-auto="false" required>
                                            <option value="{{ $item->status }}">
                                                {{ $item->status }}
                                            </option>
                                            <option value="Đang làm việc">
                                                Đang làm việc</option>
                                            <option value="Đã nghỉ việc">Đã
                                                nghỉ việc</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-danger">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endforeach
    {{-- Modal tạo chữ ký --}}
    <div class="modal fade" id="signatureModal" tabindex="-1" role="dialog" aria-labelledby="signatureModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signatureModalLabel">Tạo chữ ký</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <canvas id="signatureCanvas"></canvas>
                </div>
                <div class="modal-footer">
                    <button role="button" class="btn btn-outline-warning" id="clear_newSign">Xóa chữ ký</button>
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-danger" id="saveSignatureButton">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal Upload --}}
    

@endsection

@section('footer-script')

    {{-- <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script> --}}
    <script src="{{ asset('/assets/plugins/signature_pad/signature_pad.umd.min.js') }}"></script>

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
        // Initialize the signature pad
        var canvas = document.getElementById('signatureCanvas');
        canvas.width = 436;
        canvas.height = 258;
        const ctx = canvas.getContext("2d");
        var signaturePad = new SignaturePad(canvas);

        //resize canvas

        const saveSignatureButton = document.getElementById('saveSignatureButton');
        // Save the signature to a variable when the user clicks the save button
        saveSignatureButton.addEventListener('click', async function(e) {
            // Get the data URL of the signature image (with a low resolution)

            try {
                saveSignatureButton.disabled = true;
                var signatureData = signaturePad.toDataURL('image/png', 1);

                // Update the src of the signature image
                var signatureImg = document.querySelector('.signature_img');
                signatureImg.src = signatureData;
                //create signature image file
                const blob = await fetch(signatureData);
                const blobData = await blob.blob();
                const signatureFile = new File([blobData], "{!! session('user')['id'] !!}" +
                    `_${new Date().getTime()}_signature.png`, {
                        type: 'image/png'
                    });
                // console.log(signatureFile);
                //upload signature to server

                const apiUrl = "https://report.sweetsica.com/api/report/upload"
                const formData = new FormData();
                formData.append('files', signatureFile);
                formData.append('userId', '{!! session('user')['id'] !!}');
                const data = new URLSearchParams();
                for (const pair of formData) {
                    data.append(pair[0], pair[1]);
                }
                const resp = await fetch(apiUrl, {
                    method: 'POST',
                    body: formData,

                })
                if (!resp.ok) {
                    throw new Error('Network response was not ok');
                }
                const jsonData = await resp.json();
                const signatureUrl = jsonData.downloadLink;
                //update signature url to database

                const updateUserApiurl = API_URL + '/users/' + "{!! session('user')['id'] !!}"
                await fetch(updateUserApiurl, {
                        method: 'PUT',
                        headers: {
                            'Authorization': 'Bearer ' + JWT_TOKEN,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            signature: signatureUrl
                        })

                    })
                    .then(response => {
                        if (response.ok) {
                            //show success message
                            Toastify({

                                text: "Tạo chữ ký thành công",
                                duration: 3000,
                                stopOnFocus: true,

                            }).showToast();
                        } else {
                            //show error message
                            Toastify({

                                text: "Tạo chữ ký thất bại",
                                duration: 3000,
                                stopOnFocus: true,
                                style: {
                                    background: "#FE6244",
                                },
                            }).showToast();
                        }
                    })
                    .catch(error => {
                        console.log(error)
                        Toastify({

                            text: "Tạo chữ ký thất bại: " + error.message,
                            duration: 3000,
                            stopOnFocus: true,
                            style: {
                                background: "#FE6244",
                            },

                        }).showToast();
                    });

            } catch (err) {
                console.log(err)
                Toastify({

                    text: "Tạo chữ ký thất bại: " + err.message,
                    duration: 3000,
                    stopOnFocus: true,
                    style: {
                        background: "#FE6244",
                    },

                }).showToast();
            } finally {
                saveSignatureButton.disabled = false;
                // Hide the signature pad modal
                var signatureModal = document.getElementById('signatureModal');
                var modalInstance = bootstrap.Modal.getInstance(signatureModal);
                modalInstance.hide();
                ctx.clearRect(0, 0, canvas.width, canvas.height);


            }
        });

        // Clear the signature when the user clicks the clear button
        document.getElementById('clearSignatureButton').addEventListener('click', async function() {
            signaturePad.clear();
            const apiUrl = API_URL + '/users/' + "{!! session('user')['id'] !!}"
            await fetch(apiUrl, {
                method: 'PUT',
                headers: {
                    'Authorization': 'Bearer ' + JWT_TOKEN,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    signature: ""
                })

            })
            document.querySelector('.signature_img').src = '{{ asset('assets/img/noSignature.jpg') }}';

        });

        // Clear draw when create sign
        document.getElementById('clear_newSign').addEventListener('click', function() {
            signaturePad.clear();
        });

        // Show the signature pad modal and load the previous signature when the user clicks the edit button
        document.getElementById('editSignatureButton').addEventListener('click', function() {
            // Show the signature pad modal
            $('#signatureModalLabel').html("Sửa chữ ký");
            var signatureModal = document.getElementById('signatureModal');
            var modalInstance = bootstrap.Modal.getInstance(signatureModal);
            console.log(modalInstance)
            modalInstance.show();

            // var modal = new bootstrap.Modal(signatureModal[0]);
            // modal.show();

            // Load the previous signature (if it exists)
            var signatureImg = document.querySelector('.signature_img');
            var signatureData = signatureImg.src;
            if (signatureData) {
                var image = new Image();
                image.onload = function() {
                    signaturePad.clear();
                    signaturePad.fromDataURL(signatureData);
                };
                image.src = signatureData;
            }
        });
    </script>

    <script>
        $("#signatureModal").on("hidden.bs.modal", function() {
            $('#signatureModalLabel').html("Tạo chữ ký");
            var canvas = $(this).find("canvas")[0];
            var signaturePad = new SignaturePad(canvas);
            signaturePad.clear();
        });
    </script>'
    <script>
        $(document).ready(function() {
            $('.datePicker').daterangepicker({
                singleDatePicker: true,
                timePicker: false,
                locale: {
                    format: 'DD/MM/YYYY '
                }
            });
        });
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>

    <script>
        const passwordInput = document.querySelector('#password_input');
        const togglePasswordBtn = document.querySelector('.style_password');

        togglePasswordBtn.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            togglePasswordBtn.classList.toggle('bi-eye-slash-fill');
            togglePasswordBtn.classList.toggle('bi-eye-fill');
        });
    </script>

    <script>
        const imageUploader = document.querySelector(".upload_signature");
        const imagePreview = document.querySelector(".preview_signature");

        function showImage() {
            let reader = new FileReader();
            reader.readAsDataURL(imageUploader.files[0]);
            reader.onload = function(e) {
                imagePreview.classList.add("show");
                imagePreview.src = e.target.result;
            };
        }
    </script>
@endsection
