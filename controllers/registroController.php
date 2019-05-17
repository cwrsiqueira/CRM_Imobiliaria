<?php 

class registroController extends controller {

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
		$r = new Registros();

		if (isset($_POST['loteamento']) && !empty($_POST['loteamento'])) {
			$id_loteamento = addslashes($_POST['loteamento']);
			$quadra_nr = addslashes($_POST['quadra']);
			$lote_nr = addslashes($_POST['lote']);
			$contrato_nr = addslashes($_POST['contrato_nr']);
			$cliente = addslashes($_POST['cliente']);
			$prop_atual = addslashes($_POST['situacao']);

			if($r->inserirRegistro($id_loteamento, $quadra_nr, $lote_nr, $contrato_nr, $cliente, $prop_atual, $this->empresa['id_empresa'])) {
				$dados['reg_insert'] = "Registro Inserido com Sucesso!";
			}

		}

		if (isset($_POST['consulta_loteamento']) && !empty($_POST['consulta_loteamento']) ||
			isset($_POST['consulta_quadra']) && !empty($_POST['consulta_quadra']) ||
			isset($_POST['consulta_lote']) && !empty($_POST['consulta_lote']) ||
			isset($_POST['consulta_contrato_nr']) && !empty($_POST['consulta_contrato_nr']) ||
			isset($_POST['consulta_cliente']) && !empty($_POST['consulta_cliente']) ||
			isset($_POST['consulta_situacao']) && !empty($_POST['consulta_situacao'])) {
			$id_loteamento = addslashes($_POST['consulta_loteamento']);
			$quadra_nr = addslashes($_POST['consulta_quadra']);
			$lote_nr = addslashes($_POST['consulta_lote']);
			$contrato_nr = addslashes($_POST['consulta_contrato_nr']);
			$cliente = addslashes($_POST['consulta_cliente']);
			$prop_atual = addslashes($_POST['consulta_situacao']);

			$dados['registros'] = $r->consultaRegistros($id_loteamento, $quadra_nr, $lote_nr, $contrato_nr, $cliente, $prop_atual, $this->empresa['id_empresa']);

		}

		$this->loadTemplate('livro_de_registros', $dados);
	}

	public function loteamentos() {
		$dados = array();
		$dados['usuario'] = $this->usuario;
		$dados['empresa'] = $this->empresa;

		$this->loadTemplate('loteamentos', $dados);
	}
}