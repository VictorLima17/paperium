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
            <th>Autor</th>
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

    <br><br>
    <b>Gênero:</b> <br>
    <a href="{{route('admin::cadastra.genero')}}">Cadastrar novo</a>

    <table>
        <thead>
            <th>Id</th>
            <th>Gênero</th>
            <th>Link</th>
        </thead>
        <tbody>
            @foreach($generos as $genero)
                <tr>
                    <td>{{$genero->id}}</td>
                    <td>{{$genero->genero}}</td>
                    <td><a href="{{route('admin::mostra.genero',$genero->id)}}">Mostrar</a></td>
                    <td><a href="{{route('admin::mostra.edita.genero',$genero->id)}}">Editar</a></td>
                    <td><a href="{{route('admin::mostra.deleta.genero',$genero->id)}}">Deletar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>
    <b>Livro:</b><br>
    <a href="{{route('admin::cadastra.livro')}}">Cadastrar novo</a>
    <table>
        <thead>
            <th>Id</th>
            <th>Nome</th>
            <th>Links</th>
        </thead>
        <tbody>
            @foreach($livros as $livro)
                <tr>
                    <td>{{$livro->id}}</td>
                    <td>{{$livro->nome}}</td>
                    <td><a href="{{route('admin::mostra.livro',$livro->id)}}">Mostrar</a></td>
                    <td><a href="{{route('admin::mostra.edita.livro',$livro->id)}}">Editar</a></td>
                    <td><a href="{{route('admin::mostra.deleta.livro',$livro->id)}}">Deletar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

