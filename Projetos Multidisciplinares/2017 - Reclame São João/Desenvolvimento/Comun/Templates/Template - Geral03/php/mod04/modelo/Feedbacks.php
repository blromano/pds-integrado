<!-- FEE_DATA_HORA DATETIME NOT NULL,
FEE_ID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
FEE_PROBLEMA TEXT NOT NULL,
FEE_SOLUCOES_DEFEINIDAS TEXT NOT NULL,
FEE_STATUS_RESOLVIDO BOOLEAN NOT NULL, -->

<?php

class Feeedbacks
{

  private $fkid;
  private $id;
  private $problema;
  private $solucoesDefinidas;
  private $statusResolvido;

  public function __construct(){

  }

  public function getId(){
    return $this->id;
  }

  public function getFkid(){
    return $this->fkid;
  }

  public function getProblema(){
    return $this->problema;
  }

  private function getSolucoesDefinidas(){
    return $this->solucoesDefinidas;
  }

  private function getStatusResolvido(){
    return $this->statusResolvido;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function setFkid($fkid){
    $this->fkid = $fkid;
  }

  public function setProblema($problema){
    $this->problema = $problema;
  }
  public function setSolucoesDefinidas($id){
    $this->solucoesDefinidas = $solucoesDefinidas;
  }
  public function setStatusResolvido($statusResolvido){
    $this->statusResolvido = $statusResolvido;
  }
}

?>
