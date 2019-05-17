<?php 

class Registros extends model {

	public function inserirRegistro($id_loteamento, $quadra_nr, $lote_nr, $contrato_nr, $cliente, $prop_atual, $id_empresa) {

		$sql = $this->db->prepare("SELECT id FROM imoveis WHERE id_loteamento = :id_loteamento AND quadra = :quadra_nr AND lote = :lote_nr AND id_empresa = :id_empresa");
		$sql->bindValue(':id_loteamento', $id_loteamento);
		$sql->bindValue(':quadra_nr', $quadra_nr);
		$sql->bindValue(':lote_nr', $lote_nr);
		$sql->bindValue(':id_empresa', $id_empresa);
		$sql->execute();

		if ($sql->rowCount() <= 0) {
			
			$sql = $this->db->prepare("INSERT INTO imoveis SET id_loteamento = :id_loteamento, quadra = :quadra_nr, lote = :lote_nr, id_empresa = :id_empresa");
			$sql->bindValue(':id_loteamento', $id_loteamento);
			$sql->bindValue(':quadra_nr', $quadra_nr);
			$sql->bindValue(':lote_nr', $lote_nr);
			$sql->bindValue(':id_empresa', $id_empresa);
			$sql->execute();

			$id_imovel = $this->db->lastInsertId();
		} else {
			$id_imovel = $sql->fetch()['id'];
		}

		$sql = $this->db->prepare("SELECT id FROM contratos WHERE numero = :contrato_nr AND id_empresa = :id_empresa");
		$sql->bindValue(':contrato_nr', $contrato_nr);
		$sql->bindValue(':id_empresa', $id_empresa);
		$sql->execute();

		if ($sql->rowCount() <= 0) {
			
			$sql = $this->db->prepare("INSERT INTO contratos SET numero = :contrato_nr, id_empresa = :id_empresa");
			$sql->bindValue(':contrato_nr', $contrato_nr);
			$sql->bindValue(':id_empresa', $id_empresa);
			$sql->execute();

			$id_contrato = $this->db->lastInsertId();
		} else {
			$id_contrato = $sql->fetch()['id'];
		}

		$sql = $this->db->prepare("SELECT id FROM clientes WHERE nome = :cliente AND id_empresa = :id_empresa");
		$sql->bindValue(':cliente', $cliente);
		$sql->bindValue(':id_empresa', $id_empresa);
		$sql->execute();

		if ($sql->rowCount() <= 0) {
			
			$sql = $this->db->prepare("INSERT INTO clientes SET nome = :cliente, id_empresa = :id_empresa");
			$sql->bindValue(':cliente', $cliente);
			$sql->bindValue(':id_empresa', $id_empresa);
			$sql->execute();

			$id_cliente = $this->db->lastInsertId();
		} else {
			$id_cliente = $sql->fetch()['id'];
		}

		$sql = $this->db->prepare("INSERT INTO registros SET id_empresa = :id_empresa, id_imovel = :id_imovel, id_contrato = :id_contrato, id_cliente = :id_cliente, prop_atual = :prop_atual");
		$sql->bindValue(':id_imovel', $id_imovel);
		$sql->bindValue(':id_contrato', $id_contrato);
		$sql->bindValue(':id_cliente', $id_cliente);
		$sql->bindValue(':prop_atual', $prop_atual);
		$sql->bindValue(':id_empresa', $id_empresa);
		$sql->execute();

		return true;
	}

	public function consultaRegistros($id_loteamento = '', $quadra_nr = '', $lote_nr = '', $contrato_nr = '', $cliente = '', $prop_atual = '', $id_empresa) {
		$dados = array();

		$sql = "SELECT id FROM imoveis WHERE id_loteamento = :id_loteamento AND id_empresa = :id_empresa";

		if ($quadra_nr != '') {
			$sql .= " AND quadra = :quadra_nr";
		}

		if ($lote_nr != '') {
			$sql .= " AND lote = :lote_nr";
		}

		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id_loteamento', $id_loteamento);
		$sql->bindValue(':id_empresa', $id_empresa);
		if ($quadra_nr != '') {
			$sql->bindValue(':quadra_nr', $quadra_nr);
		}
		if ($lote_nr != '') {
			$sql->bindValue(':lote_nr', $lote_nr);
		}
		$sql->execute();

		$result = $sql->fetchAll();

		foreach ($result as $imovel) {
			$imovel_id = $imovel['id'];

			$sql = "SELECT
			registros.id as id_registro,
			registros.id_contrato,
			registros.id_cliente,
			registros.id_imovel,
			registros.prop_atual,
			contratos.numero as numero_contrato,
			clientes.nome as nome_cliente,
			imoveis.quadra,
			imoveis.lote,
			(select nome from loteamentos where id = imoveis.id_loteamento) as nome_loteamento
			";

			if ($contrato_nr != '') {
				$sql .= ", contratos.numero";
			}

			if ($cliente != '') {
				$sql .= ", clientes.nome";
			}

			$sql .= " 
			FROM registros 
			JOIN contratos ON contratos.id = registros.id_contrato
			JOIN clientes ON clientes.id = registros.id_cliente
			JOIN imoveis ON imoveis.id = :imovel_id
			";
			
			$sql .= " WHERE registros.id_imovel = :imovel_id AND prop_atual = :prop_atual";

			if ($contrato_nr != '') {
				$sql .= " AND contratos.numero = :contrato_nr";
			}

			if ($cliente != '') {
				$sql .= " AND clientes.nome LIKE :cliente";
			}

			//print_r($sql); exit;

			$sql = $this->db->prepare($sql);

			if ($contrato_nr != '') {
				$sql->bindValue(':contrato_nr', $contrato_nr);
			}

			if ($cliente != '') {
				$sql->bindValue(':cliente', '%'.$cliente.'%');
			}

			$sql->bindValue(':imovel_id', $imovel_id);
			$sql->bindValue(':prop_atual', $prop_atual);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$dados[] = $sql->fetch();
			}
		}
		
		return $dados;
	}
}