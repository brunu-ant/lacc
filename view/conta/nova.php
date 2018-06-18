<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<h1>Comece a utilizar agora o sistema!</h1>
	<form action="/lacc/controller/conta.php" method="post">
		<div class="form-group">
			<label for="nome">Nome da sua escola</label>
			<input type="text" name="nomeEscola" id="nomeEscola" class="form-control" placeholder="Informe o nome da sua escola" value="LACC">
		</div>
		<div class="form-group">
			<label for="nome">Seu nome</label>
			<input type="text" name="nome" id="nome" class="form-control" placeholder="Informe o seu nome" value="Bruno Costa">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input name="email" type="email" id="email" class="form-control" aria-describedby="emailHelp" placeholder="Informe seu e-mail aqui" value="brunu.ant@gmail.com">
			<small id="emailHelp" class="form-text text-muted">Nao iremos compartilhar o seu e-mail com ninguem</small>
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<input name="senha" id="senha" type="password" class="form-control" placeholder="Informe aqui a senha" value="123456">
		</div>
		<input name="acao" type="submit" class="btn btn-primary" value="Criar conta">
	</form>
</div>

<?php require_once \Config\Caminho::getInclude()."bootstrap.php";?>
</body>
</html>
