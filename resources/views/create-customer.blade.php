<link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg==" crossorigin=""></script>



<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Thêm khách hàng</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('store-customer') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Tên khách hàng</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="routeId">Tuyến đường</label>
                    <input type="text" name="routeId" id="routeId" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="city">Tỉnh/thành</label>
                    <input type="text" name="city" id="city" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="district">Quận/huyện</label>
                    <input type="text" name="district" id="district" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="guide">Phường/xã</label>
                    <input type="text" name="guide" id="guide" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" name="address" id="address" class="form-control" required>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
