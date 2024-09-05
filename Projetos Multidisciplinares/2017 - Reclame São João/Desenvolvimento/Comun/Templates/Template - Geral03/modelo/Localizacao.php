<?php
class Reclamacoes
{
	
	private $id;
	private $descricao; 
	private $date; 
	private $aprovado; 
	private $titulo; 
	private $nota;
	
	REC_DESCRICAO TEXT NOT NULL,
REC_ID INTEGER AUTO_INCREMENT PRIMARY KEY,
REC_DATA_HORA DATETIME NOT NULL,
REC_APROVADO BOOLEAN NOT NULL,
REC_LINK_IMAGEM VARCHAR(200) NULL,
REC_TITULO_RECLAMACAO VARCHAR(50) NOT NULL,
REC_NOTA INTEGER NOT NULL,
CON_ID INTEGER NOT NULL,
ADM_ID INTEGER NOT NULL,
EST_ID INTEGER NOT NULL,
	public function __construct()
    {
        
    }
		
	public function getId() {
        return $this->id;
    }
	
	public function setid($id) {
        $this->id = $id;
	}
	
	public function getDescricao() {
        return $this->descricao;
    }
	
	public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
	
	public function getDate() {
        return $this->date;
    }
	
	public function setDate($date) {
        $this->date = $date;
    }
	
	public function getAprovado() {
        return $this->aprovado;
    }
	
    public function setAprovado($aprovado) {
        $this->aprovado= $aprovado;
    }
	
	public function getTitulo() {
        return $this->titulo;
    }
	
	public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
	
	public function getNota() {
        return $this->nota;
    }
	
	public function setNota($nota) {
        $this->nota = $nota;
    }
	   
}
  
?>

