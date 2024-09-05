$(function() {

    $('#formAAP').formValidation({
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
                    greaterThan: {
                        value: 1,
                        message: 'O dado deve ser maior que 0'
                    }
                }
            }
        }
    });

    $('#formAAP2').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            periodicidade2: {
                validators: {
                    notEmpty: {
                        message: 'Este campo deve ser preenchido'
                    },
                    numeric: {
                        message: 'O dado deve ser numérico'
                    },
                    greaterThan: {
                        value: 1,
                        message: 'O dado deve ser maior que 0'
                    }
                }
            }
        }
    });









});