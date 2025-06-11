<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"><?php echo $this->getView()->texto; ?></h4>
                  <p class="card-description">
                    Basic form elements
                  </p>
                  <form class="forms-sample" action="/everton/alterar" method="POST">
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="nome" name="nome" placeholder="" value="<?php echo $this->getView()->everton->__get('nome'); ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">CPF</label>
                      <input type="text" class="form-control" id="cpf" name="cpf" placeholder="" value="<?php echo $this->getView()->everton->__get('cpf'); ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="" value="<?php echo $this->getView()->everton->__get('email'); ?>">
                    </div>
                    <input type="hidden" name="id" id="id" value="<?php echo $this->getView()->everton->__get('id'); ?>">
                    <button type="submit" class="btn btn-primary mr-2">Editar</button>
                    <a href="/everton/listar"><button class="btn btn-light">Cancel</button></a>
                  </form>
                </div>
              </div>
            </div>