<?php 

class Loteamentos extends model {

	public function inserirLoteamento($loteamento, $endereco, $registro_cri, $nome_cri, $data_reg_cri, $endereco_cri, $registro_prefeitura, $nome_prefeitura, $data_reg_prefeitura, $obs_loteamento, $id_empresa) {

		$sql = $this->db->prepare("SELECT id FROM loteamentos WHERE id_empresa = :id_empresa AND nome = :loteamento");
		$sql->bindValue(':id_empresa', $id_empresa);
		$sql->bindValue(':loteamento', $loteamento);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return false;
		} else {

			$sql = $this->db->prepare("INSERT INTO loteamentos SET nome = :loteamento, endereco = :endereco, registro_cri = :registro_cri, nome_cri = :nome_cri, data_reg_cri = :data_reg_cri, endereco_cri = :endereco_cri, registro_prefeitura = :registro_prefeitura, nome_prefeitura = :nome_prefeitura, data_reg_prefeitura = :data_reg_prefeitura, obs_loteamento = :obs_loteamento, id_empresa = :id_empresa");
			$sql->bindValue(':loteamento', $loteamento);
			$sql->bindValue(':endereco', $endereco);
			$sql->bindValue(':registro_cri', $registro_cri);
			$sql->bindValue(':nome_cri', $nome_cri);
			$sql->bindValue(':data_reg_cri', $data_reg_cri);
			$sql->bindValue(':endereco_cri', $endereco_cri);
			$sql->bindValue(':registro_prefeitura', $registro_prefeitura);
			$sql->bindValue(':nome_prefeitura', $nome_prefeitura);
			$sql->bindValue(':data_reg_prefeitura', $data_reg_prefeitura);
			$sql->bindValue(':obs_loteamento', $obs_loteamento);
			$sql->bindValue(':id_empresa', $id_empresa);
			$sql->execute();

			return true;
		}
	}

	public function consultaLoteamentos($id_empresa) {
		$dados = array();

		$sql = $this->db->prepare("SELECT * FROM loteamentos WHERE id_empresa = :id_empresa");
		$sql->bindValue(':id_empresa', $id_empresa);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$dados = $sql->fetchAll();
		}

		return $dados;
	}
}