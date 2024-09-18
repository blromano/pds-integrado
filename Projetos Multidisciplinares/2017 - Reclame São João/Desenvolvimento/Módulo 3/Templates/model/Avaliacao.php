<?php

class Avaliacao{

  private $feedback;
  private $idReclamacao;
  private $idEstabelecimento;
  private $idUsuario;
  private $pontuacao;


/**
* Class Constructor
  * @param $feedback
  * @param $idReclamacao
  * @param $idEstabelecimento
  * @param $idUsuario
  * @param $pontuacao
**/
  public function __construct($feedback,  $idReclamacao, $idEstabelecimento, $idUsuario, $pontuacao)
  {
    $this->feedback = $feedback;
    $this->idReclamacao = $idReclamacao;
    $this->idEstabelecimento = $idEstabelecimento;
    $this->idUsuario = $idUsuario;
    $this->pontuacao = $pontuacao;
  }

  public function getFeedback()
  {
    return $feedback;
  }

  public function getIdReclamacao()
  {
    return $idReclamacao;
  }

  public function getIdEstabelecimento()
  {
    return $idEstabelecimento;
  }

  public function getIdUsuario()
  {
    return $idUsuario;
  }

  public function getPontuacao()
  {
    return $pontuacao;
  }

  public function setFeedback($feedback)
  {
    $this->feedback = $feedback;
  }

  public function setIdReclamacao($idReclamacao)
  {
    $idReclamacao = $this->idReclamacao;
  }

  public function setIdEstabelecimento($idEstabelecimento)
  {
    $idEstabelecimento = $this->idEstabelecimento;
  }

  public function setIdUsuario($idUsuario)
  {
    $this->idUsuario = $idUsuario;
  }

  public function setPontuacao($pontuacao)
  {
    $this->pontuacao = $pontuacao;
  }

}


?>
