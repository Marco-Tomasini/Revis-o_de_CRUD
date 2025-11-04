<?php

include 'db_connect.php';
$id = $_GET['id'];

$sql = " DELETE FROM tarefas WHERE id_tarefa=$id ";

if ($mysqli->query($sql) === true) {
    header('Location: ../index.php');
    exit();
} else {
    echo "Erro " . $sql . '<br>' . $mysqli->error;
}
$mysqli->close();
exit();