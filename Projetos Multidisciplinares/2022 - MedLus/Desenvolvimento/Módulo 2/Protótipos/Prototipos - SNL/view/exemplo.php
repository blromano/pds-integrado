<?php
    $pagina = "exemplo";
    $footerColado = False; /* False para footer flutuante, true para footer colado na parte de baixo */
    include "config.php";
    include "header.php";
?>

    <section class="d-flex flex-column align-items-center">
        <h1 class="mt-3">Triagem</h1>   
        <div class="py-5 data"> 
            <div class="row mt-1">
                <ul class="ui-list ui-multiple-choices__list">
                    <li class="ui-list-item ui-multiple-choices__list-item">
                                <div class="ui-multiple-choices-item ui-multiple-choices__choice" role="group">
                                    <div class="ui-multiple-choices-item__header">
                                        <span class="ui-text ui-multiple-choices-item__name">Eu tenho diabetes</span>
                                </div>
                                <label class="ui-radio ui-multiple-choices-item__option" for="radio-sf54tidibbz">
                                    <input id="radio-sf54tidibbz" type="radio" class="visual-hidden" name="p_8">
                                        <div class="ui-radio__radiobutton">
                                            <div class="ui-radio__mark"></div>
                                        </div>
                                    <div class="ui-radio__label">Sim</div>
                                </label>
                                <label class="ui-radio ui-multiple-choices-item__option" for="radio-ce9krpsk8nt">
                                    <input id="radio-ce9krpsk8nt" type="radio" class="visual-hidden" name="p_8">
                                        <div class="ui-radio__radiobutton">
                                            <div class="ui-radio__mark"></div>
                                        </div>
                                    <div class="ui-radio__label">Não</div></label>
                                <label class="ui-radio ui-multiple-choices-item__option" for="radio-wgtgkri0bza">
                                    <input id="radio-wgtgkri0bza" type="radio" class="visual-hidden" name="p_8">
                                        <div class="ui-radio__radiobutton">
                                            <div class="ui-radio__mark"></div>
                                        </div>
                                    <div class="ui-radio__label">Não sei</div>
                                </label>
                                </div>
                    </li>
                    <li class="ui-list-item ui-multiple-choices__list-item">
                                <div class="ui-multiple-choices-item ui-multiple-choices__choice" role="group">
                                    <div class="ui-multiple-choices-item__header">
                                        <span class="ui-text ui-multiple-choices-item__name">Eu estou acima do peso ou obesa</span>
                                    </div>
                                <label class="ui-radio ui-multiple-choices-item__option" for="radio-sf54tidibbz">
                                    <input id="radio-sf54tidibbz" type="radio" class="visual-hidden" name="p_8">
                                        <div class="ui-radio__radiobutton">
                                            <div class="ui-radio__mark"></div>
                                        </div>
                                        <div class="ui-radio__label">Sim</div>
                                    </label>
                                    <label class="ui-radio ui-multiple-choices-item__option" for="radio-ce9krpsk8nt">
                                        <input id="radio-ce9krpsk8nt" type="radio" class="visual-hidden" name="p_8">
                                        <div class="ui-radio__radiobutton">
                                            <div class="ui-radio__mark"></div>
                                        </div>
                                        <div class="ui-radio__label">Não</div></label>
                                    <label class="ui-radio ui-multiple-choices-item__option" for="radio-wgtgkri0bza">
                                        <input id="radio-wgtgkri0bza" type="radio" class="visual-hidden" name="p_8">
                                        <div class="ui-radio__radiobutton">
                                            <div class="ui-radio__mark"></div>
                                        </div>
                                        <div class="ui-radio__label">Não sei</div>
                                    </label>
                                </div>
                    </li>
                </ul>
                </div>
        </div>
    </section>

<?php include "footer.php";?>
  