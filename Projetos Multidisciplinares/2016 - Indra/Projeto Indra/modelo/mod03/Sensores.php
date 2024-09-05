<?php

class Sensores{

	private $pcdId;
	private $tipoSensorId;
	private $periodicidadeMedicao;
	private $sensorId;
	private $estadoSensor;

        function __construct($pcdId, $tipoSensorId, $periodicidadeMedicao, $sensorId, $estadoSensor) {
            $this->pcdId = $pcdId;
            $this->tipoSensorId = $tipoSensorId;
            $this->periodicidadeMedicao = $periodicidadeMedicao;
            $this->sensorId = $sensorId;
            $this->estadoSensor = $estadoSensor;
        }
        
        function getPcdId() {
            return $this->pcdId;
        }

        function getTipoSensorId() {
            return $this->tipoSensorId;
        }

        function getPeriodicidadeMedicao() {
            return $this->periodicidadeMedicao;
        }

        function getSensorId() {
            return $this->sensorId;
        }

        function getEstadoSensor() {
            return $this->estadoSensor;
        }

        function setPcdId($pcdId) {
            $this->pcdId = $pcdId;
        }

        function setTipoSensorId($tipoSensorId) {
            $this->tipoSensorId = $tipoSensorId;
        }

        function setPeriodicidadeMedicao($periodicidadeMedicao) {
            $this->periodicidadeMedicao = $periodicidadeMedicao;
        }

        function setSensorId($sensorId) {
            $this->sensorId = $sensorId;
        }

        function setEstadoSensor($estadoSensor) {
            $this->estadoSensor = $estadoSensor;
        }















}

	