<!DOCTYPE html>
<html>
<head>

    <title> @yield('titulo') </title>

    {!! MaterializeCSS::include_css() !!}

    @yield('css') <!-- Aqui vem os css especificos de cada pagina-->

</head>
<body>

    @include('admin.partes.menu') <!-- Aqui vem o menu da pagina-->

    @yield('conteudo') <!-- Aqui vem o conteudo da pagina-->

    @include('admin.partes.footer') <!-- Aqui vem o rodapé da pagina -->

    {!! MaterializeCSS::include_js() !!}

    @yield('js') <!-- Aqui vem os js especificos de cada pagina -->

</body>
</html>
