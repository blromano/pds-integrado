<?php

require_once 'Conexao.php';
class Publicacoes {

    private $pub_codigo;
    private $pub_data_hora_publicacao;
    private $pub_video;
    private $pub_imagem;
    private $pub_texto;
    private $usu_codigo;
    
    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;

    public function __construct() 
    {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "publicacoes";
    }
	public function getPublicacao() 
	{
		$this->sql = "select * from $this->tabela order by PUB_CODIGO desc";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}
	public function remove_imagem($id)
	{
		$this->sql = "UPDATE publicacoes SET PUB_IMAGEM = null WHERE PUB_CODIGO = ".$id;
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		echo "<script language='javascript' type='text/javascript'>alert('UPDATE IMAGEM!');window.location.href='?mod=rsocial';</script>"; 
	}
	public function remove_video($id)
	{
		$this->sql = "UPDATE publicacoes SET PUB_VIDEO = null WHERE PUB_CODIGO = ".$id;
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		echo "<script language='javascript' type='text/javascript'>alert('UPDATE VIDEO!');window.location.href='?mod=rsocial';</script>"; 
	}
}