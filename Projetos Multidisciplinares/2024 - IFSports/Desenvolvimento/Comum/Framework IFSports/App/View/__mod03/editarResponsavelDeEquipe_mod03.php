<!DOCTYPE html>
<html>

<head>
  <style>
    .card {
      width: 90%;
      height: 750px;
      margin: 0 auto;
      background-color: #f4f4f3;
      border-radius: 8px;
      border-color: #77f5f5;
      z-index: 1;
      position: relative;
      display: flex;
      flex-direction: column;
    }

    .card::after {
      position: absolute;
      content: '';
      background-color: #454a50;
      width: 50px;
      height: 100px;
      z-index: -1;
      border-radius: 8px;
    }

    .tools {
      display: flex;
      align-items: center;
      padding: 9px;
      padding-top: 35px;
      border-radius: 8px;
      background: #454a50;
      margin-top: -2px;
    }

    .circle {
      padding: 0 4px;
    }

    .card__content {
      height: 100%;
      margin: 0px;
      border-radius: 8px;
      background: #f4f4f3;
      padding: 10px;
    }

    .name {
      font-size: 25px;
    }

    .adicionar {
      font-size: 20px;
      color: #f4f4f3;
    }

    .content {
      margin-top: 10px;
      font-size: 14px;
    }

    .box {
      display: inline-block;
      align-items: center;
      width: 10px;
      height: 10px;
      padding: 1px;
      border-radius: 50%;
    }

    .red {
      background-color: #74fef5;
    }

    .yellow {
      background-color: #3bbfc3;
    }

    .green {
      background-color: #77f5f5;
    }

    i {
      display: inline-block;
      font-size: 30px;
      width: 30px;
      text-align: center;
      color: #77f5f5;
    }

    button {
      width: 110px;
      height: 50px;
      margin-right: 10px;
    }

    .button-group {
      display: flex;
      justify-content: flex-start;
      margin-top: 20px;
    }

    /* CSS Ajustado */
    .form-group {
      margin-bottom: 0; /* Remove margin between form groups */
    }

    .form-group.row {
      margin-right: 0; /* Remove margin between columns */
      margin-left: 0;
    }

    .col-sm-3,
    .col-sm-9 {
      padding-right: 0; /* Remove padding from labels */
      padding-left: 0; /* Remove padding from input fields */
    }

    .row {
      margin-bottom: 15px; /* Optional: Adjust spacing between rows */
    }

    .checkbox-group {
      display: flex;
      flex-direction: column;
    }

    .checkbox-group label {
      margin-bottom: 5px;
    }
  </style>
</head>

<body>
  <div class="card">
    <div class="tools">
      <div class="circle">
        <span class="red box"></span>
      </div>
      <div class="circle">
        <span class="yellow box"></span>
      </div>
      <div class="circle">
        <span class="green box"></span>
      </div>
      <i class="mdi mdi-account-box"></i> <br>
      <p class="adicionar"> Editar Responsável</p>
    </div>

    <div class="card__content">
      <hr>
      <p class="content">
      <div class="form-group">
        <div class="card-body">
          <form class="form-sample">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nome Completo</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Ex: Ana Carolina Moreira Ferreira">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Ex: maria.silva@aluno.ifsp.edu.br">
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Prontuário</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Ex: BVXXXXXX">
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">CPF</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Ex: XXX.XXX.XXX-XX">
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Câmpus</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="Ex: São João da Boa Vista">
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Senha Padrão</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" value="ifsp123" readonly>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Evento Esportivo</label>
                  <div class="col-sm-9">
                    <select class="form-control">
                      <option>GDE</option>
                      <option>JIF</option>
                      <option>Interclasse</option>
                      <option>EJIF</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Modalidades Esportivas</label>
                  <div class="col-sm-9">
                    <div class="checkbox-group">
                      <label><input type="checkbox" name="modalidades" value="Vôlei"> Vôlei</label>
                      <label><input type="checkbox" name="modalidades" value="Futebol"> Futebol</label>
                      <label><input type="checkbox" name="modalidades" value="Tênis de mesa"> Tênis de mesa</label>
                      <label><input type="checkbox" name="modalidades" value="Natação"> Natação</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      </p>
    </div>

    <div class="button-group">
      <a href="../listarResponsaveisDeEquipe_mod3">
        <button type="button" class="btn btn-primary btn-icon-text">
          Salvar
        </button>
      </a>

      <a href="../listarResponsaveisDeEquipe_mod3">
        <button type="button" class="btn btn-outline-danger btn-icon-text">
          Cancelar
        </button>
      </a>
    </div>
  </div>
</body>

</html>
