
<?php
include 'db_connect.php';

session_start();

$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST["nome"] ?? "";
    $pass = $_POST["senha"] ?? "";

    $stmt = $mysqli->prepare("SELECT id_usuario, nome, senha FROM usuario WHERE nome=? AND senha=?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    if ($dados) {
        $_SESSION["id_usuario"] = $dados["id_usuario"];
        $_SESSION["nome"] = $dados["nome"];
        header("Location: ../index.php?id=".$dados["id_usuario"]);
        exit;
    } else {
        $msg = "Usuário ou senha incorretos!";
    }
}

    if (isset($_GET['logout'])) {
        session_destroy();
    }

?>

<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="../styles/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>
<body>

<div class="flex-column justify-content-center align-items-center container">

    <h3 class="mt-4 fw-bold text-center">Login</h3>
    <?php if ($msg): ?><p class="msg"><?= $msg ?></p><?php endif; ?>
    <form class="me-3 ms-3" method="post">
        <label class="form-label" for="nome">Usuário:</label>
        <input class="form-control" type="text" name="nome" placeholder="Usuário" required>
        <label class="form-label" for="senha">Senha:</label>
        <input class="form-control" type="password" name="senha" placeholder="Senha" required>
        <button class="mt-4 btn btn-primary" type="submit">Entrar</button>
    </form>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>