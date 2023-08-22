<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\Specifications;
use App\Models\TechnicalSpecificationsGroup;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
// use Barryvdh\DomPDF\PDF;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
// use Barryvdh\DomPDF\PDF;
use PDF;

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
                $pattern = '/^(SELECT|INSERT|UPDATE|DELETE|CREATE|ALTER|DROP)\s+.*/';
                if (preg_match($pattern, $q)) {
                    Session::flash('error', 'Lỗi đầu vào khi search');
                    return back();
                }
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
        // dd($request->all());
        $details = ProductDetails::where('product_id', $id)->first();
        // $tableValue = ProductDetails::find($id)->value;

        if ($request->hasFile('files')) {
            $files = $request->file('files');

            $uploadedImages = [];
            // $uploadedFiles = [];

            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();

                // Additional logic if needed

                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                    $uploadedImages[] = $this->uploadFileToRemoteHost($file);
                }
                // else {
                //     $uploadedFiles[] = $this->uploadFileToRemoteHost($file);
                // }
            }

            if (!empty($uploadedImages)) {
                $details->images = json_encode($uploadedImages);
            }

            // if (!empty($uploadedFiles)) {
            //     $details->attachments = json_encode($uploadedFiles);
            // }
        }

        if ($request->hasFile('attachments')) {
            $attachments = $request->file('attachments');

            $uploadedFiles = [];

            foreach ($attachments as $attachment) {
                $extension = $attachment->getClientOriginalExtension();

                // Additional logic if needed

                // if (in_array($extension, ['.pdf', '.xlsx', '.docx'])) {
                    $uploadedFiles[] = $this->uploadFileToRemoteHost($attachment);
                // }
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
        // if ($request->listProducts) {
        //     $hasNonNullValue = false;
        //     foreach ($request->listProducts as $element) {
        //         if ($element['key'] !== null || $element['value'] !== null) {
        //             $hasNonNullValue = true;
        //             break; // Exit the loop if a non-null value is found
        //         }
        //     }
        //     if ($hasNonNullValue) {
        //         $newList = [];

        //         foreach ($request->listProducts as $item) {
        //             $newItem = [];

        //             foreach ($item as $key => $value) {
        //                 if ($value == null) {
        //                     $newItem[$key] = null;
        //                 } else {
        //                     $newItem[$key] = $value;
        //                 }
        //             }

        //             $newList[] = $newItem;
        //         }
        //         $details->data = json_encode($newList);
        //     }
        // }
        $combinedData = [];
        foreach ($request->data as $array) {
            if (is_array($array)) {
                $combinedData[] = $array;
            }
        }
        $jsonCombinedData = json_encode($combinedData);
        $details->data  = $jsonCombinedData;
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
        $jsonCombinedData = $details->data;
        $combinedData = json_decode($jsonCombinedData);
        $productLQ = Product::all();
        $other_product = Product::where('id', '!=', $id)->get();
        $SpecificationsList = Specifications::all();
        $TechnicalSpecificationsGroupList = TechnicalSpecificationsGroup::all();

        // return view("Product.chiTietSanPham")->with(compact(
            return view("Product.chi_tiet_san_pham")->with(compact(
            "product",
            "details",
            "SpecificationsList",
            "TechnicalSpecificationsGroupList",
            "combinedData",
            "productLQ",
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
            if ($request->file) {
                $data['thumbnail'] = $this->uploadFileToRemoteHost($request->file);
            }

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
        return redirect()->route('product.list');
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

    public function export($id)
    {
        // set_time_limit(120);
        $product = Product::findOrFail($id);
        $details = ProductDetails::where('product_id', $id)->first();
        $jsonCombinedData = $details->data;
        $combinedData = json_decode($jsonCombinedData);

     $pdf = FacadePdf::loadView('pdf.chi_tiet_san_pham_pdf',[
        "product"=> $product,
        "details"=> $details,
        "combinedData"=>$combinedData,
     ]);

    //  return $pdf->store('chi_tiet_san_pham_pdf.pdf');
     return $pdf->stream();
    //  set_time_limit(30);
    }
}
