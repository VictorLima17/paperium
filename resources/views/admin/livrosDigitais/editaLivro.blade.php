@extends('layouts.admin')

@section('titulo')
    Livro Digital | Editar {{$livro->nome}}
@endsection

@section('conteudo')
    <form action="{{route('admin::atualiza.livro',$livro->id)}}" method="post" enctype="multipart/form-data">
        {{method_field('PUT')}}
        {{csrf_field()}}
        <input type="text" name="nome" value="{{$livro->nome}}"><br>
        <input type="number" name="publicacao" value="{{$livro->ano_publicacao}}"><br>
        Capa:<input type="file" name="capa"><br>
        Arquivo:<input type="file" name="arquivo"><br>
        <select name="genero">
            @foreach($generos as $genero)
                <option value="{{$genero->id}}" {{ ($genero->id == $livro->genero->id) ? 'selected="selected"' :'' }}>{{$genero->genero}}</option>
            @endforeach
        </select><br>
        <select name="autor[]" multiple>
            @foreach($autores as $autor)
                <option value="{{$autor->id}}" {{$livro->autores->contains($autor->id) ? 'selected="selected"' : '' }}>{{$autor->autor}}</option>
            @endforeach
        </select><br>
        <button type="submit">Atualizar</button>
    </form>
@endsection

