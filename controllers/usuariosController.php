<?php

class usuariosController extends controller {

	private $usuario;
	private $empresa;

	public function __construct() {
		$u = new Usuarios();
		if (!$u->isLogged()) {
			header('Location: '.BASE_URL.'login');
		}
		$id_usuario = $_SESSION['isLogged'];
		$this->usuario = $u->getUsuario($id_usuario);
		$this->empresa = $u->getEmpresa($id_usuario);
	}

	public function index() {}

	public function perfil() {
		$dados = array();
		$dados['usuario'] = $this->usuario;
		$dados['empresa'] = $this->empresa;
		$u = new Usuarios();

		if (isset($_POST['nome']) && !empty($_POST['nome']) || isset($_POST['senha_atual']) && !empty($_POST['senha_atual'])) {
			$nome = addslashes($_POST['nome']);
			$email = addslashes($_POST['email']);
			$senha_atual = addslashes($_POST['senha_atual']);
			$senha1 = addslashes($_POST['senha1']);
			$senha2 = addslashes($_POST['senha2']);

			if ($senha1 != $senha2) {
				$dados['erro'] = "As novas senhas devem ser iguais!";
				$this->loadTemplate('perfil', $dados);
				exit;
			}

			if (!empty($senha_atual)) {

				if ($u->confirmaSenha($senha_atual, $this->empresa['id_empresa']) == false) {
					$dados['erro'] = "Senha Atual não confere!";
					$this->loadTemplate('perfil', $dados);
					exit;
				}
			}

			if ($u->atualizarPerfil($nome, $email, $senha2, $this->empresa['id_empresa'], $this->usuario['id']) == true) {
				
				$this->loadTemplate('home', $dados);
				exit;
			} else {
				$dados['erro'] = "Alteração não efetuada!";
				$this->loadTemplate('perfil', $dados);
				exit;
			}
			
		}

		$this->loadTemplate('perfil', $dados);
	}

	
}