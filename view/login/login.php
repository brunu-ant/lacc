<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1>Informe seus dados para acessar o sistema</h1>
	<form action="/lacc/controller/login.php" method="post">
		<div class="form-group">
			<label for="email">Email</label>
			<input name="email" type="email" id="email" class="form-control" aria-describedby="emailHelp" placeholder="Informe seu e-mail aqui" value="brunu.ant@gmail.com">
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<input name="senha" id="senha" type="password" class="form-control" placeholder="Informe aqui a senha" value="123456">
		</div>
		<input name="acao" type="submit" class="btn btn-primary" value="Entrar">
	</form>
</div>

<?php require_once \Config\Caminho::getInclude()."bootstrap.php";?>
</body>
</html>
