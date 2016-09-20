@extends('layouts.admin')

@section('titulo')
    Gênero | Cadastrar
@endsection

@section('conteudo')

    <div class="content-wrapper">
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{route('admin::cadastra.genero')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="text" name="genero" placeholder="Insira o nome do gênero" value="{{old('genero')}}">
                        <input type="file" name="img">
                        <button type="submit">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

