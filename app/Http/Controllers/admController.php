<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admController extends Controller
{
    public function index() {
        $title = "";
        return view('adm.adm',compact('title'));
    }
}
