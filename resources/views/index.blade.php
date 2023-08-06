@extends('layouts')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Các tuyến đường</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>Chi tiết</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($routeDirection as $td)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $td->name }}</td>
                        <td><a href="{{ route('mapDirection', $td->id) }}">Xem trên bản đồ</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('create-customer') }}" class="btn btn-primary">Thêm khách hàng</a>
    </div>
</div>
@endsection