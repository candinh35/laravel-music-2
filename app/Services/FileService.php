<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use InvalidArgumentException;

class FileService
{

    /**
     *
     */
    public function uploadFile(UploadedFile $uploadedFile, $fileName, $extension, $uploadPath){
        // crate file name to save in upload/images folder and db
        $fileName = time() . "-" . $fileName . "." . $extension;
        // upload file to public/uploads/images
        $uploadedFile->move(public_path($uploadPath), $fileName);
        // change prop image_path to save in db
        return $fileName;
    }

    function deleteFile($fileName, $uploadPath)
    {
        $path = public_path($uploadPath . '/' . $fileName);

        if (File::exists($path)) {
            File::delete($path);
        }
    }
}
