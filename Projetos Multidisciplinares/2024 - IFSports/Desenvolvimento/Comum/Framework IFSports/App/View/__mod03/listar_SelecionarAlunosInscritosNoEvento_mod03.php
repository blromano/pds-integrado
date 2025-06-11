<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Alunos Inscritos Na Modalidade ________</h4>
      <p class="card-description">
        <!--<a href="/mod03/vincularEquipes_mod3">
          <button type="button" class="btn btn-success">Cadastrar Novo</button>
        </a>-->
      </p>
      <div class="input-group">
        <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
          <span class="input-group-text" id="search">
            <i class="icon-search"></i>
          </span>
        </div>
        <input type="text" class="form-control" id="navbar-search-input" placeholder="Buscar por: Aluno, Curso, Prontuário, CPF" aria-label="search" aria-describedby="search">
      </div>
      <div class="table-responsive pt-3">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>CPF</th>
              <th>Nome completo</th>
              <th>Prontuário</th>
              <th>Curso</th>
              <th>Selecionar Alunos</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>111.111.111-11</td>
              <td>Franciela Dormino Só sai</td>
              <td>BV1111111</td>
              <td>Informática</td>
              <td>
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>123.456.789-09</td>
              <td>Fulano da Silva</td>
              <td>BV2222222</td>
              <td>Eletrônica</td>
              <td>
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>987.654.321-00</td>
              <td>John Richards</td>
              <td>BV3333333</td>
              <td>Informática</td>
              <td>
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>111.222.333-44</td>
              <td>Peter Meggik</td>
              <td>BV4444444</td>
              <td>Eletrônica</td>
              <td>
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>555.666.777-88</td>
              <td>Edward</td>
              <td>BV5555555</td>
              <td>Informática</td>
              <td>
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>333.444.555-66</td>
              <td>John Doe</td>
              <td>BV6666666</td>
              <td>Eletrônica</td>
              <td>
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                  </label>
                </div>
              </td>
            </tr>
            <tr>
              <td>777.888.999-11</td>
              <td>Henry Tom</td>
              <td>BV7777777</td>
              <td>Eletrônica</td>
              <td>
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input">
                  </label>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div class="form-group d-flex">
          <a class="btn btn-primary btn-lg font-weight-medium auth-form-btn" href="../listar_SelecionarAlunosInscritosNoEvento_mod3">Selecionar Alunos</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Alunos Selecionados</h4>
      <p class="card-description">
        <!--<a href="/mod03/vincularEquipes_mod3">
          <button type="button" class="btn btn-success">Cadastrar Novo</button>
        </a>-->
      </p>
      <div class="table-responsive pt-3">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>CPF</th>
              <th>Nome Completo</th>
              <th>Prontuário</th>
              <th>Curso</th>
              <th>Excluir Aluno</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>222.333.444-55
              </td>
              <td>Herman Beck</td>
              <td>BV1010101</td>
              <td>Informática</td>
              <td>
                <a href="listar_SelecionarAlunosInscritosNoEvento_mod3" onclick="return confirm('Tem certeza que deseja excluir?');">
                  <button type="button" class="btn btn-danger">
                    <i class="mdi mdi-delete-forever"></i>
                  </button>
                </a>
              </td>
            </tr>
            <tr>
              <td>666.777.888-99</td>
              <td>Messsy Adam</td>
              <td>BV3014142</td>
              <td>Informática</td>
              <td>
                <a href="listar_SelecionarAlunosInscritosNoEvento_mod3" onclick="return confirm('Tem certeza que deseja excluir?');">
                  <button type="button" class="btn btn-danger">
                    <i class="mdi mdi-delete-forever"></i>
                  </button>
                </a>
              </td>
            </tr>
            <tr>
              <td>999.000.111-22</td>
              <td>John Richards</td>
              <td>BV3030109</td>
              <td>Informática</td>
              <td>
                <a href="listar_SelecionarAlunosInscritosNoEvento_mod3" onclick="return confirm('Tem certeza que deseja excluir?');">
                  <button type="button" class="btn btn-danger">
                    <i class="mdi mdi-delete-forever"></i>
                  </button>
                </a>
              </td>
            </tr>
            <tr>
              <td>444.555.666-33</td>
              <td>Peter Meggik</td>
              <td>BV3014562</td>
              <td>Eletrônica</td>
              <td>
                <a href="/listar_SelecionarAlunosInscritosNoEvento_mod3" onclick="return confirm('Tem certeza que deseja excluir?');">
                  <button type="button" class="btn btn-danger">
                    <i class="mdi mdi-delete-forever"></i>
                  </button>
                </a>
              </td>
            </tr>
            <tr>
              <td>888.999.000-77</td>
              <td>Edward</td>
              <td>BV3090897</td>
              <td>Eletrônica</td>
              <td>
                <a href="/listar_SelecionarAlunosInscritosNoEvento_mod3" onclick="return confirm('Tem certeza que deseja excluir?');">
                  <button type="button" class="btn btn-danger">
                    <i class="mdi mdi-delete-forever"></i>
                  </button>
                </a>
              </td>
            </tr>
            <tr>
              <td>666.555.444-22</td>
              <td>John Doe</td>
              <td>BV3013137</td>
              <td>Eletrônica</td>
              <td>
                <a href="/listar_SelecionarAlunosInscritosNoEvento_mod3" onclick="return confirm('Tem certeza que deseja excluir?');">
                  <button type="button" class="btn btn-danger">
                    <i class="mdi mdi-delete-forever"></i>
                  </button>
                </a>
              </td>
            </tr>
            <tr>
              <td>321.654.987-00</td>
              <td>Henry Tom</td>
              <td>BV3012122</td>
              <td>Eletrônica</td>
              <td>
                <a href="/listar_SelecionarAlunosInscritosNoEvento_mod3" onclick="return confirm('Tem certeza que deseja excluir?');">
                  <button type="button" class="btn btn-danger">
                    <i class="mdi mdi-delete-forever"></i>
                  </button>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="form-group d-flex">
        <!--<button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Confirmar</button>-->
        <a class="btn btn-primary font-weight-medium auth-form-btn" href="../justificar_mod3">Confirmar</a>
        <a href="../listarEquipesPorModalidade_mod3" onclick="return confirm('Tem certeza que deseja cancelar?');">
          <button type="button" class="btn btn-danger">Cancelar</button>
        </a>
      </div>
    </div>
  </div>
</div>