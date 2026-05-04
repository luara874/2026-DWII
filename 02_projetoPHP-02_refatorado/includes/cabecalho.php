<?php
/**
 * =======================================================================
 * ARQUIVO     : includes/cabecalho.php
 * Disciplina  : Desenvolvimento Web II (2026-DWII)
 * Aula        : 04 – PHP para Web: Formulários, GET e POST
 * Autor       : Luara
 * Conceitos   : Modularização, include, isset(), caminho dinâmico
 * =======================================================================
 * * Responsabilidade: gera <meta>, <title>, link para o CSS
 * externo e inclui o nav.php.
 * * Variáveis esperadas na página que inclui este arquivo:
 * $titulo_pagina – string (opcional): texto da aba do navegador
 * $caminho_raiz  – string: caminho relativo até a raiz do projeto
 * Ex: '../' para páginas em 01_php-intro/ ou
 * 02_formularios/ (um nível acima)
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ── 2. Fallbacks defensivos ──────────────────────────────────
// isset() verifica se a variável foi definida antes de usá-la.
// Se a página esquecer de declarar alguma variável, usamos
// um valor padrão seguro em vez de gerar avisos PHP.
if (!isset($titulo_pagina)) $titulo_pagina = 'Portfólio DWII';
if (!isset($caminho_raiz))  $caminho_raiz  = './';
if (!isset($pagina_atual))  $pagina_atual  = '';
?>
<!-- ── 3. Tags do <head> ──────────────────────────────────── -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo htmlspecialchars($titulo_pagina); ?></title>

<!--
  <link> aponta para o CSS usando $caminho_raiz.
  Como todas as páginas do projeto refatorado estão na raiz,
  $caminho_raiz será sempre './' → './includes/style.css'.
  O padrão único elimina a necessidade de ajustar caminhos
  conforme a profundidade da pasta.
-->
<link rel="stylesheet" href="<?php echo $caminho_raiz; ?>includes/style.css">

<?php
// ── 4. Incluir a navegação ───────────────────────────────────
// __DIR__ retorna o caminho absoluto do diretório deste arquivo.
// Usando __DIR__, o include funciona corretamente independente
// de qual página fez o include do cabecalho.php.
include __DIR__ . '/nav.php';
?>