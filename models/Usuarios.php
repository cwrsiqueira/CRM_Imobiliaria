<?php 

class Usuarios extends model {

	public function isLogged() {

		if (isset($_SESSION['isLogged']) && !empty($_SESSION['isLogged'])) {
			return true;
		}

		return false;
	}

	public function logar($email, $senha) {

		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', $senha);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			
			$_SESSION['isLogged'] = $sql->fetch()['id'];
		} else {
			return "E-mail e/ou senha não conferem!";
		}

		header('Location: '.BASE_URL.'home');
	}

	public function getUsuario($id_usuario) {
		$dados = array();

		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id_usuario");
		$sql->bindValue(':id_usuario', $id_usuario);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$dados = $sql->fetch();
		}

		return $dados;
	}

	public function getEmpresa($id_usuario) {
		$dados = array();

		$sql = $this->db->prepare("SELECT usuarios.id_empresa, empresas.nome FROM usuarios LEFT JOIN empresas ON empresas.id = usuarios.id_empresa WHERE usuarios.id = :id_usuario");
		$sql->bindValue(':id_usuario', $id_usuario);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$dados = $sql->fetch();
		}

		return $dados;
	}

	public function cadastrarUsuario($email, $empresa, $nome, $senha) {

		$sql = $this->db->prepare("SELECT * FROM empresas WHERE nome = :empresa");
		$sql->bindValue(':empresa', $empresa);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$erro = "Empresa já cadastrada! Contacte o Administrador!";
			return $erro;
			exit;
		}

		$sql = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
		$sql->bindValue(':email', $email);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$erro = "Usuário já cadastrado! Contacte o Administrador!";
			return $erro;
			exit;
		}

		$sql = $this->db->prepare("INSERT INTO empresas SET nome = :empresa");
		$sql->bindValue(':empresa', $empresa);
		$sql->execute();

		$id_empresa = $this->db->lastInsertId();

		$sql = $this->db->prepare("INSERT INTO usuarios SET id_empresa = :id_empresa, nome = :nome, email = :email, senha = :senha");
		$sql->bindValue(':id_empresa', $id_empresa);
		$sql->bindValue(':nome', $nome);
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', md5($senha));
		$sql->execute();

		$_SESSION['isLogged'] = $this->db->lastInsertId();
	}

	public function verificarEmail($email) {

		$sql = $this->db->prepare("SELECT email FROM usuarios WHERE email = :email");
		$sql->bindValue(':email', $email);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		}
		return false;
	}

	public function alterarSenha($senha, $email) {

		$sql = $this->db->prepare("UPDATE usuarios SET senha = :senha WHERE email = :email");
		$sql->bindValue(':email', $email);
		$sql->bindValue(':senha', md5($senha));
		$sql->execute();

	}

	public function confirmaSenha($senha, $id_empresa) {

		$sql = $this->db->prepare("SELECT id FROM usuarios WHERE senha = :senha AND id_empresa = :id_empresa");
		$sql->bindValue(':senha', md5($senha));
		$sql->bindValue(':id_empresa', $id_empresa);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			return true;
		}
		return false;
	}

	public function atualizarPerfil($nome, $email, $senha = '', $id_empresa, $id_usuario) {

		if ($senha != '') {
			$sql = $this->db->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE id_empresa = :id_empresa AND id = :id_usuario");
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':senha', md5($senha));
			$sql->bindValue(':email', $email);
			$sql->bindValue(':id_empresa', $id_empresa);
			$sql->bindValue(':id_usuario', $id_usuario);
			$sql->execute();

			return true;
		} else {
			$sql = $this->db->prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id_empresa = :id_empresa AND id = :id_usuario");
			$sql->bindValue(':nome', $nome);
			$sql->bindValue(':email', $email);
			$sql->bindValue(':id_empresa', $id_empresa);
			$sql->bindValue(':id_usuario', $id_usuario);
			$sql->execute();

			return true;
		}
	}
}