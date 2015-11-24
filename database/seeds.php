<?php
 
    $pdo = new PDO('mysql:host=localhost; dbname=db_starwars', 'dark', 'vador');
 
    $pdo->exec("
       INSERT INTO tags (name) VALUES ('chewbacca'), ('sith'), ('LucasArts');
 
       INSERT INTO categories (title, description) VALUES ('accessories', 'accessories for men, women, children'), ('games', 'starwars games'), ('decorations', 'home decorations from star wars world');
 
       INSERT INTO products (title, abstract, price) VALUES ('light saber', 'sabre laser de collection, acier', 199.99), ('cuddly toy', 'little chewbacca', 15.99);
 
       INSERT INTO images (product_id, name, uri) VALUES (1, 'ep01', '01.png'), (2, 'ep02', '02.png');

       INSERT INTO product_tag (product_id, tag_id) VALUES (2, 1), (3, 1), (1, 2), (3, 2);
   ");
