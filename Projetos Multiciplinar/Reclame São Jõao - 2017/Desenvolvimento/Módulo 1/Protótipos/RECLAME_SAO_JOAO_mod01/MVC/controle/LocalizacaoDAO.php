<?php
	
	require_once 'Conexao.php';
		
	class LocalizacaoDAO {
	
	private $conexao;
	private $sql;
	private $localizacao;
	private $resultado;
	private $tabela;
	
		
	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "localizacoes";
    }
	
	public function inserirLocalizacao($localizacao)
	{
		$this->localizacao = $localizacao;		
		$this->sql="insert into $this->tabela (LOC_RUA, LOC_BAIRRO, LOC_CEP, LOC_ESTADO, LOC_CIDADE) values (:LOC_RUA, :LOC_BAIRRO, :LOC_CEP, :LOC_ESTADO, :LOC_CIDADE)";
		$this->resultado = $this->conexao->prepare($this->sql);
		
		
		$this->resultado->bindParam(':LOC_RUA',$this->localizacao->getRua());     
		$this->resultado->bindParam(':LOC_BAIRRO',$this->localizacao->getBairro());     
		$this->resultado->bindParam(':LOC_CEP',$this->localizacao->getCep());     
		$this->resultado->bindParam(':LOC_ESTADO',$this->localizacao->getEstado());     
		$this->resultado->bindParam(':LOC_CIDADE',$this->localizacao->getCidade());     
        $this->resultado->execute();
		return $this->conexao->lastInsertId();
        
		
		
	}
	}
?>