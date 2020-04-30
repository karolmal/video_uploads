<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FileUpload;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        // Get all data from database
        $files = FileUpload::all();
        // Return fileuplad view with data
        return view('fileupload', ['files' => $files]);
    }

    public function fileStore(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:mp4,x-flv,x-mpegURL,MP2T,3gpp,quicktime,x-msvideo,x-ms-wmv',
            'username' => 'required'
        ]);

        // Create video file

        // Get file name extenssion
        $fileName = time().'.'.request()->file->getClientOriginalExtension();
       // Store Video in movies public path
        $request->file->move(public_path('movies'), $fileName);
        $fileupload = new FileUpload;
        $fileupload->filename=$fileName;
        // Get username
        $fileupload->username = $request->input('username');
        $fileupload->save();
            
        // Return response of success
        return response()->json(['success'=>'File Uploaded Successfully']);
        }
    }
    



    
