CREATE DATABASE inven;

USE inven;

CREATE TABLE BARANG (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(20) NOT NULL,
    stok INT NOT NULL,
    status ENUM('Baik','Rusak')
);

CREATE TABLE USER (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(35) NOT NULL,
    password VARCHAR(32) NOT NULL
);

INSERT INTO BARANG (nama, stok, status) VALUES
('HP', 50, 'Baik'),
('LAPTOP', 25, 'Baik'),
('CAMERA', 10, 'Rusak');


INSERT INTO USER (username, password)
VALUES
('admin', 'admin');