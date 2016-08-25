<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\LivroDigital;
use Illuminate\Http\Request;

class LeitorController extends Controller
{

    public function index()
    {
        $livros = LivroDigital::all();
        return view('leitor.index')->with(['livros' => $livros]);
    }

    public function mostraPerfil()
    {
        return view('leitor.perfil');
    }
}
