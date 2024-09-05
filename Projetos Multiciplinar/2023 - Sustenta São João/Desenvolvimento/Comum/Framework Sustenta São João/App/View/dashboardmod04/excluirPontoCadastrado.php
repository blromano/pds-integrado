<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                      <h6 class="listagem">Nome do Ponto de Coleta</h6>
                        <p>Ponto de Coleta Nova União</p><br>
                        <h6 class="listagem">Endereço</h6>
                        <label>Rua</label>
                        <p>Welson de Carvalho</p><br>
                        <label>Número</label>
                        <p>132</p><br>
                        <label>Bairro</label>
                        <p>Jardim Nova União</p><br>
                        <label>CEP</label>
                        <p>11-111-111</p><br>
                        <label>Logradouro</label>
                        <p>Ao lado do Parque</p><br>
                        <label>Latitude</label>
                        <p>-22.0103585</p><br>
                        <label>Longitude</label>
                        <p>-46.7640447</p><br>
                      </div>
</div><br>
                    </div>
 
                    
                   
                  </div>
                  
                </form>
                <button type="submit" class="bnt" onclick=openPopup()>Excluir</button>
  <div class="popup" id="popup">
    <h2>Deseja excluir Ponto de Coleta?</h2>
    <button type="submit" class="botao_enviar">Sim</button><button type="button" class="bnt" onclick="closePopup()">Não</button>
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
          
      </div>