<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
              </div>
              <div class="card-body">
                <form>
                  <table style="width:100%">
                  <tr>
                        <th>Titúlo da reclamação</th>
                        <th>Departamento</th>
                        <th>Data/Horário</th>
                        <th>Situação</th>
                        <th>Ações</th>
                    </tr>
                    <tr>
                        <td>Rua esburacada</td>
                        <td>Engenharia</td>
                        <td>11/05/2023 | 13:40</td>
                        <td style="color: red">Pendente</td>
                        <td>
                        <button class="btn btn-info" type="">Editar</button>
                    <button class="btn btn-danger" type="">Excluir</button>
                        </td>
                    </tr>
                    <tr>
                    <td>Falta de livros</td>
                        <td>Educação</td>
                        <td>23/04/2023 | 10:30</td>
                        <td style="color: red">Pendente</td>
                        <td>
                        <button class="btn btn-info" type="">Editar</button>
                        <button class="btn btn-danger" type="">Excluir</button>
                        </td>
                    </tr>
                    <tr>
                    <td>Esgoto podre</td>
                        <td>Engenharia</td>
                        <td>23/02/2023 | 12:30</td>
                        <td style="color: red">Pendente</td>
                        <td>
                        <button class="btn btn-info" type="">Editar</button>
                        <button class="btn btn-danger" type="">Excluir</button>
                        </td>
                    </tr>
                    <tr>
                    <td>Falta de macas</td>
                        <td>Saúde</td>
                        <td>11/02/2023 | 13:40</td>
                        <td style="color: orange">Em andamento</td>
                    </tr>
                    <tr>
                    <td>Cachorro atacado</td>
                        <td>Proteção e Bem-Estar Animal</td>
                        <td>10/01/2023 | 18:01</td>
                        <td style="color: #18ce0f">Resolvido</td>
                        <td>
                        <button class="btn btn-success" type="" onclick="openPopup()">Avaliar</button>
                        <!-- Overlay e janela de popup -->
                      <div class="overlay" id="overlay"></div>
                      <div class="popup" id="popup">
                          <span class="close" onclick="closePopup()">&times;</span>
                          <h2><div class="rating">
        <input type="radio" name="rating" id="rating5" value="5">
        <span class="star">☆</span>
        <input type="radio" name="rating" id="rating4" value="4">
        <span class="star">☆</span>
        <input type="radio" name="rating" id="rating3" value="3">
        <span class="star">☆</span>
        <input type="radio" name="rating" id="rating2" value="2">
        <span class="star">☆</span>
        <input type="radio" name="rating" id="rating1" value="1">
        <span class="star">☆</span>
    </div></h2>
                          <p>Obrigada pela avaliação!</p>
                      </div>
                        </td>

                    <script>
        function openPopup() {
            // Exibe o overlay e a janela de popup
            document.getElementById("overlay").style.display = "block";
            document.getElementById("popup").style.display = "block";
        }

        function closePopup() {
            // Oculta o overlay e a janela de popup
            document.getElementById("overlay").style.display = "none";
            document.getElementById("popup").style.display = "none";
        }
    </script>
                    </tr>
                  </table>
                        <div>
                        <button class="btn btn-success" type="">Nova Reclamação</button>
                        </div>
                    

                    <!--<div class="col-md-4 px-1">
                      <div class="form-group">
                        <label class="text-success">Nome da reclamação</label>
                        <input type="text" class="form-control" placeholder="Buraco na rua" disabled="">
                      </div>
                  </div>
                  </div>
                  
                  <div class="row">
              <div class="col-md-4 px-1">
                  <div class="form-group">
                        <label class="text-success">Descrição do problema</label>
                        <input type="text" class="form-control" placeholder="Setor de engenharia, tem um buraco aqui no meu bairro meu chapa" disabled="">
                      </div>
                    </div>
                  </div>
                  <div>
          
                  </div>


                    <div>
                    <button class="btn btn-warning" type="">Enviar</button>
                    <button class="btn btn-success" type="">Responder</button>
                    </div>
                </form>
              </div>
            </div>
          </div>
          
      </div>-->