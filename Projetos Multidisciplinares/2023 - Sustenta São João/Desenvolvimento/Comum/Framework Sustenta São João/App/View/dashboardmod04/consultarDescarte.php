<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
              </div>
              <div class="card-body">
<table>
                
  <tr>
    <th>Nome do Ponto de Coleta</th>
    <th>Período</th>
    <th>Tipo de resíduo</th>
    <th>Opções de gerenciamento</th>
  </tr>
  <tr>
    <td>Vila Brasil</td>
    <td>15/06/2023 14:28</td>
    <td>Vidro</td>
    <td><div class="container">
<button type="submit" class="botao_enviar">Editar</button> 
  <button type="submit" class="bnt" onclick=openPopup()>Excluir</button>
  <div class="popup" id="popup">
    <h2>Tem certeza que quer excluir o seu descarte?</h2>
    <button type="submit" class="botao_enviar">Sim, tenho</button><button type="button" class="bnt" onclick="closePopup()">Cancelar operação</button>
  </div></td>
   
  </tr>
  <tr>
    <td>Bairro Alegre</td>
    <td>16/06/2023 10:28</td>
    <td>Pilhas</td>
    <td><div class="container">
<button type="submit" class="botao_enviar">Editar</button> 
  <button type="submit" class="bnt" onclick=openPopup()>Excluir</button>
  <div class="popup" id="popup">
    <h2>Tem certeza que quer excluir o seu descarte?</h2>
    <button type="submit" class="botao_enviar">Sim, tenho</button><button type="button" class="bnt" onclick="closePopup()">Cancelar operação</button>
  </div></td>
    
  </tr>
 

</table>


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