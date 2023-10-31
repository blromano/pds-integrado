<?php 
    $pagina = "listagem";
    $footerColado = true;
    include "config.php";
    include 'header.php';
?>
    <section class="d-flex flex-column align-items-center">
        <h1 class="main-title mt-2">Cancelar Consulta Online</h1>
        <section class="bg-white mt-5 mb-5 listagem d-flex align-items-center flex-column px-5 col-md-6 col-sm-12 col-lg-3">
            
            <div class="py-5 data">
                <div class="row mt-1">
                    <div class="d-flex flex-row">
                        <label>Justificativa do cancelamento: </label>
                    </div>
                    
                    <div class="d-flex flex-row">
                        <p>
                            <textarea id="txtTextArea"  rows="3" cols="45"></textarea>
                            <!-- Aumenta a area de texto de forma responsiva mas tem risco em travar a pagina(retire o comentario para usar e comente a outra textarea): -->
                            <!-- <script language="javascript">
                                function autoResize()
                                {
                                    objTextArea = document.getElementById('txtTextArea');
                                    while (objTextArea.scrollHeight > objTextArea.offsetHeight)
                                    {
                                        objTextArea.rows += 1;
                                    }
                                }
                            </script>
                            <textarea id="txtTextArea"  rows="3" cols="45" onkeydown="autoResize()"></textarea> -->
                        </p>
                    </div>
                </div>
            </div>
                <div class="d-flex flex-row justify-content-center">
                    <tr class="action-row">
                        <a href="prototipo-15.php" class="btn btn-sm btn-primary"> Confirmar</a>
                    </tr>
                </div> 
            </div>
        </section>
    </section>
<?php include "footer.php";?>