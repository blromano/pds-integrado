<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
              </div>

              <!-- <?//php foreach ($this->getView()->reclamacao as $dado)?> -->
              <!-- <?//php echo $dado->__get('REC_TITULO_RECLAMACAO'); ?> -->
              <!-- <?//php echo $dado->__get('REC_ID');?> -->

              <div class="card-body">
                <form method='POST' action="">
                <div class="container">
                  <div class="row">
                    <div class="col-md-10">
                    <label class="text-success title">Setor</label>
                            <select class="custom-select" id="inputGroupSelect04">
                                <option selected>Escolha o setor</option>
                                <option value="1">Engenharia</option>
                                <option value="2">Trânsito</option>
                                <option value="3">Saúde</option>
                            </select>
                    </div>
                    <div class="col-md-2 alinhar">
                      <button style="margin-top: 24px; font-size: 14px; width:100%;" class="btn btn-success" type="button">Filtrar</button>
                    </div>
                  </div>
                  <div  style="margin-top: 24px;" class="row">
                    <div class="col">
                      <label class="text-success title" for="example">Data inicial</label>    
                      <input placeholder="Select date" type="date" id="example" class="form-control" value="<?php echo $example; ?>">
                    </div>
                    <div class="col">
                      <label class="text-success title" for="example2">Data final</label>    
                      <input placeholder="Select date" type="date" id="example2" class="form-control" value="<?php echo $example; ?>">
                    </div>
                  </div>
                  <div style="margin-top: 24px;" class="row">
                    <div class="col-md-3">    
                    <button style="font-size: 15px; width:100%" class="btn btn-success nowrap" type="button"><a style="color: white; text-decoration: none" href="mediaAvaliacao">Média das Avaliações</a></button>
                    </div>
                    <div class="col-md-3">
                      <button style="font-size: 15px; width:100%" class="btn btn-success nowrap" type="button" name="PesqUsuario"><a style="color: white; text-decoration: none"href="gerarPDF">Relatório</a></button>
                    </div>
                    <div class="col-md-3">
                      <button style="font-size: 15px; width:100%" class="btn btn-success nowrap" type="button">Gráfico de Pizza</button>
                    </div>
                    <div class="col-md-3">
                      <button style="font-size: 15px; width:100%" class="btn btn-success nowrap" type="button">Gráfico de Barras</button>
                    </div>
                  </div>
                  </form>
</div>
      