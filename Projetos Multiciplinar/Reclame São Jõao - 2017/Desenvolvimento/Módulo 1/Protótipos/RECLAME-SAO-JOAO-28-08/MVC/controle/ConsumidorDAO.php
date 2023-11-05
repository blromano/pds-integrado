	<?php
	
	require_once 'Conexao.php';
	
	class ConsumidorDAO {
	
	private $conexao;
	private $sql;
	private $consumidor;
	private $resultado;
	private $tabela;
	
		
	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "consumidores";
    }
	
	public function inserirConsumidor($consumidor)
	{
		$this->consumidor = $consumidor;		
		$this->sql="insert into $this->tabela 
		(CON_NUMERO, CON_CADASTRO_VALIDADO, CON_DATA_HORA_EMAIL_VALIDACAO, CON_COMPLEMENTO, CON_STATUS_BLOQUEIO, CON_TELEFONE2, CON_DATA_NASCIMENTO,CON_CPF, CON_STATUS_ATIVIDADE, USU_ID, LOC_ID) values 
		(:CON_NUMERO, 0, :CON_DATA_HORA_EMAIL_VALIDACAO, :CON_COMPLEMENTO, 0, :CON_TELEFONE2, :CON_DATA_NASCIMENTO, :CON_CPF, 1, :USU_ID, :LOC_ID)";
		$this->resultado = $this->conexao->prepare($this->sql);
		
		$this->resultado->bindParam(':CON_NUMERO',$this->consumidor->getNumero());     
		//$this->resultado->bindParam(':CON_CADASTRO_VALIDADO',1);    
        date_default_timezone_set('America/Sao_Paulo');		
		$dataAtual = time();
		$this->resultado->bindParam(':CON_DATA_HORA_EMAIL_VALIDACAO',date("Y-m-d H:i:s",$dataAtual));         
		$this->resultado->bindParam(':CON_COMPLEMENTO',$this->consumidor->getComplemento());     
		//$this->resultado->bindParam(':CON_STATUS_BLOQUEIO','0');     
		$this->resultado->bindParam(':CON_TELEFONE2',$this->consumidor->getTelefone2());     
		$this->resultado->bindParam(':CON_DATA_NASCIMENTO',$this->consumidor->getData_nascimento());     
		$this->resultado->bindParam(':CON_CPF',$this->consumidor->getCPF());     
		//$this->resultado->bindParam(':CON_STATUS_ATIVIDADE',$this->consumidor->getStatusAtividade()); 
		$this->resultado->bindParam(':USU_ID',$this->consumidor->getIdUsuario());     
		$this->resultado->bindParam(':LOC_ID',$this->consumidor->getIdLocalizacao());       

       $this->resultado->execute();
	   return $this->conexao->lastInsertId();
	}
	
	public function ativarCadastro($idUsuario){
				
		$this->sql="UPDATE CONSUMIDORES SET CON_CADASTRO_VALIDADO = 1 WHERE USU_ID = :ID_USUARIO";
		$this->resultado = $this->conexao->prepare($this->sql);		
		$this->resultado->bindParam(':ID_USUARIO',$idUsuario);
		$this->resultado->execute();
		
	}
	
	
	}
?>