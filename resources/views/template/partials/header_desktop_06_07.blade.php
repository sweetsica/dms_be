<div class="header_menu">
    <ul class="header_menu-list">
        <li class="header_menu-item">
            <a class="header_menu-link menu_btn-sub" href="{{ route('home') }} ">
                <i class="bi bi-house"></i>
                <span>Bảng điều khiển</span>
            </a>
        </li>

        <li class="header_menu-item">
            <a class="header_menu-link menu_btn-sub" href="{{ route('customers') }}">
                <i class="bi bi-database-add"></i>
                <span>Khách hàng</span>
            </a>
            <ul id="header_submenu">
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Nhà phân phối</a>

                </li>
                <li class="header_more-item">
                    <a href="{{ route('customers') }} " class="header_more-link">Khách hàng</a>
                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Đại lý</a>

                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Bán lẻ</a>

                </li>
            </ul>
        </li>

        <li class="header_menu-item">
            <a class="header_menu-link menu_btn-sub" href="/danh-sach-don-dat-hang">
                <i class="bi bi-boxes"></i>
                <span>Đơn hàng</span>
            </a>
            <ul id="header_submenu">

                <li class="header_submenu-items more position-relative">
                    <a href="/danh-sach-don-dat-hang" class="header_submenu-link more_btn">
                        Đơn đặt hàng</a>

                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Đơn bán hàng</a>

                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Đơn vật tư</a>

                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Đơn marketting</a>

                </li>

                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Đơn đổi/trả<i class="bi bi-chevron-right"></i></a>
                    <ul class="header_more">
                        <li class="header_more-item">
                            <a href="#" class="header_submenu-link">Đơn đổi</a>
                        </li>
                        <li class="header_more-item">
                            <a href="#" class="header_submenu-link">Đơn trả</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </li>


        <li class="header_menu-item">
            <a class="header_menu-link menu_btn-sub" href="#">
                <i class="bi bi-bar-chart"></i>
                <span>Kinh doanh</span>
            </a>
            <ul id="header_submenu">
                <li class="header_submenu-items more position-relative">
                    <a href="{{ route('Supplier.index') }}" class="header_submenu-link more_btn">
                        Nhà cung cấp</a>

                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="{{ route('product.list') }}" class="header_submenu-link more_btn">
                        Hồ sơ sản phẩm</a>

                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Doanh số</a>

                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Thanh toán</a>

                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Chính sách KD<i class="bi bi-chevron-right"></i></a>
                    <ul class="header_more">
                        <li class="header_more-item">
                            <a href="{{ route('Promotion.index') }}" class="header_submenu-link">Chương trình khuyến
                                mại</a>
                        </li>
                    </ul>

                </li>
            </ul>
        </li>

        <li class="header_menu-item">
            <a class="header_menu-link menu_btn-sub" href="{{ route('WareHouse.index') }}">
                <i class="bi bi-archive"></i>
                <span>Kho vận</span>
            </a>
            <ul id="header_submenu">
                <li class="header_submenu-items more position-relative">
                    <a href="{{ route('WareHouse.index') }}" class="header_submenu-link more_btn">
                        Kho</a>

                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Nhập kho<i class="bi bi-chevron-right"></i></a>
                    <ul class="header_more">
                        <li class="header_more-item">
                            <a href="#" class="header_submenu-link">Nhập mua nhà cung cấp</a>
                        </li>
                        <li class="header_more-item">
                            <a href="#" class="header_submenu-link">Nhập kho điều chỉnh</a>
                        </li>
                    </ul>
                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Xuất kho<i class="bi bi-chevron-right"></i></a>
                    <ul class="header_more">
                        <li class="header_more-item">
                            <a href="#" class="header_submenu-link">Xuất kho bán hàng</a>
                        </li>
                        <li class="header_more-item">
                            <a href="#" class="header_submenu-link">Xuất kho điều chỉnh</a>
                        </li>
                        <li class="header_more-item">
                            <a href="#" class="header_submenu-link">Xuất trả nhà cung cấp</a>
                        </li>
                    </ul>
                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Kiểm kê kho</a>

                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Báo cáo</a>

                </li>
            </ul>
        </li>

        {{-- <li class="header_menu-item">
            <a class="header_menu-link menu_btn-sub" href="#">
                <i class="bi bi-card-list"></i>
                <span>HCNS</span>
            </a>
            <ul id="header_submenu">
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Văn thư</a>

                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Danh sách nhân sự <i class="bi bi-chevron-right"></i></a>
                    <ul class="header_more">
                        <li class="header_more-item">
                            <a href="file-list" class="header_submenu-link">Vị trí làm việc</a>
                        </li>
                        <li class="header_more-item">
                            <a href="file-list" class="header_submenu-link">Chức danh</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Chấm công<i class="bi bi-chevron-right"></i>
                    </a>
                    <ul class="header_more">
                        <li class="header_more-item">
                            <a href="#" class="header_submenu-link">Nghỉ phép</a>
                        </li>
                        <li class="header_more-item">
                            <a href="#" class="header_submenu-link">Làm thêm</a>
                        </li>
                        <li class="header_more-item">
                            <a href="#" class="header_submenu-link">Công tác</a>
                        </li>
                    </ul>
                </li>

                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Phản ánh & Đề xuất</a>

                </li>
                
            </ul>
        </li> --}}

        <li class="header_menu-item">
            <a class="header_menu-link menu_btn-sub" href="#">
                <i class="bi bi-people"></i>
                <span>Công việc</span>
            </a>
            <ul id="header_submenu">
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Kiểm soát<i class="bi bi-chevron-right"></i>
                    </a>
                    <ul class="header_more">
                        <li class="header_more-item">
                            <a href="#" class="header_submenu-link">
                                Báo cáo kiểm soát thị trường</a>
                        </li>
                        <li class="header_more-item">
                            <a href="#" class="header_submenu-link">
                                Báo cáo cạnh tranh</a>
                        </li>

                    </ul>
                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Quản lý hoạt động<i class="bi bi-chevron-right"></i>
                    </a>
                    <ul class="header_more">
                        <li class="header_more-item">
                            <a href="#" class="header_submenu-link">Số nhân viên online/offline</a>
                        </li>
                        <li class="header_more-item">
                            <a href="#" class="header_submenu-link">Bản đồ vị trí nhân viên</a>
                        </li>

                    </ul>
                </li>
            </ul>
        </li>

        <li class="header_menu-item">
            <a href="#" class="header_menu-link menu_btn-sub">
                <i class="bi bi-gear"></i>
                <span>Cấu hình</span>
            </a>
            <ul id="header_submenu">

                <li class="header_submenu-items more position-relative">
                    <a href="{{ route('department.index2', ['department_id' => 1]) }}"
                        class="header_submenu-link more_btn">
                        Cơ cấu đơn vị<i class="bi bi-chevron-right"></i>
                    </a>
                    <ul class="header_more">
                        <li class="header_more-item">
                            <a href="{{ route('department.store') }} " class="header_more-link">Hồ sơ đơn vị (phòng
                                ban)</a>
                        </li>

                        <li class="header_more-item">
                            <a href="{{ route('Personnel.store') }}" class="header_more-link">Nhân sự</a>
                        </li>
                        <li class="header_more-item">
                            <a href="{{ route('position.store') }} "class="header_more-link">Vị trí/chức danh</a>
                        </li>
                        <li class="header_more-item">
                            <a href="{{ route('PersonnelLevel.store') }}"class="header_more-link">Cấp nhân sự</a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link">
                        Hồ sơ nhân sự
                    </a>
                </li> --}}
                <li class="header_submenu-items more position-relative">
                    <a href="#" class="header_submenu-link more_btn">
                        Phạm vi kinh doanh<i class="bi bi-chevron-right"></i>
                    </a>
                    <ul class="header_more">
                        <li class="header_more-item">
                            <a href="#" class="header_more-link">Vùng</a>
                        </li>
                        <li class="header_more-item">
                            <a href="{{ route('area.store') }}"class="header_more-link">Khu vực</a>
                        </li>

                        <li class="header_more-item">
                            <a href="{{ route('locality.store') }}" class="header_more-link">Địa bàn</a>
                        </li>
                        <li class="header_more-item">
                            <a href="{{ route('routeDirection.store') }}" class="header_more-link">Tuyến</a>
                        </li>
                    </ul>
                </li>

                <li class="header_submenu-items more position-relative">
                    <a href="/customer" class="header_submenu-link more_btn">
                        Khách hàng<i class="bi bi-chevron-right"></i>
                    </a>
                    <ul class="header_more">

                        <li class="header_more-item">
                            <a href="{{ route('CustomerGroup.index') }}" class="header_more-link">Nhóm khách
                                hàng</a>
                        </li>
                        <li class="header_more-item">
                            <a href="#" class="header_more-link">Loại khách hàng</a>
                        </li>
                    </ul>
                </li>
                <li class="header_submenu-items more position-relative">
                    <a href="/danh-sach-san-pham" class="header_submenu-link more_btn">
                        Hồ sơ sản phẩm<i class="bi bi-chevron-right"></i>
                    </a>
                    <ul class="header_more">
                        <li class="header_more-item">
                            <a href="#" class="header_more-link">Nhóm sản phẩm</a>
                        </li>
                        <li class="header_more-item">
                            <a href="{{ route('Unit.index') }}" class="header_more-link">Đơn vị tính</a>
                        </li>
                        <li class="header_more-item">
                            <a href="#" class="header_more-link">Ngành hàng</a>
                        </li>
                        <li class="header_more-item">
                            <a href="{{ route('TechnicalSpecificationsGroup.index') }}" class="header_more-link">Nhóm
                                thông số kỹ thuật</a>
                        </li>
                        <li class="header_more-item">
                            <a href="{{ route('Specifications.index') }}" class="header_more-link">Thông số kỹ
                                thuật</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </li>
    </ul>
</div>
