<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignMissionRequest;
use App\Models\Mission;
use App\Models\Record;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Store a mission nad some records due to categories.
     * 
     * @param  \App\Http\Requests\AssignMissionRequest $request
     * @return \Illuminate\Http\Response
     */
    public function assign(AssignMissionRequest $request) {
        $mission = new Mission();
        $mission->user_id = $request->user_id;
        $mission->due_date = $request->due_date;
        $mission->save();

        foreach ($request->categories as $value) {
            $record = new Record();
            $record->user_id = $mission->user_id;
            $record->mission_id = $mission->id;
            $record->submit_date = $mission->created_at;
            $record->result = '""';
            $record->status = '未處理';
            $record->doctor_comment = '';
            $record->category = $value;
            $record->save();
        }

        return $mission;
    }
}