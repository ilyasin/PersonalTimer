<?php
require_once('timer_fns.php');
session_start();

// Начать html-вывод
do_html_header('Добавление игр');

check_valid_user();
display_add_game_form();

display_user_menu();
do_html_footer();

?>