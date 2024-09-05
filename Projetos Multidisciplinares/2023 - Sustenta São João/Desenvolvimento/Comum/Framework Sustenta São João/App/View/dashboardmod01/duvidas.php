<div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="/inserirDuvidas_Feedbacks" id="my_form" onsubmit="validaCampo()" class="form_j" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="DEF_TEMA">Tema</label>
                    <input required type="text" name="DEF_TEMA" id="DEF_TEMA" class="form-control text_j" placeholder="Tema da dúvida/feedback">
                </div>
                <div class="">
                    <label for="DEF_ANEXO">Anexar foto/PDF</label> <br>
                    <input type="file" required name="DEF_ANEXO" id="DEF_ANEXO" placeholder="Documento" onchange="previewImagem()">
                </div>  
                <div>
                    <img style="width: 150px;" src="../../resources/img/default_image.png">
                </div>     
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                    <div class="form-group"> 
                    <label>Urgência</label> <br>
                          <div class="form-check duv">
                            <input name="DEF_URGENCIA" class="form-check-input inptDUV" value="1" type="radio" id="flexRadioDefault1" >
                            <label class="form-check-label lblDUV" for="flexRadioDefault1">Baixa</label>
                          </div>
                          <div class="form-check duv">
                            <input name="DEF_URGENCIA" class="form-check-input inptDUV" value="2" type="radio"  id="flexRadioDefault2">
                            <label class="form-check-label lblDUV" for="flexRadioDefault2">Média</label>
                          </div>
                          <div class="form-check duv">
                            <input name="DEF_URGENCIA" class="form-check-input inptDUV" value="3" type="radio"  id="flexRadioDefault3">
                            <label class="form-check-label lblDUV" for="flexRadioDefault3">Alta</label>
                          </div>
                      </div>
                </div>

                <div class="col-md-6">
                    <label for="DEF_DESCRICAO">Descrição</label>
                    <textarea required name="DEF_DESCRICAO" rows="3" cols="10" class="form-control" placeholder="Escreva aqui sua dúvida ou feedback" id="DEF_DESCRICAO"></textarea>
                </div>

                <div class="form-group col-md-6">
                    <label for="FK_SETORES_SET_ID">Setor</label>
                    <select required name="FK_SETORES_SET_ID" class="form-control text_j" id="FK_SETORES_SET_ID">
                        <option value="" selected disabled>Selecione o setor</option>
                        <?php foreach ($this->getView()->setores as $setor) { ?>
                            <option value=<?php echo $setor->__get('SET_ID'); ?>><?php echo $setor->__get('SET_NOME'); ?></option>
                        <?php } ?>
                    </select>
                </div>



            </div>
            <div class="row justify-content-end alinhar">
                <div>
                    <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-plus-circle"></i> Registrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
  function previewImagem()
  {
    var imagem = document.querySelector('input[name=DEF_ANEXO]').files[0];
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
            'Sua dúvida/feedback foi registrada com sucesso.',
            'success'
        ).then(() => {
            document.getElementById('my_form').submit();
        });
    }
</script>