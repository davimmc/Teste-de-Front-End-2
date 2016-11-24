<?php

  // TIPO DE BANCO
  /*
    COLOQUE O BANCO QUE IRA UTILIZAR
    EX. oracle, mysql
  */

  $db['tipo'] = 'mysql';


  // MYSQL
    if ($db['tipo'] == 'mysql')
    {
      // WEB
      $db['host']    = "";
      $db['bd']      = "";
      $db['user']    = "";
      $db['pass']    = "";

      // lOCAL
      if ($_SERVER['SERVER_NAME'] == "192.168.0.4")
      {
        $db['host'] = "localhost";
        $db['user'] = "root";
        $db['pass'] = "";
        $db['bd']   = "desafio";
      }
    }

  // BASE ORACLE ORACLE
    if ($db['tipo'] == 'oracle')
    {
      // WEB
      $db['host']    = "";
      $db['bd']      = "";
      $db['user']    = "";
      $db['pass']    = "";
      $db['service'] = "";

      // lOCAL
      if ($_SERVER['SERVER_NAME'] == "--")
      {
        $db['user'] = "";
        $db['pass'] = "";
      }
    }

?>
