<?php 

class Clientes extends model {

	public function consultaClientesAutocomplete($nome, $id_empresa) {
		$dados = array();

		$sql = $this->db->prepare("SELECT id, nome FROM clientes WHERE nome LIKE :nome AND id_empresa = :id_empresa ORDER BY nome");
		$sql->bindValue(':nome', '%'.$nome.'%');
		$sql->bindValue(':id_empresa', $id_empresa);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$dados = $sql->fetchAll();
		}

		return $dados;

	}
}