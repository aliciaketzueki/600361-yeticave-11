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
    'src' => 'img/lot-1.jpg',
    'date' => '2019-11-10'
  ],
  [
    'name' => 'DC Ply Mens 2016/2017 Snowboard',
    'category' => 'Доски и лыжи',
    'cost' => '159999',
    'src' => 'img/lot-2.jpg',
    'date' => '2019-11-11'
  ],
  [
    'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
    'category' => 'Крепления',
    'cost' => '8000',
    'src' => 'img/lot-3.jpg',
    'date' => '2019-11-16'
  ],
  [
    'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
    'category' => 'Ботинки',
    'cost' => '10999',
    'src' => 'img/lot-4.jpg',
    'date' => '2019-11-18'
  ],
  [
    'name' => 'Куртка для сноуборда DC Mutiny Charocal',
    'category' => 'Одежда',
    'cost' => '7500',
    'src' => 'img/lot-5.jpg',
    'date' => '2019-11-26'
  ],
  [
    'name' => 'Маска Oakley Canopy',
    'category' => 'Разное',
    'cost' => '5400',
    'src' => 'img/lot-6.jpg',
    'date' => '2020-01-01'
  ],
];

// Функция расчета оставшегося времени
function calc_time(string $date) : array { // $date - дата истечения лота
  $all_seconds = strtotime($date); // кол-во секунд с 1 января 1970 до даты истечения лота
  $cur_seconds = strtotime(date('H:i:s')); // кол-во секунд до текущего времени
  $seconds_left = $all_seconds - $cur_seconds; // сколько секунд осталось

  $hours = floor($seconds_left / 60 / 60); // кол-во оставшихся часов (округляем)
  $minutes = floor(($seconds_left - ($hours * 60 * 60)) / 60); // остаток минут (округляем)

  $date_arr = [$hours, $minutes];
  return $date_arr;
};

// Функция форматирования цены
function format_price(float $number) : string {
  $cost = ceil($number); // округление в большую сторону

  if ($cost >= 1000) {
    $cost = number_format($cost, 0, '.', ' '); // если цена больше 1000, то добавляем разделитель между тысячами
  }

  $cost .= " ₽";
  return $cost;
};

// Загрузка шаблонов
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

// Вывод контента
print($layout_content);

?>
