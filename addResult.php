<?php
 require_once('timer_fns.php');
 session_start();
 // Создать короткие имена переменных
 $new_time = $_POST['new_time'];
 $new_date = $_POST['new_date'];
 
 do_html_header('Добавление игры');

 try 
 {
   	check_valid_user();
   	if (!filled_out($_POST)) 
	{
     	throw new Exception('Форма заполнена не полностью.');
  	} 

   	// Попытаться добавить игру
   	add_result($new_game);
   	echo 'Закладка добавлена.';
 /*  
   	// Получить закладки, сохраненные данным пользователем
   	if ($url_array = get_user_urls($_SESSION['valid_user']))
     display_user_urls($url_array);
 */
 }
  catch (Exception $e) {
    echo $e->getMessage();
  }
  display_user_menu(); 
  do_html_footer();
?>