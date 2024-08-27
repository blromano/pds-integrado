<?php
class tipoSensor{
	
	private $id;
	private $unidade_medida;
	private $tipo_sensor;
	private $descricao;
	private $timid;
	



	public function __construct($id, $unidade_medida, $tipo_sensor, $timid, $descricao)
	{
		$this->id = $id;
		$this->unidade_medida = $unidade_medida;
		$this->tipo_sensor = $tipo_sensor;
		$this->timid = $timid;
		$this->descricao = $descricao;
		
	}

	public function getTimid()
    {
        return $this->timid;
    }

    public function setTimid($timid){
        $this->timid = $timid;

        return $this;
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

    public function getUnidade_medida()
    {
        return $this->unidade_medida;
    }

    public function setUnidade_medida($unidade_medida)
    {
        $this->unidade_medida = $unidade_medida;

        return $this;
    }

    public function getTipo_sensor()
    {
        return $this->tipo_sensor;
    }

    public function setTipo_sensor($tipo_sensor)
    {
        $this->tipo_sensor = $tipo_sensor;

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
}