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
			<h3>Esqueci a Senha</h3>

			<?php if(!empty($senha)): ?>
			<div class="alert alert-warning">
				<strong><?php echo $senha; ?></strong>
			</div>
			<?php endif; ?>

			<form method="POST">
				<div class="form-group">
					<label for="email">Digite seu E-mail:</label>
					<input class="form-control" type="text" name="email"><br>
					<input class="form-control btn btn-success" type="submit" value="Enviar">
				</div>
			</form>

			<a href="<?php echo BASE_URL; ?>login"><button class="btn btn-primary">Voltar</button></a>
		</div>

		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/jquery.mask.min.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</body>
</html>