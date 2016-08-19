<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Genero;
use Illuminate\Http\Request;
use App\Http\Requests;
use Storage;
use Image;
use Session;

class GeneroController extends Controller
{
    public function cadastraGenero(Request $request)
    {
        $this->validate($request,[
            'genero' => 'required|alpha_spaces|max:65|unique:generos,genero',
            'img' => 'required|mimes:jpeg,jpg,png|max:1750'
        ]);

        $genero = new Genero;

        $genero->genero = $request->input(['genero']);

        if($request->hasFile('img')){   //verifico a existencia da imagem
            $img = $request->file('img');  //atribuo a img a uma var
            $imgNome = md5($img.microtime()).'.'.$img->getClientOriginalExtension(); //faço um nome randomico + extensao
            $localGenero = public_path('img/genero/' . $imgNome);   //local junto com a imagem
            Image::make($img)->resize(250,250)->save($localGenero); //salvo a imagem,ja redimensionada

            $genero->img = $imgNome;
        }

        if($genero->save()){
            Session::flash('sucesso','Gênero cadastrado com sucesso');
            return redirect()->route('admin::livros.index');
        }else{
            return redirect()->back()
                   ->withInput();
        }

   }

    public function atualizaGenero($id, Request $request)
    {
        $this->validate($request,[
            'genero' => 'required|alpha_spaces|max:65|unique:generos,genero',
            'img' => 'sometimes|mimes:jpeg,jpg,png|max:1750'
        ]);

        $genero = Genero::query()->findOrFail($id);

        $genero->genero = $request->input(['genero']);

        if($request->file('img')){
            $img = $request->file('img');  //atribuo a img a uma var
            $imgNome = md5($img.microtime()).'.'.$img->getClientOriginalExtension(); //faço um nome randomico + extensao
            $localGenero = public_path('img/genero/' . $imgNome);   //local junto com a imagem
            Image::make($img)->resize(250,250)->save($localGenero); //salvo a imagem,ja redimensionada

            $imgAntiga = $genero->img; //pego o nome da img antiga
            if(Storage::disk('imgGenero')->exists($imgAntiga)){
                Storage::disk('imgGenero')->delete($imgAntiga); //deleto a img antiga caso exista
            }

            $genero->img = $imgNome; //atribuo ao campo o novo nome
        }

        if($genero->save()){
            Session::flash('sucesso','Gênero atualizado com sucesso');
            return redirect()->route('admin::mostra.genero',$genero->id);
        }else{
            return redirect()->back()
                   ->withInput();
        }

    }

    public function deletaGenero($id)
    {
        $genero = Genero::query()->findOrFail($id);

        if(Storage::disk('imgGenero')->exists($genero->img)){
            Storage::disk('imgGenero')->delete($genero->img); //deleto a img antiga caso exista
        }

        if($genero->delete()){
            Session::flash('sucesso','Gênero deletado com sucesso');
            return redirect()->route('admin::livros.index');
        }else{
            return redirect()->back();
        }
    }

}
