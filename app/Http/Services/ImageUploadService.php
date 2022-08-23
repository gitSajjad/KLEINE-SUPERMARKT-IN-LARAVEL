<?php
namespace App\Http\Services;

use Carbon\Carbon;
use PHPUnit\Framework\Constraint\FileExists;

class ImageUploadService
{
    public function uploadFile($file, $name = null)
    {

        $folder = public_path();
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;

        $file_path =   '/upload' . '/' . $year . '/'
        . $month . '/' . $day. '/' ;
        if($name == null)
        {
            $fileName = time() . '.' . $file->extension();
        }
        else
        {
            $fileName = $name . '.' . $file->extension();
        }

        $file->move($folder . $file_path, $fileName );

        $file = $file_path . $fileName ;
        return $file;
    }
    //upload/2022/2/18/hassan.png

    public function remove($file)
    {

        $file = ltrim($file, '/');
        if(File_exists($file))
        {
            unlink($file);
        }

    }


}
