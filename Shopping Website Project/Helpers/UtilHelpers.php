<?php

namespace app\helpers;

class UtilHelpers
{
 public static function randomString($strlenght)
 {
  $string = '';
  $characters = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  for ($i = 0; $i < $strlenght; $i++) {
   $string .= $characters[rand(0, (strlen($characters) - 1))];
  }
  return $string;
 }
}
