<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class UploadFiles extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'file.*' => 'required|mimes:png,jpg,txt,pdf|max:5120',
        ]);

        foreach ($request->file as $file)
        {
            $filename = time().'_'.$file->getClientOriginalName();
            $filesize = $file->getSize();
            $file->storeAs('public/' ,$filename);
            $fileModel = new File;
            $fileModel->name = $filename;
            $fileModel->size = $filesize;
            $fileModel->location = 'storage/' .$filename;
            $fileModel->save();
        }

        return response()->json([
            'message' => 'File uploaded successfully'
        ]);
    }
}
