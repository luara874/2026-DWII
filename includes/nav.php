<!--
  Disciplina : Desenvolvimento Web II (DWII)
  Aula       : 03 - PHP Intro
  Autor      : Luara Munkemer Fornazari
  Data       : 02/03/2026
-->
<?php
$cor_inicio = ($pagina_atual === "inicio")   ? "color: #f0b341; font-weight: bold;" : "color: white;";
$cor_sobre = ($pagina_atual === "sobre")    ? "color: #f0b341; font-weight: bold;" : "color: white;";
$cor_projetos = ($pagina_atual === "projetos") ? "color: #c5840b; font-weight: bold;" : "color: white;";
?>
<nav>
    <a href="index.php" style="<?php echo $cor_inicio; ?>">Início</a>
    <a href="01_php-intro/sobre.php" style="<?php echo $cor_sobre; ?>">Sobre</a>
    <a href="01_php-intro/projetos.php" style="<?php echo $cor_projetos; ?>">Meus Projetos</a>
</nav>