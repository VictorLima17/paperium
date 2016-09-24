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
use Auth;
use Image;

class LeitorController extends Controller
{

    public function index()
    {
        $livros = LivroDigital::query()->orderBy('nome')->paginate(8);
        $generos = Genero::all();
        return view('leitor.index')->with(['livros' => $livros,'generos' => $generos]);
    }

    public function mostraPerfil()
    {
        $livros = Auth::user()->livrosDigitais()->orderBy('nome')->paginate(8);
        return view('leitor.perfil')->with(['livros' => $livros]);
    }

    public function downloadLivroDigital($id)
    {
        $livro = LivroDigital::query()->findOrFail($id);
        $localArquivo = public_path('pdf.js/web/pdf/').$livro->arquivo;
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

    public function mudarSenha(Request $request)
    {
        $this->validate($request,[
            'senha' => 'required|min:6|alpha_num|confirmed'
        ]);

        $leitor = Auth::user();
        $leitor->password = bcrypt($request->input(['senha']));
        if($leitor->update()){
            Session::flash('sucesso','Sua senha foi alterada com sucesso');
        }
        return redirect()->back();
    }

    public function mudarFoto(Request $request)
    {
       $this->validate($request,[
           'foto' => 'required|mimes:jpg,jpeg,png|max:2000'
       ]);

       $leitor = Auth::user();

       if($request->hasFile('foto')){
           $img = $request->file('foto');  //atribuo a img a uma var
           $imgNome = $leitor->id.''.md5($img.microtime()).'.'.$img->getClientOriginalExtension(); //faço um nome randomico + extensao
           $localCapa = public_path('img/leitor/' . $imgNome);   //local junto com a imagem
           Image::make($img)->resize(300,300)->save($localCapa); //salvo a imagem,ja redimensionada

           $imgAntiga = $leitor->foto; //pego o nome da img antiga
           if($imgAntiga !== 'leitor.jpg'){ //só quero deletar a imagem caso n for a padrão
               if(Storage::disk('imgLeitor')->exists($imgAntiga)){
                   Storage::disk('imgLeitor')->delete($imgAntiga); //deleto a img antiga caso exista
               }
           }

           $leitor->foto = $imgNome;//atribuo ao campo o novo nome
           if($leitor->update()){
               Session::flash('sucesso','Sua foto foi atualizada com sucesso');
           }
           return redirect()->back();
       }
    }

}
