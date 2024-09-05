<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title"><?php echo $this->getView()->title; ?></h5>
        </div>
        <div class="card-body">
          <form action="/dashboard/buscarInformacoesPontoColeta" class="form_j" method="POST">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="ponto_coleta">Ponto de Coleta</label>
                <select required name="id" id="id" class="form-control text_j">
                  <option value="" disabled selected>Selecione o ponto de coleta</option>
                  <?php foreach ($this->getView()->pontoColeta as $row) { ?>
                    <option value=<?php echo $row->__get('PCO_ID'); ?>><?php echo $row->__get('PCO_NOME') . " - " . $row->__get('PCO_BAIRRO'); ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="row justify-content-end alinhar">
              <div>
                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-search icon"></i> Buscar</button>
              </div>
            </div>
            <!--                      
            <button type="button" class="botao_avaliacao" onclick=openPopup()>Avaliar Serviço</button>
            <div class="popup" id="popup">
              <h2>Avaliar Serviço</h2>
              <a href="javascript:void(0)" onclick="Avaliar(1)">
                <img src="/resources/img/star.png" id="s1" width="30px"></a>

              <a href="javascript:void(0)" onclick="Avaliar(2)">
                <img src="/resources/img/star.png" id="s2" width="30px"></a>

              <a href="javascript:void(0)" onclick="Avaliar(3)">
                <img src="/resources/img/star.png" id="s3" width="30px"></a>

              <a href="javascript:void(0)" onclick="Avaliar(4)">
                <img src="/resources/img/star.png" id="s4" width="30px"></a>

              <a href="javascript:void(0)" onclick="Avaliar(5)">
                <img src="/resources/img/star.png" id="s5" width="30px"></a>
              <p id="rating">0</p>
              <button type="button" class="botao_avaliacao" onclick="closePopup()">ok</button>
            </div>

            <button type="submit" class="botao_dados">Obter Dados Estatísticos</button>

            </button> <button type="submit" class="botao_descarte">+ Realizar Novo Descarte</button>

          </form><br>

            
 
          <div id="iframe" class="form-row align-items-center">
            <div class="form-group col-md-6">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d947194.0979673569!2d-47.45046511028035!3d-21.97384789645574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c9cca77098ac5f%3A0x1c68374dfb5e08c0!2sInstituto%20Federal%20de%20Educa%C3%A7%C3%A3o%2C%20Ci%C3%AAncia%20e%20Tecnologia%20de%20S%C3%A3o%20Paulo%2C%20C%C3%A2mpus%20S%C3%A3o%20Jo%C3%A3o%20da%20Boa%20Vista!5e0!3m2!1spt-BR!2sbr!4v1687464180513!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="form-group col-md-6">
<<<<<<< .mine
              
||||||| .r851
              <table class="table_j">
                <tr>
                  <th>Nome</th>
                  <td>
                    <?php
                    if (isset($this->getView()->pontoColeta)) {
                      $pontoColetaSelecioado = $this->getView()->pontoColeta;
                      echo $pontoColetaSelecioado->__get("PCO_RUA");
                    } ?>
                  </td>
                </tr>
                <tr>
                  <th>Bairro</th>
                  <td>
                    <?php
                    if (isset($this->getView()->pontoColeta)) {
                      $pontoColetaSelecioado = $this->getView()->pontoColeta;
                      echo $pontoColetaSelecioado->__get("PCO_BAIRRO");
                    } ?>
                  </td>
                </tr>
                <tr>
                  <th>Número</th>
                  <td>
                    <?php
                    if (isset($this->getView()->pontoColeta)) {
                      $pontoColetaSelecioado = $this->getView()->pontoColeta;
                      echo $pontoColetaSelecioado->__get("PCO_NUMERO");
                    } ?>
                  </td>
                <tr>
                  <th>Telefone</th>
                  <td>
                    <?php
                    if (isset($this->getView()->pontoColeta)) {
                      $pontoColetaSelecioado = $this->getView()->pontoColeta;
                      echo $pontoColetaSelecioado->__get("PCO_TELEFONE");
                    } ?>
                <tr>
                  <th>Nome do proprietário</th>
                  <td>
                    <?php
                    if (isset($this->getView()->pontoColeta)) {
                      $pontoColetaSelecioado = $this->getView()->pontoColeta;
                      echo $pontoColetaSelecioado->__get("PRO_NOME");
                    } ?>
                  </td>
                </tr>
                <tr>
                  <th>CEP</th>
                  <td>
                    <?php
                    if (isset($this->getView()->pontoColeta)) {
                      $pontoColetaSelecioado = $this->getView()->pontoColeta;
                      echo $pontoColetaSelecioado->__get("PCO_CEP");
                    } ?>
                  </td>
                </tr>
                </td>
                </tr>
                </tr>
              </table>
=======
              <table class="table_j">
                <tr>
                  <th>Nome</th>
                  <td>
                    <?php
                    if (isset($this->getView()->pontoColeta)) {
                      $pontoColetaSelecioado = $this->getView()->pontoColeta;
                      echo $pontoColetaSelecioado->__get("PCO_NOME");
                    } ?>
                  </td>
                </tr>
                <tr>
                  <th>Bairro</th>
                  <td>
                    <?php
                    if (isset($this->getView()->pontoColeta)) {
                      $pontoColetaSelecioado = $this->getView()->pontoColeta;
                      echo $pontoColetaSelecioado->__get("PCO_BAIRRO");
                    } ?>
                  </td>
                </tr>
                <tr>
                  <th>Número</th>
                  <td>
                    <?php
                    if (isset($this->getView()->pontoColeta)) {
                      $pontoColetaSelecioado = $this->getView()->pontoColeta;
                      echo $pontoColetaSelecioado->__get("PCO_NUMERO");
                    } ?>
                  </td>
                <tr>
                  <th>Telefone</th>
                  <td>
                    <?php
                    if (isset($this->getView()->pontoColeta)) {
                      $pontoColetaSelecioado = $this->getView()->pontoColeta;
                      echo $pontoColetaSelecioado->__get("PCO_TELEFONE");
                    } ?>
                <tr>
                  <th>Nome do proprietário</th>
                  <td>
                    <?php
                    if (isset($this->getView()->pontoColeta)) {
                      $pontoColetaSelecioado = $this->getView()->pontoColeta;
                      echo $pontoColetaSelecioado->__get("PRO_NOME");
                    } ?>
                  </td>
                </tr>
                <tr>
                  <th>CEP</th>
                  <td>
                    <?php
                    if (isset($this->getView()->pontoColeta)) {
                      $pontoColetaSelecioado = $this->getView()->pontoColeta;
                      echo $pontoColetaSelecioado->__get("PCO_CEP");
                    } ?>
                  </td>
                </tr>
                </td>
                </tr>
                </tr>
              </table>
>>>>>>> .r968
            </div>
          </div>

         <?php ?>            -->


            <script>
              let popup = document.getElementById("popup");

              function openPopup() {
                popup.classList.add("open-popup");

              }

              function closePopup() {
                popup.classList.remove("open-popup");

              }
            </script>

        </div>
      </div>
    </div>

  </div>