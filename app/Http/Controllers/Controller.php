<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function uploadFile($file, $path)
     {
        $realName = $file->getClientOriginalName();
        $filename = $file->hashName();
        $file->move($path, $filename);
        $fullpath =  $path . $filename;
        return $fullpath;
     }
}
