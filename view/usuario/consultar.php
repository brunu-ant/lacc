 <html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <?php require_once \Config\Caminho::getInclude()."css.php";?>
</head>
<body>
  <?php require_once \Config\Caminho::getInclude()."nav.php";?>
  <main role="main" class="container">
      <div class="starter-template">
         <div class="row">
            <div class="col-md-6 my-3">
               <a href="<?php echo \Config\Caminho::getUrlApp()?>/controller/usuario.php?acao=novo" class="btn btn-primary">Novo</a>
            </div>
         </div>

          <h2>Lista de usuários</h2>
          <div class="table-responsive">
             <table class="table table-striped table-sm">
               <thead>
                  <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Perfil</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                  </tr>
               </thead>
             <tbody>
               <?php  
                  $oConta = (\Sistema\Autorizacao::getAutorizacaoSessao())->getUsuario()->getConta();
                  $aUsuarios = \Model\Usuario::consultar($oConta);
                  foreach($aUsuarios as $usuario){
                     $sAtivo = (new \Comum\Classes\SimNaoEnum)->key($usuario["ativo"]);
                     $sPerfil = (new \Comum\Classes\PerfilUsuarioEnum)->key($usuario["perfil"]);
                     echo "<tr>";
                     echo "<td>".$usuario["id"]."</td>";
                     echo "<td>".$usuario["nome"]."</td>";
                     echo "<td>".$sPerfil."</td>";
                     echo "<td>".$sAtivo."</td>";
                     echo "<td>";
                        echo "<a href='usuario.php?acao=editar&id=".$usuario["id"]."' class='fas fa-edit'></a>";
                        echo "<a href='usuario.php?acao=apagar&id=".$usuario["id"]."' class='fas fa-trash'></a>";
                     echo "</td>";
                  }
               ?>
             </tbody>
             </table>
          </div>
      </div>
  </main>
  <?php require_once \Config\Caminho::getInclude()."bootstrap.php";?>
</body>
</html>     