@extends('layouts.admin')

@section('titulo','Administração do site')

@section('conteudo')

    <b>Nome do Admin:</b>{{Auth::guard('admin')->user()->nome}}<br>
    <b>Email do Admin:</b>{{Auth::guard('admin')->user()->email}}

    @if(Route::is('admin::index'))
        Admin is
    @elseif(Route::is('admin::teste'))
        Teste is
    @endif

    {{URL::current()}}
@endsection

