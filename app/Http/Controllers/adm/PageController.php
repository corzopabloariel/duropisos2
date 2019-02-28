<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Page;
use App\Servicio;
use App\Empresa;

class PageController extends Controller
{
    public function edit($seccion)
    {
        $seccion = $seccion;
        $title = "Página: {$seccion}";
        switch($seccion) {
            case "home";
                $empresa = Empresa::first();
                $servicios = Servicio::orderBy('order')->paginate(8);
                return view('adm.page', compact('seccion','title','servicios','empresa'));
                break;
        }
    }

    /**
     * Función para traer datos de la BASE
     */
    public function data($tipo,$id) {
        $data = null;
        switch($tipo) {
            case "servicio":
                $data = Servicio::find($id);
        }
        return $data;
    }
    public function editdata(Request $request) {
        print_r($request);
    }
}
