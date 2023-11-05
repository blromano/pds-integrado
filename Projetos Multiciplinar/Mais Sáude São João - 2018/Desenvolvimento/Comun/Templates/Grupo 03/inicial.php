<html lang="pt-br">
<title>Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Language" content="pt-br">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body  style="background-color: #50a3a2">
<div style="background-color: #50a3a2">
<!-- Navbar -->
<div class="w3-top" style="background-color = #50a3a2">
 <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
  <!--<a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white" title="News"><img src="img/logo02.png" alt="" style="width: 20%;height: 10%"/></a>-->
  <img src="img/Logo2.png" alt="Avatar" class="w3-left w3-circle " style="width:60px">
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-bar-block" title="News">Inicio</a>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-bar-block" title="Account Settings">Perfil</a>
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

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Ramon Turati</h4>
         <p class="w3-center"><img src="img/ww.jpg" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Educador Fisico</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> Sao Joao, BR</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> 12/09/1993</p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
     
      
      <!-- Interests --> 
 
      
      <!-- Alert Box -->
   
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">
              <p contenteditable="true" class="w3-border w3-padding">Status</p>
              <button type="button" class="w3-button w3-theme"></i> Foto</button> 
			   <button type="button" class="w3-button w3-theme"><i class="fa fa-pencil"></i> Postar</button> 
            </div>
          </div>
        </div>
      </div>
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="img/user2.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">1 min</span>
        <h4>Joao Victor Missaci</h4><br>
        <hr class="w3-clear">
        <p>bora comer um lanchao depois do treino, mas tomar uma coca zero pq estou de dieta </p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="img/comida1.jpg" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
              <img src="img/comida2.jpg" style="width:100%" alt="Nature" class="w3-margin-bottom">
          </div>
        </div>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Like</button> 
        <button onclick="myFunction('Demo1')" type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment" "fa fa-calendar-check-o fa-fw w3-margin-right" ></i> Comentar</button> 
          <div id="Demo1" class="w3-hide w3-container" style="background-color : #99BAD6; margin: 0px;">
			<form action="">
				<br>
				<textarea rows="4" cols="50" name="comment" form="usrform">Enter text here...</textarea>
				<br>
				<input type="submit" value="comentar">
			</form> 
<br>
          </div>
		  <br>
      </div>
      
      
      <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
        <img src="img/user3.jpg" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity">32 min</span>
        <h4>Angie Jane</h4><br>
        <hr class="w3-clear">
        <p>Genteeeee olha isso!!!!</p>
        <img src="img/comida3.jpg" style="width:100%" class="w3-margin-bottom">
        <p>Comecando o dia com uma saladinha.</p>
        <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Like</button> 
        <button onclick="myFunction('Demo2')" type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment" "fa fa-calendar-check-o fa-fw w3-margin-right" ></i> Comentar</button> 
          <div id="Demo2" class="w3-hide w3-container" style="background-color : #99BAD6; margin: 0px;">
			<form action="">
				<br>
				<textarea rows="4" cols="50" name="comment" form="usrform">Enter text here...</textarea>
				<br>
				<input type="submit" value="comentar">
			</form> 
<br>
          </div>
		  <br>
      </div> 
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Urgente!!!
          <img src="img/img.png" alt="Forest" style="width:100%;">
          <p><strong>Calcule agora!!</strong></p>
          <p>Venha calcular seu IMC</p>
         <a href="https://www.tuasaude.com/calculadora/imc/" target="_blank"> <p><button class="w3-button w3-block w3-theme-l4">Mais</button></p></a>
        </div>
      </div>
      <br>
      
      
      
      <br>
      
     
      <br>
    
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

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
</div>
</body>
</html> 

        
