<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Extensions\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Slider;

class SlidersController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($section)
    {
        $section = $section;
        $title = "Crear slider: {$section}";
        return view('adm.sliders.create', compact('section','title'));
    }

    public function edit($section)
    {
        $section = $section;
        return view('adm.sliders.edit', compact('section'));
    }

}
