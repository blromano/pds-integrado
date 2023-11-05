<?php
class consultas_marcadas_educador_fisico{
    private $con_codigo, $con_local, $con_status, $con_data, $con_link_googlemaps, $con_hora ;
    function getCon_codigo() {
        return $this->con_codigo;
    }

    function getCon_local() {
        return $this->con_local;
    }

    function getCon_status() {
        return $this->con_status;
    }

    function getCon_data() {
        return $this->con_data;
    }

    function getCon_link_googlemaps() {
        return $this->con_link_googlemaps;
    }

    function getCon_hora() {
        return $this->con_hora;
    }

    function setCon_codigo($con_codigo) {
        $this->con_codigo = $con_codigo;
    }

    function setCon_local($con_local) {
        $this->con_local = $con_local;
    }

    function setCon_status($con_status) {
        $this->con_status = $con_status;
    }

    function setCon_data($con_data) {
        $this->con_data = $con_data;
    }

    function setCon_link_googlemaps($con_link_googlemaps) {
        $this->con_link_googlemaps = $con_link_googlemaps;
    }

    function setCon_hora($con_hora) {
        $this->con_hora = $con_hora;
    }
    
}

?>