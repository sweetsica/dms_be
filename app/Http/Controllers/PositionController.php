<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Personnel;
use App\Models\PersonnelLevel;
use App\Models\Position;
use App\Models\UnitLeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PositionController extends Controller
{

    public function index(Request $request){
        $search = $request->get('search');
        $cap_nhan_su = $request->get('cap_nhan_su');
        $dv_cong_tac = $request->get('dv_cong_tac');
        $query = Position::query();
        // $positionList = Position::s
        $query->join('department','department.id','=','position.department_id')
        ->join('personnel_level','personnel_level.id','=','position.personnel_level')

        ->select(
            'position.id',
            'position.name',
            'position.description',
            'position.code',
            'position.parent',

            'position.wage',
            // 'position.created_at',
            'position.pack',
            'position.department_id',
            'position.personnel_level',
            'personnel_level.name as personnel_level_name',
            'department.name as department_name',

            'position.staffing'
        );
        $pattern = '/^(SELECT|INSERT|UPDATE|DELETE|CREATE|ALTER|DROP)\s+.*/';
                if (preg_match($pattern, $search)) {
                    Session::flash('error', 'Lỗi đầu vào khi search');
                    return back();
                }        
        if($search != NULL) {
            $query->where("position.name", "like", "%$search%");
        }
        if($search != NULL) {
            $query->orWhere("position.code", "like", "%$search%");
        }
        if($dv_cong_tac != NULL) {
            $query->where("department.name", "like", "%$dv_cong_tac%");
        }
        if($cap_nhan_su != NULL) {
            $query->where("personnel_level.name", "like", "%$cap_nhan_su%");
        }

        $positionList =$query->orderBy('position.id', 'desc')->paginate(2);
        // dd($positionList);
        $UnitLeaderList = UnitLeader::all();
        $positionListTree = Position::where('parent',0)->with('donViCon')->get();
        $positionlists = $this->getPosition();
        $departmentlists = $this->getDepartment();
        $personnelLevelList = PersonnelLevel::all();


        return view("Position.index",[
            "positionList"=>$positionList,
            "positionlists"=>$positionlists,
            "departmentlists"=>$departmentlists,
            "personnelLevelList"=>$personnelLevelList,
            'search' => $search,
            'UnitLeaderList' => $UnitLeaderList,
            'dv_cong_tac' => $dv_cong_tac,
            'cap_nhan_su' => $cap_nhan_su,

            "positionListTree"=>$positionListTree
        ]);
    }

    public function left(){

        $positionlists = $this->getPosition();

        return view("template.sidebar.sidebarPosition.sidebarLeft",[

            "positionLists"=>$positionlists
        ]);
    }

    public function getDepartment(){
        $department = Department::orderBy('id','DESC')->get();
        $departmentlists = [];
        Department::recursive($department, $parents = 0,$level = 1, $departmentlists);
        return $departmentlists;
    }

    public function getPosition(){
        $position = Position::orderBy('id','DESC')->get();
        $positionlists = [];
        Position::recursive($position, $parents = 0,$level = 1, $positionlists);
        return $positionlists;
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $parent = $request->get('parent');
        $code  = $request->get('code');
        $staffing  = $request->get('staffing');
        $department_id  = $request->get('department_id');
        $personnel_level  = $request->get('personnel_level');
        $pack  = $request->get('pack');
        $wage  = $request->get('wage');
        $description  = $request->get('description');
        $data = new Position();
        $data->name = $name;
        $data->parent=$parent;
        $data->code=$code;
        $data->staffing=$staffing;
        $data->department_id=$department_id;
        $data->personnel_level=$personnel_level;
        $data->pack=$pack;
        $data->wage=$wage;
        $data->created_at = now();
        $data->updated_at = now();
        $data->description=$description;
        $data->save();
        Session::flash('success', 'Thêm mới thành công');
        return back();
    }

    public function update(Request $request,$id)
    {
        $name = $request->get('name');
        $parent = $request->get('parent');
        $code  = $request->get('code');
        $staffing  = $request->get('staffing');
        $department_id  = $request->get('department_id');
        $personnel_level  = $request->get('personnel_level');
        $pack  = $request->get('pack');
        $wage  = $request->get('wage');
        $description  = $request->get('description');
        $data = Position::find($id);
        $data->name = $name;
        $data->parent=$parent;
        $data->code=$code;
        $data->staffing=$staffing;
        $data->department_id=$department_id;
        $data->personnel_level=$personnel_level;
        $data->pack=$pack;
        $data->wage=$wage;
        $data->description=$description;
        $data->updated_at = now();
        $data->save();
        Session::flash('success', 'Sửa thành công');
        return back();
    }

    public function destroy($id)
    {
        Position::destroy($id);
        Session::flash('success', 'Xóa thành công');
        // return back();
        return redirect()->route('position.index');
    }

    public function delete(Request $request)
    {

        $selectedItems = $request->input('selected_items', []);
        Position::whereIn('id', $selectedItems)->delete();
        Session::flash('success', 'Đã xoá!');
        return back();
        // return redirect()->route('position.index');

    }
    public function detach($id)
    {
        $position = Position::findOrFail($id);
        $position->department_id = null;
        $position->save();

        Session::flash('success', 'Xoá thành công khỏi phòng ban này');
        return back();
    }
}
