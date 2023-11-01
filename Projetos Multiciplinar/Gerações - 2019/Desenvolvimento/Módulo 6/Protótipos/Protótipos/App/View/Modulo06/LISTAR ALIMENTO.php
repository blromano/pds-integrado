<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
	
		<title>Gerações</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="logo_02.png" type="image/x-icon" />
		<link rel="stylesheet" href="css/bootstrap.css">
	<script language="JavaScript" >
function enviardados(){
  
if(document.dados.tx_Pesquisar alimento.value=="" || document.dados.tx_Pesquisar alimento.value.length < 8)
{
alert( "Um ou mais campos não foram preenchidos corretamente”!" );
document.dados.tx_Pesquisar alimento.focus();
return false;
}
  
  
if( document.dados.tx_email.value=="" || document.dados.tx_email.value.indexOf('@')==-1 || document.dados.tx_email.value.indexOf('.')==-1 )
{
alert( "Preencha campo E-MAIL corretamente!" );
document.dados.tx_email.focus();
return false;
}
  
if (document.dados.tx_mensagem.value=="")
{
alert( "Preencha o campo MENSAGEM!" );
document.dados.tx_mensagem.focus();
return false;
}
  
if (document.dados.tx_mensagem.value.length < 50 )
{
alert( "É necessario preencher o campo MENSAGEM com mais de 50 caracteres!" );
document.dados.tx_mensagem.focus();
return false;
}
  
return true;
}
  
</script>
	</head>
	
	<body class="is-preload">

		<!-- Header -->
			<div id="header">
			

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<center><img src="arthur123.jpg""width="80%" height="60%" /></center>
							<center><h1 id="title">Arthur Lucas </h1></center>
							<center><p>Nutricionista</p></center>
						</div>
						

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="#top" id="top-link"><span class="fa fa-cutlery">Amostras</span></a></li>
								<li><a href="#file:///C:/Users/arthurl/Desktop/CADASTAR%20TIPO%20DE%20ALIMENTO.HTML#contact "><span class="fa fa-plus-square-o">  Cadastro Tipos  alimentos</span></a></li>
								<li><a href="#about" id="about-link"><span class="fa fa-medkit">Consultas</span></a></li>
								<li><a href="#contact" id="contact-link"><span class="fa fa-calendar-o">Agendar Consultas</span></a></li>
								<li><a href="#contact" id="contact-link"><span class="fa fa-apple">Inserir alimento </span></a></li>
								<li><a href="#contact" id="contact-link"><span class="fa fa-coffee"> cadastrar dados refeição </span></a></li>
								<li><a href="#contact" id="contact-link"><span class="fa fa-list"> Listar tipo de alimento </span></a></li>
								<li><a href="#contact" id="contact-link"><span class="fa fa-list"> Listar alimento </span></a></li>
								<li><a href="#contact" id="contact-link"><span class="fa fa-list"> Listar amostra </span></a></li>
								<li><a href="#contact" id="contact-link"><span class="fa fa-list"> Listar consulta </span></a></li>
									<li><a href="#contact" id="contact-link"><span class="fa fa-list"> Listar refeição </span></a></li>
									
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="https://twitter.com/10Ronaldinho" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
							<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
						</ul>

				</div>

			</div>

		<!-- Main -->
			<div id="main">

				<!-- Intro -->
					
						<div class="container"></div>
						<header>
								<h2 class="alt"> <strong></strong><a href="http://html5up.net/license"></a> <br />
						 <form action="pagina de ação" method="post" name="dados" onSubmit="return enviardados();" >
 
  
	<center><img src="listar alimento.png"width="20%" height="20%" /></center>


<form action=" " method="post">
  
  <a>Pesquisar alimento: </a>
  <input type="search" id="busca" name="q">
  <button type="submit">Procurar</button>
  <center><img src="maça.jpg"width="20%" height="20%" /></center>

<table width="200" border="0" align="center" >
    <tr>
      <p><td width="118"><font size="4" face="Verdana, Arial, Helvetica, sans-serif">Nome:</font></td></p>
      <td width="260">
        <input name="tx_nome" type="text" class="formbutton" id="tx_nome" size="30" maxlength="80">
      </td>
    </tr>
<tr>
      <p><td width="118"><font size="4" face="Verdana, Arial, Helvetica, sans-serif">Caloria:</font></td></p>
      <td width="260">
        <input name="tx_nome" type="text" class="formbutton" id="tx_nome" size="30" maxlength="80">
      </td>
    </tr>
	<tr>
      <p><td width="118"><font size="4" face="Verdana, Arial, Helvetica, sans-serif">Quantidade do alimento</font></td></p>
      <td width="260">
        <input name="tx_nome" type="text" class="formbutton" id="tx_nome" size="30" maxlength="80">
      </td>
    </tr>
<p><td width="118"><font size="4" face="Verdana, Arial, Helvetica, sans-serif">Tipo de alimentos:</font></td></p>
      <td width="260">
	  <select name="estados-brasil">
	<option value="AC">Carboidratos</option>
	<option value="AC">Verduras e Legumes</option>
	<option value="AL">Frutas</option>
	<option value="AC">Leite e derivados</option>
	<option value="AC">Carnes e Ovos</option>
	<option value="AC">Leguminosas e oleaginosas</option>
	<option value="AL">Óleos e Gorduras</option>
	<option value="AC">Açúcares e Doces</option>
	
	</select>
       <tr>
      <p><td width="118"><font size="4" face="Verdana, Arial, Helvetica, sans-serif">Unidade:</font></td></p>
      <td width="260">
        <input name="tx_nome" type="text" class="formbutton" id="tx_nome" size="30" maxlength="80">
      </td>
    </tr>
      
    </tr>
	</br>
	
  
        
      </td>
    </tr>
  </table>
  </table>
</form>    
		
  
	
	
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>	
   
	</body>
</html>