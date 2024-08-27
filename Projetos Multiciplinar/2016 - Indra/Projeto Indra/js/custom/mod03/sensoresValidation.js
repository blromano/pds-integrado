$(function() {
        
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