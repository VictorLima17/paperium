<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Genero;
use App\Http\Requests;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

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
        $generos = Genero::all();
        return view('admin.livros-digitais')->with(['autores' => $autores ,'generos' => $generos]);
    }

    public function mostraAutor($id)
    {
        $autor = Autor::query()->findOrFail($id);
        $autor->criado_em = Date::parse($autor->created_at)->format('j F Y H:i:s'); //atribuo uma variavel nova para poder formata la
        $autor->atualizado_em = Date::parse($autor->updated_at)->format('j F Y H:i:s'); //igualmente
        return view('admin.livrosDigitais.autor')->with(['autor' => $autor]);
    }

    public function formCadastraGenero()
    {
        return view('admin.livrosDigitais.cadastraGenero');
    }

    public function mostraGenero($id)
    {
        $genero = Genero::query()->findOrFail($id);
        $genero->criado_em = Date::parse($genero->created_at)->format('j F Y H:i:s');
        $genero->atualizado_em = Date::parse($genero->updated_at)->format('j F Y H:i:s');
        return view('admin.livrosDigitais.genero')->with(['genero' => $genero]);
    }

    public function formEditaGenero($id)
    {
        $genero = Genero::query()->findOrFail($id);
        return view('admin.livrosDigitais.editaGenero')->with(['genero' => $genero]);
    }

}
