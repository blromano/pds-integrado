<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
              </div>
              <div class="card-body">
                <form action="/dashboard/inserirReclamacao" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="FK_CIDADAOS_USU_ID" value="1">
                  <div class="row">
                    
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label class="text">Título da reclamação</label>
                        <input type="text" class="form-control" name="REC_TITULO_RECLAMACAO" placeholder="Resuma, em poucas palavras, a sua reclamação" required>
                      </div>
                  </div>
                  </div>
                  
                  <div class="row">
              <div class="col-md-4 px-1">
                  <div class="form-group">
                        <label class="text">Descrição do problema</label>
                        <textarea type="text" class="form-control" name="REC_DESCRICAO" id="REC_DESCRICAO" placeholder="Descreva aqui o seu problema" required></textarea>
                      </div>
                    </div>
                  </div>
                  <label class="text">Selecione um setor</label>
                  <div class="row">
                  <select name="FK_SETORES_SET_ID">
                      <option value="1">Gabinete do Prefeito</option>
                      <option value="2">Administração da Prefeitura</option>
                      <option value="3">Desenvolvimento Econômico</option>
                      <option value="4">Segurança e Trânsito</option>
                      <option value="5">Assistência Social</option>
                      <option value="6">Comunicação Social</option>
                      <option value="7">Cultura</option>
                      <option value="8">Educação</option>
                      <option value="9">Engenharia</option>
                      <option value="10">Esportes</option>
                      <option value="11">Finanças</option>
                      <option value="12">Procuradoria-Geral do Município</option>
                      <option value="13">Meio Ambiente, Agricultura e Abastecimento</option>
                      <option value="14">Gestão e Planejamento Urbano</option>
                      <option value="15">Recursos Humanos</option>
                      <option value="16">Saúde</option>
                      <option value="17">Secretaria Geral</option>
                      <option value="18">Obras e Serviços Públicos</option>
                      <option value="19">Turismo</option>
                      <option value="20">Habitação</option>
                      <option value="21">Tecnologia da Informação</option>
                      <option value="22">Proteção e Bem-Estar Animal</option>
                    </select>
                  </div><br>
                  <div>
                  <label class="text" for="REC_ANEXO">Anexar documento:</label>
                  <input type="file" id="REC_ANEXO" name="REC_ANEXO">
          
                  </div>
                    <div>
                    <button class="btn btn-success" type="submit">Enviar</button>
                    </div>
                </form>
                <!--<form action="/dashboard/avaliarReclamacao" method="POST">             
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
              <input type="hidden" name="REC_ID" id="REC_ID" value="">
              <input type="hidden" name="REC_NOTA_AVALIACAO" id="REC_NOTA_AVALIACAO">
              <input type="submit" class="botao_feita_avaliacao" onclick="closePopup()">ok</button>
            </div>
            </form>
            -->
              </div>
            </div>
          </div>  
      </div>