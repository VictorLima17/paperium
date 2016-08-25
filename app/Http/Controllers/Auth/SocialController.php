<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Socialite;

class SocialController extends Controller
{

    public function redirectToProvider($provedor)
    {
        return Socialite::driver($provedor)->redirect();
    }

    public function handleProviderCallback($provedor)
    {
        if($user = Socialite::driver($provedor)->user()){
            if($leitorSocial = User::query()->where('email', $user->email)->first()){ //vejo se ja esta cadastrado
                Auth::login($leitorSocial);
            }else{ // se nao o cadastro
                $leitor = new User;
                $leitor->nome = $user->name;
                $leitor->email = $user->email;
                if($provedor == 'facebook'){ //parabens facebook e google por n seguir nenhum padrao
                    $leitor->foto = $user->avatar_original;
                }elseif ($provedor == 'google'){
                    $leitor->foto = preg_replace("/sz=50/", "sz=500", $user->avatar);
                }
                $leitor->social = true;
                $leitor->save();
                Auth::login($leitor);
            }
            return redirect('/#');
        }else{
            return redirect('/login');
        }
    }
    
}