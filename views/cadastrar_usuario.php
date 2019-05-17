<html>
	<head>
		<title><?php echo !empty($viewData['empresa']['nome'])?$viewData['empresa']['nome']:''; ?> | Sistema Imobiliário</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css" />
	</head>
	<body>
		<div class="container">
			<div class="fieldset">
				<fieldset>
				<?php if(!empty($erro)): ?>
					<div class="alert alert-danger">
						<strong>Erro!</strong> <?php echo $erro; ?>
					</div>
				<?php endif; ?>
					<legend>Cadastrar Usuário</legend>
					<form method="POST" name="f1">
						<div class="form-group">
							<label for="empresa">Empresa:</label>
							<input class="form-control" type="text" name="empresa" required >
						</div>
						<div class="form-group">
							<label for="nome">Nome:</label>
							<input class="form-control" type="text" name="nome" required >
						</div>
						<div class="form-group">
							<label for="email">E-mail:</label>
							<input class="form-control" type="email" name="email" required >
						</div>
						<div class="form-group">
							<label for="senha1">Senha:</label>
							<input class="form-control" type="password" name="senha1" id="senha1" required >
						</div>
						<div class="form-group">
							<label for="senha2">Confirme sua senha:</label>
							<input class="form-control" type="password" name="senha2" id="senha2" required >
						</div>
							<div class="form-check-inline">
								<label class="form-check-label">
									<img class="eye" src="<?php echo BASE_URL; ?>assets/images/eye-closed.png" onclick="verSenhaCadastro();"> Visualizar senhas
								</label>
							</div>

						<input class="form-control btn btn-primary" type="submit" value="Cadastrar">
					</form>
				</fieldset>
			</div>
		</div>

		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/jquery.mask.min.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>