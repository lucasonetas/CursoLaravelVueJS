<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonasController extends Controller
{
    //
    public function index()
    {
        return view('personas.index');
    }

    public function edit()
    {
        return view('personas.edit');
    }
}
