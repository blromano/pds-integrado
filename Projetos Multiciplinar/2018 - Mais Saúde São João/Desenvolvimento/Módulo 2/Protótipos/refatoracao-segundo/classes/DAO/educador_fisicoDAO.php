<?php

require_once 'Conexao.php';

class educador_fisicoDAO {

    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;
    private $tabela_educador;

    function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabelausuario = "usuarios";
        $this->tabela_educador = "educadores_fisicos";
    }

    public function queryInsert($dados, $arquivo) {
        try {
            $tipo = 3;
            $cst = $this->conexao->prepare("INSERT INTO $this->tabelausuario " .
                    "(USU_CPF, " .
                    "USU_ENDERECO, " .
                    "USU_SOBRENOME, " .
                    "USU_GENERO, " .
                    "USU_DATA_CADASTRO, " .
                    "USU_DATA_NASCIMENTO, " .
                    "USU_TELEFONE, " .
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
                    ":nome, " .
                    ":foto, " .
                    ":senha, " .
                    ":email, " .
                    ":tipo);");
            $cst->bindParam(":cpf", $dados['cpf_edf'], PDO::PARAM_STR);
            $cst->bindParam(":endereco", $dados['end_edf'], PDO::PARAM_STR);
            $cst->bindParam(":USU_SOBRENOME", $dados['sobrenome_edf'], PDO::PARAM_STR);
            $cst->bindParam(":genero", $dados['genero_edf'], PDO::PARAM_INT);
            $cst->bindParam(":data_nascimento_usu", $dados['data_edf'], PDO::PARAM_STR);
            $cst->bindParam(":telefone", $dados['tel_edf'], PDO::PARAM_STR);
            $cst->bindParam(":nome", $dados['nome_edf'], PDO::PARAM_STR);
            $cst->bindParam(":foto", $arquivo['foto_edf']['name'], PDO::PARAM_STR);
            $cst->bindParam(":senha", $dados['senha_edf'], PDO::PARAM_STR);
            $cst->bindParam(":email", $dados['email_edf'], PDO::PARAM_STR);
            $cst->bindParam(":tipo", $tipo, PDO::PARAM_INT);



            if ($cst->execute()) {
                // Recuperar o ultimo ID inserido no BD
                $ultimo_id = $this->conexao->lastInsertID();

                //Diretorio onde o arquivo vai ser salvo
                $diretorio = '../../../assets/images/' . $ultimo_id . '/' . $arquivo['foto_edf']['name'];


                //Criar a pasta de fotos: ATENÇAO: CADA ID VAI TER UMA PASTA COM SUA IMAGEM...
                mkdir('../../../assets/images/' . $ultimo_id, 0755);


                if (move_uploaded_file($arquivo['foto_edf']['tmp_name'], $diretorio)) {
                    echo "Arquivo válido e enviado com sucesso.\n";
                } else {
                    echo "Possível ataque de upload de arquivo!\n";
                }

                $cst = $this->conexao->prepare("INSERT INTO $this->tabela_educador " .
                        "(EDF_CREF, " .
                        "EDF_FOCO, " .
                        "EDF_DESC_PROFISSIONAL, " .
                        "EDF_STATUS, " .
                        "FK_USUARIOS_USU_CODIGO) " .
                        "VALUES " .
                        "(:EDF_CREF, " .
                        ":EDF_FOCO, " .
                        ":EDF_DESC_PROFISSIONAL, " .
                        ":EDF_STATUS, " .
                        ":FK_USUARIOS_USU_CODIGO);");
                $cst->bindParam(":EDF_CREF", $dados['cref_edf'], PDO::PARAM_STR);
                $cst->bindParam(":EDF_FOCO", $dados['foco_edf'], PDO::PARAM_INT);
                $cst->bindParam(":EDF_DESC_PROFISSIONAL", $dados['desc_edf'], PDO::PARAM_STR);
                $cst->bindParam(":EDF_STATUS", $dados['status_edf'], PDO::PARAM_INT);
                $cst->bindParam(":FK_USUARIOS_USU_CODIGO", $ultimo_id, PDO::PARAM_INT);

                if ($cst->execute()) {
                    return 'ok';
                } else {
                    return 'erro';
                }
            } else {
                return 'erro';
            }
       } catch (PDOException $ex) {
          return 'error ' . $ex->getMessage();
      }
    }
    
    
        public function Verificar_CREF_Existente($cref) {
        $cst = $this->conexao->prepare("SELECT EDF_CREF from educadores_fisicos WHERE EDF_CREF=:EDF_CREF");
        $cst->bindParam(":EDF_CREF", $cref, PDO::PARAM_STR);
        if ($cst->execute()) {

            $resultado = $cst->fetchAll();
        }

        return (count($resultado) > 0 ? 3 : 0);        
     }
    

    
   

}
