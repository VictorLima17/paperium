<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    protected $fillable = [
        'nome', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function livrosDigitais()
    {
        return $this->belongsToMany('App\LivroDigital','lista_leitura','user_id','livro_id')->withPivot('pag_atual');
    }

}
