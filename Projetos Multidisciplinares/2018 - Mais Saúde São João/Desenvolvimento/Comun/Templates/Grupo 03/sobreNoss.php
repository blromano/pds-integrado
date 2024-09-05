<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sobre</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Language" content="pt-br">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
        </style>
    </head>
<body  style="background-color: #50a3a2">
    <div class="container"
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
 <img src="img/Logo2.png" alt="Avatar" class="w3-left w3-circle " style="width:60px">
  <!--<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><img src="img/logo02.png" alt="" style="width: 20%;height: 10%"/></a>-->
  <a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-bar-block" title="News">Inicio</a>
  <a href="Perfil.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-bar-block" title="Account Settings">Perfil</a>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications">Atividades Fisícas</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">Checkup</a>
      <a href="#" class="w3-bar-item w3-button">Treinos</a>
      <a href="#" class="w3-bar-item w3-button">Resultados dos Treinamentos</a>
      <a href="#" class="w3-bar-item w3-button">Ferramentas Esportivas</a>
    </div>
  </div>
  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button w3-padding-large" title="Notifications">Nutrição</span></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
      <a href="#" class="w3-bar-item w3-button">Plano Alimentar/Cardapio</a>
      <a href="#" class="w3-bar-item w3-button">Diário de Bordo</a>
      <a href="#" class="w3-bar-item w3-button">Ferramentas Nutricionais</a>
    </div>
  </div>
  <div style="float: right"><a href="index.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-bar-block" title="Messages">Sair</a></div>
  
 </div>
</div>
<div class="w3-col-sm-2"></div>
<div class="w3-container w3-content w3-center" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  
  <div class="row">
    <!-- Left Column -->
    <div style="margin-left: 15%">
    <div class="w3-col m10" >
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h3 class="w3-center">SOBRE NÓS</h3>
         <p>Somos um projeto serio, criados pelo instituto federal e desenvolvido por uma equipe de 50<br>pessoas.
             Nossa proposta é melhorar a saúde da população, para isso contamos com especialistas, e com uma comunidade<br>
             dedicadada.Nossa lema é: SAUDE SEMPRE, MORRER JAMAIS!<BR><BR><br>
             <h4>Contatos:</h4>
             <p>tel: (19)98282-8282</p>
              <p>email: maisSaude@maisSaude.com.br</p>
         </div>
      </div>
      <br>
    </div>
    </div>
  </div>
</div>
      
      
   <br/>  
   <br/>  
   <br/>  <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/>  
   <br/> 
      

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-16">
    <div style="text-align: center"><img src="img/logo02.png" alt=""/></div>
	<img src="img/Logo2-1.png" alt="Avatar"  style="width:130px">
</footer>
<footer class="w3-container w3-theme-d5">
  
</footer>
 
<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>