<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Page;
use App\Servicio;
use App\Empresa;
use App\Titulo;
use Mockery\Undefined;

class PageController extends Controller
{
    public function edit($seccion)
    {
        $seccion = $seccion;
        $title = "Contenido: " . strtoupper($seccion);
        switch($seccion) {
            case "home":
                $empresa = Empresa::first();
                $servicios = Servicio::orderBy('order')->paginate(8);
                return view('adm.page', compact('seccion','title','servicios','empresa'));
                break;
            case "empresa":
                $empresa = Empresa::first();
                // $empresa["title"] = isEmpty($empresa["title"]) ? "Sin título" : $empresa["title"];
                return view('adm.page', compact('seccion','title','empresa'));
                break;
            case "producto":
            case "aplicacion":
            case "trabajo":
            case "pregunta":
            case "ventaja":
                $data = Titulo::where('page', $seccion)->first();
                $data = ($data === null ? "" : $data);
                return view('adm.page', compact('seccion','title','data'));
                break;
        }
    }
    /**
     * Función para la edición de titulo en la vista
     * En lo posible que sea solo una linea
     * (?) limitar caracteres
     */
    public function titulo(Request $request) {
        $validated = $request->all();
        $data = Titulo::where('page', $validated["page"])->first();
        $tipo = strtoupper($validated["page"]);
        if($data === null) {
            Titulo::create($validated);
            return ["estado" => 1,"txt" => "Título de {$tipo} agregado correctamente","color" => "success"];
        } else {
            $data->fill($validated);
            $data->save();
            return ["estado" => 0,"txt" => "Título de {$tipo} editado correctamente","color" => "info"];
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
    public function adddata(Request $request) {
        // $datos = $request->all();
        // $tipo = $datos["tipo"];
        // unset($datos["tipo"]);

        if($datos["icon"] !== Undefined) {
            $img = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
            // $destinationPath = public_path('public/img/files');
            // $extension = $request->file('icon')->getClientOriginalExtension();
            // $fileName = 'asdad.'.$extension;
            // $datos["icon"] = "{$destinationPath}/{$fileName}";
            // $request->file('icon')->move($destinationPath, $fileName);
        }
        // $file_save = Helpers::saveImage($request->file('icon'), $tipo);
        // $file_save ? $datos['icon'] = $file_save : false;
        return $request;
    }
}
