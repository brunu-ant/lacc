 <html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <?php require_once \Config\Caminho::getInclude()."css.php";?>
</head>
<body>
  <?php require_once \Config\Caminho::getInclude()."nav.php";?>
  <div class="container">
          <h2>Atualizando o usuário</h2>
            <form action="/lacc/controller/usuario.php" method="post">
              <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Informe o nome do usuario">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input name="email" type="email" id="email" class="form-control" aria-describedby="emailHelp" placeholder="Informe seu e-mail aqui">
                <small id="emailHelp" class="form-text text-muted">Nao iremos compartilhar o seu e-mail com ninguem</small>
              </div>
              <div class="form-group">
                <label for="senha">Senha</label>
                <input name="senha" id="senha" type="password" class="form-control" placeholder="Informe aqui a senha">
              </div>
              <div class="form-group">
                <label for="senha">Confirmar senha</label>
                <input name="senha" id="senha" type="password" class="form-control" placeholder="Informe aqui a senha">
              </div>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <label class="btn btn-secondary active">
                    <input type="radio" name="ano" id="esteAno" value="<?php echo (new \DateTime())->format("Y")?>" autocomplete="off" checked> Este ano
                  </label>
                  <label class="btn btn-secondary">
                    <input type="radio" name="ano" id="proximoAno" value="<?php echo (new \DateTime())->add(new DateInterval('P1Y'))->format("Y")?>" autocomplete="off"> Proximo ano
                  </label>
              </div>
              <input name="acao" type="submit" class="btn btn-primary" value="Atualizar">
            </form>
  </div>
  <?php require_once \Config\Caminho::getInclude()."bootstrap.php";?>
</body>
</html>     