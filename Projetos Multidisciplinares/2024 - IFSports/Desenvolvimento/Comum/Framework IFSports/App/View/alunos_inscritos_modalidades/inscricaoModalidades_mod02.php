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
        <form id="uploadForm" enctype="multipart/form-data" action="/meus_eventos_aluno/inscricao_modalidades/inserir" method="POST">
        <h4 class="instrucao">Você pode selecionar até duas modalidades esportivas</h4>
        
        <input type="checkbox" id="modalidade1" name="modalidade1" value="1">
        <label for="modalidade1"><h4>Futsal</h4></label><br>
        
        <input type="checkbox" id="modalidade2" name="modalidade2" value="1">
        <label for="modalidade2"><h4>Volêi</h4></label><br>
        
        <input type="checkbox" id="modalidade3" name="modalidade3" value="1">
        <label for="modalidade3"><h4>Judô</h4></label><br>
        
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>
                        <h4 class="subtitulo">Comprovante de Faixa</h4>
                    </td>
                    <td>
                        <center><input type="text" class="form-control" id="AIM_COMPROVANTE_FAIXA" name="AIM_COMPROVANTE_FAIXA" placeholder="Comprovante de faixa"></center>
                    </td>
                </tr>
                
            </tbody>
        </table>
        
        <div class="botoes">
            <button type="submit" class="btn btn-dark enviar"><h4>Enviar</h4></button>
            <button type="button" class="btn btn-dark cancelar" onclick="redirecionar()"><h4>Cancelar</h4></button>
        </div>
</form>
    </div>
</body>

</html>