<?php

namespace App\Http\Controllers\pub;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\EmpresaDato;
use App\EmpresaContacto;

use App\Provincia;
use App\Localidad;

class Pagecontroller extends Controller
{
    public function particular() {
        $empresa = EmpresaDato::first();
        $contacto = EmpresaContacto::first();
        $logo = $empresa["logo_principal"];
        $logoFooter = $empresa["logo_footer"];
        $provincia = Provincia::find($empresa["provincia_id"])["nombre"];
        $localidad = Localidad::find($empresa["localidad_id"])["nombre"];
        $domicilio = "{$empresa["direccion"]}<br/>{$provincia}, {$localidad}";
        
        return view('public.basico.home',compact('logo','contacto','logoFooter','domicilio'));
    }
}
