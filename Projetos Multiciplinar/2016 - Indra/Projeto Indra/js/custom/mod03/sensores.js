$(function() {


    $('#sensores-tabela tbody ').on('click', 'button', function () {
            var botao = $(this).attr('botao');
            var id_selecionada = $(this).attr('sensor');
            
            if(botao === "atualizar"){

                $.ajax({
                    url: "SensoresCTR.php",
                    type: 'POST',
                    dataType: 'text',
                    data: {
                        'id-sensor': id_selecionada,
                        'botao': 'atualizar'
                    },
                    success: function (data) {
                        $('#form-atualizar').html(data);    
                    }
                });
                
            }else if(botao === "habilitar"){
                
                $.ajax({
                    url: "SensoresCTR.php",
                    type: 'POST',
                    dataType: 'text',
                    data: {
                        'id-sensor': id_selecionada,
                        'botao': 'habilitar'
                    },
                    success: function (data) {
                        $('#form-habilitar').html(data);    
                    }
                });
                
            }else if(botao === "desabilitar"){
                
                $.ajax({
                    url: "SensoresCTR.php",
                    type: 'POST',
                    dataType: 'text',
                    data: {
                        'id-sensor': id_selecionada,
                        'botao': 'desabilitar'
                    },
                    success: function (data) {
                        $('#form-desabilitar').html(data);    
                    }
                });    
            }
        
    });

    
    
    $('#formAS').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            periodicidade: {
                validators: {
                    notEmpty: {
                        message: 'Este campo deve ser preenchido'
                    },
                    numeric: {
                        message: 'O dado deve ser numérico'
                    },
                    greaterThan:{
                        value: 1,
                        message: 'O dado deve ser maior que 0'
                    }
                }
            }
        }
    });
    
    $('#formD').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            justificativaDesabilitar: {
                validators: {
                    notEmpty: {
                        message: 'Este campo deve ser preenchido'
                    }
                }
            } 
        }
    });
    
    $('#formH').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            periodicidadeInicial: {
                validators: {
                    notEmpty: {
                        message: 'Este campo deve ser preenchido'
                    },
                    numeric: {
                        message: 'O dado deve ser numérico'
                    },
                    greaterThan:{
                        value: 1,
                        message: 'O dado deve ser maior que 0'

                    }
                }
            },
            justificativaHabilitar: {
                validators: {
                    notEmpty: {
                        message: 'Este campo deve ser preenchido'
                    }
                }
            }
        }
    });
    
    
});





























