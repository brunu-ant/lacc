<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1>Vamos configurar a sua conta</h1>
	<form action="/lacc/controller/instalacao.php" method="post">
		<div class="btn-group btn-group-toggle" data-toggle="buttons">
			<label class="btn btn-secondary active">
				<input type="radio" name="ano" id="esteAno" value="<?php echo (new \DateTime())->format("Y")?>" autocomplete="off" checked> Este ano
			</label>
			<label class="btn btn-secondary">
				<input type="radio" name="ano" id="proximoAno" value="<?php echo (new \DateTime())->add(new DateInterval('P1Y'))->format("Y")?>" autocomplete="off"> Proximo ano
			</label>
		</div>
		<input name="avancar" type="submit" class="btn btn-primary" value="Proximo passo">
		<input name="acao" type="hidden" class="btn btn-primary" value="salvarAno">
	</form>
</div>

<?php require_once \Config\Caminho::getInclude()."bootstrap.php";?>
</body>
</html>
