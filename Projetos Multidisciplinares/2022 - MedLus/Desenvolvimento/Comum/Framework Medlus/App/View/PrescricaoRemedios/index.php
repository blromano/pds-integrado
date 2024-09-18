                    <!-- Page Heading -->
                    <?php if (count($this->getView()->remediosListagem) < 1) { ?>
                        <p>Não existem registros de remédios!</p>
                    <?php } else {?>
                    <div class="select-box">
                        <div class="options-container">
                        <?php foreach ($this->getView()->remediosListagem as $dado) { ?>
                            <div class="option">
                                <input type="radio" class="radio" id="remedios" name="category" />
                                <label for="automobiles"><?php echo $dado->__get('REM_NOME'); ?></label>
                            </div>
                            <?php } ?>
                            <!-- <div class="option">
                                <input type="radio" class="radio" id="film" name="category" />
                                <label for="film">Film & Animation</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" id="science" name="category" />
                                <label for="science">Science & Technology</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" id="art" name="category" />
                                <label for="art">Art</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" id="music" name="category" />
                                <label for="music">Music</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" id="travel" name="category" />
                                <label for="travel">Travel & Events</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" id="sports" name="category" />
                                <label for="sports">Sports</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" id="news" name="category" />
                                <label for="news">News & Politics</label>
                            </div>

                            <div class="option">
                                <input type="radio" class="radio" id="tutorials" name="category" />
                                <label for="tutorials">Tutorials</label>
                            </div> -->
                        </div>
                        <div class="selected">
                        Selecione um Remédio
                        </div>
                    </div>
                <?php } ?> 

                    <script>
                    const selected = document.querySelector(".selected");
                    const optionsContainer = document.querySelector(".options-container");

                    const optionsList = document.querySelectorAll(".option");

                    selected.addEventListener("click", () => {
                    optionsContainer.classList.toggle("active");
                    });

                    optionsList.forEach(o => {
                    o.addEventListener("click", () => {
                        selected.innerHTML = o.querySelector("label").innerHTML;
                        optionsContainer.classList.remove("active");
                    });
                    });
                    </script>
                    <!-- Remédios -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold text-primary text-med">REMÉDIOS</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Remédios</th>
                                            <th>Período (Dias)</th>
                                            <th>Periodicidade (Horas)</th>
                                            <th>Detalhes</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Remédios</th>
                                            <th>Período (Dias)</th>
                                            <th>Periodicidade (Horas)</th>
                                            <th>Detalhes</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Neosaldina</td>
                                            <td>3</td>
                                            <td>12</td>
                                            <td><button class="btn btn-primary btn-user btn-block btn-med">EDITAR</button></td>
                                            <td><button class="btn btn-primary btn-user btn-block btn-med">EXCLUIR</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
