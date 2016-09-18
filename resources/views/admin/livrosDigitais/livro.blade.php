@extends('layouts.admin')

@section('titulo')

    @if(Route::is('admin::mostra.livro'))
        Livro Digital | {{$livro->nome}}
    @elseif(Route::is('admin::mostra.deleta.livro'))
        Livro Digital | Deletar {{$livro->nome}}
    @endif

@endsection

@section('conteudo')

    @if(Route::is('admin::mostra.deleta.livro'))
        <p>Tem certeza que deseja deletar o livro?</p>
        <form method="post" action="{{route('admin::deleta.livro',$livro->id)}}">
            {{method_field('DELETE')}}
            {{csrf_field()}}
            <button type="submit">Deletar</button>
            <a href="{{route('admin::mostra.livro',$livro->id)}}">Cancelar</a>
        </form>
    @endif

    <b>Nome:</b>{{$livro->nome}}<br>
    <b>Gênero:</b>{{$livro->genero}}<br>
    <b>Autor(es):</b>
    @forelse($livro->autores as $autor)
        {{$autor->autor}}<br>
    @empty <p>Sem autores</p>
    @endforelse
    <b>Ano publicação:</b>{{$livro->ano_publicacao}}<br>
    <b>Link de download:</b>{{$livro->link_download}}<br>
    <b>Arquivo do livro:</b><a href="{{url('/pdf/'.$livro->arquivo)}}">Visualizar</a><br>
    <b>Capa do livro:</b> <br> <img src="{{url('/img/livro/'.$livro->capa)}}"><br>
    <b>Livro cadastrado em:</b>{{$livro->criado_em}}<br>
    <b>Livro atualizado em:</b>{{$livro->atualizado_em}}<br>
@endsection

