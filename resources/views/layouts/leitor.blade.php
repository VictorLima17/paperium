<!DOCTYPE html>
<html>
<head>

    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title> @yield('titulo') </title>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
	<link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{url('css/font-awesome.css')}}" rel="stylesheet" />
	@yield('css') <!-- Aqui vem os css especificos de cada pagina-->

</head>
<body>

    @include('leitor.partes.menu') <!-- Aqui vem o menu da pagina-->

    @yield('conteudo') <!-- Aqui vem o conteudo da pagina-->

    @include('leitor.partes.footer')

    <script src="{{url('js/jquery.js')}}"></script>
    <script src="{{url('js/URI.js')}}"></script>
    <script src="{{url('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{url('js/bootstrap-notify.min.js')}}" type="text/javascript"></script>
    @yield('js') <!-- Aqui vem os js especificos de cada pagina -->

    @include('leitor.partes.mensagens') <!-- Incluo as mensagens de erro para todas paginas-->

</body>
</html>

