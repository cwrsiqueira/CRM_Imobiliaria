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

		$sql = $this->db->prepare("INSERT INTO contratos SET id_empresa = :id_empresa, id_imovel = :id_imovel, numero = :contrato_nr, id_cliente = :id_cliente, prop_atual = :prop_atual");
		$sql->bindValue(':id_imovel', $id_imovel);
		$sql->bindValue(':contrato_nr', $contrato_nr);
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
		
		$sql .= " ORDER BY id DESC LIMIT 0, 20";

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

			$sql = "SELECT *, 
			(select id_loteamento from imoveis where id = :imovel_id) as loteamento_id,
			(select quadra from imoveis where id = :imovel_id) as quadra,
			(select lote from imoveis where id = :imovel_id) as lote,
			(select nome from loteamentos where id = loteamento_id) as loteamento_nome,
			(select nome from clientes where id = id_cliente) as cliente_nome
			FROM contratos 
			WHERE id_imovel = :imovel_id AND prop_atual = :prop_atual AND id_empresa = :id_empresa";

			if ($contrato_nr != '') {
				$sql .= " AND numero = :contrato_nr";
			}
			if ($cliente != '') {
				$sql .= " AND id_cliente = :cliente";
			}

			//print_r($sql); exit;

			$sql = $this->db->prepare($sql);

			$sql->bindValue(':imovel_id', $imovel_id);
			$sql->bindValue(':prop_atual', $prop_atual);
			$sql->bindValue(':id_empresa', $id_empresa);
			if ($contrato_nr != '') {
				$sql->bindValue(':contrato_nr', $contrato_nr);
			}
			if ($cliente != '') {
				$sql->bindValue(':cliente', $cliente);
			}
			$sql->execute();

			if ($sql->rowCount() > 0) {
				$dados[] = $sql->fetch();
			}
		}
		
		return $dados;
	}
}