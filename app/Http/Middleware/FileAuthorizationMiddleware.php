<?php

namespace App\Http\Middleware;

use App\Services\DwtServices;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class FileAuthorizationMiddleware
{
    private $dwtServices;
    //constructor
    public function __construct()
    {
        // $this->middleware('auth');
        $this->dwtServices = new DwtServices();
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('id'); // Assuming the file ID is part of the route parameter
        $file = $this->dwtServices->getFiles($id); // Retrieve the file from the database or however you access the file
        if (!$file) {
            return redirect()->back()->with('error', 'Something went wrong');
        }

        $loggedInUserId = Session::get('user')['id'];
        $loggedInDepId = Session::get('user')['departement_id'];
        $loggedInPosId = Session::get('user')['position_id'];
        $assignedIds = json_decode($file->fileAssignedId, true);
        $posIds = json_decode($file->filePosId, true);
        $depIds = json_decode($file->fileDepId, true);

        if($assignedIds){
            $hasPermission = in_array($loggedInUserId, $assignedIds)
                || in_array($loggedInPosId, $posIds)
                || in_array($loggedInDepId, $depIds)
                || $loggedInUserId == $file->fileOwnerId;
        }else{
            $hasPermission = in_array($loggedInPosId, $posIds)
                || in_array($loggedInDepId, $depIds)
                || $loggedInUserId == $file->fileOwnerId;
        }
        if ($hasPermission || Session::get('user')['role'] == "admin") {
            return $next($request); // User has permission, proceed to the next middleware or controller
        }

        return redirect()->back()->with('error', 'No permission allowed');
    }
}
