
<html>
<head>
	<title> Login Mais Saude São João </title>
<html>
<head>
<style>

#font
{
	border-top:2px solid white;
	border-bottom:2px solid white;
	border-left:2px solid white;
	border-right:2px solid white;
	margin-bottom:10px;
}
</style>

</head>
<body>
	 <!--head background-->
	<div style="position:absolute;left:0%;top:0%; height:13.2%; width:100%; z-index:-1; background:#2f426a">   </div>
	<!--text:  -->
	<div style="position:absolute;left:13.5%; top:3.3%; font-size:45; font-weight:900; color:#FFFFFF; font-weight:bold;"> <font face="myFbFont">  Mais Saude São João</font></div>
		<!--<div id="font" style="position:absolute;left:30%; top:8.1%;font-size:22; font-weight:900; color:#FFFFFF; font-weight:bold;"> <font face="sans-serif">BETA</font></div> -->
	<!--body background-->
	<div style="position:absolute;left:0%;top:13.2%; height:90%; width:100%; z-index:-1; background:#E7EBF2">   </div>

       <!--bottam background
	<div style="position:absolute;left:0%;top:110%; height:5%; width:100%; z-index:-1; background:#FFFFFF">   </div>
    -->
    
</body>
</html>
	<LINK REL="SHORTCUT ICON" HREF="fb_files/fb_title_icon/web.ico" />
	<link href="fb_files/fb_index_file/fb_css_file/index_css.css" rel="stylesheet" type="text/css">
    <link href="fb_files/fb_font/font.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="fb_files/fb_index_file/fb_js_file/Registration_validation.js"> </script>
</head>
<script>
	function time_get()
	{
		d = new Date();
		mon = d.getMonth()+1;
		time = d.getDate()+"-"+mon+"-"+d.getFullYear()+" "+d.getHours()+":"+d.getMinutes();
		Reg.fb_join_time.value=time;
	}
</script>
<body>
	<!--login form-->
	<form  method="post">
		<div style="position:absolute; left:57.7%; top:2.2%; font-size:12px; color:#FFFFFF;">   Email </div> 
		<div style="position:absolute; left:57.7%; top:5.18%; font-size:11px; "> <input type="text" name="username" style="width:149.5;"/> </div>
		<div style="position:absolute; left:57.4%; top:8.8%; font-size:12; color:#CCCCCC;">  <input type="checkbox" checked="checked">   Permanecer logado </div>
		<div style="position:absolute;left:69.6%; top:2.2%; font-size:13px; color:#FFFFFF"> Senha </div>
		<div style="position:absolute;left:69.6%; top:5.18%; font-size:13px; "> <input type="password" name="password" style="width:149.5;"> </div>
		<div style="position:absolute;left:69.6%; top:9.2%; font-size:12px; color:#CCCCCC;"> <a href="Forgot_Password.php" style="color:#CCCCCC; text-decoration:none;"> Esqueceu sua senha? </a> </div>   
		<div style="position:absolute;left:81.8%;top:5.2%; ">   <input type="submit" name="Login" value="Logar" id="login_button" />  <input type="reset" name="reset" value="Cancelar" id="login_button" /></div>
	</form>
	
	<!-- left part -->
	
		<!--Left part-->
		<!--Mobile Image--> 	
                <div style="position:absolute; left:5%; top:24%;"> <img src="Logo_Final v3.png" width="550" height="500"> </div>
	
	
	<!-- Registration -->
	<form  method="post" onSubmit="return check();" name="Reg">
		<div style="position:absolute;left:58%; top:16.5%; color:#0E4456; font-size:25"> <b><h5> Cadastre-se </h5></b> </div>
<!-- traço -->		<div style="position:absolute;left:57.3%; top:29.1%; height:1; width:385; background-color:#CCCCCC;"> </div>
        
		<div style="position:absolute;left:59.4%; top:34%; font-size:16px; color:#000000">  Nome: </div>
		<div style="position:absolute;left:65.2%;   top:32.8%; "> <input type="text" name="first_name" class="inputbox" maxlength="10"/> </div>
		<div style="position:absolute;left:59.4%; top:41%; font-size:16px; color:#000000"> Sobrenome: </div>
		<div style="position:absolute;left:65.2%;  top:39.8%;  "> <input type="text" name="last_name"  size="25" class="inputbox" maxlength="10" /> </div>
		<div style="position:absolute;left:59.2%; top:48%; font-size:16px; color:#000000">   Email:  </div>
		<div style="position:absolute;left:65.2%;  top:46.8%; "> <input type="text" name="email"  size="25" class="inputbox" /> </div>
		<div style="position:absolute;left:57.4%; top:55%; font-size:16px; color:#000000">  Conf. Email:  </div>  
		<div style="position:absolute;left:65.2%; top:53.8%; "> <input type="text" name="remail"  size="25" class="inputbox" /> </div>
		<div style="position:absolute;left:59.4%; top:62%; font-size:16px; color:#000000"> Senha:  </div>
		<div style="position:absolute;left:65.2%; top:60.8%; "> <input type="password" name="password" size="25" class="inputbox" /> </div>
		<div style="position:absolute;left:62.2%; top:68.5%; font-size:16px; color:#000000"> Sexo:  </div>
		<div style="position:absolute;left:65.2% ;top:67.8%;">		  
		<select name="sex" style="width:120;height:35;font-size:18px;padding:3;">
			<option value="Select Sex:"> Selecione Sex: </option>
			<option value="Female"> Feminino</option>
			<option value="Male"> Masculino </option>
		</select>
		</div>
		
<div style="position:absolute;left:59%; top:74.8%; font-size:16px; color:#000000">  Nascimento:  </div>

<div style="position:absolute; left:65.2%; top:74%;">
	<select name="day" style="width:63;font-size:18px;height:32;padding:3;">
	<option value="Day:"> Dia: </option>
	
	<script type="text/javascript">
	
		for(i=1;i<=31;i++)
		{
			document.write("<option value='"+i+"'>" + i + "</option>");
		}
		
	</script>
	
	</select>
	</div>	
	
	<div style="position:absolute;left:70%; top:74%;">
	<select name="month" style="width:80;font-size:18px;height:32;padding:3;">
	<option value="Month:"> Mês: </option>
	
	<script type="text/javascript">
	
		var m=new Array("","Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez");
		for(i=1;i<=m.length-1;i++)
		{
			document.write("<option value='"+i+"'>" + m[i] + "</option>");
		}	
	</script>
	
	</select>
	</div>



	

	<div style='position:absolute;left:76%;top:74%;'>
	<select name="year" style="width:70; font-size:18px; height:32; padding:3;">
	<option value="Year:"> Ano: </option>
	
	<script type="text/javascript">
	
		for(i=1996;i>=1960;i--)
		{
			document.write("<option value='"+i+"'>" + i + "</option>");
		}
	
	</script>
	
	</select>
	</div>		
		<input type="hidden" name="fb_join_time">
		<div style="position:absolute;left:65.2%; top:82%; ">  <input type="submit" name="signup" value="Cadastrar-se" id="sign_button" /onClick="time_get()"> <input type="reset" name="reset" value="Cancelar" id="reset"> </div>
		</form>
		
		<div style="position:absolute;left:57.3%; top:90%; height:1; width:385; background-color:#CCCCCC; "> </div> 
        
 <!--my_details -->  
    
    
		
<html>
<head>
</head>
<body>

	<!-- erorr Designing 
		
		<div id="error_design_format" style="display:none;">
		<div style="position:absolute;left:57.3%; top:90%; height:5%; width:29%; z-index:1; background:#FFEBE8; box-shadow:5px 0px 10px 1px rgb(150,0,0); ">   </div>
			<div style="position:absolute;left:57.2%; top:90%; height:1; width:29.1%; background-color:#DD3C10; z-index:1; "> </div>
			<div style="position:absolute;left:57.2%; top:90%; height:5.1%; width:0.08%; background-color:#DD3C10; z-index:1; "> </div>
			<div style="position:absolute;left:57.2%; top:95%; height:1; width:29.1%; background-color:#DD3C10; z-index:1; "> </div>
			<div style="position:absolute;left:86.3%; top:90%; height:5.1%; width:0.08%; background-color:#DD3C10; z-index:1; "> </div>
		</div>
		
		
		<div id="blank_error" style="display:none; position:absolute; left:65%; top:90.7%; z-index:1"> You must fill in all of the fields. </div>
		<div id="Name_error" style="display:none; position:absolute; left:63.5%; top:90.7%; z-index:1"> The name contains invalid characters. </div>
		<div id="full_Name_error" style="display:none; position:absolute; left:64.9%; top:90.7%; z-index:1"> You must provide your full name. </div>
		<div id="Email_error" style="display:none; position:absolute; left:64.9%; top:90.7%; z-index:1"> Please enter a valid email address. </div>
		<div id="Email_not_match_error" style="display:none; position:absolute; left:61%; top:90.7%; z-index:1"> Your emails do not match. Please try again. </div>
		<div id="Password_error" style="display:none; position:absolute; left:60%; top:91%; z-index:1;"> Your password must be at least 6 characters long. </div>
		<div id="Gender_error" style="display:none; position:absolute; left:64%; top:90.7%; z-index:1"> Please select either Male or Female. </div>
		<div id="Date_error" style="display:none; position:absolute; left:62%; top:90.7%; z-index:1"> You must indicate your full birthday to register. </div>
		
		-->
</body>
</html>					
</body>
</html>