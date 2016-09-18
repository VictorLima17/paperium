@extends('layouts.leitor')

@section('titulo')
   Paperium | Home
@endsection

@section('css')
	<link href="{{url('css/custom/tabs.css')}}" rel="stylesheet" />
@endsection

@section('conteudo')

	<div class="content-wrapper" id="genero">
		<div class="container-fluid">
			<div class="scroller scroller-left"><i class="glyphicon glyphicon-chevron-left"></i></div>
			<div class="scroller scroller-right"><i class="glyphicon glyphicon-chevron-right"></i></div>
			<div class="wrapper">
				<ul id = "myTab" class = "nav nav-tabs list">
					<li><a href = "#todos" class="active" data-toggle="tab">Todos</a></li>
					@foreach($generos as $genero)
						<li><a href = "#{{$genero->genero}}" data-toggle="tab">{{$genero->genero}}</a></li>
					@endforeach
				</ul>
			</div>
			<div id = "myTabContent" class = "tab-content">
				<div class = "tab-pane fade in" id = "todos">
					<div class="row">
						@foreach($livros as $livro)
							<div class="col-sm-12 col-md-3 col-lg-3">
								<div class="card panel panel-default">
									<h4 class="card-title">{{$livro->nome}}</h4>
									<img class="card-img-top" src="{{url('img/livro/'.$livro->capa)}}" alt="Card image cap" height="250px" width="250px">
									<div class="card-block">
										<p><b>Autor(es):</b></p>
										@forelse($livro->autores as $autor)
											{{$autor->autor}},
										@empty Esse livro está sem autor
										@endforelse
										<p><b>Gênero:</b>{{$livro->genero->genero ? $livro->genero->genero : 'Esse livro está sem gênero'}}</p>
									</div>
									<div class="panel-footer">
										<div class="text-center">
											@if(Auth::check())
												@if(Auth::user()->livrosDigitais->contains($livro->id))
													<a href="#" class="btn btn-primary lista-remover" id="{{$livro->id}}" role="button">Remover da Lista</a>
													<?php $pagina= Auth::user()->livrosDigitais()->findOrFail($livro->id)->pivot->pag_atual ?>
													<a href="/pdf.js/web/viewer.php?file=pdf/{{$livro->arquivo}}#page={{$pagina}}" class="btn btn-danger" role="button">Ler</a>
												@elseif(!Auth::user()->livrosDigitais->contains($livro->id))
													<a href="#" class=" btn btn-primary lista-adicionar" id="{{$livro->id}}" role="button">Adicionar a lista</a>
													<a href="/pdf.js/web/viewer.php?file=pdf/{{$livro->arquivo}}" class="btn btn-danger" role="button">Ler</a>
												@endif
											@else
												<a href="/download/{{$livro->id}}" class="btn-down btn btn-primary " role="button">Download</a>
												<a href="/pdf.js/web/viewer.php?file=pdf/{{$livro->arquivo}}" class="btn btn-danger" role="button">Ler</a>
											@endif
										</div>
									</div>
								</div>
							</div>
						@endforeach
						{{$livros->links()}}
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('js')
    <script src="{{url('js/custom/leitor.js')}}"></script>
    <script src="{{url('js/custom/tabs.js')}}"></script>
@endsection






