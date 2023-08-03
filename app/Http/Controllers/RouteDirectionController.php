<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RouteDirection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RouteDirectionController extends Controller
{
    // 
    public function index()
    {
        $routeDirection = RouteDirection::all();
        return view('index', compact('routeDirection'));
    }

    public function showMap($id)
    {
        return view('map', ['id' => $id]);
    }

    public function showMapDirection($id)
    {
        return view('mapDirection', ['id' => $id]);
    }

    public function getCoordinates($customerId)
    {
        $customer = Customer::find($customerId);
        $address = $customer->address;

        $encodedAddress = urlencode($address);
        // Gọi API Nominatim
        $nominatimUrl = 'https://nominatim.openstreetmap.org/search?q=' . $encodedAddress . '&format=json'; // Updated URL format
        // dd($nominatimUrl);
        $response = Http::get($nominatimUrl);

        if ($response->successful()) {
            $jsonData = $response->json();

            // Trả về dữ liệu cho frontend
            return response()->json($jsonData);
        } else {
            // Xử lý lỗi nếu API Nominatim không trả về dữ liệu hợp lệ
            return response()->json(['error' => 'Lỗi khi gọi API Nominatim'], 500);
        }
    }

    public function getCoordinatesDirection(Request $request, $routeId)
    {
        // Lấy danh sách khách hàng có cùng routeId
        $customers = Customer::where('routeId', $routeId)->get();

        // Kiểm tra xem có khách hàng nào có cùng routeId hay không
        if ($customers->isEmpty()) {
            return response()->json(['error' => 'Không tìm thấy khách hàng với routeId cụ thể'], 404);
        }

        $coordinates = [];

        foreach ($customers as $customer) {
            $address = $customer->address;
            $encodedAddress = urlencode($address);

            // Gọi API Nominatim để lấy thông tin vị trí từ địa chỉ
            $nominatimUrl = 'https://nominatim.openstreetmap.org/search?q=' . $encodedAddress . '&format=json';
            $response = Http::get($nominatimUrl);

            if ($response->successful()) {
                $jsonData = $response->json();

                if (!empty($jsonData)) {
                    $result = $jsonData[0];
                    $lat = isset($result['lat']) ? (float) $result['lat'] : null;
                    $lon = isset($result['lon']) ? (float) $result['lon'] : null;

                    if ($lat !== null && $lon !== null) {
                        $coordinates[] = ['lat' => $lat, 'lon' => $lon];
                    }
                }
            } else {
                // Xử lý lỗi nếu API Nominatim không trả về dữ liệu hợp lệ
                return response()->json(['error' => 'Lỗi khi gọi API Nominatim'], 500);
            }
        }

        // Trả về danh sách tọa độ của các khách hàng
        return response()->json($coordinates);
    }
}