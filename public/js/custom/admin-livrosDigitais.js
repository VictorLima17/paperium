$(document).ready(function(){
    $('#tabela-autores').DataTable({
        "pageLength": 10, //numero de itens por pagina
        "info" : false,   //informaçoes
        "lengthChange": false,  //usuario mudar itens/pagina
        "order": [[ 1, "asc" ]], //coluna q indica ordem
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        }
    });
    $('#tabela-generos').DataTable({
        "pageLength": 10,
        "info" : false,
        "lengthChange": false,
        "order": [[ 1, "asc" ]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        }
    });
    $('#tabela-livros').DataTable({
        "pageLength": 10,
        "info" : false,
        "lengthChange": false,
        "order": [[ 1, "asc" ]],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
        }
    });
});
