@extends('template.master')
@section('title', 'Bảng điều khiển Admin')
@section('content')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js" integrity="sha512-R/QOHLpV1Ggq22vfDAWYOaMd5RopHrJNMxi8/lJu8Oihwi4Ho4BRFeiMiCefn9rasajKjnx9/fTQ/xkWnkDACg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        #half_scr 
        {
            height: 55%;
            padding: 0px 16px 0px 16px;

        }
        #half_scr_up 
        {
            height: 45%;
            border-bottom: 2px solid #DCDCDC;
            padding: 0px 16px 0px 16px;
        }
        .row_title
        {
            font-size: var(--fz-24);
            background-color: rgb(250, 250, 250);
        }
        #dash_board
        {
            margin: 18px 0px 0px 10px;
        }
        #part1, #part4, #part5, #part6
        {
            border-right: 2px solid #DCDCDC;
        }      
        #part4, #part5, #part6, #part7
        {
            padding: 0px 1% 0px 1%;
        }          
        .cards-title-black 
        {
            font-size: var(--fz-16);
            font-weight: 700;
            margin-top:10px;
        }
        .card-title-black
        {
            margin-top: 3px;
        }
        .cards
        {
            background-color: rgb(246, 246, 246);
            border-radius: 2px;
        }
        .card_on
        {
            margin: 20% 5px 5px 5px;
        }
        .card_part6
        {
            padding: 3%;
        }
        .card_borderp1
        {
            border:2px solid rgb(246, 246, 246);
            border-radius: 5px;
        }         
        .kh1{
            /* border: 1px solid red; */
        } 
        .bg-gray
        {
            background-color: rgba(221, 221, 221, 0.3);
        }
        .bg-white
        {
            background-color: rgb(255, 255, 255);
            margin-left: 5px;
            border-bottom: 2px solid rgba(221, 221, 221, 0.3);
        }   
        .cardname 
        {
            font-size: 8px;
            color: #000;
            border-bottom: 2px solid rgb(230, 230, 230);

        }    
        .cardvalue
        {
            font-size: 18px;
        }
        .cardtm 
        {
            position: relative;
            top: 30%;
        }
        .primary
        {
            color: var(--primary-color);
        }
        .mainSection_chart
        {
            width: 100%;
            height: 100px;
        }
        .mainSection_chartp1
        {
            width: 100%;
            height: 150px;
        }
        .mainSection_chartp2
        {
            width: 100%;
            height: 200px;
        }
        .sortline
        {
            height: 5px;
            background-color: #48b9ea;
        }
        .on_line
        {
            height: 5px;
            background-color:  #bbe5f7;
        }
        .all_line
        {
            margin-left: 10%;
            width: 80%;
            height: 7px;
        }
        .textp5
        {
            width: 33%;
        }
    </style>
@endsection
    <div id="mainWrap" class="mainWrap mb-0 ms-0 me-0" style="margin-top: 59px;">
        <div class="mainSection">
            <div class="main p-0">
                <div class="card mb-3" style="height: 1080px;">
                    <div class="" style="margin: 2px">
                        <div class="container-fluid mainSection_heading d-flex row" style="max-height: 60px; background-color:rgba(235, 131, 131, 0.4);">
                            <div class="col header_logo d-flex">
                                <a href="#" class="navbar-brand d-flex align-items-center scrollto me-auto me-lg-0">
                                    <img class="" style="width: 25px; height: 25px; margin-left: 30px;" src="{{ asset('assets/img/hypnotize.svg') }}" />
                                </a>
                            </div>
                            <div class="col d-flex">
                                <div class="">
                                    <img class="" style="width: 40px; height: 40px" src="{{ asset('assets/img/ad_dt.png') }}" />
                                    
                                </div>
                                <div class="">
                                    <strong style="margin-bottom: 0">150M</strong>
                                    <p class="card-title mt-1 " style="text-align: center; font-size: 10px;">Doanh thu</p>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="">
                                    
                                    <img class="" style="width: 40px; height: 40px" src="{{ asset('assets/img/ad_cp.png') }}" />
                                </div>
                                <div class="">
                                    <strong style="margin-bottom: 0">50M</strong>
                                    <p class="card-title mt-1 " style="text-align: center; font-size: 10px;" >Chi phí</p>
                                </div>
                            </div>
                            <div class="col d-flex" >
                                <div class="">
                                    <img class="" style="width: 40px; height: 40px" src="{{ asset('assets/img/ad_sp.png ') }}" />
                                </div>
                                <div class="">
                                    <strong  style="margin-bottom: 0">1000</strong>
                                    <p class="card-title mt-1 " style="text-align: center; font-size: 10px;">Sản phẩm</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <h5 class="mainSection_heading-title" style="color: rgb(203, 11, 11)">
                                    Dashboard Admin
                                </h5>
                            </div>
                            
                            <div class="col d-flex">
                                <div class="">
                                    <img class="" style="width: 40px; height: 40px" src="{{ asset('assets/img/ad_kh.png') }}" />
                                </div>
                                <div class="">
                                    <strong  style="margin-bottom: 0">100</strong>
                                    <p class="card-title mt-1 " style="text-align: center; font-size: 10px;">Khách hàng</p>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="">
                                    <img class="" style="width: 40px; height: 40px" src="{{ asset('assets/img/ad_nv.png') }}" />
                                </div>
                                <div class="">
                                    <strong  style="margin-bottom: 0">100</strong>
                                    <p class="card-title mt-1 " style="text-align: center; font-size: 10px;">Nhân viên</p>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="">
                                    <img class="" style="width: 40px; height: 40px" src="{{ asset('assets/img/ad_htcv.png') }}" />
                                </div>
                                <div class="">
                                    <strong  style="margin-bottom: 0">90%</strong>
                                    <p class="card-title mt-1 " style="text-align: center; font-size: 10px;">Hoàn thành công việc</p>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <a href="/" class="btn btn-danger btn-lg">Về trang chủ</a>
                            </div>
                            
                            
                            
                        </div>
                            {{-- @include('template.components.sectionCard') --}}
                    </div>    
                    <div id="half_scr_up" class="row">
                        <div id="part1" class="col-sm-5 kh1">                            
                            <div class="row" style="height: 10%">
                                <span class="cards-title-black">NHÂN SỰ</span>
                            </div>
                            <div class="row" style="height: 40%">
                                <div class="col-sm-3 text-center" style="padding: 1%">
                                    <div class="col card_borderp1" style="height: 100%">                                    
                                        <span class="card-title-black text-center">Nhân sự tuyển mới</span>
                                        <div class="mainSection_chart mt-3">
                                            <canvas id="admin_NhanSuTuyenMoi"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding: 1%">
                                    <div class="cards" style="height: 100%">
                                        <div class="row" style="height: 20%">
                                            <span class="card-title-black text-center">Nhân sự chấm công</span>
                                        </div>
                                        <div class="row" style="height: 80%">
                                            <div class="col-sm-6">
                                                <div class="card text-center card_on">
                                                    <span class="overText card-title cardname" data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" title="Số nhân sự vi phạm chấm công">
                                                        Số nhân sự vi phạm chấm công
                                                    </span>
                                                    <strong class="card-body cardvalue">10</strong>
                                                </div>  
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card text-center card_on">
                                                    <span class="overText card-title cardname" data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" title="Số lượt vi phạm chấm công">
                                                        Số lượt vi phạm chấm công
                                                    </span>
                                                    <strong class="card-body cardvalue">50</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 text-center" style="padding: 1%">
                                    <div class="card_borderp1" style="height: 100%">
                                        <span class="card-title-black text-center">Nhân sự Online/Offline</span>
                                        <div class="mainSection_chart mt-3">
                                            <canvas id="admin_NhanSuOnOff"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding: 1%">
                                    <div class="cards" style="height: 100%">
                                        <div class="row" style="height: 20%">
                                            <span class="card-title-black text-center">Lượt công tác</span>
                                        </div>
                                        <div class="row" style="height: 80%">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-6">
                                                <div class="card text-center card_on">
                                                    <span class="overText card-title cardname" data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" title="Số lượt công tác đã thực hiện">
                                                        Lượt công tác
                                                    </span>
                                                    <strong class="card-body cardvalue">10</strong>
                                                </div>  
                                            </div>
                                            <div class="col-sm-3"></div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="height: 50%" >
                                <div class="col-sm-6 text-center" style="padding: 1%">
                                    <div class="card_borderp1">
                                        <span class="card-title-black text-center">Số nhân sự kinh doanh theo vùng</span>
                                        <div class="mainSection_chartp1 mt-3">
                                            <canvas id="admin_KDTheoVung"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-center" style="padding: 1%">
                                    <div class="card_borderp1">
                                        <span class="card-title-black text-center">Số nhân sự kinh doanh địa bàn</span>
                                        <div class="mainSection_chartp1 mt-3">
                                            <canvas id="admin_KDTheoDiaBan"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="part2" class="col-sm-5 kh1">
                            <div class="row" style="height: 10%">
                                <span class="cards-title-black">DOANH SỐ</span>
                            </div>
                            <div class="row" style="height: 45%">
                                <div class="col-sm-12 text-center">
                                    <div class="card_borderp1">
                                        <span class="card-title-black text-center">Tình hình doanh số</span>
                                        <div class="mainSection_chartp1 mt-3">
                                            <canvas id="admin_TinhHinhDoanhSo"></canvas>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row" style="height: 45%">
                                <div class="col-sm-6 text-center">
                                    <div class="card_borderp1">
                                        <span class="card-title-black text-center">Tình hình doanh số theo kênh</span>
                                        <div class="mainSection_chartp1 mt-3">
                                            <canvas id="admin_DoanhSoTheoKenh"></canvas>
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-sm-6 text-center">
                                    <div class="card_borderp1">
                                        <span class="card-title-black text-center">Doanh số luỹ kế tháng</span>
                                        <div class="mainSection_chartp1 mt-3">
                                            <canvas id="admin_DoanhSoLuyKeThang"></canvas>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <div id="part3" class="col-sm-2 kh1">
                            <div class="row" style="height: 30%; padding:2%">
                                <div class="card_borderp1">
                                    <span class="card-title-black text-center">Doanh số theo kênh</span>
                                    <div class="mainSection_chart mt-3">
                                        <canvas id="admin_D_DoanhSoTheoKenh"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="height: 30%; padding:2%">
                                <div class="card_borderp1">
                                    <span class="card-title-black text-center">Doanh số theo vùng </span>
                                    <div class="mainSection_chart mt-3">
                                        <canvas id="admin_D_DoanhSoTheoVung"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="height: 30%; padding:2%">
                                <div class="card_borderp1">
                                    <span class="card-title-black text-center">Doanh số theo địa bàn</span>
                                    <div class="mainSection_chart mt-3">
                                        <canvas id="admin_D_DoanhSoTheoDiaBan"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="half_scr" class="row">
                        <div id="part4" class="col-sm-5 kh1">
                            <div class="row" style="height: 7%">
                                <span class="cards-title-black">SKU</span>
                            </div>
                            <div class="row" style="height: 45%">
                                <div class="col-sm-6">
                                    <div class="card_borderp1">
                                        <span class="card-title-black text-center">Tỷ trọng doanh số SKU</span>
                                        <div class="mainSection_chartp2 mt-3">
                                            <canvas id="admin_DoanhSoSKU"></canvas>
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-sm-6">
                                    <div class="card_borderp1">
                                        <span class="card-title-black text-center">Tỷ trọng sản lượng</span>
                                        <div class="mainSection_chartp2 mt-3">
                                            <canvas id="admin_TyTrongSanLuong"></canvas>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row" style="height: 45%">
                                <div class="col-sm-5">
                                    <span class="cards-title-black">CẢNH BÁO HÀNG HOÁ</span>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SKU <br></th>
                                                <th>Tồn kho</th>
                                                <th>Hàng cận date</th>
                                                <th>Hàng hỏng</th>
                                                <th>Hàng lỗi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>SKU1<br>(Hộp)</td>
                                                <td>50</td>
                                                <td>5</td>
                                                <td>0</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>SKU2<br>(Hộp)</td>
                                                <td>50</td>
                                                <td>5</td>
                                                <td>0</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>SKU3<br>(Hộp)</td>
                                                <td>50</td>
                                                <td>5</td>
                                                <td>0</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>SKU4<br>(Hộp)</td>
                                                <td>50</td>
                                                <td>5</td>
                                                <td>0</td>
                                                <td>100</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>  
                                <div class="col-sm-7">
                                    <span class="cards-title-black">ĐỘ PHÙ SKU</span>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Vùng 1</th>
                                                <th>Vùng 2</th>
                                                <th>Vùng 3</th>
                                                <th>Vùng 4</th>
                                                <th>Vùng 5</th>
                                                <th>Vùng 6</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>SKU1<br>(Hộp)</td>
                                                <td>50</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>0</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>SKU2<br>(Hộp)</td>
                                                <td>50</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>0</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>SKU3<br>(Hộp)</td>
                                                <td>50</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>0</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>SKU4<br>(Hộp)</td>
                                                <td>50</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>0</td>
                                                <td>100</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>  
                            </div>
                        </div>
                        <div id="part5" class="col-sm-2">
                            <div class="row" style="height: 7%">
                                <span class="cards-title-black">KHÁCH HÀNG</span>
                            </div>
                            <div class="row" style="height: 40%" style="padding: 1%">
                                <div class="card_borderp1" style="padding: 2%">
                                    Bản đồ
                                    <div class="col-lg-12">
                                        <div class="layout_120">
                                            <span class="fw-bold fs-4">Địa chỉ:</span>
                                            <span class="fs-4"
                                                id="addressTxt">Hà Đông, Hà Nội</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4">
                                        <div id="map" class="border"
                                            style="height: 150px; display: block">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="height: 20%; margin-top:10px">
                                <div class="card card_borderp1">
                                    <span class="card-title-black">Số công nợ</span>
                                    <div class="d-flex flex-nowrap" style="margin-top:15px">
                                        <div class="text-center textp5">Quá hạn: 75</div>
                                        <div class="text-center textp5">75%</div>
                                        <div class="text-center textp5">Hiện có: 100</div>
                                    </div>
                                    <div class="d-flex flex-nowrap all_line">
                                        <div class="sortline" style="width:{{ 75 }}%;"></div>
                                        <div class="on_line" style="width:{{ 100-75 }}%;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="height: 28%; margin-top:10px">
                                <div class="card_borderp1">
                                    <span class="card-title-black text-center">Số khách đặt hàng</span>
                                    <div class="mainSection_chart mt-3">
                                        <canvas id="admin_SoKhachDatHang"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="part6" class="col-sm-3 kh1">
                            <div class="row" style="height: 7%">
                                <span class="cards-title-black">SỐ ĐƠN VÀ ĐỊA BÀN</span>
                            </div>
                            <div class="" style="padding: 2%" >
                                <div class="row cards text-center" style="height: 30%;">
                                    <div class="col-sm-12" style="height: 10%">
                                        <span class="card-title-black">Số đơn</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card text-center card_on">
                                            <span class="overText card-title cardname" data-bs-toggle="tooltip" 
                                                data-bs-placement="top" title="Số đơn hàng đặt">
                                                Đơn hàng đặt
                                            </span>
                                            <strong class="card-body cardvalue">999+</strong>
                                        </div> 
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card text-center card_on">
                                            <span class="overText card-title cardname" data-bs-toggle="tooltip" 
                                                data-bs-placement="top" title="Số đơn từ chối">
                                                Đơn từ chối
                                            </span>
                                            <strong class="card-body cardvalue">10</strong>
                                        </div> 
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card text-center card_on">
                                            <span class="overText card-title cardname" data-bs-toggle="tooltip" 
                                                data-bs-placement="top" title="Số đơn bán hàng">
                                                Đơn bán hàng
                                            </span>
                                            <strong class="card-body cardvalue">500</strong>
                                        </div> 
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card text-center card_on">
                                            <span class="overText card-title cardname" data-bs-toggle="tooltip" 
                                                data-bs-placement="top" title="Số đơn đổi trả">
                                                Đơn đổi trả
                                            </span>
                                            <strong class="card-body cardvalue">05</strong>
                                        </div> 
                                    </div>
                                </div>
                            </div> 
                            <div class="row" style="height: 25%">
                                <div class="col-sm-8">
                                    <div class="text-center cards">
                                        <div class="row" style="height: 20%;">
                                            <span class="card-title-black">Số địa bàn</span>
                                        </div>
                                        <div class="row" style="height: 80%">
                                            <div class="col-sm-4">
                                                <div class="card text-center card_on">
                                                    <span class="overText card-title cardname" data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" title="Không hoàn thành chỉ tiêu doanh số">
                                                        Không hoàn thành chỉ tiêu doanh số
                                                    </span>
                                                    <strong class="card-body cardvalue">10</strong>
                                                </div>  
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card text-center card_on">
                                                    <span class="overText card-title cardname" data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" title="Không hoàn thành chỉ tiêu độ phù">
                                                        Không hoàn thành chỉ tiêu độ phù
                                                    </span>
                                                    <strong class="card-body cardvalue">50</strong>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card text-center card_on">
                                                    <span class="overText card-title cardname" data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" title="Không phát sinh giao dịch trong 3 ngày">
                                                        Không phát sinh giao dịch trong 3 ngày
                                                    </span>
                                                    <strong class="card-body cardvalue">50</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 ">
                                    <div class="cards">
                                        <div class="row" style="height: 20%">
                                            <span class="card-title-black text-center">Sự cố vi phạm</span>
                                        </div>
                                        <div class="row" style="height: 80%">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-8">
                                                <div class="card text-center card_on">
                                                    <span class="card-title cardname" data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" title="Số sự cố vi phạm ở địa bàn">
                                                        Sự cố vi phạm
                                                    </span>
                                                    <strong class="card-body cardvalue">02</strong>
                                                </div>  
                                            </div>
                                            <div class="col-sm-2"></div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="height: 7%">
                                <span class="cards-title-black">HOẠT ĐỘNG MARKETING</span>
                            </div>
                            <div class="row text-center" style="height: 30%">
                                <div class="col-sm-6">
                                    <div class="row card_part6" style="height: 50%;">
                                        <div class="card">
                                            <span class="card-title-black">Số ca đào tạo tháng này</span>
                                            <span class="card-subtitle">75%</span>
                                            <div class="d-flex flex-nowrap all_line">
                                                <div class="sortline" style="width:{{ 75 }}%;"></div>
                                                <div class="on_line" style="width:{{ 100-75 }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row card_part6" style="height: 50%">
                                        <div class="card">
                                            <span class="card-title-black">Số ca activation tháng này</span>
                                            <span class="card-subtitle">75%</span>
                                            <div class="d-flex flex-nowrap all_line">
                                                <div class="sortline" style="width:{{ 75 }}%;"></div>
                                                <div class="on_line" style="width:{{ 100-75 }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row card_part6" style="height: 50%">
                                        <div class="card">
                                            <span class="card-title-black">Số biên bản tháng này</span>
                                            <span class="card-subtitle">75%</span>
                                            <div class="d-flex flex-nowrap all_line">
                                                <div class="sortline" style="width:{{ 75 }}%;"></div>
                                                <div class="on_line" style="width:{{ 100-75 }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row card_part6" style="height: 50%">
                                        <div class="card">
                                            <span class="card-title-black">Số khách hàng đã trưng bày</span>
                                            <span class="card-subtitle">75%</span>
                                            <div class="d-flex flex-nowrap all_line">
                                                <div class="sortline" style="width:{{ 75 }}%;"></div>
                                                <div class="on_line" style="width:{{ 100-75 }}%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="part7" class="col-sm-2 kh1">
                            <div class="row" style="height: 7%">
                                <span class="cards-title-black">BẢN ĐỒ ĐỊNH VỊ</span>

                            </div>
                            <div class="row" style="height: 45%">
                                <div class="card_borderp1" style="padding: 2%">
                                    Đơn hàng hôm nay
                                    {{-- <img style="width:90%; height: 90%" src="{{ asset('assets/img/admin_map.png') }}" /> --}}
                                    <div class="col-lg-12">
                                        <div class="layout_120">
                                            <span class="fw-bold fs-4">Địa chỉ:</span>
                                            <span class="fs-4"
                                                id="addressTxt1">Hai Bà Trưng, Hà Nội</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4">
                                        <div id="map1" class="border"
                                            style="height: 180px; display: block">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="height: 45%; margin-top:10px">
                                <div class="card_borderp1" style="padding: 2%">
                                    Vị trí hôm nay
                                    {{-- <img style="width:90%; height: 90%" src="{{ asset('assets/img/admin_map.png') }}" /> --}}
                                    <div class="col-lg-12">
                                        <div class="layout_120">
                                            <span class="fw-bold fs-4">Địa chỉ:</span>
                                            <span class="fs-4"
                                                id="addressTxt2">219 Phố Trung Kính, Cầu Giấy, Hà Nội</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-4">
                                        <div id="map2" class="border"
                                            style="height: 160px; display: block">
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



@endsection
@section('footer-script')
    <script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/custom-datatable.js') }}"></script>


    <!-- ChartJS -->
    <script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chart.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('assets/plugins/chartjs/chartjs-plugin-stacked100@1.0.0.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('assets/plugins/chartjs/chartjs-plugin-datalabels@2.0.0.js') }}"></script>

    <script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>


    <!--Charts JS -->   
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdmin/admin_NhanSuOnOff.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdmin/admin_KDTheoVung.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdmin/admin_KDTheoDiaBan.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdmin/admin_TinhHinhDoanhSo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdmin/admin_DoanhSoTheoKenh.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdmin/admin_DoanhSoLuyKeThang.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdmin/admin_D_DoanhSoTheoKenh.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdmin/admin_D_DoanhSoTheoVung.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdmin/admin_D_DoanhSoTheoDiaBan.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdmin/admin_DoanhSoSKU.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdmin/admin_TyTrongSanLuong.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdmin/admin_SoKhachDatHang.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/js/chart/DashboardAdmin/admin_NhanSuTuyenMoi.js') }}"></script>

    {{-- Slick --}}
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
 
   
    {{-- <script>
            document.addEventListener('DOMContentLoaded', function () {
                const select = document.getElementById('select');
                const chartContainers = document.querySelectorAll('.chart-container');

                select.addEventListener('change', function () {
                    chartContainers.forEach(function (container) {
                        container.style.display = 'none';
                    });

                    const selectedChartContainer = document.getElementById(select.value + 'Container');
                    selectedChartContainer.style.display = 'block';
                });
            });
    </script> --}}

    {{-- <script src="{{ asset('/assets/js/chart_hopgiaoban/doughnutChiSo.js') }}"></script> --}}
    <script>
        $('#khoLuuTruBienBanHop').DataTable({
            paging: false,
            ordering: false,
            language: {
                info: 'Hiển thị _START_ đến _END_ trên _TOTAL_ biên bản họp',
                infoEmpty: 'Hiện tại chưa có biên bản họp nào',
                search: 'Tìm kiếm biên bản',
                paginate: {
                    previous: '<i class="bi bi-caret-left-fill"></i>',
                    next: '<i class="bi bi-caret-right-fill"></i>',
                },
                search: '',
                searchPlaceholder: 'Tìm kiếm biên bản họp...',
                zeroRecords: 'Không tìm thấy kết quả',
            },
            oLanguage: {
                sLengthMenu: 'Hiển thị _MENU_ biên bản họp',
            },
            dom: '<"d-flex justify-content-between align-items-center mb-3"<"card-title-wrapper-left"><"d-flex "f>>rt<"dataTables_bottom  justify-content-end"p>',
        });

        $('div.card-titles-wrapper').html(`
            <div class="card-title">Thông số</div>
        `);

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

<script>
    $(document).ready(function() {
        var apiKey = "b5b7553f4280465482f4a03273fb8813";
        var map1;
        var marker;
        var address1 = $("#addressTxt1").text().trim();
        $("#map1").show();
        geocodeAddress(address1);

        // Function to geocode address
        function geocodeAddress(address1) {
            $.ajax({
                url: 'https://api.opencagedata.com/geocode/v1/json',
                method: 'GET',
                dataType: 'json',
                data: {
                    q: address1,
                    key: apiKey
                },
                success: function(response) {
                    if (response.total_results > 0) {
                        var latitude = response.results[0].geometry.lat;
                        var longitude = response.results[0].geometry.lng;

                        // Display map
                        if (!map1) {
                            map1 = L.map('map1').setView([latitude, longitude], 13);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

                            }).addTo(map1);
                        } else {
                            map1.setView([latitude, longitude], 13);
                        }

                        // Add or update marker
                        if (!marker) {
                            marker = L.marker([latitude, longitude]).addTo(map1);
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

<script>
    $(document).ready(function() {
        var apiKey = "b5b7553f4280465482f4a03273fb8813";
        var map2;
        var marker;
        var address2 = $("#addressTxt2").text().trim();
        $("#map2").show();
        geocodeAddress(address2);

        // Function to geocode address
        function geocodeAddress(address2) {
            $.ajax({
                url: 'https://api.opencagedata.com/geocode/v1/json',
                method: 'GET',
                dataType: 'json',
                data: {
                    q: address2,
                    key: apiKey
                },
                success: function(response) {
                    if (response.total_results > 0) {
                        var latitude = response.results[0].geometry.lat;
                        var longitude = response.results[0].geometry.lng;

                        // Display map
                        if (!map2) {
                            map2 = L.map('map2').setView([latitude, longitude], 13);
                            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {

                            }).addTo(map2);
                        } else {
                            map2.setView([latitude, longitude], 13);
                        }

                        // Add or update marker
                        if (!marker) {
                            marker = L.marker([latitude, longitude]).addTo(map2);
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        //load data tỉnh thành từ https://provinces.open-api.vn/api/
        const host = "https://provinces.open-api.vn/api/";
        var callAPI = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data, "city");
                });
        }
        callAPI('https://provinces.open-api.vn/api/?depth=1');
        var callApiDistrict = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data.districts, "district");
                    // $('#district').selectpicker('destroy');
                });
        }
        var callApiWard = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData(response.data.wards, "guide");
                    // $('#guide').selectpicker('destroy');
                });
        }

        var renderData = (array, select) => {
            $('#' + select).selectpicker('destroy');
            let row = '<option disable value="">Chọn</option>';
            array.forEach(element => {
                row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
            });
            document.querySelector("#" + select).innerHTML = row;
            $('#' + select).selectpicker();
        }

        $("#city").change(() => {
            callApiDistrict(host + "p/" + $("#city").find(':selected').data('id') + "?depth=2");
        });
        $("#district").change(() => {
            callApiWard(host + "d/" + $("#district").find(':selected').data('id') + "?depth=2");
        });
        $("#guide").change(() => {})


        //sua dia chi cho edit
        var callAPI_edit = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData_edit(response.data, "city_edit");
                });
        }
        callAPI_edit('https://provinces.open-api.vn/api/?depth=1');
        var callApiDistrict_edit = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData_edit(response.data.districts, "district_edit");
                });
        }
        var callApiWard_edit = (api) => {
            return axios.get(api)
                .then((response) => {
                    renderData_edit(response.data.wards, "guide_edit");
                });
        }

        var renderData_edit = (array, select) => {
            $('#' + select).selectpicker('destroy');
            let row = '<option disable value="">Chọn</option>';
            array.forEach(element => {
                row += `<option data-id="${element.code}" value="${element.name}">${element.name}</option>`
            });
            document.querySelector("#" + select).innerHTML = row;
            $('#' + select).selectpicker();
        }

        $("#city_edit").change(() => {
            callApiDistrict_edit(host + "p/" + $("#city_edit").find(':selected').data('id') + "?depth=2");
        });
        $("#district_edit").change(() => {
            callApiWard_edit(host + "d/" + $("#district_edit").find(':selected').data('id') + "?depth=2");
        });
        $("#guide_edit").change(() => {})



        //load data nhan su api
        function loadPersonnelData() {
            const apiUrl = '/nhan_su';
            const selectElement = document.getElementById('personId');
            fetch(apiUrl)
                .then((response) => response.json())
                .then((data) => {
                    selectElement.innerHTML = '';
                    data.forEach((person) => {
                        const option = document.createElement('option');
                        option.value = person.id;
                        option.textContent = person.name;
                        selectElement.appendChild(option);
                    });

                    $('#personId').selectpicker('refresh');
                })
                .catch((error) => console.error('Lỗi khi gọi API:', error));
        }
        window.addEventListener('load', loadPersonnelData);

        //load data san pham api
        function loadProductData() {
            const apiUrl = '/danh_sach_san_pham_cho_select';
            const selectElement = document.getElementById('productId');
            fetch(apiUrl)
                .then((response) => response.json())
                .then((data) => {
                    selectElement.innerHTML = '';
                    data.forEach((product) => {
                        const option = document.createElement('option');
                        option.value = product.id;
                        option.textContent = product.name;
                        selectElement.appendChild(option);
                    });

                    $('#productId').selectpicker('refresh');
                })
                .catch((error) => console.error('Lỗi khi gọi API:', error));
        }
        window.addEventListener('load', loadProductData);

        //load data kenh api
        function loadChanelData() {
            const apiUrl = '/department_getAll';
            const selectElement = document.getElementById('chanelId');
            fetch(apiUrl)
                .then((response) => response.json())
                .then((data) => {
                    selectElement.innerHTML = '';
                    data.forEach((chanel) => {
                        const option = document.createElement('option');
                        option.value = chanel.id;
                        option.textContent = chanel.name;
                        selectElement.appendChild(option);
                    });

                    $('#chanelId').selectpicker('refresh');
                })
                .catch((error) => console.error('Lỗi khi gọi API:', error));
        }
        window.addEventListener('load', loadChanelData);

        //load data tuyen api
        function loadRouteData() {
            const apiUrl = '/route_direction_getAll';
            const selectElement = document.getElementById('routeId');
            fetch(apiUrl)
                .then((response) => response.json())
                .then((data) => {
                    selectElement.innerHTML = '';
                    data.forEach((route) => {
                        const option = document.createElement('option');
                        option.value = route.id;
                        option.textContent = route.name;
                        selectElement.appendChild(option);
                    });

                    $('#routeId').selectpicker('refresh');
                })
                .catch((error) => console.error('Lỗi khi gọi API:', error));
        }
        window.addEventListener('load', loadRouteData);

        var isAdvancedUpload = function() {
            var div = document.createElement('div');
            return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window &&
                'FileReader' in window;
        }();

        let draggableFileArea = document.querySelector(".drag-file-area");
        let browseFileText = document.querySelector(".browse-files");
        let uploadIcon = document.querySelector(".upload-icon");
        let dragDropText = document.querySelector(".dynamic-message");
        let fileInput = document.querySelector(".default-file-input");
        let cannotUploadMessage = document.querySelector(".cannot-upload-message");
        let cancelAlertButton = document.querySelector(".cancel-alert-button");
        let uploadedFile = document.querySelector(".file-block");
        let fileName = document.querySelector(".file-name");
        let fileSize = document.querySelector(".file-size");
        let progressBar = document.querySelector(".progress-bar");
        let removeFileButton = document.querySelector(".remove-file-icon");
        let uploadButton = document.querySelector(".upload-button");
        let fileFlag = 0;

        fileInput.addEventListener("click", () => {
            fileInput.value = '';
            console.log(fileInput.value);
        });

        fileInput.addEventListener("change", e => {
            console.log(" > " + fileInput.value)
            uploadIcon.innerHTML = 'Tải file lên';
            dragDropText.innerHTML = 'File Dropped Successfully!';
            document.querySelector(".label").innerHTML =
                `<input type="file" class="default-file-input" style=""/>`;
            uploadButton.innerHTML = `Upload`;
            fileName.innerHTML = fileInput.files[0].name;
            fileSize.innerHTML = (fileInput.files[0].size / 1024).toFixed(1) + " KB";
            uploadedFile.style.cssText = "display: flex;";
            progressBar.style.width = 0;
            fileFlag = 0;
        });

        uploadButton.addEventListener("click", () => {
            let isFileUploaded = fileInput.value;
            if (isFileUploaded != '') {
                if (fileFlag == 0) {
                    fileFlag = 1;
                    var width = 0;
                    var id = setInterval(frame, 50);

                    function frame() {
                        if (width >= 390) {
                            clearInterval(id);
                            uploadButton.innerHTML =
                                `<span class="material-icons-outlined upload-button-icon"> check_circle </span> Uploaded`;
                        } else {
                            width += 5;
                            progressBar.style.width = width + "px";
                        }
                    }
                }
            } else {
                cannotUploadMessage.style.cssText = "display: flex; animation: fadeIn linear 1.5s;";
            }
        });

        cancelAlertButton.addEventListener("click", () => {
            cannotUploadMessage.style.cssText = "display: none;";
        });

        if (isAdvancedUpload) {
            ["drag", "dragstart", "dragend", "dragover", "dragenter", "dragleave", "drop"].forEach(evt =>
                draggableFileArea.addEventListener(evt, e => {
                    e.preventDefault();
                    e.stopPropagation();
                })
            );

            ["dragover", "dragenter"].forEach(evt => {
                draggableFileArea.addEventListener(evt, e => {
                    e.preventDefault();
                    e.stopPropagation();
                    uploadIcon.innerHTML = 'file_download';
                    dragDropText.innerHTML = 'Drop your file here!';
                });
            });

            draggableFileArea.addEventListener("drop", e => {
                uploadIcon.innerHTML = 'check_circle';
                dragDropText.innerHTML = 'File Dropped Successfully!';
                // document.querySelector(".label").innerHTML =
                //     `drag & drop or <span class="browse-files"> <input type="file" class="default-file-input" style=""/> <span class="browse-files-text" style="top: -23px; left: -20px;"> browse file</span> </span>`;
                uploadButton.innerHTML = `Upload`;

                let files = e.dataTransfer.files;
                fileInput.files = files;
                console.log(files[0].name + " " + files[0].size);
                console.log(document.querySelector(".default-file-input").value);
                fileName.innerHTML = files[0].name;
                fileSize.innerHTML = (files[0].size / 1024).toFixed(1) + " KB";
                uploadedFile.style.cssText = "display: flex;";
                progressBar.style.width = 0;
                fileFlag = 0;
            });
        }

        removeFileButton.addEventListener("click", () => {
            uploadedFile.style.cssText = "display: none;";
            fileInput.value = '';
            uploadIcon.innerHTML = 'file_upload';
            dragDropText.innerHTML = 'Drag & drop any file here';
            document.querySelector(".label").innerHTML =
                `or <span class="browse-files"> <input type="file" class="default-file-input"/> <span class="browse-files-text">browse file</span> <span>from device</span> </span>`;
            uploadButton.innerHTML = `Upload`;
        });
    </script>


@endsection
