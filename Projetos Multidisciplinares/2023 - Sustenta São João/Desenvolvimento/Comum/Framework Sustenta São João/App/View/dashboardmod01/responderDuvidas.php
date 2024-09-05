<div class="card">
    <div class="card-header">
        <div class="row justify-content-between">
            <div class="col">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form action="/inserirRespostas_Duvidas_Feedbacks" id="my_form" onsubmit="validaCampo()" class="form_j" method="POST" enctype="multipart/form-data">
            <div class="form-row">
              <div class="col-md-6">
                  <label for="RES_TEXTO">Resposta</label>
                  <textarea required name="RES_TEXTO" rows="3" cols="10" class="form-control" placeholder="Escreva aqui sua resposta" id="RES_TEXTO"></textarea>
              </div>    
            </div>
            <div class="form-row">
            <div class="">
                    <label for="RES_ANEXO">Anexar foto/PDF</label> <br>
                    <input type="file" required name="RES_ANEXO" id="RES_ANEXO" placeholder="Documento" onchange="previewImagem()">
            </div>  
            <div>
                <img style="width: 150px;" src="../../resources/img/default_image.png">
            </div> 
            </div>
            <input type="hidden" name="FK_DUVIDAS_FEEDBACKS_DEF_ID" value="<?php echo $this->getView()->def_id; ?>">
            <div class="row justify-content-end alinhar">
                <div>
                <a class="a_j" href="/dashboard/gestaoduvidas"><button type="button" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Voltar</button></a>
                </div>
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
    var imagem = document.querySelector('input[name=RES_ANEXO]').files[0];
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
            'Sua resposta foi registrada com sucesso.',
            'success'
        ).then(() => {
            document.getElementById('my_form').submit();
        });
    }
</script>