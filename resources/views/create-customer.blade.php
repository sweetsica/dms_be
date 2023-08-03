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
                <!-- <div class="form-group">
                    <label for="code">Mã khách hàng</label>
                    <input type="text" name="code" id="code" class="form-control" required>
                </div> -->
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
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
                <div class="form-group">
                    <label for="personContact">Tên người liên hệ</label>
                    <input type="text" name="personContact" id="personContact" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="personName">Danh xưng</label>
                    <input type="text" name="personName" id="personName" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="personPhoneNumber">Số điện thoại người liên hệ</label>
                    <input type="text" name="personPhoneNumber" id="personPhoneNumber" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="personEmail">Email người liên hệ</label>
                    <input type="text" name="personEmail" id="personEmail" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="hrManager">Nhân sự phụ trách</label>
                    <input type="text" name="hrManager" id="hrManager" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="type">Nhóm khách hàng</label>
                    <input type="text" name="type" id="type" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="customerChanel">Kênh khách hàng</label>
                    <input type="text" name="customerChanel" id="customerChanel" class="form-control" required>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
