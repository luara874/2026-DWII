<?php
/**
 * =======================================================================
 * ARQUIVO     : includes/rodape.php
 * Disciplina  : Desenvolvimento Web II (2026-DWII)
 * Aula        : 04 – PHP para Web: Formulários, GET e POST
 * Autor       : Luara
 * Conceitos   : Modularização, date(), isset(), fallback defensivo
 * =======================================================================
 */

// Fallback: se $nome não estiver definida na página, exibe "Portfólio".
// Isso evita avisos de PHP quando o rodapé é incluído sem $nome.
$autor = isset($nome) ? htmlspecialchars($nome) : 'Portfólio';
?>

<!-- <footer> sem style inline: visual controlado pelo style.css -->
<footer>
  <?php echo $autor; ?>
  &copy; <?php echo date('Y'); ?>
  | Desenvolvido com PHP
  | IFPR — Ponta Grossa
</footer>