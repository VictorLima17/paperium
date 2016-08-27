$(document).ready(function () {

    $(document).on('click','.lista-remover',function () {
        var livroId = $(this)[0].id;
        var rota = '/remover/leitura';

        $.ajax({
            context:$(this),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url : rota,
            type : 'POST',
            dataType : 'json',
            data : { livroId : livroId},
            success:function (response) {
                $(this).removeClass('lista-remover');
                $(this).text('Adicionar a lista').addClass('lista-adicionar');
                alert(response['mensagem']);
            }
        });
    });

    $(document).on('click','.lista-adicionar',function () {
        var livroId = $(this)[0].id;
        var rota = '/adicionar/leitura';

        $.ajax({
            context:$(this),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url : rota,
            type : 'POST',
            dataType : 'json',
            data : { livroId : livroId},
                success:function (response) {
                   $(this).removeClass('lista-adicionar');
                   $(this).text('Remover da lista').addClass('lista-remover');
                    alert(response['mensagem']);
                },
                error:function(data){
                    var erros = data.responseJSON;
                    $.each(erros,function (key,erro) {
                        alert('Erro:' + erro);
                    })
                }
        });
    });

});