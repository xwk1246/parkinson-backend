<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadVideoRequest;
use App\Http\Requests\UploadRecordRequest;
use App\Jobs\Openpose;
use App\Models\Record;
use Carbon\Carbon;

class PatientController extends Controller
{
    public function uploadVideo(UploadVideoRequest $request)
    {
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('tmp/' . $folder, $filename);

            return response()->json($folder)->header('Content-Type', 'text/plain')->header('Access-control-allow-origin', '*');
        }
        return '';
    }
    public function uploadRecord(UploadRecordRequest $request)
    {
        $validated = $request->validated();
        $datetime = Carbon::parse($validated['submit_time'])->toDatetimeString();
        $record = Record::where('mission_id', $validated['mission_id'])->where('category', $validated['category'])->first();

        $record->update([
            'location' => $validated['location'],
            'submit_time' => $datetime,
            'category' => $validated['category'],
            'mission_id' => $validated['mission_id'],
            'status' => '未處理'
        ]);
        foreach ($validated['video'] as $key => $video) {
            try {
                $record->addMedia(storage_path('app/tmp/' . $video['serverId'] . '/' . $video['filename']))->toMediaCollection('videos');
                rmdir(storage_path('app/tmp/' . $video['serverId']));

                $openposeJob = (new Openpose($record->id))->onQueue('openpose');
                $this->dispatch($openposeJob);
            } catch (\Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist $e) {
                return response()->json('file not exist on server please try again', 400);
            }
        }
        return $record->load("media");
    }
}
