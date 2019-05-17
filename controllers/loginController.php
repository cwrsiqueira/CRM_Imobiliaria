<?php

class loginController extends controller {

	public function __construct() {
		$u = new Usuarios();
		if ($u->isLogged()) {
			header('Location: '.BASE_URL.'home');
		}
	}

	public function index() {
			$dados = array();
			$u = new Usuarios();

			if (isset($_POST['email']) && !empty($_POST['email'])) {
				$email = addslashes($_POST['email']);
				$senha = md5(addslashes($_POST['senha']));

				$dados['erro'] = $u->logar($email, $senha);
			}

			$this->loadView('login', $dados);
			
	}

	public function cadastrar_usuario() {
		$dados = array();
		$u = new Usuarios();

		if (isset($_POST['email']) && !empty($_POST['email'])) {
			$email = addslashes($_POST['email']);
			$empresa = addslashes($_POST['empresa']);
			$nome = addslashes($_POST['nome']);
			$senha1 = addslashes($_POST['senha1']);
			$senha2 = addslashes($_POST['senha2']);

			if ($senha1 != $senha2) {
				$dados['erro'] = "As senhas devem ser iguais!";
				$this->loadView('cadastrar_usuario', $dados);
				exit;
			}

			$dados['erro'] = $u->cadastrarUsuario($email, $empresa, $nome, $senha1);

			if (!empty($dados['erro'])) {
				$this->loadTemplate('login', $dados);
			} else {
				header('Location: '.BASE_URL);
			}
			
			exit;
		}

		$this->loadView('cadastrar_usuario', $dados);

	}

	public function esqueci_a_senha() {
		$dados = array();

		if (isset($_POST['email']) && !empty($_POST['email'])) {
			$email = addslashes($_POST['email']);
			$u = new Usuarios();

			if ($u->verificarEmail($email) == true) {
				$senha = rand(0,999999);
				$u->alterarSenha($senha, $email);
				$dados['senha'] = 'Sua nova senha é: '.$senha;
			} else {
				$dados['senha'] = 'E-mail não encontrado!';
			}
			
		}

		$this->loadView('esqueci_a_senha', $dados);
	}

	public function sair() {

		session_start();
		unset($_SESSION['isLogged']);
		header("Location: ".BASE_URL);
	}
}
?>