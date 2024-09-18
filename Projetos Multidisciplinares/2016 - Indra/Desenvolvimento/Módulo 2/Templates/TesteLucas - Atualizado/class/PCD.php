<?php
class PCD{
	private $id;
	private $cidade;
	private $estado;
	private $latitude;
	private $longitude;
	private $descricao;
	private $pcd_status_funcionamento;



	public function __construct($id,$cidade, $estado, $latitude, $longitude, $descricao, $pcd_status_funcionamento)
	{
		$this->id = $id;
		$this->cidade = $cidade;
		$this->estado = $estado;
		$this->latitude = $latitude;
		$this->longitude = $longitude;		
		$this->descricao = $descricao;
        $this->pcd_status_funcionamento = $pcd_status_funcionamento;
	}

	
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }
	
	public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }
	

	public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }
	
	public function getPCD_STATUS_FUNCIONAMENTO() 
	{
        return $this->pcd_status_funcionamento;
    }
	
	public function setPCD_STATUS_FUNCIONAMENTO($PCD_STATUS_FUNCIONAMENTO) 
	{
        $this->pcd_status_funcionamento = $PCD_STATUS_FUNCIONAMENTO;
    }

    public function jsonSerialize() {
        return
                array(
                    "id" => "$this->id",
                    "cidade" => "$this->cidade",
                    "estado" => "$this->estado", 
                    "latitude" => "$this->latitude",
					"longitude" => "$this->longitude",
					"descricao" => "$this->descricao"
        );
    }
}