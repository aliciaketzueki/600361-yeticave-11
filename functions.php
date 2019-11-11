<?php
// Функция форматирования цены
function format_price(float $number) : string {
  $cost = ceil($number); // округление в большую сторону

  if ($cost >= 1000) {
    $cost = number_format($cost, 0, '.', ' '); // если цена больше 1000, то добавляем разделитель между тысячами
  }

  $cost .= " ₽";
  return $cost;
};

// Функция расчета оставшегося времени
function calc_time(string $date) : array { // $date - дата истечения лота
  $all_seconds = strtotime($date); // кол-во секунд с 1 января 1970 до даты истечения лота
  $cur_seconds = strtotime(date('H:i:s')); // кол-во секунд до текущего времени
  $seconds_left = $all_seconds - $cur_seconds; // сколько секунд осталось

  if ($all_seconds <= $cur_seconds) {
    $hours = '00';
    $minutes = '00';
  } else {
    $hours = floor($seconds_left / 60 / 60); // кол-во оставшихся часов (округляем)
    $minutes = floor(($seconds_left - ($hours * 60 * 60)) / 60); // остаток минут (округляем)

    if ($minutes < 10) {
      $minutes = '0' . $minutes;
    }

    if ($hours < 10) {
      $hours = '0' . $hours;
    }
  }

  $date_arr = [$hours, $minutes];
  return $date_arr;
};

// Функция установки соединения
function db_connect($db) {
  $con = mysqli_connect('localhost', 'root', '', $db);
  if ($con == false) {
    print('Ошибка соединения: ' . mysqli_connect_error());
  } else {
    mysqli_set_charset($con, 'utf8');
  }

  return $con;
};

// Функция получения данных из БД
function db_fetch_data($link, $sql, $data = []) {
  $result = [];

  $stmt = db_get_prepare_stmt($link, $sql, $data);
  mysqli_stmt_execute($stmt);

  $res = mysqli_stmt_get_result($stmt);

  if ($res) {
    $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
  } else {
    $error = mysqli_error($con);
    print('Ошибка MySQL: ' . $error);
  }

  return $result;
};
?>
