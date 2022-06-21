<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use App\Models\Tarifa;
use App\Models\Provincia;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function indice()
    {
        // $datos = Tarifa::all();
        // $provincias = Provincia::all();
        return view('index');
        // ->with([
        //     'datos' => $datos,
        //     'provincias' => $provincias
        // ]);
    }
}
