<?php
	
	require_once 'Conexao.php';
	require_once '../../../RECLAME SAO JOAO/MVC/modelo/Usuario.php';
	
	class UsuarioDAO {
	
	private $conexao;
	private $sql;
	private $usuario;
	private $resultado;
	private $tabela;
	
		
	public function __construct()
    {
        $conn = new Conexao();
		$this->conexao = $conn->getConexao();
		$this->tabela = "usuarios";
    }
	
	public function inserirUsuario($usuario)
	{
		$this->usuario = $usuario;		
		$this->sql="insert into $this->tabela (USU_FOTO_PERFIL, USU_DATA_CADASTRO, USU_EMAIL, USU_TELEFONE, USU_SENHA, USU_NOME_COMPLETO) values (:USU_FOTO_PERFIL, :USU_DATA_CADASTRO, :USU_EMAIL, :USU_TELEFONE, :USU_SENHA, :USU_NOME_COMPLETO)";
		$this->resultado = $this->conexao->prepare($this->sql);
		
		
		$this->resultado->bindParam(':USU_FOTO_PERFIL',$this->usuario->getFoto_Perfil());     
		$this->resultado->bindParam(':USU_DATA_CADASTRO',date("Y-m-d",time()));      	
		$this->resultado->bindParam(':USU_EMAIL',$this->usuario->getEmail());
		$this->resultado->bindParam(':USU_TELEFONE',$this->usuario->getTelefone());
		$this->resultado->bindParam(':USU_SENHA',$this->usuario->getSenha());      
		$this->resultado->bindParam(':USU_NOME_COMPLETO',$this->usuario->getNome_completo());   		

        $this->resultado->execute();
		return $this->conexao->lastInsertId();
	}
	public function logarUsuario($usuario){
		$this->usuario = $usuario;		
		$this->sql="SELECT * FROM usuarios WHERE USU_EMAIL = :USU_EMAIL AND USU_SENHA = :USU_SENHA";
		$this->resultado = $this->conexao->prepare($this->sql);
		
		$this->resultado->bindParam(':USU_EMAIL',$this->usuario->getEmail());
		$this->resultado->bindParam(':USU_SENHA',$this->usuario->getSenha());
		
		$this->resultado->execute();


		/*Comando SQL de verificação de autenticação
			$sql = "SELECT * " .
			" FROM cadastrousuarios " .
			" WHERE email = '$email'  " .
			" AND senha = '$senha'";
		*/	
		
		//Caso consiga logar cria a sessão
			if ($this->resultado->rowCount() > 0) {
				// session_start inicia a sessão
				session_start();
				
				$_SESSION['email'] = $email;
				$_SESSION['senha'] = $senha;
				
				
				header('location:mod01-paginaBoasVindasUsuario.php');
			}

		//Caso contrário redireciona para a página de autenticação
			else {
				//Destrói			
				session_destroy();

		
		}

		$conn->close();
	}
	
	/*public function editarUsuario($usuario)
	{
		$this->usuario = $usuario;		
		$this->sql="update $this->tabela set nome=:nome,:sobrenome,:cpf,:cep,:senha,:confirmar_senha,:email,:rua,:bairro,:numero,:complemento,:estado,:cidade,:telefone1,telefone2,data_nascimento,foto_perfil where id=:id";		
		 
		$this->resultado = $this->conexao->prepare($this->sql);
		
		$this->resultado->bindParam(':id',$this->usuario->getId());
		$this->resultado->bindParam(':nome',$this->usuario->getNome());
		$this->resultado->bindParam(':sobrenome',$this->usuario->getSobrenome());
		$this->resultado->bindParam(':cpf',$this->usuario->getcpf());
		$this->resultado->bindParam(':cep',$this->usuario->getcep());
		$this->resultado->bindParam(':senha',$this->usuario->getSenha());
		$this->resultado->bindParam(':confirmar_senha',$this->usuario->getConfirmar_senha());
		$this->resultado->bindParam(':email',$this->usuario->getEmail());
		$this->resultado->bindParam(':rua',$this->usuario->getRua());
		$this->resultado->bindParam(':bairro',$this->usuario->getBairro());
		$this->resultado->bindParam(':numero',$this->usuario->getNumero());
		$this->resultado->bindParam(':complemento',$this->usuario->getComplemento());
		$this->resultado->bindParam(':estado',$this->usuario->getEstado());
		$this->resultado->bindParam(':cidade',$this->usuario->getCidade());
		$this->resultado->bindParam(':telefone1',$this->usuario->getTelefone1());
		$this->resultado->bindParam(':telefone2',$this->usuario->getTelefone2());
		$this->resultado->bindParam(':data_nascimento',$this->usuario->getData_Nascimento());
		$this->resultado->bindParam(':foto_perfil',$this->usuario->getFoto_Perfil());
		

		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function excluirUsuario($usuario)
	{		
		$this->sql="delete from $this->tabela where id=:id";		
		
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':id',$id);
		$this->resultado->bindParam(':nome',$nome);
		$this->resultado->bindParam(':cpf',$cpf);
        $this->resultado->bindParam(':cep',$cep);
		$this->resultado->bindParam(':senha',$senha);
		$this->resultado->bindParam(':confirmar_senha',$confirmar_senha);
		$this->resultado->bindParam(':email',$email);
		$this->resultado->bindParam(':rua',$rua);
		$this->resultado->bindParam(':bairro',$bairro);
        $this->resultado->bindParam(':numero',$numero);
		$this->resultado->bindParam(':complemento',$complemento);
		$this->resultado->bindParam(':estado',$estado);
		$this->resultado->bindParam(':cidade',$cidade);
		$this->resultado->bindParam(':telefone1',$telefone1);
        $this->resultado->bindParam(':telefone2',$telefone2);
        $this->resultado->bindParam(':data_nascimento',$data_nascimento);
		$this->resultado->bindParam(':foto_perfil',$foto_perfil);





		$this->resultado->execute();
		
		return $this->resultado;
	}
	
	public function listarTodos()
	{
		$this->sql="select * from $this->tabela";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();	
	}

	public function pesquisarPorId($id)
	{
		$this->sql="select * from $this->tabela where id=$id";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();	
	}		*/

	}
	   

  
?>

