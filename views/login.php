<html>
	<head>
		<title><?php echo !empty($viewData['empresa']['nome'])?$viewData['empresa']['nome']:''; ?> | Sistema Imobiliário</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css" />
	</head>
	<body>
		<div class="container login_form">
			<fieldset>
				<?php if(!empty($erro)): ?>
					<div class="alert alert-danger">
						<strong>Erro!</strong> <?php echo $erro; ?>
					</div>
				<?php endif; ?>
				<legend><img class="logo" src="<?php echo BASE_URL; ?>assets/images/logopronorte.jpg">Sistema Imobiliário</legend>
				<strong>LOGIN</strong>
				<div class="login_form">
					<form method="POST">
						<div class="form-group">
							<label for="email">E-Mail</label>
							<input class="form-control" type="text" name="email">
						</div>

						<div class="form-group">
							<label for="senha">Senha:</label>
							<input class="form-control" type="password" name="senha">
						</div>

						<input class="btn btn-primary btn-sm" type="submit" value="Entrar">
					</form>
				</div>
				<a href="<?php echo BASE_URL; ?>login/esqueci_a_senha">Esqueci a senha</a><br><br>
				<a href="<?php echo BASE_URL; ?>login/cadastrar_usuario">Não tenho cadastro</a>
			</fieldset>
			
		</div>


		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/jquery.mask.min.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>