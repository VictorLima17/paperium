<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class LeitorController extends Controller
{

    public function index()
    {
        return view('leitor.index');
    }
}
