<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\LivroDigital;
use Storage;

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

    public function downloadLivroDigital($id)
    {
        $livro = LivroDigital::query()->findOrFail($id);
        $localArquivo = public_path('pdf/').$livro->arquivo;
        $tipoArquivo =  Storage::disk('pdfLivro')->mimeType($livro->arquivo);
        return response()->download($localArquivo, $livro->arquivo, ['Content-Type' => $tipoArquivo]);
    }

}
