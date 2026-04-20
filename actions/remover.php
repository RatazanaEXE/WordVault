<?php
// Conexão com o banco
require '../config/conexao.php';

// Verifica se veio dado do formulário
if (isset($_POST['palavra']) && !empty($_POST['palavra'])) {

    // Protege contra SQL Injection
    $palavra = $conn->real_escape_string($_POST['palavra']);

    // Query para deletar pela palavra em inglês
    $sql = "DELETE FROM palavras WHERE ingles = '$palavra'";

    // Executa a query
    if ($conn->query($sql) === TRUE) {

        // Redireciona com sucesso
        header("Location: ../pages/remover.php?status=sucesso");
        exit;

    } else {

        // Redireciona com erro
        header("Location: ../pages/remover.php?status=erro");
        exit;
    }

} else {

    // Caso não tenha sido selecionada nenhuma palavra
    header("Location: ../pages/remover.php?status=erro");
    exit;
}