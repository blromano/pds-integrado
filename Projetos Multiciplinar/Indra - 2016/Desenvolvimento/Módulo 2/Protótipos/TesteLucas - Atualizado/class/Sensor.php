<?php
class Sensor{
	private $id;
	private $id_pcd;
	private $id_tipo;
	private $periodicidade_med;
	private $estado;


    public function __construct($id ,$id_pcd, $id_tipo, $periodicidade_med, $estado)
    {
        $this->id = $id;
        $this->id_pcd = $id_pcd;
        $this->id_tipo = $id_tipo;
        $this->periodicidade_med = $periodicidade_med;
        $this->estado = $estado;
    }


  
    public function getId()
    {
        return $this->id;
    }


    private function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    
    public function getIdPcd()
    {
        return $this->id_pcd;
    }

 
    private function _setIdPcd($id_pcd)
    {
        $this->id_pcd = $id_pcd;

        return $this;
    }

   
    public function getIdTipo()
    {
        return $this->id_tipo;
    }

   
    private function _setIdTipo($id_tipo)
    {
        $this->id_tipo = $id_tipo;

        return $this;
    }

   
    public function getPeriodicidadeMed()
    {
        return $this->periodicidade_med;
    }

   
    private function _setPeriodicidadeMed($periodicidade_med)
    {
        $this->periodicidade_med = $periodicidade_med;

        return $this;
    }


    public function getEstado()
    {
        return $this->estado;
    }


    private function _setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}

