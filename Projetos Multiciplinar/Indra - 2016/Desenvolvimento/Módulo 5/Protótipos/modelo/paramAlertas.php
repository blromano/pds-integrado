<?php

class paramAlertas {
	private $id;
	private $valorMax;
	private $valorMin;
	private $corMax;
    private $corMin;
    private $idSensor;

    public function __construct($id, $valorMax, $valorMin, $corMax, $corMin, $idSensor)
	{
		$this->id = $id;
		$this->valorMax = $valorMax;
		$this->valorMin = $valorMin;
		$this->corMax = $corMax;
		$this->corMin = $corMin;
		$this->idSensor = $idSensor;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setValorMax($valorMax){
		$this->varloMax = $valorMax;
	}

	public function setValorMin($valorMin){
		$this->valorMin = $valorMin;
	}

	public function setCorMax($corMax){
		$this->corMax = $corMax;
	}

	public function setCorMin($corMin){
		$this->corMin = $corMin;
	}

	public function setIdSensor($idSensor){
		$this->idSensor = $idSensor;
	}

	public function getId(){
		return $this->id;
	}

	public function getValorMax(){
		return $this->valorMax;
	}

	public function getValorMin(){
		return $this->valorMin;
	}

	public function getCorMax(){
		return $this->corMax;
	}

	public function getCorMin(){
		return $this->corMin;
	}

	public function getIdSensor(){
		return $this->idSensor;
	}

	 public function jsonSerialize() {
        return
                array(
                    "id" => "$this->id",
                    "valorMax" => "$this->valorMax",
                    "corMax" => "$this->corMax", 
                    "corMin" => "$this->corMin",
                    "valorMin" => "$this->valorMin",
                    "idSensor" =>"$this->idSensor"
        );
    }
}