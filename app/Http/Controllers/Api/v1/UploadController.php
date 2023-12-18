<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rit = array();
        if ($request->hasfile('filesDaCaricare')) {
            foreach ($request->file('filesDaCaricare') as $file) {
                $name = time() . '.' . $file->getClientOriginalName();
                $file->move(public_path() . '/files/', $name);
                // $data[] = $name;
            }

            $rit["data"] = true;
        } else {
            $rit["data"] = false;
        }
        return json_encode($rit);
    }
}
