<?php
require_once CLASS_PATH.'/banco_conexao.php';
require_once CLASS_PATH.'/testes_capacidade_pulmonar.php';
class testes_capacidade_pulmonar_dao {
	public static function select($cond) {
		$con = new banco_conexao();
		try {
			return $con->send_query("SELECT * FROM testes_capacidade_pulmonar WHERE $cond");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function inserir(testes_capacidade_pulmonar $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("INSERT INTO testes_capacidade_pulmonar (CPR_CAPACIDADE, CPR_DATA, CPR_EXPIRACAO, CPR_CODIGO, CPR_INSPIRACAO, CPR_STATUS, FK_USUARIOS_USU_CODIGO) values (\'".$ent->get_cpr_capacidade()."\', \'".$ent->get_cpr_data()."\', \'".$ent->get_cpr_expiracao()."\', \'".$ent->get_cpr_codigo()."\', \'".$ent->get_cpr_inspiracao()."\', \'".$ent->get_cpr_status()."\', \'".$ent->get_fk_usuarios_usu_codigo()."\');");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function excluir(testes_capacidade_pulmonar $ent, $cond) {
		$con = new banco_conexao();
		try {
			$con->send_query("DELETE FROM testes_capacidade_pulmonar WHERE $cond");		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function alterar(testes_capacidade_pulmonar $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("UPDATE testes_capacidade_pulmonar SET(CPR_CAPACIDADE = \'".$ent->get_cpr_capacidade()."\', CPR_DATA = \'".$ent->get_cpr_data()."\', CPR_EXPIRACAO = \'".$ent->get_cpr_expiracao()."\', CPR_CODIGO = \'".$ent->get_cpr_codigo()."\', CPR_INSPIRACAO = \'".$ent->get_cpr_inspiracao()."\', CPR_STATUS = \'".$ent->get_cpr_status()."\', FK_USUARIOS_USU_CODIGO = \'".$ent->get_fk_usuarios_usu_codigo()."\');");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
}