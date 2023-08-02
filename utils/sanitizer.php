<?php

class Sanitizer
{
  public static function sanitizeInput($input)
  {
    if (is_array($input)) {
      return array_map('self::sanitizeInput', $input);
    }

    if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
      $input = stripslashes($input);
    }

    $input = htmlentities($input, ENT_QUOTES, 'UTF-8');
    $input = strip_tags($input);

    return $input;
  }
}
?>