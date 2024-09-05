// Funções Para Validar os CEPs e preencher os campos relacionados

            function limpa_formulário_cep() 
                {
                        //Limpa valores do formulário de cep.
                            document.getElementById('LOC_RUA').value=("");
                            document.getElementById('LOC_BAIRRO').value=("");
                            document.getElementById('LOC_CIDADE').value=("");
                            document.getElementById('LOC_ESTADO').value=("");
                }

            function meu_callback(conteudo) 
                {
                    if (!("erro" in conteudo)) 
                    {
                        //Atualiza os campos com os valores.
                            document.getElementById('LOC_RUA').value=(conteudo.logradouro);
                            document.getElementById('LOC_BAIRRO').value=(conteudo.bairro);
                            document.getElementById('LOC_CIDADE').value=(conteudo.localidade);
                            document.getElementById('LOC_ESTADO').value=(conteudo.uf);
                    }
                    else 
                    {
                        //CEP não Encontrado.
                            limpa_formulário_cep();
                            swal ( "Ops!" ,  "CEP Inválido!" ,  "error" );
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
                                document.getElementById('LOC_RUA').value="...";
                                document.getElementById('LOC_BAIRRO').value="...";
                                document.getElementById('LOC_CIDADE').value="...";
                                document.getElementById('LOC_ESTADO').value="...";

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
                                   swal ( "Ops!" ,  "CEP Inválido!" ,  "error" );
                            }
                    }
                    else 
                    {
                        //cep sem valor, limpa formulário.
                            limpa_formulário_cep();
                    }
            };
