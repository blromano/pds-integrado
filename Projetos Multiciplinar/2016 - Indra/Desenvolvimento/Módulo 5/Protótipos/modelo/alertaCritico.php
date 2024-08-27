<?php

class alertaCritico {
	private $dataHora;
	private	$id;
	private	$valorMedicao;
	private $idSensor;
    private $idAlertaUser;
    private $tipoAlerta;


	/**
	 * Class Constructor
	 * @param    $dataHora   
	 * @param    $valorMedicao   
	 * @param    $idSensor  
     * @param    $idAlertaUser
	 */
	public function __construct($dataHora, $valorMedicao, $idSensor, $idAlertaUser, $tipoAlerta)
	{
		$this->dataHora = $dataHora;
		$this->valorMedicao = $valorMedicao;
		$this->idSensor = $idSensor;
        $this->idAlertaUser = $idAlertaUser;
        $this->tipoAlerta = $tipoAlerta;
	}
    
    
     /**
     * Gets the value of dataHora.
     *
     * @return mixed
     */
    public function getDataHora()
    {
        return $this->dataHora;
    }

    /**
     * Sets the value of dataHora.
     *
     * @param mixed $dataHora the data hora
     *
     * @return self
     */
    private function _setDataHora($dataHora)
    {
        $this->dataHora = $dataHora;

        return $this;
    }

    /**
     * Gets the value of sensorId.
     *
     * @return mixed
     */
    public function getIdSensor()
    {
        return $this->idSensor;
    }

    /**
     * Sets the value of sensorId.
     *
     * @param mixed $sensorId the sensor id
     *
     * @return self
     */
    private function _setIdSensor($idSensor)
    {
        $this->idSensor = $idSensor;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $i the id
     *
     * @return self
     */
    private function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getValorMedicao()
    {
        return $this->valorMedicao;
    }

    /**
     * Sets the value of sensorId.
     *
     * @param mixed $sensorId the sensor id
     *
     * @return self
     */
    private function _setValorMedicao($valorMedicao)
    {
        $this->valorMedicao = $valorMedicao;

        return $this;
    }

    public function getIdAlertaUser()
    {
        return $this->idAlertaUser;
    }

    /**
     * Sets the value of idAlertaUser.
     *
     * @param mixed $idAlertaUser the id alert
     *
     * @return self
     */
    private function _setIdAlertaUser($idAlertaUser)
    {
        $this->idAlertaUser = $idAlertaUser;

        return $this;
    }

    /**
     * Gets the value of tipoAlerta.
     *
     * @return mixed
     */
    public function getTipoAlerta()
    {
        return $this->tipoAlerta;
    }

    /**
     * Sets the value of tipoAlerta.
     *
     * @param mixed $tipoAlerta the tipo alerta
     *
     * @return self
     */
    private function _setTipoAlerta($tipoAlerta)
    {
        $this->tipoAlerta = $tipoAlerta;

        return $this;
    }
}