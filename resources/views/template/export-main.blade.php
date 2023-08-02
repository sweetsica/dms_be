<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

    <title>@yield('title') - {{ env('SLOGAN_URL', '') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ env('FAVICON_URL', '') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />

    <!-- Base -->
    <link href="{{ asset('/assets/css/normalize.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/variables.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/export.css') }}" rel="stylesheet" />
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
    @yield('header-style')
</head>

<body>
    <div class="wrapper">
        <!-- Pre-Loader Page -->
        <span id="loader" class="loader"></span>
        <!-- End Pre-Loader Page -->
        <div class="export__print-wrapper">
            <div class="export_container">
                @yield('content')
            </div>
        </div>

    </div><!-- End Wrapper -->


    <script>
        //IMPORTANT: GLOBAL VARIABLE CAN USE EVERY WHERE
        const JWT_TOKEN = "{!! session()->get('token') !!}";
        const USER = {!! json_encode(session()->get('user')) !!};
        const API_URL = "{!! env('BE_URL') !!}";
    </script>

    {{-- momemtjs --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Vendor JS Files -->
    <script type="text/javascript" src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <script type="text/javascript" src="{{ asset('assets/js/style.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/js/style-mobile.js') }}"></script>

    @yield('footer-script')


    <script>
        // const BE_URL
        // get list departments
        const fetchListDeparments = async () => {
            try {
                const resp = await fetch(BE_URL + "/departments", {
                    method: "GET",
                    headers: {
                        'Authorization': 'Bearer ' + JWT_TOKEN,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                });
                const data = await resp.json();
                const listDp = data.data.data;
                const selectDp = document.getElementById('report-dp');
                listDp.forEach(dp => {
                    const option = document.createElement('option');
                    option.value = dp.id;
                    option.text = dp.name;
                    if (dp.id === USER.departement_id) {
                        console.log("selected", dp.name, dp.id, USER.departement_id);
                        option.selected = true;
                    }
                    selectDp.appendChild(option);
                });
                $('.selectpicker').selectpicker('refresh');
            } catch (err) {
                console.log(err);
                return []
            }
        }


        // $(document).ready(function() {
        //     fetchListDeparments();

        // });
    </script>
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

                text: `{!! session('error') !!}`,
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

                text: `{!! $error !!}`,
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
            $('form').attr('autocomplete', 'off');
        });
    </script>
    <script type="text/javascript">
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
