<?php

  require_once ( $_SERVER['DOCUMENT_ROOT'].'/desafio/assets/funcoes/funcoes.php');

  if (!isset($_SESSION['nomeUsuario']) || $_SESSION['nomeUsuario'] == '') {
    @session_start('login');
  }

  // VALIDA USUARIO E DEFINE PERMISSÃO OU REDIRECIONA
  include ('permissao.php');

  class Banco {

    public $consulta;

    public function conectar() {

      include ('bd-dados.php');

      try {
        $consulta = new PDO(
          "mysql:host=".$db['host'].";dbname=".$db['bd']."", // DNS
          $db['user'], //usuario
          $db['pass'], //senha
          array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        $consulta -> setAttribute ( PDO :: ATTR_ERRMODE , PDO :: ERRMODE_EXCEPTION );

      } catch (PDOException $e) {
        print "Erro: ".$e->getCode()."<br>PDOException: ".$e->getMessage()."<hr>";
        exit;
      }

      // SE CHEGAR AQUI ELE RETORNA
      return $consulta;
    }
  }

  $banco = new Banco();

?>
