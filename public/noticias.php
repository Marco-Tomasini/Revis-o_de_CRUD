<?php
include 'partials/header.php';

$url = 'https://api.spaceflightnewsapi.net/v4/articles?_limit=5'; 

$options = [
    "http" => [
        "method" => "GET",
        "header" => "Accept: application/json\r\n"
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

if ($response === FALSE) {
    die('Erro');
}

$arquivos = json_decode($response, true);

if (isset($arquivos['results'])) {
    $artigos = $arquivos['results'];
} else {
    $artigos = $arquivos;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <title>Artigo Sobre o Espaço</title>
</head>
<body>
    <h1>Artigos Recentes Sobre o Espaço</h1>
    <ul>
        <?php foreach ($artigos as $artigo): ?>
            <li>
                <h2><?php echo htmlspecialchars($artigo['title'] ?? '–'); ?></h2>
                <p><?php echo htmlspecialchars($artigo['summary'] ?? '–'); ?></p>
                <a href="<?php echo htmlspecialchars($artigo['url'] ?? '#'); ?>">Veja Mais Sobre</a>
                <p><small>Publicado em: 
                    <?php 
                        $date = $artigo['published_at'] ?? ($artigo['published_on'] ?? null);
                        echo $date ? date('d/m/Y', strtotime($date)) : '–'; 
                    ?>
                </small></p>
            </li>
        <?php endforeach; ?>
    </ul>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
