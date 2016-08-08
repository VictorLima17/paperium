@extends('layouts.admin')

@section('titulo','Administração do site')

@section('conteudo')

    <b>Nome do Admin:</b>{{Auth::guard('admin')->user()->nome}}<br>
    <b>Email do Admin:</b>{{Auth::guard('admin')->user()->email}}

@endsection
