<?php
	require_once '../../../../controle/phpMailer/PHPMailerAutoload.php';

	function enviarEmail($titulo,$conteudo,$destinatario) {
//$destinatario = "reclamesaojoao@gmail.com";
		$mail = new PHPMailer();
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = "reclamesaojoao@gmail.com";
		$mail->Password = "reclamesaojoao2017";

		$mail->setFrom('reclamesaojoao@gmail.com', utf8_decode('Site Reclame São João'));
		$mail->addReplyTo('reclamesaojoao@gmail.com', utf8_decode('Site Reclame São João'));
		$mail->addAddress($destinatario);
		$mail->Subject = utf8_decode($titulo);
		$mail->msgHTML(utf8_decode('
		<div style="margin:0!important;padding:0!important">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tbody>
				<tr>
					<td bgcolor="#64594f" align="center">
						<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:500px">
							<tbody>
								<tr>
									<td align="center" valign="top" style="padding:15px 0">
										<a href="http://localhost/RECLAME_SAO_JOAO-INTEGRAR" target="_blank">
										<img alt="Logo" src="https://i.imgur.com/kBA65Ul.png" width="250px" height="auto" style="display:block;font-family:Helvetica,Arial,sans-serif;color:#ffffff;font-size:16px" border="0" class="CToWUd">
										</a>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td bgcolor="#ffffff" align="center" style="padding:70px 15px 70px 15px">
						<table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px">
							<tbody>
								<tr>
									<td>
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tbody>
												<tr>
													<td>
														<table width="100%" border="0" cellspacing="0" cellpadding="0">
															<tbody>
																<tr>
																	<td align="center" style="font-size:16px;line-height:25px;font-family:Helvetica,Arial,sans-serif;color:#666666">
																		'.$conteudo.'
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				<tr>
					<td bgcolor="#191919" align="center" style="padding:20px 0px">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="max-width:800px">
							<tbody>
								<tr>
									<td align="center" style="font-size:12px;line-height:18px;font-family:Helvetica,Arial,sans-serif;color:#666666">
										© 2017 IFSP-SBV - Construído por Equipe IFSP - RECLAME SÃO JOÃO
										<br>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
		'));
		$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		));
		if (!$mail->send()) {
			echo "Erro ao enviar email: " . $mail->ErrorInfo;
			die();
		} else {
			//echo "Email enviado com sucesso!";
		}

	}
?>