<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <div class="card-header">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
              </div>
              <div class="card-body">






                <?php $this->getView()->duvida?>

                <?php
                foreach($this->getView()->duvida as $duvida_feedback)
                {       
                  if($duvida_feedback->__GET("DEF_ID") == $_GET["id"])   
                  { ?> 
                    <h2> <?php echo $duvida_feedback->__GET("DEF_TEMA"); ?> </h2>
                    <br>
                    <?php echo $duvida_feedback->__GET("DEF_DESCRICAO");
                    if(strpos($duvida_feedback->__GET("DEF_ANEXO"), '.'))
                    {
                      echo "<br>";
                      echo "<img src=\"../../resources/uploaded_files/";
                      echo $duvida_feedback->__GET("DEF_ANEXO");
                      echo "\" height=\"400\">";
                    }
                    if($duvida_feedback->__get("DEF_STATUS") == 1)
                    {
                      foreach($this->getView()->resposta as $respostaa)
                      {
                        if($respostaa->__get("FK_DUVIDAS_FEEDBACKS_DEF_ID") == $duvida_feedback->__get("DEF_ID"))
                        {
                          echo "<br><br><br><br>";
                          echo "<h4>Resposta:</h4>";
                          echo $respostaa->__get("RES_TEXTO");
                          if(strpos($respostaa->__GET("RES_ANEXO"), '.'))
                          {
                            echo "<br>";
                            echo "<img src=\"../../resources/uploaded_files/";
                            echo $respostaa->__GET("RES_ANEXO");
                            echo "\" height=\"400\">";
                          }
                        }
                      }
                    }
                  }   
                }?>

                <br>
                <div class="row justify-content-end alinhar">
                  <a class="a_j" href="/dashboard/gestaoduvidas"><button type="button" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Voltar</button></a>
                </div>


              </div>
            </div>
          </div>
          
      </div>