<!--
  Disciplina : Desenvolvimento Web II (DWII)
  Aula       : 03 - PHP Intro
  Autor      : Luara Munkemer Fornazari
  Data       : 02/03/2026
-->
<?php
$nome = "Luara";
$pagina_atual = "sobre";
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
<?php include "../includes/cabecalho.php"; ?>
    <div class="container">
        <h1>Sobre mim</h1>
        <p>Meu nome é Luara, tenho 16 anos e moro em Ponta Grossa.
Atualmente curso o ensino técnico em informática.

Não é uma área que eu gosto muito e às vezes acho difícil, mas considero interessante.
Acredito que os conhecimentos que estou aprendendo agora vão me ajudar no futuro.</p>
        <p>Agora meu foco total tá sendo terminar o técnico e estudar pro PSS, para entrar na faculdade. </p>
        <a href="index.php" class="btn-voltar">← Voltar ao início</a>
    </div>
    <?php include "../includes/rodape.php"; ?>
</body>
</html>