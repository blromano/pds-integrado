<?php
require_once 'Conexao.php';
    /*Dentro da file 'nomedaclasse_DAO.php' teremos
    todos os métodos comuns (select, update etc),
    mais os métodos específicos com parâmetros
    como o 'selecionarporNome'. Além disso, antes dos métodos,
    o arquivo deve conter a criação da classe DAO, com apenas
    um atributo, o $conexao, que vai ser responsavel por resgatar
    a conexao do banco a partir do arquivo 'Conexao.php'.*/
class fichas_treinamento_dao {
    private $conexao;
    function __construct(){
    $conn = new Conexao;
    $this->conexao = $conn->getConexao();
    }
    //selecionar os dados: 
    function selecionar($codigousuario) {
        $sqlUsuario = $this->conexao->prepare("SELECT * FROM FICHAS_TREINAMENTO WHERE FK_USUARIOS_USU_CODIGO = :usu_codigo");
        $sqlUsuario->bindParam(':usu_codigo',$codigousuario);
        $sqlUsuario->execute();
        $resultado = $sqlUsuario->fetchAll();
        return $resultado;
    }

    function selecionarPorficha ($codigoficha) {
        $sqlUsuario = $this->conexao->prepare("SELECT * FROM FICHAS_TREINAMENTO WHERE FTR_CODIGO = :ftr_codigo");
        $sqlUsuario->bindParam(':ftr_codigo',$codigoficha);
        $sqlUsuario->execute();
        $resultado = $sqlUsuario->fetchAll();
        return $resultado;
    }

    function selecionarPornome($nome) {
        $sqlUsuario = $this->conexao->prepare("SELECT * FROM FICHAS_TREINAMENTO WHERE FTR_NOME LIKE :ftr_nome ");
        $sqlUsuario->bindParam(':ftr_nome', $nome);
        $nome = '%'.$nome.'%';
        $sqlUsuario->execute();
        $resultado = $sqlUsuario->fetchAll();
        return $resultado;
    }
    //inserir os dados: 
    function inserir($fichas_treinamento) {
        try
        {
        $consulta = $this->conexao->prepare("INSERT INTO FICHAS_TREINAMENTO(FTR_CODIGO, FTR_DATA_INICIO, FTR_DATA_TERMINO, 
        FTR_DATA_ATUALIZACAO, FTR_NOME) VALUES (:ftr_codigo, :ftr_data_inicio, :ftr_data_termino, :ftr_data_atualizacao, :ftr_nome)");            
        $consulta->bindParam(':ftr_codigo', $ftr_codigo);
        $consulta->bindParam(':ftr_nome', $ftr_nome);
        $consulta->bindParam(':ftr_data_inicio', $ftr_data_inicio);
        $consulta->bindParam(':ftr_data_termino', $ftr_data_termino);
        $consulta->bindParam(':ftr_data_atualizacao', $ftr_data_atualizacao);
        $ftr_codigo = $fichas_treinamento->getFtr_codigo();
        $ftr_nome = $fichas_treinamento->getFtr_nome();
        $ftr_data_inicio = $fichas_treinamento->getFtr_data_inicio();
        $ftr_data_atualizacao = $fichas_treinamento->getFtr_data_atualizacao();
        $ftr_data_termino = $fichas_treinamento->getFtr_data_termino();
            if($consulta->execute())
            {
                return 'Ok';
            }
            else
            {
                return 'Erro ao inserir';
            }
        } catch (PDOException $e)
        {
            return $e->getMessage();
        }
      }

    //atualizar os dados: 
    function atualizar($fichas_treinamento) {

        try{
        $sqlUsuario = $this->conexao->prepare("UPDATE FICHAS_TREINAMENTO SET FTR_DATA_TERMINO = :ftr_data_termino, FTR_DATA_ATUALIZACAO = :ftr_data_atualizacao, FTR_NOME = :ftr_nome WHERE FTR_CODIGO = :ftr_codigo");
        $sqlUsuario->bindParam(":ftr_codigo", $ftr_codigo);
        $sqlUsuario->bindParam(':ftr_data_inicio', $ftr_data_inicio);
        $sqlUsuario->bindParam(':ftr_data_termino', $ftr_data_termino);
        $sqlUsuario->bindParam(':ftr_data_atualizacao', $ftr_data_atualizacao);
        $sqlUsuario->bindParam(':ftr_nome', $ftr_nome);
        $ftr_codigo = $fichas_treinamento->getftr_codigo();
        $ftr_data_inicio = $fichas_treinamento->getftr_data_inicio();
        $ftr_data_termino = $fichas_treinamento->getftr_data_termino();
        $ftr_data_atualizacao = $fichas_treinamento->getftr_data_atualizacao();
        $ftr_nome = $fichas_treinamento->getftr_nome();
        if($sqlUsuario->execute())
        {
            return 'Ok';
        }   else
            {
            return 'Erro ao atualizar';
            } 
    }
        catch (PDOException $e)
        {
            return $e->getMessage();
        }
    }

    //excluir os dados: 
    function excluir($fichas_treinamento) {
        try{
        $sqlUsuario = $this->conexao->prepare("DELETE FROM FICHAS_TREINAMENTO WHERE FTR_CODIGO = :ftr_codigo");
        $sqlUsuario->bindParam(":ftr_codigo", $ftr_codigo);
        $ftr_codigo = $fichas_treinamento->getftr_codigo();
        if($sqlUsuario->execute())
        {
            return 'Ok';
        } else
        {
            return 'Erro ao deletar.';
        }
    }catch(PDOException $e)
    {
        return $e->getMessage();
    }
    }

}
?>