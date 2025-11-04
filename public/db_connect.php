<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "crud_kanban_marco";

$mysqli = new mysqli($servername, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Conexao falhou: " . $mysqli->connect_error);
}