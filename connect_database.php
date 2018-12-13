<?php
require_once "config.php";
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if(!$connect){
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$connect->set_charset(DB_CHARSET);

?>