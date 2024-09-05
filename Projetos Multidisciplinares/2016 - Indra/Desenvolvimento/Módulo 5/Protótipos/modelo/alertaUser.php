<?php
class alertaUser {
    private $id;
    private $descricao;
    private $rua;
    private $bairro;
    private $cidade;
    private $idUsuario;
    private $idAlerta;
    private $status;
    private $date;
    private $imgs = [];

    public function __construct($id, $descricao, $rua, $bairro, $cidade, $status, $date, $idAlerta, $idUsuario, $imgs) {
      $this->id = $id;
      $this->descricao = $descricao;
      $this->rua = $rua;
      $this->bairro = $bairro;
      $this->cidade = $cidade;
      $this->status = $status;
      $this->date = $date;
      $this->idAlerta = $idAlerta;
      $this->idUsuario = $idUsuario;  
      $this->imgs = $imgs;    
  }


    public function getId(){
        return $this->id;
    }

    public function setId($id){
        
        $this->id = $id;
        return $this;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setDescricao($descricao){
        
        $this->descricao = $descricao;
        return $this;
    }

    public function getRua(){
        return $this->rua;
    }

    public function setRua($rua){
        $this->rua = $rua;
        return $this;
    }

    public function getBairro(){
        return $this->bairro;
    }

    public function setBairro($bairro){
        $this->bairro = $bairro;
        return $this;
}

    public function getCidade(){
        return $this->cidade;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
        return $this;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
        return $this;
    }

    public function getIdAlerta(){
        return $this->idAlerta;
    }

    public function setIdAlerta($idAlerta){
        $this->idAlerta = $idAlerta;
        return $this;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
        return $this;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
        return $this;
    }

    public function getImgs(){
        return $this->imgs;
    }

    public function setImgs($imgs){
        $this->imgs = $imgs;
        return $this;
    }

}