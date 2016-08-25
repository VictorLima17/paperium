@extends('layouts.leitor')

@section('titulo')
   Paperium | Home
@endsection

@section('conteudo')
    <table border="1px">
        <thead>
            <th>Nome do livro</th>
            <th>Capa Livro</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach($livros as $livro)
                <tr>
                    <td>{{$livro->nome}}</td>
                    <td><img src="{{url('/img/livro',$livro->capa)}}" width="150px" height="150px"></td>
                    <td>Link </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection






