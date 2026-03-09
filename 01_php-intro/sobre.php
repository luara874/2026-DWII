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
<?php include "includes/cabecalho.php"; ?>
    <div class="container">
        <h1>Sobre mim</h1>
        <p>Moro em <strong>Ponta Grossa</strong> e hoje tô no 4º ano de Informática no IFPR. Sendo bem sincera: no começo eu <strong>odiava</strong> o curso. Não via sentido nenhum naquilo, mas com o tempo a chave virou um pouco e eu passei a gostar de como as coisas funcionam.</p>
        <p>Agora meu foco total tá sendo terminar o técnico e estudar pro <strong>PSS</strong>. Quero garantir minha vaga e fechar esse ciclo da escola do jeito certo.</p>
        <a href="index.php" class="btn-voltar">← Voltar ao início</a>
    </div>
    <?php include "includes/rodape.php"; ?>
</body>
</html>