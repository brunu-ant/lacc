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
               <a href="<?php echo \Config\Caminho::getUrlApp()?>/controller/turma.php?acao=novo" class="btn btn-primary">Novo</a>
            </div>
         </div>
          <h2>Lista de turmas</h2>
          <div class="table-responsive">
             <table class="table table-striped table-sm">
               <thead>
                  <tr>
                    <th>#</th>
                    <th>Ano</th>
                    <th>Nome</th>
                    <th>Turno</th>
                    <th>Ativo</th>
                    <th>Ações</th>
                  </tr>
               </thead>
             <tbody>
               <?php  
                  $oConta = (\Sistema\Autorizacao::getAutorizacaoSessao())->getUsuario()->getConta();
                  $aTurma = \Model\Turma::consultar($oConta);
                  foreach($aTurma as $turma){
                     $sAtivo = (new \Comum\Classes\SimNaoEnum)->key($turma["ativo"]);
                     $sTurno = (new \Comum\Classes\TurnoEnum)->key($turma["turno"]);
                     echo "<tr>";
                     echo "<td>".$turma["id"]."</td>";
                     echo "<td>".$turma["ano"]."</td>";
                     echo "<td>".$turma["nome"]."</td>";
                     echo "<td>".$sTurno."</td>";
                     echo "<td>".$sAtivo."</td>";
                     echo "<td>";
                        echo "<a href='turma.php?acao=editar&id=".$turma["id"]."' class='fas fa-edit'></a>";
                        echo "<a href='turma.php?acao=apagar&id=".$turma["id"]."' class='fas fa-trash'></a>";
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