<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

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
    public function create()
    {
        //
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
                Session::flash('success', "Thêm sản phẩm thành công");
                return back();
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
}
