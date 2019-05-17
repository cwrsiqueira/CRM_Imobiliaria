<div class="container">
	<h1>Cadastro de Imóveis</h1>
	<hr>

	<div id="accordion">

		<div class="card">
			<a class="card-link" data-toggle="collapse" href="#collapseOne">
				<div class="card-header">
					<strong>CADASTRAR IMÓVEL</strong>
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

							<label for="registro">Números de Registro no Cartório de Registro de Imóveis:</label>
							<input class="form-control" type="text" name="registro">

							<div class="row">
								<div class="col-sm">
									<label for="contrato">Contrato Vinculado:</label>
									<input type="hidden" name="id_contrato">
									<input class="form-control" type="text" name="contrato">
								</div>
								<div class="col-sm">
									<label for="proprietario">Proprietário:</label>
									<input type="hidden" name="id_cliente">
									<input class="form-control" type="text" name="proprietario">
								</div>
							</div>

							<br>
							<p><strong>Medidas e Confrontações:</strong></p>

							<div class="row">
								<div class="col-sm-8">
									<label for="frente">Frente para:</label>
									<input class="form-control" type="text" name="frente" placeholder="Inserir Lote ou Logradouro">
								</div>
								<div class="col-sm-4">
									<label for="medidaFrente">Medida (em metros):</label>
									<input class="form-control" type="number" name="medidaFrente" placeholder="Inserir metros (somente números)">
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<label for="fundo">Fundo para:</label>
									<input class="form-control" type="text" name="fundo" placeholder="Inserir Lote ou Logradouro">
								</div>
								<div class="col-sm-4">
									<label for="medidaFundo">Medida (em metros):</label>
									<input class="form-control" type="number" name="medidaFundo" placeholder="Inserir metros (somente números)">
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<label for="ladoDireito">Lado Direito para:</label>
									<input class="form-control" type="text" name="ladoDireito" placeholder="Inserir Lote ou Logradouro">
								</div>
								<div class="col-sm-4">
									<label for="medidaLadoDireito">Medida (em metros):</label>
									<input class="form-control" type="number" name="medidaLadoDireito" placeholder="Inserir metros (somente números)">
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<label for="ladoEsquerdo">Lado Esquerdo para:</label>
									<input class="form-control" type="text" name="ladoEsquerdo" placeholder="Inserir Lote ou Logradouro">
								</div>
								<div class="col-sm-4">
									<label for="medidaLadoEsquerdo">Medida (em metros):</label>
									<input class="form-control" type="number" name="medidaLadoEsquerdo" placeholder="Inserir metros (somente números)">
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
					<strong>LISTAR IMÓVEIS</strong>
				</div>
			</a>
			<div id="collapseTwo" class="collapse" data-parent="#accordion">
				<div class="card-body">
				Listando Imóveis
				</div>
			</div>
		</div>

	</div>

</div>