<div class="container">
	<h4>Perfil do Usuário</h4>
	<?php if(!empty($erro)): ?>
		<div class="alert alert-danger">
			<strong>Erro!</strong> <?php echo $erro; ?>
		</div>
	<?php endif; ?>

	<form method="POST" name="f1">
		<div class="form-group">
			<label for="nome">Nome:</label>
			<input autofocus="true" class="form-control" type="text" name="nome" value="<?php echo $usuario['nome']; ?>">
		</div>
		<div class="form-group">
			<label for="email">E-mail:</label>
			<input class="form-control" type="email" name="email" value="<?php echo $usuario['email']; ?>">
		</div>
		<label>Preencha os campos abaixo para alterar a senha:</label>
		<div class="form-group">
			<label for="senha_atual">Senha Atual:</label>
			<input class="form-control" type="password" name="senha_atual" id="senha_atual">
		</div>
		<div class="form-group">
			<label for="senha1">Nova Senha:</label>
			<input class="form-control" type="password" name="senha1" id="senha1">
		</div>
		<div class="form-group">
			<label for="senha2">Confirme a Nova Senha:</label>
			<input class="form-control" type="password" name="senha2" id="senha2">
		</div>
		<div class="form-check-inline">
			<label class="form-check-label">
				<img class="eye" src="<?php echo BASE_URL; ?>assets/images/eye-closed.png" onclick="verSenha();"> Visualizar senhas
			</label>
		</div>
		<div class="form-group">
			<input class="btn btn-primary" type="submit" value="Salvar Alterações">
		</div>
	</form>

</div>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/jquery.mask.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>