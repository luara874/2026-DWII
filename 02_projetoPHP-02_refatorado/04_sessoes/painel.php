<?php
//session_start();

//if (!isset($_SESSION['usuario'])) {
//    header('Location: login.php');
//    exit;
//}

require_once __DIR__ . '/includes/auth.php';
requer_login();

$titulo_pagina = 'Painel - Área Restrita';
$nome = 'luara';
$caminho_raiz  = '../';
$pagina_atual  = '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php require_once __DIR__ . '/../includes/cabecalho.php'; ?>
</head>
<body>

<div class="container">

    <div class="alerta-sucesso">
        <h3>✅ Você está autenticado!</h3>
        <p><strong>Usuário:</strong>
            <?php echo htmlspecialchars($_SESSION['usuario']); ?>
        </p>
        <p><strong>Login realizado em:</strong>
            <?php echo htmlspecialchars($_SESSION['logado_em'] ?? '-'); ?>
        </p>
    </div>

    <?php if (isset($_SESSION['usuario'])): ?>
        <a href="logout.php"
           style="background: #c0392b; color: white; padding: 10px 24px;
                  border-radius: 6px; text-decoration: none;
                  font-weight: bold;">
            🚪 Sair
        </a>
    <?php else: ?>
        <a href="login.php"
           style="background: #3b579d; color: white; padding: 10px 24px;
                  border-radius: 6px; text-decoration: none;
                  font-weight: bold;">
            🔒 Acessar Área Restrita
        </a>
    <?php endif; ?>

</div>

<?php require_once __DIR__ . '/../includes/rodape.php'; ?>
</body>
</html>