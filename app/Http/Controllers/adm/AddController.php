<?php

namespace App\Http\Controllers\adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ventaja;
class AddController extends Controller
{
    public function index($seccion) {
        $title = "Página: " . strtoupper($seccion);
        switch($seccion) {
            case "ventaja":
                $ventajas = Ventaja::orderBy('order')->paginate(8);
                return view('adm.add', compact('seccion','title','ventajas'));
                break;
        }
    }
}
