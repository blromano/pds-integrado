<?php
	
	require_once 'Conexao.php';
	
	class ContatoDAO 
		{
	
			private $conexao;
			private $sql;
			private $contato;
			private $resultado;
			private $tabela;
		
			
			public function __construct()
				{
					$conn = new Conexao();
					$this->conexao = $conn->getConexao();
					$this->tabela = "contatos";
				}
		
			public function inserirContato($contato)
				{
					$this->contato = $contato;		
					$this->sql="insert into $this->tabela 
					(CNT_TITULO, CNT_DATA_HORA_ENVIO, CNT_DESCRICAO, CNT_RESPONDIDO, CNT_NOME, CNT_EMAIL) values 
					(:CNT_TITULO, :CNT_DATA_HORA_ENVIO, :CNT_DESCRICAO, 0, :CNT_NOME, :CNT_EMAIL)";
					$this->resultado = $this->conexao->prepare($this->sql);
					
					$this->resultado->bindValue	(':CNT_TITULO',$this->contato->getCNT_TITULO());       
					date_default_timezone_set('America/Sao_Paulo');		
					$dataAtual = time();
					$this->resultado->bindValue(':CNT_DATA_HORA_ENVIO',date("Y-m-d H:i:s",$dataAtual));         
					$this->resultado->bindValue(':CNT_DESCRICAO',$this->contato->getCNT_DESCRICAO());         
					//$this->resultado->bindValue(':CNT_DATA_HORA_RESPOSTA',$this->contato->getCNT_DATA_HORA_RESPOSTA());        
					//$this->resultado->bindValue(':CNT_RESPOSTA_ADM',$this->contato->getCNT_RESPOSTA_ADM());     
					//$this->resultado->bindValue(':CNT_RESPONDIDO',$this->contato->getCNT_RESPONDIDO());
					//$this->resultado->bindValue(':ADM_ID',$this->contato->getADM_ID());           
					$this->resultado->bindValue(':CNT_NOME',$this->contato->getCNT_NOME());       
					$this->resultado->bindValue(':CNT_EMAIL',$this->contato->getCNT_EMAIL());       

				    $this->resultado->execute();
				    return $this->conexao->lastInsertId();
				}
		
			public function listarTodos() 
				{
					$this->sql = "select * from contatos";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}
		
			public function listarPendentes() 
				{
					$this->sql = "select * from contatos where CNT_RESPONDIDO = 0";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();	
				}
				
			public function listarRespondidas() 
				{
					$this->sql = "select * from contatos where CNT_RESPONDIDO = 1 order by CNT_DATA_HORA_RESPOSTA desc";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();	
				}
		
			public function editarADM($resposta) 
				{
					$this->sql = "UPDATE $this->tabela SET CNT_DATA_HORA_RESPOSTA=:CNT_DATA_HORA_RESPOSTA, CNT_RESPOSTA_ADM=:CNT_RESPOSTA_ADM, CNT_RESPONDIDO=:CNT_RESPONDIDO WHERE CNT_ID=:CNT_ID";
					$this->resultado = $this->conexao->prepare($this->sql);
					date_default_timezone_set('America/Sao_Paulo');		
					$dataAtual = time();	
					$respondido = 1;
					$this->resultado->bindParam(':CNT_DATA_HORA_RESPOSTA',date("Y-m-d H:i:s",$dataAtual));
					$this->resultado->bindParam(':CNT_RESPOSTA_ADM',$resposta['resposta']);
					$this->resultado->bindParam(':CNT_RESPONDIDO',$respondido);
					$this->resultado->bindParam(':CNT_ID',$resposta['cnt_id']);
					
					$this->resultado->execute();
					return $this->resultado;
				}
			
			/*
			public function SelecionarPorId($id)
				{

					$this->sql = "select * from $this->tabela where CNT_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					foreach ($this->resultado->fetchAll() as $linha_consumidor)
					{
						
					}
						return $linha_consumidor['USU_ID'];
				}
			*/
				
			/*
			public function pesquisarPorId($id) 
				{
					$this->sql = "select * from $this->tabela where USU_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					return $this->resultado->fetchAll();
				}
			*/
				
			/*
			public function retornar_ADM_ID($id)
				{

					$this->sql = "select * from $this->tabela where CNT_ID=$id";
					$this->resultado = $this->conexao->prepare($this->sql);
					$this->resultado->execute();
					foreach ($this->resultado->fetchAll() as $linha){
					}
					return $linha['ADM_ID'];
					# code...
				}
			*/
                                
                                
                             
//  mod 05 adm
                                
                                
    public function listarTudo() {
            $this->sql = "select * from $this->tabela order by CNT_ID desc";
            $this->resultado = $this->conexao->prepare($this->sql);
            $this->resultado->execute();
            return $this->resultado->fetchAll();
        }
    
                                
     public function excluirmensagem($id) {
        $this->sql = "delete from $this->tabela where CNT_ID=:id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $id);
        try {
            $this->resultado->execute();
            echo "<script>alert('Mensagem deletado com sucesso!')</script><script>window.location='../../../../admin.php?pagina=12';</script>";
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao deletar. Mensagem!')</script><script>window.location='../../../../admin.php?pagina=12';</script>";
        }

        return $this->resultado;
    }                    
                   
    
    public function editarADM2($id,$resposta) 
            {
                    
                    $this->sql = "UPDATE $this->tabela SET CNT_RESPOSTA_ADM=:CNT_RESPOSTA_ADM WHERE CNT_ID=:CNT_ID";
                    $this->resultado = $this->conexao->prepare($this->sql);
                   
                    $this->resultado->bindParam(':CNT_RESPOSTA_ADM',$resposta);
                    
                    $this->resultado->bindParam(':CNT_ID',$id);

                   try {
            $this->resultado->execute();
            //echo "<script>alert(' com sucesso!')</script><script>window.location='../../../../admin.php?pagina=12';</script>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
           // echo "<script>alert('Erro ao deletar. Mensagem!')</script><script>window.location='../../../../admin.php?pagina=12';</script>";
        }
                    return $this->resultado;
            }
            
    public function obterDadosContatoParaEmail($rec_id) 
                        {
                                $this->sql = "select
                                CNT_NOME,
                                CNT_EMAIL,
                                CNT_TITULO
                                from CONTATOS                                
                                where CNT_ID = $rec_id";
                                $this->resultado = $this->conexao->prepare($this->sql);
                                $this->resultado->execute();
                                return $this->resultado->fetch(PDO::FETCH_ASSOC);
                        }
                 
		}
?>