<div class="container">
	<?php if(!empty($reg_insert)): ?>
		<div class="alert alert-primary">
			<strong>Registro inserido com sucesso!!</strong> 
		</div>
	<?php endif; ?>
	<h1>Livro de Registro de Imóveis</h1>
	<hr>

	<div id="accordion">

		<div class="card">
			<a class="card-link" data-toggle="collapse" href="#collapseOne">
				<div class="card-header">
					<strong>INSERIR REGISTRO</strong>
				</div>
			</a>
			<div id="collapseOne" class="collapse" data-parent="#accordion">
				<div class="card-body">
					<form method="POST">
						<div class="form-group">

							<label for="loteamento">Loteamento:</label>
							<select name="loteamento" class="form-control">
								<option value="1">Loteamento Fazendinha Alfaville</option>
								<option value="2">Loteamento Agrovila Hortigranjeira</option>
							</select>

							<div class="row">
								<div class="col-sm">
									<label for="quadra">Quadra:</label>
									<input class="form-control" type="number" name="quadra">
								</div>
								<div class="col-sm">
									<label for="lote">Lote:</label>
									<input class="form-control" type="number" name="lote">
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3">
									<label for="contrato_nr">Contrato Vinculado:</label>
									<input class="form-control formato_contrato" type="text" name="contrato_nr" placeholder="00/0000/00">
								</div>
								<div class="col-sm-6">
									<label for="cliente">Proprietário:</label>
									<input class="form-control" type="text" name="cliente">
								</div>
								<div class="col-sm-3">
									<label for="situacao">Situação:</label>
									<select name="situacao" class="form-control">
										<option value="1">Proprietário Atual</option>
										<option value="0">Transferido</option>
									</select>
								</div>
							</div>
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

							<div class="row">
								<div class="col-sm">
									<label for="consulta_quadra">Quadra:</label>
									<input class="form-control" type="number" name="consulta_quadra">
								</div>
								<div class="col-sm">
									<label for="consulta_lote">Lote:</label>
									<input class="form-control" type="number" name="consulta_lote">
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3">
									<label for="consulta_contrato_nr">Contrato Vinculado:</label>
									<input class="form-control formato_contrato" type="text" name="consulta_contrato_nr" placeholder="00/0000/00">
								</div>
								<div class="col-sm-6">
									<label for="consulta_cliente">Proprietário:</label>
									<input class="form-control" type="text" name="consulta_cliente">
								</div>
								<div class="col-sm-3">
									<label for="consulta_situacao">Situação:</label>
									<select name="consulta_situacao" class="form-control">
										<option value="1">Proprietário Atual</option>
										<option value="0">Transferido</option>
									</select>
								</div>
							</div>
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