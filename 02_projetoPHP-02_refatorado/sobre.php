<?php
/*
  Disciplina : Desenvolvimento Web II (DWII)
  Aula       : 10 - Refatoração
  Autor      : Luara Munkemer Fornazari
  Data       : 03/05/2026
*/
if (session_status() === PHP_SESSION_NONE) session_start();
$nome = "Luara";
$formacoes = ["tecnica em informatica"];
$pagina_atual = "sobre";
$titulo_pagina = "sobre";
$caminho_raiz = "./";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre – <?php echo $nome; ?></title>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>
<?php include "includes/cabecalho.php"; ?>
    <div class="container">
        <h1>Sobre mim</h1>
        <p>Meu nome é Luara, tenho 16 anos e moro em Ponta Grossa.
Atualmente curso o ensino <?php echo $formacoes ?>

Não é uma área que eu gosto muito e às vezes acho difícil, mas considero interessante.
Acredito que os conhecimentos que estou aprendendo agora vão me ajudar no futuro.</p>
        <p>Agora meu foco total tá sendo terminar o técnico e estudar pro PSS, para entrar na faculdade. </p>
        <a href="index.php" class="btn-voltar">← Voltar ao início</a>
        <div class="card">
        <h3>Formação</h3>
        <ul style="margin: 0; padding-left: 20px; color: #374151;">
            <?php foreach ($formacoes as $item): ?>
            <li style="margin-bottom: 6px;"><?php echo htmlspecialchars($item); ?></li>
            <?php endforeach; ?>
        </ul>
        </div>
        </div>
    </div>
    <?php include "includes/rodape.php"; ?>
</body>
</html>