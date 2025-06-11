<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Listagem de Cadastros</h4>
                  <p class="card-description">
                  <a href="/everton/cadastrar"><button type="button" class="btn btn-success">Cadastrar Novo</button></a>
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Nome
                          </th>
                          <th>
                            CPF
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      <?php foreach($this->getView()->evertons as $everton){ ?>
                        <tr>
                          <td>
                            <?php echo $everton->__get('id'); ?>
                          </td>
                          <td>
                          <?php echo $everton->__get('nome'); ?>
                          </td>
                          <td>
                          <?php echo $everton->__get('cpf'); ?>
                          </td>
                          <td>
                          <?php echo $everton->__get('email'); ?>
                          </td>
                          <td>
                                <a href="/everton/editar?id=<?php echo $everton->__get('id'); ?>" ><button type="button" class="btn btn-dark"><?php echo $this->getView()->icone_editar; ?></button></a>
                                <a href="/everton/excluir" onclick="confirm();"><button type="button" class="btn btn-danger"><i class="mdi mdi-delete-forever"></i></button></a>
                                
                          </td>
                        </tr>
                        <?php } ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>