<?php 
	session_start();
	include ('../../controle/NotificacoesDAO.php');
	include ('../../controle/ConsumidorDAO.php');
	include ("../../controle/ReclamacoesDAO.php");
	include ("../../controle/AgendarReuniaoDAO.php");

	//Classe NotificacoesDAO
		$notificacoesDAO = new NotificacoesDAO;
	
	//Classe ReclamacaoDAO
		$ReclamacaoDAO = new ReclamacoesDAO;
		
	//Classe ConsumidorDAO
		$ConsumidorDAO = new ConsumidorDAO;
		
	//Ação Notificação
		$acao_notificacao = strip_tags(trim($_GET['acao']));
		
	//ID do Usuário Logado
		//$USU_ID = $_SESSION['USU_ID'];
		 $USU_ID = 6;
		
	//ID do Consumidor passando como parametro o USU_ID
		//$CON_ID = $ConsumidorDAO->idCon($USU_ID);
		$CON_ID = 6;
		
	//Função primeira letra Maiscúla
		$primeiromaiusculo = $ReclamacaoDAO->primeiroMaiusculo();
	
	//Menu de Opções
		switch ($acao_notificacao) 
			{
				case 'verificar':
					//Exibir número de notificações não visualizadas
						$total = $notificacoesDAO->contarNotIdNaoVisualizado($CON_ID);
						$_SESSION['rec_notificacao_total'] = $total;
						echo $total;
						break;

				case 'getnots':
					//Exibir todas as notificações
						$get_respondida = $notificacoesDAO->listarInformacao($CON_ID);
						$li = '';
							foreach ($get_respondida as $row)
								{
									$li .= '<li class="n" id="'.$row["idn"].'">';
									//$li .= '<div class="imgn"></div>'; 
									$li .= '<div class="contn">';
									
									$vis   = ($row["NOT_VISUALIZADA"] == 0) ? 'vis' : 'vis2';
									$title = ($row["NOT_VISUALIZADA"] == 0) ? 'Não visualizado' : 'Visualizado';
												
									$li .= '<div class="'.$vis.'" id="'.$row["idn"].'" title="'.$title.'"> </div>';
									
										if($row["NOT_TIPO_NOTIFICACAO"] == 1)
											{
												$li .= '. Nova '.$row["NOT_TIPO_NOTIFICACAO"].':  <span> no dia '.date('d/m/Y', strtotime($row["NOT_DATA_EVENTO"])).'</span>';
											}
										else
											{
												$li .= '. Nova '.$row["NOT_TIPO_NOTIFICACAO"].':  <span> no dia '.date('d/m/Y', strtotime($row["NOT_DATA_EVENTO"])).'</span>';
											}
												$li .= '</div>'; 

												

												
												$li .= '</li>';
								}
	
							echo $li;
							break;
	
				case 'vis':
					//Atualizar notificação visualizada
						$idnot = $_GET['idnot'];
	
						if(!empty($idnot) and is_numeric($idnot))
							{
								$atualiza = $notificacoesDAO->atualizarVisualizado($idnot);

								if($atualiza): echo 'Visualizado!'; endif;
							}
					break;

					default:
					echo 'Erro';
					break;
			} 