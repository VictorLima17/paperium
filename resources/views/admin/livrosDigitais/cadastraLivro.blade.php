@extends('layouts.admin')

@section('titulo')
    Livro Digital | Cadastrar
@endsection

@section('conteudo')
    <div class="content-wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{route('admin::cadastra.livro')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="text" name="nome" placeholder="Insira o nome do livro" value="{{old('nome')}}"><br>
                        <input type="number" name="publicacao" placeholder="Insira o ano de publicação do livro" value="{{old('publicacao')}}"><br>
                        Capa:<input type="file" name="capa"><br>
                        Arquivo:<input type="file" name="arquivo"><br>
                        <select name="genero">
                            <option value="">Selecione o gênero do livro</option>
                            @foreach($generos as $genero)
                                <option value="{{$genero->id}}">{{$genero->genero}}</option>
                            @endforeach
                        </select><br>
                        <select name="autor[]" multiple>
                            <option value="">Selecione o(s) autor(es) do livro</option>
                            @foreach($autores as $autor)
                                <option value="{{$autor->id}}">{{$autor->autor}}</option>
                            @endforeach
                        </select><br>
                        <button type="submit">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

