<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1>Vamos configurar a sua conta</h1>
	<form action="/lacc/controller/conta.php" method="post">
		<div class="btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-secondary active">
				<input type="radio" name="ano" id="esteAno" autocomplete="off" checked> Este ano
			</label>
			<label class="btn btn-secondary">
				<input type="radio" name="ano" id="proximoAno" autocomplete="off"> Proximo ano
			</label>
		</div>
		<input name="acao" type="submit" class="btn btn-primary" value="Proximo passo">
	</form>
</div>

<?php require_once \Config\Caminho::getInclude()."bootstrap.php";?>
</body>
</html>
