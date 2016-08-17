@extends('layouts.admin')

@section('titulo')
    Administração | Livros digitais
@endsection

@section('conteudo')
    <b>Autor:</b> <br>
    <form method="post" action="{{route('admin::cadastra.autor')}}">
        {!! csrf_field() !!}
        <input type="text" name="autor" placeholder="Insira o nome do autor" value="{{old('autor')}}">
        <button type="submit">Cadastrar Novo</button>
    </form>

    <table>
        <thead>
            <th>Id</th>
            <th>Nome</th>
            <th>Link</th>
        </thead>
        <tbody>
            @foreach($autores as $autor)
                <tr>
                    <td>{{$autor->id}}</td>
                    <td>{{$autor->autor}}</td>
                    <td><a href="{{route('admin::mostra.autor',$autor->id)}}">Mostrar</a></td>
                    <td><a href="{{route('admin::mostra.edita.autor',$autor->id)}}">Editar</a></td>
                    <td><a href="{{route('admin::mostra.deleta.autor',$autor->id)}}">Deletar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- $autores->links() qnd for fzr a paginaçao -->
    {{Jenssegers\Date\Date::now()->format('l j F Y H:i:s')}}
@endsection

