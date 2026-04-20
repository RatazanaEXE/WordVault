<?php
// Mensagem exibida no topo da página
$mensagem = "";

// Verifica se veio algum status pela URL
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'sucesso') {
        $mensagem = '<div class="alert alert-success text-center" role="alert">
                        Palavra cadastrada com sucesso!
                     </div>';
    } elseif ($_GET['status'] == 'erro') {
        $mensagem = '<div class="alert alert-danger text-center" role="alert">
                        Erro ao cadastrar palavra!
                     </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>WordVault - Cadastrar Palavra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilo do projeto -->
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

            <!-- Mensagem de sucesso ou erro -->
            <?php echo $mensagem; ?>

            <!-- Título da página -->
            <div class="text-center mb-4">
                <h1 class="section-title">Cadastrar nova palavra</h1>
                <p class="section-text">
                    Adicione uma palavra em inglês e sua tradução em português.
                </p>
            </div>

            <!-- Formulário -->
            <form action="../actions/salvar.php" method="POST" autocomplete="off">

                <div class="row g-4">

                    <!-- Campo: inglês -->
                    <div class="col-md-6">
                        <div class="answer-box">
                            <div class="label-box">Palavra em inglês</div>
                            <input 
                                type="text" 
                                name="ingles" 
                                class="form-control" 
                                placeholder="Digite a palavra em inglês"
                                autocomplete="off"
                                autocapitalize="off"
                                spellcheck="false"
                                required
                            >
                        </div>
                    </div>

                    <!-- Campo: português -->
                    <div class="col-md-6">
                        <div class="answer-box">
                            <div class="label-box">Tradução em português</div>
                            <input 
                                type="text" 
                                name="portugues" 
                                class="form-control" 
                                placeholder="Digite a tradução em português"
                                autocomplete="off"
                                autocapitalize="off"
                                spellcheck="false"
                                required
                            >
                        </div>
                    </div>

                </div>

                <!-- Botões -->
                <div class="action-area d-flex justify-content-center gap-3 mt-4">
                    <a href="revisar.php" class="btn btn-outline-secondary px-4 py-2 rounded-4">
                        Voltar
                    </a>

                    <button type="submit" class="btn btn-primary btn-confirmar">
                        Salvar palavra
                    </button>
                </div>

            </form>

        </div>
    </div>

</body>
</html>