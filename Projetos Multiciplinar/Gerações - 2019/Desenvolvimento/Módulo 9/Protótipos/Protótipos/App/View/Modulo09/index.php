

<section>
    <div class="card-body">
         <div class="container">     
            <div class="row" >
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <!--<form action="/action_page.php">-->
                        <div class="form-group align-self-center">
                            <br>
                            &nbsp;&nbsp;
                            <label class="lead" for="relatorios">Selecione o relatório que deseja gerar:</label>                
                            <select class="form-control warn" id="relatorios">
                                <option value="selecione">Selecione</option>
                                <option value="relatorio_grafico_estatistico_mortalidade_idosos">Gerar relatório gráfico e estatístico sobre a mortalidade dos idosos</option>
                                <option value="relatorio_grafico_estatistico_incidencia_doença_diarreica_idosos">Gerar relatório gráfico e estatístico sobre a incidência de doença diarreica aguda em idosos</option>
                                <option value="relatorio_grafico_estatistico_incidencia_escabiose_idosos">Gerar relatório gráfico e estatístico sobre a incidência de Escabiose em idosos</option>
                                <option value="relatorio_grafico_estatistico_incidencia_desidratacao_idosos">Gerar relatório gráfico e estatístico sobre a incidência de desidratação em idosos</option>
                                <option value="relatorio_grafico_estatistico_incidencia_queda_idosos">Gerar relatório gráfico e estatístico sobre a incidência de queda em idosos</option>
                                <option value="relatorio_grafico_estatistico_incidencia_desnutricao_idosos">Gerar relatório gráfico e estatístico sobre a incidência de desnutrição em idosos</option>
                                <option value="relatorio_grafico_estatistico_incidencia_ulcera_idosos">Gerar relatório gráfico e estatístico sobre a incidência de úlcera em idosos</option>
                                <option value="relatorio_grafico_estatistico_incidencia_fuga_idosos">Gerar relatório gráfico e estatístico sobre a incidência de fuga de idosos</option>
                                <option value="relatorio_grafico_estatistico_rotina_limpeza_comodos">Gerar relatório gráfico e estatístico sobre a rotina de limpeza dos cômodos</option>
                                <option value="relatorio_grafico_estatistico_numero_produtos_recebidos_instituicao_doacoes">Gerar relatório gráfico e estatístico sobre o número de produtos recebidos pela instituição a partir de doações</option>
                                <option value="relatorio_grafico_estatistico_tabela_valor_recebido_instituicao_doacoes">Gerar relatório gráfico e estatístico de tabela sobre o valor recebido pela instituição por doações</option>    
                            </select>           
                          

                            <br>
                            &nbsp;&nbsp;
                            <label class="lead" for="data_inicial">Data inicial:</label>
                            <input type="date" class="form-control warn" id="data_inicial" placeholder="Data inicial">
                           
                            <br>
                            &nbsp;&nbsp;
                            <label class="lead" for="data_final">Data final:</label>
                            <input type="date" class="form-control warn" id="data_final" placeholder="Data final">
                      
                            <br>
                            &nbsp;&nbsp;
                            <label class="lead" for="tipos_graficos">Tipo de gráfico:</label>
                            <select class="form-control" id="tipos_graficos">
                                <option value="selecione">Selecione</option>
                                <option value="grafico_barras">Gráfico de Barras</option>
                                <option value="grafico_colunas">Gráfico de Colunas</option>
                                <option value="grafico_linear">Gráfico Linear</option>
                                <option value="grafico_pizza">Gráfico de Pizza</option>
                            </select>
                            <br>
                            <div style="text-align:center" class="align-self-center">
                                <a href=" " class="btn btn-primary">Gerar Relatorios e Graficos</a>
                            </div>                    
                        </div>
                    <!--</form>-->
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
        </section>