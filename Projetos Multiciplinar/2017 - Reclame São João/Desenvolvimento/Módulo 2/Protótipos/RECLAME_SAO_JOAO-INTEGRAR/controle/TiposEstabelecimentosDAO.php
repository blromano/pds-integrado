
<?php
require_once 'Conexao.php';

class TiposEstabelecimentosDAO

{
	private $conexao;
	private $sql;
	private $tiposestabelecimentos;
	private $resultado;
	private $tabela;
	private $id;
	public function __construct()
	{
		$conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "tipos_estabelecimentos";
	}
	
	public function inserir($tiposestabelecimentos)
	{
		$this->tiposestabelecimentos = $tiposestabelecimentos;
		$this->sql = "insert into $this->tabela (TES_CATEGORIA) values (:categoria)";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':categoria', $this->tiposestabelecimentos->getTIP_NOME());
		$this->resultado->execute();
		return $this->resultado;
	}
	
	public function editar($up, $id)
	{
		$this->tiposestabelecimentos = $up;
		$this->id = $id;
		$this->sql = "update $this->tabela set TES_CATEGORIA=:categoria where TES_ID=:id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':id', $this->id->getTIP_ID());
		$this->resultado->bindParam(':categoria', $this->tiposestabelecimentos->getTIP_NOME());
		$this->resultado->execute();
		return $this->resultado;
	}
	
	public function excluir($id)
	{
		$this->sql = "DELETE FROM $this->tabela where TES_ID=:id";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':id', $id);
		try {
			$this->resultado->execute();
			$_SESSION["Modal"] = ["Tipos de Estabelecimentos","Estabelecimento deletado com sucesso!"];
			header("location: ../../../../admin.php?pagina=10");
		}
		catch(PDOException $e) {
			$_SESSION["Modal"] = ["Tipos de Estabelecimentos","Erro ao deletar. Tipo de estabelecimento já está em uso!"];
			header("location: ../../../../admin.php?pagina=10");
		}
		return $this->resultado;
	}
	
	public function pesquisar_igual($nome)
	{
		$this->tiposestabelecimentos = $nome;
		$this->sql = "select * from $this->tabela WHERE TES_CATEGORIA=:categoria";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':categoria', $this->tiposestabelecimentos);
		$this->resultado->execute();
		if (($this->resultado->rowCount()) > 0) {
			return 1;
		}
		else {
			return 0;
		}
	}
	
	public function listar()
	{
		$this->sql = "select * from $this->tabela";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}
	
	public function listarTodos()
	{
		$this->sql = "select * from $this->tabela";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}
	
	public function listarTipoEstSelecionado($id)
	{
		$this->sql = "select * from $this->tabela INNER JOIN estabelecimentos ON (tipos_estabelecimentos.TES_ID = estabelecimentos.TES_ID) WHERE estabelecimentos.USU_ID = '$id'";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}
}
?>