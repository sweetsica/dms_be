<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Locality;
use App\Models\Personnel;
use App\Models\PersonnelLevel;
use App\Models\Position;
use App\Models\Role;
use App\Models\UnitLeader;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;


class DepartmentController extends Controller
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

    public function index(Request $request)
    {
        $search = $request->get('search');
        $don_vi_me = $request->get('don_vi_me');
        $leader_name = $request->get('leader_name');
        $limit = 15;
        if ($request->has('limit')) {
            $limit = $request->input('limit');
        }
        // dd($abc);
        $query = Department::query();
        // $departmentList = Department::
        $query->leftJoin('personnel', 'personnel.id', '=', 'department.ib_lead')
            ->select(
                'department.id',
                'department.order',
                'department.name',
                'department.description',
                'department.code',
                'department.parent',
                'department.ib_lead',
                'personnel.name as leader_name'
            );
        $pattern = '/^(SELECT|INSERT|UPDATE|DELETE|CREATE|ALTER|DROP)\s+.*/';
        if (preg_match($pattern, $search)) {
            Session::flash('error', 'Lỗi đầu vào khi search');
            return back();
        }
        if ($search != NULL) {
            $query->where("department.name", "like", "%$search%");
        }
        if ($don_vi_me != NULL) {
            $query->where("department.parent", "like", "%$don_vi_me%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.name", "like", "%$search%");
        }
        $departmentList = $query->orderBy('department.id', 'desc')->paginate($limit);
        // dd($departmentList);
        $UnitLeaderList = Personnel::all();
        $Department = Department::all();
        $departmentListTree = Department::where('parent', 0)->with('donViCon')->get();
        $departmentListTree = $departmentListTree->sortBy('order');
        // dd($departmentListTree->pluck('order'));

        // dd($departmentListTree);
        $departmentlists = $this->getDepartment();
        $positionlists = $this->getPosition();
        $personnellists = $this->getPersonnel();
        $roleList = Role::all();
        $localityList = Locality::all();
        $personnelLevelList = PersonnelLevel::all();

        $listUsers = Personnel::all();

        $positionlists = $this->getPosition();
        $personnellists = $this->getPersonnel();
        $roleList = Role::all();
        $localityList = Locality::all();
        $personnelLevelList = PersonnelLevel::all();

        $listUsers = Personnel::all();
        $pagination = $this->pagination($departmentList);

        $areaTree =  Department::with('khuVucs.diaBans.tuyens')->where('code', 'like', 'VUNG%')->get();
        // dd( $pagination);
        return view("Deparment.index", [
            "Department" => $Department,
            "limit" => $limit,
            "departmentList" => $departmentList,
            'don_vi_me' => $don_vi_me,
            'leader_name' => $leader_name,
            "departmentlists" => $departmentlists,
            'search' => $search,
            'UnitLeaderList' => $UnitLeaderList,
            "departmentListTree" => $departmentListTree,
            'listUsers' => $listUsers,
            'personnelLevelList' => $personnelLevelList,
            'positionlists' => $positionlists,
            'roleList' => $roleList,
            'areaTree' =>  $areaTree,
            'localityList' => $localityList,
            'personnellists' => $personnellists,
            'pagination' => $pagination,
        ]);
    }

    public function index2(Request $request)
    {
        $LIMIT = 10;
        if ($request->has('limit')) {
            $LIMIT = $request->input('limit');
        }
        $department_id = $request->get('department_id');
        $search = $request->get('search');
        $q = $request->query('q');
        $parent = $request->query('parent');
        $cap_nhan_su = $request->query('cap_nhan_su');

        $query = Department::query();
        // $departmentList = Department::
        $query->leftJoin('personnel', 'personnel.id', '=', 'department.ib_lead')
            ->select(
                'department.id',
                'department.name',
                'department.description',
                'department.code',
                'department.parent',
                'department.ib_lead',
                'personnel.name as leader_name'
            );

        if ($cap_nhan_su == "all") {
            $cap_nhan_su = null;
        }

        if ($parent == "all") {
            $parent = null;
        }

        $departmentList = $query->get();
        // dd($departmentList);
        $UnitLeaderList = Personnel::all();

        $departmentListTree = Department::where('parent', 0)->with('donViCon')->get();
        // dd($departmentListTree);
        $departmentlists = $this->getDepartment();

        $getDept = [];
        $listPosToDept = [];
        if ($department_id) {
            $getDept = Department::with('areas')->find($department_id);
            if (!$getDept) {
                return View::make('404');
            }
            $listPosToDept = Position::query();

            if ($q) {
                $listPosToDept = $listPosToDept->where(function ($query) use ($q) {
                    $query->where("name", "like", "%{$q}%")
                        ->orWhere("code", "like", "%{$q}%")
                        ->orWhere("description", "like", "%{$q}%");
                });
            }
            if ($cap_nhan_su) {
                $listPosToDept = $listPosToDept->where('personnel_level', $cap_nhan_su);
            }
            if ($parent) {
                $listPosToDept = $listPosToDept->where('parent', $parent);
            }
            $listPosToDept = $listPosToDept->with('levels', 'department')->where('department_id', $department_id)
                ->orWhereHas('department', function ($query) use ($department_id) {
                    $query->where('parent', $department_id);
                })->paginate($LIMIT);

            $pagination = $this->pagination($listPosToDept);
        }

        $personnelLevelList = PersonnelLevel::all();
        $positionlists = $this->getPosition();
        $personnellists = $this->getPersonnel();
        $areaTree =  Department::with('khuVucs.diaBans.tuyens')->where('code', 'like', 'VUNG%')->get();
        return view("Deparment.index2", [
            "personnelLevelList" => $personnelLevelList,
            "positionlists" => $positionlists,
            "departmentList" => $departmentList,
            "departmentlists" => $departmentlists,
            'search' => $search,
            'UnitLeaderList' => $UnitLeaderList,
            "departmentListTree" => $departmentListTree,
            'getDept' => $getDept,
            'department_id' => $department_id,
            'listPosToDept' => $listPosToDept,
            'personnellists' => $personnellists,
            'pagination' => $pagination,
            'areaTree' => $areaTree
        ]);
    }

    public function getPosition()
    {
        $position = Position::orderBy('id', 'DESC')->get();
        $positionlists = [];
        Position::recursive($position, $parents = 0, $level = 1, $positionlists);
        return $positionlists;
    }

    public function assignUser(Request $request, $id)
    {
        $LIMIT = 1;
        if ($request->has('limit')) {
            $LIMIT = $request->input('limit');
        }
        $q = $request->query('q');
        $department = $request->query('department');
        $cap_nhan_su = $request->query('cap_nhan_su');
        $search = $request->get('search');
        $don_vi_me = $request->get('don_vi_me');
        $leader_name = $request->get('leader_name');
        $query = Department::query();
        // $departmentList = Department::
        $query->leftJoin('personnel', 'personnel.id', '=', 'department.ib_lead')
            ->select(
                'department.id',
                'department.order',
                'department.name',
                'department.description',
                'department.code',
                'department.parent',
                'department.ib_lead',
                'personnel.name as leader_name'
            );

        if ($cap_nhan_su == "all") {
            $cap_nhan_su = null;
        }

        if ($department == "all") {
            $department = null;
        }

        if ($search != NULL) {
            $query->where("department.name", "like", "%$search%");
        }
        if ($don_vi_me != NULL) {
            $query->where("department.name", "like", "%$don_vi_me%");
        }
        if ($leader_name != NULL) {
            $query->where("personnel.name", "like", "%$leader_name%");
        }
        $departmentList = $query->get();
        // dd($departmentList);
        $UnitLeaderList = Personnel::all();

        $departmentListTree = Department::where('parent', 0)->with('donViCon')->get();
        // dd($departmentListTree);
        $departmentlists = $this->getDepartment();
        $positionlists = $this->getPosition();
        $personnellists = $this->getPersonnel();
        $roleList = Role::all();
        $localityList = Locality::all();

        $personnelLevelList = PersonnelLevel::all();

        $getPos = Position::with('department.areas')->find($id);
        $department_id = $getPos['department_id'];
        $getDept = [];
        $listPosToDept = [];
        if ($department_id) {
            $getDept = Department::with('areas')->find($department_id);
            $listPosToDept = Position::with('levels')->where('department_id', $department_id)->where("position.code", "like", "%$search%")->get();
        }
        $listUsers = Personnel::query()->with('department', 'level', 'role');

        if ($q) {
            $listUsers = $listUsers->where(function ($query) use ($q) {
                $query->where('name', 'like', '%' . $q . '%')
                    ->orWhere('code', 'like', '%' . $q . '%')
                    ->orWhere('email', 'like', '%' . $q . '%');
            });
        }

        if ($department) {
            $listUsers = $listUsers->where('department_id', $department);
        }

        if ($cap_nhan_su) {
            $listUsers = $listUsers->where('personnel_lv_id', $cap_nhan_su);
        }

        $listUsers = $listUsers
            ->whereJsonContains('position_id', strval($id))->paginate($LIMIT);

        $selectableUser = Personnel::where(function ($query) use ($id) {
            $query->whereNull('position_id')
                ->orWhereJsonDoesntContain('position_id', strval($id));
        })->get();

        $pagination = $this->pagination($listUsers);
        $areaTree =  Department::with('khuVucs.diaBans.tuyens')->where('code', 'like', 'VUNG%')->get();
        return view("Deparment.assignUser", [
            "departmentList" => $departmentList,
            'don_vi_me' => $don_vi_me,
            'leader_name' => $leader_name,
            "departmentlists" => $departmentlists,
            'search' => $search,
            'UnitLeaderList' => $UnitLeaderList,
            'roleList' => $roleList,
            'localityList' => $localityList,
            'personnellists' => $personnellists,
            'positionlists' => $positionlists,
            'personnelLevelList' => $personnelLevelList,
            "departmentListTree" => $departmentListTree,
            'listUsers' => $listUsers,
            'getPos' => $getPos,
            'selectableUser' => $selectableUser,
            'getDept' => $getDept,
            'listPosToDept' => $listPosToDept,
            'pagination' => $pagination,
            'areaTree' => $areaTree
        ]);
    }

    public function getPersonnel()
    {
        $personnel = Personnel::orderBy('id', 'DESC')->get();
        $personnellists = [];
        Personnel::recursive($personnel, $manages = 0, $level = 1, $personnellists);
        return $personnellists;
    }

    public function left()
    {

        $departmentList = Department::whereNull('parent')->with('donViCon')->get();
        // dd($departmentList);
        $departmentlists = $this->getDepartment();
        // dd($departmentlists);
        return view("template.sidebar.sidebarDepartment.sidebarLeft", [
            "departmentList" => $departmentList,
            "departmentlists" => $departmentlists
        ]);
    }

    public function getDepartment()
    {
        $department = Department::orderBy('id', 'DESC')->get();
        $departmentlists = [];
        Department::recursive($department, $parents = 0, $level = 1, $departmentlists);
        return $departmentlists;
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $order = $request->get('order');
        $code = $request->get('code');
        $ib_lead = $request->get('ib_lead');
        $parent = $request->get('parent');
        $description = $request->get('description');
        $data = new Department();
        $data->name = $name;
        $data->order = $order;
        $data->parent = $parent;
        $data->code = $code;
        $data->ib_lead = $ib_lead;
        $data->description = $description;
        $data->save();
        Session::flash('success', 'Thêm mới thành công');
        return redirect()->route('department.index');
    }

    public function update(Request $request, $id)
    {
        $unitToMoveId = $request->get('unit_to_move_id');
        $targetUnitId = $request->get('target_unit_id');
        $name = $request->get('name');
        $ib_lead = $request->get('ib_lead');
        $parent = $request->get('parent');
        $code = $request->get('code');
        $description = $request->get('description');
        if ($request['status'] || $request['demarcation']) {
            $status = $request->get('status');
            $demarcation = $request->get('demarcation');
        } else {
            $data = Department::find($id);
            $status = $data->status;
            $demarcation = $data->demarcation;
        }
        $data = Department::find($id);
        $data->name = $name;
        $data->code = $code;
        $data->parent = $parent;
        $data->ib_lead = $ib_lead;
        $data->description = $description;
        $data->status = $status;
        $data->demarcation = $demarcation;
        $unit1 = Department::where('order', $unitToMoveId)->first();
        $unit2 = Department::where('order', $targetUnitId)->first();

        // Kiểm tra nếu cả hai đơn vị tồn tại
        if ($unit1 && $unit2) {
            // Hoán đổi dữ liệu
            $tempName = $unit1->order;
            $unit1->order = $unit2->order;
            $unit2->order = $tempName;

            // Lưu thay đổi vào cơ sở dữ liệu
            $unit1->save();
            $unit2->save();
            $data->save();

            // return redirect()->back()->with('success', 'Đã hoán đổi tên đơn vị thành công.');
        }

        Session::flash('success', 'Sửa thành công');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Department::destroy($id);
        // $selectedItems = $request->input('selected_items', []);
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();
    }

    // public function destroy($id)
    // {
    //     Department::destroy($id);
    //     $selectedItems = $request->input('selected_items', []);
    //     Session::flash('success', 'Đã xoá!');
    //     return redirect()->back();
    //     Department::destroy($id);
    //     $record = Department::find($id);
    //     if (!$record) {
    //         // Nếu không tìm thấy bản ghi, chuyển người dùng trở lại trang trước đó
    //         return back()->with('error', 'Bản ghi không tồn tại.');
    //     }
    //     $record->delete();
    //     return back()->with('success', 'Bản ghi đã được xóa thành công.');

    //     return redirect()->route('department.index');

    //     $route = Department::findOrFail($id);
    //     $route->delete();

    //     Session::flash('success', "Xoá tuyến thành công");
    //     return redirect()->route('department.index');
    // }

    public function delete(Request $request)
    {
        // Department::destroy($id);
        $selectedItems = $request->input('selected_items', []);
        Department::whereIn('id', $selectedItems)->delete();
        Session::flash('success', 'Đã xoá!');
        return redirect()->back();
    }

    public function getAll()
    {
        $departmentList = Department::where('name', 'like', 'KENH%')->get();
        return $departmentList;
    }

    public function editStt(Request $request)
    {
        $unitToMoveId = $request->input('unit_to_move_id');
        $targetUnitId = $request->input('target_unit_id');
        try {
            // Lấy dữ liệu từ hai đơn vị
            $unit1 = Department::where('order', $unitToMoveId)->first();
            $unit2 = Department::where('order', $targetUnitId)->first();

            // Kiểm tra nếu cả hai đơn vị tồn tại
            if ($unit1 && $unit2) {
                // Hoán đổi dữ liệu
                $tempName = $unit1->order;
                $unit1->order = $unit2->order;
                $unit2->order = $tempName;

                // Lưu thay đổi vào cơ sở dữ liệu
                $unit1->save();
                $unit2->save();

                // return redirect()->back()->with('success', 'Đã hoán đổi tên đơn vị thành công.');
            } else {
                return redirect()->back()->with('error', 'Không tìm thấy đơn vị.');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi hoán đổi tên đơn vị: ' . $e->getMessage());
        }
    }

    public function detach(Request $request)
    {
        //Detach position from department
        $selectedItems = $request->selected_items;
        foreach ($selectedItems as $selected_id) {
            $pos = Position::findOrFail($selected_id);
            $pos->department_id = null;
            $pos->save();
        }

        Session::flash('success', 'Đã xoá!');
        return redirect()->back();
    }
}
