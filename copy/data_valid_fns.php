<?php

function filled_out($form_vars) {
  // Проверить, что каждая переменная имеет значение
  foreach ($form_vars as $key => $value) {
    if (!isset($key) || ($value == '')) 
      return false;
  } 
  return true;
}

function valid_email($address) {
  // Проверить допустимость адреса электронной почты 
  if (preg_match( "/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $address))
    return true;
  else 
    return false;
}

?>
