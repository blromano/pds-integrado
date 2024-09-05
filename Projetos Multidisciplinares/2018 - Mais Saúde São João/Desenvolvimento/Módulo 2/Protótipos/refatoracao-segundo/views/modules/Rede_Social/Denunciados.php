<?php

require_once 'Conexao.php';

class Denunciados {

    private $den_codigo;
    private $den_tipo_denuncia;
    private $den_motivo;
    private $FK_USUARIOS_USU_COD_DENUNCIADO;
    private $FK_USUARIOS_USU_COD_DENUNCIOU;
    private $DEN_CODIGO_COM_PUB_REC;
    
    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;

    public function __construct() 
    {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "denuncias";
    }
	
	
	public function getDenunciados() 
	{
		$this->sql = "select * from $this->tabela order by DEN_CODIGO asc";
		$this->resultado = $this->conexao->prepare($this->sql);
		$this->resultado->execute();
		return $this->resultado->fetchAll();
	}
	    public function inner(){
        $this->sql = "select 
     de.*,
     usu1.USU_NOME as NOME_DENUNCIOU,
     usu2.USU_NOME as NOME_DENUNCIADO
from 
     denuncias de, 
     usuarios usu1,
     usuarios usu2
where 
     de.FK_USUARIOS_USU_COD_DENUNCIOU = usu1.USU_CODIGO AND
     de.FK_USUARIOS_USU_COD_DENUNCIADO = usu2.USU_CODIGO ";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado;    
    }
	
}

/*select 
     de.*,
     usu1.USU_NOME as NOME_DENUNCIOU,
     usu2.USU_NOME as NOME_DENUNCIADO
from 
     denuncias de, 
     usuarios usu1,
     usuarios usu2
where 
     de.FK_USUARIOS_USU_COD_DENUNCIOU = usu1.USU_CODIGO AND
     de.FK_USUARIOS_USU_COD_DENUNCIADO = usu2.USU_CODIGO
	 
	 select ma.*,usu.USU_NOME as NOME_USU from $this->tabela ma,usuarios usu where ma.FK_USUARIOS_USU_COD_DENUNCIOU = usu.USU_CODIGO and */