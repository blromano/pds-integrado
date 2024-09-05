<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title" ><?php echo $this->getView()->title; ?></h5>
                
              </div>
              <div class="card-body">
                <form action="/verificarLogin" method="POST" class="form_j">
                  

                  <div class="row">
                    <div class="col-md-4 pl-4">
                        <div class="form-group">
                            <label for="USU_EMAIL">Email</label>
                            <input name="USU_EMAIL" id="USU_EMAIL" type="text" class="form-control" placeholder="Digite seu Email" required>
                        </div>  
                    </div>    
                  </div>

                  <div class="row">
                    <div class="col-md-4 pl-4">
                        <div class="form-group">
                            <label for="USU_SENHA">Senha</label>
                            <input name="USU_SENHA" id="USU_SENHA" type="password" class="form-control" placeholder="Digite sua Senha" minlength="6" required maxlength="12" required>                 
                        </div>  
                    </div>  
                  </div>

                  <div class="row">
                    <div class="col-md-4 pl-4">
                      <p class="criar-conta">Não tem uma conta? <a href="/dashboard/cadastro">Criar uma conta</a></p>
                    </div>
                  </div>
                  <div class="row justify-content-end alinhar">
                    <a href="/recuperarsenha1">Recuperar senhaㅤ</a>
                    <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Entrar</button>
                  </div>


                  <!--<div class="row">
                    <div class="col-md-2 pl-4">
                      <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Enviar">
                        <a href="/recuperarsenha1">Recuperar senha</a>
                      </div>
                    </div>
                  </div>

                  <p class="criar-conta">Não tem uma conta? <a href="/dashboard/cadastro">Criar uma conta</a></p>-->

                </form>   <!-- Término do Formulário -->
              </div>    <!-- DIV mãe do Formulário -->
            </div>
          </div>
          
      </div>