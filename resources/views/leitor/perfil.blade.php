@extends('layouts.leitor')

@section('titulo')
    Perfil de {{Auth::user()->nome}}
@endsection

@section('conteudo')
    <b>Nome:</b>{{Auth::user()->nome}}<br>
    <b>Email:</b>{{Auth::user()->email}}<br>
    <b>Foto:</b><br>
        @if(Auth::user()->social)
            <img src="{{Auth::user()->foto}}" width="250px" height="250px">
        @else
            <img src="{{url('/img/leitor/',Auth::user()->foto)}}" width="250px" height="250px">
        @endif
@endsection    