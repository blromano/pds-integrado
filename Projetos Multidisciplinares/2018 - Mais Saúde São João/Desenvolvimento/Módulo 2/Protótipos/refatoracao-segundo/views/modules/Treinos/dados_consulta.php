<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> +Saúde São João </title>
        <script src="<?=JQUERY_PATH?>" charset="utf-8"></script>
        <script src="<?=POPPER_PATH?>" charset="utf-8"></script>
        <script src="<?=THEME_JS_PATH?>" charset="utf-8"></script>
        <script src="<?=ANIMATIONS_PATH?>" charset="utf-8"></script>
        <link rel="stylesheet" type="text/css" href="hover.css">
        <link rel="stylesheet" href="<?=THEME_CSS_PATH?>">
        <link href="views\modules\Treinos\mod04.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="views/modules/Treinos/mod04.css"> 
    </head>
    <body>           
    <!--Dados do paciente ---> 
        <div class="container">
                <div class="container">
            <img id="avatardadosconsulta" src="https://thumbs.dreamstime.com/b/vector-user-icon-7337510.jpg">
            <!-- BOTÕES FDE AÇÃO-->
            <div id="botoesdadosconsulta">
                <button type="button" class="btn btn-primary" onclick="habilitar()">Registrar Dados</button>
                <button type="button" class="btn btn-danger" onclick="finalizar()">Finalizar Consulta</button> 
            </div>
            <div>
                <form>
				<br>
					<br>
                    <!-- DADOS DA CONSULTA -->
                    <div class="row">
					
                        <div class="col">
                            <label>Nome</label>
                            <input type="text" class="form-control" value="Nome completo" id="nome" disabled>
                        </div>
                        <div class="col">
                            <label>Gênero</label>
                            <input type="text" class="form-control" value="Maculino" id="genero" disabled>
                        </div>
                        <div class="col">
                            <label>Data de nascimento</label>
                            <input type="date" class="form-control" value="00/00/0000" id="data" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label>Endereço</label>
                            <input type="text" class="form-control" value="R.XXX xxx 00" id="rua" disabled>
                        </div>
                        <div class="col">
                                <label>Email</label>
                                <input type="Email" class="form-control" value="xxxxxx@xxxx.xxx" id="email" disabled>
                        </div>
                        <div class="col">
                                <label>telefone</label>
                                <input type="text" class="form-control" value="xxxx-xxxx" id="tel" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                                <label>Objetivos Iniciais</label>
                                <textarea class="form-control" id="Objetivos" rows="4" disabled></textarea>
                        </div>
                        <div class="col">
                                <label>Experiência</label>
                                <textarea class="form-control" id="Experiência" rows="4"  disabled></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                                <label>Peso</label>
                                <input type="text" class="form-control" value="xxKg" id="peso" disabled>
                        </div>
                        <div class="col">
                                <label>Altura</label>
                                <input type="text" class="form-control" value="xxCm" id="altura" disabled>
                        </div>
                        <div class="col">
                                <label>IMC</label>
                                <input type="text" class="form-control" value="saudável" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                                <label>Anotações</label>
                                <textarea class="form-control" id="anotações" rows="10" disabled=""></textarea>
                        </div>
                    </div>


                </form>
            </div>
            <script>
                function habilitar() {
                    document.getElementById("nome").disabled = false;
                    document.getElementById("genero").disabled = false;
                    document.getElementById("data").disabled = false;
                    document.getElementById("rua").disabled = false;
                    document.getElementById("email").disabled = false;
                    document.getElementById("tel").disabled = false;
                    document.getElementById("Objetivos").disabled = false;
                    document.getElementById("Experiência").disabled = false;
                    document.getElementById("peso").disabled = false;
                    document.getElementById("altura").disabled = false;
                    document.getElementById("anotações").disabled = false;
                }
                function finalizar(){
                    document.getElementById("nome").disabled = true;
                    document.getElementById("genero").disabled = true;
                    document.getElementById("data").disabled = true;
                    document.getElementById("rua").disabled = true;
                    document.getElementById("email").disabled = true;
                    document.getElementById("tel").disabled = true;
                    document.getElementById("Objetivos").disabled = true;
                    document.getElementById("Experiência").disabled = true;
                    document.getElementById("peso").disabled =  true;
                    document.getElementById("altura").disabled = true;
                    document.getElementById("anotações").disabled = true;
                }
            </script>
        </div>
        </div>     
    </body>
</html>

