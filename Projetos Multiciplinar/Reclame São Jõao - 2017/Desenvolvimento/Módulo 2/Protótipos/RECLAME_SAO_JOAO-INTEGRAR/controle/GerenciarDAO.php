<?php
	session_start();
require_once 'Conexao.php';

class ReclamacaoDAO {

	private $conexao;
	private $sql;
	private $post;
	private $resultado;
	private $tabela;

	public function __construct() 
	{
		$conn = new Conexao();
		$this->conexao = $conn->getConexao();
	}
	public function usuarioNome() 
	{
		$usu_id = 2;
		$this->sql = "SELECT USU_NOME FROM USUARIOS WHERE USU_ID=$usu_id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$nome = $this->resultado->fetchColumn();
		return $nome;
	}
	public function consumidorID() 
	{
		$usu_id = 2;
		$this->sql = "SELECT CON_ID FROM CONSUMIDORES WHERE USU_ID=$usu_id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		$conid = $this->resultado->fetchColumn();
		return $conid;
	}

}

	

?>

