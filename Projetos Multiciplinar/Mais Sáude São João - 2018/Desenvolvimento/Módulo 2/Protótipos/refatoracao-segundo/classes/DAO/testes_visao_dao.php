<?php
require_once CLASS_PATH.'/banco_conexao.php';
require_once CLASS_PATH.'/testes_visao.php';
class testes_visao_dao {
	public static function select($cond) {
		$con = new banco_conexao();
		try {
			return $con->send_query("SELECT * FROM testes_visao WHERE $cond");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function inserir(testes_visao $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("INSERT INTO testes_visao (TVI_TESTE_DALT_2, TVI_RESPOSTA_HIPERMETROPIA, TVI_TESTE_DALT_1, TVI_TESTE_ASTIGMATISMO, TVI_STATUS_DALTONISMO, TVI_STATUS_MIOPIA, TVI_STATUS_HIPERMETROPIA, TVI_TESTE_HIPER_MIO, TVI_TESTE_DALT_4, TVI_CODIGO, TVI_TESTE_DALT_3, TVI_DATA, TVI_STATUS_ASTIGMATISMO, TVI_RESPOSTA_ASTIGMATISMO, TVI_RESPOSTA_MIOPIA, FK_USUARIOS_USU_CODIGO) values (\'".$ent->get_tvi_teste_dalt_2()."\', \'".$ent->get_tvi_resposta_hipermetropia()."\', \'".$ent->get_tvi_teste_dalt_1()."\', \'".$ent->get_tvi_teste_astigmatismo()."\', \'".$ent->get_tvi_status_daltonismo()."\', \'".$ent->get_tvi_status_miopia()."\', \'".$ent->get_tvi_status_hipermetropia()."\', \'".$ent->get_tvi_teste_hiper_mio()."\', \'".$ent->get_tvi_teste_dalt_4()."\', \'".$ent->get_tvi_codigo()."\', \'".$ent->get_tvi_teste_dalt_3()."\', \'".$ent->get_tvi_data()."\', \'".$ent->get_tvi_status_astigmatismo()."\', \'".$ent->get_tvi_resposta_astigmatismo()."\', \'".$ent->get_tvi_resposta_miopia()."\', \'".$ent->get_fk_usuarios_usu_codigo()."\');");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function excluir(testes_visao $ent, $cond) {
		$con = new banco_conexao();
		try {
			$con->send_query("DELETE FROM testes_visao WHERE $cond");		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function alterar(testes_visao $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("UPDATE testes_visao SET(TVI_TESTE_DALT_2 = \'".$ent->get_tvi_teste_dalt_2()."\', TVI_RESPOSTA_HIPERMETROPIA = \'".$ent->get_tvi_resposta_hipermetropia()."\', TVI_TESTE_DALT_1 = \'".$ent->get_tvi_teste_dalt_1()."\', TVI_TESTE_ASTIGMATISMO = \'".$ent->get_tvi_teste_astigmatismo()."\', TVI_STATUS_DALTONISMO = \'".$ent->get_tvi_status_daltonismo()."\', TVI_STATUS_MIOPIA = \'".$ent->get_tvi_status_miopia()."\', TVI_STATUS_HIPERMETROPIA = \'".$ent->get_tvi_status_hipermetropia()."\', TVI_TESTE_HIPER_MIO = \'".$ent->get_tvi_teste_hiper_mio()."\', TVI_TESTE_DALT_4 = \'".$ent->get_tvi_teste_dalt_4()."\', TVI_CODIGO = \'".$ent->get_tvi_codigo()."\', TVI_TESTE_DALT_3 = \'".$ent->get_tvi_teste_dalt_3()."\', TVI_DATA = \'".$ent->get_tvi_data()."\', TVI_STATUS_ASTIGMATISMO = \'".$ent->get_tvi_status_astigmatismo()."\', TVI_RESPOSTA_ASTIGMATISMO = \'".$ent->get_tvi_resposta_astigmatismo()."\', TVI_RESPOSTA_MIOPIA = \'".$ent->get_tvi_resposta_miopia()."\', FK_USUARIOS_USU_CODIGO = \'".$ent->get_fk_usuarios_usu_codigo()."\');");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
}