<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>WordVault - Listar Palavras</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<nav class="navbar topbar py-3">
    <div class="container">
        <div>
            <a href="../index.php" class="brand">Word<span>Vault</span> 🧠</a>
            <p class="subtitle">Treine palavras com contexto e revisão</p>
        </div>
    </div>
</nav>

<div class="card main-card">
    <div class="card-body">

        <div class="text-center mb-4">
            <h1 class="section-title">Palavras cadastradas</h1>
            <p class="section-text">
                Veja abaixo as palavras atualmente registradas no sistema.
            </p>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Inglês</th>
                        <th>Português</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>apple</td>
                        <td>maçã</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>book</td>
                        <td>livro</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>house</td>
                        <td>casa</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>dog</td>
                        <td>cachorro</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="action-area d-flex justify-content-center gap-3 mt-4">
            <a href="revisar.php" class="btn btn-outline-secondary px-4 py-2 rounded-4">
                Voltar
            </a>
        </div>

    </div>
</div>

</body>
</html>