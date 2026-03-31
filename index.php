<!--
  Disciplina : Desenvolvimento Web II (DWII)
  Aula       : 03 - PHP Intro
  Autor      : Luara Munkemer Fornazari
  Data       : 02/03/2026
-->
<?php
$nome = "Luara";
$profissao = "Estudante de Tecnologia";
$curso = "Técnico em Informática – IFPR";
$pagina_atual = "inicio";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio – <?php echo $nome; ?></title>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>
    <?php include "includes/cabecalho.php"; ?>

    <div class="nome">
        <h1><?php echo $nome; ?> Munkemer</h1>
        <p><?php echo $profissao; ?> | <?php echo $curso; ?></p>
    </div>

    <div class="container">
        <h2>Bem-vindo ao meu portfólio</h2>
        <p>Esta página foi gerada usando PHP em: 
           <strong><?php echo date("d/m/Y \às H:i:s"); ?></strong></p>
    </div>

    <?php include "includes/rodape.php"; ?>
</body>
</html>