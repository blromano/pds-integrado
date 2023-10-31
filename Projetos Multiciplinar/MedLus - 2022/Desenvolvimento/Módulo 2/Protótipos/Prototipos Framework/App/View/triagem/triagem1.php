<?php
    $pagina = "triagem1";
    $footerColado = False; 
    include "../config.php";
    include "../header.php";

    echo $cssTriagem;
?>
<section class="d-flex flex-column align-items-center">
        <section class="bg-white mt-5 mb-5 listagem d-flex align-items-center flex-column px-5 col-md-6 col-sm-12 col-lg-3">
            <div class="py-1 data"> 
            <div class="d-flex flex-column align-items-center w-100">
                <img class="rounded-circle mt-5" width="150px" src="../../../resources/img/logo.png" class="font-weight-bold"> <h3> Triagem </h3>
            </div>
            </br>
            <h4 >Marque todas as afirmativas abaixo que se aplicam a você</h4>
            <h6 >Selecione uma resposta em cada linha</h6>
                        <div class="container mt-1">
                            <table>
                                <tr>  
                                    <form action="/action_page.php">
                                    <td>
                                        <div class="ui-multiple-choices-item ui-multiple-choices__choice" role="group">
                                            <div class="ui-multiple-choices-item__header">
                                                <span class="ui-text ui-multiple-choices-item__name">Eu tenho diabetes</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                                                <label class="form-check-label" for="radio1">Sim</label>
                                            </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                                                <label class="form-check-label" for="radio2">Não</label>
                                            </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                                                <label class="form-check-label">Não sei</label>
                                            </div>
                                    </td>
                                    </form>
                                </tr>
                                <tr>  
                                    <form action="/action_page.php">
                                    <td>
                                        <div class="ui-multiple-choices-item ui-multiple-choices__choice" role="group">
                                            <div class="ui-multiple-choices-item__header">
                                                <span class="ui-text ui-multiple-choices-item__name">Eu estou acima do peso ou obesa</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                                                <label class="form-check-label" for="radio1">Sim</label>
                                            </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                                                <label class="form-check-label" for="radio2">Não</label>
                                            </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                                                <label class="form-check-label">Não sei</label>
                                        </div>
                                    </td>
                                    </form>
                                </tr>
                                <tr>  
                                    <form action="/action_page.php">
                                    <td>
                                        <div class="ui-multiple-choices-item ui-multiple-choices__choice" role="group">
                                            <div class="ui-multiple-choices-item__header">
                                                <span class="ui-text ui-multiple-choices-item__name">Eu tenho hipertensão</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                                                <label class="form-check-label" for="radio1">Sim</label>
                                            </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                                                <label class="form-check-label" for="radio2">Não</label>
                                            </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                                                <label class="form-check-label">Não sei</label>
                                        </div>
                                    </td>
                                    </form>
                                </tr>
                                <tr>  
                                    <form action="/action_page.php">
                                    <td>
                                        <div class="ui-multiple-choices-item ui-multiple-choices__choice" role="group">
                                            <div class="ui-multiple-choices-item__header">
                                                <span class="ui-text ui-multiple-choices-item__name">Eu recentemente sofri uma lesão</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                                                <label class="form-check-label" for="radio1">Sim</label>
                                            </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                                                <label class="form-check-label" for="radio2">Não</label>
                                            </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                                                <label class="form-check-label">Não sei</label>
                                        </div>
                                    </td>
                                    </form>
                                </tr>
                                <tr>  
                                    <form action="/action_page.php">
                                    <td>
                                        <div class="ui-multiple-choices-item ui-multiple-choices__choice" role="group">
                                            <div class="ui-multiple-choices-item__header">
                                                <span class="ui-text ui-multiple-choices-item__name">Eu tenho colesterol alto</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1">
                                                <label class="form-check-label" for="radio1">Sim</label>
                                            </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                                                <label class="form-check-label" for="radio2">Não</label>
                                            </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">
                                                <label class="form-check-label">Não sei</label>
                                        </div>
                                    </td>
                                    </form>
                                </tr>
                            </table>
                         </div>
                         <a id="bt" href="../paciente/listagem.php" class="btn btn-sm btn-primary" >Cancelar</a>
                         <a id="bt" href="../triagem/triagem2.php" class="btn btn-sm btn-primary" >Próximo</a>
            </div>
        </section>
</section>

<?php include "../footer.php";?>
  
    