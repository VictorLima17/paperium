<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Socialite;

class SocialController extends Controller
{

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        if($user = Socialite::driver('facebook')->user()){
            if($leitorSocial = User::query()->where('email', $user->email)->first()){
                Auth::login($leitorSocial);
            }else{
                $leitor = new User;
                $leitor->nome = $user->name;
                $leitor->email = $user->email;
                $leitor->foto = $user->avatar_original;
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