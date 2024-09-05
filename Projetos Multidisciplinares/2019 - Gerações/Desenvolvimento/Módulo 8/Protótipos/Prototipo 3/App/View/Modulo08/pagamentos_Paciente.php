<section id="md8" class="container-fluid">
    <div class="card mb-3" >
        <div class="card-header">
            <i class="fas fa-table"></i>
            Pagamentos Pacientes</div>
        <div class="card-body" >
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nome Idoso</th>
                            <th>Tipo Pagamento</th>
                            <th>valor</th>
                            <th>Satus Pagamento</th>
                            <th>Historico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Joaquin José</td>
                            <td>Cartão</td>
                            <td>R$500</td>
                            <td>Pago <i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i>
                                </i></td>
                            <td>Historico <i class="fa fa-bars" data-toggle="modal" data-target="#ListModel"> </td>
                        </tr>
                        <tr>
                            <td>Antonio Maria</td>
                            <td>A vista</td>
                            <td>R$ 300</td>
                            <td>Pago <i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i>
                            </td>
                            <td>Historico <i class="fa fa-bars" data-toggle="modal" data-target="#ListModel"></td>
                        </tr>
                        <tr>
                            <td>Maria do Bairro</td>
                            <td>Parcelamento</td>
                            <td>R$ 3000</td>
                            <td>Pendente <i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i>
                            <td>Historico <i class="fa fa-bars" data-toggle="modal" data-target="#ListModel"></i></td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <option value="Pago">Pago</option>
                            <option value="Pendente">Pendente</option>

                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Confirmar</button>
                </div> 
            </div>
        </div>
    </div>

    <div class="modal fade" id="ListModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Historico de pagamentos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><form>
                        Data: 23/05/2000   Valor R$ 500 </br></br>
                        Data: 23/06/2000   Valor R$ 500</br></br>
                        Data: 23/07/2000   Valor R$ 500</br></br>
                        Data: 23/08/2000   Valor R$ 500</br></br>
                        Data: 23/09/2000   Valor R$ 500</br></br>
                        Data: 23/10/2000   Valor R$ 500

                    </form>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Confirmar</button>
                </div> 
            </div>
        </div>
    </div>
</section>