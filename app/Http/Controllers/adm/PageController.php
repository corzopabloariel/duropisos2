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
use App\Pfamilia;
use App\Trabajo;
use App\Provincia;
use App\Localidad;
use App\Distribuidor;
use App\EmpresaDato;
use App\EmpresaContacto;
use App\Slider;
use Mockery\Undefined;

class PageController extends Controller
{
    public function search($tipo,$id) {

        $ARRlocalidades = Localidad::where('provincia_id', $id)->orderBy('nombre')->pluck('nombre', 'id');
        $localidades[] = ["id" => "","text" => ""];
        foreach($ARRlocalidades AS $k => $v) {
            $localidades[] = ["id" => $k,"text" => $v];
        }

        return $localidades;
    }
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
            case "distribuidor":
                $provincias = [];
                $ARRprovincias = Provincia::orderBy('id')->pluck('nombre', 'id');
                $provincias[] = ["id" => "","text" => ""];
                foreach($ARRprovincias AS $k => $v) {
                    $provincias[] = ["id" => $k,"text" => $v];
                }
                return view('adm.page', compact('seccion','title','provincias'));
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
            case "pfamilia":
                $data = Pfamilia::find($id);
                break;
            case "trabajo":
                $data = Trabajo::find($id);
                break;
            case "slider":
                $data = Slider::find($id);
                break;
        }
        return $data;
    }
    public function editdata(Request $request) {
        $datos = $request->all();
        $tipo = $datos["tipo"];
        $data = null;
        $icon_text = $image_text = $url = "";
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
        if(isset($datos["image_text"])) {
            $image_text = $datos["image_text"];
            unset($datos["image_text"]);
        }
        if(isset($datos["is_particular_input"]))
            unset($datos["is_particular_input"]);
        if(isset($datos["is_profesional_input"]))
            unset($datos["is_profesional_input"]);

        $data = self::data($tipo,$id);
        switch($tipo) {
            case "servicio":
            case "ventaja":
                $datos["icon"] = $data["icon"];
                break;
            case "pfamilia":
            case "trabajo":
            case "slider":
                $datos["image"] = $data["image"];
                break;
        }

        if(!empty($icon_text)) {
            if(isset($datos["icon"])) {
                $file = $request->file('icon');
                if(!is_null($file)) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $extension;
                    $path = public_path('img/uploads/');
                    $name = $path . $fileName;
                    $file->move($path, $fileName);
                    $datos["icon"] = "uploads/{$fileName}";
                }
            }
        }
        if(!empty($image_text)) {
            if(isset($datos["image"])) {
                $file = $request->file('image');
                if(!is_null($file)) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $extension;
                    $path = public_path('img/uploads/');
                    $name = $path . $fileName;
                    $file->move($path, $fileName);
                    $datos["image"] = "uploads/{$fileName}";
                }
            }
        }
        
        $data->fill($datos);
        $data->save();
        switch($tipo) {
            case "slider":
                $name = "{$url}/{$datos["image"]}";
                
                $html = "<td><img style='width:50px' src='{$name}' /></td>";
                $html .= "<td>{$datos["texto"]}</td>";
                $html .= "<td class='text-center'>{$datos["order"]}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'slider\',' . $data["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'slider\',' . $data["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
            break;
            case "ventaja":
                $name = "{$url}/{$datos["icon"]}";
                
                $html = "<td><img style='width:50px' src='{$name}' /></td>";
                $html .= "<td>{$datos["title"]}</td>";
                $html .= "<td class='text-center'>{$datos["order"]}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'ventaja\',' . $data["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'ventaja\',' . $data["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
            break;
            case "aplicacion":
                $html = "<td><a href='https://www.youtube.com/watch?v={$datos["video"]}' target='blank'>https://www.youtube.com/watch?v={$datos["video"]}</a></td>";
                $html .= "<td>{$datos["title"]}</td>";
                $html .= "<td class='text-center'>{$datos["order"]}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'aplicacion\',' . $data["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'aplicacion\',' . $data["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
            break;
            case "pfamilia":
                $name = "{$url}/{$datos["image"]}";
                
                $html = "<td><img style='width:50px' src='{$name}' /></td>";
                $html .= "<td>{$datos["title"]}</td>";
                $html .= "<td class='text-center'>{$datos["order"]}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'pfamilia\',' . $datos["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'pfamilia\',' . $datos["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
                break;
            case "trabajo":
                $tipo = "";
                $familia = Pfamilia::find($datos["pfamilia_id"]);
                $name = "{$url}/{$datos["image"]}";
                if($datos["is_profesional"]) $tipo .= "Profesional";
                if($datos["is_particular"]) {
                    if(!empty($tipo)) $tipo .= " y ";
                    $tipo .= "Particular";
                }
                
                $html = "<td><img style='width:50px' src='{$name}' /></td>";
                $html .= "<td>{$datos["title"]}</td>";
                $html .= "<td>{$familia["title"]}</td>";
                $html .= "<td>{$tipo}</td>";
                $html .= "<td class='text-center'>{$datos["order"]}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'trabajo\',' . $datos["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'trabajo\',' . $datos["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
                break;
            case "servicio":
                $name = "{$url}/{$datos["icon"]}";
                $html = "<td><img style='width:50px' src='{$name}' /></td>";
                $html .= "<td>{$datos["title"]}</td>";
                $html .= "<td class='text-center'>{$datos["order"]}</td>";
                $html .= '<td class="text-center">';
                    $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'servicio\',' . $datos["id"] . ')"><i class="material-icons">create</i></button> ';
                    $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'servicio\',' . $datos["id"] . ')"><i class="material-icons">delete</i></button>';
                $html .= '</td>';
                break;
        }
        return ["html" => $html, "id" => $data["id"]];
    }
    public function adddataempresa(Request $request) {
        $datos = $request->all();
        $tipo = $datos["tipo"];
        unset($datos["tipo"]);
        unset($datos["_token"]);
        $html = $url = "";
        if($tipo == "data") {
            if(isset($datos["url"])) {
                $url = $datos["url"];
                unset($datos["url"]);
            }
            $data = EmpresaDato::first();
            if(!empty($data)) {
                $datos["logo_principal"] = $data["logo_principal"];
                $datos["logo_footer"] = $data["logo_footer"];
                $datos["favicon"] = $data["favicon"];
            }
            if(isset($datos["logotipo"])) {
                $file = $request->file('logotipo');
                if(!is_null($file)) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = "logotipo.{$extension}";
                    $path = public_path('img/logo/');
                    $name = "{$url}/logo/{$fileName}";
                    $file->move($path, $fileName);
                    $datos["logo_principal"] = "logo/{$fileName}";
                }
            }
            if(isset($datos["logotipoFooter"])) {
                $file = $request->file('logotipoFooter');
                if(!is_null($file)) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = "logotipoFooter.{$extension}";
                    $path = public_path('img/logo/');
                    $name = "{$url}/logo/{$fileName}";
                    $file->move($path, $fileName);
                    $datos["logo_footer"] = "logo/{$fileName}";
                }
            }
            if(isset($datos["favicon"])) {
                $file = $request->file('favicon');
                if(!is_null($file)) {
                    $extension = $file->getClientOriginalExtension();
                    $fileName = "favicon.{$extension}";
                    $path = public_path('img/logo/');
                    $name = "{$url}/logo/{$fileName}";
                    $file->move($path, $fileName);
                    $datos["favicon"] = "logo/{$fileName}";
                }
            }
            
            if(empty($data)) {
                EmpresaDato::create($datos);
            } else {
                $data->fill($datos);
                $data->save();
            }
        } else {
            $data = EmpresaContacto::first();

            if(empty($data)) {
                EmpresaContacto::create($datos);
            } else {
                $data->fill($datos);
                $data->save();
            }
        }
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
        if(isset($datos["image"])) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = public_path('img/uploads/');
            $name = "{$url}/uploads/{$fileName}";
            $file->move($path, $fileName);
            $datos["image"] = "uploads/{$fileName}";
        }
        if(isset($datos["is_particular_input"]))
            unset($datos["is_particular_input"]);
        if(isset($datos["is_profesional_input"]))
            unset($datos["is_profesional_input"]);
        switch($tipo) {
            case "sliderhome":
                $datos["tipo"] = "home";
                $OBJ = Slider::create($datos);
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td><img style='width:50px' src='{$name}' /></td>";
                    $html .= "<td>{$datos["texto"]}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'slider\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'slider\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "sliderempresa":
                $datos["tipo"] = "empresa";
                $OBJ = Slider::create($datos);
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td><img style='width:50px' src='{$name}' /></td>";
                    $html .= "<td>{$datos["texto"]}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'slider\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'slider\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "ventaja":
                $OBJ = Ventaja::create($datos);
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td><img style='width:50px' src='{$name}' /></td>";
                    $html .= "<td>{$datos["title"]}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'ventaja\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'ventaja\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "pfamilia":
                $OBJ = Pfamilia::create($datos);
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td>{<img style='width:50px' src='{$name}' />}</td>";
                    $html .= "<td>{$datos["title"]}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'pfamilia\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'pfamilia\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "pregunta":
                $OBJ = Pregunta::create($datos);

                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td>{$datos["pregunta"]}</td>";
                    $html .= "<td>{$datos["respuesta"]}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'pregunta\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'pregunta\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "aplicacion":
                $OBJ = Aplicacion::create($datos);

                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td>{<a href='https://www.youtube.com/watch?v={$datos["video"]}' target='blank'>https://www.youtube.com/watch?v={$datos["video"]}</a>}</td>";
                    $html .= "<td>{$datos["title"]}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'aplicacion\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'aplicacion\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "trabajo":
                $tipo = "";
                $OBJ = Trabajo::create($datos);
                $familia = Pfamilia::find($datos["pfamilia_id"]);
                if($datos["is_profesional"]) $tipo .= "Profesional";
                if($datos["is_particular"]) {
                    if(!empty($tipo)) $tipo .= " y ";
                    $tipo .= "Particular";
                }
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td><img style='width:50px' src='{$name}' /></td>";
                    $html .= "<td>{$datos["title"]}</td>";
                    $html .= "<td>{$familia["title"]}</td>";
                    $html .= "<td>{$tipo}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'trabajo\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'trabajo\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "servicio":
                $OBJ = Servicio::create($datos);
                $html = "<tr data-id='{$OBJ["id"]}'>";
                    $html .= "<td><img style='width:50px' src='{$name}' /></td>";
                    $html .= "<td>{$datos["title"]}</td>";
                    $html .= "<td class='text-center'>{$datos["order"]}</td>";
                    $html .= '<td class="text-center">';
                        $html .= '<button type="button" class="btn btn-primary" onclick="edit(\'servicio\',' . $OBJ["id"] . ')"><i class="material-icons">create</i></button> ';
                        $html .= '<button type="button" class="btn btn-danger" onclick="erase(\'servicio\',' . $OBJ["id"] . ')"><i class="material-icons">delete</i></button>';
                    $html .= '</td>';
                $html .= "</tr>";
                break;
            case "distribuidor":
                $datos["longitud"] = 0;
                $datos["latitud"] = 0;
                Distribuidor::create($datos);
                $html = "";
                break;
        }
        return $html;
    }
    public function erase($tipo,$id) {
        $data = self::data($tipo,$id);
        $data->delete();
    }
}
