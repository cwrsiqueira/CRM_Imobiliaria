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

$(function(){

	$('.formato_contrato').mask('00/0000/00');
});