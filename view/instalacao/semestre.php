<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1>Vamos configurar a sua conta</h1>
	<form action="/lacc/controller/instalacao.php" method="post">
		<h2>Informe as datas de inicio e termino do primeiro semestre</h2>
		<div class="form-group">
			<label for="dataInicial1">Data inicial</label>
				<input type="text" name="dataInicial1" class="form-control" id="dataInicial1" placeholder="Informe a data">
		</div>
		<div class="form-group">
			<label for="dataFinal1">Data final</label>
				<input type="text" name="dataFinal1" class="form-control" id="dataFinal1" placeholder="Informe a data">
		</div>
		<h2>Informe as datas de inicio e termino do segundo semestre</h2>
		<div class="form-group">
			<label for="dataInicial2">Data inicial</label>
				<input type="text" name="dataInicial2" class="form-control" id="dataInicial2" placeholder="Informe a data">
		</div>
		<div class="form-group">
			<label for="dataFinal2">Data Final</label>
				<input type="text" name="dataFinal2" class="form-control" id="dataFinal2" placeholder="Informe a data">
		</div>
		<input name="avancar" type="submit" class="btn btn-primary" value="Proximo passo">
		<input name="acao" type="hidden" class="btn btn-primary" value="salvarSemestre">
	</form>
</div>

<?php require_once \Config\Caminho::getInclude()."bootstrap.php";?>
</body>
</html>
