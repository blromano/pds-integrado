<!-- CREATE TABLE HISTORICO_POSICAO (
HIC_ID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
HIC_COLOCACAO INTEGER NOT NULL,
HIC_DATA_HORA DATETIME NOT NULL,
EST_ID INTEGER NOT NULL,
FOREIGN KEY(EST_ID) REFERENCES ESTABELECIMENTOS (EST_ID)
) -->

<?php

/**
 *
 */
class HistoricoPosicao
{

  private $id;
  private $Fkid;
  private $colocacao;
  private $dataHora;

  function __construct()
  {
    # code...
  }

  public function getId(){
    return $this->id;
  }

  public function getColocacao(){
    return $this->colocacao;
  }

  public function getFkid(){
    return $this->Fkid;
  }

  public function getDataHora(){
    return $this->dataHora;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function setFkid($Fkidd){
    $this->Fkid = $Fkid;
  }

  public function setColocacao($colocacao){
    $this->colocacao = $colocacao;
  }

  public function setDataHora($dataHora){
    $this->dataHora = $dataHora;
  }

}


 ?>
