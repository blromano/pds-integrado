<!DOCTYPE html>


<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>login</title>
  
  
  
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
</head>

<body>
<div class="container">
  <div class="wrapper" >
	<div class="container">
            <h1 style="text-align: center;font-size: 70px">Cadastro</h1>
            <form  style="margin-top: 130px" action="index.php" method="POST">
                    <input type="text" placeholder="Nome" name="nome">
                    <input type="text" placeholder="Sobrenome" name="sobrenome">
                    <input type="text" placeholder="Email" name="email">
                    <input type="text" placeholder="Confirmar Email" name="email2">
                    <input type="password" placeholder="Senha" name="senha">
                    <input type="password" placeholder="Confirmar Senha" name="senha2">
                    <button type="button"  id="login-button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Cadastrar</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

    <script  src="js/index.js"></script>

<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Cadastrado com sucesso</h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          Obrigado pelo seu cadastro
        </div>

        <!-- Modal footer -->
        
         
          <form  style="margin-top: 130px;" action="index.php" method="POST">
                    <button type="submit" id="login-button" class="btn btn-info"
					style="margin-left=1000px">OK</button>
		</form>
        

      </div>
    </div>
  </div>

</div>
</body>

</html>