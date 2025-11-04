<?php

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_tarefa = $_POST['id_tarefa'];
    $status = $_POST['status'];

    $sql = "UPDATE tarefas SET status = ? WHERE id_tarefa = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", $status, $id_tarefa);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Erro ao atualizar status: " . $stmt->error;
    }
}

?>