<?php
// Conexão com o banco
require '../config/conexao.php';

// Mensagem de retorno
$mensagem = "";

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'sucesso') {
        $mensagem = '<div class="alert alert-success text-center" role="alert">
                        Palavra removida com sucesso!
                     </div>';
    } elseif ($_GET['status'] == 'erro') {
        $mensagem = '<div class="alert alert-danger text-center" role="alert">
                        Erro ao remover palavra!
                     </div>';
    }
}

// Busca palavras do banco
$sql = "SELECT ingles, portugues FROM palavras ORDER BY ingles ASC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>WordVault - Remover Palavra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilo -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<!-- Cabeçalho -->
<nav class="navbar topbar py-3">
    <div class="container">
        <div>
            <a href="../index.php" class="brand">Word<span>Vault</span> 🧠</a>
            <p class="subtitle">Treine palavras com contexto e revisão</p>
        </div>
    </div>
</nav>

<!-- Card principal -->
<div class="card main-card">
    <div class="card-body">

        <!-- ✅ AQUI É O MAIS IMPORTANTE (exibir mensagem) -->
        <?php echo $mensagem; ?>

        <div class="text-center mb-4">
            <h1 class="section-title">Remover palavra</h1>
            <p class="section-text">
                Escolha uma palavra cadastrada para remover do sistema.
            </p>
        </div>

        <!-- Formulário -->
        <form action="../actions/remover.php" method="POST" autocomplete="off">

            <div class="row g-4 justify-content-center">
                <div class="col-md-8">
                    <div class="answer-box">
                        <div class="label-box">Palavra cadastrada</div>

                        <select name="palavra" class="form-control" required>
                            <option value="">Selecione uma palavra</option>

                            <?php if ($resultado && $resultado->num_rows > 0): ?>
                                <?php while ($linha = $resultado->fetch_assoc()): ?>
                                    <option value="<?php echo htmlspecialchars($linha['ingles']); ?>">
                                        <?php echo htmlspecialchars($linha['ingles']) . ' - ' . htmlspecialchars($linha['portugues']); ?>
                                    </option>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <option value="">Nenhuma palavra cadastrada</option>
                            <?php endif; ?>
                        </select>

                    </div>
                </div>
            </div>

            <!-- Botões -->
            <div class="action-area d-flex justify-content-center gap-3 mt-4">
                <a href="revisar.php" class="btn btn-outline-secondary px-4 py-2 rounded-4">
                    Voltar
                </a>

                <button type="submit" class="btn btn-danger btn-confirmar">
                    Remover palavra
                </button>
            </div>

        </form>

    </div>
</div>

<!-- Esconder alerta -->
<script>
setTimeout(() => {
    const alert = document.querySelector('.alert');
    if (alert) alert.style.display = 'none';
}, 1000);
</script>

</body>
</html>