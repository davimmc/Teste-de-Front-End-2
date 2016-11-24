<?php

  #DEFINIÇÔES PADRÕES
  define("br"   , "<br>", true);
  define("hr"   , "<hr>", true);
  define("pre"  , "<pre>", true);
  define("pref" , "</pre>", true);
  define("raiz" , '/desafio/', true);


  # Se não existe starta sessões
  if (!isset($_SESSION['nomeUsuario'])) {
    @session_start('login');
  }

  # Primeira validação de paginas com nivel maior de restrição
  if (isset($pagina) && !empty($pagina)) {
    $_SESSION['pagina'] = $pagina;
    # Usar essa Sessão para validar paginas com interação com o banco de dados
  }

  require_once ($_SERVER['DOCUMENT_ROOT'].raiz.'assets/funcoes/funcoes.php');

  require_once ($_SERVER['DOCUMENT_ROOT'].raiz.'assets/conexao/conectar-mysql.php');

  require_once ($_SERVER['DOCUMENT_ROOT'].raiz.'assets/funcoes/csrf.php');
?>
