CREATE DATABASE IF NOT EXISTS yeticave
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128) NOT NULL,
    code VARCHAR(128) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS lots (
    id INT AUTO_INCREMENT PRIMARY KEY,
    create_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    name CHAR(64) NOT NULL,
    descr VARCHAR(128),
    image VARCHAR(2083) NOT NULL,
    start_cost INT NOT NULL,
    finish_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    step INT NOT NULL,
    author_id INT,
    winner_id INT,
    category_id INT
);

CREATE TABLE IF NOT EXISTS bids (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    cost INT NOT NULL,
    user_id INT,
    lot_id INT
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reg_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    email VARCHAR(128) NOT NULL UNIQUE,
    login CHAR(64) NOT NULL,
    password CHAR(64) NOT NULL,
    contacts VARCHAR(128) NOT NULL,
    lot_id INT,
    bid_id INT
);