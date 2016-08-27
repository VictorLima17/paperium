<!DOCTYPE html>
<html>
<head>

    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title> @yield('titulo') </title>

    @yield('css') <!-- Aqui vem os css especificos de cada pagina-->

</head>
<body>

    @include('leitor.partes.menu') <!-- Aqui vem o menu da pagina-->

    @yield('conteudo') <!-- Aqui vem o conteudo da pagina-->

    @include('leitor.partes.footer')

    <script src="{{url('js/jquery.js')}}"></script>
    @yield('js') <!-- Aqui vem os js especificos de cada pagina -->

    @include('leitor.partes.mensagens') <!-- Incluo as mensagens de erro para todas paginas-->

</body>
</html>

