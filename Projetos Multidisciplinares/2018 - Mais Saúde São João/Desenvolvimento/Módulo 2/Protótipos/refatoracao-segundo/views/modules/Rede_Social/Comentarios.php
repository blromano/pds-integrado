<?php
require_once 'Conexao.php';
class Comentario
{
    private $com_codigo;
    private $com_data_hora_comentario;
    private $com_campo_texto;
	private $pub_codigo;
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
        $this->tabela = "comentarios";
		$this->pub_codigo = null;
    }
    
	public function getComentarios($codigo) 
	{
		$this->pub_codigo = $codigo;
		if($this->pub_codigo != null)
		{
			$this->sql = "select * from $this->tabela where FK_PUBLICACOES_PUB_CODIGO = $this->pub_codigo order by COM_CODIGO desc";
			$this->resultado = $this->conexao->prepare($this->sql);
			$this->resultado->execute();
			return $this->resultado->fetchAll();
		}
	}
}