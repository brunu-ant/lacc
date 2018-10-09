 <html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <?php require_once \Config\Caminho::getInclude()."css.php";?>
</head>
<body>
  <?php require_once \Config\Caminho::getInclude()."nav.php";?>
  <div class="container">
      <h4 class="mb-3">Atualizando o usuario</h4>
      <form action="/lacc/controller/usuario.php" method="post">
      <div class="row">
         <div class="col-md-12 mb-3">
            <label for="perfil">Perfil</label>
                <select class="custom-select d-block w-100" id="perfil" required>
                  <?php
                  \Sistema\Funcoes::montarOptionEnum((new \Comum\Classes\PerfilUsuarioEnum), $oUsuario->getPerfil());
                  ?>
                </select>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 mb-3">
            <label for="nome">Nome</label>
             <input type="text" name="nome" id="nome" class="form-control" placeholder="Informe o nome do usuario" value="<?php echo $oUsuario->getNome()?>">
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 mb-3">
            <label for="username">E-mail</label>
            <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
               </div>
               <input type="text" class="form-control" id="email" placeholder="E-mail" value="<?php echo $oUsuario->getEmail()?>" required>
               <div class="invalid-feedback" style="width: 100%;">
                  Informe um e-mail valido.
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <label>Ativo</label>
            <div class="d-block">
              <div class="custom-control custom-radio">
                <input id="sim" name="ativo" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="sim">Sim</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="nao" name="ativo" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="nao">Não</label>
              </div>
           </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 my-3">
            <input name="acao" type="submit" class="btn btn-primary" value="Atualizar">
         </div>
      </div>
      </form>
  </div>
  <?php require_once \Config\Caminho::getInclude()."bootstrap.php";?>
</body>
</html>     