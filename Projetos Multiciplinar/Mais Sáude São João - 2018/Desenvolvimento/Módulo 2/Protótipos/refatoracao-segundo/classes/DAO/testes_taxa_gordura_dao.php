<?php
require_once CLASS_PATH.'/banco_conexao.php';
require_once CLASS_PATH.'/testes_taxa_gordura.php';
class testes_taxa_gordura_dao {
	public static function select($cond) {
		$con = new banco_conexao();
		try {
			return $con->send_query("SELECT * FROM testes_taxa_gordura WHERE $cond");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function inserir(testes_taxa_gordura $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("INSERT INTO testes_taxa_gordura (TXG_SEXO, TXG_IMC, TXG_CODIGO, TXG_DATA, TXG_PERCENTUAL, TXG_IDADE, TXG_VALOR, TXG_STATUS, FK_USUARIOS_USU_CODIGO) values (\'".$ent->get_txg_sexo()."\', \'".$ent->get_txg_imc()."\', \'".$ent->get_txg_codigo()."\', \'".$ent->get_txg_data()."\', \'".$ent->get_txg_percentual()."\', \'".$ent->get_txg_idade()."\', \'".$ent->get_txg_valor()."\', \'".$ent->get_txg_status()."\', \'".$ent->get_fk_usuarios_usu_codigo()."\');");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function excluir(testes_taxa_gordura $ent, $cond) {
		$con = new banco_conexao();
		try {
			$con->send_query("DELETE FROM testes_taxa_gordura WHERE $cond");		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function alterar(testes_taxa_gordura $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("UPDATE testes_taxa_gordura SET(TXG_SEXO = \'".$ent->get_txg_sexo()."\', TXG_IMC = \'".$ent->get_txg_imc()."\', TXG_CODIGO = \'".$ent->get_txg_codigo()."\', TXG_DATA = \'".$ent->get_txg_data()."\', TXG_PERCENTUAL = \'".$ent->get_txg_percentual()."\', TXG_IDADE = \'".$ent->get_txg_idade()."\', TXG_VALOR = \'".$ent->get_txg_valor()."\', TXG_STATUS = \'".$ent->get_txg_status()."\', FK_USUARIOS_USU_CODIGO = \'".$ent->get_fk_usuarios_usu_codigo()."\');");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
}