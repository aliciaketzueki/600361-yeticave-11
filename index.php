<?php
require_once('helpers.php');
require_once('functions.php');

$is_auth = rand(0, 1);
$page_name = 'Yeticave - Главная';
$user_name = 'Екатерина Мартова';

$con = db_connect('yeticave');
$sql = 'SELECT l.*, c.name, c.code FROM lots l
INNER JOIN categories c ON l.category_id = c.id';
$lots = db_fetch_data($con, $sql);

$sql = 'SELECT * FROM categories';
$categories = db_fetch_data($con, $sql);

// Загрузка шаблонов
$page_content = include_template('main.php', [
  'lots' => $lots,
  'categories' => $categories
]);

$layout_content = include_template('layout.php', [
  'page_name' => $page_name,
  'is_auth' => $is_auth,
  'user_name' => $user_name,
  'page_content' => $page_content,
  'categories' => $categories
]);

// Вывод контента
print($layout_content);

?>
