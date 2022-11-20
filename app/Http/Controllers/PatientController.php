<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadVideoRequest;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function uploadVideo(UploadVideoRequest $request)
    {
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('tmp/' . $folder, $filename);

            return response()->json($folder)->header('Content-Type', 'text/plain');
        }
        return '';
    }
}
