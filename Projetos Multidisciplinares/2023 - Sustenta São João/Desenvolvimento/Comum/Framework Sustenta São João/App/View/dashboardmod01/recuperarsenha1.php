<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title" ><?php echo $this->getView()->title; ?></h5>
                
              </div>
              <div class="card-body">
                <form class="form_j">
                  

                  <div class="row">
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label>Email cadastrado</label>
                            <input type="text" class="form-control" placeholder="Digite seu Email" >
                        </div>  
                    </div>    
                  </div>

                  
                  <div class="row justify-content-end alinhar">
                <div>
                <a class="a_j" href="/login"><button type="button" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Voltar</button></a>
                </div>
                <div>
                    <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Enviar código</button>
                </div>
            </div>
         
                  
                  

                </form>   <!-- Término do Formulário -->
              </div>    <!-- DIV mãe do Formulário -->
            </div>
          </div>
          
      </div>