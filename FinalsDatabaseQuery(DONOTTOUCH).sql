CREATE DATABASE gamehaven;

USE gamehaven;

CREATE TABLE users(
user_id INT PRIMARY KEY AUTO_INCREMENT,
first_name NCHAR(255) NOT NULL,
last_name NCHAR(255) NOT NULL,
email NCHAR(255) NOT NULL,
phone_number INT(20) NOT NULL,
birth_date DATE NOT NULL,
address NCHAR(255) NOT NULL,
username NCHAR(255) NOT NULL,
user_password NCHAR(255) NOT NULL,
user_type NCHAR(10) NOT NULL,
user_image LONGBLOB
);

CREATE TABLE products(
product_id INT PRIMARY KEY AUTO_INCREMENT,
product_name NCHAR(255) NOT NULL,
product_category NCHAR(50) NOT NULL,
product_description LONGTEXT NOT NULL,
product_price DECIMAL(20,2) NOT NULL,
product_image LONGBLOB,
user_id INT, FOREIGN KEY(user_id) REFERENCES users(user_id)
);

CREATE TABLE cart(
cart_id INT PRIMARY KEY AUTO_INCREMENT,
user_id INT, FOREIGN KEY(user_id) REFERENCES users(user_id),
cart_active BOOLEAN NOT NULL
);

CREATE TABLE cart_product(
cart_product_id INT PRIMARY KEY AUTO_INCREMENT,
cart_id INT, FOREIGN KEY(cart_id) REFERENCES cart(cart_id),
product_id INT, FOREIGN KEY(product_id) REFERENCES products(product_id)
);

CREATE TABLE review(
review_id INT PRIMARY KEY AUTO_INCREMENT,
review_rating INT(5) NOT NULL,
review_comment LONGTEXT,
product_id INT, FOREIGN KEY(product_id) REFERENCES products(product_id)
);