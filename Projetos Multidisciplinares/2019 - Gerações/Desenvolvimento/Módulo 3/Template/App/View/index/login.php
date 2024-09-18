<body class="fotologin text-info">
	<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12  bg-light">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info text-info display-4">Entrar</h3>
                            <div class="form-group">
                                <label for="username" class="text-info text-info display-5">Prontuário:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info text-info display-5">Senha:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <p> Ainda não possui conta em nosso sistema? <a href="/registro"> Cadastre-se aqui </a> 
                            <div class="form-group" style="text-align: center" data-toggle="modal" data-target="#modalCookie1">
                                 <a class="btn btn-info" href="/dashboard"> Enviar </a> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade top" id="modalCookie1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
    <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="row d-flex justify-content-center align-items-center">
              <p class="pt-3 pr-2">Desculpe, site indisponível no momento</p>
            <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Entendido</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>