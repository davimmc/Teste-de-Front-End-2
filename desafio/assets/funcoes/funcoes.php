<?php

//FUNÇÃO PARA CRIPTOGRAFAR
  -------------
  -------------
  -------------
  
// Função para inserts, e updates altera as aspas previne erro
// e pessoas querendo burlar o sistema
  function seguranca($string)
  {
    $string = strval($string);
    $de     = array('"',"'");
    $para   = array('&quot;','&#39;');
    return str_replace($de,$para,$string);
  }

// Volta aspas para exibição correta se for o caso
// pois o navegador interpreta as aspas.
  function retorna ($string)
  {
    return htmlspecialchars_decode($string);
  }

// função para criar o slug - já esta embutida a segurança contra as aspas
  function slug ($string)
  {
    $string = strtolower($string);
    $de     = array('á','í','ó','ú','é','ä','ï','ö','ü','ë','à','ì','ò','ù','è','ã','õ','â','î','ô','û','ê','Ç','ç',' ');
    $para   = array('a','i','o','u','e','a','i','o','u','e','a','i','o','u','e','a','o','a','i','o','u','e','c','c','-');
    $string = preg_replace("/[^a-zA-Z0-9_-]/", "", str_replace($de,$para,$string));
    $string = str_replace('---','-',$string);
    $string = str_replace('--','-',$string);
    return $string;
  }

// função validaCPF
  function validaCPF ($cpf = null)
  {

    // Verifica se um número foi informado
    if(empty($cpf)) {
        return false;
    }

    // Elimina possivel mascara
    $cpf = ereg_replace('[^0-9]', '', $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

    // Verifica se o numero de digitos informados é igual a 11
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se nenhuma das sequências invalidas abaixo
    // foi digitada. Caso afirmativo, retorna falso
    else if ($cpf == '00000000000' ||
        $cpf == '11111111111' ||
        $cpf == '22222222222' ||
        $cpf == '33333333333' ||
        $cpf == '44444444444' ||
        $cpf == '55555555555' ||
        $cpf == '66666666666' ||
        $cpf == '77777777777' ||
        $cpf == '88888888888' ||
        $cpf == '99999999999') {
        return false;
     // Calcula os digitos verificadores para verificar se o
     // CPF é válido
     } else {

        for ($t = 9; $t < 11; $t++) {

            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }

        return true; // retorna  1  se valido se não vazio
    }
  }
?>
