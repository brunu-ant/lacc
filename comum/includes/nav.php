<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">LACC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
         <a class="nav-link" href="<?php echo \Config\Caminho::getUrlApp()?>/controller/home.php?acao=index">Início <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="usuario.php?acao=consultar">Usuários</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="turma.php?acao=consultar">Turmas</a>
      </li>
    </ul>
  </div>
</nav>