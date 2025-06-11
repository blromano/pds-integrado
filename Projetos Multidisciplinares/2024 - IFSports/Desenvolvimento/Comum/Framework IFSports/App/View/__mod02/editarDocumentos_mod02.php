<html>
<script>
function alertarEnvio()
{
alert("Conteúdo enviado com sucesso!");
}
function redirecionarMeusEventos()
{
    window.location.href = "/meus_eventos_aluno";

}
</script>
<style>
  .titulo {
    text-align: center;
}

.tabela {
    width: 60%;
    margin-left: auto;
    margin-right: auto;
}

.subtitulo {
    text-align: center;
    margin-left: auto;
    margin-right: auto;
}

.botao {
    background-color: #3BBFC3;
    border-color: #3BBFC3;
    margin-left: auto;
    margin-right: auto;
}

.justificativa-form {
    width: 60%;
    height: 20%;
    margin-left: auto;
    margin-right: auto;
    margin-top: 20px;
}

.justificativa-input {
    width: 100%;
    height: 100%;
    border-color: lightgray;
    border-style: solid;
}

.botoes {
    width: 100%;
    text-align: center;
    margin-top: 30px;
}

.enviar, .cancelar {
    width: 150px;
    height: 50px;
    background-color: #3BBFC3;
    border-color: #3BBFC3;
    margin: 0 10px;
}
  </style>
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

<body>
    <h1 class="titulo">Editar Documentos</h1>

    <table class="table table-bordered tabela">
        <tbody>
            <tr>
                <td>
                    <h4 class="subtitulo">Boletim Escolar</h4>
                </td>
                <td>
                    <center><button type="button" class="btn btn-dark botao"><h5>Escolher Arquivo</h5></button></center>
                </td>
            </tr>
            <tr>
                <td>
                    <h4 class="subtitulo">Foto Pessoal</h4>
                </td>
                <td>
                    <center><button type="button" class="btn btn-dark botao"><h5>Escolher Arquivo</h5></button></center>
                </td>
            </tr>
            <tr>
                <td>
                    <h4 class="subtitulo">Cópia do RG</h4>
                </td>
                <td>
                    <center><button type="button" class="btn btn-dark botao"><h5>Escolher Arquivo</h5></button></center>
                </td>
            </tr>
        </tbody>
    </table>

    <form action="listarEventos_mod02.php" method="POST" class="justificativa-form">
        <h4>Justificativa: </h4>
        <input type="text" name="name" class="justificativa-input">
    </form>

    <div class="botoes">
        <button type="button" class="btn btn-dark enviar" onclick="alertarEnvio()"><h4>Enviar</h4></button>
        <button type="button" class="btn btn-dark cancelar" onclick="redirecionarMeusEventosAluno()"><h4>Cancelar</h4></button>
    </div>
</body>

</html>