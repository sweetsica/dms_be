@extends('template.master')
@section('title', 'Bảng điều khiển Admin')
@section('content')
@section('header-style')
    <style>
        #half_scr 
        {
            height: 50%;
        }
        #half_scr_up 
        {
            height: 50%;
            border-bottom: 2px solid #DCDCDC;
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
        .testkh{
            /* border: 1px solid blueviolet; */
        }  
        .testkh1{
            /* border: 1px solid red; */
            padding: 2%;
        }   
        .testkh2{
            /* border: 1px solid black; */
        }    
        .testkh3{
            border: 1px solid yellowgreen;
        } 
        .testkh4{
            border: 1px solid yellow;
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
                <div class="card mb-3 testkh" style="height: 1200px;">    
                    <div id="half_scr_up" class="row testkh">
                        <div id="part1" class="col-sm-5 testkh1">
                            <div class="row row_title testkh2" style="height: 15%">
                                <strong id="dash_board" class="">
                                    DASHBOARD
                                </strong>
                            </div>
                            <div class="row testkh2" style="height: 10%">
                                <span class="cards-title-black">NHÂN SỰ</span>
                            </div>
                            <div class="row testkh2" style="height: 30%">
                                <div class="col-sm-3 text-center" style="padding: 1%">
                                    <div class="col card_borderp1">                                    
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
                                                    <span class="card-title cardname" data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" title="Số nhân sự vi phạm chấm công">
                                                        Nhân sự vi phạm
                                                    </span>
                                                    <strong class="card-body cardvalue">10</strong>
                                                </div>  
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card text-center card_on">
                                                    <span class="card-title cardname" data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" title="Số lượt vi phạm chấm công">
                                                        Lượt vi phạm
                                                    </span>
                                                    <strong class="card-body cardvalue">50</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 text-center" style="padding: 1%">
                                    <div class="card_borderp1">
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
                                                    <span class="card-title cardname" data-bs-toggle="tooltip" 
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
                            <div class="row testkh2" style="height: 45%" >
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
                        <div id="part2" class="col-sm-5 testkh1">
                            <div class="row testkh2" style="height: 10%">
                                <span class="cards-title-black">DOANH SỐ</span>
                            </div>
                            <div class="row testkh2" style="height: 45%">
                                <div class="col-sm-12 text-center">
                                    <div class="card_borderp1">
                                        <span class="card-title-black text-center">Tình hình doanh số</span>
                                        <div class="mainSection_chartp1 mt-3">
                                            <canvas id="admin_TinhHinhDoanhSo"></canvas>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row testkh2" style="height: 45%">
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
                        <div id="part3" class="col-sm-2 testkh1">
                            <div class="row testkh2" style="height: 33%; padding:2%">
                                <div class="card_borderp1">
                                    <span class="card-title-black text-center">Doanh số theo kênh</span>
                                    <div class="mainSection_chart mt-3">
                                        <canvas id="admin_D_DoanhSoTheoKenh"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="row testkh2" style="height: 33%; padding:2%">
                                <div class="card_borderp1">
                                    <span class="card-title-black text-center">Doanh số theo vùng </span>
                                    <div class="mainSection_chart mt-3">
                                        <canvas id="admin_D_DoanhSoTheoVung"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="row testkh2" style="height: 33%; padding:2%">
                                <div class="card_borderp1">
                                    <span class="card-title-black text-center">Doanh số theo địa bàn</span>
                                    <div class="mainSection_chart mt-3">
                                        <canvas id="admin_D_DoanhSoTheoDiaBan"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="half_scr" class="row testkh">
                        <div id="part4" class="col-sm-5 testkh1">
                            <div class="row testkh2" style="height: 10%">
                                <span class="cards-title-black">SKU</span>
                            </div>
                            <div class="row testkh2" style="height: 45%">
                                <div class="col-sm-6">
                                    <div class="card_borderp1">
                                        <span class="card-title-black text-center">Tỷ trọng doanh số SKU</span>
                                        <div class="mainSection_chartp1 mt-3">
                                            <canvas id="admin_DoanhSoSKU"></canvas>
                                        </div>
                                    </div>
                                </div>  
                                <div class="col-sm-6">
                                    <div class="card_borderp1">
                                        <span class="card-title-black text-center">Tỷ trọng sản lượng</span>
                                        <div class="mainSection_chartp1 mt-3">
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
                                                <th>SKU</th>
                                                <th>Tồn kho</th>
                                                <th>Hàng cận date</th>
                                                <th>Hàng hỏng</th>
                                                <th>Hàng lỗi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>SKU1</td>
                                                <td>50</td>
                                                <td>5</td>
                                                <td>0</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>SKU2</td>
                                                <td>50</td>
                                                <td>5</td>
                                                <td>0</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>SKU3</td>
                                                <td>50</td>
                                                <td>5</td>
                                                <td>0</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>SKU4</td>
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
                                                <td>SKU1</td>
                                                <td>50</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>0</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>SKU2</td>
                                                <td>50</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>0</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>SKU3</td>
                                                <td>50</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>5</td>
                                                <td>0</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>SKU4</td>
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
                        <div id="part5" class="col-sm-2 testkh1">
                            <div class="row" style="height: 10%">
                                <span class="cards-title-black">KHÁCH HÀNG</span>
                            </div>
                            <div class="row" style="height: 40%" style="padding: 1%">
                                <div class="card_borderp1" style="padding: 2%">
                                    Bản đồ
                                    <img style="width:90%; height: 90%" src="{{ asset('assets/img/admin_map.png') }}" />
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
                            <div class="row" style="height: 30%; margin-top:10px">
                                <div class="card_borderp1">
                                    <span class="card-title-black text-center">Số khách đặt hàng</span>
                                    <div class="mainSection_chart mt-3">
                                        <canvas id="admin_SoKhachDatHang"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="part6" class="col-sm-3 testkh1">
                            <div class="row testkh2" style="height: 10%">
                                <span class="cards-title-black">SỐ ĐƠN VÀ ĐỊA BÀN</span>
                            </div>
                            <div class="" style="padding: 2%">
                                <div class="row cards text-center " style="height: 25%;">
                                    <div class="col-sm-12" style="height: 10%">
                                        <span class="card-title-black">Số đơn</span>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card text-center card_on">
                                            <span class="card-title cardname" data-bs-toggle="tooltip" 
                                                data-bs-placement="top" title="Số đơn hàng đặt">
                                                Đơn hàng đặt
                                            </span>
                                            <strong class="card-body cardvalue">999+</strong>
                                        </div> 
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card text-center card_on">
                                            <span class="card-title cardname" data-bs-toggle="tooltip" 
                                                data-bs-placement="top" title="Số đơn từ chối">
                                                Đơn từ chối
                                            </span>
                                            <strong class="card-body cardvalue">10</strong>
                                        </div> 
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card text-center card_on">
                                            <span class="card-title cardname" data-bs-toggle="tooltip" 
                                                data-bs-placement="top" title="Số đơn bán hàng">
                                                Đơn bán hàng
                                            </span>
                                            <strong class="card-body cardvalue">500</strong>
                                        </div> 
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card text-center card_on">
                                            <span class="card-title cardname" data-bs-toggle="tooltip" 
                                                data-bs-placement="top" title="Số đơn đổi trả">
                                                Đơn đổi trả
                                            </span>
                                            <strong class="card-body cardvalue">05</strong>
                                        </div> 
                                    </div>
                                </div>
                            </div> 
                            <div class="row testkh2" style="height: 25%">
                                <div class="col-sm-8">
                                    <div class="text-center cards">
                                        <div class="row" style="height: 20%;">
                                            <span class="card-title-black">Số địa bàn</span>
                                        </div>
                                        <div class="row" style="height: 80%">
                                            <div class="col-sm-4">
                                                <div class="card text-center card_on">
                                                    <span class="card-title cardname" data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" title="Không hoàn thành chỉ tiêu doanh số">
                                                        Không hoàn thành
                                                    </span>
                                                    <strong class="card-body cardvalue">10</strong>
                                                </div>  
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card text-center card_on">
                                                    <span class="card-title cardname" data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" title="Không hoàn thành chỉ tiêu độ phù">
                                                        Không hoàn thành
                                                    </span>
                                                    <strong class="card-body cardvalue">50</strong>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card text-center card_on">
                                                    <span class="card-title cardname" data-bs-toggle="tooltip" 
                                                        data-bs-placement="top" title="Không phát sinh giao dịch trong 3 ngày">
                                                        Không phát sinh
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
                            <div class="row" style="height: 10%">
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
                        <div id="part7" class="col-sm-2 testkh1">
                            <div class="row testkh2" style="height: 10%">
                                <span class="cards-title-black">BẢN ĐỒ ĐỊNH VỊ</span>

                            </div>
                            <div class="row testkh2" style="height: 45%">
                                <div class="card_borderp1" style="padding: 2%">
                                    Đơn hàng hôm nay
                                    <img style="width:95%; height: 95%" src="{{ asset('assets/img/admin_map.png') }}" />
                                </div>
                            </div>
                            <div class="row testkh2" style="height: 45%; margin-top:10px">
                                <div class="card_borderp1" style="padding: 2%">
                                    Vị trí hôm nay
                                    <img style="width:95%; height: 95%" src="{{ asset('assets/img/admin_map.png') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>

        <input type="hidden" name="" value="asset('/assets/js/chart/MapChartVN/vn-all.topo.json')" id="getmapvn">           
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

@endsection
