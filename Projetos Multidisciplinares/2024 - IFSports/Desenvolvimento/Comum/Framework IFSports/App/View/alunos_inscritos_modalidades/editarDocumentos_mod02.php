<html>
<script>
function alertarEnvio() {
    alert("Conteúdo enviado com sucesso!");
    window.location.href = "/meus_eventos_aluno";
}

function redirecionarMeusEventosAluno() {
    window.location.href = "/meus_eventos_aluno";
}
</script>

<style>
  /* Estilos Gerais */
  body {
    font-family: Arial, sans-serif;
    background-color: #f7f7f7;
  }

  .titulo {
    text-align: center;
    margin-top: 20px;
    font-size: 2rem;
    color: #333;
  }

  .tabela {
    width: 70%;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
    border-collapse: collapse;
  }

  .tabela th, .tabela td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
  }

  .subtitulo {
    font-size: 1.2rem;
    color: #333;
  }

  .botao {
    background-color: #3BBFC3;
    border-color: #3BBFC3;
    padding: 10px 20px;
    color: white;
    text-align: center;
    cursor: pointer;
    border: none;
    font-size: 1rem;
  }

  .botao:hover {
    background-color: #33a6a6;
  }

  /* Estilos para o formulário de justificativa */
  .justificativa-form {
    width: 70%;
    margin-left: auto;
    margin-right: auto;
    margin-top: 30px;
  }

  .justificativa-input {
    width: 100%;
    height: 40px;
    padding: 10px;
    border: 1px solid lightgray;
    font-size: 1rem;
  }

  .botoes {
    text-align: center;
    margin-top: 30px;
  }

  .enviar, .cancelar {
    width: 150px;
    height: 50px;
    background-color: #3BBFC3;
    border-color: #3BBFC3;
    color: white;
    font-size: 1.2rem;
    cursor: pointer;
    margin: 0 10px;
    border: none;
  }

  .enviar:hover, .cancelar:hover {
    background-color: #33a6a6;
  }

  .arquivo-exibido {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
  }

  .arquivo-exibido span {
    flex: 1;
    font-size: 1rem;
    color: #333;
  }

  .arquivo-exibido input[type="file"] {
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
    cursor: pointer;
    width: 50%;
  }

  /* Estilos para o campo de upload de arquivo */
  .arquivo-exibido a {
    color: #3BBFC3;
    text-decoration: none;
    font-size: 1rem;
  }

  .arquivo-exibido a:hover {
    text-decoration: underline;
  }

  /* Estilos para mensagens de sucesso e erro */
  .mensagem-sucesso {
    color: green;
    font-size: 1rem;
    text-align: center;
    margin-top: 20px;
  }

  .mensagem-erro {
    color: red;
    font-size: 1rem;
    text-align: center;
    margin-top: 20px;
  }

</style>


<body>
    <h1 class="titulo">Editar Documentos</h1>

    <!-- Exibição dos arquivos enviados -->
    <table class="table table-bordered tabela">
        <tbody>
            <!-- Exibição do Boletim Escolar -->
            <tr>
                <td>
                    <h4 class="subtitulo">Boletim Escolar</h4>
                    <!-- Se o arquivo estiver presente, exibe o nome ou link para visualização -->
                    <div class="arquivo-exibido">
                        <!-- Suponha que $boletimEscolar seja o nome do arquivo enviado -->
                        <span>Nome do Arquivo: BoletimEscolar.pdf</span>
                        <input type="file" name="boletimEscolar" class="form-control">
                    </div>
                </td>
            </tr>

            <!-- Exibição da Foto Pessoal -->
            <tr>
                <td>
                    <h4 class="subtitulo">Foto Pessoal</h4>
                    <div class="arquivo-exibido">
                        <!-- Suponha que $fotoPessoal seja o nome do arquivo enviado -->
                        <span>Nome do Arquivo: FotoPessoal.jpg</span>
                        <input type="file" name="fotoPessoal" class="form-control">
                    </div>
                </td>
            </tr>

            <!-- Exibição da Cópia do RG -->
            <tr>
                <td>
                    <h4 class="subtitulo">Cópia do RG</h4>
                    <div class="arquivo-exibido">
                        <!-- Suponha que $copiarG seja o nome do arquivo enviado -->
                        <span>Nome do Arquivo: CopiaRG.pdf</span>
                        <input type="file" name="copiaRG" class="form-control">
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <form action="listarEventos_mod02.php" method="POST" class="justificativa-form">
        <h4>Justificativa: </h4>
        <input type="text" name="name" class="justificativa-input">
    </form>

    <div class="botoes">
        <button type="submit" class="btn btn-dark enviar" onclick="alertarEnvio()"><h4>Enviar</h4></button>
        <button type="button" class="btn btn-dark cancelar" onclick="redirecionarMeusEventosAluno()"><h4>Cancelar</h4></button>
    </div>
</body>
</html>
