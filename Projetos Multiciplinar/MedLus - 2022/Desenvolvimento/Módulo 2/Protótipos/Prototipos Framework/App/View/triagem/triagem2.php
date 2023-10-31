<?php
    $pagina = "triagem2";
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
                        <div class="container mt-1">
                            <table>
                                <tr>  
                                    <form action="/action_page.php">
                                    <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="radio1" name="optradio" value="option1">
                                                <label class="form-check-label" for="radio1">Coriza</label>
                                            </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="radio1" name="optradio" value="option1">
                                                <label class="form-check-label" for="radio1">Febre</label>
                                            </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="radio1" name="optradio" value="option1">
                                                <label class="form-check-label" for="radio1">Falta de ar</label>
                                            </div>
                                    </td>
                                </tr>
                                
                                <tr>  
                                    <form action="/action_page.php">
                                    <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="radio1" name="optradio" value="option1">
                                                <label class="form-check-label" for="radio1">Dor de cabeça</label>
                                            </div>
                                    </td>
                                    </form>
                                    <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="radio1" name="optradio" value="option1">
                                                <label class="form-check-label" for="radio1">Dor no corpo</label>
                                            </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="radio1" name="optradio" value="option1">
                                                <label class="form-check-label" for="radio1">Dor na garganta</label>
                                            </div>
                                    </td>
                                </tr>

                                <tr>  
                                    <form action="/action_page.php">
                                    <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="radio1" name="optradio" value="option1">
                                                <label class="form-check-label" for="radio1">Tosse</label>
                                            </div>
                                    </td>
                                    </form>
                                    <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="radio1" name="optradio" value="option1">
                                                <label class="form-check-label" for="radio1">Vômito</label>
                                            </div>
                                    </td>
                                    <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="radio1" name="optradio" value="option1">
                                                <label class="form-check-label" for="radio1">Diarreia</label>
                                            </div>
                                    </td>
                                </tr>
                                
                               
                            </table>

                            <div>  
                                    <form action="/action_page.php">
                                        <label for="username">Em caso de necessidade, espefique os sintomas no campo abaixo:</label>
                                        <input type="text" placeholder="Sintomas" id="username">
                                    </form>
                            </div>
                         </div>

                         <a id="bt" href="../triagem/triagem1.php" class="btn btn-sm btn-primary" >Voltar</a>
                         <a id="bt" href="../paciente/listagem.php" class="btn btn-sm btn-primary" >Cancelar</a>
                         <a id="bt" href="3" class="btn btn-sm btn-primary" >Enviar</a>
            </div>
        </section>
</section>

<?php include "../footer.php";?>
  
    