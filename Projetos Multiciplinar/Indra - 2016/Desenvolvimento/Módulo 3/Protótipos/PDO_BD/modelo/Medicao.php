<?php

/**
 * Description of Medicao
 *
 * @author samuel
 */
class Medicao {
    
    private $Id;
    private $DataHora;
    private $Medicao;
    private $SensorInstaladoSensor;
    private $ArquivoPcdImportado;

    function __construct($Id, $DataHora, $Medicao, $SensorInstaladoSensor, $ArquivoPcdImportado = NULL) {
        $this->Id = $Id;
        $this->DataHora = $DataHora;
        $this->Medicao = $Medicao;
        $this->ArquivoPcdImportado = $ArquivoPcdImportado;
        $this->SensorInstaladoSensor = $SensorInstaladoSensor;
    }

    function getId() {
        return $this->Id;
    }

    function getDataHora() {
        return $this->DataHora;
    }

    function getMedicao() {
        return $this->Medicao;
    }

    function getArquivoPcdImportado() {
        return $this->ArquivoPcdImportado;
    }

    function getSensorInstaladoSensor() {
        return $this->SensorInstaladoSensor;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setDataHora($DataHora) {
        $this->DataHora = $DataHora;
    }

    function setMedicao($Medicao) {
        $this->Medicao = $Medicao;
    }

    function setArquivoPcdImportado($ArquivoPcdImportado) {
        $this->ArquivoPcdImportado = $ArquivoPcdImportado;
    }

    function setSensorInstaladoSensor($SensorInstaladoSensor) {
        $this->SensorInstaladoSensor = $SensorInstaladoSensor;
    }

}
