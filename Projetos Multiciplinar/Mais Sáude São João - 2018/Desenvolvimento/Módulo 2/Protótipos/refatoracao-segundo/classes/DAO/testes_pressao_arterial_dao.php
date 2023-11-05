<?php
require_once CLASS_PATH.'/banco_conexao.php';
require_once CLASS_PATH.'/testes_pressao_arterial.php';
class testes_pressao_arterial_dao {
	public static function select($cond) {
		$con = new banco_conexao();
		try {
			return $con->send_query("SELECT * FROM testes_pressao_arterial WHERE $cond");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function inserir(testes_pressao_arterial $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("INSERT INTO testes_pressao_arterial (PRA_PRESSAO_DIASTOLICA, PRA_PRECAO_SISTOLICA, PRA_CODIGO, PRA_DATA, PRA_STATUS, FK_USUARIOS_USU_CODIGO) values (\'".$ent->get_pra_pressao_diastolica()."\', \'".$ent->get_pra_precao_sistolica()."\', \'".$ent->get_pra_codigo()."\', \'".$ent->get_pra_data()."\', \'".$ent->get_pra_status()."\', \'".$ent->get_fk_usuarios_usu_codigo()."\');");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function excluir(testes_pressao_arterial $ent, $cond) {
		$con = new banco_conexao();
		try {
			$con->send_query("DELETE FROM testes_pressao_arterial WHERE $cond");		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function alterar(testes_pressao_arterial $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("UPDATE testes_pressao_arterial SET(PRA_PRESSAO_DIASTOLICA = \'".$ent->get_pra_pressao_diastolica()."\', PRA_PRECAO_SISTOLICA = \'".$ent->get_pra_precao_sistolica()."\', PRA_CODIGO = \'".$ent->get_pra_codigo()."\', PRA_DATA = \'".$ent->get_pra_data()."\', PRA_STATUS = \'".$ent->get_pra_status()."\', FK_USUARIOS_USU_CODIGO = \'".$ent->get_fk_usuarios_usu_codigo()."\');");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
}