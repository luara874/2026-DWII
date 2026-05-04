<?php
/**
 * Módulo de Edição de Projetos
 * Luara - 2026
 */

// Debug apenas para desenvolvimento
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Dependências de Segurança
require_once __DIR__ . '/../04_sessoes/includes/auth.php';
requer_login(); 
require_once __DIR__ . '/includes/conexao.php';

$db = conectar();

// 1. Localização do registro via GET
$id_registro = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$dados_atuais = null;
$alertas = [];

if ($id_registro) {
    $sql_busca = "SELECT * FROM projetos WHERE id = ?";
    $query = $db->prepare($sql_busca);
    $query->execute([$id_registro]);
    $dados_atuais = $query->fetch(PDO::FETCH_ASSOC);

    if (!$dados_atuais) {
        header('Location: index.php?status=nao_encontrado');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}

// 2. Processamento do Envio (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura personalizada das inputs
    $id_hidden   = $_POST['id_projeto'] ?? null;
    $txt_nome    = trim($_POST['in_nome'] ?? '');
    $txt_tecs    = trim($_POST['in_tecs'] ?? '');
    $txt_desc    = trim($_POST['in_desc'] ?? '');
    $num_ano     = trim($_POST['in_ano'] ?? '');
    $url_git     = trim($_POST['in_git'] ?? '');
    $url_web     = trim($_POST['in_web'] ?? '');

    // Validação
    if (strlen($txt_nome) < 3) {
        $alertas[] = 'O nome do projeto precisa ser mais descritivo.';
    }

    if (empty($alertas)) {
        $sql_update = "UPDATE projetos SET 
                        nome = :n, tecnologias = :t, descricao = :d, 
                        ano = :a, link_github = :g, link_deploy = :w 
                       WHERE id = :id";

        $comando = $db->prepare($sql_update);
        $executou = $comando->execute([
            ':n'  => $txt_nome,
            ':t'  => $txt_tecs,
            ':d'  => $txt_desc,
            ':a'  => $num_ano,
            ':g'  => $url_git,
            ':w'  => $url_web,
            ':id' => $id_hidden
        ]);

        if ($executou) {
            header('Location: index.php?status=atualizado');
            exit;
        } else {
            $alertas[] = 'Erro técnico ao salvar no banco de dados.';
        }
    }
}

$titulo_pagina = 'Ajustar Detalhes do Projeto';
include __DIR__ . '/../includes/cabecalho.php';
?>

<style>
    /* Estilo exclusivo da Luara - Interface de Edição */
    .edit-wrapper { max-width: 800px; margin: 40px auto; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
    .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .full-row { grid-column: span 2; }
    
    .input-label { display: block; font-weight: bold; margin-bottom: 8px; color: #374151; font-size: 0.9rem; }
    .form-control { width: 100%; padding: 12px; border: 1px solid #d1d5db; border-radius: 8px; box-sizing: border-box; background: #f9fafb; transition: all 0.2s; }
    .form-control:focus { border-color: #3ba34a; background: white; outline: none; box-shadow: 0 0 0 3px rgba(59, 163, 74, 0.1); }
    
    .btn-save { background: #3ba34a; color: white; padding: 15px 30px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; transition: opacity 0.2s; }
    .btn-save:hover { opacity: 0.9; }
    .btn-cancel { color: #6b7280; text-decoration: none; font-size: 0.9rem; margin-left: 20px; }
    
    .error-list { background: #fee2e2; color: #b91c1c; padding: 15px; border-radius: 8px; margin-bottom: 25px; list-style: none; }
</style>

<body class="bg-light">

<div class="container">
    <div class="edit-wrapper">
        <header style="margin-bottom: 30px; border-bottom: 1px solid #f1f5f9; padding-bottom: 20px;">
            <h2 style="color: #111827;">✏️ Editar Registro</h2>
            <p style="color: #6b7280; font-size: 0.9rem;">Atualize as informações do projeto <strong>#<?= $id_registro ?></strong></p>
        </header>

        <?php if (!empty($alertas)): ?>
            <ul class="error-list">
                <?php foreach ($alertas as $erro): ?>
                    <li>⚠️ <?= $erro ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <form action="editar.php?id=<?= $id_registro ?>" method="POST">
            <input type="hidden" name="id_projeto" value="<?= $dados_atuais['id'] ?>">
            
            <div class="form-grid">
                <div class="full-row">
                    <label class="input-label">Nome do Projeto</label>
                    <input type="text" name="in_nome" class="form-control" value="<?= htmlspecialchars($dados_atuais['nome']) ?>" required>
                </div>

                <div class="full-row">
                    <label class="input-label">Tecnologias (separe por vírgula)</label>
                    <input type="text" name="in_tecs" class="form-control" value="<?= htmlspecialchars($dados_atuais['tecnologias']) ?>" placeholder="PHP, MySQL, CSS...">
                </div>

                <div class="full-row">
                    <label class="input-label">Descrição Breve</label>
                    <textarea name="in_desc" class="form-control" rows="4"><?= htmlspecialchars($dados_atuais['descricao']) ?></textarea>
                </div>

                <div>
                    <label class="input-label">Ano de Criação</label>
                    <input type="number" name="in_ano" class="form-control" value="<?= htmlspecialchars($dados_atuais['ano']) ?>">
                </div>

                <div>
                    <label class="input-label">Repositório GitHub (URL)</label>
                    <input type="url" name="in_git" class="form-control" value="<?= htmlspecialchars($dados_atuais['link_github'] ?? '') ?>">
                </div>

                <div class="full-row">
                    <label class="input-label">Link de Demonstração / Deploy (URL)</label>
                    <input type="url" name="in_web" class="form-control" value="<?= htmlspecialchars($dados_atuais['link_deploy'] ?? '') ?>">
                </div>
            </div>

            <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #f1f5f9;">
                <button type="submit" class="btn-save">Salvar Alterações</button>
                <a href="index.php" class="btn-cancel">Voltar sem salvar</a>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../includes/rodape.php'; ?>
</body>