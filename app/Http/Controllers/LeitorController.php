<?php

namespace App\Http\Controllers;

use App\Genero;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\LivroDigital;
use Storage;

class LeitorController extends Controller
{

    public function index()
    {
        $livros = LivroDigital::orderBy('nome')->paginate(8);
        $generos = Genero::all();
        return view('leitor.index')->with(['livros' => $livros,'generos' => $generos]);
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

}
