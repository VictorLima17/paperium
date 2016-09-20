<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Genero;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\LivroDigital;
use Storage;
use Illuminate\Support\Facades\Input;
use Session;

class LeitorController extends Controller
{

    public function index()
    {
        $livros = LivroDigital::query()->orderBy('nome')->paginate(8);
        $generos = Genero::all();
        return view('leitor.index')->with(['livros' => $livros,'generos' => $generos]);
    }

    public function indexV()
    {
        $livros = LivroDigital::query()->orderBy('nome')->paginate(8);
        $generos = Genero::query()->orderBy('genero')->paginate(8);
        return view('leitor.indexV')->with(['livros' => $livros,'generos' => $generos]);
    }

    public function mostraPerfil()
    {
        return view('leitor.perfil');
    }

    public function downloadLivroDigital($id)
    {
        $livro = LivroDigital::query()->findOrFail($id);
        $localArquivo = public_path('pdf/').$livro->arquivo;
        $tipoArquivo =  Storage::disk('pdfLivro')->mimeType($livro->arquivo);
        return response()->download($localArquivo, $livro->arquivo, ['Content-Type' => $tipoArquivo]);
    }

    public function redirecionaPdfViewer()
    {
        return view('pdf.js.web.viewer');
    }

    public function redirecionaPesquisa()
    {
        $pesquisa = Input::get('pesquisa');
        if($pesquisa == ''){
            Session::flash('atencao','Caso deseja realizar uma pesquisa, preencha o campo de pesquisa.');
            return redirect()->back();
        }else{
            return redirect('/pesquisa/'.$pesquisa);
        }
    }

    public function pesquisaGeral($pesquisa)
    {
        $livros = LivroDigital::query()->where('nome','like','%'.$pesquisa.'%')->orderBy('nome')->paginate(8);
        $autores = Autor::query()->where('autor','like','%'.$pesquisa.'%')->orderBy('autor')->get();
        return view('leitor.pesquisa')->with(['pesquisa' => $pesquisa,'livros' => $livros,'autores' => $autores]);
    }

    public function generoLivros($genero)
    {
        $genero = Genero::query()->where('genero',$genero)->first();
        $livros = $genero->livrosDigitais()->orderBy('nome')->paginate(8);
        return view('leitor.livros-genero')->with(['genero' => $genero,'livros' => $livros]);
    }

    public function pesquisaGeneroRedireciona($genero)
    {
        $pesquisa = Input::get('pesquisa');
        if($pesquisa == ''){
            Session::flash('atencao','Caso deseja realizar uma pesquisa, preencha o campo de pesquisa.');
            return redirect()->back();
        }else{
            return redirect('/genero/'.$genero.'/pesquisa/'.$pesquisa);
        }
    }

    public function pesquisaGeneroLivros($urlGenero,$pesquisa)
    {
        $genero = Genero::query()->where('genero',$urlGenero)->first();
        $livros = $genero->livrosDigitais()->where('nome','like','%'.$pesquisa.'%')->orderBy('nome')->paginate(8);
        return view('leitor.livros-genero')->with(['pesquisa' => $pesquisa,'genero' => $genero,'livros' => $livros]);
    }

}
