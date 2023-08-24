<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Locality;
use App\Models\Personnel;
use App\Models\PersonnelLevel;
use App\Models\Position;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PersonnelController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');
        $dv_cong_tac = $request->get('dv_cong_tac');
        $vt_lam_vc = $request->get('vt_lam_vc');
        $cap_nhan_su = $request->get('cap_nhan_su');
        $vai_tro = $request->get('vai_tro');
        $dia_ban = $request->get('dia_ban');
        $trang_thai = $request->get('trang_thai');
        $query = Personnel::query();
        // $personnelList = Personnel::
        $query->leftJoin('department', 'department.id', '=', 'personnel.department_id')
            ->leftJoin('position', 'position.id', '=', 'personnel.position_id')
            ->leftJoin('personnel_level', 'personnel_level.id', '=', 'personnel.personnel_lv_id')
            ->leftJoin('role', 'role.id', '=', 'personnel.role_id')
            ->leftJoin('locality', 'locality.id', '=', 'personnel.area_id')
            ->select(
                'personnel.id',
                'personnel.name',
                'personnel.address',
                'personnel.gender',
                'personnel.birthday',
                'personnel.password',
                'personnel.code',
                'personnel.email',
                'personnel.annual_salary',
                'personnel.pack',
                'personnel.manage',
                'personnel.phone',
                'personnel.working_form',
                'personnel.status',
                'personnel.department_id',
                'personnel.personnel_lv_id',
                'personnel.position_id',
                'department.name as department_name',
                'position.name as position_name',
                'personnel_level.name as personnel_level_name',
                'personnel.role_id',
                'role.name as role_name',
                'locality.name as locality_name',
                'personnel.area_id'
                // 'personnel.id',
            );
        if ($search != NULL) {
            $query->where("personnel.code", "like", "%$search%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.name", "like", "%$search%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.phone", "like", "%$search%");
        }
        if ($dv_cong_tac != NULL) {
            $query->where("department.name", "like", "%$dv_cong_tac%");
        }
        if ($vt_lam_vc != NULL) {
            $query->where("position.name", "like", "%$vt_lam_vc%");
        }
        if ($cap_nhan_su != NULL) {
            $query->where("personnel_level.name", "like", "%$cap_nhan_su%");
        }
        if ($vai_tro != NULL) {
            $query->where("role.name", "like", "%$vai_tro%");
        }
        if ($dia_ban != NULL) {
            $query->where("locality.name", "like", "%$dia_ban%");
        }
        if ($trang_thai != NULL) {
            $query->where("personnel.status", "like", "%$trang_thai%");
        }
        // ->where("personnel.code", "like", "%$search%")
        $personnelList = $query->paginate(15);
        $departmentlists = $this->getDepartment();
        $positionlists = $this->getPosition();
        $personnellists = $this->getPersonnel();
        $personnelLevelList = PersonnelLevel::all();
        $roleList = Role::all();
        $localityList = Locality::all();
        $departmentListTree = Department::where('parent', 0)->with('donViCon')->get();
        // dd($personnelLevelList);
        return view("ds_nhan_su.index", [
            "personnelList" => $personnelList,
            "departmentlists" => $departmentlists,
            "positionlists" => $positionlists,
            "localityList" => $localityList,
            "personnellists" => $personnellists,
            "personnelLevelList" => $personnelLevelList,
            "roleList" => $roleList,
            "dv_cong_tac" => $dv_cong_tac,
            "vt_lam_vc" => $vt_lam_vc,
            "cap_nhan_su" => $cap_nhan_su,
            "vai_tro" => $vai_tro,
            "dia_ban" => $dia_ban,
            "trang_thai" => $trang_thai,
            "departmentListTree" => $departmentListTree,
            'search' => $search
        ]);
    }

    public function indexvtri(Request $request)
    {
        $search = $request->get('search');
        $dv_cong_tac = $request->get('dv_cong_tac');
        $vt_lam_vc = $request->get('vt_lam_vc');
        $cap_nhan_su = $request->get('cap_nhan_su');
        $vai_tro = $request->get('vai_tro');
        $dia_ban = $request->get('dia_ban');
        $trang_thai = $request->get('trang_thai');
        $query = Personnel::query();
        // $personnelList = Personnel::
        $query->leftJoin('department', 'department.id', '=', 'personnel.department_id')
            ->leftJoin('position', 'position.id', '=', 'personnel.position_id')
            ->leftJoin('personnel_level', 'personnel_level.id', '=', 'personnel.personnel_lv_id')
            ->leftJoin('role', 'role.id', '=', 'personnel.role_id')
            ->leftJoin('locality', 'locality.id', '=', 'personnel.area_id')
            ->select(
                'personnel.id',
                'personnel.name',
                'personnel.address',
                'personnel.gender',
                'personnel.birthday',
                'personnel.password',
                'personnel.code',
                'personnel.email',
                'personnel.annual_salary',
                'personnel.pack',
                'personnel.manage',
                'personnel.phone',
                'personnel.working_form',
                'personnel.status',
                'personnel.department_id',
                'personnel.personnel_lv_id',
                'personnel.position_id',
                'department.name as department_name',
                'position.name as position_name',
                'personnel_level.name as personnel_level_name',
                'personnel.role_id',
                'role.name as role_name',
                'locality.name as locality_name',
                'personnel.area_id'
                // 'personnel.id',
            );
        if ($search != NULL) {
            $query->where("personnel.code", "like", "%$search%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.name", "like", "%$search%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.phone", "like", "%$search%");
        }
        if ($dv_cong_tac != NULL) {
            $query->where("department.name", "like", "%$dv_cong_tac%");
        }
        if ($vt_lam_vc != NULL) {
            $query->where("position.name", "like", "%$vt_lam_vc%");
        }
        if ($cap_nhan_su != NULL) {
            $query->where("personnel_level.name", "like", "%$cap_nhan_su%");
        }
        if ($vai_tro != NULL) {
            $query->where("role.name", "like", "%$vai_tro%");
        }
        if ($dia_ban != NULL) {
            $query->where("locality.name", "like", "%$dia_ban%");
        }
        if ($trang_thai != NULL) {
            $query->where("personnel.status", "like", "%$trang_thai%");
        }
        // ->where("personnel.code", "like", "%$search%")
        $personnelList = $query->paginate(15);
        $departmentlists = $this->getDepartment();
        $positionlists = $this->getPosition();
        $personnellists = $this->getPersonnel();
        $personnelLevelList = PersonnelLevel::all();
        $roleList = Role::all();
        $localityList = Locality::all();
        $positionListTree = Position::where('parent', 0)->with('donViCon')->get();
        // dd($personnelLevelList);
        return view("ds_nhan_su.index_vtri", [
            "personnelList" => $personnelList,
            "departmentlists" => $departmentlists,
            "positionlists" => $positionlists,
            "localityList" => $localityList,
            "personnellists" => $personnellists,
            "personnelLevelList" => $personnelLevelList,
            "roleList" => $roleList,
            "dv_cong_tac" => $dv_cong_tac,
            "vt_lam_vc" => $vt_lam_vc,
            "cap_nhan_su" => $cap_nhan_su,
            "vai_tro" => $vai_tro,
            "dia_ban" => $dia_ban,
            "trang_thai" => $trang_thai,
            "positionListTree" => $positionListTree,
            'search' => $search
        ]);
    }

    public function indexDiaBan(Request $request)
    {
        $search = $request->get('search');
        $dv_cong_tac = $request->get('dv_cong_tac');
        $vt_lam_vc = $request->get('vt_lam_vc');
        $cap_nhan_su = $request->get('cap_nhan_su');
        $vai_tro = $request->get('vai_tro');
        $dia_ban = $request->get('dia_ban');
        $trang_thai = $request->get('trang_thai');
        $query = Personnel::query();
        // $personnelList = Personnel::
        $query->leftJoin('department', 'department.id', '=', 'personnel.department_id')
            ->leftJoin('position', 'position.id', '=', 'personnel.position_id')
            ->leftJoin('personnel_level', 'personnel_level.id', '=', 'personnel.personnel_lv_id')
            ->leftJoin('role', 'role.id', '=', 'personnel.role_id')
            ->leftJoin('locality', 'locality.id', '=', 'personnel.area_id')
            ->select(
                'personnel.id',
                'personnel.name',
                'personnel.address',
                'personnel.gender',
                'personnel.birthday',
                'personnel.password',
                'personnel.code',
                'personnel.email',
                'personnel.annual_salary',
                'personnel.pack',
                'personnel.manage',
                'personnel.phone',
                'personnel.working_form',
                'personnel.status',
                'personnel.department_id',
                'personnel.personnel_lv_id',
                'personnel.position_id',
                'department.name as department_name',
                'position.name as position_name',
                'personnel_level.name as personnel_level_name',
                'personnel.role_id',
                'role.name as role_name',
                'locality.name as locality_name',
                'personnel.area_id'
                // 'personnel.id',
            );
        if ($search != NULL) {
            $query->where("personnel.code", "like", "%$search%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.name", "like", "%$search%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.phone", "like", "%$search%");
        }
        if ($dv_cong_tac != NULL) {
            $query->where("department.name", "like", "%$dv_cong_tac%");
        }
        if ($vt_lam_vc != NULL) {
            $query->where("position.name", "like", "%$vt_lam_vc%");
        }
        if ($cap_nhan_su != NULL) {
            $query->where("personnel_level.name", "like", "%$cap_nhan_su%");
        }
        if ($vai_tro != NULL) {
            $query->where("role.name", "like", "%$vai_tro%");
        }
        if ($dia_ban != NULL) {
            $query->where("locality.name", "like", "%$dia_ban%");
        }
        if ($trang_thai != NULL) {
            $query->where("personnel.status", "like", "%$trang_thai%");
        }
        // ->where("personnel.code", "like", "%$search%")
        $personnelList = $query->paginate(15);
        $departmentlists = $this->getDepartment();
        $positionlists = $this->getPosition();
        $personnellists = $this->getPersonnel();
        $personnelLevelList = PersonnelLevel::all();
        $roleList = Role::all();
        $localityList = Locality::all();
        $areaTree =  Department::with('khuVucs.diaBans.tuyens')->where('code', 'like', 'VUNG%')->get();
        // dd($personnelLevelList);
        return view("ds_nhan_su.index_diaban", [
            "personnelList" => $personnelList,
            "departmentlists" => $departmentlists,
            "positionlists" => $positionlists,
            "localityList" => $localityList,
            "personnellists" => $personnellists,
            "personnelLevelList" => $personnelLevelList,
            "roleList" => $roleList,
            "dv_cong_tac" => $dv_cong_tac,
            "vt_lam_vc" => $vt_lam_vc,
            "cap_nhan_su" => $cap_nhan_su,
            "vai_tro" => $vai_tro,
            "dia_ban" => $dia_ban,
            "trang_thai" => $trang_thai,
            "areaTree" => $areaTree,
            'search' => $search
        ]);
    }


    public function show(Request $request, $department_id)
    {
        $search = $request->get('search');
        $dv_cong_tac = $request->get('dv_cong_tac');
        $vt_lam_vc = $request->get('vt_lam_vc');
        $cap_nhan_su = $request->get('cap_nhan_su');
        $vai_tro = $request->get('vai_tro');
        $dia_ban = $request->get('dia_ban');
        $trang_thai = $request->get('trang_thai');
        $query = Personnel::query();
        $query->leftJoin('department', 'department.id', '=', 'personnel.department_id')
            ->leftJoin('position', 'position.id', '=', 'personnel.position_id')
            ->leftJoin('personnel_level', 'personnel_level.id', '=', 'personnel.personnel_lv_id')
            ->leftJoin('role', 'role.id', '=', 'personnel.role_id')
            ->leftJoin('locality', 'locality.id', '=', 'personnel.area_id')
            ->select(
                'personnel.id',
                'personnel.name',
                'personnel.address',
                'personnel.gender',
                'personnel.birthday',
                'personnel.password',
                'personnel.code',
                'personnel.email',
                'personnel.annual_salary',
                'personnel.pack',
                'personnel.manage',
                'personnel.phone',
                'personnel.working_form',
                'personnel.status',
                'personnel.department_id',
                'personnel.personnel_lv_id',
                'personnel.position_id',
                'department.name as department_name',
                'position.name as position_name',
                'personnel_level.name as personnel_level_name',
                'personnel.role_id',
                'role.name as role_name',
                'locality.name as locality_name',
                'department.parent',
                'personnel.area_id'
                // 'personnel.id',
            );
        if ($search != NULL) {
            $query->where("personnel.code", "like", "%$search%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.name", "like", "%$search%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.phone", "like", "%$search%");
        }
        if ($dv_cong_tac != NULL) {
            $query->where("department.name", "like", "%$dv_cong_tac%");
        }
        if ($vt_lam_vc != NULL) {
            $query->where("position.name", "like", "%$vt_lam_vc%");
        }
        if ($cap_nhan_su != NULL) {
            $query->where("personnel_level.name", "like", "%$cap_nhan_su%");
        }
        if ($vai_tro != NULL) {
            $query->where("role.name", "like", "%$vai_tro%");
        }
        if ($dia_ban != NULL) {
            $query->where("locality.name", "like", "%$dia_ban%");
        }
        if ($trang_thai != NULL) {
            $query->where("personnel.status", "like", "%$trang_thai%");
        }
        // ->where("personnel.code", "like", "%$search%")
        // ->where("personnel.department_id", $department_id)

        // ->orWhereHas('department', function ($query) use ($department_id) {
        //     $query->where('department.parent', $department_id);
        // })
        // ->Where("personnel.department_id", $department_id)
        $personnelList = $query->where("personnel.department_id", $department_id)
            ->orWhereHas('department', function ($query) use ($department_id) {
                $query->where('department.parent', $department_id);
            })->paginate(15);
        $departmentlists = $this->getDepartment();
        $positionlists = $this->getPosition();
        $personnellists = $this->getPersonnel();
        $personnelLevelList = PersonnelLevel::all();
        $roleList = Role::all();
        $localityList = Locality::all();
        $departmentListTree = Department::where('parent', 0)->with('donViCon')->get();
        // dd($personnelLevelList);
        return view("ds_nhan_su.show", [
            "personnelList" => $personnelList,
            "departmentlists" => $departmentlists,
            "positionlists" => $positionlists,
            "localityList" => $localityList,
            "personnellists" => $personnellists,
            "personnelLevelList" => $personnelLevelList,
            "roleList" => $roleList,
            "dv_cong_tac" => $dv_cong_tac,
            "vt_lam_vc" => $vt_lam_vc,
            "cap_nhan_su" => $cap_nhan_su,
            "vai_tro" => $vai_tro,
            "dia_ban" => $dia_ban,
            "trang_thai" => $trang_thai,
            "departmentListTree" => $departmentListTree,
            'search' => $search
        ]);
    }

    public function showVung(Request $request, $department_id)
    {
        $search = $request->get('search');
        $dv_cong_tac = $request->get('dv_cong_tac');
        $vt_lam_vc = $request->get('vt_lam_vc');
        $cap_nhan_su = $request->get('cap_nhan_su');
        $vai_tro = $request->get('vai_tro');
        $dia_ban = $request->get('dia_ban');
        $trang_thai = $request->get('trang_thai');
        $query = Personnel::query();
        $query->leftJoin('department', 'department.id', '=', 'personnel.department_id')
            ->leftJoin('position', 'position.id', '=', 'personnel.position_id')
            ->leftJoin('personnel_level', 'personnel_level.id', '=', 'personnel.personnel_lv_id')
            ->leftJoin('role', 'role.id', '=', 'personnel.role_id')
            ->leftJoin('locality', 'locality.id', '=', 'personnel.area_id')
            ->select(
                'personnel.id',
                'personnel.name',
                'personnel.address',
                'personnel.gender',
                'personnel.birthday',
                'personnel.password',
                'personnel.code',
                'personnel.email',
                'personnel.annual_salary',
                'personnel.pack',
                'personnel.manage',
                'personnel.phone',
                'personnel.working_form',
                'personnel.status',
                'personnel.department_id',
                'personnel.personnel_lv_id',
                'personnel.position_id',
                'department.name as department_name',
                'position.name as position_name',
                'personnel_level.name as personnel_level_name',
                'personnel.role_id',
                'role.name as role_name',
                'locality.name as locality_name',
                'personnel.area_id'
                // 'personnel.id',
            );
        if ($search != NULL) {
            $query->where("personnel.code", "like", "%$search%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.name", "like", "%$search%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.phone", "like", "%$search%");
        }
        if ($dv_cong_tac != NULL) {
            $query->where("department.name", "like", "%$dv_cong_tac%");
        }
        if ($vt_lam_vc != NULL) {
            $query->where("position.name", "like", "%$vt_lam_vc%");
        }
        if ($cap_nhan_su != NULL) {
            $query->where("personnel_level.name", "like", "%$cap_nhan_su%");
        }
        if ($vai_tro != NULL) {
            $query->where("role.name", "like", "%$vai_tro%");
        }
        if ($dia_ban != NULL) {
            $query->where("locality.name", "like", "%$dia_ban%");
        }
        if ($trang_thai != NULL) {
            $query->where("personnel.status", "like", "%$trang_thai%");
        }
        // ->where("personnel.code", "like", "%$search%")
        // ->where("personnel.department_id", $department_id)

        // ->orWhereHas('department', function ($query) use ($department_id) {
        //     $query->where('department.parent', $department_id);
        // })
        // ->Where("personnel.department_id", $department_id)
        $personnelList = $query->where("personnel.department_id", $department_id)
            ->orWhereHas('department', function ($query) use ($department_id) {
                $query->where('department.parent', $department_id);
            })
            ->paginate(15);
        $departmentlists = $this->getDepartment();
        $positionlists = $this->getPosition();
        $personnellists = $this->getPersonnel();
        $personnelLevelList = PersonnelLevel::all();
        $roleList = Role::all();
        $localityList = Locality::all();
        $areaTree =  Department::with('khuVucs.diaBans.tuyens')->where('code', 'like', 'VUNG%')->get();
        // dd($personnelLevelList);
        return view("ds_nhan_su.show_vung", [
            "personnelList" => $personnelList,
            "departmentlists" => $departmentlists,
            "positionlists" => $positionlists,
            "localityList" => $localityList,
            "personnellists" => $personnellists,
            "personnelLevelList" => $personnelLevelList,
            "roleList" => $roleList,
            "dv_cong_tac" => $dv_cong_tac,
            "vt_lam_vc" => $vt_lam_vc,
            "cap_nhan_su" => $cap_nhan_su,
            "vai_tro" => $vai_tro,
            "dia_ban" => $dia_ban,
            "trang_thai" => $trang_thai,
            "areaTree" => $areaTree,
            'search' => $search
        ]);
    }

    public function showVTri(Request $request, $position_id)
    {
        $search = $request->get('search');
        $dv_cong_tac = $request->get('dv_cong_tac');
        $vt_lam_vc = $request->get('vt_lam_vc');
        $cap_nhan_su = $request->get('cap_nhan_su');
        $vai_tro = $request->get('vai_tro');
        $dia_ban = $request->get('dia_ban');
        $trang_thai = $request->get('trang_thai');
        $query = Personnel::query();
        $query->leftJoin('department', 'department.id', '=', 'personnel.department_id')
            ->leftJoin('position', 'position.id', '=', 'personnel.position_id')
            ->leftJoin('personnel_level', 'personnel_level.id', '=', 'personnel.personnel_lv_id')
            ->leftJoin('role', 'role.id', '=', 'personnel.role_id')
            ->leftJoin('locality', 'locality.id', '=', 'personnel.area_id')
            ->select(
                'personnel.id',
                'personnel.name',
                'personnel.address',
                'personnel.gender',
                'personnel.birthday',
                'personnel.password',
                'personnel.code',
                'personnel.email',
                'personnel.annual_salary',
                'personnel.pack',
                'personnel.manage',
                'personnel.phone',
                'personnel.working_form',
                'personnel.status',
                'personnel.department_id',
                'personnel.personnel_lv_id',
                'personnel.position_id',
                'department.name as department_name',
                'position.name as position_name',
                'personnel_level.name as personnel_level_name',
                'personnel.role_id',
                'role.name as role_name',
                'locality.name as locality_name',
                'personnel.area_id'
                // 'personnel.id',
            );
        if ($search != NULL) {
            $query->where("personnel.code", "like", "%$search%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.name", "like", "%$search%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.phone", "like", "%$search%");
        }
        if ($dv_cong_tac != NULL) {
            $query->where("department.name", "like", "%$dv_cong_tac%");
        }
        if ($vt_lam_vc != NULL) {
            $query->where("position.name", "like", "%$vt_lam_vc%");
        }
        if ($cap_nhan_su != NULL) {
            $query->where("personnel_level.name", "like", "%$cap_nhan_su%");
        }
        if ($vai_tro != NULL) {
            $query->where("role.name", "like", "%$vai_tro%");
        }
        if ($dia_ban != NULL) {
            $query->where("locality.name", "like", "%$dia_ban%");
        }
        if ($trang_thai != NULL) {
            $query->where("personnel.status", "like", "%$trang_thai%");
        }

        $personnelList = $query->where("personnel.position_id", $position_id)
            ->orWhereHas('position', function ($query) use ($position_id) {
                $query->where('position.parent', $position_id);
            })
            ->paginate(15);
        $departmentlists = $this->getDepartment();
        $positionlists = $this->getPosition();
        $personnellists = $this->getPersonnel();
        $personnelLevelList = PersonnelLevel::all();
        $roleList = Role::all();
        $localityList = Locality::all();
        $positionListTree = Position::where('parent', 0)->with('donViCon')->get();
        // dd($personnelLevelList);
        return view("ds_nhan_su.show_vtri", [
            "personnelList" => $personnelList,
            "departmentlists" => $departmentlists,
            "positionlists" => $positionlists,
            "localityList" => $localityList,
            "personnellists" => $personnellists,
            "personnelLevelList" => $personnelLevelList,
            "roleList" => $roleList,
            "dv_cong_tac" => $dv_cong_tac,
            "vt_lam_vc" => $vt_lam_vc,
            "cap_nhan_su" => $cap_nhan_su,
            "vai_tro" => $vai_tro,
            "dia_ban" => $dia_ban,
            "trang_thai" => $trang_thai,
            "positionListTree" => $positionListTree,
            'search' => $search
        ]);
    }

    public function showDiaBan(Request $request, $area_id)
    {
        $search = $request->get('search');
        $dv_cong_tac = $request->get('dv_cong_tac');
        $vt_lam_vc = $request->get('vt_lam_vc');
        $cap_nhan_su = $request->get('cap_nhan_su');
        $vai_tro = $request->get('vai_tro');
        $dia_ban = $request->get('dia_ban');
        $trang_thai = $request->get('trang_thai');
        $query = Personnel::query();
        $query->leftJoin('department', 'department.id', '=', 'personnel.department_id')
            ->leftJoin('position', 'position.id', '=', 'personnel.position_id')
            ->leftJoin('personnel_level', 'personnel_level.id', '=', 'personnel.personnel_lv_id')
            ->leftJoin('role', 'role.id', '=', 'personnel.role_id')
            ->leftJoin('locality', 'locality.id', '=', 'personnel.area_id')
            ->select(
                'personnel.id',
                'personnel.name',
                'personnel.address',
                'personnel.gender',
                'personnel.birthday',
                'personnel.password',
                'personnel.code',
                'personnel.email',
                'personnel.annual_salary',
                'personnel.pack',
                'personnel.manage',
                'personnel.phone',
                'personnel.working_form',
                'personnel.status',
                'personnel.department_id',
                'personnel.personnel_lv_id',
                'personnel.position_id',
                'department.name as department_name',
                'position.name as position_name',
                'personnel_level.name as personnel_level_name',
                'personnel.role_id',
                'role.name as role_name',
                'locality.name as locality_name',
                'personnel.area_id'
                // 'personnel.id',
            );
        if ($search != NULL) {
            $query->where("personnel.code", "like", "%$search%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.name", "like", "%$search%");
        }
        if ($search != NULL) {
            $query->orWhere("personnel.phone", "like", "%$search%");
        }
        if ($dv_cong_tac != NULL) {
            $query->where("department.name", "like", "%$dv_cong_tac%");
        }
        if ($vt_lam_vc != NULL) {
            $query->where("position.name", "like", "%$vt_lam_vc%");
        }
        if ($cap_nhan_su != NULL) {
            $query->where("personnel_level.name", "like", "%$cap_nhan_su%");
        }
        if ($vai_tro != NULL) {
            $query->where("role.name", "like", "%$vai_tro%");
        }
        if ($dia_ban != NULL) {
            $query->where("locality.name", "like", "%$dia_ban%");
        }
        if ($trang_thai != NULL) {
            $query->where("personnel.status", "like", "%$trang_thai%");
        }

        $personnelList = $query->where("personnel.area_id", $area_id)
            ->paginate(15);
        $departmentlists = $this->getDepartment();
        $positionlists = $this->getPosition();
        $personnellists = $this->getPersonnel();
        $personnelLevelList = PersonnelLevel::all();
        $roleList = Role::all();
        $localityList = Locality::all();
        $areaTree =  Department::with('khuVucs.diaBans.tuyens')->where('code', 'like', 'VUNG%')->get();
        // dd($personnelLevelList);
        return view("ds_nhan_su.show_dia_ban", [
            "personnelList" => $personnelList,
            "departmentlists" => $departmentlists,
            "positionlists" => $positionlists,
            "localityList" => $localityList,
            "personnellists" => $personnellists,
            "personnelLevelList" => $personnelLevelList,
            "roleList" => $roleList,
            "dv_cong_tac" => $dv_cong_tac,
            "vt_lam_vc" => $vt_lam_vc,
            "cap_nhan_su" => $cap_nhan_su,
            "vai_tro" => $vai_tro,
            "dia_ban" => $dia_ban,
            "trang_thai" => $trang_thai,
            "areaTree" => $areaTree,
            'search' => $search
        ]);
    }


    public function getPersonnel()
    {
        $personnel = Personnel::orderBy('id', 'DESC')->get();
        $personnellists = [];
        Personnel::recursive($personnel, $manages = 0, $level = 1, $personnellists);
        return $personnellists;
    }

    public function getDepartment()
    {
        $department = Department::orderBy('id', 'DESC')->get();
        $departmentlists = [];
        Department::recursive($department, $parents = 0, $level = 1, $departmentlists);
        return $departmentlists;
    }

    public function getPosition()
    {
        $position = Position::orderBy('id', 'DESC')->get();
        $positionlists = [];
        Position::recursive($position, $parents = 0, $level = 1, $positionlists);
        return $positionlists;
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $department_id = $request->get('department_id');
        $position_id = $request->get('position_id');
        $personnel_lv_id = $request->get('personnel_lv_id');
        $role_id = $request->get('role_id');
        $area_id = $request->get('area_id');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $working_form = $request->get('working_form');
        $status = $request->get('status');
        $password = $request->get('password');
        $birthday = $request->get('birthday');
        $address = $request->get('address');
        $gender = $request->get('gender');
        $annual_salary = $request->get('annual_salary');
        $pack = $request->get('pack');
        $manage = $request->get('manage');
        $checkmail = Personnel::where('email', $email)->orWhere('phone', $phone)->first();
        if ($checkmail){
            return redirect()->back()->with('error', 'Email hoặc số điện thoại đã tồn tại. Xin vui lòng nhập lại!');
        }
        $data = new Personnel();
        $data->name = $name;
        $data->department_id = $department_id;
        $data->code = $code;
        $data->position_id = $position_id;
        $data->department_id = $department_id;
        $data->personnel_lv_id = $personnel_lv_id;
        $data->pack = $pack;
        $data->role_id = $role_id;
        $data->area_id = $area_id;
        $data->email = $email;
        $data->phone = $phone;
        $data->working_form = $working_form;
        $data->status = $status;
        $data->password = $password;
        $data->birthday = $birthday;
        $data->address = $address;
        $data->annual_salary = $annual_salary;
        $data->gender = $gender;
        $data->manage = $manage;
        $data->save();
        return redirect()->route('Personnel.index');
    }

    public function update(Request $request, $id)
    {
        $name = $request->get('name');
        $code = $request->get('code');
        $department_id = $request->get('department_id');
        $position_id = $request->get('position_id');
        $personnel_lv_id = $request->get('personnel_lv_id');
        $role_id = $request->get('role_id');
        $area_id = $request->get('area_id');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $working_form = $request->get('working_form');
        $status = $request->get('status');
        $password = $request->get('password');
        $birthday = $request->get('birthday');
        $address = $request->get('address');
        $gender = $request->get('gender');
        $annual_salary = $request->get('annual_salary');
        $pack = $request->get('pack');
        $manage = $request->get('manage');
        $data = Personnel::find($id);
        $data->name = $name;
        $data->department_id = $department_id;
        $data->code = $code;
        $data->position_id = $position_id;
        $data->department_id = $department_id;
        $data->personnel_lv_id = $personnel_lv_id;
        $data->pack = $pack;
        $data->role_id = $role_id;
        $data->area_id = $area_id;
        $data->email = $email;
        $data->phone = $phone;
        $data->working_form = $working_form;
        $data->status = $status;
        $data->password = $password;
        $data->birthday = $birthday;
        $data->address = $address;
        $data->annual_salary = $annual_salary;
        $data->gender = $gender;
        $data->manage = $manage;
        $data->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        Personnel::destroy($id);
        return redirect()->back()->with('mess', 'Đã xóa !');;
    }

    public function delete(Request $request)
    {

        $selectedItems = $request->input('selected_items', []);
        Personnel::whereIn('id', $selectedItems)->delete();
        return redirect()->back()->with('mess', 'Đã xóa!');
    }

    public function view()
    {
        $personnelList = Personnel::all();
        return $personnelList;
    }

    public function assignPosition($id, Request $request)
    {
        $user = Personnel::findOrFail($request->assignUser);
        $positionIds = $user->position_id;
        // Decode the existing array
        $decodedPositionIds = json_decode($positionIds, true);

        // Add the new ID to the existing array
        $decodedPositionIds[] = strval($id);

        // Encode the modified array back to JSON
        $updatedPositionIds = json_encode($decodedPositionIds);
        $user->position_id = $updatedPositionIds;
        $user->save();

        Session::flash('success', "Gán nhân sự thành công");
        return back();
    }

    public function removePosition($user_id, $pos_id)
    {
        $user = Personnel::findOrFail($user_id);
        $positionIds = $user->position_id;
        // Decode the existing array
        $decodedPositionIds = json_decode($positionIds, true);

        // Search for the ID in the array
        $key = array_search($pos_id, $decodedPositionIds);

        // If the ID is found, remove it from the array
        if ($key !== false) {
            unset($decodedPositionIds[$key]);
        }
        // Encode the modified array back to JSON
        $updatedPositionIds = json_encode($decodedPositionIds);
        $user->position_id = $updatedPositionIds;
        $user->save();

        Session::flash('success', "Gỡ nhân sự thành công");
        return back();
    }

    public function me(Request $request)
    {
            $id = session('user')["id"];

            // dd($user);
            // return $user;
            $departmentlists = $this->getDepartment();
            $positionlists = $this->getPosition();
            $personnelLevelList = PersonnelLevel::all();
            $roleList = Role::all();
            $localityList = Locality::all();
            $personnellists = $this->getPersonnel();
            $personnelLevelList = PersonnelLevel::all();
            $user = DB::table('personnel')
                ->where('personnel.id', $id)
                ->leftJoin('department', 'department.id', '=', 'personnel.department_id')
                ->leftJoin('position', 'position.id', '=', 'personnel.position_id')
                ->leftJoin('personnel_level', 'personnel_level.id', '=', 'personnel.personnel_lv_id')
                ->leftJoin('role', 'role.id', '=', 'personnel.role_id')
                ->leftJoin('locality', 'locality.id', '=', 'personnel.area_id')
                ->select(
                    'personnel.id',
                    'personnel.name',
                    'personnel.address',
                    'personnel.gender',
                    'personnel.birthday',
                    'personnel.password',
                    'personnel.code',
                    'personnel.email',
                    'personnel.annual_salary',
                    'personnel.pack',
                    'personnel.manage',
                    'personnel.phone',
                    'personnel.working_form',
                    'personnel.status',
                    'personnel.department_id',
                    'personnel.personnel_lv_id',
                    'personnel.position_id',
                    'department.name as department_name',
                    'position.name as position_name',
                    'personnel_level.name as personnel_level_name',
                    'personnel.role_id',
                    'role.name as role_name',
                    'locality.name as locality_name',
                    'personnel.area_id'
                    // 'personnel.id',
                )
                ->get();

// dd($user);
            // $listPositionLevel = $this->dwtService->listPositionLevel();
            // $listUsers = $this->dwtService->listUsers();
            // $listEquimentPack = $this->dwtService->listEquimentPack();

            return view('information.profile')
                ->with('departmentlists', $departmentlists)
                ->with('positionlists', $positionlists)
                ->with('roleList', $roleList)
                ->with('personnellists', $personnellists)
                ->with('localityList', $localityList)
                ->with('user', $user)
                ->with('personnelLevelList', $personnelLevelList);
        
    }
}
