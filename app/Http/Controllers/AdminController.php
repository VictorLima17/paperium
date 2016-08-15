<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
   
    public function index()
    {
        return view('admin.index');
    }

    public function teste()
    {
        return view('admin.index');
    }

    public function livrosIndex()
    {
        $autores = Autor::all(); // substitui isso por all qnd tiver muitos query()->paginate(25);
        return view('admin.livros-digitais')->with(['autores' => $autores]);
    }

    public function mostraAutor($id)
    {
        $autor = Autor::query()->findOrFail($id);
        return view('admin.livrosDigitais.autor')->with(['autor' => $autor]);
    }

}
