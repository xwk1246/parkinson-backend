<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Mockery\Undefined;

class GeneralController extends Controller
{
    /**
     * Get User Info
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function info(Request $request)
    {
        return $request->user()->load('roles');
    }

    /**
     * Display a listing of the resource.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function record(Request $request, $patientId = null)
    {
        $loginUser = $request->user();
        if (!$loginUser) {
            //For Devlopment debug.
            return new Exception('[TEST]You are not logged in', 500);
        }

        if ($loginUser->isDoctor()) {
            //Doctor
            if($patientId !== null){
                $patient = User::Find($patientId);
                if($patient->doctor_id === $loginUser->id){
                    return $patient->load('missions.records');
                }else{
                    return response()->json(['message' => 'The user you requested is not your patient'], 400);
                }
            }else{
                return $loginUser->load('patients.missions.records.media');
            }
        } else {
            //Patient
            return $loginUser->load('missions.records.media');
        }
    }

    /**
     * Return the video by record id.
     * 
     * @param \Illuminate\Http\Request $request
     * @param string $recordId
     */
    public function video(Request $request, $recordId)
    {
        $loginUser = $request->user();
        if (!$loginUser) {
            //For Devlopment debug.
            return new Exception('[TEST]You are not logged in', 500);
        }

        $record = Record::find($recordId);

        if (!$record) return response()->json(['message' => 'Record not exist.'], 400);

        $mediaItems = $record->getMedia('videos');
        return response()->file(storage_path('app/public/' . $mediaItems[0]->id . '/' . $mediaItems[0]->file_name), [
            'Content-Type' => 'video/mp4',
            'Content-Disposition' => 'inline; filename="' . $mediaItems[0]->file_name . '"',
        ]);
    }
}
