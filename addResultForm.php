<?php
require_once('timer_fns.php');
session_start();

// Начать html-вывод
do_html_header('Добавление результата');

check_valid_user();
display_add_result_form();

display_user_menu();
do_html_footer();

?>