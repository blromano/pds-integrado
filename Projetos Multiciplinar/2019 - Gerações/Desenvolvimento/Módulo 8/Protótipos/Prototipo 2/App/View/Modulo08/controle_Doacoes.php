<section id="md8" class="container-fluid">
    <div class="card mb-3" style="width: 100%">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Controle de doações</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo Doação</th>
                            <th>Nome Doador</th>
                            <th>Tipo de doação</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Matheus</td>
                            <td>Dinheiro</td>
                            <td><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i>
                                <i class="fas fa-times" data-toggle="modal" data-target="#ModalEX"></i></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Heloisa</td>
                            <td>Roupa</td>
                            <td><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i>
                                <i class="fas fa-times" data-toggle="modal" data-target="#ModalEX"></i></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td> </td>
                            <td>Alimentos</td>
                            <td><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i>
                                <i class="fas fa-times" data-toggle="modal" data-target="#ModalEX"></i></td>
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
                    <form>
                        Nome doador: <input type="text" placeholder="Doador"/>
                        Tipo doação <select>
                            <option>Dinheiro</option>
                            <option>Roupa</option>
                            <option>Alimentos</option>
                            <option>Outros</option>
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
    <div class="modal fade" id="ModalEX" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edição Tarefas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><form>
                        <h3>Tem certeza que quer excluir</h3>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Confirmar</button>
                </div> 
            </div>
        </div>

    </div>
</section>