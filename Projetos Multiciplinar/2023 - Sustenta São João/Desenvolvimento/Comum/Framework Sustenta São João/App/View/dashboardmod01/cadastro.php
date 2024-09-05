<script type="text/javascript">

function validar()
{
  var senha = cadastro.USU_SENHA.value;
  var rep_senha = cadastro.conf_senha.value;

  if(senha != rep_senha)
  {
    alert("As senhas não conferem!")
    return false;
  }
  else
  {
    return true;
  }

}

</script>

<div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
            </div>
        </div>
    </div>
    <small id="emailHelp" class="form-text text-muted pl-2">Nós não iremos compartilhar seus dados com ninguém.</small>
    <div class="card-body">
        <form action="/inserirCidadao" name="cadastro" class="form_j" method="POST" enctype="multipart/form-data" onsubmit="validaCampo()" id="my_form">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="USU_NOME">Nome completo</label>
                    <input required type="text" name="USU_NOME" id="USU_NOME" class="form-control text_j" placeholder="Digite seu nome">
                </div>
                <div class="form-group col-md-3">
                    <label for="USU_CPF">CPF</label> <br>
                    <input required type="text" name="USU_CPF" id="USU_CPF" class="form-control text_j" placeholder="Digite seu CPF" maxlength="12" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');">
                </div>      
                <div class="form-group col-md-3">
                    <label for="USU_RG">RG</label> <br>
                    <input required type="text" name="USU_RG" id="USU_RG" class="form-control text_j" placeholder="Digite seu RG" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');">
                </div>   
            </div>
            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="USU_DATA_NASCOMENTO">Data de Nascimento</label><br>
                <input name="USU_DATA_NASCIMENTO" id="USU_DATA_NASCIMENTO" class="form-control text_j" type="date" required>
              </div> 
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="USU_EMAIL">Email</label><br>
                <input required type="text" name="USU_EMAIL" id="USU_EMAIL" class="form-control text_j" placeholder="Digite seu Email">
              </div> 
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="USU_SENHA">Senha</label><br>
                <input required type="password" name="USU_SENHA" id="USU_SENHA" class="form-control text_j" placeholder="Digite seu Senha" minlength="6" maxlength="12">
              </div> 
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="conf_senha">Confirme sua senha</label><br>
                <input required type="password" name="conf_senha" id="conf_senha" class="form-control text_j" placeholder="Digite seu Senha novamente" minlength="6" maxlength="12">
              </div> 
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="USU_CELULAR">Celular</label><br>
                <input required type="tel" name="USU_CELULAR" id="USU_CELULAR" class="form-control text_j" placeholder="+55 (XX) XXXXX-XXXX" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');" maxlength="13">
              </div> 
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="USU_ESTADO">Endereço</label><br>
                <select required name="USU_ESTADO" id="USU_ESTADO" class="form-control text_j">
                                <option value="" selected disabled>Selecione um Estado</option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SP">SP</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                </select>
              </div> 
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <select required name="USU_CIDADE" id="USU_CIDADE" class="form-control text_j">
                    <option value="" selected disabled>Selecione uma Cidade</option>
                    <option>São João da Boa Vista</option>
                    <option>Aguaí</option>
                    <option>Águas da Prata</option>
                </select>
              </div> 
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="USU_BAIRRO">Bairro</label><br>
                <input required type="text" name="USU_BAIRRO" id="USU_BAIRRO" class="form-control text_j" placeholder="Digite o nome de seu Bairro">
              </div>
              <div class="form-group col-md-4">
                <label for="USU_RUA">Rua</label><br>
                <input required type="text" name="USU_RUA" id="USU_RUA" class="form-control text_j" placeholder="Digite o nome de sua Rua">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="USU_NUMERO_RESIDENCIA">Nº da Residência</label><br>
                <input required type="text" name="USU_NUMERO_RESIDENCIA" id="USU_NUMERO_RESIDENCIA" class="form-control text_j" placeholder="Digite o número de sua Residência" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');">
              </div>
              <div class="form-group col-md-4">
                <label for="USU_CEP">CEP</label><br>
                <input required type="text" name="USU_CEP" id="USU_CEP" class="form-control text_j" placeholder="Digite seu CEP" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..?)\../g, '$1');" maxlength="8" minlength="8">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-3 pl-4">
                <label>Sexo</label>
                        <div>
                          <input class="form-check-input inptALL" value="M" type="radio" name="USU_SEXO" id="flexRadioDefault1">
                          <label  for="flexRadioDefault1">
                            Masculino
                          </label>
                        </div>
                        <div >
                          <input class="form-check-input inptALL" value="F" type="radio" name="USU_SEXO" id="flexRadioDefault2">
                          <label  for="flexRadioDefault2">
                            Feminino
                          </label>
                        </div>
                        <div>
                          <input class="form-check-input inptALL" value="P" type="radio" name="USU_SEXO" id="flexRadioDefault3">
                          <label  for="flexRadioDefault3">
                            Prefiro não me identificar
                          </label>
                        </div>
              </div>
              <div class="">
                <labeL for="USU_FOTO_PERFIL">Insira sua Foto de Perfil</label><br>
                <input type="file" required name="USU_FOTO_PERFIL" id="USU_FOTO_PERFIL" placeholder="Documento" onchange="previewImagem()">
              </div>
              <div>
                <img style="width: 150px; height: 150px; border-radius: 50%;" src="../../resources/img/Default_pfp.png">
              </div>
              
              </div>
            <br>
            <p class="criar-conta">Já tem uma conta? <a href="/login">Entrar</a></p>

            <div class="row justify-content-end alinhar">
                <div>
                    <button type="submit" class="btn btn-success btn-sm" onclick="return validar()"><i class="bi bi-plus-circle"></i> Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
  function previewImagem()
  {
    var imagem = document.querySelector('input[name=USU_FOTO_PERFIL]').files[0];
    var preview = document.querySelector('img')
    /*$('img').css("visibility", "visible");*/

    var reader = new FileReader();

    reader.onloadend = function ()
    {
      preview.src = reader.result;
    }

    if(imagem)
    {
      reader.readAsDataURL(imagem);
    }
    else
    {
      preview.src = "";
    }
  
  }
</script>

<script>
    function validaCampo() {

        event.preventDefault(); // Impede o envio padrão do formulário

        Swal.fire(
            'Enviado!',
            'Você foi cadastrado com sucesso.',
            'success'
        ).then(() => {
            document.getElementById('my_form').submit();
        });
    }
</script>