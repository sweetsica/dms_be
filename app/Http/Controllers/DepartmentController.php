<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Locality;
use App\Models\Personnel;
use App\Models\PersonnelLevel;
use App\Models\Position;
use App\Models\Role;
use App\Models\UnitLeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->get('search');
        $don_vi_me = $request->get('don_vi_me');
        $leader_name = $request->get('leader_name');

        // dd($abc);
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
        if ($search != NULL) {
            $query->where("department.name", "like", "%$search%");
        }
        if ($don_vi_me != NULL) {
            $query->where("department.parent", "like", "%$don_vi_me%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.name", "like", "%$search%");
        }
        $departmentList = $query->orderBy('department.id', 'desc')->paginate(15);
        // dd($departmentList);
        $UnitLeaderList = Personnel::all();
        $Department = Department::all();
        $departmentListTree = Department::where('parent', 0)->with('donViCon')->get();
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

        return view("Deparment.index", [
            "Department" => $Department,
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
            'localityList' => $localityList,
            'personnellists' => $personnellists,

        ]);
    }

    public function index2(Request $request)
    {
        $department_id = $request->get('department_id');
        $search = $request->get('search');
        $don_vi_me = $request->get('don_vi_me');
        $leader_name = $request->get('leader_name');
        $cap_nhan_su = $request->get('cap_nhan_su');
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
        // if ($search != NULL) {
        //     $query->where("department.code", "like", "%$search%");
        // }
        // if ($don_vi_me != NULL) {
        //     $query->where("department.name", "like", "%$don_vi_me%");
        // }
        // if ($search != NULL) {
        //     $query->where("personnel.name", "like", "%$search%");
        // }
        $departmentList = $query->paginate(15);
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
            $listPosToDept = Position::with('levels')->where('department_id', $department_id)->where("position.code", "like", "%$search%")->get();
        }
        $personnelLevelList = PersonnelLevel::all();
        $positionlists = $this->getPosition();
        return view("Deparment.index2", [
            "personnelLevelList" => $personnelLevelList,
            "positionlists" => $positionlists,
            "departmentList" => $departmentList,
            'don_vi_me' => $don_vi_me,
            'leader_name' => $leader_name,
            "departmentlists" => $departmentlists,
            'search' => $search,
            'UnitLeaderList' => $UnitLeaderList,
            "departmentListTree" => $departmentListTree,
            'getDept' => $getDept,
            'cap_nhan_su' => $cap_nhan_su,
            'department_id' => $department_id,
            'listPosToDept' => $listPosToDept
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
        $search = $request->get('search');
        $don_vi_me = $request->get('don_vi_me');
        $leader_name = $request->get('leader_name');
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
        if ($search != NULL) {
            $query->where("department.name", "like", "%$search%");
        }
        if ($don_vi_me != NULL) {
            $query->where("department.name", "like", "%$don_vi_me%");
        }
        if ($leader_name != NULL) {
            $query->where("personnel.name", "like", "%$leader_name%");
        }
        $departmentList = $query->paginate(15);
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
        $listUsers = Personnel::query();
        $department_id = $getPos['department_id'];
        $getDept = [];
        $listPosToDept = [];
        if ($department_id) {
            $getDept = Department::with('areas')->find($department_id);
            $listPosToDept = Position::with('levels')->where('department_id', $department_id)->where("position.code", "like", "%$search%")->get();
        }
        if ($search) {
            $listUsers = $listUsers->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('code', 'like', '%' . $search . '%');
            });
        }
        $listUsers = $listUsers->with('department', 'level', 'role')
            ->whereJsonContains('position_id', strval($id))->get();

        $selectableUser = Personnel::where(function ($query) use ($id) {
            $query->whereNull('position_id')
                ->orWhereJsonDoesntContain('position_id', strval($id));
        })->get();

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
            'listPosToDept' => $listPosToDept
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
        $code = $request->get('code');
        $ib_lead = $request->get('ib_lead');
        $parent = $request->get('parent');
        $description = $request->get('description');
        $data = new Department();
        $data->name = $name;
        $data->parent = $parent;
        $data->code = $code;
        $data->ib_lead = $ib_lead;
        $data->description = $description;
        $data->save();
        return redirect()->route('department.index');
    }

    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $ib_lead = $request->get('ib_lead');
        $parent = $request->get('parent');
        $code = $request->get('code');
        $description = $request->get('description');
        if ($request['status'] || $request['demarcation']){
            $status = $request->get('status');
            $demarcation = $request->get('demarcation');
        }
        else {
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
        $data->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        // Department::destroy($id);
        // $record = Department::find($id);
        // if (!$record) {
        //     // Nếu không tìm thấy bản ghi, chuyển người dùng trở lại trang trước đó
        //     return back()->with('error', 'Bản ghi không tồn tại.');
        // }
        // $record->delete();
        // return back()->with('success', 'Bản ghi đã được xóa thành công.');

            // return redirect()->route('department.index');

            $route = Department::findOrFail($id);
            $route->delete();

            Session::flash('success', "Xoá tuyến thành công");
            return redirect()->route('department.index');
    }

    public function delete(Request $request)
    {
        // Department::destroy($id);
        $selectedItems = $request->input('selected_items', []);
        Department::whereIn('id', $selectedItems)->delete();
        return redirect()->back()->with('mess', 'Đã xóa!');
    }

    public function getAll()
    {
        $departmentList = Department::where('name', 'like', 'KENH%')->get();
        return $departmentList;
    }
}
