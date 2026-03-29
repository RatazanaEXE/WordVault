<?php
require '../config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ingles = strtolower(trim($_POST["ingles"]));
    $portugues = strtolower(trim($_POST["portugues"]));

    $sql = "INSERT INTO palavras (ingles, portugues) VALUES ('$ingles', '$portugues')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../pages/adicionar.php?status=sucesso");
        exit();
    } else {
        header("Location: ../pages/adicionar.php?status=erro");
        exit();
    }
} else {
    echo "Acesso inválido.";
}
?>