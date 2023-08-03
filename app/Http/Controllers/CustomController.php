<?php

namespace App\Http\Controllers;

use App\Models\Custom;
use App\Models\Version;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $q = $request->query('q');
            $limit = 10;
            $listCustom = Custom::query();
            if ($q) {
                $listCustom = $listCustom->where('code', 'like', '%' . $q . '%')
                    ->orWhere('name', 'like', '%' . $q . '%');
            }

            $listCustom = $listCustom->orderByDesc('id')->paginate($limit);

            $listVersion = Version::all();

            foreach ($listCustom as $custom) {
                $versionIds = json_decode($custom->version_ids);
                $custom->versions = Version::whereIn('id', $versionIds)->get();
            }

            return view('Product.danhSachTuyChinh')->with(compact(
                "listCustom",
                "listVersion"
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
                'code' => 'required|unique:customs,code',
                'version_ids' => 'required',
                'note' => 'nullable'
            ]);
            $data['version_ids'] = json_encode($data['version_ids']);

            $custom = Custom::create($data);
            if ($custom) {
                Session::flash('success', "Thêm tuỳ chỉnh thành công");
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
                'version_ids' => 'required',
                'note' => 'nullable'
            ]);

            $data['version_ids'] = json_encode($data['version_ids']);

            $custom = Custom::findOrFail($id);
            if ($custom) {
                $custom->update($data);

                Session::flash('success', "Sửa tùy chỉnh thành công");
                return back();
            } else {
                Session::flash('error', "Không tìm thấy tùy chỉnh!!");
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
        $custom = Custom::findOrFail($id);
        $custom->delete();

        Session::flash('success', "Xoá phiên bản thành công");
        return back();
    }
}
