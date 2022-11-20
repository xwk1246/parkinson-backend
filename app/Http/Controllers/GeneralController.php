<?php

namespace App\Http\Controllers;

// use App\Http\Resources\DoctorMissionResource;
// use App\Http\Resources\UserMissionResource;
// use App\Http\Resources\UserResource;
// use App\Models\Mission;
// use App\Models\User;
// use App\Models\Record;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\GetUserInfoRequest;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function record(Request $request)
    {
        $loginUser = $request->user();
        // dd(User::find(1)->isDoctor());
        if (!$loginUser) {
            //For Devlopment debug.
            return new Exception('[TEST]You are not logged in', 500);
        }
        // $user_id = $loginUser->id;
        if ($loginUser->isDoctor()) {
            //Doctor
            return $loginUser->load('patients.missions.records');
            // $patients = User::where('doctor_id', $user_id)
            // ->addSelect(['newest_submit' => Record::select('submit_time')->whereColumn('records.user_id', 'users.id')->orderByDesc('submit_time')->limit(1)])
            // ->get();
            // return UserResource::collection($patients);
        } else {
            //Patient
            return $loginUser->load('missions.records');
            // $user = User::where('id', $user_id)->first();
            // return UserResource::make($user);
        }
    }
    
     /**
     * Get User Info
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        return $request->user();
        //$user->get($request->validate()); 
    }
}
