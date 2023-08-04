<?php

//$template_path

date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/feather-icons"></script>
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

    <title>@yield('title') - {{ env('SLOGAN_URL', '') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ env('FAVICON_URL', '') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/vendor/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />

    <!-- Plugins -->
    <link href="{{ asset('/assets/plugins/jquery-datetimepicker/jquery.datetimepicker.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/jquery-daterangepicker/daterangepicker.css') }}" />

    {{-- toastify --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Base -->
    <link href="{{ asset('/assets/css/normalize.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/variables.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/responsive.css') }}" rel="stylesheet" />
    <style>
        /* LOADER */
        .loader {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background-color: #fff;
            border-radius: 0 !important;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            animation: spotlight 2s linear infinite alternate;
            z-index: 99999;
        }

        .loader:before {
            content: "";
            background-image: url("{{ env('LOGO_URL') }}");
            width: 100%;
            height: 100%;
            object-fit: cover;
            background-size: 20% auto;
            background-repeat: no-repeat;
            background-position: center;
            animation: heartbeat 3.5s linear infinite alternate;
        }
    </style>
    <style>
        /* LOADER */
        .loader {
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            background-color: #fff;
            border-radius: 0 !important;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            animation: spotlight 2s linear infinite alternate;
            z-index: 99999;
        }

        .loader:before {
            content: "";
            background-image: url("{{ env('LOGO_URL') }}");
            width: 100%;
            height: 100%;
            object-fit: cover;
            background-size: 20% auto;
            background-repeat: no-repeat;
            background-position: center;
            animation: heartbeat 3.5s linear infinite alternate;
        }
    </style>
    @yield('header-style')
</head>

<body>
    <div class="wrapper">
        <!-- Pre-Loader Page -->
        <span id="loader" class="loader"></span>
        <!-- End Pre-Loader Page -->

        <header id="header" class="header fixed-top" data-scrollto-offset="0">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="header_logo" id="header_logo-wrapper">
                    <a href="/" class="navbar-brand d-inline-flex align-items-center scrollto me-auto me-lg-0">
                        <img class="header_logo" src="{{ env('LOGO_URL', '') }}" />
                    </a>
                </div>

                <div class="header_menu-wrapper d-flex">
                    <!-- HEADER_MENU -->
                    @include('template.partials.header_desktop_06_07')
                    <!-- END HEADER_MENU -->
                </div>

                <div class="header_actions-wrapper d-flex align-items-center justify-content-end dropdown">
                    <div class="header_actions-chat">
                        <span class="header_icons" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false" style="cursor: pointer" id="dropdownActions">
                            <i class="bi bi-question-circle"></i>
                        </span>
                        <ul class="dropdown-menu header_actions-notification-list p-0"
                            aria-labelledby="dropdownActions">
                            <div class="header_actions-notification-heading bg-light">Hỗ trợ</div>
                            <li class="header_actions-notification-item">
                                <a class="dropdown-item" href="/thong-tin-ca-nhan">
                                    <div class="header_actions-notification-title">
                                        Công bố nhân viên xuất sắc quý 1
                                    </div>
                                    <div class="header_actions-notification-desc">
                                        Nhân viên xuất sắc nhất quý 1 là bạn gì đấy Nhân viên
                                    </div>
                                </a>
                            </li>
                            <li class="header_actions-notification-item">
                                <a class="dropdown-item" href="/thong-tin-ca-nhan">
                                    <div class="header_actions-notification-title">
                                        Công bố nhân viên xuất sắc quý 1
                                    </div>
                                    <div class="header_actions-notification-desc">
                                        Nhân viên xuất sắc nhất quý 1 là bạn gì đấy Nhân viên
                                    </div>
                                </a>
                            </li>
                            <li class="header_actions-notification-item">
                                <a class="dropdown-item" href="/thong-tin-ca-nhan">
                                    <div class="header_actions-notification-title">
                                        Công bố nhân viên xuất sắc quý 1
                                    </div>
                                    <div class="header_actions-notification-desc">
                                        Nhân viên xuất sắc nhất quý 1 là bạn gì đấy Nhân viên
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="header_actions-notification">
                        <span class="header_icons" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false" style="cursor: pointer" id="dropdownNotification">
                            <i class="bi bi-bell"></i>
                        </span>
                        <ul class="dropdown-menu header_actions-notification-list"
                            aria-labelledby="dropdownNotification">
                            <div class="header_actions-notification-heading bg-light">Thông báo</div>
                            <li class="header_actions-notification-item">
                                <a class="dropdown-item" href="/thong-tin-ca-nhan">
                                    <div class="header_actions-notification-title">
                                        Công bố nhân viên xuất sắc quý 1
                                    </div>
                                    <div class="header_actions-notification-desc">
                                        Nhân viên xuất sắc nhất quý 1 là bạn gì đấy Nhân viên
                                    </div>
                                </a>
                            </li>
                            <li class="header_actions-notification-item">
                                <a class="dropdown-item" href="/thong-tin-ca-nhan">
                                    <div class="header_actions-notification-title">
                                        Công bố nhân viên xuất sắc quý 1
                                    </div>
                                    <div class="header_actions-notification-desc">
                                        Nhân viên xuất sắc nhất quý 1 là bạn gì đấy Nhân viên
                                    </div>
                                </a>
                            </li>
                            <li class="header_actions-notification-item">
                                <a class="dropdown-item" href="/thong-tin-ca-nhan">
                                    <div class="header_actions-notification-title">
                                        Công bố nhân viên xuất sắc quý 1
                                    </div>
                                    <div class="header_actions-notification-desc">
                                        Nhân viên xuất sắc nhất quý 1 là bạn gì đấy Nhân viên
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="header_user dropdown">

                        <button class="dropdown-toggle" type="button" id="dropdownUser" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img class="header_user-img" src="{{ asset('assets/img/avatar.jpeg') }}" />
                        </button>
                        <ul class="dropdown-menu header_user-list" aria-labelledby="dropdownUser">
                            <li class="header_user-item fs-5 text-center p-3">
                                <div class="mb-3">
                                    <img class="header_user-img" src="{{ asset('assets/img/avatar.jpeg') }}" />
                                </div>
                                <span class="fw-bold">{{ session('user')['name'] ?? "" }}</span>
                                <span>({{ session('user')['role'] ?? "" }})</span>
                                <div class="">
                                    {{ session('user')['position'] ?? "" }}
                                </div>
                            </li>
                            <li class="header_user-item">
                                <a class="dropdown-item" href="/thong-tin-ca-nhan">
                                    <i class="bi bi-person-vcard"></i>
                                    <span>Thông tin</span>
                                </a>
                            </li>
                            <li class="header_user-item">
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-gear"></i>
                                    <span>Cài đặt</span>
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li class="header_user-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="bi bi-box-arrow-right"></i>
                                        <span>Đăng xuất</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="pageWithSidebar">
            @yield('content')
        </div>

        @include('template.components.sectionMenuMobile')

    </div><!-- End Wrapper -->

    <!-- Modal Vấn đề tồn đọng -->
    <div class="modal fade" id="neuvande" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Vấn đề tồn đọng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST">
                    @csrf

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-9 mb-3">
                                <input type="text" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Họ và tên" class="form-control form-control-plaintext" readonly
                                    id="staticEmail" style="text-indent: 8px" value="#">
                            </div>
                            <div class="col-sm-3 mb-3 position-relative">
                                <input data-bs-toggle="tooltip" data-bs-placement="top" title="Giờ tạo"
                                    value="<?php echo date('H:i'); ?>" readonly class="form-control" type="text" />
                                <i class="bi bi-alarm style_pickdate-two"></i>
                            </div>
                            <div class="col-sm-9 mb-3">
                                <div data-bs-toggle="tooltip" data-bs-placement="top" title="Đơn vị">
                                    <select class="selectpicker" data-dropup-auto="false" title="Chọn đơn vị"
                                        id="report-dp" name="departement_id" data-size="5" data-live-search="true">
                                        <option value="1">Name
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-3 position-relative">
                                <input data-bs-toggle="tooltip" data-bs-placement="top" title="Thời gian" readonly
                                    value="<?php echo date('d/m/Y'); ?>" class="form-control" type="text" />
                                <i class="bi bi-calendar-plus style_pickdate-two"></i>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <textarea name="problem" required class="form-control" placeholder="Vấn đề tồn đọng"></textarea>
                            </div>
                            <div class="col-sm-7 mb-3">
                                <select class="selectpicker" data-dropup-auto="false" title="Phân loại">
                                    <option value="1">Giải quyết</option>
                                    <option value="2">Than phiền</option>
                                </select>
                            </div>
                            <div class="col-sm-5 mb-3 position-relative">
                                <input required placeholder="Thời hạn" class="form-control datePickerMaster"
                                    type="text" name="deadline" />
                                <i class="bi bi-calendar-plus style_pickdate-two"></i>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Gửi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Giao việc phát sinh -->
    <div class="modal fade" id="giaoNhiemVuPhatSinhGlobal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel">Giao nhiệm vụ phát sinh</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#", method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <input type="text" class="form-control" placeholder="Tên nhiệm vụ"
                                    name="name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top"
                                    aria-label="Thời hạn" data-bs-original-title="Thời hạn">
                                    <input id="giaoNhiemVuPhatSinhGiaoViecGlobal" placeholder="Thời hạn"
                                        class="form-control" type="text" name="deadline">
                                    <i class="bi bi-calendar-plus style_pickdate"></i>
                                </div>
                            </div>
                            <div class="col-md-8 mb-3">
                                <textarea class="form-control" rows="1" placeholder="Mô tả/Diễn giải" name="description"></textarea>
                            </div>
                            <div class="col-md-4 mb-3">
                                <input type="number" class="form-control" min="0" step="0.05"
                                    oninput="onInput(this)" placeholder="Manday" id="title" name="manDay">
                            </div>
                            <div class="col-md-6 mb-3">
                                <select class="selectpicker" data-dropup-auto="false" data-live-search="true"
                                    data-size="5" id="" title="Người đảm nhiệm" name="user_id">
                                    <option value="1">Tên -
                                        Code</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <select class='selectpicker' title="Người liên quan" multiple data-live-search="true"
                                    data-size="5" name="involedPeople[]">
                                    <option value="1">Tên -
                                        Code</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="repeater">
                                    <div data-repeater-list="kpiKeys">
                                        <div class="row" data-repeater-item>
                                            <div class="col-md-7 mb-3">
                                                <select class='form-select' style="font-size:var(--fz-12)"
                                                    title="Tiêu chí" data-live-search="true" name="id">
                                                            <option value="1">Name
                                                            </option>
                                                </select>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <input type="number" min="0" class="form-control"
                                                    placeholder="Giá trị" name="quantity" />
                                            </div>
                                            <div class="col-md-1 mb-3 d-flex align-items-center">
                                                <img data-repeater-delete role="button"
                                                    src="{{ asset('/assets/img/trash.svg') }}" width="20px"
                                                    height="20px" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-start">
                                            <div role="button" class="fs-4 text-danger" data-repeater-create><i
                                                    class="bi bi-plus-circle"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Giao</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ChangeLog --}}
    <div class="modal fade" id="changeLog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <div class="d-flex align-items-center">
                        <h5 class="modal-title w-100" id="exampleModalLabel">Nhật ký thay đổi</h5>
                        <span class="d-block background_green">Phiên bản mới</span>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
                <div class="modal-body p-2">
                    <div class="row">
                            <div class="col-12 mb-3">
                                <div class="changeLog">
                                    <div class="changeLog-title mb-3">
                                        <div class="d-flex align-items-center pb-1">
                                            <div class="d-inline-block fs-5 text-uppercase fw-bold me-3">Version
                                                Tên phiên bản</div>
                                                <div class="background_green pt-1 pb-1 pe-2 ps-2 d-inline-block fs-5">
                                                    Phiên bản mới</div>
                                        </div>
                                        <div class="fw-normal fs-6 text-black" id="exampleModalLabel">
                                            Cập nhật
                                            01/01/2001
                                        </div>
                                    </div>
                                    <div class="chageLog-list fs-5">
                                        {{-- <li class="changeLog-items"> --}}
                                        ...
                                        {{-- </li> --}}
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        //IMPORTANT: GLOBAL VARIABLE CAN USE EVERY WHERE
        const JWT_TOKEN = "{!! session()->get('token') !!}";
        const USER = {!! json_encode(session()->get('user')) !!};
        const API_URL = "{!! env('BE_URL') !!}";
    </script>

    {{-- momemtjs --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"
        integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Vendor JS Files -->
    <script type="text/javascript" src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/style.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/style-mobile.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/vendor/jquery/jquery-ui.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('assets/plugins/jquery-datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-daterangepicker/daterangepicker.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('assets/plugins/jquery-datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/jquery-daterangepicker/daterangepicker.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/js/components/autoCompleteAll.js') }}"></script>

    @yield('footer-script')
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    {{-- show toastify --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        @if (Session::has('success'))
            Toastify({

                text: `{!! session('success') !!}`,
                duration: 3000,
                stopOnFocus: true,

            }).showToast();
        @endif

        @if (Session::has('error'))
            Toastify({

                text: "{!! session('error') !!}",
                // gravity: "top", // `top` or `bottom`
                // position: "center"
                duration: 3000,
                stopOnFocus: true,
                style: {
                    background: "#FE6244",
                },

            }).showToast();
        @endif

        @if (isset($error))
            Toastify({

                text: "{!! $error !!}",
                // gravity: "top", // `top` or `bottom`
                // position: "center"
                duration: 3000,
                stopOnFocus: true,
                style: {
                    background: "#FE6244",
                },

            }).showToast();
        @endif
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var elements = document.getElementsByTagName("INPUT");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity("Trường này không được để trống");
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
        })
    </script>

    <script>
        $(document).ready(function() {
            $.datetimepicker.setLocale('vi');
            // $('#thoiGianCuoCHop').datetimepicker({
            //     format: 'd/m/Y H:i',
            //     timepicker: true,
            // });
            $('#thoiGianMua').datetimepicker({
                format: 'Y/m/d',
                timepicker: false,
            });
            $('#thoiGianMua1').datetimepicker({
                format: 'Y/m/d',
                timepicker: false,
            });
            $('#thoiGianMua2').datetimepicker({
                format: 'Y/m/d',
                timepicker: false,
            });
            $('#thoiGianMua3').datetimepicker({
                format: 'Y/m/d',
                timepicker: false,
            });
            $('#giaoNhiemVuPhatSinhGiaoViecGlobal').datetimepicker({
                format: 'd/m/Y',
                timepicker: false,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#thismonth').daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                startDate: new Date(),
                locale: {
                    format: 'H:mm - DD/MM/YYYY '
                }
            });

            $('#giaoNhiemVuPhatSinhGiaoViecGlobal').daterangepicker({
                singleDatePicker: true,
                timepicker: false,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
            $('.datePickerMaster').daterangepicker({
                singleDatePicker: true,
                timepicker: false,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });
    </script>


    <script>
        // Tắt gợi ý trong form
        $(document).ready(function() {
            if (localStorage.getItem('modalShown') == null) {
                $('#changeLog').modal('show');
                localStorage.setItem('modalShown', true);
            }
        });

        $(document).on('click', function(event) {
            if ($(event.target).hasClass('modal')) {
                $('#changeLog').modal('hide');
            }
        });
    </script>
    @yield('script-chart')
</body>

</html>
