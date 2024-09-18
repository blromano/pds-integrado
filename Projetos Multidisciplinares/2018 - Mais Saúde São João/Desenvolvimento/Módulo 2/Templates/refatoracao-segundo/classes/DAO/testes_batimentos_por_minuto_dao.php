<?php
require_once CLASS_PATH.'/banco_conexao.php';
require_once CLASS_PATH.'/testes_batimentos_por_minuto.php';
class testes_batimentos_por_minuto_dao {
	public static function select($cond) {
		$con = new banco_conexao();
		try {
			return $con->send_query("SELECT * FROM testes_batimentos_por_minuto WHERE $cond");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function inserir(testes_batimentos_por_minuto $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("INSERT INTO testes_batimentos_por_minuto (BPM_BATIMENTOS, BPM_STATUS, BPM_DATA, BPM_CODIGO, FK_USUARIOS_USU_CODIGO) values (\'".$ent->get_bpm_batimentos()."\', \'".$ent->get_bpm_status()."\', \'".$ent->get_bpm_data()."\', \'".$ent->get_bpm_codigo()."\', \'".$ent->get_fk_usuarios_usu_codigo()."\');");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function excluir(testes_batimentos_por_minuto $ent, $cond) {
		$con = new banco_conexao();
		try {
			$con->send_query("DELETE FROM testes_batimentos_por_minuto WHERE $cond");		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function alterar(testes_batimentos_por_minuto $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("UPDATE testes_batimentos_por_minuto SET(BPM_BATIMENTOS = \'".$ent->get_bpm_batimentos()."\', BPM_STATUS = \'".$ent->get_bpm_status()."\', BPM_DATA = \'".$ent->get_bpm_data()."\', BPM_CODIGO = \'".$ent->get_bpm_codigo()."\', FK_USUARIOS_USU_CODIGO = \'".$ent->get_fk_usuarios_usu_codigo()."\');");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
}