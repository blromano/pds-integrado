<?php
class imagemPCD {
private $IMG_ID;
private $IMG_URL_FOTO;
private $IMG_LEGENDA;

public function __construct($IMG_ID, $IMG_URL_FOTO, $justificativa, $IMG_LEGENDA){
  $this->IMG_ID = $IMG_ID;
  $this->IMG_URL_FOTO = $IMG_URL_FOTO;
  $this->IMG_LEGENDA = $IMG_LEGENDA;

}

	public function getIMG_ID(){
        return $this->IMG_ID;
  }

  public function setIMG_ID($id){
        $this->IMG_ID = $id;
        return $this;
  }

	public function getIMG_URL_FOTO(){
					return $this->IMG_URL_FOTO;
  }

  public function setIMG_URL_FOTO($IMG_URL_FOTO){
  				$this->IMG_URL_FOTO = $IMG_URL_FOTO;
					return $this;
  }

	public function getIMG_LEGENDA(){
					return $this->IMG_LEGENDA;
  }

  public function setIMG_LEGENDA($IMG_LEGENDA){
  				$this->IMG_LEGENDA = $IMG_LEGENDA;
					return $this;
  }?>
