<?php

require_once 'Conexao.php';
// require_once '../modelo/Tipo_Estabelecimentos.php';
require_once($_SERVER['DOCUMENT_ROOT'] . '\RECLAME_SAO_JOAO-INTEGRAR\modelo\Tipo_Estabelecimentos.php');

class Tipo_EstabelecimentosDAO{

    private $conexao;
    private $sql;
    private $post;
    private $resultado;
    private $tabela;

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "TIPOS_ESTABELECIMENTOS";
    }

    public function inserirTipoEstabelecimentos($post) {
        $this->post = $post;
        $this->sql = "insert into $this->tabela (TIP_NOME) values (:TIP_NOME)";
        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->bindParam(':TIP_NOME', $this->post->getTIP_NOME());
      

        $this->resultado->execute();

        return $this->resultado;
    }

    public function editarTipoEstabelecimentos($post) {
        $this->post = $post;
        $this->sql = "update $this->tabela set TIP_NOME =:TIP_NOME where TIP_ID =:TIP_ID";

        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->bindParam(':TIP_NOME', $this->post->getTIP_NOME());
        $this->resultado->bindParam(':TIP_ID', $this->post->getTIP_ID());

        $this->resultado->execute();

        return $this->resultado;
    }

    public function excluirTipoEstabelecimentos($id) {
        $this->sql = "delete from $this->tabela where TIP_ID =:id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $id);

        $this->resultado->execute();

        return $this->resultado;
    }

    public function listarTodos() {
        $this->sql = "select * from $this->tabela";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
// select * from tipos_estabelecimentos where tes_id=1;
    public function pesquisarPorId($id) {
        $this->sql = "select * from $this->tabela where TES_ID=$id";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

}
?>

