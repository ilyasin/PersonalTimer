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
  
function add_bm($new_url) {
  // Добавляет новую закладку в базу данных

  echo "Попытка добавления ".htmlspecialchars($new_url).'<br />';
  $valid_user = $_SESSION['valid_user'];
  
  $conn = db_connect();

  // Проверить, существует ли такая закладка
  $result = $conn->query("select * from bookmark
                         where username='$valid_user' 
                         and bm_URL='$new_url'");
  if ($result && ($result->num_rows>0))
    throw new Exception('Такая закладка уже существует.');

  // Вставить новую закладку
  if (!$conn->query( "insert into bookmark values
                     ('$valid_user', '$new_url')"))
    throw new Exception('Не удается вставить закладку в базу данных.'); 

  return true;
} 

function delete_bm($user, $url) {
  // Удаляет один URL-адрес из базы данных 
  $conn = db_connect();

  // Удалить закладку
  if (!$conn->query( "delete from bookmark
                      where username='$user' and bm_url='$url'"))
    throw new Exception('Закладка не может быть удалена.');
  return true;
}

function recommend_urls($valid_user, $popularity = 1) {
  // Мы попытаемся обеспечить для пользователей выдачу *полуинтеллектуальных*
  // рекомендаций. Если пользователи имеют URL-адрес, совпадающий с закладками
  // других пользователей, их могут заинтересовать и прочие URL-адреса, 
  // которые имеют другие пользователи 
  $conn = db_connect();

  // Найти других пользователей, закладки которых
  // совпадают с закладкой текущего пользователя.
  // В качестве простейшего способа исключения из рассмотрения
  // приватных страниц посетителей, а также для более совершенной
  // рекомендации мы устанавливаем минимальный уровень популярности.
  // Если $popularity = 1, могут рекомендоваться лишь 
  // адреса, сохраненные более чем одним пользователем
  
  $query = "select bm_URL
            from bookmark
            where username in (
              select distinct(b2.username)
              from bookmark b1, bookmark b2
              where b1.username = '".$valid_user."'
                and b1.username != b2.username )
            and bm_URL not in (
              select bm_URL
              from bookmark
              where username='".$valid_user."' )
            group by bm_URL
            having count(bm_URL) > ".$popularity;

  if (!($result = $conn->query($query)))
    throw new Exception('Не удается найти закладки для рекомендации.');
  if ($result->num_rows==0)
    throw new Exception('Не удается найти закладки для рекомендации.');

  $urls = array();

  // Сформировать массив подходящих URL-адресов
  for ($count=0; $row = $result->fetch_object(); $count++) {
    $urls[$count] = $row->bm_URL; 
  }
                              
  return $urls; 
}

?>
