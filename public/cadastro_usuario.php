<?php

include 'db_connect.php';
include 'partials/header.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuario (nome,email) VALUES ('$nome','$email')";

    if($conn->query($sql) === true) {
        echo "Usuário cadastrado com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">


    <title>Criar Usuário</title>

</head>
<body>
    <form class="me-3 ms-3" action="cadastro_usuario.php" method="POST">
        <label class="form-label" for="nome">Nome: </label>
        <input type="text" name="nome" class="form-control" required>
        <br><br>
        <label class="form-label" for="email">Email: </label>
        <input type="email" name="email" class="form-control" required>

        <input type="submit" class="btn btn-primary mt-4" value="Cadastrar Usuário">

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

</body>
</html>