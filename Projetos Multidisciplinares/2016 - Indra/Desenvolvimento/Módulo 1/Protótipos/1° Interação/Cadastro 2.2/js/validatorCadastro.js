$(document).ready(function() {
    $('.form_cadastro').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           USU_NOME: {
                validators: {

                    notEmpty: {
                        message: 'O nome é requerido'
                    },
                     stringLength: {
                        max: 100,
                        message: 'O nome deve ter no máximo 100 caracteres'
                    }
                }
            },
            USU_SENHA: {
                validators: {

                    notEmpty: {
                        message: 'A senha é requerida'
                    },    
                    stringLength: {
                        max: 40,
                        min: 8,
                        message: 'A senha deve conter entre 8 e 40 caracteres'
                    }
                }
            },
            
            USU_CEP: {
                validators: {

                    notEmpty: {
                        message: 'O CEP é requerido'
                    },    
                    stringLength: {
                        max: 10,
                        min: 1,
                        message: 'O cep deve ter no máximo 8 caracteres'
                    }
                }
            },
             
             USU_NUMERO_RESIDENCIA: {
                validators: {

                    notEmpty: {
                        message: 'O número é requerido'
                    },    
                }
            },

            USU_RUA: {
                validators: {

                    notEmpty: {
                        message: 'A rua é requerida'
                    },    
                }
            },
           
            USU_CIDADE: {
                validators: {

                    notEmpty: {
                        message: 'A cidade é requerida'
                    },    
                    stringLength: {
                        max: 70,
                        min: 1,
                        message: 'A cidade deve ter no máximo 70 caracteres caracteres'
                    }
                }
            },
            USU_EMAIL: {
                validators: {

                    notEmpty: {
                        message: 'O email é requerido'
                    },    
                    stringLength: {
                        max: 100,
                        min: 1,
                        message: 'O email deve conter no máximo 100 caracteres'
                    },
                  
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'Esse email não é válido'
                    }
                    
                }
            },

            USU_NOME_FANTASIA: {
                validators: {

                    notEmpty: {
                        message: 'O nome é requerido'
                    },    
                }
            },

            USU_RAZAO_SOCIAL: {
                validators: {

                    notEmpty: {
                        message: 'A razão social é requerida'
                    },    
                }
            },

            USU_CNPJ: {
                validators: {

                    notEmpty: {
                        message: 'O CNPJ é requerido'
                    },    
                }
            },

            USU_INSTITUICAO: {
                validators: {

                    notEmpty: {
                       
                    },    
                }
            },
            USU_RG: {
                validators: {

                    notEmpty: {
                       
                    },    
                }
            },
            USU_CPF: {
                validators: {

                    notEmpty: {
                        
                    },    
                }
            },
            USU_ESPECIALIZACAO: {
                validators: {

                    notEmpty: {
                       
                    },    
                }
            },
            USU_CURRICULO_ACADEMICO: {
                validators: {

                    notEmpty: {
                       
                    },    
                }
            },

            USU_ESTADO: {
                validators: {

                    notEmpty: {
                        message: 'O estado é requerido'
                    }
                }
            },
             USU_TIPO_USUARIO: {
                validators: {

                    notEmpty: {
                        message: 'O tipo usuário é requerido'
                    }    
                    
                }
            },
             dia: {
                validators: {

                    notEmpty: {
                        message: 'O dia é requerido'
                    }
                }
            },
             mes: {
                validators: {

                    notEmpty: {
                        message: 'O mês é requerido'
                    }
                }
            },
             ano: {
                validators: {

                    notEmpty: {
                        message: 'O ano é requerido'
                    }
                }
            },
            
             USU_COMPLEMENTO: {
                validators: {
                  
                }
            }


             
        }
        
    });
    function MascaraCep(cep){
                if(mascaraInteiro(cep)==false){
                event.returnValue = false;
        }       
        return formataCampo(cep, '00.000-000', event);
}

//formata de forma generica os campos
function formataCampo(campo, Mascara, evento) { 
        var boleanoMascara; 

        var Digitato = evento.keyCode;
        exp = /\-|\.|\/|\(|\)| /g;
        campoSoNumeros = campo.value.toString().replace( exp, "" ); 

        var posicaoCampo = 0;    
        var NovoValorCampo="";
        var TamanhoMascara = campoSoNumeros.length;; 

        if (Digitato != 8) { // backspace 
                for(i=0; i<= TamanhoMascara; i++) { 
                        boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                                || (Mascara.charAt(i) == "/")) 
                        boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(") 
                                                                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                        if (boleanoMascara) { 
                                NovoValorCampo += Mascara.charAt(i); 
                                  TamanhoMascara++;
                        }else { 
                                NovoValorCampo += campoSoNumeros.charAt(posicaoCampo); 
                                posicaoCampo++; 
                          }              
                  }      
                campo.value = NovoValorCampo;
                  return true; 
        }else { 
                return true; 
        }
}


});
