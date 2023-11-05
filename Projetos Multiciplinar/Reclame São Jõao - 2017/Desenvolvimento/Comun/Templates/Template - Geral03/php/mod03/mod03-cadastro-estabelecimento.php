<!DOCTYPE html>


<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- INÍCIO DO META DO SLIDESHOW -->
			<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- FIM DO META DO SLIDESHOW -->

		<!-- TÍTULO DO SITE -->
			<title>Reclame São João</title>

		<!-- OUTROS -->
			<link href="../../css/bootstrap.min.css" rel="stylesheet">
			<link href="../../css/animate.min.css" rel="stylesheet">
			<link href="../../css/font-awesome.min.css" rel="stylesheet">

			<link href="../../css/main.css" rel="stylesheet">
			<link href="../../css/testes.css" rel="stylesheet">
			<link href="../../css/login.css" rel="stylesheet">
			<link href="../../css/estabelecimento.css" rel="stylesheet">
			<link href="../../css/responsive.css" rel="stylesheet">

			<link id="css-preset" href="../../css/presets/preset1.css" rel="stylesheet">
			<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
			<link rel="shortcut icon" href="../../images/favicon.ico">

		<!-- <style>
			input
			{
				border: 1px solid black;
			}
			input:required
			{
				border: 1px solid blue;
			}
			input:valid
			{
				border: 1px solid green;
			}
			input:invalid
			{
				border: 1px solid red;
			}
		</style> -->

	</head>

	<body>

		<!-- MENU DO SITE -->
		<div class="main-nav" >
		  <div class="container">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="../../index.html">
					<h1><img class="img-responsive" src="../../images/logo.png" alt="logo"></h1>
				  </a>
				</div>

				<!-- MENU DO SITE - OPÇÕES-->
				<div class="collapse navbar-collapse">
				  <ul class="nav navbar-nav navbar-right">
						<li class="scroll active"><a href="#contact">Cadastrar</a></li>
						<li class="scroll"><a href="../../index.html">Home</a></li>
						<li class="scroll"  ><a href="mod03-login-estabelecimento.html">Logar</a></li>
				  </ul>
				</div>
		  </div>
		</div>
		<!-- FIM DO MENU DO SITE -->


		<!-- CORPO DA PAGINA DE CADASTRO ESTABELECIMENTO -->
		<section id="contact">
			<div id="contact-us" class="parallax">
			  <div class="container">
				<div class="row">
				  <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
					<h2>Cadastre-se</h2>
					<p>Para ter acesso a todos os recursos oferecidos por nós!</p>
				  </div>
				</div>

				<!-- INÍCIO DO FORMULÁRIO -->
				<div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
				  <div class="row">
					<div class="col-sm-6 " style="width: 60%; margin-right:20%; margin-left:20%; ">
							<form action="mod03-preencher-perfil.php" method="post" style="border: 1px solid white; padding: 15px; 30px 0px;">
									<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

							<!--     NOME DA EMPRESA     -->
											  <div class="col-sm-6">
												<div class="form-group">
												  <input type="text" name="EST_NOME_EMPRESA" class="form-control" placeholder="Nome da empresa" required="required" maxlength="300" oninvalid="setCustomValidity('Por favor, digite o nome da empresa.')" onchange="try{setCustomValidity('')}catch(e){}">
												</div>
											  </div>

							<!--     NOME FANTASIA      -->
											  <div class="col-sm-6">
												<div class="form-group">
												  <input type="text" name="EST_NOME_FANTASIA" class="form-control" placeholder="Nome fantasia" required="required" maxlength="100" oninvalid="setCustomValidity('Por favor, digite o nome fantasia da empresa.')" onchange="try{setCustomValidity('')}catch(e){}">
												</div>
											  </div>
									</div>

									<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

							<!--     CNPJ      -->
											  <div class="col-sm-6">
												<div class="form-group">
												  <input type="text" name="EST_CNPJ" class="form-control" placeholder="CNPJ" OnKeyPress="formatar('##.###.###/###-##', this)" required="required" pattern=".{0}|.{18,18}" maxlength="18" oninvalid="setCustomValidity('Por favor, digite um CNPJ válido')" onchange="try{setCustomValidity('')}catch(e){}">
												</div>
											  </div>

							<!--     NOME DO RESPONSÁVEL      -->
											  <div class="col-sm-6">
												<div class="form-group">
												  <input type="text" name="EST_NOME_RESPONSAVEL" class="form-control" placeholder="Nome do responsável" required="required" maxlength="100" oninvalid="setCustomValidity('Por favor, digite o nome do responsável.')" onchange="try{setCustomValidity('')}catch(e){}">
												</div>
											  </div>
									</div>

									<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

							<!--     TIPO DE ESTABELECIMENTO      -->
											  <div class="col-sm-6">
												<div class="form-group">
												  <input type="text" name="EST_TIPO_ESTABELECIMENTO" class="form-control" placeholder="Tipo de Estabelecimento" required="required">
												</div>
											  </div>

							<!--     CEP      -->
											  <div class="col-sm-6">
												<div class="form-group">
												  <input type="text" name="EST_CEP" class="form-control" id="cep"; placeholder="CEP" OnKeyPress="formatar('#####-###', this)" onblur="pesquisacep(this.value);" required="required" pattern=".{0}|.{9,9}" maxlength="9" oninvalid="setCustomValidity('Por favor, informe um CEP válido.')" onchange="try{setCustomValidity('')}catch(e){}">
												</div>
											  </div>
									</div>

									<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

							<!--     RUA      -->
											  <div class="col-sm-6">
												<div class="form-group">
												  <input type="text" name="EST_RUA" id="EST_RUA" class="form-control" placeholder="Rua" required="required" oninvalid="setCustomValidity('Por favor, digite a rua da empresa')" onchange="try{setCustomValidity('')}catch(e){}">
												</div>
											  </div>

							<!--     BAIRRO      -->
											  <div class="col-sm-6">
												<div class="form-group">
												  <input type="text" name="EST_BAIRRO" id="EST_BAIRRO" class="form-control" placeholder="Bairro" required="required" oninvalid="setCustomValidity('Por favor, digite o bairro da empresa.')" onchange="try{setCustomValidity('')}catch(e){}">
												</div>
											  </div>
									</div>

									<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

							<!--     NÚMERO      -->
											  <div class="col-sm-6">
												<div class="form-group">
												  <input type="number" name="EST_NUMERO" class="form-control" placeholder="Número" required="required" oninvalid="setCustomValidity('Por favor, digite o numero da empresa.')" onchange="try{setCustomValidity('')}catch(e){}">
												</div>
											  </div>

							<!--     COMPLEMENTO      -->
											  <div class="col-sm-6">
												<div class="form-group">
												  <input type="text" name="EST_COMPLEMENTO" class="form-control" required="required" placeholder="Complemento">
												</div>
											  </div>
									</div>

									<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

							<!--     SITE DA EMPRESA      -->
											  <div class="col-sm-6">
												<div class="form-group">
												  <input type="url" name="EST_SITE_EMPRESA" class="form-control" placeholder="Site da empresa" required="required" oninvalid="setCustomValidity('Por favor, digite site da empresa corretamente')" onchange="try{setCustomValidity('')}catch(e){}">
												</div>
											  </div>

							<!--     EMAIL      -->
											  <div class="col-sm-6">
												<div class="form-group">
												  <input type="email" name="EST_EMAIL" class="form-control" placeholder="Email" required="required">
												</div>
											  </div>
									</div>


									<div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

							<!--     SENHA      -->
											  <div class="col-sm-6">
												<div class="form-group">
												  <input onkeyup="validaSenha();" type="password" name="senha1" id="senha1" class="form-control" placeholder="Senha" required="required">
												  <p id="resultado"> </p>
												</div>
											 </div>

							<!--     CONFIRMAR SENHA      -->
											 <div class="col-sm-6">
												<div class="form-group">
												  <input onkeyup="validaSenha();" type="password" name="senha2" id="senha2"  class="form-control" placeholder="Confirmar Senha" required="required">
												</div>
											 </div>
									</div>

									<div class="form-group" style="margin-bottom: 0px;">
									  <button type="submit" class="btn-submit2" " >Confirmar</button>
									</div>
							</form>
						<!-- FIM DO FORMULÁRIO -->
					</div>
				  </div>
				</div>
			  </div>
			</div>
		   </div>
		</section>

		<!-- RODAPÉ -->
			<footer id="footer" style="background-color: #232323; margin-bottom: -10%; margin-top: 18%;" >
				<div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
				<div class="container text-center">
				<div class="tudo">

					<div class="logo">
					<a href="../../index.html"><img style="margin-left: 30%; margin-top: 4%;"  class="img-responsive" src="../../images/logo.png" alt=""></a>
						<div id=icons" class="social-icons" style="margin-top: 5%;" >
						<ul>
						<li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
						<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>
						</ul>
						</div>
					</div>

					<div class="texto">
						<h3>Sobre nós</h3>
						<p>Somos uma equipe de alunos do Instituto Federal de São Paulo - Campus São João da Boa Vista, que buscam finalizar o projeto proposto em uma das disciplinas
						com o maior sucesso possível. <br/>
						Ao alcançar esse sucesso, estaremos proporcionando para a cidade um novo sistema que pode impulsionar o comércio justo e maior comprometimento
						por parte dos estabelecimentos presentes na cidade.</p>
					</div>
					</div>
					</div>
					</div>

						<div class="footer-bottom" style="background-color: #191919;">
						<div class="container" >
						<div class="row" >
							<div class="col-sm-6" style=" color: white">
								<p>&copy; 2017 IFSP-SBV</p>
							</div>
							<div class="col-sm-6">
								<p class="pull-right" style="color: white;">Construído por <a style="color: white;" href="http://sbv.ifsp.edu.br/">Equipe IFSP</a></p>
							</div>
						</div>
						</div>
						</div>
			</footer>

			  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="exampleModalLabel">Resposta</h4>
									</div>
									<div class="modal-body">
										<form method="POST" action="#" enctype="multipart/form-data">
											<div class="form-group">
												<label for="recipient-name" class="control-label">Título:</label>
												<input name="nome" type="text" class="form-control" id="recipient-name">
											</div>
											<div class="form-group">
												<label for="message-text" class="control-label">Resposta:</label>
												<textarea name="detalhes" class="textarea4" id="detalhes-text"></textarea>
											</div>

											<input name="id" type="hidden" id="id_curso">
											<div class="modal-footer">
												<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
												<button type="submit" class="btn btn-danger">Salvar</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
		<!-- FIM DO RODAPÉ -->

		<!-- SCRIPT EM GERAL -->
			<script type="text/javascript" src="../../js/jquery.js"></script>
			<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
			<script type="text/javascript" src="../../js/jquery.inview.min.js"></script>
			<script type="text/javascript" src="../../js/wow.min.js"></script>
			<script type="text/javascript" src="../../js/mousescroll.js"></script>
			<script type="text/javascript" src="../../js/smoothscroll.js"></script>
			<script type="text/javascript" src="../../js/jquery.countTo.js"></script>
			<script type="text/javascript" src="../../js/main.js"></script>
			<script type="text/javascript" src="validacao.js"></script>
		<!--FIM DO SCRIPT EM GERAL -->

		<script>
			// function formatar(mascara, documento)
			// {
			// 	var i = documento.value.length;
			// 	var saida = mascara.substring(0,1);
			// 	var texto = mascara.substring(i)
		  //
			// 		if (texto.substring(0,1) != saida)
			// 		{
			// 			documento.value += texto.substring(0,1);
			// 		}
			// }
		</script>


		<script type="text/javascript" >

			// function limpa_formulário_cep()
			// 	{
			// 			//Limpa valores do formulário de cep.
			// 				document.getElementById('EST_RUA').value=("");
			// 				document.getElementById('EST_BAIRRO').value=("");
			// 	}
			//
			// function meu_callback(conteudo)
			// 	{
			// 		if (!("erro" in conteudo))
			// 		{
			// 			//Atualiza os campos com os valores.
			// 				document.getElementById('EST_RUA').value=(conteudo.logradouro);
			// 				document.getElementById('EST_BAIRRO').value=(conteudo.bairro);
			// 		}
			// 		else
			// 		{
			// 			//CEP não Encontrado.
			// 				limpa_formulário_cep();
			// 				alert("CEP não encontrado.");
			// 		}
			// 	}
			//
			// function pesquisacep(valor)
			// {
			//
			// 	//Nova variável "cep" somente com dígitos.
			// 		var cep = valor.replace(/\D/g, '');
			//
			// 	//Verifica se campo cep possui valor informado.
			// 		if (cep != "")
			// 		{
			//
			// 			//Expressão regular para validar o CEP.
			// 				var validacep = /^[0-9]{8}$/;
			//
			// 			//Valida o formato do CEP.
			// 				if(validacep.test(cep))
			// 				{
			//
			// 				//Preenche os campos com "..." enquanto consulta webservice.
			// 					document.getElementById('EST_RUA').value="...";
			// 					document.getElementById('EST_BAIRRO').value="...";
			//
			// 				//Cria um elemento javascript.
			// 					var script = document.createElement('script');
			//
			// 				//Sincroniza com o callback.
			// 					script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
			//
			// 				//Insere script no documento e carrega o conteúdo.
			// 					document.body.appendChild(script);
			//
			// 				}
			// 				else
			// 				{
			// 					//cep é inválido.
			// 						limpa_formulário_cep();
			// 						alert("Formato de CEP inválido.");
			// 				}
			// 		}
			// 		else
			// 		{
			// 			//cep sem valor, limpa formulário.
			// 				limpa_formulário_cep();
			// 		}
			// };

		</script>


		<script type="text/javascript">
			// function validaSenha()
			// {
			// 	var campo1 = document.getElementById('senha1').value;
			// 	var campo2 = document.getElementById('senha2').value;
			//
			// 	if(campo1 == campo2)
			// 	{
			// 		document.getElementById('resultado').style.color = "#008B45";
			// 		document.getElementById('resultado').innerHTML = "As senhas são iguais";
			// 	}
			// 	else
			// 	{
			// 		document.getElementById('resultado').style.color = "#FF6347";
			// 		document.getElementById('resultado').innerHTML = "As senhas não correspondem";
			// 	}
			//
			// };
		</script>

	</body>
</html>
