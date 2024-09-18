<?php
class disponibilidade_agenda_educador_fisico{
    private $dic_codigo, $dis_status_hora, $dis_status_dia;
    function getDic_codigo() {
        return $this->dic_codigo;
    }

    function getDis_status_hora() {
        return $this->dis_status_hora;
    }

    function getDis_status_dia() {
        return $this->dis_status_dia;
    }

    function setDic_codigo($dic_codigo) {
        $this->dic_codigo = $dic_codigo;
    }

    function setDis_status_hora($dis_status_hora) {
        $this->dis_status_hora = $dis_status_hora;
    }

    function setDis_status_dia($dis_status_dia) {
        $this->dis_status_dia = $dis_status_dia;
    }


}
?>