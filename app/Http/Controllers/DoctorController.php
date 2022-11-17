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
    public function assign(AssignMissionRequest $request)
    {

        $validated = $request->validated();
        $mission = Mission::create(['user_id' => $validated['user_id'], 'due_date' => $validated['due_date']]);
        foreach ($request->categories as $value) {
            Record::create([
                'user_id' => $mission->user_id,
                'mission_id' => $mission->id,
                'result' => '""',
                'status' => "未處理",
                'doctor_comment' => '',
                'category' => $value
            ]);
        }

        return $mission->load("records");
    }
}
