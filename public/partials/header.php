<?php require_once __DIR__ . '/../../public/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanban</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container-fluid p-1 ms-5 me-5">
                    <a class="navbar-brand fs-4" href="#"></a>
                    <a class="navbar-brand" href="#">Kanban</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto p-1">
                            <li class="nav-item ms-5" >
                                <a class="nav-link" href="cadastro_usuario.php">Cadastro Usuário</a>
                            </li>
                            <li class="nav-item ms-5">
                                <a class="nav-link" href="cadastro_tarefa.php">Cadastro Tarefa</a>
                            </li>
                            <li class="nav-item ms-5">
                                <a class="nav-link" href="../index.php">Visualizar Tarefas</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

    </div>
    <br>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>