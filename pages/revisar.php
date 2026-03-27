<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>WordVault</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
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

<!-- Conteúdo -->
<div class="card main-card">
    <div class="card-body">

        <!-- Título central botões CRUD-->
       <div class="position-absolute d-flex gap-2" style="top: 10px; right: 10px;">

            <a href="adicionar.php" class="btn btn-primary btn-add" title="Adicionar">
                +
            </a>

            <a href="remover.php" class="btn btn-danger btn-add" title="Remover">
                -
            </a>
            
             <a href="listar.php" class="btn btn-secondary btn-add" title="Listar">
                ≡
            </a>

        </div>

        <p class="section-text">
            Leia a palavra em inglês e digite a tradução em português.
        </p>

        <!-- Conteúdo -->
        <div class="row g-4">
            <div class="col-md-6">
                <div class="word-box">
                    <div class="label-box">Palavra em inglês</div>
                    <h2 class="word-text">Apple</h2>
                </div>
            </div>

            <div class="col-md-6">
                <div class="answer-box">
                    <div class="label-box">Sua resposta</div>
                    <input type="text" id="resposta" class="form-control" placeholder="Digite a tradução">
                </div>
            </div>
        </div>

        <div class="action-area">
            <button class="btn btn-primary btn-confirmar" onclick="verificarResposta()">
                Confirmar resposta
            </button>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="resultadoModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Resultado</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p id="resultadoTexto"></p>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Encerrar</button>
                <button class="btn btn-primary" onclick="proxima()">Próxima</button>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
function verificarResposta() {
    let resposta = document.getElementById("resposta").value.toLowerCase();
    let correta = "maçã";

    let texto = resposta === correta 
        ? "✅ Acertou!" 
        : "❌ Errou! A correta é: " + correta;

    document.getElementById("resultadoTexto").innerText = texto;

    new bootstrap.Modal(document.getElementById('resultadoModal')).show();
}

function proxima() {
    location.reload();
}
</script>

</body>
</html>