<?php
$pagina_atual = "inicio";
$nome  = "Luara";
$profissao = "Estudante";
$curso  = "Técnico em Informática - IFPR";

$titulo_pagina = "Portfólio — " . $nome;
$caminho_raiz  = "../";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luara - Apresentação</title>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>

    <header>
        <div class="header-container">
            <h1>Luara</h1>
            <p class="header-sub"><?php echo $profissao ?> do Terceiro Ano - <?php echo $curso ?></p>
        </div>
    </header>

    <main>
        <section class="apresentacao">

            <div class="foto-container">
                <img src="../00_apresentacao/imgs/image.png" alt="Foto de Luara" class="foto-perfil">
            </div>

            <div class="texto-container">
                <h2>Olá, eu sou a <?php echo $nome ?>! 👋</h2>

                <p>
                    Sou estudante do terceiro ano do Instituto Federal do Paraná (IFPR), campus Ponta Grossa.
                    Atualmente estou cursando o ensino médio integrado e desenvolvendo conhecimentos
                    nas áreas acadêmicas e técnicas oferecidas pela instituição.
                </p>

            </div>

        </section>
    </main>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>