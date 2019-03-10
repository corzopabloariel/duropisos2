<?php

namespace App\Http\Controllers\pub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\EmpresaDato;
use App\EmpresaContacto;

use App\Provincia;
use App\Localidad;
use App\Slider;
use App\Pfamilia;
use App\Empresa;
use App\Servicio;

use App\Producto;

use App\Pregunta;

use App\Aplicacion;

use App\Ventaja;

use App\Trabajo;

class Pagecontroller extends Controller
{
    public function particular($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";
        $servicios = Servicio::orderBy('order')->get();

        $familias = Pfamilia::orderBy('order')->get();

        $sliders = Slider::where('tipo','home')->orderBy('order')->get();
        
        return view('public.basico.home',compact('path','logo','favicon','contacto','logoFooter','domicilio','sliders','familias','data','servicios'));
    }

    public function empresa($path) {
        
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";
        $servicios = Servicio::orderBy('order')->get();

        $familias = Pfamilia::orderBy('order')->get();

        $sliders = Slider::where('tipo','empresa')->orderBy('order')->get();
        
        return view('public.basico.empresa',compact('path','logo','favicon','contacto','logoFooter','domicilio','sliders','familias','data','servicios'));
    }
    
    public function productos($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        $familias = Pfamilia::orderBy('order')->get();
        
        return view('public.basico.productos',compact('path','logo','favicon','contacto','logoFooter','domicilio','familias'));
    }
    public function tipo($path,$tipo) {
        $colores = Producto::find(11)->colores;
        dd($colores);
    }
    
    public function aplicacion($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        $aplicaciones = Aplicacion::orderBy('order')->get();
        
        return view('public.basico.aplicacion',compact('path','logo','favicon','contacto','logoFooter','domicilio','aplicaciones'));
    }
    
    public function trabajos($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        $trabajos = Trabajo::orderBy('order')->get();
        $familias = Pfamilia::orderBy('id')->pluck('title', 'id');
        
        return view('public.basico.trabajos',compact('path','logo','favicon','contacto','logoFooter','domicilio','trabajos','familias'));
    }
    public function preguntas($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        $preguntas = Pregunta::orderBy('order')->get();
        
        return view('public.basico.preguntas',compact('path','logo','favicon','contacto','logoFooter','domicilio','preguntas'));
    }
    public function ventajas($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        $ventajas = Ventaja::orderBy('order')->get();
        
        return view('public.basico.ventajas',compact('path','logo','favicon','contacto','logoFooter','domicilio','ventajas'));
    }
    public function contacto($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        $url_map = "{$empresa["direccion"]}, {$provincia}, {$localidad}";
        
        return view('public.basico.contacto',compact('path','logo','favicon','contacto','logoFooter','domicilio','url_map'));
    }
    public function distribuidores($path) {
        $empresa = EmpresaDato::first();
        $data = Empresa::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $favicon = $empresa["favicon"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";

        return view('public.basico.distribuidores',compact('path','logo','favicon','contacto','logoFooter','domicilio'));
    }
}
