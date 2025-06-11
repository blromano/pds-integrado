<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">EDITAR SECRETÁRIO</h4>
                  <p class="card-description">
                    
                  </p>
                  <!-- NÃO ESQUECER DE ALTERAR O ID PARA O NOME CORRETO-->
                  <form class="forms-sample" action="/cadastrarsec/cadastrarsec">
                    <div class="form-group">
                      <label for="exampleInputName1">Nome</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Nome" value = "exemplo1">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Nome Social</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Nome Social" value = "exemplo2">
                    </div>
                    <!-- NÃO ESQUECER DE CRIAR O CÓDIGO PARA DATA DE NASCIMENTO NO FORMULÁRIO -->

                    <div class="form-group">
                      <label for="exampleInputName1">CPF</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="CPF" value = "exemplo3">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputName1">RG</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="RG" value = "exemplo4">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputName1">Telefone</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Telefone"value = "exemplo5">
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Sexo</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>Masculino</option>
                          <option>Feminino</option>
                        </select>
                      </div>

                      <div class="form-group">
                      <label for="exampleSelectGender">Etnia</label>
                        <select class="form-control" id="exampleSelectEtnia">
                          <option>Amarelo</option>
                          <option>Branco</option>
                          <option>Indígena</option>
                          <option>Pardo</option>
                          <option>Preto</option>
                          <option>Sem Declaração</option>
                        </select>
                      </div>

                      <div class="form-group">
                      <label for="exampleInputName1">Prontuário</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Prontuário" value = "exemplo6">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputCity1">Campus</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="Campus" value = "exemplo7">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail3">Email Institucional</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" value = "exemplo@gmail.com">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputSenha4">Definir Senha</label>
                      <input type="password" class="form-control" id="exampleInputSenha4" placeholder="Definir Senha" value = '12345678'>
                    </div>
                    <!-- NÃO ESQUECER DE ALTERAR O ID PARA O NOME CORRETO-->
                    <!--CÓDIGO COMPARANDO SENHAS -->
                    <div class="form-group">
                      <label for="exampleInputSenha5">Confirmar Senha</label>
                      <input type="password" class="form-control" id="exampleInputSenha5" placeholder="Confirmar Senha" value = '87654321'>
                    </div>
                    
                      
                    <div class="form-group">
                      <label>Foto 3x4</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Foto">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                   
                    
                    <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                    <a href="/everton/listar"><button class="btn btn-light">Cancelar</button></a>
                  </form>
                </div>
              </div>
            </div>