 <html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <?php require_once \Config\Caminho::getInclude()."css.php";?>
</head>
<body>
  <?php require_once \Config\Caminho::getInclude()."nav.php";?>
  <div class="container">
      <h4 class="mb-3">Atualizando a turma</h4>
      <form action="<?php echo \Config\Caminho::getUrlApp()?>/controller/turma.php" method="post">
         <input type="hidden" name="id" value="<?php echo $oTurma->getId()?>">
      <div class="row">
         <div class="col-md-12 mb-3">
            <label for="nome">Nome</label>
             <input type="text" name="nome" id="nome" class="form-control" placeholder="Informe o nome da turma" value="<?php echo $oTurma->getNome()?>" required>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 mb-3">
            <label for="Ano">Ano</label>
                <select name="perfil" class="custom-select d-block w-100" id="ano" required>
                  <?php
                  $oConta = (\Sistema\Autorizacao::getAutorizacaoSessao())->getUsuario()->getConta();
                  \Sistema\Funcoes::montarCombo(\Model\Ano::consultarCombo($oConta), $oTurma->getAno()->getId());
                  ?>
                </select>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <label>Turno</label>
            <div class="d-block">
              <div class="custom-control custom-radio">
               <?php
               $checked = "";
               if ($oTurma->getTurno() == (new \Comum\Classes\TurnoEnum())->Manha()){
                  $checked = "checked";
               }
               ?>
                <input id="manha" name="ativo" type="radio" class="custom-control-input" <?php echo $checked?> required value="<?php echo (new \Comum\Classes\TurnoEnum())->Manha()?>">
                <label class="custom-control-label" for="manha">Manha</label>
              </div>
              <div class="custom-control custom-radio">
               <?php
               $checked = "";
               if ($oTurma->getTurno() == (new \Comum\Classes\TurnoEnum())->Tarde()){
                  $checked = "checked";
               }
               ?>
                <input id="tarde" name="ativo" type="radio" class="custom-control-input" required <?php echo $checked?> value="<?php echo (new \Comum\Classes\TurnoEnum())->Tarde()?>">
                <label class="custom-control-label" for="tarde">Tarde</label>
              </div>
           </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <label>Ativo</label>
            <div class="d-block">
              <div class="custom-control custom-radio">
               <?php
               $checked = "";
               if ($oTurma->getAtivo() == (new \Comum\Classes\SimNaoEnum())->Sim()){
                  $checked = "checked";
               }
               ?>
                <input id="sim" name="ativo" type="radio" class="custom-control-input" <?php echo $checked?> required value="<?php echo (new \Comum\Classes\SimNaoEnum())->Sim()?>">
                <label class="custom-control-label" for="sim">Sim</label>
              </div>
              <div class="custom-control custom-radio">
               <?php
               $checked = "";
               if ($oTurma->getAtivo() == (new \Comum\Classes\SimNaoEnum())->Nao()){
                  $checked = "checked";
               }
               ?>
                <input id="nao" name="ativo" type="radio" class="custom-control-input" required <?php echo $checked?> value="<?php echo (new \Comum\Classes\SimNaoEnum())->Nao()?>">
                <label class="custom-control-label" for="nao">Não</label>
              </div>
           </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12 my-3">
            <input name="acao" type="submit" class="btn btn-primary" value="Atualizar">
         </div>
         <div class="col-md-12 my-3">
            <a href="<?php echo \Config\Caminho::getUrlApp()?>/controller/usuario.php?acao=consultar" class="btn btn-primary">Consultar</a>
         </div>
      </div>
      </form>
  </div>
  <?php require_once \Config\Caminho::getInclude()."bootstrap.php";?>
</body>
</html>     