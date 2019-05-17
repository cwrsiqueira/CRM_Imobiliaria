<?php
class homeController extends controller {

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

	public function index() {
		$dados = array();

		$dados['usuario'] = $this->usuario;
		$dados['empresa'] = $this->empresa;

		$this->loadTemplate('home', $dados);
	}

}