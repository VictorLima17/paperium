<!DOCTYPE html>
<html>
<head>

    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta charset="utf-8"/>

    <title> @yield('titulo') </title>

    @yield('css') <!-- Aqui vem os css especificos de cada pagina-->

</head>
<body>

    @include('admin.partes.menu') <!-- Aqui vem o menu da pagina-->

    @yield('conteudo') <!-- Aqui vem o conteudo da pagina-->

    @include('admin.partes.footer') <!-- Aqui vem o rodapé da pagina -->

    @yield('js') <!-- Aqui vem os js especificos de cada pagina -->

    @include('admin.partes.mensagens') <!-- Incluo as mensagens de erro para todas paginas-->

</body>
</html>
