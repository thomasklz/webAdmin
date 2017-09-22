<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;


class InglesController extends Controller
{
    public function index()
    {
        return view('adminlte::plantilla.home');
    }
}
