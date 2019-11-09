<?php
require_once('helpers.php');

$is_auth = rand(0, 1);
$page_name = 'Yeticave - Главная';
$user_name = 'Екатерина Мартова';

$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];
$catalog_list = [
  [
    'name' => '2014 Rossignol District Snowboard',
    'category' => 'Доски и лыжи',
    'cost' => '10999',
    'src' => 'img/lot-1.jpg'
  ],
  [
    'name' => 'DC Ply Mens 2016/2017 Snowboard',
    'category' => 'Доски и лыжи',
    'cost' => '159999',
    'src' => 'img/lot-2.jpg'
  ],
  [
    'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
    'category' => 'Крепления',
    'cost' => '8000',
    'src' => 'img/lot-3.jpg'
  ],
  [
    'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
    'category' => 'Ботинки',
    'cost' => '10999',
    'src' => 'img/lot-4.jpg'
  ],
  [
    'name' => 'Куртка для сноуборда DC Mutiny Charocal',
    'category' => 'Одежда',
    'cost' => '7500',
    'src' => 'img/lot-5.jpg'
  ],
  [
    'name' => 'Маска Oakley Canopy',
    'category' => 'Разное',
    'cost' => '5400',
    'src' => 'img/lot-6.jpg'
  ],
];

function format_price($number) {
  $cost = ceil($number);

  if ($cost >= 1000) {
    $cost = number_format($cost, 0, '.', ' ');
  }

  $cost .= " ₽";
  return $cost;
};



$page_content = include_template('main.php', [
  'catalog_list' => $catalog_list,
]);

$layout_content = include_template('layout.php', [
  'page_name' => $page_name,
  'is_auth' => $is_auth,
  'user_name' => $user_name,
  'page_content' => $page_content,
  'categories' => $categories,
]);

print($layout_content);

?>
