<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Basic form elements</h4>
      <p class="card-description">
        Basic form elements
      </p>
      <form class="forms-sample" action="/everton/inserir" method="POST">
        <div class="form-group">
          <label for="exampleInputName1">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail3">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword4">CPF</label>
          <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite aqui seu CPF">
        </div>
        
        <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
        <a href="/everton/listar"><button class="btn btn-light">Cancel</button></a>
      </form>
    </div>
  </div>
</div>