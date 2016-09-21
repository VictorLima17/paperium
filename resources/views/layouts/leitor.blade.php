<!DOCTYPE html>
<html lang="pt-br" class="no-js">
<head>

	<meta charset="UTF-8"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('titulo') </title>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link href="{{url('css/custom/menu.css')}}" rel="stylesheet" />
	<link href="{{url('css/custom/reset.css')}}" rel="stylesheet" />
	<link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{url('css/font-awesome.css')}}" rel="stylesheet" />
	<link href="{{url('css/fileinput.min.css')}}" rel="stylesheet" />
	<script src="{{url('js/modernizr.js')}}" type="text/javascript"></script>
	@yield('css') <!-- Aqui vem os css especificos de cada pagina-->

</head>
<body>

    @include('leitor.partes.menu') <!-- Aqui vem o menu da pagina-->

    @yield('conteudo') <!-- Aqui vem o conteudo da pagina-->
    </main>

    @if(Auth::check() && !Auth::user()->social) <!-- caso n seja um usuario social,ele pode acessar seus modais-->
		@include('leitor.partes.leitorModals')
	@endif

    <script src="{{url('js/jquery.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{url('js/bootstrap-notify.min.js')}}" type="text/javascript"></script>
    <script src="{{url('js/jquery.menu-aim.js')}}" type="text/javascript"></script>
    <script src="{{url('js/fileinput.min.js')}}" type="text/javascript"></script>
    <script src="{{url('js/custom/main.js')}}" type="text/javascript"></script>
    <script src="{{url('js/custom/leitor.js')}}" type="text/javascript"></script>
    <script src="{{url('js/lang/locales/pt-BR.js')}}" type="text/javascript"></script>
    @yield('js') <!-- Aqui vem os js especificos de cada pagina -->

    @include('leitor.partes.mensagens') <!-- Incluo as mensagens de erro para todas paginas-->

</body>
</html>

