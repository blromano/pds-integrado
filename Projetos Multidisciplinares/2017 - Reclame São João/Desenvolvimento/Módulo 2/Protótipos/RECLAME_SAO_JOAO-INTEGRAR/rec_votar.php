<?php
	include_once "../conexao.php";
	if(isset($_POST['votar'])){
		$artigoId = (int)$_POST['artigo'];
		$ponto = (int)$_POST['ponto'];

		$pegaArtigo = $pdo->prepare("SELECT votos, pontos FROM `estabelecimentos` WHERE `EST_ID` = ?");
		$pegaArtigo->execute(array($artigoId));
		while($row = $pegaArtigo->fetchObject()){
			$pontosUpd = ($row->pontos+$ponto);
			$votosUpd = ($row->votos+1);

			$atualizaArtigo = $pdo->prepare("UPDATE `estabelecimentos` SET `votos` = ?, `pontos` = ? WHERE `EST_ID` = ?");
			if($atualizaArtigo->execute(array($votosUpd, $pontosUpd, $artigoId))){
				$calculo = round(($pontosUpd/$votosUpd),1);
				die(json_encode(array('average' => $calculo, 'votos' => $votosUpd)));
				
			}
		}
	}
?>
