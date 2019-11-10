/* ЗАПОЛНЯЕМ ТАБЛИЦЫ БД */
/* Заполняем таблицу Категорий*/
INSERT INTO categories SET name = 'Доски и лыжи', code = 'boards';
INSERT INTO categories SET name = 'Крепления', code = 'attachment';
INSERT INTO categories SET name = 'Ботинки', code = 'boots';
INSERT INTO categories SET name = 'Одежда', code = 'clothing';
INSERT INTO categories SET name = 'Инструменты', code = 'tools';
INSERT INTO categories SET name = 'Разное', code = 'other';
/* Заполняем таблицу Пользователей*/
INSERT INTO users SET reg_date = '2019-11-10 23:00:00', email = 'aliciaketzueki@gmail.com', name = 'Alicia Ketzueki', password = '12345', contacts = 'default';
INSERT INTO users SET reg_date = '2019-10-27 15:11:54', email = 'orochimaru@mail.ru', name = 'Orochimaru', password = '11111', contacts = 'default';
INSERT INTO users SET reg_date = '2019-08-02 13:30:22', email = 'tsunade@yandex.ru', name = 'Tsunade', password = '1ewsdre3', contacts = 'default';
INSERT INTO users SET reg_date = '2019-11-11 23:40:35', email = 'jiraiya@bk.ru', name = 'Jiraiya', password = 'teyr674', contacts = 'default';
/* Заполняем таблицу Объявлений*/
INSERT INTO lots SET create_date = '2019-11-01 21:21:00', title = '2014 Rossignol District Snowboard', descr = 'text', image = 'img/lot-1.jpg', start_cost = 10999, finish_date = '2019-11-09 23:59:59', step = 1000, author_id = 1, category_id = 1, winner_id = 1;
INSERT INTO lots SET create_date = '2019-11-01 21:21:00', title = 'DC Ply Mens 2016/2017 Snowboard', descr = 'text', image = 'img/lot-2.jpg', start_cost = 159999, finish_date = '2019-11-10 23:59:59', step = 1000, author_id = 2, category_id = 1, winner_id = 2;
INSERT INTO lots SET create_date = '2019-11-10 21:21:00', title = 'Крепления Union Contact Pro 2015 года размер L/XL', descr='text', image = 'img/lot-3.jpg', start_cost = 8000, finish_date = '2019-11-15 23:59:59', step = 1000, author_id = 3, category_id = 2, winner_id = NULL;
INSERT INTO lots SET create_date = '2019-11-01 21:21:00', title = 'Ботинки для сноуборда DC Mutiny Charocal', descr = 'text', image = 'img/lot-4.jpg', start_cost = 10999, finish_date = '2019-11-17 23:59:59', step = 1000,  author_id = 1, category_id = 3, winner_id = NULL;
INSERT INTO lots SET create_date = '2019-11-01 21:21:00', title = 'Куртка для сноуборда DC Mutiny Charocal', descr = 'text', image = 'img/lot-5.jpg', start_cost = 7500, finish_date = '2019-11-25 23:59:59', step = 1000,  author_id = 4, category_id = 4, winner_id = NULL;
INSERT INTO lots SET create_date = '2019-11-01 21:21:00', title = 'Маска Oakley Canopy', descr = 'text', image = 'img/lot-6.jpg', start_cost = 5400, finish_date = '2019-12-31 23:59:59', step = '1000',  author_id = 2, category_id = 6, winner_id = NULL;
/* Заполняем таблицу Ставок*/
INSERT INTO bids SET date = '2019-11-09 17:00:14', cost = '12000', user_id = 2, lot_id = 3;
INSERT INTO bids SET date = '2019-11-11 21:27:13', cost = '199450', user_id = 3, lot_id = 2;
INSERT INTO bids SET date = '2019-11-10 13:30:30', cost = '14866', user_id = 1, lot_id = 4;

/* ЗАПРОСЫ */
/* 1. получить все категории */
SELECT * FROM categories; 
/* 2. получить самые новые, открытые лоты. Каждый лот должен включать название, стартовую цену, ссылку на изображение, текущую цену, название категории; */
SELECT l.title, l.start_cost, l.image, l.category_id, b.cost, c.name FROM lots l
INNER JOIN categories c ON l.category_id = c.id
INNER JOIN bids b ON b.lot_id = l.id
WHERE l.finish_date > CURRENT_TIMESTAMP;
/* 3. показать лот по его id. Получите также название категории, к которой принадлежит лот; */
SELECT l.*, c.name FROM lots l
INNER JOIN categories c ON l.category_id = c.id
WHERE l.id = 5;
/* 4. обновить название лота по его идентификатору; */
UPDATE lots SET title = 'Никому ненужная хрень'
WHERE id = 1;
/* 5. получить список ставок для лота по его идентификатору с сортировкой по дате. */
SELECT l.id, b.* FROM lots l
INNER JOIN bids b ON b.lot_id = l.id
ORDER BY b.date ASC;
