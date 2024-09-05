// Função Para Formatar o Campo Telefone

			function mascara(o,f)
			{
				v_obj=o
				v_fun=f
				setTimeout("execmascara()",1)
			}
			
			function execmascara()
			{
				v_obj.value=v_fun(v_obj.value)
			}
			
			function mtel(v)
			{
				//Remove tudo o que não é dígito
					v=v.replace(/\D/g,"");             
				//Coloca parênteses em volta dos dois primeiros dígitos
					v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
				//Coloca hífen entre o quarto e o quinto dígitos	
					v=v.replace(/(\d)(\d{4})$/,"$1-$2");    
				return v;
			}
			
			function id( el )
			{
				return document.getElementById( el );
			}
			
			window.onload = function()
			{
				id('USU_TELEFONE').onkeyup = function(){
					mascara( this, mtel );
				}
			}