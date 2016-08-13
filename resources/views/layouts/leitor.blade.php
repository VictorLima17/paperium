<!DOCTYPE html>
<html>
<head>

    <title> @yield('titulo') </title>

    @yield('css') <!-- Aqui vem os css especificos de cada pagina-->

</head>
<body>

    @include('leitor.partes.menu') <!-- Aqui vem o menu da pagina-->

    @yield('conteudo') <!-- Aqui vem o conteudo da pagina-->

    @include('leitor.partes.footer')

    @yield('js') <!-- Aqui vem os js especificos de cada pagina -->

</body>
</html>

