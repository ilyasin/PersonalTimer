<?php
require_once('db_fns.php');

function do_html_header($title)
	{
		?>
		<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
		<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
			<link href = "css/styleIndex.css" type = "text/css" rel = "stylesheet">
			<title>Personal Timer</title>
		</head>

		<body>
		<h1>&nbsp;Personal Timer</h1>
		<hr />
		<?php
  			if($title)
    			do_html_heading($title);
	}


function do_html_footer() 
	{
		?>
  		</body>
  		</html>
		<?php
	}


function do_html_heading($heading) 
	{
		?>
  		<h2><?php echo $heading;?></h2>
		<?php
	}


function do_html_URL($url, $name) 
	{
		?>
  		<br /><a href="<?php echo $url;?>"><?php echo $name;?></a><br />
	<?php
	}


function display_site_info() 
	{
		?>
  		<ul>
    		<li>Храните результаты сборки онлайн в базе данных.
    		<li>Совершенствуйте свои навыки.
    		<li>
  		</ul>
		<?php
	}


function display_registration_form() 
	{
		?>
  		<form method="post" action="register_new.php">
  		<table bgcolor="#cccccc">
    	<tr>
      		<td>Адрес электронной почты:</td>
      		<td><input type="text" name="email" size=30 maxlength=100></td>
    	</tr>
    	<tr>
      		<td>Предпочитаемое имя <br />(до 16 символов):</td>
      		<td valign="top">
        		<input type="text" name="username" size=16 maxlength=16>
      		</td>
    	</tr>
    	<tr>
      		<td>Пароль <br />(более 6 символов):</td>
      		<td valign="top">
        		<input type="password" name="passwd" size=16 maxlength=16>
      		</td>
    	</tr>
    	<tr>
      		<td>Подтверждение пароля:</td>
      		<td>
        		<input type="password" name="passwd2" size=16 maxlength=16>
      		</td>
    	</tr>
    	<tr>
      		<td colspan=2 align="center">
        		<input type="submit" value="Зарегистрироваться">
      		</td>
    	</tr>
  		</table>
  		</form>
		<?php 
	}

function display_login_form() 
  {
    ?>
    <a href="register_form.php">Зарегистрироваться</a>
    <form method="post" action="member.php">
      <table bgcolor="#cccccc">
        <tr>
          <td colspan=2>Вход для зарегистрированных пользователей:</td>
        </tr>
        <tr>
          <td>Имя:</td>
          <td><input type="text" name="username"></td>
        </tr>
        <tr>
          <td>Пароль:</td>
          <td><input type="password" name="passwd"></td>
        </tr>
        <tr>
          <td colspan=2 align="center">
          <input type="submit" value="Вход"></td>
        </tr>
        <tr>
          <td colspan=2><a href="forgot_form.php">Забыли пароль?</a></td>
        </tr>
      </table>
    </form>
    <?php
  }

function display_user_menu() 
{
  // Выводит меню опций для данной страницы
?>
  <hr/>
  <a href="member.php">Главная</a>&nbsp;|&nbsp; 
<?php
  // Опция удаления будет только тогда, когда на странице выведена таблица закладок
  global $bm_table;
  if($bm_table == true)
    echo "<a href='#' onClick='bm_table.submit();'>Удалить закладку</a>&nbsp;|&nbsp;"; 
  else
    echo "<font color='#cccccc'>Удалить закладку</font>&nbsp;|&nbsp;"; 
?>
  <a href="change_passwd_form.php">Сменить пароль</a>&nbsp;|&nbsp; 
  <a href="timerGo.php"> Таймер </a>&nbsp;|&nbsp; 
  <a href="addResultForm.php"> Добавить результат </a>&nbsp;|&nbsp; 
  <a href="addGameForm.php"> Добавить игру </a>
  <br />
  
  <a href="logout.php">Выход</a> 
  <hr />
  
<?php
}

function display_password_form() 
{
  // Выводит HTML-форму изменения пароля
?>
  <br />
  <form action="change_passwd.php" method="post">
  <table width=250 cellpadding=2 cellspacing=0 bgcolor="#cccccc">
    <tr>
      <td>Старый пароль:</td>
      <td><input type="password" name="old_passwd" size=16 maxlength=16></td>
    </tr>
    <tr>
      <td>Новый пароль:</td>
      <td><input type="password" name="new_passwd" size=16 maxlength=16></td>
    </tr>
    <tr>
      <td>Подтверждение нового<br/>пароля:</td>
      <td><input type="password" name="new_passwd2" size=16 maxlength=16></td>
    </tr>
    <tr>
      <td colspan=2 align="center"><input type="submit" value="Изменить пароль"></td>
    </tr>
  </table>
  <br />
<?php
}


function display_forgot_form() {
  // Вывод HTML-формы для переустановки и отправке пароля по электронной почте
?>
  <br />
  <form action="forgot_passwd.php" method="post">
  <table width=250 cellpadding=2 cellspacing=0 bgcolor='#cccccc'>
    <tr>
      <td>Введите имя:</td>
      <td><input type="text" name="username" size=16 maxlength=16></td>
    </tr>
    <tr>
      <td colspan=2 align="center">
        <input type="submit" value="Переустановить пароль">
      </td>
    </tr>
  </table>
  <br />
<?php
};

function display_add_game_form() {
  // Отображает форму для ввода новой закладки
?>
  <form name="game_table" action="addGame.php" method="post">
  <table width=250 cellpadding=2 cellspacing=0 bgcolor="#cccccc">
    <tr>
      <td>Новая<br />игра:</td>
      <td>
        <input type="text" name="new_game" value="Имя игры" size=30 maxlength=255>
      </td>
    </tr>
    <tr>
      <td colspan=2 align="center">
        <input type="submit" value="Добавить игру">
      </td>
    </tr>
  </table>
  </form>
<?php
}


function display_add_result_form() {
  // Отображает форму для ввода новой закладки
?>
  <form name="result_table" action="addResult.php" method="post">
  <table width=250 cellpadding=2 cellspacing=0 bgcolor="#cccccc">
    <tr>
    	<td>Название игры</td>
        <td>
        	<select name = "selectGame" size = "1"> 
            	<?php
					$valid_user = $_SESSION['valid_user'];
					$conn = db_connect();
					$result = $conn->query("select GameName from games
											where username = '$username'");
					while($object = mysql_fetch_object($result))
					{
						echo "<option value = '$object->column_name' > $object->column_name </option>";
					}
				?>
            </select>
        </td> 
    </tr>
    <tr>
        <td>Время(мм:сс:мс):</td>	
      	<td>
        	<input type="text" name="new_time" value="00:00:00" size=3 maxlength=8>
      	</td>
    </tr>
    <tr>
    	<td>Дата(гггг-мм-дд):</td>
        <td>
        	<input type="text" name="new_date" value="" size=6 maxlength=10>
        </td>
    </tr>
    <tr>
      	<td colspan=2 align="center">
        	<input type="submit" value="Добавить результат">
      	</td>
    </tr>
  </table>
  </form>
<?php
}
?>