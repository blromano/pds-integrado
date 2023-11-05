$(document).ready(function() {
    $('.formLogin').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {

                    notEmpty: {
                        message: 'O email é requerido'
                    },
                    email: {
                        message:'Por favor digite um email válido!'
                    }
                }
            },
            senha: {
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
            }
        }
    });
});