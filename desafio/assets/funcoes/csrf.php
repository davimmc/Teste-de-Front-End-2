
<?php

// Evitar invasão por ataque CSRF 

  class csrf
  {

    /*
    função get_token_id().
    Esta função obtém o ID do token na sessão de usuários,
    se um já não tiver sido criado, depois gera um token
    aleatório.
    */
    public function get_token_id()
    {
      if(isset($_SESSION['token_id']))
      {
        return $_SESSION['token_id'];
      }
      else
      {
        $token_id = $this->random(10);
        $_SESSION['token_id'] = $token_id;
        return $token_id;
      }
    }

    /*
    função get_token().
    Esta função obtém o valor do token, se já não tiver
    sido gerado, depois gera um.
    */
    public function get_token()
    {
      if(isset($_SESSION['token_value']))
      {
        return $_SESSION['token_value'];
      }
      else
      {
        $token = hash('sha256', $this->random(500));
        $_SESSION['token_value'] = $token;
        return $token;
      }
    }

    /*
    função check_valid().
    Esta função é usada para verificar se o valor e o id do token são válidos.
    Ela faz isso verificando os valores da solicitação GET ou POST com os
    valores armazenados na variável sessão de usuários.
    */
    public function check_valid($method)
    {
      if($method == 'post' || $method == 'get')
      {
        $post = $_POST;
        $get = $_GET;
        if(isset(${$method}[$this->get_token_id()]) && (${$method}[$this->get_token_id()] == $this->get_token()))
        {
          return true;
        }
        else
        {
          return false;
        }
      }
      else
      {
        return false;
      }
    }


    /*
    função form_names().
    Esta é a segunda defesa contra ataques CSRF neste artigo.
    Esta função gera nomes aleatórios para os campos do formulário.
    */
    public function form_names($names, $regenerate)
    {
      $values = array();
      foreach ($names as $n)
      {
        if($regenerate == true)
        {
          unset($_SESSION[$n]);
        }
        $s = isset($_SESSION[$n]) ? $_SESSION[$n] : $this->random(10);
        $_SESSION[$n] = $s;
        $values[$n] = $s;
      }
      return $values;
    }


    /*
    função random().
    Esta função gera uma cadeia de caracteres aleatória usando o arquivo
    aleatório do linux para ter mais entropia.
    */
    private function random($len) {
      if (function_exists('openssl_random_pseudo_bytes'))
      {
        $byteLen = intval(($len / 2) + 1);
        $return = substr(bin2hex(openssl_random_pseudo_bytes($byteLen)), 0, $len);
      }
      elseif (is_readable('/dev/urandom'))
      {
        $f=fopen('/dev/urandom', 'r');
        $urandom=fread($f, $len);
        fclose($f);
        $return = '';
      }
      if (empty($return))
      {
        for ($i=0;$i<$len;++$i)
        {
          if (!isset($urandom))
          {
            if ($i%2==0)
            {
              mt_srand(time()%2147 * 1000000 + (double)microtime() * 1000000);
            }
            $rand=48+mt_rand()%64;
          } else
          {
            $rand=48+ord($urandom[$i])%64;
          }
          if ($rand>57) $rand+=7;
          if ($rand>90) $rand+=6;
          if ($rand==123) $rand=52;
          if ($rand==124) $rand=53;
          $return.=chr($rand);
        }
      }
      return $return;
    }
  }

  // starta name secreto
  $csrf = new csrf();
?>
