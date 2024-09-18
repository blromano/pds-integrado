<!-- REU_ID INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
REU_DATA_HORA DATETIME NOT NULL,
REU_REPRESENTANTES VARCHAR(100) NOT NULL,
REU_LOCAL VARCHAR(100) NOT NULL,
REU_ASSUNTO_PAUTADO VARCHAR(500) NOT NULL -->

<?php

class ReunioesAgendadas
{

  private$fk1id;
  private$fk2id;
  private$fk3id;
  private $id;
  private $dataHora;
  private $representantes;
  private $local;
  private $assuntoPautado;

  public function __construct (){

  }

  public function getId(){
    return $this->id;
  }

  public function getDataHora(){
    return $this->dataHora;
  }

  public function getRepresentantes(){
    return $this->representantes;
  }

  public function getLocal(){
    return $this->local;
  }

  public function getAssuntoPautado(){
    return $this->assuntoPautado;
  }


  public function setId($id){
    $this->id = $id;
  }

  public function setDataHora($dataHora){
    $this->dataHora = $dataHora;
  }

  public function setRepresentantes($representantes){
    $this->representantes = $representantes;
  }

  public function setLocal($local){
    $this->local = $local;
  }

  public function setAssuntoPautado($assuntoPautado){
    $this->assuntoPautado = $assuntoPautado;
  }

  public function getfk1id(){
    return $this->fk1id;
  }
  public function setfk1id($fk1id){
    $this->fk1id = $fk1id;
  }
  public function getfk2id(){
    return $this->fk2id;
  }
  public function setfk1id($fk2id){
    $this->fk2id = $fk2id;
  }
  public function getfk3id(){
    return $this->fk3id;
  }
  public function setfk3id($fk3id){
    $this->fk3id = $fk3id;
  }

}


 ?>
