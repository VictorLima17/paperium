$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

	var url = new URI(window.location);
	if(url.segment(0) == 'cadastro'){ //verifico ql pagina acesso para entao acessar o form certo
        $("#register-form").fadeIn(10);
        $("#login-form").fadeOut(10);
        $('#login-form-link').removeClass('active');
        $("#register-form-link").addClass('active');
    }

});
