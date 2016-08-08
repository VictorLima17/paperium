<!DOCTYPE html>
<html>
<head>

    <title> @yield('titulo') </title>

    {{MaterializeCSS::include_css()}}

    @yield('css') <!-- Aqui vem os css especificos de cada pagina-->

</head>
<body>

    @include('menu') <!-- Aqui vem o menu da pagina-->

    @yield('conteudo') <!-- Aqui vem o conteudo da pagina-->

    @include('footer')

    {{MaterializeCSS::include_js()}}

    @yield('js') <!-- Aqui vem os js especificos de cada pagina -->

</body>
</html>

