<?php
// Conexão com o banco
require '../config/conexao.php';

// Busca palavra inicial
$sql = "SELECT * FROM palavras ORDER BY RAND() LIMIT 1";
$resultado = $conn->query($sql);

$palavra = null;

if ($resultado && $resultado->num_rows > 0) {
    $palavra = $resultado->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>WordVault</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos -->
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

        <!-- Título -->
        <div class="position-relative text-center mb-4">
            <h1 class="section-title">Revisão de vocabulário</h1>

            <!-- Botões -->
            <div class="position-absolute d-flex gap-2" style="top: 10px; right: 10px;">
                <a href="adicionar.php" class="btn btn-primary btn-add">+</a>
                <a href="remover.php" class="btn btn-danger btn-add">-</a>
                <a href="listar.php" class="btn btn-secondary btn-add">≡</a>
            </div>
        </div>

        <p class="section-text">
            Leia a palavra em inglês e digite a tradução em português.
        </p>

        <!-- FORM -->
        <form id="form-revisao" onsubmit="verificarResposta(event)" autocomplete="off">

            <div class="row g-4">

                <!-- Palavra -->
                <div class="col-md-6">
                    <div class="word-box">
                        <div class="label-box">Palavra em inglês</div>
                        <h2 class="word-text" id="palavra-ingles">
                            <?php echo $palavra ? htmlspecialchars($palavra['ingles']) : 'Nenhuma palavra cadastrada'; ?>
                        </h2>
                    </div>
                </div>

                <!-- Input -->
                <div class="col-md-6">
                    <div class="answer-box">
                        <div class="label-box">Sua resposta</div>
                        <input
                            type="text"
                            id="resposta"
                            class="form-control"
                            placeholder="Digite a tradução"
                            autocomplete="off"
                            <?php echo !$palavra ? 'disabled' : ''; ?>
                        >
                    </div>
                </div>

            </div>

            <!-- Botão -->
            <div class="action-area">
                <button
                    type="submit"
                    class="btn btn-primary btn-confirmar"
                    <?php echo !$palavra ? 'disabled' : ''; ?>
                >
                    Confirmar resposta
                </button>
            </div>

        </form>

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
                <button class="btn btn-secondary" onclick="encerrar()">Encerrar</button>
                <button class="btn btn-primary" onclick="proxima()">Próxima</button>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Guarda a resposta correta atual
let corretaOriginal = <?php echo json_encode($palavra ? $palavra['portugues'] : ''); ?>;

// Normaliza texto (remove acento, caixa, etc.)
function normalizarTexto(texto) {
    return texto
        .trim()
        .toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "");
}

// Foco automático ao carregar
window.onload = function () {
    const input = document.getElementById("resposta");
    if (input && !input.disabled) {
        input.focus();
    }
};

// Verifica resposta
function verificarResposta(event) {
    if (event) event.preventDefault();

    const input = document.getElementById("resposta");
    const resposta = normalizarTexto(input.value);

    if (!corretaOriginal) return;

    const correta = normalizarTexto(corretaOriginal);

    if (resposta === correta) {
        proxima();
    } else {
        document.getElementById("resultadoTexto").innerText =
            "❌ Errou! A correta é: " + corretaOriginal;

        new bootstrap.Modal(document.getElementById("resultadoModal")).show();
    }
}

// Busca próxima palavra SEM reload
async function proxima() {
    try {
        const response = await fetch('proxima_palavra.php');

        if (!response.ok) {
            throw new Error("Erro HTTP: " + response.status);
        }

        const dados = await response.json();

        const input = document.getElementById("resposta");
        const palavraEl = document.getElementById("palavra-ingles");
        const botao = document.querySelector(".btn-confirmar");

        if (dados.sucesso) {
            palavraEl.innerText = dados.ingles;
            corretaOriginal = dados.portugues;

            input.value = "";
            input.focus();

            // Fecha modal se aberto
            const modalEl = document.getElementById("resultadoModal");
            const modalInstance = bootstrap.Modal.getInstance(modalEl);
            if (modalInstance) modalInstance.hide();

        } else {
            palavraEl.innerText = "Nenhuma palavra cadastrada";
            corretaOriginal = "";
            input.disabled = true;
            botao.disabled = true;
        }

    } catch (erro) {
        alert("Erro ao carregar a próxima palavra.");
        console.error(erro);
    }
}

// Voltar ao início
function encerrar() {
    window.location.href = "../index.php";
}
</script>

</body>
</html>