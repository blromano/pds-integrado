$(document).ready(function() {
    $('#n').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            tiposensor: {
                validators: {
                    notEmpty: {
                        message: 'O Tipo de sensor é requerido'
                    },
                }
            },
			descricao: {
                validators: {
                    notEmpty: {
                        message: 'O ID Tipo é requerido'
                    },
                }
            },
        }
    });
	alert();
	
	$.fn.serializeFormJSON = function() {
        var o = {};
        var a = this.serializeArray();
        $.each(a, function() {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name][o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
	
	// $('#btnCriar').on('click', function(){
		// alert();
		// var infos = $('#nc1').serializeFormJSON();
		// $.ajax({
			// url: 'class/cadastrarTipoSensor.php',
			// data: infos,
			// method: 'POST'
			// success: function(data){
				// alert(data);
			// }
		// });
	// });
	
});