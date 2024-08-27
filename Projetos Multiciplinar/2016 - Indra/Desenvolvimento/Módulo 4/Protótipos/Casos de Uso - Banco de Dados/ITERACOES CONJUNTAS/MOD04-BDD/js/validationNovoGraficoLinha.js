$(document).ready(function () {

    (function ($) {
        FormValidation.Validator.verificarBarras = {
            validate: function (validator, $field, options) {

                var datainicial = $field.val();
                var datafinal = validator.getFieldElements('datafinal').val();

                splitInicial = datainicial.split('/');

                splitFinal = datafinal.split('/');

                if ((splitFinal.length > 3) || (splitInicial.length > 3))
                    return false;
                return true;
            }
        };
    }(window.jQuery));

    (function ($) {
        FormValidation.Validator.verificarDia = {
            validate: function (validator, $field, options) {

                var datainicial = $field.val();
                var datafinal = validator.getFieldElements('datafinal').val();

                splitInicial = datainicial.split('/');
                novadatainicial = splitInicial[1] + "/" + splitInicial[0] + "/" + splitInicial[2];

                splitFinal = datafinal.split('/');
                novadatafinal = splitFinal[1] + "/" + splitFinal[0] + "/" + splitFinal[2];

                if ((splitFinal[0] > 31) || (splitInicial[0] > 31))
                    return false;
                return true;
            }
        };
    }(window.jQuery));

    (function ($) {
        FormValidation.Validator.verificarMes = {
            validate: function (validator, $field, options) {

                var datainicial = $field.val();
                var datafinal = validator.getFieldElements('datafinal').val();

                splitInicial = datainicial.split('/');
                novadatainicial = splitInicial[1] + "/" + splitInicial[0] + "/" + splitInicial[2];

                splitFinal = datafinal.split('/');
                novadatafinal = splitFinal[1] + "/" + splitFinal[0] + "/" + splitFinal[2];

                if ((splitFinal[1] > 12) || (splitInicial[1] > 12))
                    return false;
                return true;
            }
        };
    }(window.jQuery));

    (function ($) {
        FormValidation.Validator.verificarAno = {
            validate: function (validator, $field, options) {

                var datainicial = $field.val();
                var datafinal = validator.getFieldElements('datafinal').val();

                splitInicial = datainicial.split('/');
                novadatainicial = splitInicial[1] + "/" + splitInicial[0] + "/" + splitInicial[2];

                splitFinal = datafinal.split('/');
                novadatafinal = splitFinal[1] + "/" + splitFinal[0] + "/" + splitFinal[2];

                if ((splitFinal[2] < 2000) || (splitInicial[2] < 2000))
                    return false;
                return true;
            }
        };
    }(window.jQuery));


    (function ($) {
        FormValidation.Validator.verificarTamanhoDataInicial = {
            validate: function (validator, $field, options) {

                var datainicial = $field.val();
                var datafinal = validator.getFieldElements('datafinal').val();

                tamanhoinicial = datainicial.length;
                tamanhofinal = datafinal.length;

                if (((tamanhoinicial < 10) || (tamanhofinal < 10)) && (tamanhoinicial != 0))
                    return false;
                return true;

            }
        };
    }(window.jQuery));

    (function ($) {

        FormValidation.Validator.verificarDataInicial = {
            validate: function (validator, $field, options) {

                var datainicial = $field.val();
                var datafinal = validator.getFieldElements('datafinal').val();

                splitInicial = datainicial.split('/');
                novadatainicial = splitInicial[1] + "/" + splitInicial[0] + "/" + splitInicial[2];
                datainicial_americana = new Date(novadatainicial);

                splitFinal = datafinal.split('/');
                novadatafinal = splitFinal[1] + "/" + splitFinal[0] + "/" + splitFinal[2];
                datafinal_americana = new Date(novadatafinal);

                if (datainicial_americana > datafinal_americana)
                    return false;
                return true;
            }
        };
    }(window.jQuery));

    (function ($) {

        FormValidation.Validator.verificarTamanhoDataFinal = {
            validate: function (validator, $field, options) {

                var datafinal = $field.val();
                var datainicial = validator.getFieldElements('datainicial').val();

                tamanhoinicial = datainicial.length;
                tamanhofinal = datafinal.length;

                if (((tamanhoinicial < 10) || (tamanhofinal < 10)) && (tamanhofinal != 0))
                    return false;
                return true;
            }
        };
    }(window.jQuery));

    (function ($) {

        FormValidation.Validator.verificarDataFinal = {
            validate: function (validator, $field, options) {

                var datafinal = $field.val();
                var datainicial = validator.getFieldElements('datainicial').val();

                splitInicial = datainicial.split('/');
                novadatainicial = splitInicial[1] + "/" + splitInicial[0] + "/" + splitInicial[2];
                datainicial_americana = new Date(novadatainicial);

                splitFinal = datafinal.split('/');
                novadatafinal = splitFinal[1] + "/" + splitFinal[0] + "/" + splitFinal[2];
                datafinal_americana = new Date(novadatafinal);

                if (datainicial_americana > datafinal_americana)
                    return false;
                return true;
            }
        };
    }(window.jQuery));

    $('#FormularioNovoGraficoLinha').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            SensorPCD: {
                validators: {
                    notEmpty: {
                        message: 'Sensor não Selecionado!'
                    }
                },
            },
            datainicial: {
                validators: {
                    notEmpty: {
                        message: 'Data Inicial está Vazia!'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'A Data Inicial não está Preenchida corretamente!'
                    },                    
                },
            },
            datafinal: {
                validators: {
                    notEmpty: {
                        message: 'Data Final está Vazia!'
                    },
                    date: {
                        format: 'DD/MM/YYYY',
                        message: 'A Data Final não está Preenchida corretamente!'
                    },
                    verificarDataFinal: {
                        message: 'A Data Inicial não pode ser maior do que a Data Final!'
                    },
                },
            },
        }
    }).on('keyup', '[name="datainicial"]', function () { 
        
        if ($('#FormularioNovoGraficoLinha [name="datafinal"]').val().length != 0) {
            
           
            $('#FormularioNovoGraficoLinha').data('formValidation').updateStatus($('#FormularioNovoGraficoLinha [name="datafinal"]'), 'NOT_VALIDATED').validateField($('#FormularioNovoGraficoLinha [name="datafinal"]'));
        }


    });

});
