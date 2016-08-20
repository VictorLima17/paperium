@extends('layouts.admin')

@section('titulo')
    @if(Route::is('admin::mostra.genero'))
        Genero | {{$genero->genero}}
    @elseif(Route::is('admin::mostra.deleta.genero'))
        Genero | Deletar {{$genero->genero}}
    @endif

@endsection

@section('conteudo')

    @if(Route::is('admin::mostra.deleta.genero'))
        <p>Tem certeza que deseja deletar o gênero?</p>
        <form action="{{route('admin::deleta.genero',$genero->id)}}" method="post">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit">Deletar</button>
            <a href="{{route('admin::livros.index')}}">Cancelar</a>
        </form>
    @endif
    <b>Nome do gênero:</b>{{$genero->genero}}<br>
    <b>Criado em:</b>{{$genero->criado_em}}<br>
    <b>Atualizado pela última vez em:</b>{{$genero->atualizado_em}}<br>
    <img src="{{url('/img/genero/'.$genero->img)}}"><br>
    <b>Livros cadastrados no gênero:</b><br>
    @forelse($genero->livrosDigitais as $livro)
        {{$livro->nome}}<br>
    @empty
        <p>Sem livros</p>
    @endforelse

@endsection

