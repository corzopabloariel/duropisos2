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
use App\Ventaja;
use App\Pregunta;
use App\Aplicacion;
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
                break;
            case "ventaja":
                $data = Ventaja::find($id);
                break;
            case "aplicacion":
                $data = Aplicacion::find($id);
                break;
        }
        return $data;
    }
    public function editdata(Request $request) {
        $datos = $request->all();
        $tipo = $datos["tipo"];
        $data = null;
        $icon_text = $url = "";
        $id = $datos["id"];
        
        unset($datos["tipo"]);
        unset($datos["_token"]);

        if(isset($datos["frm_id"]))
            unset($datos["frm_id"]);//porque ya tengo id solo
        if(isset($datos["url"])) {
            $url = $datos["url"];
            unset($datos["url"]);
        }
        
        if(isset($datos["icon_text"])) {
            $icon_text = $datos["icon_text"];
            unset($datos["icon_text"]);
        }

        switch($tipo) {
            case "servicio":
                $data = Servicio::find($id);
                $datos["icon"] = $data["icon"];
                break;
            case "ventaja":
                $data = Ventaja::find($id);
                $datos["icon"] = $data["icon"];
                break;
            case "aplicacion":
                $data = Aplicacion::find($id);
                break;
        }

        if(!empty($icon_text)) {
            if(isset($datos["icon"])) {
                $file = $request->file('icon');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $path = public_path('img/uploads/');
                $name = $path . $fileName;
                $file->move($path, $fileName);
                $datos["icon"] = $name;
            }
        }
        
        $data->fill($datos);
        $data->save();
        switch($tipo) {
            case "ventaja":
                $name = "{$url}/{$datos["icon"]}";
                
                $html = "<td>";
                    $html .= "<img style='width:50px' src='{$name}' />";
                $html .= "</td>";
                $html .= "<td>";
                    $html .= $datos["title"];
                $html .= "</td>";
                $html .= "<td class='text-center'>";
                    $html .= $datos["order"];
                $html .= "</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'ventaja\',' . $data["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'ventaja\',' . $data["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
            break;
            case "aplicacion":
                
                $html = "<td>";
                    $html .= "<a href='https://www.youtube.com/watch?v={$datos["video"]}' target='blank'>https://www.youtube.com/watch?v={$datos["video"]}</a>";
                $html .= "</td>";
                $html .= "<td>";
                    $html .= $datos["title"];
                $html .= "</td>";
                $html .= "<td class='text-center'>";
                    $html .= $datos["order"];
                $html .= "</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'aplicacion\',' . $data["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'aplicacion\',' . $data["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
            break;
        }
        return ["html" => $html, "id" => $data["id"]];
    }
    public function adddata(Request $request) {
        $datos = $request->all();
        $tipo = $datos["tipo"];
        unset($datos["tipo"]);
        unset($datos["_token"]);
        $fileName = null;
        $html = $url = "";
        if(isset($datos["url"])) {
            $url = $datos["url"];
            unset($datos["url"]);
        }
        
        if(isset($datos["icon"])) {
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = public_path('img/uploads/');
            $name = "{$url}/uploads/{$fileName}";
            $file->move($path, $fileName);
            $datos["icon"] = "uploads/{$fileName}";
        }
        switch($tipo) {
            case "ventaja":
                $OBJ = Ventaja::create($datos);
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td>";
                        $html .= "<img style='width:50px' src='{$name}' />";
                    $html .= "</td>";
                    $html .= "<td>";
                        $html .= $datos["title"];
                    $html .= "</td>";
                    $html .= "<td class='text-center'>";
                        $html .= $datos["order"];
                    $html .= "</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'ventaja\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'ventaja\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "pregunta":
                $OBJ = Pregunta::create($datos);

                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td>";
                        $html .= $datos["pregunta"];
                    $html .= "</td>";
                    $html .= "<td>";
                        $html .= $datos["respuesta"];
                    $html .= "</td>";
                    $html .= "<td class='text-center'>";
                        $html .= $datos["order"];
                    $html .= "</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'pregunta\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'pregunta\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "aplicacion":
                $OBJ = Aplicacion::create($datos);

                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td>";
                        $html .= "<a href='https://www.youtube.com/watch?v={$datos["video"]}' target='blank'>https://www.youtube.com/watch?v={$datos["video"]}</a>";
                    $html .= "</td>";
                    $html .= "<td>";
                        $html .= $datos["title"];
                    $html .= "</td>";
                    $html .= "<td class='text-center'>";
                        $html .= $datos["order"];
                    $html .= "</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'aplicacion\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'aplicacion\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
        }
        return $html;
    }
    public function erase($tipo,$id) {
        $data = null;
        switch($tipo) {
            case "servicio":
                $data = Servicio::find($id);
                break;
            case "ventaja":
                $data = Ventaja::find($id);
                break;
            case "pregunta":
                $data = Pregunta::find($id);
                break;
            case "aplicacion":
                $data = Aplicacion::find($id);
                break;
        }
        $data->delete();
    }
}
