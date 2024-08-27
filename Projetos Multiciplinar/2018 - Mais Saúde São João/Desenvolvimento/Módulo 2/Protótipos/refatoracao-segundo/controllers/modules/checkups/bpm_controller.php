<?php
require_once CLASS_PATH . '/DAO/testes_batimentos_por_minuto_dao.php';
require_once CLASS_PATH . '/testes_batimentos_por_minuto.php';


class ControllerBPM {
    public static function get_bpm_list($user) {
        $date_ini = (array_key_exists("date-ini", $_POST)) ? filter_input(INPUT_POST, "date-ini") : null;
        $date_end = (array_key_exists("date-end", $_POST)) ? filter_input(INPUT_POST, "date-end") : null;
        
        $bpm_dao = new testes_batimentos_por_minuto_dao();
        $class = new ReflectionClass('testes_batimentos_por_minuto');
        $args = $bpm_dao->select("FK_USUARIOS_USU_CODIGO = $user".((isset($date_ini) && !empty($date_ini))?" AND BPM_DATA >= $date_ini":"").((isset($date_end) && !empty($date_end))?" AND BPM_DATA <= $date_end":""));
        $tbpm = array();
        foreach($args as $arg) {
            $filtered_arg = array();
            foreach($arg as $k => $a) { if(!is_numeric($k)) $filtered_arg[] = $a; }
            $tbpm[] = $class->newInstanceArgs($filtered_arg);
        }        
        return $tbpm;
    }
}