<?php
namespace App\Http\Services;

use Carbon\Carbon;


class VideoUploadService
{
    public function uploadVideo($file)
    {

        $folder = public_path();
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $file_path =   '/video' . '/' . $year . '/'
        . $month . '/' . $day. '/' ;
        $fileName = $file->getClientOriginalName();
        $file->move($folder . $file_path, $fileName );
        $file = $file_path . $fileName ;
        return $file;

    }



    public function remove($file)
    {

        $file = ltrim($file, '/');
        if(File_exists($file))
        {
            unlink($file);
        }

    }


}
