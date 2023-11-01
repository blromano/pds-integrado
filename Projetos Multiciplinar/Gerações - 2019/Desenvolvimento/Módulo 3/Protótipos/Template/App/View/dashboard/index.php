<section id="md03" class="container-fluid">
    <div id="content-wrapper">
          <div class="container-fluid">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Home</a>
              </li>
              <li class="breadcrumb-item active">Informações de sua conta</li>
            </ol>
                <div class="card mb-6" id="cardprincipal">
                    <img id="imgprofile" class="card-header"  src="<?php echo $this->view->include ?>resources/img/user.png" alt="responsive-image">
                    <div class="card-body">
                        <div class="table-responsive">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nome de usuário: João Paulo Teixeira</li>
                                <li class="list-group-item">Idade: 40</li>
                                <li class="list-group-item">Endereço: Rua Henrique Garcia, 499</li>
                                <li class="list-group-item">Data de Nascimento: 10/02/1979</li>
                                <li class="list-group-item">Telefone: (19) 9999-999</li>
                                <li class="list-group-item">Email: joaop79@gmail.com</li>
                                <li class="list-group-item">RG: 77.777.777-7</li>
                                <li class="list-group-item">CPF: 888.888.888-88</li>
                                <li class="list-group-item"><button class="btn btn-outline-secondary" type="button" id="button-addon1"><a href="/md3/EditarInfo">Editar informações</a></button></li>
                            </ul>
                        </div>
                    </div>
                </div>     
          </div>
        </div>
</section>