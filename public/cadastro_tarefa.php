<?php

include 'db_connect.php';
include 'partials/header.php';

if (isset($_GET['id'])) {

    $id_tarefa = $_GET['id'];

    $sql2 = "SELECT * FROM tarefas INNER JOIN usuario ON tarefas.id_usuario = usuario.id_usuario WHERE id_tarefa='$id_tarefa'";
    $result = $conn->query($sql2);
    $tarefa_row = $result->fetch_assoc();
    
    $id_usuario_fk = $tarefa_row['id_usuario'];
    $descricao_tarefa = $tarefa_row['descricao_tarefa'];
    $nome_setor = $tarefa_row['nome_setor'];
    $prioridade = $tarefa_row['prioridade'];
    $status = $tarefa_row['status'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $sql = "UPDATE tarefas SET id_usuario='$id_usuario_fk', descricao_tarefa='$descricao_tarefa', nome_setor='$nome_setor', prioridade='$prioridade', status='$status' WHERE id_tarefa='$id_tarefa'";


        if($conn->query($sql) === true) {
            echo "<script>alert('Tarefa Atualizada com sucesso.');</script>";
            header('Location: ../index.php');
            exit();
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


        <title>Atualizar Tarefa</title>

    </head>
    <body>
        <form class="me-3 ms-3" action="cadastro_tarefa.php" method="POST">

            <label class="form-label" for="usuario">Usuário: </label>
            <select name="id_usuario" class="form-select mb-3" required >
                <?php
                    $sql = "SELECT id_usuario, nome FROM usuario";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($usuario_row = $result->fetch_assoc()) {
                            $selected = ($usuario_row['id_usuario'] == $id_usuario_fk) ? 'selected' : '';
                            echo "<option value='" . $usuario_row['id_usuario'] . "' $selected>" . $usuario_row['nome'] . "</option>";
                        }
                    }
                ?>
            </select>

            <label class="form-label mtd-3" for="descricao_tarefa">Descrição da Tarefa: </label>
            <input type="text" name="descricao_tarefa" class="form-control" required value="<?php echo ($descricao_tarefa)?>">
            
            <label class="form-label mt-3" for="nome_setor">Nome do Setor: </label>
            <input type="text" name="nome_setor" class="form-control" required value="<?php echo ($nome_setor) ?>">

            <label class="form-label mt-3" for="prioridade">Prioridade: </label>
           <select name="prioridade" class="form-select" required default="<?php echo ($prioridade) ?>">
                <option value="baixa">Baixa</option>
                <option value="media">Média</option>
                <option value="alta">Alta</option>
            </select>

            <label class="form-label mt-3" for="status">Status: </label>
            <select name="status" class="form-select" required default="<?php echo ($status)?>">
                <option value="A fazer">A fazer</option>
                <option value="Fazendo">Fazendo</option>
                <option value="Pronto">Pronto</option>
            </select>

            <input type="submit" class="btn btn-primary mt-4" value="Atualizar Tarefa">
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    </body>
    </html>


<?php
} if($id_tarefa = null) {
    $id_tarefa = null;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id_usuario_fk = $_POST['id_usuario'];
        $descricao_tarefa = $_POST['descricao_tarefa'];
        $nome_setor = $_POST['nome_setor'];
        $prioridade = $_POST['prioridade'];
        $status = $_POST['status'];

        $sql = "INSERT INTO tarefas (id_usuario, descricao_tarefa, nome_setor, prioridade, status) VALUES ('$id_usuario_fk', '$descricao_tarefa', '$nome_setor', '$prioridade', '$status')";

        if($conn->query($sql) === true) {
            echo "<script>alert('Tarefa cadastrada com sucesso.');</script>";
            header('Location: ../index.php');
            exit();
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


        <title>Criar Tarefa</title>

    </head>
    <body>
        <form class="me-3 ms-3" action="cadastro_tarefa.php" method="POST">

            <label class="form-label" for="usuario">Usuário: </label>
            <select name="id_usuario" class="form-select mb-3" required>
                <?php
                $sql = "SELECT id_usuario, nome FROM usuario";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id_usuario'] . "'>" . $row['nome'] . "</option>";
                    }
                }
                ?>
            </select>

            <label class="form-label mtd-3" for="descricao_tarefa">Descrição da Tarefa: </label>
            <input type="text" name="descricao_tarefa" class="form-control" required>

            <label class="form-label mt-3" for="nome_setor">Nome do Setor: </label>
            <input type="text" name="nome_setor" class="form-control" required>

            <label class="form-label mt-3" for="prioridade">Prioridade: </label>
            <select name="prioridade" class="form-select" required>
                <option value="baixa">Baixa</option>
                <option value="media">Média</option>
                <option value="alta">Alta</option>
            </select>

            <label class="form-label mt-3" for="status">Status: </label>
            <select name="status" class="form-select" required>
                <option value="A fazer">A fazer</option>
                <option value="Fazendo">Fazendo</option>
                <option value="Pronto">Pronto</option>
            </select>

            <input type="submit" class="btn btn-primary mt-4" value="Cadastrar Tarefa">
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

    </body>
    </html>
<?php
}
?>