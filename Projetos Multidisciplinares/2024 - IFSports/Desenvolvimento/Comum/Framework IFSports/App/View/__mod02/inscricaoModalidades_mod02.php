<html>

<script>
function alertarEnvio()
{
alert("Conteúdo enviado com sucesso!");
}
function redirecionar() {
    window.location.href = "/meus_eventos_aluno";
}
</script>

<style>
  .titulo {
    text-align: center;
}

.conteudo {
    width: 60%;
    height: 100%;
    margin-left: auto;
    margin-right: auto;
}

.instrucao {
    text-align: center;
    margin-top: 40px;
    margin-bottom: 20px;
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
    <h1 class="titulo">Envio de Documentos</h1>

    <div class="conteudo">
        <h4 class="instrucao">Você pode selecionar até duas modalidades esportivas</h4>
        
        <input type="checkbox" id="modalidade1" name="modalidade1" value="Futsal">
        <label for="modalidade1"><h4>Futsal</h4></label><br>
        
        <input type="checkbox" id="modalidade2" name="modalidade2" value="Volêi">
        <label for="modalidade2"><h4>Volêi</h4></label><br>
        
        <input type="checkbox" id="modalidade3" name="modalidade3" value="Judô">
        <label for="modalidade3"><h4>Judô</h4></label><br>
        
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>
                        <h4 class="subtitulo">Comprovante de Faixa</h4>
                    </td>
                    <td>
                        <center><button type="button" class="btn btn-dark botao"><h5>Escolher Arquivo</h5></button></center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h4 class="subtitulo">Autorização dos pais</h4>
                    </td>
                    <td>
                        <center><button type="button" class="btn btn-dark botao"><h5>Escolher Arquivo</h5></button></center>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div class="botoes">
            <button type="button" class="btn btn-dark enviar" onclick="alertarEnvio()"><h4>Enviar</h4></button>
            <button type="button" class="btn btn-dark cancelar" onclick="redirecionar()"><h4>Cancelar</h4></button>
        </div>
    </div>
</body>

</html>