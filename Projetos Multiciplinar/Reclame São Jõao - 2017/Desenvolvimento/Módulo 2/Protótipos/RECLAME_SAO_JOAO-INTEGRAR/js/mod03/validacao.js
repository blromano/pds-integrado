function validaSenha()
{
  var campo1 = document.getElementById('senha1').value;
  var campo2 = document.getElementById('senha2').value;

  if(campo1 == campo2)
  {
    document.getElementById('resultado').style.color = "#008B45";
    document.getElementById('resultado').innerHTML = "As senhas são iguais";
  }
  else
  {
    document.getElementById('resultado').style.color = "#FF6347";
    document.getElementById('resultado').innerHTML = "As senhas não correspondem";
  }

};

function limpa_formulário_cep()
  {
      //Limpa valores do formulário de cep.
        document.getElementById('EST_RUA').value=("");
        document.getElementById('EST_BAIRRO').value=("");
  }

function meu_callback(conteudo)
  {
    if (!("erro" in conteudo))
    {
      //Atualiza os campos com os valores.
        document.getElementById('EST_RUA').value=(conteudo.logradouro);
        document.getElementById('EST_BAIRRO').value=(conteudo.bairro);
    }
    else
    {
      //CEP não Encontrado.
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
  }

function pesquisacep(valor)
{

  //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');

  //Verifica se campo cep possui valor informado.
    if (cep != "")
    {

      //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

      //Valida o formato do CEP.
        if(validacep.test(cep))
        {

        //Preenche os campos com "..." enquanto consulta webservice.
          document.getElementById('EST_RUA').value="...";
          document.getElementById('EST_BAIRRO').value="...";

        //Cria um elemento javascript.
          var script = document.createElement('script');

        //Sincroniza com o callback.
          script.src = '//viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

        //Insere script no documento e carrega o conteúdo.
          document.body.appendChild(script);

        }
        else
        {
          //cep é inválido.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    }
    else
    {
      //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
};

function formatar(mascara, documento)
{
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)

    if (texto.substring(0,1) != saida)
    {
      documento.value += texto.substring(0,1);
    }
}
