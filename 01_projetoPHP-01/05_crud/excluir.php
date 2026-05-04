<?php
/**
 * Confirmação de Exclusão de Registro
 * Luara - Desenvolvimento Web II
 */

require_once __DIR__ . '/../04_sessoes/includes/auth.php';
requer_login(); 

require_once __DIR__ . '/includes/conexao.php';

// 1. Captura e validação inicial do parâmetro
$id_alvo = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id_alvo) {
    header('Location: index.php?status=erro_id');
    exit;
}

$db_admin = conectar();

// 2. Verifica se o projeto existe antes de mostrar a tela
$sql_verificacao = "SELECT nome FROM projetos WHERE id = :id_projeto LIMIT 1";
$query_busca = $db_admin->prepare($sql_verificacao);
$query_busca->execute([':id_projeto' => $id_alvo]);
$registro_encontrado = $query_busca->fetch(PDO::FETCH_ASSOC);

if (!$registro_encontrado) {
    header('Location: index.php?status=nao_existe');
    exit;
}

// 3. Processamento da Exclusão Definitiva (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar_remocao'])) {
    
    $sql_delete = "DELETE FROM projetos WHERE id = :id";
    $operacao = $db_admin->prepare($sql_delete);
    
    if ($operacao->execute([':id' => $id_alvo])) {
        // Redireciona com flag personalizada
        header('Location: index.php?status=removido');
        exit;
    }
}

// Configurações de exibição
$titulo_pagina = 'Remover Projeto';
$caminho_raiz  = '../';
include __DIR__ . '/../includes/cabecalho.php';
?>

<style>
    /* Estilo exclusivo da Luara - Tela de Confirmação */
    .danger-zone {
        max-width: 500px;
        margin: 80px auto;
        background: #fff;
        border-radius: 12px;
        padding: 40px;
        text-align: center;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        border: 1px solid #fee2e2;
    }
    .warning-icon {
        font-size: 4rem;
        background: #fef2f2;
        width: 100px;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        margin: 0 auto 20px;
        color: #ef4444;
    }
    .project-name {
        background: #f8fafc;
        padding: 15px;
        border-radius: 8px;
        color: #1e293b;
        font-weight: 700;
        margin: 20px 0;
        border: 1px dashed #cbd5e1;
    }
    .btn-group {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-top: 30px;
    }
    .btn-delete-final {
        background: #ef4444;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn-delete-final:hover { background: #dc2626; }
    .btn-back {
        background: #f1f5f9;
        color: #475569;
        padding: 12px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 600;
    }
    .btn-back:hover { background: #e2e8f0; }
</style>

<body class="bg-light">

<div class="container">
    <div class="danger-zone">
        <div class="warning-icon">⚠️</div>
        
        <h2 style="color: #111827; margin-bottom: 10px;">Tem certeza?</h2>
        <p style="color: #64748b; line-height: 1.5;">
            Você está solicitando a remoção permanente do seguinte registro do seu portfólio:
        </p>

        <div class="project-name">
            <?= htmlspecialchars($registro_encontrado['nome']) ?>
        </div>

        <p style="color: #ef4444; font-size: 0.85rem; font-weight: 600;">
            * Essa operação é irreversível e apagará os dados do banco.
        </p>

        <form action="excluir.php?id=<?= $id_alvo ?>" method="POST">
            <input type="hidden" name="confirmar_remocao" value="1">
            
            <div class="btn-group">
                <a href="index.php" class="btn-back">Não, voltar</a>
                <button type="submit" class="btn-delete-final">Sim, apagar agora</button>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../includes/rodape.php'; ?>
</body>