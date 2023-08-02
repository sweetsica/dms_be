<div id="aside-left" class="aside-left">
    <div class="sidebar">
        <div class="sidebarBody">
            <div class="container">
                <div class="sidebarBody_wrapper ">
                    <div class="sidebarBody_heading-wrapper  ">
                       <div class="wrapper" >
                            <h1 style="color: red;">Cơ cấu đơn vị <img src="{{ asset('assets/img/Vector.png') }}" onclick="showList()" id="show-list-button" style="float: right"></h1>
                        </div>
                        <div id="list-container"  style="display: none;">
                            <ul>
                                <li style=" margin: 5px; padding: 0;">
                                    <div class="d-flex align-items-center"
                                        style=" background-color: #EBEBEB; height: 30px; display: flex; font-size: 15px; border-radius: 5px;">
                                        <a href="{{ route('department.index') }}"
                                            style="color:black;padding-left:10px;">Cơ cấu tổ chức</a>
                                    </div>
                                </li>
                                <li style=" margin: 5px; padding: 0;">
                                    <div class="d-flex align-items-center"
                                        style=" background-color: #EBEBEB; height: 30px; display: flex; font-size: 15px; border-radius: 5px;">
                                        <a href="{{ route('position.index') }} "
                                            style="color:black;padding-left:10px;">Cơ cấu chức danh</a>
                                    </div>
                                </li>
                                <li style=" margin: 5px; padding: 0;">
                                    <div class="d-flex align-items-center"
                                        style=" background-color: #EBEBEB; height: 30px; display: flex; font-size: 15px; border-radius: 5px;">
                                        <a href="{{ route('area.index') }}" style="color:black;padding-left:10px;">Cơ cấu địa bàn</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <title>Danh sách đơn vị</title>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <form method="GET" action="">
                            <div class="form-group has-search">
                                <span type="submit" class="bi bi-search form-control-feedback fs-5"></span>
                                <input type="text" style="width: 250px;" class="form-control"
                                    value="{{ $search }}" placeholder="Tìm kiếm" name="search">
                            </div>
                        </form>
                    </div><br>
                    <div class="d-flex align-items-center"
                        style=" background-color: #EBEBEB; height: 40px; display: flex; justify-content: center; font-size: 15px;">
                        <b>Cơ cấu tổ chức</b>
                    </div><br>
                    <style>
                        /* CSS để tạo hiệu ứng gộp/hiện cho đơn vị con */
                        .tree li {
                            list-style-type: none;
                            position: relative;
                            cursor: pointer;
                        }

                        .tree li::before {
                            content: "";
                            position: absolute;
                            top: 0;
                            bottom: 0;
                            left: -20px;
                            border-left: 1px dashed #cc0000;
                        }

                        .tree li:last-child::before {
                            display: none;
                        }

                        .tree .parent>ul {
                            display: none;
                            margin-left: 15px;
                            /* Thêm margin để tạo thanh dọc */
                            padding-left: 5px;
                            /* Thêm padding để tạo khoảng cách giữa đường kẻ và văn bản */
                            /* border-right: 1px dashed #cc0000; */
                            /* Đường kẻ dọc */
                        }

                        .tree .parent>ul {
                            display: none;
                        }

                        .tree .parent.opened>ul {
                            display: block;
                        }
                    </style>

                    <div style="font-size: 14px">
                        <ul class="tree" style="margin: 0px;  padding: 0;">
                            @foreach ($departmentListTree as $donVi)
                                <li class="parent" style=" margin: 5px; padding: 0;"  onclick="changeImage()" >
                                    <img src="{{ asset('assets/img/cong.png') }}"id="myImage"
                                       >&nbsp;&nbsp;{{ $donVi->name }}
                                    @if ($donVi->donViCon->count() > 0)
                                        @include('template.sidebar.sidebarDepartment.child', [
                                            'donViCon' => $donVi->donViCon,
                                        ])
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <span id="btn-left"><i class="bi bi-arrow-bar-left"></i>
        </span>
    </div>
</div>

@section('script-chart')
    @if (!env('FE_LAYOUT'))
        <script type="text/javascript" src="{{ asset('/assets/js/chart/ChartSidebarleft/dash.js') }}"></script>
    @endif

    <script>
        let parentItems = document.querySelectorAll('.parent');

        parentItems.forEach(item => {
            item.addEventListener('click', function(event) {
                if (item.querySelector('ul')) {
                    item.classList.toggle('opened');
                }
            });
        });
    </script>

    <script>
        // Lấy đối tượng hình ảnh và danh sách "li"
        const showListButton = document.getElementById('show-list-button');
        const listContainer = document.getElementById('list-container');

        // Thêm sự kiện click cho hình ảnh để hiển thị danh sách "li"
        showListButton.addEventListener('click', () => {
            // Toggle (bật/tắt) hiển thị của danh sách "li"
            if (listContainer.style.display === 'none') {
                listContainer.style.display = 'block';
            } else {
                listContainer.style.display = 'none';
            }
        });
    </script>

    <script>
        var images = [
            "{{ asset('assets/img/tru.png') }}", // Thay đổi đường dẫn thành URL của hình ảnh thứ nhất
            "{{ asset('assets/img/cong.png') }}" // Thay đổi đường dẫn thành URL của hình ảnh thứ hai
        ];

        var currentImageIndex = 0;

        function changeImage() {
            var myImage = document.getElementById("myImage");

            myImage.src = images[currentImageIndex];
            currentImageIndex = (currentImageIndex + 1) % images.length;
        }
    </script>


@endsection
