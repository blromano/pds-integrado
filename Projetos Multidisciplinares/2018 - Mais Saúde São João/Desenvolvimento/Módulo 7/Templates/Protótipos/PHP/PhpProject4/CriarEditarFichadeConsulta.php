<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ficha de Consulta</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>




        <script type="text/javascript">
            function optionCheck() {
                var option = document.getElementById("options").value;
                if (option == '0') {
                    alert("Selecione uma opção!");
                    document.getElementById("hiddenDiv").style.visibility = "hidden";
                    document.getElementById("hiddenDiv2").style.visibility = "hidden";
                    document.getElementById("hiddenDiv3").style.visibility = "hidden";
                    document.getElementById("hiddenDiv").style.height = "100px";
                    document.getElementById("hiddenDiv2").style.height = "0px";
                    document.getElementById("hiddenDiv3").style.height = "0px";
                }
                if (option == '1') {
                    document.getElementById("hiddenDiv").style.visibility = "visible";
                    document.getElementById("hiddenDiv2").style.visibility = "hidden";
                    document.getElementById("hiddenDiv3").style.visibility = "hidden";
                    document.getElementById("hiddenDiv").style.visibility = "visible";
                    document.getElementById("hiddenDiv").style.height = "100px";
                    document.getElementById("hiddenDiv2").style.height = "0px";
                    document.getElementById("hiddenDiv3").style.height = "0px";
                }
                if (option == '2') {
                    document.getElementById("hiddenDiv").style.visibility = "visible";
                    document.getElementById("hiddenDiv2").style.visibility = "visible";
                    document.getElementById("hiddenDiv3").style.visibility = "hidden";
                    document.getElementById("hiddenDiv").style.height = "0px";
                    document.getElementById("hiddenDiv2").style.height = "100px";
                    document.getElementById("hiddenDiv3").style.height = "0px";
                }
                if (option == '3') {
                    document.getElementById("hiddenDiv").style.visibility = "visible";
                    document.getElementById("hiddenDiv2").style.visibility = "hidden";
                    document.getElementById("hiddenDiv3").style.visibility = "visible";
                    document.getElementById("hiddenDiv").style.height = "0px";
                    document.getElementById("hiddenDiv2").style.height = "0px";
                    document.getElementById("hiddenDiv3").style.height = "100px";
                }
            }
        </script>
        <form action="sla.php" method="post" style="margin-left: 15px; text-align: justify;">
            <!--O nutricionista vai buscar o paciente que deseja, digitando o nome no campo de busca-->
            <h1 style="text-align: center;">Criação e Edição da Ficha de Consulta</h1>

            <div name="busca_usuario" >
                <label style="padding:0.4%"> Informe o nome do paciente: </label> 
                <input  style=" width: 50%;" type="text" class="form-control" id="nome" placeholder=" Escreva o nome" required> <br/>
                <input  style="text-align: center;" type="submit" class="btn btn-primary" value="Buscar" name="Buscar"/>

            </div>

            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <!--O sistema vai exibir uma lista com todos os nomes referentesaode busca-->         
            <table class="table" border="1" style=" margin-left: 5%; margin-right: 10%; text-align: center; width: 50%;" >
                <thead>
                    <tr>
                        <th style="background-color: darkblue; color: white; text-align: center;"><h3>Nome</h3></th>
                        <th style="background-color: darkblue; color: white; text-align: center;"><h3>Registrar</h3></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ana Beatriz</td>
                        <td><input type="submit" class="btn btn-primary" value="Registrar" name="Registrar"/></td>
                    </tr>
                    <tr>
                        <td>Ana Julia</td>
                        <td><input type="submit" class="btn btn-primary" value="Registrar" name="Registrar"/></td>
                    </tr>
                    <tr>
                        <td>Ana Maria</td>
                        <td><input type="submit" class="btn btn-primary" value="Registrar" name="Registrar"/></td>
                    </tr>
                    <tr>
                        <td>Ana Vitoria</td>
                        <td><input type="submit" class="btn btn-primary" value="Registrar" name="Registrar"/></td>
                    </tr>

                </tbody>
            </table>   
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>

            <!--Apos selecionar o desejado, vai buscar todas as informaçoes refentes ao ususario-->

            <div style="margin-left: 10px; text-align: justify;">
                <h1 style="text-align: center;">Ficha de Consulta</h1>
                <p>Nome: Ana Julia 
                    D. Nascimento: dd/mm/aaaa</p>	
                <p>Naturalidade: Nacionalidade: Brasileira</p>			
                <p>Endereço: Rual alguma, n0, Bairro, Aguas da Prata-SP </p>											
                <p>Fone:(19) 99999999	E-mail: email@email.com</p>
                <p>_____________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________</p>

                <div class="form-group col-md-6">

                    <label style="padding:0.5%">Peso atual:</label>
                    <input  type="number"  min="1" class="form-control" id="pesoAtual" placeholder="" name="pesoAtual"/>
                </div>

                <div class="form-group col-md-6">

                    <label style="padding:0.5%">Estatura:</label>
                    <input  type="number"  min="1" class="form-control" id="estatura" placeholder="" name="estatura"/>
                </div>

                <div class="form-group col-md-6">

                    <label style="padding:0.5%">Qual seu objetivo:</label>
                    <input  type="text" class="form-control" id="objetivo" placeholder="" name="objetivos"/>
                </div>

                <div class="form-group col-md-6">

                    <label style="padding:0.5%">Pratica atividade física?:</label>
                    <br/><input type="radio" name="praticaatv" value="sim"> Sim<br/>
                    <input type="radio" name="praticaatv" value="nao"> Não <br/>
                </div>
                <div class="form-group col-md-6">

                    <label style="padding:0.5%">Qual(is) e a quanto tempo?</label>
                    <input  type="text" class="form-control" id="objetivo" placeholder="" name="objetivos"/>
                </div>
                <div class="form-group col-md-6">

                    <label style="padding:0.5%">Quantas vezes por semana?</label>
                    <input  type="text" class="form-control" id="objetivo" placeholder="" name="objetivos"/>
                </div>

                <div class="form-group col-md-6">

                    <label style="padding:0.5%">Se não pratica, já praticou?:</label>
                    <br/><input type="radio" name="praticaatv" value="sim"> Sim<br/>
                    <input type="radio" name="praticaatv" value="nao"> Não <br/>
                </div>
                <div class="form-group col-md-6">

                    <label style="padding:0.5%">Qual(is) e a quanto tempo?</label>
                    <input  type="text" class="form-control" id="objetivo" placeholder="" name="objetivos"/>
                </div>
            </div> 

            <div class="form-group col-md-6">

                <label style="padding:0.5%">Faz quantas refeições por dia:</label>
                <br/><input type="radio" name="qtdRefeiçao" value="1"> 1<br/>
                <input type="radio" name="qtdRefeiçao" value="2"> 2 <br/>
                <input type="radio" name="qtdRefeiçao" value="3"> 3 <br/>
                <input type="radio" name="qtdRefeiçao" value="4"> 4 <br/>
                <input type="radio" name="qtdRefeiçao" value="5"> 5 <br/>
                <input type="radio" name="qtdRefeiçao" value="5 ou mais"> Mais de 5 <br/>
            </div>
        </div> 

        <div class="form-group col-md-6">

            <label style="padding:0.5%">Faz dieta ou suplementação alimentar?</label>
            <br/><input type="radio" name="fazDieta" value="sim"> Sim<br/>
            <input type="radio" name="fazDieta" value="nao"> Não <br/>
        </div>
    </div> 
    <div class="form-group col-md-6">

        <label style="padding:0.5%">Tem plano de Saúde?</label>
        <br/><input type="radio" name="planoSaude" value="sim"> Sim<br/>
        <input type="radio" name="planoSaude" value="nao"> Não <br/>
    </div>
</div>   

<div class="form-group col-md-6">

    <label style="padding:0.5%">Toma algum remédio atualmente?</label>
    <br/><input type="radio" name="remedio" value="sim"> Sim<br/>
    <input type="radio" name="remedio" value="nao"> Não <br/>
</div>
<div class="form-group col-md-6">

    <label style="padding:0.5%">Qual(is)?</label>
    <input  type="text" class="form-control" id="objetivo" placeholder="" name="objetivos"/>
</div>
<div class="form-group col-md-6">

    <label style="padding:0.5%">Tem algum tipo de alergia?</label>
    <br/><input type="radio" name="alergia" value="sim"> Sim<br/>
    <input type="radio" name="alergia" value="nao"> Não <br/>
</div>
<div class="form-group col-md-6">

    <label style="padding:0.5%">Qual(is)?</label>
    <input  type="text" class="form-control" id="alergia" placeholder="" name="alergia"/>
</div>
<div class="form-group col-md-6">

    <label style="padding:0.5%">Tem alguma restrição alimentar?</label>
    <br/><input type="radio" name="restriçaoAlimentar" value="sim"> Sim<br/>
    <input type="radio" name="restriçaoAlimentar" value="nao"> Não <br/>
</div>
<div class="form-group col-md-6">

    <label style="padding:0.5%">Qual(is)?</label>
    <input  type="text" class="form-control" id="restriçãoAlimentar" placeholder="" name="restriçãoAlimentar"/>
</div>

<br/>
<br/>
<br/>

<input style="text-align: center; margin-left: 10%;" type="submit" class="btn btn-primary" value="Salvar" name="Salvar"/>



</form>





<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>