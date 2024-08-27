


function displayMessage()
{
var x;
var r=confirm("Essa atividade será excluida permanentemente se você continuar");
if (r==true)
  {
  x="você pressionou Sim";
  }
else
  {
  x="Você pressionou Cancelar";
  }
document.getElementById("demo").innerHTML=x;
}
