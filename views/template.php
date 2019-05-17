<html>
	<head>
		<title><?php echo !empty($viewData['empresa']['nome'])?$viewData['empresa']['nome']:''; ?> | Sistema Imobiliário</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/images/FAVICON.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css" />
	</head>
	<body>

		<nav class="navbar navbar-expand-sm bg-success navbar-dark justify-content-between">
			<a class="navbar-brand" href="<?php echo BASE_URL; ?>"><?php echo $viewData['empresa']['nome']; ?></a>

			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo BASE_URL; ?>registro">Livro de Registro de Imóveis</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo BASE_URL; ?>registro/loteamentos">Loteamentos</a>
				</li>
			</ul>

		</nav>
		
		
		
		<?php $this->loadViewInTemplate($viewName, $viewData); ?>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/jquery.mask.min.js"></script>
		<script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
		<script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>';</script>
	</body>
</html>