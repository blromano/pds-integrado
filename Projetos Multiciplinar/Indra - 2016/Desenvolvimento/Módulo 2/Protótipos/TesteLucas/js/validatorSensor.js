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
			data: {
                validators: {
                    notEmpty: {
                        message: 'A data é requerida'
                    },
                }
            },
            hora: {
                validators: {
                    notEmpty: {
                        message: 'A hora é requerida'
                    },
                }
            }
        }
    });
});