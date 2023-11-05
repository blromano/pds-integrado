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
                    stringLength: {
                        max: 16,
                        min: 2,
                        message: 'A latitude precisa ter entre 2 e 16 caracteres'
                    }
                }
            },
            longitude: {
                validators: {
                    notEmpty: {
                        message: 'A longitude é requerida'
                    },
                    stringLength: {
                        max: 16,
                        min: 2,
                        message: 'A longitude precisa ter entre 2 e 16 caracteres'
                    }
                }
            },
            descricao: {
                validators: {
                    notEmpty: {
                        message: 'A descrição é requerida'
                    },
                     stringLength: {
                        max: 50,
                        min: 4,
                        message: 'A descrição precisa ter entre 4 e 50 caracteres'
                    }
                }
            }
        }
    });
});