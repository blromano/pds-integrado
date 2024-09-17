<?php
class Avaliacoes
{

    private $id;
    private $descricao; 
    private $date; 
    private $nota;
    private $estId;

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

    public function getNota() {
        return $this->nota;
    }

    public function setNota($nota) {
        $this->nota = $nota;
    }

    public function setEstId($estId)
    {
        $this->estId = $estId;
    }

    public function getEstId()
    {
        return $this->estId;
    }

}

?>

