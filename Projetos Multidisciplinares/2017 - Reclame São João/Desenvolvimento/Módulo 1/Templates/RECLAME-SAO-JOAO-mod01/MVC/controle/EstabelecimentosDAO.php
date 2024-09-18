<?php

require_once 'Conexao.php';


class EstabelecimentosDAO {

    private $conexao;
    private $sql;
    private $post;
    private $resultado;
    private $tabela;

    public function __construct() 
	{
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "ESTABELECIMENTOS";
    }

    
    public function inserirEstabelecimento($post) 
    {
        $this->post = $post;
        $this->sql = "insert into $this->tabela (EST_CNPJ, EST_FOTO_PERFIL, EST_NOME_FANTASIA, EST_RUA, EST_BAIRRO, EST_NUMERO, EST_COMPLEMENTO, EST_CEP, EST_NOME_RESPONSAVEL, EST_NOME_EMPRESA, EST_PUBLICO_ALVO,	EST_VISAO_GERAL_EMPRESA, EST_SITE_EMPRESA, EST_EMAIL) 
		                                 values (:EST_CNPJ, :EST_FOTO_PERFIL, :EST_NOME_FANTASIA, :EST_RUA, :EST_BAIRRO, :EST_NUMERO, :EST_COMPLEMENTO, :EST_CEP, :EST_NOME_RESPONSAVEL, :EST_NOME_EMPRESA, :EST_PUBLICO_ALVO, :EST_VISAO_GERAL_EMPRESA, :EST_SITE_EMPRESA, :EST_EMAIL)";
        
		$this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->bindParam(':EST_CNPJ', $this->post->getEST_CNPJ());
        $this->resultado->bindParam(':EST_FOTO_PERFIL', $this->post->getEST_FOTO_PERFIL());
        $this->resultado->bindParam(':EST_NOME_FANTASIA', $this->post->getEST_NOME_FANTASIA());
        $this->resultado->bindParam(':EST_RUA', $this->post->getEST_RUA());
		$this->resultado->bindParam(':EST_BAIRRO', $this->post->getEST_BAIRRO());
		$this->resultado->bindParam(':EST_NUMERO', $this->post->getEST_NUMERO());
		$this->resultado->bindParam(':EST_COMPLEMENTO', $this->post->getEST_COMPLEMENTO());
        $this->resultado->bindParam(':EST_CEP', $this->post->getEST_CEP());
        $this->resultado->bindParam(':EST_NOME_RESPONSAVEL', $this->post->getEST_NOME_RESPONSAVEL());
        $this->resultado->bindParam(':EST_NOME_EMPRESA', $this->post->getEST_NOME_EMPRESA());
        $this->resultado->bindParam(':EST_PUBLICO_ALVO', $this->post->getEST_PUBLICO_ALVO());
		$this->resultado->bindParam(':EST_VISAO_GERAL_EMPRESA', $this->post->getEST_VISAO_GERAL_EMPRESA());
        $this->resultado->bindParam(':EST_SITE_EMPRESA', $this->post->getEST_SITE_EMPRESA());
        $this->resultado->bindParam(':EST_EMAIL', $this->post->getEST_EMAIL());

        $this->resultado->execute();

        return $this->resultado;
    }

    public function editarEstabelecimento($post) 
	{
        $this->post = $post;
        $this->sql = "update $this->tabela set EST_CNPJ=: EST_CNPJ, :EST_FOTO_PERFIL =:EST_FOTO_PERFIL, EST_NOME_FANTASIA =:EST_NOME_FANTASIA, EST_RUA=:EST_RUA, EST_BAIRRO=:EST_BAIRRO, EST_NUMERO=:EST_NUMERO, EST_COMPLEMENTO=:EST_COMPLEMENTO, :EST_CEP=:EST_CEP, :EST_NOME_RESPONSAVEL=:EST_NOME_RESPONSAVEL, :EST_NOME_EMPRESA=:EST_NOME_EMPRESA, :EST_PUBLICO_ALVO=:EST_PUBLICO_ALVO, :EST_SITE_EMPRESA=:EST_SITE_EMPRESA, :EST_EMAIL=:EST_EMAIL where EST_ID =:EST_ID";

        $this->resultado = $this->conexao->prepare($this->sql);

        
        $this->resultado->bindParam(':EST_CNPJ', $this->post->getEST_CNPJ());
        $this->resultado->bindParam(':EST_FOTO_PERFIL', $this->post->getEST_FOTO_PERFIL());
        $this->resultado->bindParam(':EST_NOME_FANTASIA', $this->post->getEST_NOME_FANTASIA());
        $this->resultado->bindParam(':EST_RUA', $this->post->getEST_RUA());
		$this->resultado->bindParam(':EST_BAIRRO', $this->post->getEST_BAIRRO());
		$this->resultado->bindParam(':EST_NUMERO', $this->post->getEST_NUMERO());
		$this->resultado->bindParam(':EST_COMPLEMENTO', $this->post->getEST_COMPLEMENTO());
        $this->resultado->bindParam(':EST_CEP', $this->post->getEST_CEP());
        $this->resultado->bindParam(':EST_NOME_RESPONSAVEL', $this->post->getEST_NOME_RESPONSAVEL());
        $this->resultado->bindParam(':EST_NOME_EMPRESA', $this->post->getEST_NOME_EMPRESA());
        $this->resultado->bindParam(':EST_PUBLICO_ALVO', $this->post->getEST_PUBLICO_ALVO());
        $this->resultado->bindParam(':EST_SITE_EMPRESA', $this->post->getEST_SITE_EMPRESA());
        $this->resultado->bindParam(':EST_EMAIL', $this->post->getEST_EMAIL());

        $this->resultado->execute();

        return $this->resultado;
    }
	
	public function editarVisaoGeral_PublicoAlvo($post) 
	{
        $this->post = $post;
        $this->sql = "update $this->tabela set EST_PUBLICO_ALVO=:EST_PUBLICO_ALVO, EST_VISAO_GERAL_EMPRESA=:EST_VISAO_GERAL_EMPRESA where EST_ID =:EST_ID";

        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->bindParam(':EST_ID', $this->post->getEST_ID());
		$this->resultado->bindParam(':EST_PUBLICO_ALVO', $this->post->getEST_PUBLICO_ALVO());
        $this->resultado->bindParam(':EST_VISAO_GERAL_EMPRESA', $this->post->getEST_VISAO_GERAL_EMPRESA());

        $this->resultado->execute();

        return $this->resultado;
    }
	
	public function editarEndereco($post) 
	{
        $this->post = $post;
        $this->sql = "update $this->tabela set EST_RUA=:EST_RUA, EST_BAIRRO=:EST_BAIRRO, EST_NUMERO=:EST_NUMERO, EST_COMPLEMENTO=:EST_COMPLEMENTO, EST_CEP=:EST_CEP where EST_ID =:EST_ID";

        $this->resultado = $this->conexao->prepare($this->sql);

        $this->resultado->bindParam(':EST_ID', $this->post->getEST_ID());
		$this->resultado->bindParam(':EST_RUA', $this->post->getEST_RUA());
		$this->resultado->bindParam(':EST_BAIRRO', $this->post->getEST_BAIRRO());
		$this->resultado->bindParam(':EST_NUMERO', $this->post->getEST_NUMERO());
		$this->resultado->bindParam(':EST_COMPLEMENTO', $this->post->getEST_COMPLEMENTO());
        $this->resultado->bindParam(':EST_CEP', $this->post->getEST_CEP());

        $this->resultado->execute();

        return $this->resultado;
    }

    public function excluirEstabelecimento($id) {
        $this->sql = "delete from $this->tabela where EST_ID =:id";

        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->bindParam(':id', $id);

        $this->resultado->execute();

        return $this->resultado;
    }

    public function listarTodos() 
	{
        $this->sql = "select * from $this->tabela";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

    public function pesquisarPorId($id) {
        $this->sql = "select * from $this->tabela where EST_ID=$id";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
	
	 public function pesquisarPorCnpj($cnpj) 
	{
        $this->sql = "select * from $this->tabela where EST_CNPJ=:cnpj";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->bindParam(':cnpj', $cnpj);
        $this->resultado->execute();
        return $this->resultado->fetch(PDO::FETCH_ASSOC);
    }

}
?>

