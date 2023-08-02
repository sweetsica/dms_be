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
                    @if(env('FE_LAYOUT'))

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
                            @include('template.components.KeyIndex.elementCardThree', ['heading' => 'Sỹ số', 'title_today' => 'Vắng', 'title_week' => 'Công tác', 'title_month' => 'Mới', 'today_completed' => '2', 'week_completed' => '3','month_completed' => '4', 'icon' => 'bi-person-lines-fill'])
    
                            {{-- Số vi phạm hành chính --}}
                            @include('template.components.KeyIndex.elementCardThree', ['heading' => 'Số vi phạm hành chính', 'title_today' => 'Hôm nay', 'title_week' => 'Tuần này', 'title_month' => 'Tháng này', 'today_completed' => '2', 'week_completed' => '3','month_completed' => '4', 'color' => 'text-danger', 'icon' => 'bi-radioactive'])
    
                            {{-- Số vi phạm nghiệp vụ --}}
                            @include('template.components.KeyIndex.elementCardThree', ['heading' => 'Số vi phạm nghiệp vụ', 'title_today' => 'Hôm nay', 'title_week' => 'Tuần này', 'title_month' => 'Tháng này', 'today_completed' => '2', 'week_completed' => '3','month_completed' => '4', 'color' => 'text-danger', 'icon' => 'bi-exclamation-octagon-fill'])
    
                            {{-- Số sự cố CCDC --}}
                            @include('template.components.KeyIndex.elementCard', ['heading' => 'Số sự cố CCDC', 'heading_mini' => 'Phát sinh / Đã xử lý', 'title_today' => 'Hôm nay', 'title_week' => 'Tuần này', 'title_month' => 'Tháng này', 'today_completed' => '2', 'today_total' => '3', 'week_completed' => '2', 'week_total' => '3','month_completed' => '2', 'month_total' => '3', 'separate' => '/', 'space' => 'letter-spacing: -1px;', 'icon' => 'bi-x-octagon-fill'])
                        </div>
                    </div>
    
                    <div class="sidebarBody_wrapper mt-4 col-6 col-md-12">
                        {{-- Số khoản chi tiêu mua sắm --}}
                        @include('template.components.KeyIndex.elementCardTwo', ['heading' => 'Số khoản chi tiêu mua sắm', 'heading_mini' => 'Khoản: trị giá', 'title_today' => 'Hôm nay', 'title_week' => 'Tuần này', 'title_month' => 'Tháng này', 'today_completed' => '3', 'today_total' => '32M', 'week_completed' => '6', 'week_total' => '62M','month_completed' => '9', 'month_total' => '92M', 'separate' => ':', 'color_after' => 'text-black', 'icon' => 'bi-cash-stack'])
                    </div>
    
                    <div class="sidebarBody_wrapper mt-4  col-6 col-md-12">
                        {{-- Tuyển dụng --}}
                        @include('template.components.KeyIndex.elementCardTwo', ['heading' => 'Tuyển dụng', 'heading_mini' => 'Phát sinh / Đã tuyển', 'title_today' => 'Hôm nay', 'title_week' => 'Tuần này', 'title_month' => 'Tháng này', 'today_completed' => '2', 'today_total' => '3', 'week_completed' => '22', 'week_total' => '30','month_completed' => '10', 'month_total' => '160', 'separate' => '/', 'icon' => 'bi-person-plus-fill'])
                    </div>
    
                    <div class="sidebarBody_wrapper mt-4  col-6 col-md-12">
                        {{-- Huấn luyện & Đánh giá --}}
                        @include('template.components.KeyIndex.elementCardTwo', ['heading' => 'Huấn luyện & Đánh giá', 'heading_mini' => 'Yêu cầu / Hoàn thành', 'title_today' => 'Hôm nay', 'title_week' => 'Tuần này', 'title_month' => 'Tháng này', 'today_completed' => '2', 'today_total' => '1', 'week_completed' => '22', 'week_total' => '20','month_completed' => '40', 'month_total' => '30', 'separate' => '/', 'icon' => 'bi-yelp'])
                    </div>
    
                    <div class="sidebarBody_wrapper mt-4  col-6 col-md-12">
                        {{-- Kiểm soát NV & CV --}}
                        @include('template.components.KeyIndex.elementCardTwo', ['heading' => 'Kiểm soát NV & CV', 'title_today' => 'Hôm nay', 'title_week' => 'Tuần này', 'title_month' => 'Tháng này', 'today_completed' => '2', 'today_total' => '1', 'week_completed' => '22', 'week_total' => '20','month_completed' => '40', 'month_total' => '30', 'separate' => '/' , 'icon' => 'bi-fingerprint'])
                    </div>

                    @else
                    <div class="sidebarBody_wrapper">
                        <div class="sidebarBody_card" style="line-height: 16px; min-height: 165px; overflow-y: scroll">
                            <div class="data_chart">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="Số lượng xe" class="data_chart-items">
                                            <canvas id="dash"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebarBody_wrapper mt-4 col-6 col-md-12">
                        <div class="sidebarBody_card" style="line-height: 16px; min-height: 165px; overflow-y: scroll">
                            <div class="sidebarBody_heading-wrapper">
                                <h6 class="sidebarBody_heading mt-1">Bảng cân đối kế toán</h6>
                            </div>
                            {{-- @include('template.components.KeyIndex.elementCardMini') --}}
                            <div class="sidebarBody_cardmini mt-2">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="fw-bolder" scope="col" style="width: 50%">Tài sản</th>
                                            <th class="fw-bolder" scope="col" style="width: 50%">Nguồn vốn</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            {{-- <th scope="row">1</th> --}}
                                            <td class="text-center">
                                                <div class="overText" data-bs-toggle="tooltip" data-bs-placement="top" style="text-align: left;" title="TÀI SẢN NGẮN HẠN">
                                                    TÀI SẢN NGẮN HẠN: 
                                                </div>
                                                <span style="text-align: center">156M</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="overText" data-bs-toggle="tooltip" data-bs-placement="top" style="text-align: left;" title="TÀI SẢN NGẮN HẠN">
                                                    NỢ PHẢI TRẢ: 
                                                </div>
                                                <span style="text-align: center">100M</span>
                                            </td>                                            
                                        </tr>
                                        <tr>
                                            {{-- <th scope="row">1</th> --}}
                                            <td class="text-center">
                                                <div class="overText" data-bs-toggle="tooltip" data-bs-placement="top" style="text-align: left;" title="TÀI SẢN NGẮN HẠN">
                                                    TÀI SẢN DÀI HẠN: 
                                                </div>
                                                <span style="text-align: center">123M</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="overText" data-bs-toggle="tooltip" data-bs-placement="top" style="text-align: left;" title="TÀI SẢN NGẮN HẠN">
                                                    VỐN CHỦ SỞ HỮU: 
                                                </div>
                                                <span style="text-align: center">179M</span>
                                            </td>                                            
                                        </tr>                                        
                                        <tr>
                                            <th class="fw-bolder" scope="col" style="width: 50%">TỔNG:279M</th>
                                            <th class="fw-bolder" scope="col" style="width: 50%">TỔNG:279M</th>                                           
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                    </div>

                    <div class="sidebarBody_wrapper mt-4 col-6 col-md-12">
                        <div class="sidebarBody_card bg-pink-blur" style="line-height: 16px; height:100%; overflow-y: scroll">
                            <div class="sidebarBody_heading-wrapper">
                                <h6 class="sidebarBody_heading mt-1">Chỉ số công việc đơn vị</h6>
                            </div>
                            {{-- @include('template.components.KeyIndex.elementCardMini') --}}
                            <div class="sidebarBody_cardmini-wrapper" style="line-height: 2">
                                <div class="sidebarBody_cardmini">
                                    <span class="sidebarBody_card-title">
                                        <i class="bi bi-file-earmark-text"></i>
                                        Hoá đơn đã xử lý
                                    </span>
                                    <strong>2</strong>
                                </div>                              
                                <div class="sidebarBody_cardmini">
                                    <span class="sidebarBody_card-title">
                                        <i class="bi bi-file-earmark-text"></i>
                                        Ghi nhận phiếu thu
                                    </span>
                                    <strong>2</strong>
                                </div>
                                <div class="sidebarBody_cardmini">
                                    <span class="sidebarBody_card-title">
                                        <i class="bi bi-file-earmark-text"></i>
                                        Ghi nhận phiếu chi
                                    </span>
                                    <strong>2</strong>
                                </div>
                                <div class="sidebarBody_cardmini">
                                    <span class="sidebarBody_card-title">
                                        <i class="bi bi-file-earmark-text"></i>
                                        Kiểm tra chứng từ
                                    </span>
                                    <strong>2</strong>
                                </div> 
                                <div class="sidebarBody_cardmini">
                                    <span class="sidebarBody_card-title">
                                        <i class="bi bi-file-earmark-text"></i>
                                        Quyết toán lương
                                    </span>
                                    <strong>2</strong>
                                </div>
                                <div class="sidebarBody_cardmini">
                                    <span class="sidebarBody_card-title">
                                        <i class="bi bi-file-earmark-text"></i>
                                        Xử lý nghĩa vụ thuế
                                    </span>
                                    <strong>2</strong>
                                </div>                                                   
                                <div class="sidebarBody_cardmini">
                                    <span class="sidebarBody_card-title">
                                        <i class="bi bi-file-earmark-text"></i>
                                        Xử lý khiếu nại
                                    </span>
                                    <strong>2</strong>
                                </div>
                            </div>
                        </div>
                    </div>                        
                    
                    <div class="sidebarBody_wrapper mt-4 col-6 col-md-12">
                        <div class="sidebarBody_card" style="height:100%">
                            <div class="sidebarBody_heading-wrapper">
                                <h6 class="sidebarBody_heading mt-1">                                
                                    <i class="bi bi-bag-dash-fill"></i>                          
                                    Thuế phải nộp                          
                                    <span class="sidebarBody_heading-mini text-black"></span>
                                </h6>
                            
                            </div>
                            <div class="table-responsive">
                                <table class="table table-borderless text-right" style="margin: 0">
                                    <thead>
                                        <tr>
                                            <th style="padding: 0; text-align: left">Tháng</th>
                                            <th style="padding: 0; text-align: left">Cả năm</th>
                                            <th style="padding: 0; text-align: left">Quyết toán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>                                        
                                            <td style="font-weight: 700; padding: 0; text-align: left">
                                                <span class="sidebarBody_card-body-subtitle">
                                                    <span class="sidebarBody_card-body-subtitle-before">15M</span>
                                                   <span class="sidebarBody_card-body-subtitle-separate"></span>
                                                    <span class="sidebarBody_card-body-subtitle-after"></span>
                                                </span>
                                            </td>
                                            <td style="font-weight: 700; padding: 0; text-align: left">
                                                <span class="sidebarBody_card-body-subtitle">
                                                    <span class="sidebarBody_card-body-subtitle-before">90M</span>
                                                   <span class="sidebarBody_card-body-subtitle-separate"></span>
                                                    <span class="sidebarBody_card-body-subtitle-after"></span>
                                                </span>
                                            </td>
                                            <td style="font-weight: 700; padding: 0; text-align: left">
                                                <span class="sidebarBody_card-body-subtitle">
                                                    <span class="sidebarBody_card-body-subtitle-before">12M</span>
                                                   <span class="sidebarBody_card-body-subtitle-separate"></span>
                                                    <span class="sidebarBody_card-body-subtitle-after"></span>
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>                                
                                </table>                            
                            </div>
                        </div>
                    </div>                  
                                     
                    <div class="sidebarBody_wrapper mt-4 col-6 col-md-12">
                        {{-- Huấn luyện & Đánh giá --}}
                        @include('template.components.KeyIndex.elementCardTwo', [
                            'heading' => 'Họp giao ban',
                            'heading_mini' => 'Đã thực hiện/Số phòng',
                            'title_today' => 'Hôm nay',
                            'title_week' => 'Tuần này',
                            'title_month' => 'Tháng này',
                            'today_completed' => '2',
                            'today_total' => '3',
                            'week_completed' => '22',
                            'week_total' => '30',
                            'month_completed' => '50',
                            'month_total' => '100',
                            'separate' => '/',
                            'icon' => 'bi-calendar4-week',
                        ])
                    </div>
                    
                    <div class="sidebarBody_wrapper mt-4 col-6 col-md-12">
                        {{-- Huấn luyện & Đánh giá --}}
                        @include('template.components.KeyIndex.elementCardTwo', [
                            'heading' => 'Nhiệm vụ quá hạn',
                            'heading_mini' => 'Đã xử lý',
                            'title_today' => 'Hôm nay',
                            'title_week' => 'Tuần này',
                            'title_month' => 'Tháng này',
                            'today_completed' => '2',
                            'today_total' => '3',
                            'week_completed' => '22',
                            'week_total' => '30',
                            'month_completed' => '50',
                            'month_total' => '100',
                            'separate' => '/',
                            'icon' => 'bi-briefcase-fill',
                        ])
                    </div>
                    
                    <div class="sidebarBody_wrapper mt-4">
                        <div class="sidebarBody_card bg-blue-blur">
                            <div class="sidebarBody_heading-wrapper">
                                <h6 class="sidebarBody_heading mt-2 mb-2">
                                    Bản tin tuyển dụng nội bộ
                                </h6>
                            </div>
                            <div class="sidebarBody_card-items-pdf">
                                <div class="sidebarBody_card-items-wrapper mb-2 d-flex align-items-start justify-content-between">
                                    <div class="sidebarBody_card-items-left">
                                        <div class="sidebarBody_card-posts">
                                            <span
                                                >1. Chuyên viên phân tích nghiệp vụ</span
                                            >
                                        </div>
                                        <div class="sidebarBody_card-description">
                                            <div class="sidebarBody_card-text">
                                                JD
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="sidebarBody_card-items-wrapper mb-2 d-flex align-items-start justify-content-between">
                                    <div class="sidebarBody_card-items-left">
                                        <div class="sidebarBody_card-posts">
                                            <span
                                                >2. Nhân viên truyền thông số</span
                                            >
                                        </div>
                                        <div class="sidebarBody_card-description">
                                            <div class="sidebarBody_card-text">
                                                JD
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="sidebarBody_card-items-wrapper mb-2 d-flex align-items-start justify-content-between">
                                    <div class="sidebarBody_card-items-left">
                                        <div class="sidebarBody_card-posts">
                                            <span
                                                >3. Trưởng phòng kinh doanh</span
                                            >
                                        </div>
                                        <div class="sidebarBody_card-description">
                                            <div class="sidebarBody_card-text">
                                                JD
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>                                                    
                            </div>
    
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <span id="btn-right"><i class="bi bi-arrow-bar-right"></i>
        </span>
    </div>
</div>
