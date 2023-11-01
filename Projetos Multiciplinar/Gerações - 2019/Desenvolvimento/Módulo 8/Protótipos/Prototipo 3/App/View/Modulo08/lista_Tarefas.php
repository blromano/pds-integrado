<section id="md8" class="container-fluid">
    <div class="card mb-3" style="width: 100%">
        <div class="card-header">
            <img src="../../../img/icons8-documento-40.png" alt=""/>
            LISTA DE TAREFAS</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Status</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Data</th>
                            <th scope="col">Setor</th>
                            <th scope="col">Responsável</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tr>
                        <td><label class="container">
                                <input type="checkbox" ><span class="checkmark"></span>
                            </label></td>

                        <td>Limpar lençóis</td>
                        <td>10/05/2019</td>
                        <td>Quarto A</td>
                        <td>Lindinha</td>

                        <td><i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal"></i>
                            <i class="fas fa-times"data-toggle="modal" data-target="#ModalEX"></i></td>
                    </tr>
                    <tr>
                        <td><label class="container">
                                <input type="checkbox"><span class="checkmark"></span>
                            </label></td>

                        <td>Lavar roupa</td>
                        <td>10/05/2019</td>
                        <td>Lavanderia</td>
                        <td>Lindinha</td>
                        <td><i class="fas fa-edit"></i>
                            <i class="fas fa-times"></i></td>
                    </tr>
                    <tr>
                        <td><label class="container">
                                <input type="checkbox"><span class="checkmark"></span>
                            </label></td>

                        <td>Limpar mesa</td>
                        <td>10/05/2019</td>
                        <td>Cozinha</td>
                        <td>Florzinha</td>
                        <td><i class="fas fa-edit"></i>
                            <i class="fas fa-times"></i></td>
                    </tr>

                </table>

            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                Nome: <input type="text" id="nometarefas"/>
                                Data: <input type="date" id="dataTarefa"/>
                                Setor: <select>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                </select>
                                Nome: <select>
                                    <option value="A">Rodrigo</option>
                                    <option value="B">Thomaz</option>
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
        </div>
    </div>
        <section>