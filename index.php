<?php

include 'public/db_connect.php';
include 'public/partials/header_index.php';

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/style.css">


    <title>KanBan</title>
</head>
<body>
    <div class="container-fluid h-100">

        <div class="row">
                <div class="ms-4 me-4 col justify-content-center align-items-center bg-fazer">
                    <h2 class="mt-3 text-center">A Fazer</h2>
                    <?php
                    $sql = "SELECT * FROM tarefas INNER JOIN usuario ON tarefas.id_usuario = usuario.id_usuario WHERE status = 'A fazer'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                                <div class=\"card bg-light text-dark p-3 mb-3 mt-3 \">
                                <div class=\"card-header desc\">{$row['descricao_tarefa']}</div>
                                    <div class=\"card-body\">
                                        <p class=\"card-text\">Usuário: {$row['nome']}</p>
                                        <p class=\"card-text\">Setor: {$row['nome_setor']}</p>
                                        <p class=\"card-text\">Prioridade: {$row['prioridade']}</p>
                                        <a method='GET' class='btn mb-4 btn-primary mt-2' href='public/cadastro_tarefa.php?id={$row['id_tarefa']}'>Editar</a>
                                        <a class='btn mb-4 btn-danger mt-2' href='public/delete_tarefa.php?id={$row['id_tarefa']}'>Excluir</a>

                                    <form action='public/update_status.php' method='POST'>
                                    <select name='status' class='form-select' required>
                                            <option value='A fazer' selected>A fazer</option>
                                            <option value='Fazendo'>Fazendo</option>
                                            <option value='Pronto'>Pronto</option>
                                        </select>
                                        <input type='hidden' name='id_tarefa' value='{$row['id_tarefa']}'>
                                        <input type='submit' class='btn btn-primary mt-2' value='Atualizar Status'>
                                    </form>

                                    </div>
                                </div>
                            ";
                        }
                    }
                
                    ?>
                </div>

                <div class="ms-4 me-4 col justify-content-center align-items-center bg-fazendo">
                    <h2 class="mt-3 text-center">Fazendo</h2>
                    <?php
                    $sql = "SELECT * FROM tarefas INNER JOIN usuario ON tarefas.id_usuario = usuario.id_usuario WHERE status = 'Fazendo'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    
                            echo "
                                <div class=\"card bg-light text-dark mb-3 mt-3 p-3\">
                                <div class=\"card-header desc\">{$row['descricao_tarefa']}</div>
                                    <div class=\"card-body\">
                                        <p class=\"card-text\">Usuário: {$row['nome']}</p>
                                        <p class=\"card-text\">Setor: {$row['nome_setor']}</p>
                                        <p class=\"card-text\">Prioridade: {$row['prioridade']}</p>
                                        <a class='btn mb-4 btn-primary mt-2' href='public/cadastro_tarefa.php?id={$row['id_tarefa']}'>Editar</a>
                                        <a class='btn mb-4 btn-danger mt-2' href='public/delete_tarefa.php?id={$row['id_tarefa']}'>Excluir</a>

                                        <form action='public/update_status.php' method='POST'>
                                            <select name='status' class='form-select' required>
                                                <option value='A fazer'>A fazer</option>
                                                <option value='Fazendo' selected>Fazendo</option>
                                                <option value='Pronto'>Pronto</option>
                                            </select>
                                            <input type='hidden' name='id_tarefa' value='{$row['id_tarefa']}'>
                                            <input type='submit' class='btn btn-primary mt-2' value='Atualizar Status'>
                                        </form>
                                    </div>
                                </div>
                            ";
                        }
                    }
                    ?>
    
                </div>

                <div class="ms-4 me-4 col justify-content-center align-items-center bg-pronto">
                    <h2 class="mt-3 text-center">Pronto</h2>
                    <?php
                    $sql = "SELECT * FROM tarefas INNER JOIN usuario ON tarefas.id_usuario = usuario.id_usuario WHERE status = 'Pronto'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                                <div class=\"card bg-light mb-3 mt-3 p-3\"> 
                                <div class=\"card-header desc\">{$row['descricao_tarefa']}</div>
                                    <div class=\"card-body\">
                                        <p class=\"card-text\">Usuário: {$row['nome']}</p>
                                        <p class=\"card-text\">Setor: {$row['nome_setor']}</p>
                                        <p class=\"card-text\">Prioridade: {$row['prioridade']}</p>
                                        <a class='btn mb-4 btn-primary mt-2' href='public/cadastro_tarefa.php?id={$row['id_tarefa']}'>Editar</a>
                                        <a class='btn mb-4 btn-danger mt-2' href='public/delete_tarefa.php?id={$row['id_tarefa']}'>Excluir</a>

                                    <form action='public/update_status.php' method='POST'>
                                        <select name='status' class='form-select' required>
                                            <option value='A fazer'>A fazer</option>
                                            <option value='Fazendo'>Fazendo</option>
                                            <option value='Pronto' selected>Pronto</option>
                                        </select>
                                        <input type='hidden' name='id_tarefa' value='{$row['id_tarefa']}'>
                                        <input type='submit' class='btn btn-primary mt-2' value='Atualizar Status'>
                                    </form>
                                </div>
                            ";
                        }
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>