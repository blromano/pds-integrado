<style>
    .caixa{
    padding-top: 20px;
    padding-bottom: 20px;
}

#servicos{
    background: white;
}
.bg-grey {
  background-color: #f6f6f6;
}
</style>
<div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        


        <section id="servicos" class="caixa" >
            <ol class="breadcrumb ">
            <li class="breadcrumb-item">
            <a href="#">Perfil do Idoso </a>
            </li>
            <li class="breadcrumb-item active"> Higiene Diária</li>
            </ol>
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-fluid rounded-circle img-thumbnail" src="../../../img/md4-jose.jpg">
                            </div>
                        <div class="col-md-8">
                                <h2> Joseph Antony</h2>
                                <p> Prontuário: 158956</p>
                                <p>Data de Nascimento: 13/06/1944</p>
                                <p>Ingresso: 15/05/2018</p>
                                <h3> Prescrições Médicas: </h3>
                                <p>Ciprofloxacino 500mg _____________ 14 comprimidos
                                Tomar 1(um) comprimido, por via oral, a cada 12 (doze) horas, por 7 dias</p>
                           </div>
                        </div>    
                    </div>
         </section>
         <section id="servicos" class="caixa" class="bg-grey">
            <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="#">Histórico </a>
            </li>
            <li class="breadcrumb-item active"> Análise Dados de Higiene</li>
            <a href="" data-toggle="modal" data-target="#modalQuickView" class="btn btn-outline-primary pull-right" >Inserir</a>
            </ol>
                    <div class="container align-self-center">
                        <div class="row">
                            <div class="col-md-12">
                                <form>
                                    <input class="border border-dark form-control" id="date" type="date">
                                </form>
                                <br>
                                   <table class="table">
                                    <thead class = "thead-dark">
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Hora</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>Banho</td>
                                        <td> Sim </td>
                                        <td> 09:30 </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">2</th>
                                        <td>Higienização do Couro Cabeludo</td>
                                        <td>Não</td>
                                        <td> 09:30 </td>
                                      </tr>
                                      <tr>
                                        <th scope="row">3</th>
                                        <td> Higienização das orelhas </td>
                                        <td> Sim </td>
                                        <td> 10:30</td>
                                      </tr>
                                    </tbody>
                                  </table>
                           </div>

                        </div>    
                    </div>
         </section>
         
      </div>    
</div>




<!-- Modal: modalQuickView -->
<div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-5">
            <!--Carousel Wrapper-->
            <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails"
              data-ride="carousel">
              <!--Slides-->
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <img class="d-block w-150"
                    src="../../../img/Higiene.jpeg"
                    alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-150"
                   src="../../../img/idosobl.jpg"
                    alt="Second slide">
                </div>
              </div>
              <!--/.Slides-->
              <!--Controls-->
              <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
              <!--/.Controls-->
              <ol class="carousel-indicators">
                <li data-target="#carousel-thumb" data-slide-to="0" class="active">
                  <img src="../../../img/Higiene.jpeg" alt="higiene"  width="60"/>
                </li>
                <li data-target="#carousel-thumb" data-slide-to="0" class="active">
                  <img src="../../../img/idosobl.jpg" alt="higiene"  width="60"/>
                </li>
              </ol>
            </div>
            <!--/.Carousel Wrapper-->
          </div>
          <div class="col-lg-7">
            <h2 class="h2-responsive product-name">
              <strong>Cuidados Diários</strong>
            </h2>

            <!--Accordion wrapper-->
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingOne1">
                  <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                    aria-controls="collapseOne1">
                    <h5 class="mb-0">
                      Hidratação <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                  data-parent="#accordionEx">
                  <div class="card-body">
                    <form>
                        <div class="radio">
                          <label><input type="radio" name="optradio" checked> Sim </label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" name="optradio"> Não</label>
                        </div>
                        <input class="btn btn-primary" class="fas fa-cart-plus ml-2" aria-hidden="true" type="submit" value="Salvar">
                      </form> 
                  </div>
                </div>

              </div>
              <!-- Accordion card -->

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingTwo2">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                    aria-expanded="false" aria-controls="collapseTwo2">
                    <h5 class="mb-0">
                      	Banho de sol  <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2"
                  data-parent="#accordionEx">
                  <div class="card-body">
                    <form>
                        <div class="radio">
                          <label><input type="radio" name="optradio" checked> Sim </label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" name="optradio"> Não</label>
                        </div>
                        <input class="btn btn-primary" class="fas fa-cart-plus ml-2" aria-hidden="true" type="submit" value="Salvar">
                      </form> 
                  </div>
                </div>

              </div>
              <!-- Accordion card -->

              <!-- Accordion card -->
              <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingThree3">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                    aria-expanded="false" aria-controls="collapseThree3">
                    <h5 class="mb-0">
                      Repelente   <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                  data-parent="#accordionEx">
                  <div class="card-body">
                    <form>
                        <div class="radio">
                          <label><input type="radio" name="optradio" checked> Sim </label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" name="optradio"> Não</label>
                        </div>
                        <input class="btn btn-primary" class="fas fa-cart-plus ml-2" aria-hidden="true" type="submit" value="Salvar">
                      </form> 
                  </div>
                </div>

              </div>
              <!-- Card header -->
                <div class="card-header" role="tab" id="headingThree3">
                  <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                    aria-expanded="false" aria-controls="collapseThree3">
                    <h5 class="mb-0">
                      Padrão de sono    <i class="fas fa-angle-down rotate-icon"></i>
                    </h5>
                  </a>
                </div>

                <!-- Card body -->
                <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                  data-parent="#accordionEx">
                  <div class="card-body">
                    <form>
                        <div class="radio">
                          <label><input type="radio" name="optradio" checked> Bom </label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" name="optradio"> Regular </label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" name="optradio"> Ruim </label>
                        </div>
                        <input class="btn btn-primary" class="fas fa-cart-plus ml-2" aria-hidden="true" type="submit" value="Salvar">
                      </form> 
                  </div>
                </div>

              </div>
              <!-- Accordion card -->

            </div>
            <!-- Accordion wrapper -->
            <!-- /.Add to Cart -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>