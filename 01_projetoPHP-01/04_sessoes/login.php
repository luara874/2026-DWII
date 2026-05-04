<?php
/**
 * Projeto: Sistema de Login Seguro
 * Disciplina: Desenvolvimento Web II - 2026
 * Aluna: Luara
 */
session_start();

// Verifica se o usuário já possui uma sessão ativa para evitar re-login
if (isset($_SESSION['usuario_logado'])) {
    header('Location: painel.php');
    exit;
}

// Configurações de Acesso (Simulação de DB)
$admin_user = 'admin';
$admin_pass = 'dwii2026';

$erro_msg  = '';
$input_val = '';

// Processamento da requisição de entrada
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitização e captura
    $user_digitado = trim($_POST['field_user'] ?? '');
    $pass_digitada = trim($_POST['field_pass'] ?? '');

    // Validação da Identidade
    if ($user_digitado === $admin_user && $pass_digitada === $admin_pass) {
        // Sucesso: Gera novo ID de sessão para segurança proativa
        session_regenerate_id(true);
        
        $_SESSION['usuario_logado'] = $user_digitado;
        $_SESSION['data_acesso']    = date('d/m/Y \à\s H:i');
        
        header('Location: painel.php');
        exit;
    } else {
        // Falha: Define mensagem de erro e preserva o login digitado
        $erro_msg  = 'Credenciais inválidas. Tente novamente.';
        $input_val = $user_digitado;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Aluno | Luara 2026</title>
    <link rel="stylesheet" href="../includes/style.css">
    <style>
        /* Estilos específicos para diferenciar do modelo original */
        .auth-wrapper { margin-top: 60px; display: flex; justify-content: center; }
        .login-box { 
            background: #ffffff; 
            border-radius: 12px; 
            padding: 40px; 
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            border-top: 6px solid #3ba34a; /* Sua cor temática */
            width: 100%;
            max-width: 380px;
        }
        .error-notify {
            background: #fff1f2;
            color: #e11d48;
            padding: 12px;
            border-radius: 6px;
            font-size: 0.9rem;
            margin-bottom: 20px;
            border-left: 4px solid #fb7185;
        }
        .form-label { font-weight: 600; font-size: 0.85rem; color: #374151; margin-bottom: 5px; display: block; }
        .input-control { 
            width: 100%; 
            padding: 12px; 
            border: 1px solid #d1d5db; 
            border-radius: 8px; 
            margin-bottom: 18px;
            box-sizing: border-box;
        }
        .btn-submit { 
            background: #3ba34a; 
            color: white; 
            font-weight: bold; 
            border: none; 
            padding: 14px; 
            width: 100%; 
            border-radius: 8px; 
            cursor: pointer;
            transition: opacity 0.2s;
        }
        .btn-submit:hover { opacity: 0.9; }
    </style>
</head>
<body class="hub-page">

    <div class="container" style="padding-top: 20px;">
        <a href="../index.php" style="text-decoration: none; color: #6b7280; font-size: 0.9rem;">← Voltar ao Início</a>
    </div>

    <main class="auth-wrapper">
        <div class="login-box">
            
            <header style="text-align: center; margin-bottom: 30px;">
                <span style="font-size: 2.5rem;">🔐</span>
                <h2 style="margin: 10px 0 5px 0; color: #111827;">Acesso Restrito</h2>
                <p style="color: #6b7280; font-size: 0.85rem;">Desenvolvimento Web II - Aula 06</p>
            </header>

            <?php if ($erro_msg): ?>
                <div class="error-notify">
                    <strong>Erro:</strong> <?= $erro_msg ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="input-group">
                    <label class="form-label" for="user">Usuário de Acesso</label>
                    <input type="text" 
                           id="user"
                           name="field_user" 
                           class="input-control"
                           placeholder="Ex: admin" 
                           value="<?= htmlspecialchars($input_val) ?>" 
                           required>
                </div>

                <div class="input-group">
                    <label class="form-label" for="pass">Senha</label>
                    <input type="password" 
                           id="pass"
                           name="field_pass" 
                           class="input-control"
                           placeholder="••••••••" 
                           required>
                </div>

                <button type="submit" class="btn-submit">Entrar no Painel</button>
            </form>

            <footer style="text-align: center; margin-top: 25px;">
                <a href="recuperar.php" style="color: #3ba34a; font-size: 0.8rem; text-decoration: none;">Esqueceu os dados de acesso?</a>
            </footer>
        </div>
    </main>

    <footer style="margin-top: 100px; text-align: center; color: #9ca3af; font-size: 0.8rem;">
        <p>Luara &copy; 2026 | IFPR Ponta Grossa</p>
    </footer>

</body>
</html>