$(document).ready(function() {
    $('.formSensor').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            id_pcd: {
                validators: {
                    notEmpty: {
                        message: 'O ID é requerido'
                    },
                }
            },
			id_tipo: {
                validators: {
                    notEmpty: {
                        message: 'O ID Tipo é requerido'
                    },
                }
            },
            periodicidade_med: {
                validators: {
                    notEmpty: {
                        message: 'A periodicidade é requerida'
                    },
                    numeric: {
                        message: "O valor precisa ser numérico"
                    },
                    greaterThan: {
                        value: 1,
                        message: 'O valor precisa ser maior que 0'
                    }
                }
            }
        }
    });
});