<div class="container">
	<?php if(!empty($reg_insert)): ?>
		<div class="alert alert-primary">
			<strong>Registro inserido com sucesso!!</strong> 
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
							<input class="form-control" name="registro_CRI">

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

		<div class="card">
			<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
				<div class="card-header">
					<strong>CONSULTAR REGISTROS</strong>
				</div>
			</a>
			<div id="collapseTwo" class="collapse" data-parent="#accordion">
				<div class="card-body">
					<form method="POST">
						<div class="form-group">

							<label for="consulta_loteamento">Loteamento:</label>
							<select name="consulta_loteamento" class="form-control">
								<option value="1">Loteamento Fazendinha Alfaville</option>
								<option value="2">Loteamento Agrovila Hortigranjeira</option>
							</select>

							<br>
							<input class="form-control btn btn-secondary" type="submit" value="Consultar">
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
	<?php if(empty($registros)): ?>
		<?php else: ?>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Loteamento</th>
					<th>Quadra</th>
					<th>Lote</th>
					<th>Contrato</th>
					<th>Cliente</th>
					<th>Situação</th>
				</tr>
			</thead>
			<tbody>
					<?php foreach($registros as $r): ?>
				<tr>
					<td><?php echo $r['nome_loteamento']; ?></td>
					<td><?php echo $r['quadra']; ?></td>
					<td><?php echo $r['lote']; ?></td>
					<td><?php echo $r['numero_contrato']; ?></td>
					<td><?php echo $r['nome_cliente']; ?></td>
					<td><?php echo ($r['prop_atual'] == 1)?'Proprietário':'Transferido';  ?></td>
				</tr>
					<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>

</div>