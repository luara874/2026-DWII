<!--
  Disciplina : Desenvolvimento Web II (DWII)
  Aula       : 03 - PHP Intro
  Autor      : Luara Munkemer Fornazari
  Data       : 02/03/2026
-->
  <?php
$nome = "Luara";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projetos - <?php echo $nome; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "../includes/cabecalho.php"; ?>

    <div class="container">
        <h1>Projetos</h1>
        
        <h2>Portfolio da disciplina WEB II</h2>
        <p>Protfolio simples deito com HTML e CSS para disciplina WEB II</p><br><br><br>

        <h2>Aplicatico desapega+ em desenvolvimento</h2>
        <p>Aplicativo que iremos desenvolver em WEB II com o professor jailton.</p><br><br><br>

        <h2>Um site para loja de roupas</h2>
        <p>Não o fiz mas tenho o interesse de desenvolver um site para uma loja de roupas.</p><br><br><br>
    </div>

    <?php include "includes/rodape.php"; ?>
</body>
</html>