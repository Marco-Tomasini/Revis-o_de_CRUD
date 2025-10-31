<?php

include 'db_connect.php';
$id = $_GET['id'];

$sql = " DELETE FROM tarefas WHERE id_tarefa=$id ";

if ($conn->query($sql) === true) {
    header('Location: ../index.php');
    exit();
} else {
    echo "Erro " . $sql . '<br>' . $conn->error;
}
$conn -> close();
exit();