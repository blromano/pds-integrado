<div class="card">
  <div class="card-header">
    <div class="row justify-content-between">
      <div class="col">
        <h5 class="title"><?php echo $this->getView()->title; ?></h5>
      </div>
    </div>
  </div>
  <div class="card-body">
    <!-- <div id="iframe" class="form-row align-items-center">-->
    <div class="row">
      <div class="form-group col-md-6">
        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d947194.0979673569!2d echo $this->getView()->pontoColeta->__get("PCO_LATITUDE"); !3d-21.97384789645574" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d236809.7567150854!2d-47.117566605468696!3d-21.967111400000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c9cca77098ac5f%3A0x1c68374dfb5e08c0!2sInstituto%20Federal%20de%20Educa%C3%A7%C3%A3o%2C%20Ci%C3%AAncia%20e%20Tecnologia%20de%20S%C3%A3o%20Paulo%2C%20C%C3%A2mpus%20S%C3%A3o%20Jo%C3%A3o%20da%20Boa%20Vista!5e0!3m2!1spt-BR!2sbr!4v1697738867531!5m2!1spt-BR!2sbr" style="border:0; width: 100%; height: 121%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <div class="form-group col-md-6">
        <table class="table_j table-hover table-striped">
          <tr>
            <th class="thead2">Rua</th>
            <td class="nowrap2">
              <?php
              echo $this->getView()->pontoColeta->__get("PCO_RUA");
              if (isset($this->getView()->pontoColeta)) {
                $pontoColetaSelecioado = $this->getView()->pontoColeta;
                echo $pontoColetaSelecioado->__get("PCO_RUA");
              } ?>
            </td>
          </tr>
          <tr>
            <th class="thead2">Bairro</th>
            <td class="nowrap2">
              <?php
              if (isset($this->getView()->pontoColeta)) {
                $pontoColetaSelecioado = $this->getView()->pontoColeta;
                echo $pontoColetaSelecioado->__get("PCO_BAIRRO");
              } ?>
            </td>
          </tr>
          <tr>
            <th class="thead2">Número</th>
            <td class="nowrap2">
              <?php
              if (isset($this->getView()->pontoColeta)) {
                $pontoColetaSelecioado = $this->getView()->pontoColeta;
                echo $pontoColetaSelecioado->__get("PCO_NUMERO");
              } ?>
            </td>
          </tr>
          <tr>
            <th class="thead2">Telefone</th>
            <td class="nowrap2">
              <?php
              if (isset($this->getView()->pontoColeta)) {
                $pontoColetaSelecioado = $this->getView()->pontoColeta;
                echo $pontoColetaSelecioado->__get("PCO_TELEFONE");
              } ?>
          </tr>
          <tr>
            <th class="thead2">Proprietário</th>
            <td class="nowrap2">
              <?php
              if (isset($this->getView()->pontoColeta)) {
                $pontoColetaSelecioado = $this->getView()->pontoColeta;
                echo $pontoColetaSelecioado->__get("PRO_NOME");
              } ?>
            </td>
          </tr>
          <tr>
            <th class="thead2">CEP</th>
            <td class="nowrap2">
              <?php
              if (isset($this->getView()->pontoColeta)) {
                $pontoColetaSelecioado = $this->getView()->pontoColeta;
                echo $pontoColetaSelecioado->__get("PCO_CEP");
              } ?>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row justify-content-end alinhar">
      <form action="/dashboard/avaliarPontoColeta" method="POST">
        <button type="button" class="btn btn-warning btn-sm" onclick=openPopup()><i class="bi bi-star"></i> Avaliar Serviço</button>
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
          <input type="hidden" name="PCO_ID" id="PCO_ID" value="<?php echo $this->getView()->pontoColeta->__get("PCO_ID"); ?>">
          <input type="hidden" name="PCO_AVALIACAO" id="PCO_AVALIACAO">
          <input type="submit" class="botao_feita_avaliacao" onclick="closePopup()">ok</button>
        </div>
      </form>
      <a class="a_j" href="/dashboard/obterDados"><button type="submit" class="btn btn-primary btn-sm espacar"><i class="bi bi-clipboard-data"></i> Dados Estatísticos</button></a>
      <a class="a_j" href="/dashboard/registrarDescarte"><button type="submit" class="btn btn-success btn-sm espacar"><i class="bi bi-plus-circle"></i> Novo Descarte</button></a>
    </div>
  </div>
</div>
<script>
  let popup = document.getElementById("popup");

  function openPopup() {
    popup.classList.add("open-popup");

  }

  function closePopup() {
    popup.classList.remove("open-popup");

  }
</script>