	<div class="container">
		<form method="POST" action="login.php">
		    <div class="form-group">
		    	<label for="exampleInputEmail1">E-Mail</label>
		    	<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
		    </div>
		    <div class="form-group">
		        <label for="exampleInputPassword1">Senha</label>
		    	<input type="password" class="form-control" id="exampleInputPassword1" name="pass">
		    </div>
			<button type="submit" class="btn btn-secondary">Entrar</button>
		</form>

		<div class="alert alert-danger alert-dismissible fade show" role="alert" id="resp" style="display: none;">
			O e-mail ou senha inserido estão incorretos.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  	<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>

<?php
if(isset($_GET['erro']) && !empty($_GET['erro'])){
	if ($_GET['erro'] == 1) {
		echo 
		'<script type="text/javascript">
			document.getElementById("resp").style.display = "block";
		</script>';
	}else{
		header("Location: ../processoCerveja");
	}
	
}