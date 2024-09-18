<section id="md03" class="container-fluid">    
    <div id="content-wrapper">
              <div>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Editar informações de sua conta</li>
                </ol>
                    <div class="card mb-3" id="cardprincipal">
                            <form>
                                <div class="form-group">
                                   <label for="exampleFormControlFile1">Editar foto de perfil</label>
                                   <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                  <label>Nome de Usuário</label>
                                  <input type="text" class="form-control" placeholder="Coloque seu nome de usuário">
                                </div>
                                <div class="form-group">
                                  <label>Idade</label>
                                  <input type="text" class="form-control" placeholder="Coloque sua idade">
                                </div>
                                 <div class="form-group">
                                  <label>Endereço</label>
                                  <input type="text" class="form-control" placeholder="Coloque seu endereço">
                                </div>
                                <div class="form-group">
                                  <label>Data de Nascimento</label>
                                  <input type="text" class="form-control" placeholder="dd/mm/aaaa">
                                </div>
                                <div class="form-group">
                                  <label>Telefone</label>
                                  <input type="text" class="form-control" placeholder="(99) 99999-9999">
                                </div>
                                 <div class="form-group">
                                  <label>Email</label>
                                  <input type="text" class="form-control" placeholder="nome@exemplo.com">
                                </div>
                                <div class="form-group">
                                  <label>RG</label>
                                  <input type="text" class="form-control" placeholder="99.999.999-9">
                                </div>
                                 <div class="form-group">
                                  <label>CPF</label>
                                  <input type="text" class="form-control" placeholder="999.999.999-99">
                                </div>
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-toggle="modal" data-target="#modalCookie1">Alterar</button>
                             </form>
                        </div>
                    </div>     
              </div>
            </div>

        <div class="modal fade top" id="modalCookie1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true" data-backdrop="true">
          <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">

                    <p class="pt-3 pr-2">Um ou mais campos não foram preenchidos!</p>
                  <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Entendido</a>
                </div>
              </div>
            </div>
          </div>
        </div>
</section>