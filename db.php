<?php

$servername = "127.0.0.1";
$username = "root";
$password = "123";
$dbName = "dbCat";

$link = mysqli_connect($servername, $username, $password);

if (!$link) {
    die("Ошибка подключения: " . mysqli_connection_error());
  }

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

if (!mysqli_query($link, $sql)) {
    echo "Не удалось создать БД";
  }

mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $dbName);

$sql = "CREATE TABLE IF NOT EXISTS users(
    id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pass VARCHAR(50) NOT NULL
  )";
if (!mysqli_query($link, $sql)) {
  echo "Не удалось создать таблицу User";
}

$sql = "CREATE TABLE IF NOT EXISTS posts(
  id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(50) NOT NULL,
  main_text VARCHAR(500) NOT NULL
)";
if (!mysqli_query($link, $sql)) {
  echo "Не удалось создать таблицу Posts";
}

mysqli_close($link);
?>