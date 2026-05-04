<?php
$nome          = "luara";
$pagina_atual  = "contato";   // mantém "contato" ativo no menu
$caminho_raiz  = "../";
$titulo_pagina = "Obrigado!";

// Recebe o nome enviado pelo header() em contato.php
// ?? 'visitante' garante fallback se alguém acessar a URL diretamente
$nome_visitante = htmlspecialchars($_GET['nome'] ?? 'visitante');
?>
<!-- cabecalho.php gera DOCTYPE, head (com link para style.css), body, header e nav -->
<?php include '../includes/cabecalho.php'; ?>

<!-- Todo o visual vem do style.css - sem CSS inline -->
<div class="container confirmacao">
  <p class="confirmacao-icone">✅</p>
  <h1 class="confirmacao-titulo">
    Obrigado, <?php echo $nome_visitante; ?>!
  </h1>
  <p class="confirmacao-texto">
    Sua mensagem foi recebida. Entrarei em contato em breve.
  </p>
  <a href="contato.php" class="btn">← Enviar outra mensagem</a>
</div>

<?php include '../includes/rodape.php'; ?>