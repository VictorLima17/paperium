@extends('layouts.admin')

@section('titulo')
    Autor | {{$autor->autor}}
@endsection

@section('conteudo')
    @if(Route::is('admin::mostra.autor'))

        <b>Nome do Autor:</b>{{$autor->autor}}<br>

    @elseif(Route::is('admin::mostra.edita.autor'))
        <form action="{{route('admin::atualiza.autor',$autor->id)}}" method="post">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <input type="text" name="autor" value="{{$autor->autor}}">
            <button type="submit">Atualizar</button>
            <a href="{{route('admin::livros.index')}}">Cancelar</a>
        </form>
    @elseif(Route::is('admin::mostra.deleta.autor'))
        <b>Nome do autor:</b>{{$autor->autor}}<br>
        <form action="{{route('admin::deleta.autor',$autor->id)}}" method="post">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit">Deletar</button>
            <a href="{{route('admin::livros.index')}}">Cancelar</a>
        </form>
    @endif

    <b>Criado em:</b>{{$autor->criado_em}}<br>
    <b>Atualizado pela última vez em:</b>{{$autor->atualizado_em}}<br>
    <b>Livros cadastrados com o autor:</b><br>
    @forelse($autor->livrosDigitais as $livro)
        {{$livro->nome}}<br>
    @empty
        <p>Sem livros</p>
    @endforelse
@endsection


