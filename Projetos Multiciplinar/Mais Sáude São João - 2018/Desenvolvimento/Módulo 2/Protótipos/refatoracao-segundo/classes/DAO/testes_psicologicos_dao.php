<?php
require_once '../banco_conexao.php';
require_once '../checkups_imc.php';
class testes_psicologicos_dao {
	public static function inserir(testes_psicologicos $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("INSERT INTO testes_psicologicos (TPS_RESPOSTA_PERGUNTA_11, TPS_RESPOSTA_PERGUNTA_14, TPS_DATA, TPS_RESPOSTA_PERGUNTA_5, TPS_RESPOSTA_PERGUNTA_3, TPS_RESPOSTA_PERGUNTA_8, TPS_RESPOSTA_PERGUNTA_7, TPS_RESPOSTA_PERGUNTA_13, TPS_RESULTADO, TPS_RESPOSTA_PERGUNTA_2, TPS_RESPOSTA_PERGUNTA6, TPS_PONTUACAO, TPS_RESPOSTA_PERGUNTA_15, TPS_RESPOSTA_PERGUNTA_1, TPS_CODIGO, TPS_RESPOSTA_PERGUNTA_10, TPS_RESPOSTA_PERGUNTA_12, TPS_RESPOSTA_PERGUNTA_9, TPS_RESPOSTA_PERGUNTA_4, FK_USUARIOS_USU_CODIGO) values ($ent->get_tps_resposta_pergunta_11(), $ent->get_tps_resposta_pergunta_14(), $ent->get_tps_data(), $ent->get_tps_resposta_pergunta_5(), $ent->get_tps_resposta_pergunta_3(), $ent->get_tps_resposta_pergunta_8(), $ent->get_tps_resposta_pergunta_7(), $ent->get_tps_resposta_pergunta_13(), $ent->get_tps_resultado(), $ent->get_tps_resposta_pergunta_2(), $ent->get_tps_resposta_pergunta6(), $ent->get_tps_pontuacao(), $ent->get_tps_resposta_pergunta_15(), $ent->get_tps_resposta_pergunta_1(), $ent->get_tps_codigo(), $ent->get_tps_resposta_pergunta_10(), $ent->get_tps_resposta_pergunta_12(), $ent->get_tps_resposta_pergunta_9(), $ent->get_tps_resposta_pergunta_4(), $ent->get_fk_usuarios_usu_codigo());");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
	public static function excluir_imc($cod) {
		$con = new banco_conexao();
		try {
			$con->send_query("DELETE FROM testes_psicologicos WHERE TPS_CODIGO = $cod");
		} catch (PDOException $ex) {
			echo $ex->getMessage();
		}
	}
	public static function alterar(testes_psicologicos $ent) {
		$con = new banco_conexao();
		try {
			$con->send_query("UPDATE testes_psicologicos SET(t = $ent->get_t(), t = $ent->get_t(), 0 = $ent->get_0(), 0 = $ent->get_0(), P = $ent->get_p(), P = $ent->get_p(), 1 = $ent->get_1(), 1 = $ent->get_1(), T = $ent->get_t(), T = $ent->get_t(), A = $ent->get_a(), A = $ent->get_a(), 0 = $ent->get_0(), 0 = $ent->get_0(),  = $ent->get_() = $ent->get_() = $ent->get_() = $ent->get_() = $ent->get_() = $ent->get_()B = $ent->get_b(), B = $ent->get_b(),  = $ent->get_() = $ent->get_() = $ent->get_() = $ent->get_());");
		} catch (PDOException $ex) {
			 echo $ex->getMessage(); 
 		}
	}
}