<?php
/**
 * Gerenciamento de Projetos - CRUD
 * Aluna: Luara
 */

// Habilita exibição de erros para desenvolvimento
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Importação de segurança e conexão
require_once __DIR__ . '/../04_sessoes/includes/auth.php';
requer_login(); 
require_once __DIR__ . '/includes/conexao.php';

$conexao = conectar();

// Consulta otimizada: pegamos apenas o necessário para a listagem
$sql = 'SELECT id, nome, ano, tecnologias, criado_em FROM projetos ORDER BY ano DESC, nome ASC';
$query = $conexao->query($sql);
$lista_projetos = $query->fetchAll(PDO::FETCH_ASSOC);

// Sistema de Notificações
$aviso = '';
$classe_aviso = 'info';

if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'sucesso':
            $aviso = "✨ Novo projeto registrado com êxito!";
            $classe_aviso = 'success';
            break;
        case 'atualizado':
            $aviso = "💾 As alterações foram salvas corretamente.";
            $classe_aviso = 'success';
            break;
        case 'removido':
            $aviso = "🗑️ O registro foi excluído do sistema.";
            $classe_aviso = 'danger';
            break;
    }
}

$titulo_pagina = 'Administrar Projetos';
$caminho_raiz  = '../';
include __DIR__ . '/../includes/cabecalho.php';
?>

<style>
    /* Estilos exclusivos da Luara */
    .admin-header { background: #f8fafc; padding: 40px 0; border-bottom: 1px solid #e2e8f0; margin-bottom: 30px; }
    .tabela-projetos { width: 100%; border-collapse: collapse; background: white; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
    .tabela-projetos th { background: #3ba34a; color: white; padding: 15px; text-align: left; font-size: 0.9rem; }
    .tabela-projetos td { padding: 15px; border-bottom: 1px solid #f1f5f9; color: #475569; }
    .tabela-projetos tr:hover { background: #f8fafc; }
    
    .btn-acao { padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.85rem; display: inline-block; margin-right: 5px; }
    .btn-edit { background: #dbeafe; color: #1e40af; border: 1px solid #bfdbfe; }
    .btn-del { background: #fee2e2; color: #b91c1c; border: 1px solid #fecaca; }
    .btn-add { background: #3ba34a; color: white; padding: 12px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; }
    
    .pill-tech { background: #f1f5f9; color: #64748b; padding: 2px 8px; border-radius: 4px; font-size: 0.7rem; margin-right: 4px; border: 1px solid #e2e8f0; }
    .alerta { padding: 15px; border-radius: 8px; margin-bottom: 25px; text-align: center; font-weight: 500; }
    .alerta-success { background: #dcfce7; color: #166534; border: 1px solid #bbf7d0; }
    .alerta-danger { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
</style>

<body class="bg-light">

<div class="admin-header">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <a href="../index.php" style="color: #64748b; text-decoration: none; font-size: 0.9rem;">← Sair do Módulo</a>
                <h1 style="margin-top: 10px; color: #1e293b;">Meus Trabalhos</h1>
            </div>
            <a href="cadastrar.php" class="btn-add">＋ Adicionar Projeto</a>
        </div>
    </div>
</div>

<main class="container">

    <?php if ($aviso): ?>
        <div class="alerta alerta-<?= $classe_aviso ?>">
            <?= $aviso ?>
        </div>
    <?php endif; ?>

    <?php if (empty($lista_projetos)): ?>
        <div style="text-align: center; padding: 80px 20px; background: white; border-radius: 15px; border: 2px dashed #e2e8f0;">
            <p style="color: #94a3b8; font-size: 1.2rem;">Não há projetos cadastrados no momento.</p>
            <a href="cadastrar.php" style="color: #3ba34a; font-weight: bold;">Clique aqui para começar</a>
        </div>
    <?php else: ?>
        <table class="tabela-projetos">
            <thead>
                <tr>
                    <th>Nome do Projeto</th>
                    <th>Ano</th>
                    <th>Tecnologias</th>
                    <th style="text-align: center;">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista_projetos as $item): ?>
                    <tr>
                        <td>
                            <strong><?= htmlspecialchars($item['nome']) ?></strong>
                            <div style="font-size: 0.75rem; color: #94a3b8;">Ref: #<?= $item['id'] ?></div>
                        </td>
                        <td><?= htmlspecialchars($item['ano']) ?></td>
                        <td>
                            <?php 
                                $tags = explode(',', $item['tecnologias']);
                                foreach($tags as $t): if(trim($t) == "") continue;
                            ?>
                                <span class="pill-tech"><?= trim(htmlspecialchars($t)) ?></span>
                            <?php endforeach; ?>
                        </td>
                        <td style="text-align: center; min-width: 150px;">
                            <a href="editar.php?id=<?= $item['id'] ?>" class="btn-acao btn-edit">Editar</a>
                            <a href="excluir.php?id=<?= $item['id'] ?>" 
                               class="btn-acao btn-del" 
                               onclick="return confirm('Confirmar exclusão deste registro?')">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <p style="margin-top: 20px; color: #94a3b8; font-size: 0.85rem;">
            Total de registros: <?= count($lista_projetos) ?>
        </p>
    <?php endif; ?>

</main>

<?php include __DIR__ . '/../includes/rodape.php'; ?>
</body>