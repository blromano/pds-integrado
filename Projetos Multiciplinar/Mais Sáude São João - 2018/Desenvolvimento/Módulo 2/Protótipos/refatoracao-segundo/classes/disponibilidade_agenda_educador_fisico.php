<?php
class disponibilidade_agenda_educador_fisico{
    
    function __contruct() {
    } 
    
    private $dis_codigo, $dis_hora, $dis_dia_semana, $dis_local;
    
    function getDis_codigo() {
        return $this->dis_codigo;
    }
    function setDis_codigo($dis_codigo) {
        $this->dis_codigo = $dis_codigo;
    }
    

    function getDis_hora() {
        return $this->dis_hora;
    }
    function setDis_hora($dis_hora) {
        $this->dis_hora = $dis_hora;
    }

    function getDis_dia_semana() {
        return $this->dis_dia_semana;
    }
    function setDis_dia_semana($dis_dia_semana) {
        $this->dis_dia_semana = $dis_dia_semana;
    }
    
    
    function getDis_local() {
        return $this->dis_local;
    }
    function setDis_local($dis_local) {
        $this->dis_local = $dis_local;
    }

}
?>