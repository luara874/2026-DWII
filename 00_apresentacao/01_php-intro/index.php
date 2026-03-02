<?php

$nome         = "Luara";
$profissao    = "Estudante de Tecnologia";
$curso        = "Técnico em Informática – IFPR";
$pagina_atual = "inicio";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfólio – <?php echo $nome; ?></title>

    <style>

        body { font-family: Arial, sans-serif; margin: 0; background: #f3f4f6; }

        .hero { background: linear-gradient(135deg, #3b579d, #2a4080); color: white;
            text-align: center; padding: 60px 20px; }

        .hero h1 { font-size: 2.5em; margin-bottom: 10px; }

        .hero p { font-size: 1.2em; opacity: 0.9; }

        .container { max-width: 800px; margin: 40px auto; padding: 0 20px; }

    </style>
</head>

<body>

    <!-- Menu agora vem do arquivo separado -->
    <?php include 'includes/cabecalho.php'; ?>

    <div class="hero">
        <h1><?php echo $nome; ?></h1>
        <p><?php echo $profissao; ?> | <?php echo $curso; ?></p>
    </div>

    <div class="container">
        <h2>Bem-vindo ao meu portfólio</h2>
        <p>Esta página foi gerada pelo PHP em:
            <strong><?php echo date("d/m/Y \às H:i:s"); ?></strong></p>
    </div>

    <!-- Rodapé agora vem do arquivo separado -->
    <?php include 'includes/rodape.php'; ?>

</body>
</html>