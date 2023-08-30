<?php

namespace App\Http\Controllers;

use App\Http\Requests\MyValidationRequest;
use App\Models\Customer;
use App\Models\CustomerGroup;
use App\Models\Department;
use App\Models\Personnel;
use App\Models\Product;
use App\Models\RouteDirection;
// use Dotenv\Validator;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Broadcasting\Channel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    public function pagination($list)
    {
        return [
            'current_page' => $list->currentPage(),
            'data' => $list->items(),
            'first_page_url' => $list->url(1),
            'from' => $list->firstItem(),
            'last_page' => $list->lastPage(),
            'last_page_url' => $list->url($list->lastPage()),
            'links' => $list->toArray()['links'],
            'next_page_url' => $list->nextPageUrl(),
            'path' => $list->url(1),
            'per_page' => $list->perPage(),
            'prev_page_url' => $list->previousPageUrl(),
            'to' => $list->lastItem(),
            'total' => $list->total(),
        ];
    }

    public function show($id)
    {
        $customer = Customer::with('channel', 'route', 'person')->findOrFail($id);
        // dd($customer);
        $listPersons = Personnel::all();
        $jsonCombinedData = $customer->contact;
        $combinedData = json_decode($jsonCombinedData);
        $listgroup = CustomerGroup::all();
        // dd( $combinedData);
        return view('Customer.detailKhachHang')->with(
            compact(
                "customer",
                "listPersons",
                "listgroup",
                "combinedData"
            )
        );
    }

    public function uploadFileToRemoteHost($file)
    {
        $fileStream = fopen($file, 'r');
        $url = "https://report.sweetsica.com/api/report/upload";
        //send form data
        $response = Http::attach(
            'files',
            file_get_contents($file),
            $file->getClientOriginalName()
        )->post($url);

        //throw exception if response is not successful
        $response->throw()->json();
        //get data from response
        $data = $response->json();
        $dataObj = $this->_toObject($data);
        return $dataObj->downloadLink;
    }

    public function store(Request $request)
    {

        // $data = $request->validate([
        //     // 'code' => 'required|string|max:255',
        //     'name' => 'required|string|max:255',
        //     'phone' => 'string|max:20',
        //     'email' => 'string|max:255',
        //     'routeId' => 'numeric',
        //     'city' => 'required|string|max:255',
        //     'district' => 'required|string|max:255',
        //     'guide' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        //     'personContact' => 'string|max:255',
        //     'personName' => 'string|max:255',
        //     'personPhoneNumber' => 'string|max:255',
        //     'personEmail' => 'string|max:255',
        //     'hrManager' => 'required|string|max:255',
        //     'type' => 'required|string|max:255',
        //     'customerChanel' => 'required|string|max:255'
        // ]);
    }

    public function view(Request $request)
    {
        try {
            $q = $request->query('q');
            $nhomKH = $request->query('nhomKH');
            $kenhKH = $request->query('kenhKH');
            $tuyenKH = $request->query('tuyenKH');
            $nhansutt = $request->query('nhansutt');
            $limit = 30;
            $listData = Customer::query()->with('channel', 'route', 'person');
            if ($q) {
                $pattern = '/^(SELECT|INSERT|UPDATE|DELETE|CREATE|ALTER|DROP)\s+.*/';
                if (preg_match($pattern, $q)) {
                    Session::flash('error', 'Lỗi đầu vào khi search');
                    return back();
                }
                $listData = $listData->where('code', 'like', '%' . $q . '%')
                    ->orWhere('name', 'like', '%' . $q . '%')
                    ->orWhere('phone', 'like', '%' . $q . '%')
                    ->orWhere('email', 'like', '%' . $q . '%')
                    ->orWhere('personContact', 'like', '%' . $q . '%')
                    ->orWhere('companyName', 'like', '%' . $q . '%')
                    ->orWhere('career', 'like', '%' . $q . '%')
                    ->orWhere('taxCode', 'like', '%' . $q . '%')
                    ->orWhere('companyPhoneNumber', 'like', '%' . $q . '%')
                    ->orWhere('companyEmail', 'like', '%' . $q . '%')
                    ->orWhere('accountNumber', 'like', '%' . $q . '%')
                    ->orWhere('bankOpen', 'like', '%' . $q . '%')
                    ->orWhere('city', 'like', '%' . $q . '%')
                    ->orWhere('district', 'like', '%' . $q . '%')
                    ->orWhere('guide', 'like', '%' . $q . '%')
                    ->orWhere('address', 'like', '%' . $q . '%')
                    ->orWhere('status', 'like', '%' . $q . '%')
                    ->orWhere('group', 'like', '%' . $q . '%')
                    ->orWhereHas('route', function ($customerQuery) use ($q) {
                        $customerQuery->where('name', 'like', '%' . $q . '%');
                    })
                    ->orWhereHas('person', function ($customerQuery) use ($q) {
                        $customerQuery->where('name', 'like', '%' . $q . '%');
                    })
                    ->orWhereHas('channel', function ($customerQuery) use ($q) {
                        $customerQuery->where('name', 'like', '%' . $q . '%');
                    });
            }
            if ($nhomKH) {
                $listData = $listData->where('group', $nhomKH);
            }
            if ($kenhKH) {
                $listData = $listData->whereHas('channel', function ($customerQuery) use ($kenhKH) {
                    $customerQuery->where('name', 'like', '%' . $kenhKH . '%');
                });
            }
            if ($tuyenKH) {
                $listData = $listData->whereHas('route', function ($customerQuery) use ($tuyenKH) {
                    $customerQuery->where('name', 'like', '%' . $tuyenKH . '%');
                });
            }
            if ($nhansutt) {
                $listData = $listData->whereHas('person', function ($customerQuery) use ($nhansutt) {
                    $customerQuery->where('name', 'like', '%' . $nhansutt . '%');
                });
            }
            switch (session('user')['role_id']) {
                case 3:
                    $listData = $listData->whereHas('person', function ($query) {
                        $query->where('department_id', '=', session('user')['department_id']);
                    });
                    break;

                case 2:
                    $listData = $listData->where('personId', session('user')['id']);
                    break;
            }
            $listData = $listData->orderBy('id', 'desc')->paginate($limit);

            $groupIDs = $listData->pluck('groupId')->toArray();
            $listPersons = Personnel::all();
            $listProduct = Product::all();
            $listRoute = RouteDirection::all();
            $listChannel = Department::all();
            $listgroup = CustomerGroup::all();

            $pagination = $this->pagination($listData);

            return view(
                'Customer.danhSachKhachHang',
                compact(
                    'listData',
                    'listPersons',
                    'listProduct',
                    'listRoute',
                    'listChannel',
                    'listgroup',
                    "pagination"
                )
            );
        } catch (\Exception $e) {
            Session::flash('error', $e);
            return back();
        }
    }

    public function createSimple(Request $request)
    {
        $code = $request->get('code');
        $description = $request->get('description');
        $customer_type = $request->get('customer_type');
        $name = $request->get('name');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $companyName = $request->get('companyName');
        $personContact = $request->get('personContact');
        $personCompany = $request->get('personCompany');
        $career = $request->get('career');
        $taxCode = $request->get('taxCode');
        $companyPhoneNumber = $request->get('companyPhoneNumber');
        $companyEmail = $request->get('companyEmail');
        $accountNumber = $request->get('accountNumber');
        $bankOpen = $request->get('bankOpen');
        $city = $request->get('city');
        $district = $request->get('district');
        $guide = $request->get('guide');
        $address = $request->get('address');
        $personId = $request->get('personId');
        $productId = $request->get('productId');
        $group = $request->get('group');
        $chanelId = $request->get('chanelId');
        $routeId = $request->get('routeId');
        $uploadedFiles = $request->file('attachment');
        $avatar = $request->file('avatar');
        $data = new Customer();
        $data->code = $code;
        $data->description = $description;
        $data->customer_type = $customer_type;
        $data->name = $name;
        $data->phone = $phone;
        $data->email = $email;
        $data->companyName = $companyName;
        $data->personCompany = $personCompany;
        $data->personContact = $personContact;
        $data->career = $career;
        $data->taxCode = $taxCode;
        $data->companyPhoneNumber = $companyPhoneNumber;
        $data->companyEmail = $companyEmail;
        $data->accountNumber = $accountNumber;
        $data->bankOpen = $bankOpen;
        $data->city = $city;
        $data->district = $district;
        $data->guide = $guide;
        $data->address = $address;
        $data->personId = $personId;
        $data->productId = json_encode($productId);
        $data->group = $group;
        $data->chanelId = $chanelId;
        $data->routeId = $routeId;
        $data->status = "Trinh sát";
        $existingFileName = json_decode($data->fileName, true) ?? [];
        $existingFilePath = json_decode($data->filePath, true) ?? [];
        if ($uploadedFiles) {
            foreach ($uploadedFiles as $file) {
                $path = $file->store('upload', 'public');
                $existingFileName[] = $file->getClientOriginalName();
                $existingFilePath[] = $path;
            }
        }
        if ($avatar) {
            foreach ($avatar as $a) {
                $path = $a->move(public_path('assets/img/avatar', 'public'));
                $existingFileName[] = $a->getClientOriginalName();
                $existingFilePath[] = $path;
            }
        }
        $data->fileName = json_encode($existingFileName);
        $data->filePath = json_encode($existingFilePath);

        // if ($request->hasFile('files')) {
        //     $files = $request->file('files');
        //     $uploadedImages = [];
        //     foreach ($files as $file) {
        //         $extension = $file->getClientOriginalExtension();
        //         if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
        //             $uploadedImages[] = $this->uploadFileToRemoteHost($file);
        //         }
        //     }
        //     if (!empty($uploadedImages)) {
        //         $data->image = json_encode($uploadedImages);
        //     }
        // }

        $data->save();
        Session::flash('success', 'Thêm mới thành công');
        $listData = Customer::all();
        return redirect()->route('customers', compact('listData'));
    }

    public function create(Request $request)
    {


        $status = $request->get('status');
        if ($status === 'Trinh sát') {
            $validator = Validator::make($request->all(), [

                // 'name' => 'required|string|max:255',
                // 'phone' => 'required|string|max:20',
                'city' => 'required',
                'district' => 'required',
                'guide' => 'required',
                'address' => 'required',
                'personId' => 'required',

            ], [
                // 'name.required' => 'Trường này không được để trống.',
                // 'phone.required' => 'Trường này không được để trống.',
                'city.required' => 'trường này không được để trống.',
                'district.required' => 'Trường này không được để trống.',
                'guide.required' => 'Trường này không được để trống.',
                'address.required' => 'Trường này không được để trống.',
                'personId.required' => 'Trường này không được để trống.',
            ]);
        } elseif ($status === 'Cơ hội') {
            $validator = Validator::make($request->all(), [
                // 'name' => 'required|string|max:255',
                // 'phone' => 'required|string|max:20',
                'city' => 'required',
                'district' => 'required',
                'guide' => 'required',
                'address' => 'required',
                'personId' => 'required',
                'productId' => 'required',
            ], [
                // 'name.required' => 'Trường này không được để trống.',
                // 'phone.required' => 'Trường này không được để trống.',
                'city.required' => 'Trường này không được để trống.',
                'district.required' => 'Trường này không được để trống.',
                'guide.required' => 'Trường này không được để trống.',
                'address.required' => 'Trường này không được để trống.',
                'personId.required' => 'Trường này không được để trống.',
                'productId.required' => 'Trường này không được để trống.',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                // 'name' => 'required|string|max:255',
                // 'phone' => 'required|string|max:20',
                'city' => 'required',
                'district' => 'required',
                'guide' => 'required',
                'address' => 'required',
                'personId' => 'required',
                'productId' => 'required',
                'group' => 'required',
                'chanelId' => 'required',
                'routeId' => 'required',
            ], [
                // 'name.required' => 'Trường này không được để trống.',
                // 'phone.required' => 'Trường này không được để trống.',
                'city.required' => 'Trường này không được để trống.',
                'district.required' => 'Trường này không được để trống.',
                'guide.required' => 'Trường này không được để trống.',
                'address.required' => 'Trường này không được để trống.',
                'personId.required' => 'Trường này không được để trống.',
                'productId.required' => 'Trường này không được để trống.',
                'group.required' => 'Trường này không được để trống.',
                'chanelId.required' => 'Trường này không được để trống.',
                'routeId.required' => 'Trường này không được để trống.',
            ]);
        }

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => [

                    'city' => $validator->errors()->first('city'),
                    'district' => $validator->errors()->first('district'),
                    'guide' => $validator->errors()->first('guide'),
                    'address' => $validator->errors()->first('address'),
                    'personId' => $validator->errors()->first('personId'),
                    'productId' => $validator->errors()->first('productId'),
                    'group' => $validator->errors()->first('group'),
                    'chanelId' => $validator->errors()->first('chanelId'),
                    'routeId' => $validator->errors()->first('routeId'),

                ]
            ]);
        }
        $code = $request->get('code');
        $description = $request->get('description');
        $business_areas = $request->get('business_areas');
        $customer_type = $request->get('customer_type');
        $name = $request->get('name');
        $phone = $request->get('phone');
        $email = $request->get('email');
        $companyName = $request->get('companyName');
        $personContact = $request->get('personContact');
        $personCompany = $request->get('personCompany');
        $career = $request->get('career');
        $taxCode = $request->get('taxCode');
        $companyPhoneNumber = $request->get('companyPhoneNumber');
        $companyEmail = $request->get('companyEmail');
        $accountNumber = $request->get('accountNumber');
        $bankOpen = $request->get('bankOpen');
        $city = $request->get('city');
        $district = $request->get('district');
        $guide = $request->get('guide');
        $address = $request->get('address');
        $personId = $request->get('personId');
        $productId = $request->get('productId');
        $group = $request->get('group');
        $chanelId = $request->get('chanelId');
        $routeId = $request->get('routeId');
        $status = $request->get('status');
        $uploadedFiles = $request->file('attachment');
        $image = $request->file('image');
        $avatar = $request->file('avatar');
        $data = new Customer();
        $data->code = $code;
        $data->description = $description;
        $data->business_areas = $business_areas;
        $data->customer_type = $customer_type;
        $data->name = $name;
        $data->phone = $phone;
        $data->email = $email;
        $data->companyName = $companyName;
        $data->personCompany = $personCompany;
        $data->personContact = $personContact;
        $data->career = $career;
        $data->taxCode = $taxCode;
        $data->companyPhoneNumber = $companyPhoneNumber;
        $data->companyEmail = $companyEmail;
        $data->accountNumber = $accountNumber;
        $data->bankOpen = $bankOpen;
        $data->city = $city;
        $data->district = $district;
        $data->guide = $guide;
        $data->address = $address;
        $data->personId = $personId;
        $data->productId = json_encode($productId);
        $data->group = $group;
        $data->chanelId = $chanelId;
        $data->routeId = $routeId;
        $data->status = $status;
        $existingFileName = json_decode($data->fileName, true) ?? [];
        $existingFilePath = json_decode($data->filePath, true) ?? [];
        $images = json_encode($data->image, true) ?? [];

        if ($uploadedFiles) {
            foreach ($uploadedFiles as $file) {
                $path = $file->store('upload', 'public');
                $existingFileName[] = $file->getClientOriginalName();
                $existingFilePath[] = $path;
            }
        }
        // if ($avatar) {
        //     foreach ($avatar as $a) {
        //         $path =  $a->store('upload', 'public');
        //         $existingFileName[] = $a->getClientOriginalName();
        //         $images[] = $path;
        //     }
        // }
        $data->fileName = json_encode($existingFileName);
        $data->filePath = json_encode($existingFilePath);

        // $data->image = json_encode($images);

        $combinedContact = [];
        foreach ($request->contact as $array) {
            if (is_array($array)) {
                $combinedContact[] = $array;
            }
        }
        $jsonCombinedData = json_encode($combinedContact);
        $data->contact = $jsonCombinedData;

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $imageName = time() . '.' . $images->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data->image = 'uploads/' . $imageName;
        }

        $data->save();
        Session::flash('success', 'Thêm mới thành công');
        $listData = Customer::all();
        return response()->json(['success' => true]);
        // return redirect()->route('customers', compact('listData'));
        // return view('customer.danhSachKhachHang', compact('listData'));


    }

    public function update(Request $request, $id)
    {
        $code = $request->get('code');
        // $description = $request->get('description');
        $business_areas = $request->get('business_areas');
        $customer_type = $request->get('customer_type');
        // $name = $request->get('name');
        // $phone = $request->get('phone');
        // $email = $request->get('email');
        $companyName = $request->get('companyName');
        $personContact = $request->get('personContact');
        $personCompany = $request->get('personCompany');
        $career = $request->get('career');
        $taxCode = $request->get('taxCode');
        $companyPhoneNumber = $request->get('companyPhoneNumber');
        $companyEmail = $request->get('companyEmail');
        $accountNumber = $request->get('accountNumber');
        $bankOpen = $request->get('bankOpen');
        $city = $request->get('city');
        $district = $request->get('district');
        $guide = $request->get('guide');
        $address = $request->get('address');
        $personId = $request->get('personId');
        $productId = $request->get('productId');
        $group = $request->get('group');
        $chanelId = $request->get('chanelId');
        $routeId = $request->get('routeId');
        $status = $request->get('status');
        $uploadedFiles = $request->file('attachment');
        $image = $request->file('image');
        $avatar = $request->file('avatar');
        $data = Customer::find($id);
        $data->code = $code;
        // $data->description = $description;
        $data->business_areas = $business_areas;
        $data->customer_type = $customer_type;
        // $data->name = $name;
        // $data->phone = $phone;
        // $data->email = $email;
        $data->companyName = $companyName;
        $data->personCompany = $personCompany;
        $data->personContact = $personContact;
        $data->career = $career;
        $data->taxCode = $taxCode;
        $data->companyPhoneNumber = $companyPhoneNumber;
        $data->companyEmail = $companyEmail;
        $data->accountNumber = $accountNumber;
        $data->bankOpen = $bankOpen;
        $data->city = $city;
        $data->district = $district;
        $data->guide = $guide;
        $data->address = $address;
        $data->personId = $personId;
        $data->productId = json_encode($productId);
        $data->group = $group;
        $data->chanelId = $chanelId;
        $data->routeId = $routeId;
        $data->status = $status;

        Session::flash('success', 'Sửa thành công');
        $existingFileName = json_decode($data->fileName, true) ?? [];
        $existingFilePath = json_decode($data->filePath, true) ?? [];
        $images = json_encode($data->image, true) ?? [];

        if ($uploadedFiles) {
            foreach ($uploadedFiles as $file) {
                $path = $file->store('upload', 'public');
                $existingFileName[] = $file->getClientOriginalName();
                $existingFilePath[] = $path;
            }
        }
        $data->fileName = json_encode($existingFileName);
        $data->filePath = json_encode($existingFilePath);

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $imageName = time() . '.' . $images->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data->image = 'uploads/' . $imageName;
        }
        // dd($data);
        $data->save();
        $listData = Customer::all();
        // return redirect()->route('customers', compact('listData'));
        return redirect()->back();
    }

    public function findById($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            return response()->json(['success' => true, 'customer' => $customer], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy khách hàng hoặc có lỗi xảy ra'], 404);
        }
    }

    public function getCustomersByRouteId($id)
    {
        $customers = Customer::where('routeId', $id)->get();
        return response()->json(['success' => true, 'customers' => $customers]);
    }

    public function delete($id)
    {
        Customer::destroy($id);
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();
    }

    public function upload(Request $request, $id)
    {
        $files = $request->file('file');
        $customer = Customer::find($id);
        $existingFileName = json_decode($customer->fileName, true) ?? [];
        $existingFilePath = json_decode($customer->filePath, true) ?? [];
        foreach ($files as $file) {
            $path = $file->store('upload', 'public');
            $existingFileName[] = $file->getClientOriginalName();
            $existingFilePath[] = $path;
        }
        // Cập nhật giá trị mới cho fileName và filePath
        $customer->fileName = json_encode($existingFileName);
        $customer->filePath = json_encode($existingFilePath);
        $customer->save();
        return response()->json(['success' => true, 'customers' => $customer]);
    }

    public function download($id, $name)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            abort(404, 'Không tìm thấy khách hàng.');
        }
        $fileNames = json_decode($customer->fileName, true);
        $filePaths = json_decode($customer->filePath, true);

        $fileIndex = array_search($name, $fileNames);
        $filePath = storage_path('app/public/' . $filePaths[$fileIndex]);
        return response()->download($filePath, $name);
    }

    public function cmt(Request $request, $id)
    {
        $content = $request->input('content');
        $author = $request->input('author');
        $customer = Customer::find($id);
        $formattedNow = Carbon::now()->format('d/m/Y H:i:s');
        $comments = json_decode($customer->comment, true) ?? [];
        $comments[] = [
            'content' => $content,
            'author' => $author,
            'timeComment' => $formattedNow,
        ];
        $customer->comment = json_encode($comments);
        $customer->save();
        Session::flash('success', 'Đã bình luận');
        return redirect()->back();
    }

    public function deleteComment($id, $key)
    {
        $customer = Customer::find($id);
        $comments = json_decode($customer->comment, true) ?? [];

        // Kiểm tra xem comment có tồn tại trong mảng hay không
        if (array_key_exists($key, $comments)) {
            unset($comments[$key]);
            $customer->comment = json_encode(array_values($comments));
            $customer->save();
        }
        Session::flash('success', 'Đã xoá comment!');
        return redirect()->back();
    }

}