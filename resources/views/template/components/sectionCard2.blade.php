<div class="d-flex align-items-center justify-content-between mt-3">
    <div class="row">
        <div class="col-md-3">
            <div class="text-nowrap fs-18">Đơn vị: </div>
        </div>
        <div class="col-md-9"><strong class="text-nowrap fs-12">Tên phòng ban</strong>
        </div>
        <div class="col-md-3">
            <div class="text-nowrap fs-18">Họ và tên: </div>
        </div>
        <div class="col-md-9"><strong class="text-nowrap fs-12">{{ session('user')['name'] ?? '' }} -
                {{ session('user')['code'] ?? '' }}</strong></div>
    </div>
    <div class="time-now">
        <div id="time-now" class="fs-18"></div>
    </div>
</div>
<script>
    var currentTime = new Date();
    var year = currentTime.getFullYear();
    var month = currentTime.getMonth() + 1;
    var day = currentTime.getDate();
    var hours = currentTime.getHours();
    var minutes = currentTime.getMinutes();
    var seconds = currentTime.getSeconds();

    var thisMonthElement = document.getElementById("time-now");
    thisMonthElement.textContent = `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;
</script>
<style>
    .time-now {
        font-size: var(--fz-14);
        color: var(--primary-color);
        font-weight: 600;
    }

    .fs-18 {
        font-size: 1.8rem;
    }

    .fs-12 {
        font-size: 1.2rem;
    }
</style>
