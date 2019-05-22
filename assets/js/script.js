// Confirmação de Senha no Login

function verSenha(){

	var senha1 = $('#senha1').attr('type');
	var senha2 = $('#senha2').attr('type');
	var senha_atual = $('#senha_atual').attr('type');

	if (senha1 == 'password') {
		$('#senha1').attr('type', 'text');
		$('.eye').attr('src', 'http://carlos.pc/CRM_Imobiliaria/assets/images/eye.png');
	} else {
		$('#senha1').attr('type', 'password');
		$('.eye').attr('src', 'http://carlos.pc/CRM_Imobiliaria/assets/images/eye-closed.png');
	}

	if (senha2 == 'password') {
		$('#senha2').attr('type', 'text');
		$('.eye').attr('src', 'http://carlos.pc/CRM_Imobiliaria/assets/images/eye.png');
	} else {
		$('#senha2').attr('type', 'password');
		$('.eye').attr('src', 'http://carlos.pc/CRM_Imobiliaria/assets/images/eye-closed.png');
	}

	if (senha_atual == 'password') {
		$('#senha_atual').attr('type', 'text');
		$('.eye').attr('src', 'http://carlos.pc/CRM_Imobiliaria/assets/images/eye.png');
	} else {
		$('#senha_atual').attr('type', 'password');
		$('.eye').attr('src', 'http://carlos.pc/CRM_Imobiliaria/assets/images/eye-closed.png');
	}

	
}

// Confirmação de Senha no Cadastro

function verSenhaCadastro(){

	var senha1 = $('#senha1').attr('type');
	var senha2 = $('#senha2').attr('type');

	if (senha1 == 'password') {
		$('#senha1').attr('type', 'text');
		$('.eye').attr('src', 'http://carlos.pc/CRM_Imobiliaria/assets/images/eye.png');
	} else {
		$('#senha1').attr('type', 'password');
		$('.eye').attr('src', 'http://carlos.pc/CRM_Imobiliaria/assets/images/eye-closed.png');
	}

	if (senha2 == 'password') {
		$('#senha2').attr('type', 'text');
		$('.eye').attr('src', 'http://carlos.pc/CRM_Imobiliaria/assets/images/eye.png');
	} else {
		$('#senha2').attr('type', 'password');
		$('.eye').attr('src', 'http://carlos.pc/CRM_Imobiliaria/assets/images/eye-closed.png');
	}

	
}

// Autocomplete do nome do cliente em Inserir Registro

function selectClient(obj) {
	var id = $(obj).attr('data-id');
	var name = $(obj).html();

	$('.result').hide();
	$('#busca_cliente').val(name);
	$('input[name=cliente_id]').val(id);
}

$(function(){

	$('.formato_contrato').mask('00/0000/00');

	$('#busca_cliente').on('keyup', function(){
		var q = $(this).val();

		$.ajax({
			url:BASE_URL+'registro/autocompleteClientes',
			type:'GET',
			data:{q:q},
			dataType:'json',
			success:function(json) {
				if ($('.result').length == 0) {
					$('#busca_cliente').after('<div class="result"></div>');
				}
				$('.si').css('width', '100px');
				$('.si').attr('style', 'width:500px');

				var html = '';

				for(var i in json) {
					html += '<div class="si"><a href="javascript:;" onclick="selectClient(this)" data-id="'+json[i].id+'">'+json[i].nome+'</a></div>';
				}

				$('.result').html(html);
				$('.result').show();
			}
		});
	});

});

// Autocomplete do nome do cliente na Consulta de Registro

function selectClient_consulta(obj) {
	var id = $(obj).attr('data-id');
	var name = $(obj).html();

	$('.result_consulta').hide();
	$('#busca_cliente_consulta').val(name);
	$('input[name=cliente_id_consulta]').val(id);
}

$(function(){

	$('.formato_contrato').mask('00/0000/00');

	$('#busca_cliente_consulta').on('keyup', function(){
		var q = $(this).val();

		$.ajax({
			url:BASE_URL+'registro/autocompleteClientes',
			type:'GET',
			data:{q:q},
			dataType:'json',
			success:function(json) {
				if ($('.result_consulta').length == 0) {
					$('#busca_cliente_consulta').after('<div class="result_consulta"></div>');
				}
				$('.si').css('width', '100px');
				$('.si').attr('style', 'width:500px');

				var html = '';

				for(var i in json) {
					html += '<div class="si"><a href="javascript:;" onclick="selectClient_consulta(this)" data-id="'+json[i].id+'">'+json[i].nome+'</a></div>';
				}

				$('.result_consulta').html(html);
				$('.result_consulta').show();
			}
		});
	});

});