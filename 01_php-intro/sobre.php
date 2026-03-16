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
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "../includes/cabecalho.php"; ?>
    <div class="container">
        <h1>Sobre mim</h1>
        <p>Moro em Ponta Grossa e hoje tô no 3º ano de Informática no IFPR. No começo eu odiava o curso. E ainda não gosto muito quero so concluilo porque o comecei mas não pretendo seguir na area</p>
        <p>Agora meu foco total tá sendo terminar o técnico e estudar pro PSS. Quero entrar na universidade.</p>
        <a href="index.php" class="btn-voltar">← Voltar ao início</a>
    </div>
    <?php include "../includes/rodape.php"; ?>
</body>
</html>