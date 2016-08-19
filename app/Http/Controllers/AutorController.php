<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;

class AutorController extends Controller
{
    public function cadastraAutor(Request $request)
    {
        $this->validate($request,[
            'autor' => 'required|alpha_spaces|unique:autores|max:50'
        ]);

        $autor = new Autor;

        $autor->autor = $request->input(['autor']);

        if($autor->save()){
            Session::flash('sucesso','Autor cadastrado com sucesso');
            return redirect()->back();
        }else{
            return redirect()->back()
                   ->withInput();
        }
    }

    public function atualizaAutor($id, Request $request)
    {
        $this->validate($request,[
            'autor' => 'required|alpha_spaces|unique:autores|max:50'
        ]);

        $autor = Autor::query()->findOrFail($id);

        $autor->autor = $request->input(['autor']);

        if($autor->save()){
            Session::flash('sucesso','Autor atualizado com sucesso');
            return redirect()->route('admin::livros.index');
        }else{
            return redirect()->back()
                   ->withInput();
        }

    }

    public function deletaAutor($id)
    {
        $autor = Autor::query()->findOrFail($id);

        if($autor->delete()){
            Session::flash('sucesso','Autor deletado com sucesso');
            return redirect()->route('admin::livros.index');
        }else{
            return redirect()->back();
        }

    }

}
