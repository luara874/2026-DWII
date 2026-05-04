<?php
if (!isset($pagina_atual)) $pagina_atual = '';
if (!isset($caminho_raiz))  $caminho_raiz  = './';

// ── Função auxiliar: classe do item ativo ────────────────────
//
// Recebe o nome do item e da página atual.
// Retorna 'class="ativo"' se forem iguais, '' se não.
// Isso aplica o estilo dourado ao item do menu da página atual.
//
// Exemplo: menu_class('sobre', 'sobre') → 'class="ativo"'
//          menu_class('contato', 'sobre') → ''
function menu_class(string $item, string $atual): string {
    return ($item === $atual) ? 'class="ativo"' : '';
}

// ── Verificar estado de autenticação ─────────────────────────
//
// $_SESSION['usuario'] é definida em login.php quando o login
// é bem-sucedido e destruída em logout.php.
//
// isset() retorna true se a variável existe e não é null.
// Usamos $logado (booleano) para decidir quais links exibir.
//
// session_start() foi chamado em cabecalho.php — a sessão já
// está disponível quando chegamos aqui.
$logado = isset($_SESSION['usuario']);
?>

<nav>

  <!-- ── LINKS PÚBLICOS ─────────────────────────────────────
       Sempre visíveis, independente do estado de autenticação.
  -->

  <a href="<?php echo $caminho_raiz; ?>index.php"
     <?php echo menu_class('inicio', $pagina_atual); ?>>
    🏠 Início
  </a>

  <a href="<?php echo $caminho_raiz; ?>sobre.php"
     <?php echo menu_class('sobre', $pagina_atual); ?>>
    👤 Sobre
  </a>

  <a href="<?php echo $caminho_raiz; ?>projetos.php"
     <?php echo menu_class('projetos', $pagina_atual); ?>>
    🚀 Projetos
  </a>

  <a href="<?php echo $caminho_raiz; ?>contato.php"
     <?php echo menu_class('contato', $pagina_atual); ?>>
    📬 Contato
  </a>

  <a href="<?php echo $caminho_raiz; ?>catalogo.php"
     <?php echo menu_class('catalogo', $pagina_atual); ?>>
    🗄️ Catálogo
  </a>

  <!-- ── LINKS CONDICIONAIS ──────────────────────────────────
       O PHP decide quais links renderizar em tempo de execução,
       baseado no valor de $logado.
       O visitante nunca vê os links que não são para ele —
       eles simplesmente não existem no HTML gerado.
  -->
  <?php if ($logado): ?>

    <!-- USUÁRIO AUTENTICADO: exibe Painel e Sair -->
    <a href="<?php echo $caminho_raiz; ?>painel.php"
       <?php echo menu_class('painel', $pagina_atual); ?>>
      📊 Painel
    </a>
    <a href="<?php echo $caminho_raiz; ?>logout.php">
      🚪 Sair
    </a>

  <?php else: ?>

    <!-- USUÁRIO NÃO AUTENTICADO: exibe apenas Login -->
    <a href="<?php echo $caminho_raiz; ?>login.php"
       <?php echo menu_class('login', $pagina_atual); ?>>
      🔐 Login
    </a>

  <?php endif; ?>

</nav>