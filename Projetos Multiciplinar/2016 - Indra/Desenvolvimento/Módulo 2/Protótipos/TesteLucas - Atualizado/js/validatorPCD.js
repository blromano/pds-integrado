$(document).ready(function() {
    $('.formPCD').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cidade: {
                validators: {
                    notEmpty: {
                        message: 'A cidade é requerida'
                    },
                }
            },
            estado: {
                validators: {
                    notEmpty: {
                        message: 'O estado é requerido'
                    },
                }
            },
            codigo: {
                validators: {
                    notEmpty: {
                        message: 'O código é requerido'
                    },
                }
            },
            latitude: {
                validators: {
                    notEmpty: {
                        message: 'A latitude é requerida'
                    },
                }
            },
            longitude: {
                validators: {
                    notEmpty: {
                        message: 'A longitude é requerida'
                    },
                }
            },
            descricao: {
                validators: {
                    notEmpty: {
                        message: 'A descrição é requerida'
                    },
                }
            }
        }
    });
});