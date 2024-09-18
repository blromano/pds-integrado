<?php

require_once 'Conexao.php'; //Não alterar o link da conexão. Lembrando que fica salvo as alterações ;)


class usuariosDAO {

    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;

    function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "usuarios";
    }

    public function queryInsert($dados, $arquivo) {
        try {

            $tipo = 1;
            $cst = $this->conexao->prepare("INSERT INTO $this->tabela " .
                    "(USU_CPF, " .
                    "USU_ENDERECO, " .
                    "USU_SOBRENOME, " .
                    "USU_GENERO, " .
                    "USU_DATA_CADASTRO, " .
                    "USU_DATA_NASCIMENTO, " .
                    "USU_TELEFONE, " .
                    "USU_RECEBER_LEMBRETES, " .
                    "USU_NOME, " .
                    "USU_FOTO, " .
                    "USU_SENHA, " .
                    "USU_EMAIL, " .
                    "USU_TIPO) " .
                    "VALUES " .
                    "(:cpf, " .
                    ":endereco, " .
                    ":USU_SOBRENOME, " .
                    ":genero, " .
                    "now(), " .
                    ":data_nascimento_usu, " .
                    ":telefone, " .
                    ":avisos, " .
                    ":nome, " .
                    ":foto, " .
                    ":senha, " .
                    ":email, " .
                    ":tipo);");
            $cst->bindParam(":cpf", $dados['cpf_usu'], PDO::PARAM_STR);
            $cst->bindParam(":endereco", $dados['endusucadastro'], PDO::PARAM_STR);
            $cst->bindParam(":USU_SOBRENOME", $dados['sobrenomeusucadastro'], PDO::PARAM_STR);
            $cst->bindParam(":genero", $dados['generoeducadastro'], PDO::PARAM_INT);
            $cst->bindParam(":data_nascimento_usu", $dados['datausucadastro'], PDO::PARAM_STR);
            $cst->bindParam(":telefone", $dados['telusucadastro'], PDO::PARAM_STR);
            $cst->bindParam(":avisos", $dados['avisos_usu'], PDO::PARAM_INT);
            $cst->bindParam(":nome", $dados['nomeusucadastro'], PDO::PARAM_STR);
            $cst->bindParam(":foto", $arquivo['foto_usu']['name'], PDO::PARAM_STR);
            $cst->bindParam(":senha", $dados['senhausucadastro'], PDO::PARAM_STR);
            $cst->bindParam(":email", $dados['emailusucadastro'], PDO::PARAM_STR);
            $cst->bindParam(":tipo", $tipo, PDO::PARAM_INT);



            if ($cst->execute()) {
                // Recuperar o ultimo ID inserido no BD
                $ultimo_id = $this->conexao->lastInsertID();
                //Diretorio onde o arquivo vai ser salvo
                $diretorio = '../../../assets/images/' . $ultimo_id . '/' . $arquivo['foto_usu']['name'];


                //Criar a pasta de fotos: ATENÇAO: CADA ID VAI TER UMA PASTA COM SUA IMAGEM...
                mkdir('../../../assets/images/' . $ultimo_id, 0755);


                if (move_uploaded_file($arquivo['foto_usu']['tmp_name'], $diretorio)) {
                    echo "Arquivo válido e enviado com sucesso.\n";
                } else {
                    echo "Possível ataque de upload de arquivo!\n";
                }



                return 'ok';
            } else {
                return 'erro';
            }
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function Verificar_Email($email) {

        $cst = $this->conexao->prepare("SELECT USU_EMAIL from $this->tabela WHERE USU_EMAIL=:USU_EMAIL");
        $cst->bindParam(":USU_EMAIL", $email, PDO::PARAM_STR);



        if ($cst->execute()) {

            $resultado = $cst->fetchAll();
        }

        return (count($resultado) > 0 ? 1 : 0);
    }

    public function Verificar_CPF_Existente($cpf) {

        $cst = $this->conexao->prepare("SELECT USU_CPF from $this->tabela WHERE USU_CPF=:USU_CPF");
        $cst->bindParam(":USU_CPF", $cpf, PDO::PARAM_STR);
        if ($cst->execute()) {

            $resultado = $cst->fetchAll();
        }

        return (count($resultado) > 0 ? 2 : 0);
    }

    public function logarUsuario($dado) {

        try {
            $cst = $this->conexao->prepare("SELECT USU_CODIGO,USU_EMAIL, USU_SENHA,USU_TIPO  from $this->tabela WHERE USU_EMAIL=:USU_EMAIL AND USU_SENHA=:USU_SENHA LIMIT 1");

            $cst->bindParam(":USU_EMAIL", $dado['email_login'], PDO::PARAM_STR);
            $cst->bindParam(":USU_SENHA", $dado['senha_login'], PDO::PARAM_STR);

            $cst->execute();

            if ($cst->rowCount() == 0) { //vai contar quantos registros eu tenho no $cs. Se for igual a 0 o usuario não existe
                session_start();

                $_SESSION['login_incorreto'] = "<div class='alert alert-danger col-md-6' style='margin-left: 25%'>Email ou Senha incorreto!</div>";
                header("location:../../../index.php?mod=usuarios&sub=login");
            } else { // se der certo ele entra aqui
                session_start(); // inicia a sessão
                $resultado = $cst->fetch(); // vai trazer as informações caso o usu existir
                $tipo = $resultado['USU_TIPO']; //Vai pegar o USU_TIPO DO SELECT P FAZER O CONTROLE
                if ($tipo == 1) {/* vai pro usuario */
                    $_SESSION['logado'] = "sim"; // p validar o usuario logado depois
                    $_SESSION['usuario_id'] = $resultado['USU_CODIGO']; // pegar do FETCH o USU_CODIGO
                    header("location:../../../index.php?mod=usuarios&sub=sair");
                    /* vai pra NUTRI */
                } if ($tipo == 2) {
                    $_SESSION['logado'] = "sim";
                    $_SESSION['usuario_id'] = $resultado['USU_CODIGO']; // pegar do FETCH o USU_CODIGO
                    header("location: nutricionista.php");
                } /* vai pra EDF */if ($tipo == 3) {
                    $_SESSION['logado'] = "sim";
                    $_SESSION['usuario_id'] = $resultado['USU_CODIGO']; // pegar do FETCH o USU_CODIGO
                    header("location: educador_fisico.php");
                } 
            }
        } catch (PDOException $ex) {
            return 'error ' . $ex->getMessage();
        }
    }

    public function UsuarioLogado($dado) { //USAR AQUI PARA DAR OS SELECT NAS PAGES...
        $this->codigo_usuario = $dado; //ID DO USUÁRIO
        $cst = $this->conexao->prepare("SELECT * from $this->tabela WHERE USU_CODIGO=:USU_CODIGO");
        $cst->bindParam(":USU_CODIGO", $this->codigo_usuario, PDO::PARAM_INT);
        $cst->execute();
        $resultado = $cst->fetch(); // SALVOU NO ARRAY FETCH- BUSCAR PELO NOME DO CAMPO
        $_SESSION['nome_usuario'] = $resultado['USU_NOME']; // SALVA NA SESSION NOME_USUARIO O NOME DO USUÁRIO.
        
    }

    public function Recuperar_senha($email) {         
        $cst = $this->conexao->prepare("SELECT * from $this->tabela WHERE USU_EMAIL=:USU_EMAIL");
        $cst->bindParam(":USU_EMAIL", $email, PDO::PARAM_STR);
        $cst->execute();
        $rs = $cst->fetch();    
        if ($rs) {
            $_SESSION['nome_recu_senha'] = $rs["USU_NOME"];
            $chave = sha1($rs["USU_CODIGO"] . $rs["USU_SENHA"]);
            return $chave;
        } else {
            return false;
        }
    }
    
    public function CheckChave($email,$chave) { //Checar se a chave do usuário é válida mesmo.         
        $cst = $this->conexao->prepare("SELECT * from $this->tabela WHERE USU_EMAIL=:USU_EMAIL");
        $cst->bindParam(":USU_EMAIL", $email, PDO::PARAM_STR);
        $cst->execute();
        $rs = $cst->fetch(); 
        if ($rs) { //se existir o usuário
            $chaveCorreta = sha1($rs["USU_CODIGO"] . $rs["USU_SENHA"]);
            
            if($chave == $chaveCorreta){
                
                   return $rs["USU_CODIGO"];
            }   
        } else {
            return false;
        }
    }
    public function setNovaSenha($nova_senha,$id) { //Alterar a nova senha do usuário          
        $cst = $this->conexao->prepare("UPDATE $this->tabela SET USU_SENHA=:NOVA_SENHA WHERE USU_CODIGO=:USU_CODIGO");
        $cst->bindParam(":NOVA_SENHA", $nova_senha, PDO::PARAM_STR);
        $cst->bindParam(":USU_CODIGO", $id, PDO::PARAM_INT);       
        $cst->execute();    
    }
    
    
    
    

    public function SairUsuario() {
        session_destroy();
        header("location:../../../index.php");
    }
	
	//funçao que o grupo 7 colocou
	
	 public function pesquisaPorNome($nome) {
        $this->sql = "SELECT * FROM banco_mssj.usuarios where CONCAT(USU_CODIGO,USU_NOME) like '%" . $nome . "%'";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

    public function listarTodos() {
        $this->sql = "SELECT * FROM banco_mssj.usuarios";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

    //FUNÇÃO MOD 4 
    public function selecionarEmail($usucodigo) {
        $this->sql = "SELECT USU_EMAIL,USU_NOME,USU_CODIGO FROM banco_mssj.usuarios WHERE USU_CODIGO=:usucodigo";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(":usucodigo", $usucodigo);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
    

}
