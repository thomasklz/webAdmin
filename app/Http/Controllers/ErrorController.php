<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
   public function index()
    {
    	return view('adminlte::errors.403');
    }
    public function pagenotfound()
    {
        return view('adminlte::errors.404');
    }
}
