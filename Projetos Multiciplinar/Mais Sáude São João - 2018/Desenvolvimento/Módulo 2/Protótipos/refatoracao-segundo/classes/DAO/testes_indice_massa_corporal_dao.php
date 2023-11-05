<?php
require_once CLASS_PATH.'/banco_conexao.php';
require_once CLASS_PATH.'/testes_indice_massa_corporal.php';
class testes_indice_massa_corporal_dao {
	public static function select($cond) {
		$con = new banco_conexao();
		try {
			return $con->send_query("SELECT * FROM testes_indice_massa_corporal WHERE $cond");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function inserir(testes_indice_massa_corporal $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("INSERT INTO testes_indice_massa_corporal (IMC_STATUS, IMC_DATA, IMC_ALTURA, IMC_CODIGO, IMC_PESO, IMC_VALOR_IMC, FK_USUARIOS_USU_CODIGO) values (\'".$ent->get_imc_status()."\', \'".$ent->get_imc_data()."\', \'".$ent->get_imc_altura()."\', \'".$ent->get_imc_codigo()."\', \'".$ent->get_imc_peso()."\', \'".$ent->get_imc_valor_imc()."\', \'".$ent->get_fk_usuarios_usu_codigo()."\');");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function excluir(testes_indice_massa_corporal $ent, $cond) {
		$con = new banco_conexao();
		try {
			$con->send_query("DELETE FROM testes_indice_massa_corporal WHERE $cond");		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function alterar(testes_indice_massa_corporal $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("UPDATE testes_indice_massa_corporal SET(IMC_STATUS = \'".$ent->get_imc_status()."\', IMC_DATA = \'".$ent->get_imc_data()."\', IMC_ALTURA = \'".$ent->get_imc_altura()."\', IMC_CODIGO = \'".$ent->get_imc_codigo()."\', IMC_PESO = \'".$ent->get_imc_peso()."\', IMC_VALOR_IMC = \'".$ent->get_imc_valor_imc()."\', FK_USUARIOS_USU_CODIGO = \'".$ent->get_fk_usuarios_usu_codigo()."\');");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
}