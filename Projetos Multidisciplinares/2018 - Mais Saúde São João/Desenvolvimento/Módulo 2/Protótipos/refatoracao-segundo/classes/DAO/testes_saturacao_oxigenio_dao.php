<?php
require_once CLASS_PATH.'/banco_conexao.php';
require_once CLASS_PATH.'/testes_saturacao_oxigenio.php';
class testes_saturacao_oxigenio_dao {
	public static function select($cond) {
		$con = new banco_conexao();
		try {
			return $con->send_query("SELECT * FROM testes_saturacao_oxigenio WHERE $cond");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function inserir(testes_saturacao_oxigenio $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("INSERT INTO testes_saturacao_oxigenio (SAT_STATUS, SAT_DATA, SAT_PORCENTAGEM, SAT_CODIGO, FK_USUARIOS_USU_CODIGO) values (\'".$ent->get_sat_status()."\', \'".$ent->get_sat_data()."\', \'".$ent->get_sat_porcentagem()."\', \'".$ent->get_sat_codigo()."\', \'".$ent->get_fk_usuarios_usu_codigo()."\');");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function excluir(testes_saturacao_oxigenio $ent, $cond) {
		$con = new banco_conexao();
		try {
			$con->send_query("DELETE FROM testes_saturacao_oxigenio WHERE $cond");		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function alterar(testes_saturacao_oxigenio $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("UPDATE testes_saturacao_oxigenio SET(SAT_STATUS = \'".$ent->get_sat_status()."\', SAT_DATA = \'".$ent->get_sat_data()."\', SAT_PORCENTAGEM = \'".$ent->get_sat_porcentagem()."\', SAT_CODIGO = \'".$ent->get_sat_codigo()."\', FK_USUARIOS_USU_CODIGO = \'".$ent->get_fk_usuarios_usu_codigo()."\');");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
}