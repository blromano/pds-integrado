$(document).ready(function() {
   
    $('#cadastro').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            CON_CPF: {
                validators: {
                    callback: {
                        message: 'CPF INVÁLIDO',
                        callback: function(value) {
													 
							CON_CPF = value.replace(/[^\d]+/g,'');    
							if(CON_CPF == '') return false; 
							    
							if (CON_CPF.length != 11) return false;
							
							// testa se os 11 digitos são iguais, que não pode.
							var valido = 0; 
							for (i=1; i < 11; i++){
								if (CON_CPF.charAt(0)!=CON_CPF.charAt(i)) valido =1;
							}
							if (valido==0) return false;
							      
							  
							aux = 0;    
							for (i=0; i < 9; i ++)       
								aux += parseInt(CON_CPF.charAt(i)) * (10 - i);  
								check = 11 - (aux % 11);  
								if (check == 10 || check == 11)     
									check = 0;    
								if (check != parseInt(CON_CPF.charAt(9)))     
									return false;       
							  
							aux = 0;    
							for (i = 0; i < 10; i ++)        
								aux += parseInt(CON_CPF.charAt(i)) * (11 - i);  
							check = 11 - (aux % 11);  
							if (check == 10 || check == 11) 
								check = 0;    
							if (check != parseInt(CON_CPF.charAt(10)))
								return false;       
							return true; 
						
						 
                        }
                   }
                }
           }
        }
    });
});
$(document).onkeyup(function() {
   
    $('#cadastro').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            CON_CPF: {
                validators: {
                    callback: {
                        message: 'CPF INVÁLIDO',
                        callback: function(value) {
													 
							CON_CPF = value.replace(/[^\d]+/g,'');    
							if(CON_CPF == '') return false; 
							    
							if (CON_CPF.length != 11) return false;
							
							// testa se os 11 digitos são iguais, que não pode.
							var valido = 0; 
							for (i=1; i < 11; i++){
								if (CON_CPF.charAt(0)!=CON_CPF.charAt(i)) valido =1;
							}
							if (valido==0) return false;
							      
							  
							aux = 0;    
							for (i=0; i < 9; i ++)       
								aux += parseInt(CON_CPF.charAt(i)) * (10 - i);  
								check = 11 - (aux % 11);  
								if (check == 10 || check == 11)     
									check = 0;    
								if (check != parseInt(CON_CPF.charAt(9)))     
									return false;       
							  
							aux = 0;    
							for (i = 0; i < 10; i ++)        
								aux += parseInt(CON_CPF.charAt(i)) * (11 - i);  
							check = 11 - (aux % 11);  
							if (check == 10 || check == 11) 
								check = 0;    
							if (check != parseInt(CON_CPF.charAt(10)))
								return false;       
							return true; 
						
						 
                        }
                   }
                }
           }
        }
    });
});