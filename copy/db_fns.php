<?php

function db_connect() 
{
  $result = new mysqli('localhost', 'timerAdmin', '12345', 'timerbase'); 
  if (!$result)
    throw new Exception('Невозможно подключиться к серверу баз данных');
  else
    return $result;
}

?>
