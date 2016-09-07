@extends('layouts.leitor')

@section('titulo')
   Paperium | Home
@endsection

@section('conteudo')

    <table border="1px">
        <thead>
            <th>Nome do livro</th>
            <th>Capa Livro</th>
            <th>Lista</th>
            <th>Download</th>
        </thead>
        <tbody>
            @foreach($livros as $livro)
                <tr>
                    <td>{{$livro->nome}}</td>
                    <td><img src="{{url('/img/livro',$livro->capa)}}" width="150px" height="150px"></td>
                    <td>
                        @if((Auth::check()) && (Auth::user()->livrosDigitais->contains($livro->id)))
                            <a href="#" class="lista-remover" id="{{$livro->id}}">Remover da Lista</a>
                        @elseif((Auth::check()) && (!Auth::user()->livrosDigitais->contains($livro->id)))
                            <a href="#" class="lista-adicionar" id="{{$livro->id}}">Adicionar a lista</a>
                        @endif
                    </td>
                    <td><a href="/download/{{$livro->id}}">Download</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('js')
    <script src="{{url('js/leitor.js')}}"></script>
@endsection






