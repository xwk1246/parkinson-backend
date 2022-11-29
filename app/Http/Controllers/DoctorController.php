<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPatientRequest;
use App\Http\Requests\AssignMissionRequest;
use App\Http\Requests\UpdateCommentRequest;

use App\Models\Mission;
use App\Models\Record;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    /**
     * Add a patient for this doctor.
     * 
     * @param \App\Http\Requests\AddPatientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function addPatient(AddPatientRequest $request)
    {
        $validated = $request->validated();
        $password = Str::random(8);
        $validated['doctor_id'] = $request->user()->id;
        $validated['password'] = Hash::make($password);
        User::create($validated)->assignRole('patient');

        return $password;
    }
    /**
     * Store a mission nad some records due to categories.
     * 
     * @param  \App\Http\Requests\UpdateCommentRequest $request
     * @return \Illuminate\Http\Response
     */
    public function updateComment(UpdateCommentRequest $request)
    {
        $validated = $request->validated();
        $record = Record::where('id',$validated['record_id'])->first();
        $record->update([
            'status' => $validated['status'],
            'doctor_comment' => $validated['doctor_comment'],
        ]);
        return $record;
    }
}
