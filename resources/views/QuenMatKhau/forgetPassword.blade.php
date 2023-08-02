<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Quên mật khẩu - {{ env('SLOGAN_URL', '') }}</title>
<!-- Favicon -->
<link rel="shortcut icon" href="{{ env('FAVICON_URL', '') }}">
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet" />

<!-- Vendor CSS Files -->
<link href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/css/variables.css') }}" rel="stylesheet" />
<link href="{{ asset('/assets/css/login.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="login_wrapper">
            <div class="login_container">
                <div class="login_content">
                    <div class="login_header">
                        <a href="/">
                            <img src="{{ env('LOGO_URL', '') }}" alt="logo" class="login_logo" />
                        </a>
                        <!-- <h1 class="login_title">Đăng nhập hệ thống DWT</h1> -->
                    </div>
                    <div class="login_body">
                        {{-- login error --}}
                        @if (session('success'))
                            <div class="alert alert-success" role="alert"> {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert"> {{ session('error') }}
                            </div>
                        @endif
                        <form action="" method="POST" autocomplete="off">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="admin"
                                    name="email" />
                                <label for="floatingInput">Email/ Số điện thoại</label>
                            </div>
                            @error('email')
                                <div class="alert alert-danger">Email hoặc số điện thoại không chính xác</div>
                            @enderror
                            <div class="d-grid">
                                <button id="forget-password" class="btn btn-login text-uppercase fw-bold h-100"
                                    type="submit">
                                    Xác nhận
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="login_acceptTerm">Nếu gặp vấn đề hãy liên hệ đến <a href="#">Admin</a></div>
                </div>
            </div>
            <div class="login_about">
                {{ env('SLOGAN_URL', '') }} - Powered by STeam
            </div>
        </div>
    </div>
    </div>
    <script type="text/javascript" src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            if (localStorage.getItem('modalShown') != null) {
                localStorage.removeItem('modalShown', false);
            }
        });
    </script>
</body>

</html>
