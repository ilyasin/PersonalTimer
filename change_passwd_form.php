﻿<?php
 require_once('timer_fns.php');
// session_start();
 do_html_header('Изменить пароль');
 check_valid_user();
 
 display_password_form();

 display_user_menu(); 
 do_html_footer();
?>