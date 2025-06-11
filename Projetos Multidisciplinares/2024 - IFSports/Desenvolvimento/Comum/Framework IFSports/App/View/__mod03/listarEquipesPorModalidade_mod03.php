<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h2 class="template-demo">Listagem de Equipes por Modalidade</h2>
                  <p class="card-description">
                  <!--<a href="/mod03/vincularEquipes_mod3"><button type="button" class="btn btn-success">Cadastrar Novo</button></a>-->
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            ID
                          </th>
                          <th>
                            Modalidade
                          </th>
                          <th>
                            Evento
                          </th>
                          <th>
                            Data de Início do Evento
                          </th>
                          <th>
                            Ações
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Atletismo
                          </td>
                          <td>
                            JIF
                          </td>
                          <td>
                            23/11/2024
                          </td>
                          <td>
                            <a href="/vincularEquipes_mod3"><button type="button" class="btn btn-primary">Vincular Equipe Esportiva</button>
                            <a href="/listar_SelecionarAlunosInscritosNoEvento_mod3"><button type="button" class="btn btn-info">Alunos Inscritos</button>   
                          </td>
                        </tr>
                        <tr>
                          <td>
                            2
                          </td>
                          <td>
                            Basquete
                          </td>
                          <td>
                            JIF
                          </td>
                          <td>
                          23/11/2024
                          </td>

                          <td>
                          <a href="/vincularEquipes_mod3"><button type="button" class="btn btn-primary">Vincular Equipe Esportiva</button>
                            <a href="/listar_SelecionarAlunosInscritosNoEvento_mod3"><button type="button" class="btn btn-info">Alunos Inscritos</button>   
                          </td>
                        </tr>
                        <tr>
                          <td>
                            3
                          </td>
                          <td>
                            Futebol
                          </td>
                          
                          <td>
                            GDE
                          </td>
                          <td>
                          15/06/2024
                          </td>
                          <td>
                          <a href="/vincularEquipes_mod3"><button type="button" class="btn btn-primary">Vincular Equipe Esportiva</button>
                            <a href="/listar_SelecionarAlunosInscritosNoEvento_mod3"><button type="button" class="btn btn-info">Alunos Inscritos</button>   
                                
                          </td>
                        </tr>
                        <tr>
                          <td>
                            4
                          </td>
                          <td>
                            Natação
                          </td>
                          <td>
                            JIF
                          </td>
                          <td>
                          23/11/2024
                          </td>
                          <td>
                          <a href="/vincularEquipes_mod3"><button type="button" class="btn btn-primary">Vincular Equipe Esportiva</button>
                            <a href="/listar_SelecionarAlunosInscritosNoEvento_mod3"><button type="button" class="btn btn-info">Alunos Inscritos</button>                                
                          </td>
                        </tr>
                        <tr>
                          <td>
                            5
                          </td>
                          <td>
                            Tênis de Mesa
                          </td>
                          <td>
                            GDE
                          </td>
                          <td>
                          15/06/2024
                          </td>
                          <td>
                          <a href="/vincularEquipes_mod3"><button type="button" class="btn btn-primary">Vincular Equipe Esportiva</button>
                            <a href="/listar_SelecionarAlunosInscritosNoEvento_mod3"><button type="button" class="btn btn-info">Alunos Inscritos</button>   
                          </td>
                        </tr>
                        <tr>
                          <td>
                            6
                          </td>
                          <td>
                            Vôlei
                          </td>
                          <td>
                            JIF
                          </td>
                          <td>
                          23/11/2024
                          </td>
                          <td>
                          <a href="/vincularEquipes_mod3"><button type="button" class="btn btn-primary">Vincular Equipe Esportiva</button>
                            <a href="/listar_SelecionarAlunosInscritosNoEvento_mod3"><button type="button" class="btn btn-info">Alunos Inscritos</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <section id="modalidades">
            <!--<h2><br>Modalidades Esportivas</h2>
            <ul>
                <li><a href="#" onclick="showTeams('futebol')">Futebol</a></li>
                <li><a href="#" onclick="showTeams('basquete')">Basquete</a></li>
                <li><a href="#" onclick="showTeams('voleibol')">Voleibol</a></li>
                <li><a href="#" onclick="showTeams('natacao')">Natação</a></li>
            </ul>
        </section>
        <section id="equipes">
            <h2>Equipes</h2>
            <div id="teams-list"> -->
                <!-- Lista de equipes será exibida aqui --> <!--
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Gerenciamento de Equipes Esportivas</p>
    </footer>

    <script>
        const teams = {
            futebol: ["Equipe A", "Equipe B", "Equipe C"],
            basquete: ["Equipe D", "Equipe E"],
            voleibol: ["Equipe F", "Equipe G", "Equipe H", "Equipe I"],
            natacao: ["Equipe J", "Equipe K"]
        };

        function showTeams(modality) {
            const teamsList = document.getElementById("teams-list");
            teamsList.innerHTML = "";

            if (teams[modality]) {
                teams[modality].forEach(team => {
                    const teamElement = document.createElement("p");
                    teamElement.textContent = team;
                    teamsList.appendChild(teamElement);
                });
            }
        }
    </script> -->
</body>
</html>
                  </div>
                </div>
              </div>
            </div>