<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Genero;
use App\Http\Requests;
use App\LivroDigital;
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

    public function livrosIndex($rota)
    {
        if(in_array($rota,['autor','genero','livro'])){
            $autores = Autor::all();
            $generos = Genero::all();
            $livros = LivroDigital::all();
            return view('admin.livros-digitais')->with(['autores' => $autores ,'generos' => $generos ,'livros' => $livros]);
        }else{
            return 404;
        }


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

    public function formCadastraLivro()
    {
        $autores = Autor::all();
        $generos = Genero::all();
        return view('admin.livrosDigitais.cadastraLivro')->with(['generos' => $generos, 'autores' => $autores]);
    }

    public function mostraLivro($id)
    {
        $livro = LivroDigital::query()->findOrFail($id);
        $livro->criado_em = Date::parse($livro->created_at)->format('j F Y H:i:s');
        $livro->atualizado_em = Date::parse($livro->updated_at)->format('j F Y H:i:s');
        return view('admin.livrosDigitais.livro')->with(['livro' => $livro]);
    }

    public function formEditaLivro($id)
    {
        $livro = LivroDigital::query()->findOrFail($id);
        $autores = Autor::all();
        $generos = Genero::all();
        $autorLivro = $livro->autores()->lists('id'); //pego os autores do livro para inserir no select
        return view('admin.livrosDigitais.editaLivro')->with(['livro' => $livro,'generos' => $generos, 'autores' => $autores, 'autorLivro' => $autorLivro]);
    }

}
