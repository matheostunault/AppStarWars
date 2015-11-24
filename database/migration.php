<?php
$pdo = new PDO('mysql:host=localhost;dbname=db_starwars','dark','vador');

$pdo -> exec("CREATE TABLE IF NOT EXISTS users(
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
username VARCHAR(20),
password VARCHAR(100),
PRIMARY KEY(id))ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET = utf8 COLLATE =utf8_general_ci;");

$pdo -> exec("CREATE TABLE IF NOT EXISTS categories(
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
title VARCHAR(20),
description TEXT,
PRIMARY KEY(id))ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET = utf8 COLLATE =utf8_general_ci;");

$pdo -> exec("CREATE TABLE IF NOT EXISTS products(
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
category_id INT UNSIGNED,
title VARCHAR(100),
description VARCHAR(100),
abstract TEXT,
content TEXT,
published_at DATETIME,
price DECIMAL(5,2),
status BOOLEAN,
PRIMARY KEY(id),
CONSTRAINT product_category_id_categories_forein FOREIGN KEY (category_id) REFERENCES categories(id))ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET = utf8 COLLATE =utf8_general_ci;
");

$pdo -> exec("CREATE TABLE IF NOT EXISTS images(
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
product_id INT UNSIGNED,
name VARCHAR(100),
uri VARCHAR(100),
published_at DATETIME,
status BOOLEAN,
PRIMARY KEY(id),
CONSTRAINT images_product_id_products_forein FOREIGN KEY (product_id) REFERENCES products(id))ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET = utf8 COLLATE =utf8_general_ci;");

$pdo -> exec("CREATE TABLE IF NOT EXISTS tags(
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(100),
PRIMARY KEY(id))ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET = utf8 COLLATE =utf8_general_ci;");

$pdo -> exec("CREATE TABLE IF NOT EXISTS product_tag(
product_id INT UNSIGNED,
tag_id INT UNSIGNED,
CONSTRAINT product_tag_product_id_products_forein FOREIGN KEY( product_id)REFERENCES products(id),
CONSTRAINT product_tag_tag_id_tags FOREIGN KEY (tag_id) REFERENCES tags(id))ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET = utf8 COLLATE =utf8_general_ci;");

$pdo -> exec("CREATE TABLE IF NOT EXISTS histories(
id INT UNSIGNED NOT NULL AUTO_INCREMENT,
product_id INT UNSIGNED,
name VARCHAR(80),
published_at DATETIME,
PRIMARY KEY(id),
CONSTRAINT histories_product_id_products_forein FOREIGN KEY (product_id) REFERENCES products(id))ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET = utf8 COLLATE =utf8_general_ci;");