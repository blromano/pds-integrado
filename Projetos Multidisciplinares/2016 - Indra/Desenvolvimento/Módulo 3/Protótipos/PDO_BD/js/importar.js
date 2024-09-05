$(function () {

    function MensagemSucessoEnvio() {
        $("#modal-title").text("Arquivo Enviado Com Sucesso").css("color", "green");
        $("#modal-body").text("Seu arquivo adicionado com sucesso a Base de Dados");
    }

    function ArquivoNaoAdicionado() {
        $("#modal-title").text("Arquivo Não Adicionado").css("color", "red");
        $("#modal-body").text("Adicione um arquivo .txt antes de enviar");
    }

    function ArquivoNaoSuportado() {
        $("#modal-title").text("Arquivo Não Suportado").css("color", "red");
        $("#modal-body").text("Adicione um arquivo .txt antes de enviar");
    }

    function SeparadorInvalido() {
        $("#modal-title").text("Separador Inválido").css("color", "red");
        $("#modal-body").text("Arquivo não contem somente separador ','");
    }

    function QuatidadeDadosInvalido() {
        $("#modal-title").text("Quantidade De Dados Inválido").css("color", "red");
        $("#modal-body").text("A quantidade de dados não é válida com o total de sensores.");
    }

    function OrdemDadosInvalido() {
        $("#modal-title").text("Ordem Dos Dados Inválido").css("color", "red");
        $("#modal-body").text("A ordem dos dados não esta de acordo com o padrão estabelecido.");
    }

    $("#enviar").click(function (){

        var val = $("#file").val();

        if(val){
            if(!(val.substring(val.length - 4, val.length) === ".txt")){
                ArquivoNaoSuportado();
                $("#modal").modal("show");
                return false;
            }
            return true;
        }

        ArquivoNaoAdicionado();
        $("#modal").modal("show");

        return false;
    });

});