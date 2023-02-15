<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'blog';

$connect = new mysqli($servername, $username, $password, $dbname);

if ($connect->connect_error) {
    die("error" . $connect->error);
}
?>
