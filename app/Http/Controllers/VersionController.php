<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VersionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $q = $request->query('q');
            $limit = 10;
            $listVersion = Version::query();
            if ($q) {
                $listVersion = $listVersion->where('code', 'like', '%' . $q . '%')
                    ->orWhere('name', 'like', '%' . $q . '%');
            }

            $listVersion = $listVersion->orderByDesc('id')->paginate($limit);

            $listProduct = Product::all();

            foreach ($listVersion as $version) {
                $productIds = json_decode($version->product_ids);
                $version->products = Product::whereIn('id', $productIds)->get();
            }

            return view('Product.danhSachPhienBan')->with(compact(
                "listVersion",
                "listProduct"
            ));
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
                'code' => 'required|unique:versions,code',
                'product_ids' => 'required',
                'note' => 'nullable'
            ]);
            $data['product_ids'] = json_encode($data['product_ids']);

            $version = Version::create($data);
            if ($version) {
                Session::flash('success', "Thêm phiên bản thành công");
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
                'product_ids' => 'required',
                'note' => 'nullable'
            ]);

            $data['product_ids'] = json_encode($data['product_ids']);

            $version = Version::findOrFail($id);
            if ($version) {
                $version->update($data);

                Session::flash('success', "Sửa phiên bản thành công");
                return back();
            } else {
                Session::flash('error', "Không tìm thấy phiên bản!!");
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
        $version = Version::findOrFail($id);
        $version->delete();

        Session::flash('success', "Xoá phiên bản thành công");
        return back();
    }
}
