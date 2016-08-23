@extends('layouts.admin')

@section('titulo')
   Gênero | Editar {{$genero->genero}}
@endsection

@section('conteudo')

<form action="{{route('admin::atualiza.genero',$genero->id)}}" method="post" enctype="multipart/form-data">
    {{method_field('PUT')}}
    {{csrf_field()}}
    <input type="text" name="genero" value="{{$genero->genero}}">
    <input type="file" name="img">
    <button type="submit">Atualizar</button>
</form>
<h4>Imagem Atual</h4>
<img src="{{url('/img/genero/'.$genero->img)}}">
@endsection

