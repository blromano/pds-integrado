
			function validaSenha() 
			{
				var campo1 = document.getElementById('senha').value;
				var campo2 = document.getElementById('confirmar_senha').value;
				
				if(campo1 == campo2)
				{
					document.getElementById('resultado').style.color = "#008B45";
					document.getElementById('resultado').innerHTML = "As senhas são iguais";
				}
				else
				{
					document.getElementById('resultado').style.color = "#FF6347";
					document.getElementById('resultado').innerHTML = "As senhas não correspondem";
				}
				
			};
