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
		$l = new Loteamentos();
		$dados['loteamentos'] = $l->consultaLoteamentos($this->empresa['id_empresa']);

		if (isset($_POST['loteamento']) && !empty($_POST['loteamento'])) {

			$id_loteamento = addslashes($_POST['loteamento']);
			$quadra_nr = addslashes($_POST['quadra']);
			$lote_nr = addslashes($_POST['lote']);
			$contrato_nr = addslashes($_POST['contrato_nr']);
			$cliente = addslashes($_POST['cliente']);
			$prop_atual = addslashes($_POST['situacao']);

			if (!empty($quadra_nr) && !empty($lote_nr) && !empty($contrato_nr) && !empty($cliente)) {

				if($r->inserirRegistro($id_loteamento, $quadra_nr, $lote_nr, $contrato_nr, $cliente, $prop_atual, $this->empresa['id_empresa'])) {
					$dados['reg_insert'] = "Registro Inserido com Sucesso!";
					$dados['alert_class'] = "alert-primary";
				}
				
			} else {
				$dados['reg_insert'] = "Preencha todos os campos!";
				$dados['alert_class'] = "alert-danger";
			}
		}

		if (isset($_POST['consulta_loteamento']) && !empty($_POST['consulta_loteamento']) ||
			isset($_POST['consulta_quadra']) && !empty($_POST['consulta_quadra']) ||
			isset($_POST['consulta_lote']) && !empty($_POST['consulta_lote']) ||
			isset($_POST['consulta_contrato_nr']) && !empty($_POST['consulta_contrato_nr']) ||
			isset($_POST['cliente_id_consulta']) && !empty($_POST['cliente_id_consulta']) ||
			isset($_POST['consulta_situacao']) && !empty($_POST['consulta_situacao'])) {
			$id_loteamento = addslashes($_POST['consulta_loteamento']);
			$quadra_nr = addslashes($_POST['consulta_quadra']);
			$lote_nr = addslashes($_POST['consulta_lote']);
			$contrato_nr = addslashes($_POST['consulta_contrato_nr']);
			$cliente = addslashes($_POST['cliente_id_consulta']);
			$prop_atual = addslashes($_POST['consulta_situacao']);

			$dados['registros'] = $r->consultaRegistros($id_loteamento, $quadra_nr, $lote_nr, $contrato_nr, $cliente, $prop_atual, $this->empresa['id_empresa']);

		}

		$this->loadTemplate('livro_de_registros', $dados);
	}

	public function loteamentos() {
		$dados = array();
		$dados['usuario'] = $this->usuario;
		$dados['empresa'] = $this->empresa;
		$l = new Loteamentos();

		if (isset($_POST['loteamento']) && !empty($_POST['loteamento'])) {
			$loteamento = addslashes($_POST['loteamento']);
			$endereco = addslashes($_POST['endereco']);
			$registro_cri = addslashes($_POST['registro_cri']);
			$nome_cri = addslashes($_POST['nome_cri']);
			$data_reg_cri = addslashes($_POST['data_reg_cri']);
			$endereco_cri = addslashes($_POST['endereco_cri']);
			$registro_prefeitura = addslashes($_POST['registro_prefeitura']);
			$nome_prefeitura = addslashes($_POST['nome_prefeitura']);
			$data_reg_prefeitura = addslashes($_POST['data_reg_prefeitura']);
			$obs_loteamento = addslashes($_POST['obs_loteamento']);

			if($l->inserirLoteamento($loteamento, $endereco, $registro_cri, $nome_cri, $data_reg_cri, $endereco_cri, $registro_prefeitura, $nome_prefeitura, $data_reg_prefeitura, $obs_loteamento, $this->empresa['id_empresa'])) {

				$dados['reg_insert'] = "Registro Inserido com Sucesso!";
				$dados['alert_class'] = "alert-primary";
			} else {
				$dados['reg_insert'] = "Registro Não Inserido!";
				$dados['alert_class'] = "alert-danger";	
			}
		}

		$dados['loteamentos'] = $l->consultaLoteamentos($this->empresa['id_empresa']);
		$this->loadTemplate('loteamentos', $dados);
	}

	public function autocompleteClientes() {
		$dados = array();
		$c = new Clientes();

		if (isset($_GET['q']) && !empty($_GET['q'])) {
			$q = addslashes($_GET['q']);

			$clientes = $c->consultaClientesAutocomplete($q, $this->empresa['id_empresa']);

			foreach ($clientes as $i) {
				$dados[] = array(
					'nome' => $i['nome'],
					'id' => $i['id']
				);
			}
		}
		echo json_encode($dados);
	}
}