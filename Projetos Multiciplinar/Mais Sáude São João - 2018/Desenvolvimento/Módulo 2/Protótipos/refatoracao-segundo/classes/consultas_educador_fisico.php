<?php

class consultas_educador_fisico {

    function _contruct() {
        
    }

    private $cef_codigo, $cef_local, $cef_status, $cef_data, $cef_link_google_maps, $cef_hora, $cef_anotacoes;

    function getCef_codigo() {
        return $this->cef_codigo;
    }

    function setCef_codigo($cef_codigo) {
        $this->cef_codigo = $cef_codigo;
    }

    function getCef_local() {
        return $this->cef_local;
    }

    function setCef_local($cef_local) {
        $this->cef_local = $cef_local;
    }

    function getCef_status() {
        return $this->cef_status;
    }

    function setCef_status($cef_status) {
        $this->cef_status = $cef_status;
    }

    function getCef_data() {
        return $this->cef_data;
    }

    function setCef_data($cef_data) {
        $this->cef_data = $cef_data;
    }

    function getCef_link_google_maps() {
        return $this->cef_link_google_maps;
    }

    function setCef_link_googlemaps($cef_link_google_maps) {
        $this->cef_link_google_maps = $cef_link_google_maps;
    }

    function getCef_hora() {
        return $this->cef_hora;
    }

    function setCef_hora($cef_hora) {
        $this->cef_hora = $cef_hora;
    }

    function getCef_anotacoes() {
        return $this->cef_anotacoes;
    }

    function setCef_anotacoes($cef_anotacoes) {
        $this->cef_anotacoes = $cef_anotacoes;
    }

}

?>