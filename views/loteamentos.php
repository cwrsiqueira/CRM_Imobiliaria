<div class="container">
	<?php if(!empty($reg_insert)): ?>
		<div class="alert <?php echo $alert_class; ?>">
			<strong><?php echo $reg_insert; ?></strong> 
		</div>
	<?php endif; ?>
	<h1>Loteamentos</h1>
	<hr>

	<div id="accordion">

		<div class="card">
			<a class="card-link" data-toggle="collapse" href="#collapseOne">
				<div class="card-header">
					<strong>REGISTRAR LOTEAMENTO</strong>
				</div>
			</a>
			<div id="collapseOne" class="collapse" data-parent="#accordion">
				<div class="card-body">
					<form method="POST">
						<div class="form-group">

							<label for="loteamento">Nome do Loteamento:</label>
							<input class="form-control" name="loteamento">

							<label for="endereco">Endereço:</label>
							<input class="form-control" name="endereco">

							<label for="registro_cri">Número do Registro no Cartório de Registro de Imóveis:</label>
							<input class="form-control" name="registro_cri">

							<label for="nome_cri">Nome do Cartório de Registro de Imóveis:</label>
							<input class="form-control" name="nome_cri">

							<label for="data_reg_cri">Data do Registro no Cartório de Registro de Imóveis:</label>
							<input class="form-control" name="data_reg_cri" placeholder="00/00/0000">

							<label for="endereco_cri">Endereço do Cartório de Registro de Imóveis:</label>
							<input class="form-control" name="endereco_cri">

							<label for="registro_prefeitura">Número do Registro na Prefeitura Municipal:</label>
							<input class="form-control" name="registro_prefeitura">

							<label for="nome_prefeitura">Nome da Prefeitura Municipal:</label>
							<input class="form-control" name="nome_prefeitura">

							<label for="data_reg_prefeitura">Data do Registro na Prefeitura Municipal:</label>
							<input class="form-control" name="data_reg_prefeitura" placeholder="00/00/0000">

							<label for="obs_loteamento">Outras Informações/Observações:</label>
							<input class="form-control" name="obs_loteamento" >

							<br>
							<input class="form-control btn btn-secondary" type="submit" value="Cadastrar">
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
	<?php if(empty($loteamentos)): ?>
		<?php else: ?>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Loteamento</th>
					<th>Registro C.R.I.</th>
					<th>Cartório</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($loteamentos as $l): ?>
					<tr>
						<td><?php echo $l['nome']; ?></td>
						<td><?php echo $l['registro_cri']; ?></td>
						<td><?php echo $l['nome_cri']; ?></td>
						<td>Consultar | Editar | Excluir</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>

</div>