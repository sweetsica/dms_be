@extends('template.master')
@section('title', 'Danh sách khách hàng')
@section('header-style')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
    integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
    crossorigin="" />
<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
    integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
    crossorigin=""></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Thư viện leaflet-routing-machine -->
<!-- <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.css"
    integrity="sha512-Y4KTUPYQqtzTqfbTIAAEc6UJuhWK1HzVXYpxF47P8gtlItsmYa9oO8n7s5hAN6rYzHhND4a2x4Smu1B05q7Rw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"
    integrity="sha512-PbX1SOVzT8uS3dGhBbUZVo+TM8kIGohv/HOpY6PnBhQtMkMCf0/Kw3Ft2f69qBQ4Q0zm7JwAqmYUZEGM74PSw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script>
    var mapObj = null;
    var zoomLevel = 7;
    var mapConfig = {
        attributionControl: true,
        zoom: zoomLevel,
    };
    var markers = [];

    window.onload = function () {
        mapObj = L.map('sethPhatMap', mapConfig);
        L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapObj);
        var routeId = window.location.pathname.split('/').pop();
        if (routeId.trim() !== '') {
            var nominatimUrl = '/route_direction_getDirection/' + routeId;
            $.ajax({
                url: nominatimUrl,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data.length > 0) {
                        for (var i = 0; i < data.length; i++) {
                            var result = data[i];
                            var lat = parseFloat(result.lat);
                            var lon = parseFloat(result.lon);
                            // Tạo marker và pin vào bản đồ
                            var marker = addMarker([lat, lon], "", {}, {
                                title: "Marker " + (i + 1)
                            });
                            markers.push(marker);
                            mapObj.setView([lat, lon], zoomLevel);
                        }
                        // Nếu có đủ số lượng marker, hiển thị direction giữa các marker
                        if (data.length > 1) {
                            displayDirection();
                        }
                    } else {
                        console.error('Không có dữ liệu vị trí từ API.');
                    }
                },
            });
        } else {
            console.error('Không có id của khách hàng trong URL.');
        }
        // tạo marker
        var popupOption = {
            className: "map-popup-content",
        };
    };

    function addMarker(coord, popupContent, popupOptionObj, markerObj) {
        if (!popupOptionObj) {
            popupOptionObj = {};
        }
        if (!markerObj) {
            markerObj = {};
        }
        var marker = L.marker(coord, markerObj).addTo(mapObj);
        return marker;
    }

    function displayDirection() {
        if (markers.length > 1) {
            var startPoint = markers[0].getLatLng();
            var sortedMarkers = markers.slice(1).sort(function (a, b) {
                var distanceA = a.getLatLng().distanceTo(startPoint);
                var distanceB = b.getLatLng().distanceTo(startPoint);
                return distanceA - distanceB;
            });
            var waypoints = [startPoint];
            for (var i = 0; i < sortedMarkers.length; i++) {
                waypoints.push(sortedMarkers[i].getLatLng());
            }
            // Sử dụng thư viện leaflet-routing-machine để tạo direction giữa các marker
            L.Routing.control({
                waypoints: waypoints,
                routeWhileDragging: true,
                show: true
            }).addTo(mapObj);
        }
    }
</script>
<style>
    .warpper-search {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .input-item {
        width: 200px !important;
    }

    .card-body {
        padding: 50px !important;
    }

    .text-color_pimary {
        color: var(--primary-color)
    }

    .text-content {
        font-size: 14px
    }

    .layout_120 {
        display: grid;
        grid-template-columns: 120px auto;
    }

    .layout_90 {
        display: grid;
        grid-template-columns: 90px auto;
    }

    .layout_45 {
        display: grid;
        grid-template-columns: 45px auto;
    }

    .layout_auto {
        display: grid;
        grid-template-columns: auto auto;
    }

    .input-contact {
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        border-bottom: 1px solid #969393 !important;
        line-height: 15px;
        width: 100%;
        font-size: 12px;
    }

    .input-contact:focus {
        outline: none !important;
        border-top: none !important;
        border-left: none !important;
        border-right: none !important;
        border-bottom: 1px solid #969393 !important;
        box-shadow: none !important;
    }

    #sethPhatMap {
        width: 100%;
        height: 700px;
    }

    .map-popup-content {
        width: 300px;
    }

    .map-popup-content .left {
        float: left;
        width: 40%;
    }

    .map-popup-content .left img {
        width: 100%;
        height: 100px;
        margin: -15px 0 -15px -20px;
        border-radius: 12px;
    }

    .map-popup-content .right {
        float: left;
        width: 60%;
    }

    .clearfix {
        clear: both;
    }

    .leaflet-routing-container {
        display: none;
    }
</style>
@endsection
@section('content')
@include('template.sidebar.sidebarMaster.sidebarLeft')
<div id="mainWrap" class="mainWrap">
    <div class="mainSection">
        <div class="main">
            <div class="container">
                <div class="mainSection_heading">

                    <h5 class="mainSection_heading-title">Chi tiết tuyến</h5>
                    @include('template.components.sectionCard')
                </div>
                <div class="card mb-3">
                    <div class="card-body card-warpper">
                        <div>
                            <div class="container">
                                <div class="mb-3">
                                    <h2 class="text-color_pimary mb-3">Thông tin về tuyến
                                    </h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-4 layout_120">
                                                <span class="fw-bold text-content">Tên tuyến:</span>
                                                <input class="input-contact" value="{{ $route->name}}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4 layout_120">
                                                <span class="fw-bold text-content">Nhân sự phụ trách:</span>
                                                <input class="input-contact"
                                                    value="{{ $routeList->isNotEmpty() ? $routeList->first()->personnel_name : '' }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4 layout_120">
                                                <span class="fw-bold text-content">Mã tuyến:</span>
                                                <input class="input-contact" value="{{$route->code}}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4 layout_120">
                                                <span class="fw-bold text-content">Thời gian di tuyến:</span>
                                                <input class="input-contact" value="{{$route->travel_time}}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4 layout_120">
                                                <span class="fw-bold text-content">Địa bàn:</span>
                                                <input class="input-contact"
                                                    value="{{ $routeList->isNotEmpty() ? $routeList->first()->area_name : '' }}" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4 layout_120">
                                                <span class="fw-bold text-content">Ghi chú:</span>
                                                <input class="input-contact" value="{{$route->description}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div id="sethPhatMap" class="border" style="height: 300px; display: block">
                                        Map
                                    </div>
                                </div>

                                <div>
                                    <div class="table-responsive mt-2" style="height: auto;">
                                        <table id="dsbbdanhgia" class="table table-hover table-bordered" width="100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-nowrap text-center" style="width:2%">STT</th>
                                                    <th class="text-nowrap text-center" style="width:20%">Tên khách
                                                        hàng
                                                    </th>
                                                    <th class="text-nowrap text-center" style="width:8%">Số điện thoại
                                                    </th>
                                                    <th class="text-nowrap text-center" style="width:12%">Email</th>
                                                    <th class="text-nowrap text-center" style="width:12%">Nhân sự phụ
                                                        trách</th>
                                                    <th class="text-nowrap text-center" style="width:8%">Nhóm</th>
                                                    <th class="text-nowrap text-center" style="width:8%">Kênh</th>
                                                    {{-- <th class="text-nowrap text-center" style="width:3%"></th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($customers as $key => $cus)
                                                <tr role="button">
                                                    <td class="text-nowrap text-center">
                                                        <div class="text-nowrap d-block text-truncate">
                                                            {{ $key + 1 }}
                                                        </div>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <div class="text-nowrap d-block text-truncate"
                                                            style="max-width:350px;" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="{{ $cus->name ?? '' }}">
                                                            {{ $cus->name ?? '' }}
                                                        </div>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <div class="text-nowrap  d-block text-truncate"
                                                            style="max-width:565px;" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="{{ $cus->phone ?? '' }}">
                                                            {{ $cus->phone ?? '' }}
                                                        </div>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <div class="text-nowrap  d-block text-truncate"
                                                            style="max-width:565px;" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="{{ $cus->email ?? '' }}">
                                                            {{ $cus->email ?? '' }}
                                                        </div>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <div class="text-nowrap d-block text-truncate"
                                                            style="max-width:565px;" data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="{{ $cus->person->name ?? '' }} - {{ $cus->person->code ?? '' }}">
                                                            {{ $cus->person->name ?? '' }} -
                                                            {{ $cus->person->code ?? '' }}
                                                        </div>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <div class="text-nowrap text-center d-block text-truncate"
                                                            style="max-width:565px;" data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="Nhóm {{ $cus->groupId ?? '' }}">
                                                            Nhóm {{ $cus->groupId ?? '' }}
                                                        </div>
                                                    </td>
                                                    <td class="text-nowrap">
                                                        <div class="text-nowrap text-center d-block text-truncate"
                                                            style="max-width:565px;" data-bs-toggle="tooltip"
                                                            data-bs-placement="top"
                                                            title="{{ $cus->channel->name ?? '' }}">
                                                            {{ $cus->channel->name ?? '' }}
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr role="button">
                                                    <td colspan="7" class="text-center">
                                                        Chưa có khách hàng nào thuộc tuyến này
                                                    </td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
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
@include('template.sidebar.sidebarMaster.sidebarRight')
@section('footer-script')

<!-- Plugins -->
<script src="{{ asset('assets/plugins/jquery-datetimepicker/custom-datetimepicker.js') }}"></script>

<script type="text/javascript" charset="utf-8"
    src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jquery-repeater/repeater.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jquery-repeater/custom-repeater.js') }}"></script>
<!-- Chart Js -->
<script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chart.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs-plugin-stacked100@1.0.0.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/chartjs/chartjs-plugin-datalabels@2.0.0.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_khachHangActive.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_khachHangMoi.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_soDonHang.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_doanhSo.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/chart/StackedChart_nhanSu.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/components/selectMulWithLeftSidebar.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/components/resetFilter.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/components/dataHrefTable.js') }}"></script
@endsection