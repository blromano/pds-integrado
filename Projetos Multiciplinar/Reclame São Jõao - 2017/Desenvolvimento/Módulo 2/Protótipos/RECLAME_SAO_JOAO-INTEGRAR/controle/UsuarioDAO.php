<?php

require_once 'Conexao.php';
// require_once('../modelo/Usuario.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '\RECLAME_SAO_JOAO-INTEGRAR\modelo\Usuario.php');


class UsuarioDAO 
{
	
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
		$this->sql="insert into $this->tabela (USU_FOTO_PERFIL, USU_DATA_CADASTRO, USU_EMAIL, USU_TELEFONE, USU_SENHA, USU_NOME, USU_CADASTRO_VALIDADO) values (:USU_FOTO_PERFIL, :USU_DATA_CADASTRO, :USU_EMAIL, :USU_TELEFONE, :USU_SENHA, :USU_NOME, 0)";
		$this->resultado = $this->conexao->prepare($this->sql);


		$this->resultado->bindValue(':USU_FOTO_PERFIL','adasd');     
		$this->resultado->bindValue(':USU_DATA_CADASTRO',date("Y-m-d",time()));      	
		$this->resultado->bindValue(':USU_EMAIL',$this->usuario->getUSU_EMAIL());
		$this->resultado->bindValue(':USU_TELEFONE',$this->usuario->getUSU_TELEFONE());
		$this->resultado->bindValue(':USU_SENHA',$this->usuario->getUSU_SENHA());      
		$this->resultado->bindValue(':USU_NOME',$this->usuario->getUSU_NOME());   		

		$this->resultado->execute();
		return $this->conexao->lastInsertId();

	}

	public function cadastroValidado($id)
	{
		
		$this->sql="select * from $this->tabela where USU_ID=$id and usu_cadastro_validado=1";
		$this->resultado= $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return count($this->resultado->fetchAll());	
	}

	public function logarUsuario($usuario)
	{

		$this->usuario = $usuario;		
		$this->sql="SELECT * FROM USUARIOS WHERE USU_EMAIL = :USU_EMAIL AND USU_SENHA = :USU_SENHA;";	

		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindParam(':USU_EMAIL',$this->usuario->getUSU_EMAIL());
		$this->resultado->bindParam(':USU_SENHA',$this->usuario->getUSU_SENHA());

		$this->resultado->execute();

				//Caso consiga logar cria a sessão
		if ($this->resultado->rowCount() > 0) 
		{
						// session_start inicia a sessão

			if (session_status() == PHP_SESSION_NONE) 
			{
				session_start();
			}

			$_SESSION['USU_EMAIL'] = $this->usuario->getUSU_EMAIL();
			$_SESSION['USU_SENHA'] = $this->usuario->getUSU_SENHA();


			$usrLogado = $this->pesquisarPorEmailObj($_SESSION['USU_EMAIL']);


			if ($this->buscarAdmin($usrLogado->getUSU_ID())>0) 
			{
				header('location:../../usu_paginaBoasVindasUsuario.php');
			}
			else if ($this->buscarEstabelecimento($usrLogado->getUSU_ID())>0) 
			{
							// echo "ESTABELECIMENTO ENCONTRADO!";
				$validado = $this->cadastroValidado($usrLogado->getUSU_ID());
				// echo $validado;
				if ($validado){
			
						// echo "CADASTRO VALIDADO";

					header('location:../../usu_paginaBoasVindasUsuario.php');
				}else{
//Destrói a Sessão			
					session_destroy();
								//Váriavel global recebendo a mensagem de erro
					session_start();
					$_SESSION['loginErro'] = "<br><br>Lembre-se de validar seu cadastro em seu e-mail!";
					header('location:../../usu_loginUsuario.php');
				}
			}else{


				if ($this->cadastroValidado($usrLogado->getUSU_ID())>0) 
				{
					header('location:../../usu_paginaBoasVindasUsuario.php');
				}
				else
				{
								//Destrói a Sessão			
					session_destroy();
								//Váriavel global recebendo a mensagem de erro
					session_start();
					$_SESSION['loginErro'] = "<br><br>Lembre-se de validar seu cadastro em seu e-mail!";
					header('location:../../usu_loginUsuario.php');
				}
			}


		}
		else
		{
			echo "string";
						//Destrói a Sessão			
			session_destroy();

						//Váriavel global recebendo a mensagem de erro
			session_start();
			$_SESSION['loginErro'] = "Usuário e/ou senha Inválido(s)";
			header('location:../../usu_loginUsuario.php');
		}

		$this->conexao = null;
	}

	public function logarEstabelecimento($usuario)
	{
		$this->usuario = $usuario;		
		$this->sql="SELECT usu.USU_ID, usu.USU_NOME, USU.USU_EMAIL, USU.USU_SENHA FROM usuarios as USU
		INNER JOIN estabelecimentos AS EST ON (EST.USU_ID = USU.USU_ID)
		WHERE usu.USU_EMAIL = :USU_EMAIL AND 
		usu.USU_SENHA = :USU_SENHA;";	

		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindValue(':USU_EMAIL',$this->usuario->getUSU_EMAIL());
		$this->resultado->bindValue(':USU_SENHA',$this->usuario->getUSU_SENHA());

		$this->resultado->execute();

				//Caso consiga logar cria a sessão
		if ($this->resultado->rowCount() > 0) 
		{
						// session_start inicia a sessão
			session_start();

			$_SESSION['USU_EMAIL'] = $this->usuario->getUSU_EMAIL();
			$_SESSION['USU_SENHA'] = $this->usuario->getUSU_SENHA();


			header('location:../../est_boas-vindas.php');
		}

				//Caso contrário redireciona para a página de autenticação
		else 
		{
						//Destrói			
						//session_destroy();
						//Váriavel global recebendo a mensagem de erro
			session_start();
			$_SESSION['loginErro'] = "Usuário e/ou senha Inválido(s) <br><br>Lembre-se de validar seu cadastro em seu e-mail!";
			header('location:../../usu_loginUsuario.php');
		}

		$this->conexao = null;
	}

	public function buscarUsuario($email)
	{
		$idUsuarioBusca = NULL;	

		$this->sql="SELECT USU_ID FROM usuarios WHERE USU_EMAIL = :USU_EMAIL";
		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindValue(':USU_EMAIL',$email);

		$this->resultado->execute();
		$resultado = $this->resultado->fetchAll();

		if ($this->resultado->rowCount() > 0) 
		{
			foreach($resultado as $linha) 
			{
				$idUsuarioBusca = $linha['USU_ID'];
			}	
		}

		return $idUsuarioBusca;
	}
	
	public function buscarUsuarioNome($email)
	{
		$idUsuarioBusca = NULL;	

		$this->sql="SELECT USU_NOME FROM usuarios WHERE USU_EMAIL = :USU_EMAIL";
		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->bindValue(':USU_EMAIL',$email);

		$this->resultado->execute();
		$resultado = $this->resultado->fetchAll();

		if ($this->resultado->rowCount() > 0) 
		{
			foreach($resultado as $linha) 
			{
				$idUsuarioBusca = $linha['USU_NOME'];
			}	
		}

		return $idUsuarioBusca;
	}

	public function alterarSenha($USU_NOVA_SENHA, $idUsuario)
	{
		$this->sql="UPDATE USUARIOS SET USU_SENHA ='$USU_NOVA_SENHA' WHERE USU_ID = $idUsuario";
		$this->resultado = $this->conexao->prepare($this->sql);

		$this->resultado->execute();
			//$resultado = $this->resultado->fetchAll();

	}
/*
		public function editarUsuario($usuario)
			{
				$this->usuario = $usuario;		
				$this->sql="update $this->tabela set nome=:nome,:sobrenome,:cpf,:cep,:senha,:confirmar_senha,:email,:rua,:bairro,:numero,:complemento,:estado,:cidade,:telefone1,telefone2,data_nascimento,foto_perfil where id=:id";		
				 
				$this->resultado = $this->conexao->prepare($this->sql);
				
				$this->resultado->bindValue(':id',$this->usuario->getId());
				$this->resultado->bindValue(':nome',$this->usuario->getNome());
				$this->resultado->bindValue(':sobrenome',$this->usuario->getSobrenome());
				$this->resultado->bindValue(':cpf',$this->usuario->getcpf());
				$this->resultado->bindValue(':cep',$this->usuario->getcep());
				$this->resultado->bindValue(':senha',$this->usuario->getSenha());
				$this->resultado->bindValue(':confirmar_senha',$this->usuario->getConfirmar_senha());
				$this->resultado->bindValue(':email',$this->usuario->getEmail());
				$this->resultado->bindValue(':rua',$this->usuario->getRua());
				$this->resultado->bindValue(':bairro',$this->usuario->getBairro());
				$this->resultado->bindValue(':numero',$this->usuario->getNumero());
				$this->resultado->bindValue(':complemento',$this->usuario->getComplemento());
				$this->resultado->bindValue(':estado',$this->usuario->getEstado());
				$this->resultado->bindValue(':cidade',$this->usuario->getCidade());
				$this->resultado->bindValue(':telefone1',$this->usuario->getTelefone1());
				$this->resultado->bindValue(':telefone2',$this->usuario->getTelefone2());
				$this->resultado->bindValue(':data_nascimento',$this->usuario->getData_Nascimento());
				$this->resultado->bindValue(':foto_perfil',$this->usuario->getFoto_Perfil());
				

				$this->resultado->execute();
				
				return $this->resultado;
			}
	
		public function excluirUsuario($usuario)
			{		
				$this->sql="delete from $this->tabela where id=:id";		
				
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->bindValue(':id',$id);
				$this->resultado->bindValue(':nome',$nome);
				$this->resultado->bindValue(':cpf',$cpf);
				$this->resultado->bindValue(':cep',$cep);
				$this->resultado->bindValue(':senha',$senha);
				$this->resultado->bindValue(':confirmar_senha',$confirmar_senha);
				$this->resultado->bindValue(':email',$email);
				$this->resultado->bindValue(':rua',$rua);
				$this->resultado->bindValue(':bairro',$bairro);
				$this->resultado->bindValue(':numero',$numero);
				$this->resultado->bindValue(':complemento',$complemento);
				$this->resultado->bindValue(':estado',$estado);
				$this->resultado->bindValue(':cidade',$cidade);
				$this->resultado->bindValue(':telefone1',$telefone1);
				$this->resultado->bindValue(':telefone2',$telefone2);
				$this->resultado->bindValue(':data_nascimento',$data_nascimento);
				$this->resultado->bindValue(':foto_perfil',$foto_perfil);

				$this->resultado->execute();
				
				return $this->resultado;
			}
*/

			public function inserirADM($usuario) 
			{
				$this->usuario = $usuario;		
				$this->sql = "INSERT INTO $this->tabela (USU_NOME, USU_DATA_CADASTRO, USU_EMAIL, USU_TELEFONE, USU_SENHA) values (:USU_NOME, :USU_DATA_CADASTRO, :USU_EMAIL, :USU_TELEFONE, :USU_SENHA)";
				$this->resultado = $this->conexao->prepare($this->sql);
				
				$this->resultado->bindValue(':USU_NOME',$this->usuario->getUSU_NOME());      
				$this->resultado->bindValue(':USU_DATA_CADASTRO',date("Y-m-d H:i:s",time()));      	
				$this->resultado->bindValue(':USU_EMAIL',$this->usuario->getUSU_EMAIL());
				$this->resultado->bindValue(':USU_TELEFONE',$this->usuario->getUSU_TELEFONE());
				$this->resultado->bindValue(':USU_SENHA',$this->usuario->getUSU_SENHA());      

				$this->resultado->execute();
				return $this->conexao->lastInsertId();
			}

			public function editarADM($usuario) 
			{
				$this->usuario = $usuario;
				$this->sql = "UPDATE $this->tabela SET USU_NOME=:nome,USU_EMAIL=:email,USU_TELEFONE=:telefone WHERE USU_ID=:id";
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->bindValue(':nome',$this->usuario->getUSU_NOME());
				$this->resultado->bindValue(':email',$this->usuario->getUSU_EMAIL());
				$this->resultado->bindValue(':telefone',$this->usuario->getUSU_TELEFONE());
				$this->resultado->bindValue(':id',$this->usuario->getUSU_ID());
				$this->resultado->execute();
				return $this->resultado;
			}

			public function excluirADM($id) 
			{
				$this->sql="DELETE FROM $this->tabela where USU_ID=:id";		
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->bindValue(':id',$id);
				$this->resultado->execute();
			}

			public function listarADM() 
			{
				$this->sql = "SELECT * FROM $this->tabela";
				$this->resultado= $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				return $this->resultado->fetchAll();
			}

			public function emailEmUsoADM($usuario) 
			{
				$this->usuario = $usuario;
				$this->sql = "SELECT * FROM $this->tabela WHERE USU_EMAIL=:email AND USU_ID != :id";
				$this->resultado = $this->conexao->prepare($this->sql);
				$this->resultado->bindValue(':email', $this->usuario->getUSU_EMAIL());
				$this->resultado->bindValue(':id', $this->usuario->getUSU_ID());
				$this->resultado->execute();
				if (($this->resultado->rowCount()) > 0) {
					return true;
				} else {
					return false;
				}
			}

			public function salvar_senha($post) 
			{
				$this->post = $post;
				$this->sql = "update $this->tabela set USU_SENHA =:USU_SENHA where USU_ID =:USU_ID";

				$this->resultado = $this->conexao->prepare($this->sql);
				
				$this->resultado->bindValue(':USU_ID',$this->post->getIdUsuario());
				$this->resultado->bindValue(':USU_SENHA',$this->post->getSenha_nova());

				$this->resultado->execute();

				return $this->resultado;
			}
			
			public function editarInformacoesPessoais($post) 
			{
				$this->post = $post;
				$this->sql = "update $this->tabela set USU_NOME =:USU_NOME, USU_EMAIL =:USU_EMAIL where USU_ID =:USU_ID";

				$this->resultado = $this->conexao->prepare($this->sql);
				
				$this->resultado->bindValue(':USU_NOME', $this->post->getUSU_NOME());
				$this->resultado->bindValue(':USU_EMAIL', $this->post->getUSU_EMAIL());
				$this->resultado->bindValue(':USU_ID', $this->post->getUSU_ID());

				$this->resultado->execute();

				return $this->resultado;
			}

			public function pesquisarPorId($id)
			{
				$this->sql="select * from $this->tabela where USU_ID=$id";
				$this->resultado= $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				return $this->resultado->fetchAll();	
			}
			
			public function pesquisarPorEmail($email)
			{
				$this->sql="select * from $this->tabela where USU_NOME=$email";
				$this->resultado= $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				return $this->resultado->fetchAll();	
			}

			public function pesquisarPorEmailObj($email)
			{
				$this->sql="select * from $this->tabela where USU_EMAIL='$email'";
				$this->resultado= $this->conexao->prepare($this->sql);
				ini_set('memory_limit', '-1');
				$this->resultado->execute();
				$rec = new Usuario();
				foreach ($this->resultado->fetchAll() as $linha){
					$rec->setUSU_ID($linha['USU_ID']);
					$rec->setUSU_NOME($linha['USU_NOME']);
					$rec->setUSU_EMAIL($linha['USU_EMAIL']);
					$rec->setUSU_SENHA($linha['USU_SENHA']);
				}
				$_SESSION['usr'] = $rec;
				return $rec;	
			}

			public function verificarUsuario($email)
			{
				$usr = new Usuario();
				$usr=$this->pesquisarPorEmailObj($email);

				$id = $usr->getUSU_ID();

				if ($this->buscarEstabelecimento($id)>0) {
					# code...
					return 'est';
					
				}elseif ($this->buscarAdmin($id)>0) {
					# code...
					return 'adm';
				}else{
					return 'usr';
				}
			}

			public function buscarEstabelecimento($id)
			{
				$this->sql="select * from estabelecimentos where USU_ID=$id";
				$this->resultado= $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				return count($this->resultado->fetchAll());	
			}

			public function buscarAdmin($id)
			{
				$this->sql="select * from administradores where USU_ID=$id";
				$this->resultado= $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				return count($this->resultado->fetchAll());
			}

			public function listarTodos()
			{
				$this->sql="select * from $this->tabela";
				$this->resultado= $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				return $this->resultado->fetchAll();	
			}

			public function verificar_email($emailPostado)
			{
				$this->sql="select * from $this->tabela WHERE USU_EMAIL = '$emailPostado'";
				$this->resultado= $this->conexao->prepare($this->sql);
				$this->resultado->execute();
				return $this->resultado->rowCount();
			}
			
			public function ativarCadastro($idUsuario)
			{
				
				$this->sql="update $this->tabela set USU_CADASTRO_VALIDADO = 1 WHERE USU_ID = :ID_USUARIO";
				$this->resultado = $this->conexao->prepare($this->sql);		
				$this->resultado->bindParam(':ID_USUARIO',$idUsuario);
				$this->resultado->execute();	
			}
			
		}
		?>

