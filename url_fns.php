<?php
require_once('db_fns.php');

function get_user_urls($username) {
  // Извлекает из базы данных все сохраненные пользователем URL-адреса
  $conn = db_connect();
  $result = $conn->query( "select bm_URL
                           from bookmark
                           where username = '$username'");
  if (!$result)
    return false;

  // Создать массив URL-адресов
  $url_array = array();
  for ($count = 1; $row = $result->fetch_row(); ++$count) {
    $url_array[$count] = $row[0];
  }
  return $url_array;
};
  
function add_game($new_game) 
{
  // Добавляет новую игру в базу данных
  echo "Попытка добавления ".htmlspecialchars($new_game).'<br />';
  $valid_user = $_SESSION['valid_user'];
  
  $conn = db_connect();

  // Проверить, существует ли такая игра
  $result = $conn->query("select * from games
                         where username='$valid_user' 
                         and GameName='$new_game'");
  if ($result && ($result->num_rows>0))
    throw new Exception('Такая закладка уже существует.');

  // Вставить новую игру
  if (!$conn->query( "insert into games values
                     ('$valid_user', trim('$new_game'))"))
    throw new Exception('Не удается вставить игру в базу данных.'); 

  return true;
} 

function delete_game($user, $game) 
{
  $conn = db_connect();

  // Удалить игру
  if (!$conn->query( "delete from games
                      where username='$user' and GameName='$game'"))
    throw new Exception('Закладка не может быть удалена.');
  return true;
}

function add_result($new_time, $new_date, $game)
{
	$valid_user = $_SESSION['valid_user'];
	
	$conn = db_connect();
	
	if (!$conn->query("insert into results values
						('$game','$valid_user','$new_time','$new_date'),TimeToFloat('$new_time')"))
		throw new Exception('Не удается вставить результат в базу данных.');
	
	return true;		
}

?>