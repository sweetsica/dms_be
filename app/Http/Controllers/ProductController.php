<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function _toObject($array)
    {
        $objectStr = json_encode($array);
        $object = json_decode($objectStr);
        return $object;
    }

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

    public function index(Request $request)
    {
        try {
            $q = $request->query('q');
            $limit = 10;
            $listProduct = Product::query();
            if ($q) {
                $listProduct = $listProduct->where('code', 'like', '%' . $q . '%')
                    ->orWhere('name', 'like', '%' . $q . '%');
            }
            $listProduct = $listProduct->orderByDesc('id')->paginate($limit);

            $pagination = $this->pagination($listProduct);

            return view('Product.danhSachSanPham')->with(
                compact(
                    "listProduct",
                    "pagination"
                )
            );
        } catch (Exception $e) {
            Session::flash('error', $e);
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
    {
        $details = ProductDetails::where('product_id', $id)->first();

        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $directory = 'product/' . $id;

            // Check if the directory exists
            if (!Storage::exists($directory)) {
                // Create the directory
                Storage::makeDirectory($directory);
            }

            $uploadedImages = [];
            $uploadedFiles = [];

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();

                // Additional logic if needed

                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    $uploadedImages[] = $this->uploadFileToRemoteHost($file);
                } else {
                    $uploadedFiles[] = $this->uploadFileToRemoteHost($file);
                }
            }

            if (!empty($uploadedImages)) {
                $details->images = json_encode($uploadedImages);
            }

            if (!empty($uploadedFiles)) {
                $details->attachments = json_encode($uploadedFiles);
            }
        }

        if ($request->description) {
            $details->description = $request->description;
        }

        if ($request->price) {
            $details->price = $request->price;
        }
        if ($request->listProducts) {
            $hasNonNullValue = false;
            foreach ($request->listProducts as $element) {
                if ($element['key'] !== null || $element['value'] !== null) {
                    $hasNonNullValue = true;
                    break; // Exit the loop if a non-null value is found
                }
            }
            if ($hasNonNullValue) {
                $newList = [];

                foreach ($request->listProducts as $item) {
                    $newItem = [];

                    foreach ($item as $key => $value) {
                        if ($value == null) {
                            $newItem[$key] = null;
                        } else {
                            $newItem[$key] = $value;
                        }
                    }

                    $newList[] = $newItem;
                }
                $details->data = json_encode($newList);
            }
        }

        $details->save();
        Session::flash('success', "Cập nhật thành công");
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'code' => 'required|unique:products,code',
                'type' => 'required',
                'branch' => 'required',
                'file' => 'required'
            ]);
            $data['thumbnail'] = $this->uploadFileToRemoteHost($data['file']);
            $data['created_at'] = now();
            $product = Product::create($data);
            if ($product) {
                ProductDetails::create([
                    'product_id' => $product->id
                ]);
                Session::flash('success', "Thêm sản phẩm thành công");
                return redirect()->route('product.show', $product->id);
            } else {
                Session::flash('error', "Vui lòng thử lại sau!!");
                return back();
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            Session::flash("error", $e->getMessage());
            return redirect()->back()->withInput();
        }
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
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $details = ProductDetails::where('product_id', $id)->first();

        $other_product = Product::where('id', '!=', $id)->get();

        return view("Product.chiTietSanPham")->with(compact(
            "product",
            "details",
            "other_product"
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function related(Request $request, $id)
    {
        $details = ProductDetails::where('product_id', $id)->first();
        if ($request->related) {
            $details->related = json_encode($request->related);
            $details->save();
            Session::flash('success', "Thêm sản phẩm liên quan thành công");
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'name' => 'required',
                'code' => 'required',
                'type' => 'required',
                'branch' => 'required',
                'status' => 'required'
            ]);

            $data['thumbnail'] = $this->uploadFileToRemoteHost($request->file);

            $product = Product::findOrFail($id);
            if ($product) {
                $product->update($data);

                Session::flash('success', "Sửa sản phẩm thành công");
                return back();
            } else {
                Session::flash('error', "Không tìm thấy sản phẩm!!");
                return back();
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            Session::flash("error", $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        Session::flash('success', "Xoá sản phẩm thành công");
        return back();
    }

    public function getAll()
    {
        $productList = Product::all();
        return $productList;
    }

    public function delete($id, Request $request)
    {
        $details = ProductDetails::findOrFail($request->detail_id);
        $relatedArray = json_decode($details->related);
        if (count($relatedArray) > 1) {
            $details_array = array_diff($relatedArray, [$id]);

            // Convert the associative array to an indexed array
            $details_array = array_values($details_array);

            // Encode the array back to a JSON string
            $details_json = json_encode($details_array);

            // Update the task's prev_tasks attribute in the database
            $details->related = $details_json;
            // dd($taskDetails->prev_tasks);
            $details->save();
        } else {
            $details->related = null;
            // dd($taskDetails->prev_tasks);
            $details->save();
        }

        Session::flash('success', "Xoá sản phẩm liên quan thành công");
        return back();
    }
}
