<?php 

class PCD {
	private $id;
	private $desc;
	private $status;
	private $estado;
	private $cidade;
	private $latitude;
	private $longitude;


	/**
	 * Class Constructor
	 * @param    $id   
	 * @param    $desc   
	 * @param    $status   
	 * @param    $estado   
	 * @param    $cidade   
	 * @param    $latitude   
	 * @param    $longitude   
	 */
	public function __construct($id, $desc, $status, $estado, $cidade, $latitude, $longitude)
	{
		$this->id = $id;
		$this->desc = $desc;
		$this->status = $status;
		$this->estado = $estado;
		$this->cidade = $cidade;
		$this->latitude = $latitude;
		$this->longitude = $longitude;
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
     * Gets the value of desc.
     *
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Sets the value of desc.
     *
     * @param mixed $desc the desc
     *
     * @return self
     */
    private function _setDesc($desc)
    {
        $this->desc = $desc;

        return $this;
    }

    /**
     * Gets the value of status.
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the value of status.
     *
     * @param mixed $status the status
     *
     * @return self
     */
    private function _setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Gets the value of estado.
     *
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Sets the value of estado.
     *
     * @param mixed $estado the estado
     *
     * @return self
     */
    private function _setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Gets the value of cidade.
     *
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Sets the value of cidade.
     *
     * @param mixed $cidade the cidade
     *
     * @return self
     */
    private function _setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Gets the value of latitude.
     *
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Sets the value of latitude.
     *
     * @param mixed $latitude the latitude
     *
     * @return self
     */
    private function _setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Gets the value of longitude.
     *
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Sets the value of longitude.
     *
     * @param mixed $longitude the longitude
     *
     * @return self
     */
    private function _setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    //($id, $desc, $status, $estado, $cidade, $latitude, $longitude)

    public function jsonSerialize() {
        return
                array(
                    "id" => "$this->id",
                    "desc" => "$this->desc",
                    "status" => "$this->status", 
                    "estado" => "$this->estado",
                    "cidade" => "$this->cidade",
                    "longitude" => "$this->latitude",
                    "longitude" => "$this->longitude"   
        );
    }
}