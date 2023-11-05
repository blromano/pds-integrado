<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="gerarpdf.php" method="POST" enctype="multipart/form-data">
		<label for="Nome">Nome:</label>
        <input type="text" name="Nome" size="35"/>
        <br>
        <label for="Nome">EMAIL:</label>
        <input type="Email" name="Email" size="35"/>
        <br>
        <label for="exercicio1">Exercicio:</label>
        <input type="text" name="exercicio1" size="35">
        <br>
        <label for="duracao">Duração do exercicio:</label>
        <input type="text" name="duracao">
        <br>
        <label for="repeticao">Repetições do exercicio</label>
        <input type="text" name="repeticao">
        <br>
        <label for="validade">Validade da ficha</label>
        <input type="date" name="validade">
        <br>
        <label for="id">Id:</label>
        <input type="text" name="id">
        <br>
        <input type="submit" name="enviar">
	</form>

</body>
</html>