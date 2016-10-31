<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use App\Admin;
use Illuminate\Support\Facades\Hash;
class LivroFisicoController extends Controller
{
    public function Upload(Request $request) {
        $json=$request->json;
        $email = $request->email;
        $senha =($request->senha);
        $admin =Admin::where('email',"=",$email)->get();
       if(count($admin) && !$json==null && !json_decode($json)== null){
        if(Hash::check($senha,$admin[0]['attributes']['password'])){
           if(Storage::put("Livros.json", $json) && Storage::put("admin.json",json_encode(date('d/m/Y H:i:s')." por ". $email))){
               
               return "true";
           }
       }}  else {
    return abort(403, 'Unauthorized action.');  
}
  
    }
    public function Pesquisar(Request $request){
        //$pesquisa = $request->pesquisar;
         $file = Storage::get("Livros.json");
        $json= \GuzzleHttp\json_decode($file);
        return view('leitor.fisico')->with(['livros' => $json]);
        
    }
}
