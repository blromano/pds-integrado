<section id="md8" class="container-fluid">
    <div class="container"
         <h2>FICHA DO FUNCIONÁRIO</h2>
        <br>
        <form action="/action_page.php">
            <div class="row">
                <div class="col-25">
                    <img src="../../../img/kim.png" alt="" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="nometarefa"><b>Nome Completo: </b></label>
                </div>
                <div class="col-75">
                    <label for="nometarefa">Kim Woosung</label>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="nometarefa"><b>Status: </b></label>
                </div>
                <div class="col-75">
                    <label for="nometarefa">Ativo</label>
                    <i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="nometarefa"><b>Prontuário: </b></label>
                </div>
                <div class="col-75">
                    <label for="nometarefa">100</label>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="nometarefa"><b>CPF: </b></label>
                </div>
                <div class="col-75">
                    <label for="nometarefa">125.128.597-19</label>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="nometarefa"><b>Data de Nascimento: </b></label>
                </div>
                <div class="col-75">
                    <label for="nometarefa">25/02/1993</label>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="nometarefa"><b>Salário </b></label>
                </div>
                <div class="col-75">
                    <label for="nometarefa">INSIRA UM SALÁRIO </label>
                    <i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="nometarefa"><b>Cargo: </b></label>
                </div>
                <div class="col-75">
                    <label for="nometarefa">Gerente</label>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="nometarefa"><b>Data entrada na Empresa: </b></label>
                </div>
                <div class="col-75">
                    <label for="nometarefa">03/08/2017</label>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="nometarefa"><b>Bônus Salarial: </b></label>
                </div>
                <div class="col-75">
                    <label for="nometarefa">INSIRA UM BONUS</label>
                    <i class="fas fa-edit"></i>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="nometarefa"><b>Desconto Salarial: </b></label>
                </div>
                <div class="col-75">
                    <label for="nometarefa">INSIRA UM DESCONTO</label>
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <br>
            <br>
            <br>
        </form>
        <br>
        <br>
        <br>
    </div>
    
<!--    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDIÇÃO DE STATUS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><form>

                        <select id="funcionarioresponsavel" name="funcionarioresponsavel">
                            <option value="lindinha">Ativo</option>
                            <option value="florzinha">Inativo</option>

                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Confirmar</button>
                </div> 
            </div>
        </div>
    </div>-->
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDIÇÃO DE SALÁRIO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><form>

                        <label>Salário:</label> <input type="number" alt="" required/> 
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <input type="submit" />
                    </form>
                </div>
                <div class="modal-footer">
                    
                    
                </div> 
            </div>
        </div>
    </div>
</section>