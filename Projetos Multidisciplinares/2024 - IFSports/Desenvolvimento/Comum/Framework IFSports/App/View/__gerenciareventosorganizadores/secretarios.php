<link rel="stylesheet" href="../../resources/css/modalidades.css">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">

              <div>
                  <div class="col-lg-7 title_evento">
                  Secretarios do [Nome do Evento]
                   </div>
              </div>

                  <div class="table-responsive">
                    <table class="table table-striped">

                    <div>
                      <div class="formpesquisa">
                        <form method="POST" action="pesquisar.php">
                          <input type="text" name="pesquisar" placeholder="Filtrar Eventos">
                            <button type="button" title="Filtrar"><i class="icon-search"></i></button>
                        </form>
                      </div>
                    </div>

                <br><br>
                      <thead>
                        <tr>
                          <th class="centralize"></th>
                          <th class="centralize">Nome do Secretario</th>
                          <th class="centralize">Campus Residente</th>
                          <th class="centralize">Prontuario</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                        <tr>
                          <td class="centralize"><div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input"><i class="input-helper">Vincular Secretario</i></label></div></td>
                          <td class="centralize">Isaac Diogo Vidal</td>
                          <td class="centralize">IFSP SJBV</td>
                          <td class="centralize">BV123465</td>
                        </tr>
                        <tr>
                          <td class="centralize"><div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input"><i class="input-helper">Vincular Secretario</i></label></div></td>
                          <td class="centralize">Emily Amorim</td>
                          <td class="centralize">IFSP SJBV</td>
                          <td class="centralize">BV564321</td>
                        </tr>
                        <tr>
                          <td class="centralize"><div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input"><i class="input-helper">Vincular Secretario</i></label></div></td>
                          <td class="centralize">Cauê Godoy</td>
                          <td class="centralize">IFSP SJBV</td>
                          <td class="centralize">Bv222444</td>
                        </tr>
                        <tr>
                          <td class="centralize"><div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input"><i class="input-helper">Vincular Secretario</i></label></div></td>
                          <td class="centralize">Yasmin Oliveira</td>
                          <td class="centralize">IFSP SJBV</td>
                          <td class="centralize">Bv444222</td>
                        </tr>
                      </tbody>
                    </table>

                    <a href="/dashboard/listareventos"><button type="button" class="btn btn-dark">Salvar</button></a>
                    <a href="/dashboard/listareventos" onclick="confirm();"><button type="button" class="btn btn-danger">Cancelar</button></a>

                  </div>
                </div>
              </div>
            </div>
