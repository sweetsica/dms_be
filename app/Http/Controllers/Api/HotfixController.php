<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Personnel;
use Illuminate\Http\Request;

class HotfixController extends Controller
{
    public function personnel_position()
    {
        $msg = "";
        $allPersonnel = Personnel::all();
        foreach ($allPersonnel as $user) {
            $pos_id = intval($user->position_id);
            if (is_int($pos_id) && $pos_id != null) {
                $user->position_id = json_encode([strval($pos_id)]);
                $user->save();
                $msg = "change";
            }
        }
        dd('ok '. $msg);
    }
}
