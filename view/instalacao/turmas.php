<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1>Vamos configurar a sua conta</h1>
	<form action="/lacc/controller/instalacao.php" method="post">
		<h2>Informe a quantidade de turmas que existem no turno da manhã</h2>
		<div class="form-group">
			<label for="quantidadeTurmaManha">Quantidade</label>
				<input type="text" name="quantidadeTurmaManha" class="form-control" id="quantidadeTurmaManha" placeholder="Informe aqui a quantidade">
		</div>
		<h2>Informe a quantidade de turmas que existem no turno da tarde</h2>
		<div class="form-group">
			<label for="quantidadeTurmaTarde">Quantidade</label>
				<input type="text" name="quantidadeTurmaTarde" class="form-control" id="quantidadeTurmaTarde" placeholder="Informe aqui a quantidade">
		</div>
		<input name="avancar" type="submit" class="btn btn-primary" value="Proximo passo">
		<input name="acao" type="hidden" class="btn btn-primary" value="salvarTurma">
	</form>
</div>

<?php require_once \Config\Caminho::getInclude()."bootstrap.php";?>
</body>
</html>
