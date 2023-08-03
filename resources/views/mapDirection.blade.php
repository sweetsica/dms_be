<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>LeafletJS - OpenStreetMap API by Seth Phat</title>
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
    <style>
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
</head>

<body>
    <div id="sethPhatMap"></div>
</body>

<script>
    var mapObj = null;
    var zoomLevel = 13;
    var defaultCoord = [10.7743, 106.6669]; // coord mặc định 
    var mapConfig = {
        attributionControl: true,
        center: defaultCoord, 
        zoom: zoomLevel,
    };
    var markers = [];

    window.onload = function () {
        // init map
        mapObj = L.map('sethPhatMap', mapConfig);

        // add tile để map có thể hoạt động
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapObj);

        var customerId = window.location.pathname.split('/').pop();
        if (customerId.trim() !== '') {
            // Gọi API để lấy danh sách khách hàng theo id route
            var url = '/get-customers-by-route/' + customerId;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data.success && data.customers.length > 0) {
                        var customers = data.customers;
                        // Tạo marker cho từng địa chỉ của khách hàng
                        for (var i = 0; i < customers.length; i++) {
                            var customer = customers[i];
                            var address = customer.address;
                            var name = customer.name;

                            // Gọi API Nominatim để lấy thông tin vị trí từ địa chỉ
                            var nominatimUrl = 'https://nominatim.openstreetmap.org/search/' + encodeURIComponent(address) + '?format=json';
                            $.ajax({
                                url: nominatimUrl,
                                type: 'GET',
                                dataType: 'json',
                                success: function (data) {
                                    alert(data)
                                    if (data.length > 0) {
                                        var result = data[0];
                                        var lat = parseFloat(result.lat);
                                        var lon = parseFloat(result.lon);

                                        // Tạo marker và popup
                                        var marker = addMarker([lat, lon], name, {}, {
                                            title: name
                                        });

                                        markers.push(marker);
                                        mapObj.setView([lat, lon], zoomLevel);

                                        // Nếu đã tạo đủ marker, hiển thị direction giữa các marker
                                        if (markers.length === customers.length) {
                                            displayDirection();
                                        }
                                    }
                                },
                                error: function (xhr, status, error) {
                                    console.error('Đã xảy ra lỗi trong quá trình tìm kiếm.');
                                }
                            });
                        }
                    } else {
                        console.error('Không có khách hàng nào có địa chỉ trong database.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Đã xảy ra lỗi khi lấy danh sách khách hàng.');
                }
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
        // var popup = L.popup(popupOptionObj);
        // popup.setContent(popupContent);

        // binding
        // marker.bindPopup(popup);

        return marker;
    }

    function displayDirection() {
        if (markers.length > 1) {
            var directions = [];
            for (var i = 0; i < markers.length - 1; i++) {
                var marker1 = markers[i];
                var marker2 = markers[i + 1];
                var waypoints = [
                    L.latLng(marker1.getLatLng().lat, marker1.getLatLng().lng),
                    L.latLng(marker2.getLatLng().lat, marker2.getLatLng().lng)
                ];

                //thư viện leaflet-routing-machine
                var direction = L.Routing.control({
                    waypoints: waypoints,
                    routeWhileDragging: true,
                    createMarker: function () { return null; },
                    lineOptions: {
                        styles: [{ color: 'blue', opacity: 1, weight: 5 }]
                    },
                    show: false //tắt chỉ đường
                }).addTo(mapObj);
                directions.push(direction);
            }
        }
    }


</script>

</html>