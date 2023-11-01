<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>Painel Administrativo</a>
          </li>
          <li class="breadcrumb-item active">Gráficos e Relatórios  </li>
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Gráfico Estatístico de tabela sobre a rotina de limpeza dos cômodos</div>
          <div class="card-body">
             <canvas id="myBarChart" width="100%" height="40"></canvas>
          </div>
          <div class="card-footer small text-muted">Grafico Gerado em dd/mm/aaaa  00:00 AM/PM </div>
        </div>
      </div>
    
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>Relatorios</a>
          </li>
          
        </ol>
        <section>
            <div class="card mb-3">
                <div class="card-header lead">
                    <i class="fas fa-table lead"></i>
                        Tabela sobre a rotina de limpeza dos cômodos no mês de Janeiro
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Número de Semanas</th> 
                                    <th>----</th>                                                                           
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Número de Semanas</th> 
                                    <th>-----</th> 
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>                                  
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>4</td>  
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>6</td>  
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>8</td>  
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>
        </section>
       
    </div>
    
    
<center><input type="reset" value="Gerar PDF" /> 
<input type="reset" value="Imprimir" /> 
<input type="reset" value="Enviar por E-Mail" /> </center>>
    
</div>

