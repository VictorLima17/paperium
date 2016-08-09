<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LivroDigital extends Model
{
    protected $table = 'livros_digitais';

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class,'autor_livro','livro_id','autor_id');
    }

    public function listaLeitura()
    {
        return $this->belongsToMany(User::class,'lista_leitura','livro_id','user_id');
    }
    
}
