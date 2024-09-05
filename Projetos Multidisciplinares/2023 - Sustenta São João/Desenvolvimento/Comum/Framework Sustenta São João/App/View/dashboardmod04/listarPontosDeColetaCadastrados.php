<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="col">
                    <h5 class="title"><?php echo $this->getView()->title; ?></h5>
                </div>
                
            </div>
        </div>
        
            <table class="table_j table-hover table-sm">
               
                <thead class="thead">
                    <tr>
                        <th scope="col">Nome do Ponto de Coleta</th>
                        <th scope="col">Rua</th>
                        <th scope="col">Número</th>
                        <th scope="col">Bairro</th>
                        <th scope="col">CEP</th>
                        <th scope="col">Logradouro</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                    </tr>
                </thead>
                <?php foreach ($this->getView()->exemplo as $dado) { ?>
                <tbody>
                    <tr>
                        <td><?php echo $dado->__get('PRO_NOME'); ?></td>
                        <td><?php echo $dado->__get('PRO_CPF'); ?></td>
                        <td><?php echo $dado->__get('PRO_RG'); ?></td>
                        <td><?php echo $dado->__get('PRO_RUA'); ?></td>
                        <td><?php echo $dado->__get('PRO_NUMERO'); ?></td>
                        <td><?php echo $dado->__get('PRO_BAIRRO'); ?></td>
                        <td><?php echo $dado->__get('PRO_CEP'); ?></td>
                        <td><?php echo $dado->__get('PRO_LOGRADOURO'); ?></td>
                        <td><?php echo $dado->__get('PRO_TELEFONE'); ?></td>
                        <td><?php echo $dado->__get('PCO_NOME'); ?></td>
                        <td><?php echo $dado->__get('PCO_RUA'); ?></td>
                        <td><?php echo $dado->__get('PCO_NUMERO'); ?></td>
                        <td><?php echo $dado->__get('PCO_BAIRRO'); ?></td>
                        <td><?php echo $dado->__get('PCO_CEP'); ?></td>
                        <td><?php echo $dado->__get('PCO_LOGRADOURO'); ?></td>
                        <td><?php echo $dado->__get('PCO_LATITUDE'); ?></td>
                        <td><?php echo $dado->__get('PCO_LONGITUDE'); ?></td>
                        <td><?php echo $dado->__get('PCO_TELEFONE'); ?></td>
                        <td><?php echo $dado->__get('PCO_CNPJ'); ?></td>

                    </tr>
                    
                   
                </tbody>
                <?php } ?>
            </table>
            
  <div class="popup" id="popup">
    <h2>Tem certeza que quer excluir o seu descarte?</h2>
    <button type="submit" class="botao_enviar">Sim, tenho</button><button type="button" class="bnt" onclick="closePopup()">Cancelar operação</button>
  </div>
  <script>
  let popup = document.getElementById("popup");
  function openPopup(){
    popup.classList.add("open-popup");
    
  }
  function closePopup(){
    popup.classList.remove("open-popup");
    
  }
</script>
        </div>
    </div>
</div>
<script>
    var popUp = document.querySelector('popUp');

    function openPopUp() {
        document.getElementById("popUp").setAttribute("open", "");
    }

    function closePopUp() {
        document.getElementById("popUp").removeAttribute("open");
    }
</script>