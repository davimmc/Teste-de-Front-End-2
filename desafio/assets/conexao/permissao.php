<?php

  //PASSAR USUARIO E PAGINA
  if (isset($permissao) && $permissao != '')
  {

    $sessaoPermissao = '';
    if (isset($_SESSION['permissao']) && !empty($_SESSION['permissao'])) {
      $sessaoPermissao = $_SESSION['permissao'];
    }

    # VALIDA PERMISSÃO
    if (in_array($permissao, $sessaoPermissao)){
      # FAZ NADA
    }
    else
    {
      # AQUI TEM 2 POSSIBILIDADES
      # MATA TODAS AS SESSÕES OU REDIRECIONA PARA NEGADO

      #header('Location: /desafio/negado');
      header('Location: /desafio/!negado.php');
    }
  }

  # "$permissao" NÃO EXISTE ENTÃO PAGINA PÚBLICA
?>
