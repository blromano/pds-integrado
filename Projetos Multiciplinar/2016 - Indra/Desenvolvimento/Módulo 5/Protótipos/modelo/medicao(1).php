<?php

class medicao{
	private $id;
	private $dado;
	private $dataHora;
	private $idAPI;
	private $idSEN;


	/**
	 * Class Constructor
	 * @param    $id   
	 * @param    $dado   
	 * @param    $dataHora   
	 * @param    $idAPI   
	 * @param    $idSEN   
	 */
	public function __construct($id, $dado, $dataHora, $idAPI, $idSEN)
	{
		$this->id = $id;
		$this->dado = $dado;
		$this->dataHora = $dataHora;
		$this->idAPI = $idAPI;
		$this->idSEN = $idSEN;
	}


   

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the value of id.
     *
     * @param mixed $id the id
     *
     * @return self
     */
    private function _setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Gets the value of dado.
     *
     * @return mixed
     */
    public function getDado()
    {
        return $this->dado;
    }

    /**
     * Sets the value of dado.
     *
     * @param mixed $dado the dado
     *
     * @return self
     */
    private function _setDado($dado)
    {
        $this->dado = $dado;

        return $this;
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
     * Gets the value of idAPI.
     *
     * @return mixed
     */
    public function getIdAPI()
    {
        return $this->idAPI;
    }

    /**
     * Sets the value of idAPI.
     *
     * @param mixed $idAPI the id
     *
     * @return self
     */
    private function _setIdAPI($idAPI)
    {
        $this->idAPI = $idAPI;

        return $this;
    }

    /**
     * Gets the value of idSEN.
     *
     * @return mixed
     */
    public function getIdSEN()
    {
        return $this->idSEN;
    }

    /**
     * Sets the value of idSEN.
     *
     * @param mixed $idSEN the id
     *
     * @return self
     */
    private function _setIdSEN($idSEN)
    {
        $this->idSEN = $idSEN;

        return $this;
    }
}