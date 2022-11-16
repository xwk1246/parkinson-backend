<?php

namespace App\Http\Controllers;

use App\Http\Resources\DoctorMissionResource;
use App\Http\Resources\UserMissionResource;
use App\Http\Resources\UserResource;
use App\Models\Mission;
use App\Models\User;
use App\Models\Record;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AssocRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $login_user = Auth::user();
        if(is_null($login_user)){
            //For Devlopment debug.
            return new Exception('[TEST]You are not logged in',500);
        }
        $user_id = $login_user->id;
        if(is_null($login_user->doctor_id)){
            //Doctor
            $patients = User::where('doctor_id',$user_id)->get();
            return UserResource::collection($patients);
        }else{
            //Patient
            $user = User::where('id',$user_id)->first();
            return UserResource::make($user);
        }
        
    }
}