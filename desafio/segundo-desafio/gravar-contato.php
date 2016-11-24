<?php

  $pagina    = '';
  $permissao = '';
  require_once ( $_SERVER['DOCUMENT_ROOT'].'/desafio/!regras.php' );

  /*   */
  $nome     = $_POST['nome'];
  $email    = $_POST['email'];
  $telefone = $_POST['tel'];

  $sql = "INSERT INTO contato (nome, email, telefone)
          VALUES (:NOME, :EMAIL, :telefone)";

  $sql_ins  = $banco -> conectar() -> prepare($sql);

  $sql_ins -> bindParam(":NOME", $nome);
  $sql_ins -> bindParam(":EMAIL", $email);
  $sql_ins -> bindParam(":telefone", $telefone);

  try
  {
    $sql_ins -> execute();
    echo "Gravou";
  }
  catch (PDOException $e)
  {
    //print "Erro: ".$e->getCode()."<br>PDOException: ".$e->getMessage()."<hr>";
    print "Erro";
    exit;
  }

?>
