
﻿$(document).ready(function() {
    $('.formOrg').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            nome: {
                validators: {
                    notEmpty: {
                        message: 'O nome é requirido'
                    },
                }
            },
            contato: {
                validators: {
                    notEmpty: {
                        message: 'O contato é requirido'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'O email é requirido'
                    },
                    emailAddress: {
                        message: 'O email digitado não é valido'
                    }
                }
            }
        }
    });

/*

    $('.validar_alerta').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            alerta: {
                validators: {
                    notEmpty: {
                        message: 'Escreva um alerta'
                    },
                }
            },
            imagens: {
                validators: {
                    notEmpty: {
                        message: 'Selecione uma ou duas imagens'
                    },
                }
            },

            cidade: {
                validators: {
                    notEmpty: {
                        message: 'Selecione uma cidade da lista'
                    }
                }
            }

        }
    });






    $('.parametro_pcd_cadastrar').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            valor_maximo_cadastrar: {
                validators: {
                    notEmpty: {
                        message: 'Digite o valor máximo corretamente'
                    },
                }
            },
            cor_normal_cadastrar: {
                validators: {
                    notEmpty: {
                        message: 'Escolha uma cor para condições de normalidade'
                    },
                }
            },

            valor_minimo_cadastrar: {
                validators: {
                    notEmpty: {
                        message: 'Digite o valor mínimo corretamente'
                    },
                }
            },


            cor_anormal_cadastrar: {
                validators: {
                    notEmpty: {
                        message: 'Escolha uma cor para condições de anormalidade'
                    }
                }
            }

        }
    });




    $('.parametro_pcd_atualizar').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            valor_maximo_atualizar: {
                validators: {
                    notEmpty: {
                        message: 'Digite o valor máximo corretamente'
                    },
                }
            },
            cor_normal_atualizar: {
                validators: {
                    notEmpty: {
                        message: 'Escolha uma cor para condições de normalidade'
                    },
                }
            },

            valor_minimo_atualizar: {
                validators: {
                    notEmpty: {
                        message: 'Digite o valor mínimo corretamente'

                    },
                }
            },


            cor_anormal_atualizar: {
                validators: {
                    notEmpty: {
                        message: 'Escolha uma cor para condições de anormalidade'
                    }
                }
            }

        }
    });


    


    $('.envio_alertas').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            area_texto_user: {
                validators: {
                    notEmpty: {
                        message: 'Digite o valor máximo corretamente'
                    },
                }
            },
            envio_fotos_user: {
                validators: {
                    notEmpty: {
                        message: 'Escolha uma cor para condições de normalidade'
                    },
                }
            },

            escolha_cidade_user: {
                validators: {
                    notEmpty: {
                        message: 'Digite o valor mínimo corretamente'

                    }
                }
            }

        }
    });


    $('.atualizar_alertas').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            area_texto_atualizar_user: {
                validators: {
                    notEmpty: {
                        message: 'Digite o valor máximo corretamente'
                    },
                }
            },
            atualizar_fotos_user: {
                validators: {
                    notEmpty: {
                        message: 'Escolha uma cor para condições de normalidade'
                    },
                }
            },

            cidade_atualizar_user: {
                validators: {
                    notEmpty: {
                        message: 'Digite o valor mínimo corretamente'

                    }
                }
            }

        }
    });
*/
});

