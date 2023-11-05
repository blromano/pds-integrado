/*<function verificarCPF(c){
    var i;
    s = c;
    var c = s.substr(0,9);
    var dv = s.substr(9,2);
    var d1 = 0;
    var v = false;
 
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(10-i);
    }
			
    if (d1 == 0){
		 document.getElementById('cpfReslt').style.color = "#FF6347";
         document.getElementById('cpfReslt').innerHTML = "CPF Inválido";
        v = true;
        return false;
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(0) != d1){
     	document.getElementById('cpfReslt').style.color = "#FF6347";
        document.getElementById('cpfReslt').innerHTML = "CPF Inválido";
        v = true;
        return false;
    }
 
    d1 *= 2;
    for (i = 0; i < 9; i++){
        d1 += c.charAt(i)*(11-i);
    }
    d1 = 11 - (d1 % 11);
    if (d1 > 9) d1 = 0;
    if (dv.charAt(1) != d1){
		 document.getElementById('cpfReslt').style.color = "#FF6347";
         document.getElementById('cpfReslt').innerHTML = "CPF Inválido";
        v = true;
        return false;
    }
	
    if (!v) {
		document.getElementById('cpfReslt').style.color = "#008B45";
        document.getElementById('cpfReslt').innerHTML = "CPF Válido";
    }
}
*/



function apenasNumeros(var cpf) 
{
    var cpf1 = cpf.replace(".", "");
    var numcpf = cpf1.replace("-", "");
    return numcpf.replace(/\D/g, ”);
}
var filtra = apenasNumeros(cpf);

function validaCPF(numcpf)
  {
	 var = numcpf;
	 numcpf= apenasNumero(numcpf);
    var numeros, digitos, soma, i, resultado, digitos_iguais;
    digitos_iguais = 1;
    if (numcpf.length < 11)
          return false;
    for (i = 0; i < numcpf.length - 1; i++)
          if (numcpf.charAt(i) != numcpf.charAt(i + 1))
                {
                digitos_iguais = 0;
                break;
                }
    if (!digitos_iguais)
          {
          numeros = numcpf.substring(0,9);
          digitos = numcpf.substring(9);
          soma = 0;
          for (i = 10; i > 1; i--)
                soma += numeros.charAt(10 - i) * i;
          resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
          if (resultado != digitos.charAt(0))
                return false;
          numeros = numcpf.substring(0,10);
          soma = 0;
          for (i = 11; i > 1; i--)
                soma += numeros.charAt(11 - i) * i;
          resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
          if (resultado != digitos.charAt(1))
                return false;
          return true;
          }
    else
        return false;
  }