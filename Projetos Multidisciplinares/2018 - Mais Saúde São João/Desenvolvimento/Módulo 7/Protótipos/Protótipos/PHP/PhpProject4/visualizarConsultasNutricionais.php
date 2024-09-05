<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Historico de consulta</title>
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
            <h1 style="text-align: center;">Visualização de Histórico de Consultas </h1>


            <br/>
            <br/>
            <br/>
       
            <!--O sistema vai exibir uma lista com todos os nomes referentesaode busca-->         
            <table class="table" border="1" style=" margin-left: 3%; margin-right: 10%; text-align: center; width: 95%;" >
                <thead>
                    <tr>
                        <th style="background-color: darkblue; color: white; text-align: center;"><h3>Data</h3></th>
                        <th style="background-color: darkblue; color: white; text-align: center;"><h3>Hora</h3></th>
                        <th style="background-color: darkblue; color: white; text-align: center;"><h3>Nutricionista</h3></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>14/12/2017</td>
                        <td>7h</td>
                        <td>Beatriz Ortega</td>
                    </tr>
                     <tr>
                        <td>13/01/2018</td>
                        <td>10h</td>
                        <td>Beatriz Ortega</td>
                    </tr>
                    <tr>
                        <td>12/02/2018</td>
                        <td>9h</td>
                        <td>Beatriz Ortega</td>
                    </tr>
                    <tr>
                        <td>11/05/2018</td>
                        <td>13h</td>
                        <td>Juliana Silva</td>
                        
                    </tr>
                
                </tbody>
            </table> 



</form>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>