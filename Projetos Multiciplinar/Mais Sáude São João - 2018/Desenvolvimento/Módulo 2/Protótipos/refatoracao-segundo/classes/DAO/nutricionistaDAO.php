<?php

require_once 'Conexao.php';

class nutricionistaDAO {

    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;
    private $tabela_nutri;

    function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabelausuario = "usuarios";
        $this->tabela_nutri = "nutricionistas";
    }

    public function queryInsert($dados, $arquivo) {
        try {
           $tipo = 2;
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
            $cst->bindParam(":cpf", $dados['cpf_nutri'], PDO::PARAM_STR);
            $cst->bindParam(":endereco", $dados['end_nutri'], PDO::PARAM_STR);
            $cst->bindParam(":USU_SOBRENOME", $dados['sobrenome_nutri'], PDO::PARAM_STR);
            $cst->bindParam(":genero", $dados['genero_nutri'], PDO::PARAM_INT);
            $cst->bindParam(":data_nascimento_usu", $dados['data_nutri'], PDO::PARAM_STR);
            $cst->bindParam(":telefone", $dados['tel_nutri'], PDO::PARAM_STR);
            $cst->bindParam(":nome", $dados['nome_nutri'], PDO::PARAM_STR);
            $cst->bindParam(":foto", $arquivo['foto_nutri']['name'], PDO::PARAM_STR);
            $cst->bindParam(":senha", $dados['senha_nutri'], PDO::PARAM_STR);
            $cst->bindParam(":email", $dados['email_nutri'], PDO::PARAM_STR);
            $cst->bindParam(":tipo", $tipo, PDO::PARAM_INT);



            if ($cst->execute()) {
                // Recuperar o ultimo ID inserido no BD
                $ultimo_id = $this->conexao->lastInsertID();

                //Diretorio onde o arquivo vai ser salvo
                $diretorio = '../../../assets/images/' . $ultimo_id . '/' . $arquivo['foto_nutri']['name'];
      


                //Criar a pasta de fotos: ATENÇAO: CADA ID VAI TER UMA PASTA COM SUA IMAGEM...
                mkdir('../../../assets/images/' . $ultimo_id, 0755);


                if (move_uploaded_file($arquivo['foto_nutri']['tmp_name'], $diretorio)) {
                    echo "Arquivo válido e enviado com sucesso.\n";
                } else {
                    echo "Possível ataque de upload de arquivo!\n";
                }

                $cst = $this->conexao->prepare("INSERT INTO $this->tabela_nutri " .
                        "(NUT_CRN, " .
                        "NUT_FOCO, " .
                        "NUT_DESC_PROFISSIONAL, " .
                        "NUT_STATUS, " .
                        "FK_USUARIOS_USU_CODIGO) " .
                        "VALUES " .
                        "(:NUT_CRN, " .
                        ":NUT_FOCO, " .
                        ":NUT_DESC_PROFISSIONAL, " .
                        ":NUT_STATUS, " .
                        ":FK_USUARIOS_USU_CODIGO);");
                $cst->bindParam(":NUT_CRN", $dados['crn_nutri'], PDO::PARAM_STR);
                $cst->bindParam(":NUT_FOCO", $dados['foco_nutri'], PDO::PARAM_INT);
                $cst->bindParam(":NUT_DESC_PROFISSIONAL", $dados['desc_nutri'], PDO::PARAM_STR);
                $cst->bindParam(":NUT_STATUS", $dados['status_nutri'], PDO::PARAM_INT);
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
     public function Verificar_CRN_Existente($CRN) {
        $cst = $this->conexao->prepare("SELECT * from nutricionistas WHERE NUT_CRN=:NUT_CRN");
        $cst->bindParam(":NUT_CRN", $CRN, PDO::PARAM_STR);
        if ($cst->execute()) {

            $resultado = $cst->fetchAll();
        }

        return (count($resultado) > 0 ? 4 : 0);        
     }

}
