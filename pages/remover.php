<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>WordVault - Remover Palavra</title>
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
            <h1 class="section-title">Remover palavra</h1>
            <p class="section-text">
                Escolha uma palavra cadastrada para remover do sistema.
            </p>
        </div>

        <form action="" method="POST">
            <div class="row g-4 justify-content-center">
                <div class="col-md-8">
                    <div class="answer-box">
                        <div class="label-box">Palavra cadastrada</div>

                        <select name="palavra" class="form-control">
                            <option value="">Selecione uma palavra</option>
                            <option value="apple">apple - maçã</option>
                            <option value="book">book - livro</option>
                            <option value="house">house - casa</option>
                            <option value="dog">dog - cachorro</option>

                        </select>
                    </div>
                </div>
            </div>

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

</body>
</html>