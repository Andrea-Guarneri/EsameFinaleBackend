<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalcolaIva extends Controller
{
    // calcolatrice ausiliaria
    public function calcola($number)
    {
        $iva = 22;
        $ris = $number / 100 * $iva;
        $arr = array("data" => $ris, "err" => null, "message" => null);
        return $arr;
    }
}
