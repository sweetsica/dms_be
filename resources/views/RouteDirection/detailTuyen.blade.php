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

    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    {{-- Semantic ui --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/components/accordion.min.css"
        integrity="sha512-EW5NoIdxRt4Kx9yB4sh9TKVYOveAOFf8WwjRwQs4ylh1hDueujFGLJtPNjm4zQKwlPk8Q2mYDLte7aK6NS+uoA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        var mapObj = null;
        var zoomLevel = 7;
        var mapConfig = {
            attributionControl: true,
            zoom: zoomLevel,
        };
        var markers = [];

        window.onload = function() {
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
                    success: function(data) {
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
                var sortedMarkers = markers.slice(1).sort(function(a, b) {
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
        .text-default {
            color: var(--primary-color)
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
                                    <h1 class="fw-bold text-default">{{ $route->name }} - {{ $route->code }}</h1>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="ui styled accordion mb-5">
                                                <div class="title active d-flex align-items-center justify-content-between"
                                                    style="background: #D9D9D9">
                                                    <span class="fs-4 text-default fw-bold">Thông tin tuyến</span>
                                                    <i class="dropdown icon"></i>
                                                </div>
                                                <div class="content active">
                                                    <div class="row my-2">
                                                        <div class="col-md-6">
                                                            <span class="fw-bold">Nhân sự phụ trách:</span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span>{{ $routeList->isNotEmpty() ? $routeList->first()->personnel_name : '' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-6">
                                                            <span class="fw-bold">Địa bàn:</span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span>{{ $routeList->isNotEmpty() ? $routeList->first()->area_name : '' }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-6">
                                                            <span class="fw-bold">Thời gian đi tuyến:</span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span>{{ $route->travel_time }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row my-2">
                                                        <div class="col-md-6">
                                                            <span class="fw-bold">Ghi chú:</span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span>{{ $route->description }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <div
                                                    style="
                                                    background: #D9D9D9;
                                                    margin: 0;
                                                    padding: 0.75em 1em;
                                                    font-weight: 700;">
                                                    <span class="fs-4 text-default fw-bold">Danh sách khách hàng</span>
                                                </div>
                                                <div class="table-responsive" style="height: auto;">
                                                    <table id="dsbbdanhgia" class="table table-hover table-bordered"
                                                        width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-nowrap text-center" style="width:2%">STT
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:30%">Tên
                                                                    khách
                                                                    hàng
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:30%">Số
                                                                    điện
                                                                    thoại
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:30%">Email
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:30%">Nhân
                                                                    sự phụ
                                                                    trách</th>
                                                                <th class="text-nowrap text-center" style="width:30%">Nhóm
                                                                </th>
                                                                <th class="text-nowrap text-center" style="width:30%">Kênh
                                                                </th>
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
                                                                            style="max-width:350px;"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="{{ $cus->name ?? '' }}">
                                                                            {{ $cus->name ?? '' }}
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-nowrap">
                                                                        <div class="text-nowrap  d-block text-truncate"
                                                                            style="max-width:565px;"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="{{ $cus->phone ?? '' }}">
                                                                            {{ $cus->phone ?? '' }}
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-nowrap">
                                                                        <div class="text-nowrap  d-block text-truncate"
                                                                            style="max-width:565px;"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="{{ $cus->email ?? '' }}">
                                                                            {{ $cus->email ?? '' }}
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-nowrap">
                                                                        <div class="text-nowrap d-block text-truncate"
                                                                            style="max-width:565px;"
                                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                                            title="{{ $cus->person->name ?? '' }} - {{ $cus->person->code ?? '' }}">
                                                                            {{ $cus->person->name ?? '' }} -
                                                                            {{ $cus->person->code ?? '' }}
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-nowrap">
                                                                        <div class="text-nowrap text-center d-block text-truncate"
                                                                            style="max-width:565px;"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="Nhóm {{ $cus->groupId ?? '' }}">
                                                                            Nhóm {{ $cus->groupId ?? '' }}
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-nowrap">
                                                                        <div class="text-nowrap text-center d-block text-truncate"
                                                                            style="max-width:565px;"
                                                                            data-bs-toggle="tooltip"
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
                                        <div class="col-lg-8">
                                            <div class="mb-3">
                                                <div id="sethPhatMap" class="border"
                                                    style="height: 1016px; display: block">
                                                </div>
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
        <script type="text/javascript" src="{{ asset('/assets/js/components/dataHrefTable.js') }}"></script>

        {{-- Sematic ui  --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js"
            integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/components/accordion.min.js"
            integrity="sha512-VZ9OKywfKY7qvZnTAsFqNHS6jZ79QmSdfXbzoS3aMy3FpNkDFrR2NJfrHEE4nPQROp4A9u/hB9rTwL0UP5tzHg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $(document).ready(function() {
                $('.ui.accordion').accordion();
            });
        </script>
    @endsection