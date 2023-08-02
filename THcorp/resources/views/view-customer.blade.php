@extends('layouts')

@section('content')
<div class="container">
    <div class="card" <div class="card-header">
        <h3>Thông tin khách hàng</h3>
    </div>
    <div class="card-body">
        @foreach ($customers as $customer)
        <tr>
            <p><strong>STT:</strong> {{$loop->iteration }}</p>
            <p><strong>Tn khách hàng:</strong> {{ $customer->name }}</p>
            <p><strong>Số điện thoại:</strong> {{ $customer->phone }}</p>
            <p><strong>Tuyến đường:</strong> {{ $customer->routeId }}</p>
            <a href="{{ route('map', ['id' => $customer->id]) }}">Xem trên bản đồ</a>
        </tr>
        @endforeach
    </div>
</div>
</div>

@endsection