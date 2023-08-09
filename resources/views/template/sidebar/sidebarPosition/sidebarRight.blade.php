<div id="aside-right" class="aside-right">
    <div class="sidebar">
        <div class="sidebarBody">
            <div class="container">
                <div class="row">
                    <div
                        class="sidebarBody_heading-wrapper mb-3  mt-3 d-flex align-items-center justify-content-between">
                        <h6 class="sidebarBody_heading-big m-0">
                            Tổng quan đơn vị
                        </h6>
                        <button class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#neuvande">Nêu vấn
                            đề</button>
                    </div>
                    @if (env('FE_LAYOUT'))
                        <div class="sidebarBody_wrapper">
                            <div class="sidebarBody_card" style="line-height: 26px; height: 200px; overflow-y: scroll">
                                <div class="sidebarBody_heading-wrapper">
                                    <h6 class="sidebarBody_heading">Chỉ số công việc đơn vị</h6>
                                </div>
                                @include('template.components.KeyIndex.elementCardMini')
                            </div>
                        </div>

                        <div class="sidebarBody_wrapper mt-4">
                            <div class="sidebarBody_card bg-pink-blur">
                                {{-- Sỹ số --}}
                                @include('template.components.KeyIndex.elementCardThree', [
                                    'heading' => 'Sỹ số',
                                    'title_today' => 'Vắng',
                                    'title_week' => 'Công tác',
                                    'title_month' => 'Mới',
                                    'today_completed' => '2',
                                    'week_completed' => '3',
                                    'month_completed' => '4',
                                    'icon' => 'bi-person-lines-fill',
                                ])

                                {{-- Số vi phạm hành chính --}}
                                @include('template.components.KeyIndex.elementCardThree', [
                                    'heading' => 'Số vi phạm hành chính',
                                    'title_today' => 'Hôm nay',
                                    'title_week' => 'Tuần này',
                                    'title_month' => 'Tháng này',
                                    'today_completed' => '2',
                                    'week_completed' => '3',
                                    'month_completed' => '4',
                                    'color' => 'text-danger',
                                    'icon' => 'bi-radioactive',
                                ])

                                {{-- Số vi phạm nghiệp vụ --}}
                                @include('template.components.KeyIndex.elementCardThree', [
                                    'heading' => 'Số vi phạm nghiệp vụ',
                                    'title_today' => 'Hôm nay',
                                    'title_week' => 'Tuần này',
                                    'title_month' => 'Tháng này',
                                    'today_completed' => '2',
                                    'week_completed' => '3',
                                    'month_completed' => '4',
                                    'color' => 'text-danger',
                                    'icon' => 'bi-exclamation-octagon-fill',
                                ])

                                {{-- Số sự cố CCDC --}}
                                @include('template.components.KeyIndex.elementCard', [
                                    'heading' => 'Số sự cố CCDC',
                                    'heading_mini' => 'Phát sinh / Đã xử lý',
                                    'title_today' => 'Hôm nay',
                                    'title_week' => 'Tuần này',
                                    'title_month' => 'Tháng này',
                                    'today_completed' => '2',
                                    'today_total' => '3',
                                    'week_completed' => '2',
                                    'week_total' => '3',
                                    'month_completed' => '2',
                                    'month_total' => '3',
                                    'separate' => '/',
                                    'space' => 'letter-spacing: -1px;',
                                    'icon' => 'bi-x-octagon-fill',
                                ])
                            </div>
                        </div>

                        <div class="sidebarBody_wrapper mt-4 col-6 col-md-12">
                            {{-- Số khoản chi tiêu mua sắm --}}
                            @include('template.components.KeyIndex.elementCardTwo', [
                                'heading' => 'Số khoản chi tiêu mua sắm',
                                'heading_mini' => 'Khoản: trị giá',
                                'title_today' => 'Hôm nay',
                                'title_week' => 'Tuần này',
                                'title_month' => 'Tháng này',
                                'today_completed' => '3',
                                'today_total' => '32M',
                                'week_completed' => '6',
                                'week_total' => '62M',
                                'month_completed' => '9',
                                'month_total' => '92M',
                                'separate' => ':',
                                'color_after' => 'text-black',
                                'icon' => 'bi-cash-stack',
                            ])
                        </div>

                        <div class="sidebarBody_wrapper mt-4  col-6 col-md-12">
                            {{-- Tuyển dụng --}}
                            @include('template.components.KeyIndex.elementCardTwo', [
                                'heading' => 'Tuyển dụng',
                                'heading_mini' => 'Phát sinh / Đã tuyển',
                                'title_today' => 'Hôm nay',
                                'title_week' => 'Tuần này',
                                'title_month' => 'Tháng này',
                                'today_completed' => '2',
                                'today_total' => '3',
                                'week_completed' => '22',
                                'week_total' => '30',
                                'month_completed' => '10',
                                'month_total' => '160',
                                'separate' => '/',
                                'icon' => 'bi-person-plus-fill',
                            ])
                        </div>

                        <div class="sidebarBody_wrapper mt-4  col-6 col-md-12">
                            {{-- Huấn luyện & Đánh giá --}}
                            @include('template.components.KeyIndex.elementCardTwo', [
                                'heading' => 'Huấn luyện & Đánh giá',
                                'heading_mini' => 'Yêu cầu / Hoàn thành',
                                'title_today' => 'Hôm nay',
                                'title_week' => 'Tuần này',
                                'title_month' => 'Tháng này',
                                'today_completed' => '2',
                                'today_total' => '1',
                                'week_completed' => '22',
                                'week_total' => '20',
                                'month_completed' => '40',
                                'month_total' => '30',
                                'separate' => '/',
                                'icon' => 'bi-yelp',
                            ])
                        </div>

                        <div class="sidebarBody_wrapper mt-4  col-6 col-md-12">
                            {{-- Kiểm soát NV & CV --}}
                            @include('template.components.KeyIndex.elementCardTwo', [
                                'heading' => 'Kiểm soát NV & CV',
                                'title_today' => 'Hôm nay',
                                'title_week' => 'Tuần này',
                                'title_month' => 'Tháng này',
                                'today_completed' => '2',
                                'today_total' => '1',
                                'week_completed' => '22',
                                'week_total' => '20',
                                'month_completed' => '40',
                                'month_total' => '30',
                                'separate' => '/',
                                'icon' => 'bi-fingerprint',
                            ])
                        </div>
                    @else
                        <div class="sidebarBody_wrapper">
                            <div class="sidebarBody_card"
                                style="line-height: 16px; min-height: 165px; overflow-y: scroll">
                                <div class="sidebarBody_heading-wrapper">
                                    <h6 class="sidebarBody_heading mt-1">Chỉ số công việc đơn vị</h6>
                                </div>
                                {{-- @include('template.components.KeyIndex.elementCardMini') --}}
                                <div class="sidebarBody_cardmini mt-2">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="fw-bolder" scope="col" style="width: 42%">Các loại xe</th>
                                                <th class="fw-bolder" scope="col" style="width: 16%">Đã bán</th>
                                                <th class="fw-bolder" scope="col" style="width: 16%">Đã SXLR</th>
                                                <th class="fw-bolder" scope="col" style="width: 16%">Kế hoạch</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                {{-- <th scope="row">1</th> --}}
                                                <td class="text-end">
                                                    <div class="overText" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Trolley & Cargo cart">
                                                        Trolley & Cargo cart
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td style="color: var(--primary-color)">2.000</td>
                                            </tr>
                                            <tr>
                                                {{-- <th scope="row">2</th> --}}
                                                <td class="text-end">
                                                    <div class="overText" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Xe golf & nội khu">
                                                        Xe golf & nội khu
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td style="color: var(--primary-color)">1.500</td>
                                            </tr>
                                            <tr>
                                                {{-- <th scope="row">3</th> --}}
                                                <td class="text-end">
                                                    <div class="overText" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Xe tham quan">
                                                        Xe tham quan
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td style="color: var(--primary-color)">300</td>
                                            </tr>
                                            <tr>
                                                {{-- <th scope="row">3</th> --}}
                                                <td class="text-end">
                                                    <div class="overText" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Xe tải van">
                                                        Xe tải van
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td style="color: var(--primary-color)"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="sidebarBody_wrapper mt-4">
                            <div class="sidebarBody_card bg-pink-blur">
                                {{-- Sỹ số --}}
                                @include('template.components.KeyIndex.elementCardThree', [
                                    'heading' => 'Tình hình sản xuất',
                                    'title_today' => 'GTQ',
                                    'title_week' => 'Van',
                                    'title_month' => 'Khác',
                                    'today_completed' => '2',
                                    'week_completed' => '3',
                                    'month_completed' => '4',
                                    'icon' => 'bi-person-lines-fill',
                                ])

                                {{-- Số vi phạm hành chính --}}
                                @include('template.components.KeyIndex.elementCardThree', [
                                    'heading' => 'Bảo dưỡng sửa chữa',
                                    'title_today' => 'GTQ',
                                    'title_week' => 'Van',
                                    'title_month' => 'Khác',
                                    'today_completed' => '2',
                                    'week_completed' => '3',
                                    'month_completed' => '4',
                                    'color' => 'text-danger',
                                    'icon' => 'bi-radioactive',
                                ])

                                {{-- Số vi phạm nghiệp vụ --}}
                                @include('template.components.KeyIndex.elementCardThree', [
                                    'heading' => 'Số lượng gia công',
                                    'title_today' => 'GTQ',
                                    'title_week' => 'Van',
                                    'title_month' => 'Khác',
                                    'today_completed' => '2',
                                    'week_completed' => '3',
                                    'month_completed' => '4',
                                    'color' => 'text-danger',
                                    'icon' => 'bi-exclamation-octagon-fill',
                                ])

                                {{-- Số sự cố CCDC --}}
                                {{-- @include('template.components.KeyIndex.elementCard', ['heading' => 'Số sự cố CCDC', 'heading_mini' => 'Phát sinh / Đã xử lý', 'title_today' => 'Hôm nay', 'title_week' => 'Tuần này', 'title_month' => 'Tháng này', 'today_completed' => '2', 'today_total' => '3', 'week_completed' => '2', 'week_total' => '3','month_completed' => '2', 'month_total' => '3', 'separate' => '/', 'space' => 'letter-spacing: -1px;', 'icon' => 'bi-x-octagon-fill']) --}}
                            </div>
                        </div>

                        <div class="sidebarBody_wrapper mt-4 col-6 col-md-12">
                            {{-- Số khoản chi tiêu mua sắm --}}
                            @include('template.components.KeyIndex.elementCardTwo', [
                                'heading' => 'Thống kê khách hàng',
                                'title_today' => 'Khách mới',
                                'title_week' => 'Đơn hàng mới',
                                'title_month' => 'Đã bán',
                                'today_completed' => '3',
                                'today_total' => '32M',
                                'week_completed' => '6',
                                'week_total' => '62M',
                                'month_completed' => '9',
                                'month_total' => '92M',
                                'separate' => ':',
                                'color_after' => 'text-black',
                                'icon' => 'bi-cash-stack',
                            ])
                        </div>

                        <div class="sidebarBody_wrapper mt-4 col-6 col-md-12">
                            {{-- Tuyển dụng --}}
                            @include('template.components.KeyIndex.elementCardTwo', [
                                'heading' => 'Quản lý công việc',
                                'title_today' => 'Số công việc',
                                'title_week' => 'Hoàn thành',
                                'title_month' => 'Huỷ/trễ',
                                'today_completed' => '2',
                                'today_total' => '3',
                                'week_completed' => '22',
                                'week_total' => '30',
                                'month_completed' => '10',
                                'month_total' => '160',
                                'separate' => '/',
                                'icon' => 'bi-person-plus-fill',
                            ])
                        </div>

                        <div class="sidebarBody_wrapper mt-4 col-6 col-md-12">
                            {{-- Huấn luyện & Đánh giá --}}
                            @include('template.components.KeyIndex.elementCardTwo', [
                                'heading' => 'Tuyển dụng',
                                'title_today' => 'Yêu cầu',
                                'title_week' => 'CV',
                                'title_month' => 'Đã duyệt',
                                'today_completed' => '2',
                                'today_total' => '1',
                                'week_completed' => '22',
                                'week_total' => '20',
                                'month_completed' => '40',
                                'month_total' => '30',
                                'separate' => '/',
                                'icon' => 'bi-yelp',
                            ])
                        </div>

                        <div class="sidebarBody_wrapper mt-4 col-6 col-md-12">
                            {{-- Kiểm soát NV & CV --}}
                            {{-- @include('template.components.KeyIndex.elementCardTwo', ['heading' => 'Kiểm soát NV & CV', 'title_today' => 'Hôm nay', 'title_week' => 'Tuần này', 'title_month' => 'Tháng này', 'today_completed' => '2', 'today_total' => '1', 'week_completed' => '22', 'week_total' => '20','month_completed' => '40', 'month_total' => '30', 'separate' => '/' , 'icon' => 'bi-fingerprint']) --}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <span id="btn-right"><i class="bi bi-arrow-bar-right"></i>
        </span>
    </div>
</div>
